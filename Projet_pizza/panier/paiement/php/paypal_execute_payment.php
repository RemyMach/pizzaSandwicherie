<?php
/**script côté serveur qui se chargera de valider et finaliser le paiement. */
require_once "config.php";
require_once "../class/PayPalPayment.php";


$success = 0;
$msg = "Une erreur est survenue, merci de bien vouloir réessayer ultérieurement...";
$paypal_response = [];
//vérifier que les paramètres essentiel pour la transaction ne sont pas vides
if (!empty($_POST['paymentID']) AND !empty($_POST['payerID'])) {
    $paymentID = htmlspecialchars($_POST['paymentID']);
    $payerID = htmlspecialchars($_POST['payerID']);
    
    //initialiser une instance de la classe PayPalPayment
    $payer = new PayPalPayment();
    $payer->setSandboxMode(1);
    $payer->setClientID("Votre Client ID");
    $payer->setSecret("Votre Secret");

    $bdd = connexion();
    //récupération du paiement à éxécuter dans la base de données
    $payment = $bdd->prepare('SELECT * FROM paiements WHERE payment_id = ?');
    $payment->execute(array($paymentID));
    $payment = $payment->fetch();
    
    //si le paiement est bien trouvé dans la base de donnée on peut continuer
    if ($payment) {

        //exécute le paiement via la fonction "executePayment" dans laquelle on doit passer les paramètres paymentID et payerID
        $paypal_response = $payer->executePayment($paymentID, $payerID);
        $paypal_response = json_decode($paypal_response);

        //on met à jour le paiement dans la base de donnée
        $update_payment = $bdd->prepare('UPDATE paiements SET payment_status = ?, payer_email = ? WHERE payment_id = ?');
        $update_payment->execute(array($paypal_response->state, $paypal_response->payer->payer_info->email, $paymentID));


        $liste_articles = create_line_command();
        $insert_commande = $bdd->prepare('INSERT INTO commande_verify (id_payeur,articles)VALUES(:id_payeur,:articles)');
        $insert_commande->execute(array('id_payeur' => $_SESSION['id'], 'articles' => $liste_articles));
        //on vérifie si le paiement est approuvé graçe à son état stockée dans $paypal_response->state
        if ($paypal_response->state == "approved") {

            //le paiement est validé et on peut envoyer à l'utilisateur le produit commande donc le message d'erreur à zéro 
            $success = 1;
            $msg = "";
        //si le paiement n'est pas validé
        }else {
            $msg = "Une erreur est survenue durant l'approbation de votre paiement. Merci de réessayer ultérieurement ou contacter un administrateur du site.";
         }

    //si le aiement n'est pas trouvé dans la base de donnée     
    }else {
        $msg = "Votre paiement n'a pas été trouvé dans notre base de données. Merci de réessayer ultérieurement ou contacter un administrateur du site. (Votre compte PayPal n'a pas été débité)";
    }
}
//afficher quelques informations en JSON récupérer par notre code JS coté client
echo json_encode(["success" => $success, "msg" => $msg, "paypal_response" => $paypal_response]);