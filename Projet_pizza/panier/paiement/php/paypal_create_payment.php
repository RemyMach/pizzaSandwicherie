<?php
//script de création de paiement appelé lors du clic sur le bouton de paiement via la fonction côté client 
require_once "config.php"; // On est déjà dans le dossier "php" à la racine de notre site, on peut donc directement inclure "config.php" qui se trouve dans ce même dossier
require_once "../class/PayPalPayment.php"; // On inclue les fichiers relativement à la position du fichier actuel, qui est déjà dans le dossier "php"

$success = 0; //qui sera un booléen (0 ou 1) permettant de savoir si tout s'est passé correctement ou non
$msg = "Une erreur est survenue, merci de bien vouloir réessayer ultérieurement..."; //qui contiendra un message d'erreur (initialisé par défaut pour une erreur quelconque)
$paypal_response = []; //qui contiendra tout ce que PayPal nous enverra via son API

$payer = new PayPalPayment();
$payer->setSandboxMode(1); // On active le mode Sandbox
$payer->setClientID("ATGtJvnF4iKjolzPncnGXDevrYIicX6Qu-kNXbEl-gg1br5Io0zbhJNdXy8EMa1XUE1oeyPqsE6Xp3P4"); // On indique sont Client ID
$payer->setSecret("EJTryMSQ38ga9j3PeKvBOLM1D08N7zraNsHydywKCcheGzfxkXoBAFFckSnW4j_-lPHQWYfGpxa0F-Yw"); // On indique son Secret

//informations de paiement requise par Paypal
$payment_data = [
    "intent" => "sale",
    "redirect_urls" => [
       "return_url" => "http://localhost/",//si le paiement est un succès cela renvoie vers ce lien
       "cancel_url" => "http://localhost/"//si le paiement a échoué cela renvoie vers ce lien
    ],
    "payer" => [
       "payment_method" => "paypal"
    ],
    "transactions" => [
       [
          "amount" => [
             "total" => sprintf("%.02f",$_SESSION['prix']), // Prix total de la transaction, ici le prix de notre item
             "currency" => "EUR" // USD, CAD, etc.
          ],
          "item_list" => [
             "items" => [
                [
                   "sku" => "1PK5Z9", // Un identifiant quelconque (code / référence) que vous pouvez attribuer au produit que vous vendez
                   "quantity" => "1",
                   "name" => "Un produit quelconque",
                   "price" => sprintf("%.02f",$_SESSION['prix']),
                   "currency" => "EUR"
                ]
             ]
          ],
          "description" => "Description du paiement..."
       ]
    ]
 ];


 //pour initialiser le paiement, fonction qui renvoie la réponse du serveur
$paypal_response = $payer->createPayment($payment_data);
$paypal_response = json_decode($paypal_response);

$bdd = connexion();

if (!empty($paypal_response->id)) {
    $insert = $bdd->prepare("INSERT INTO paiements (payment_id, payment_status, payment_amount, payment_currency, payment_date, payer_email, payer_paypal_id, payer_first_name, payer_last_name) VALUES (:payment_id, :payment_status, :payment_amount, :payment_currency, NOW(), '', '', '', '')");
    $insert_ok = $insert->execute(array(
        "payment_id" => $paypal_response->id,
        "payment_status" => $paypal_response->state,
        "payment_amount" => $paypal_response->transactions[0]->amount->total,
        "payment_currency" => $paypal_response->transactions[0]->amount->currency,
     ));
     if ($insert_ok) {
        $success = 1;
        $msg = "";
     }
} else {
    $msg = "Une erreur est survenue durant la communication avec les serveurs de PayPal. Merci de bien vouloir réessayer ultérieurement.";
}
echo json_encode(["success" => $success, "msg" => $msg, "paypal_response" => $paypal_response]);

?>