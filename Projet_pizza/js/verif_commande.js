function surline(champ,erreur){
    if(erreur)
            champ.style.backgroundColor = "#fba";
        else
            champ.style.backgroundColor = "white";
  }

function verifCommandeValide(f){
    var quantite = f.quantite;
    var taille = f.taille;
    if(quantite.value <= 0 || quantite.value == ''){
      surline(quantite,true);
      document.getElementById('quantite_aide').innerHTML = "Minimum 1 pizza";
      return false;
    }else{
      surline(quantite,false);
    }
}

function verifCommandeValide_panier(f){
    var nodes = f.getElementsByTagName("input");
    var quantite_provisoir = nodes[0];
    console.log(nodes);
    if(quantite_provisoir.value <= '0' || quantite_provisoir.value == ''){
        surline(quantite_provisoir,true);
        return false;
    }else{
        surline(quantite_provisoir,false);
    }
}

function evaluate_livraison(livraison){
    if(livraison.value == "livraison à domicile"){
        var input_livraison = document.getElementById('livraison');
        input_livraison.style.display = "flex";
    }else{
        var input_livraison = document.getElementById('livraison');
        input_livraison.style.display = "none";
    }
}
