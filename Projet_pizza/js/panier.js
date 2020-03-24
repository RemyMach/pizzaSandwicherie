function show_ingredients(produit){

    var produit_id = produit.id;
    var regex = /[a-zA-Z_]{1,}/;
    var regex_produit = /produit/;
    var regex_menu_moyen = /menu_moyen/;
    var regex_menu_mega = /menu_mega/;
    if(produit_id.match(regex_produit)){
        type_produit = 'produit';
    }else if(produit_id.match(regex_menu_moyen)){
        type_produit = 'menu_moyen';
    }else if(produit_id.match(regex_menu_mega)){
        type_produit = 'menu_mega';
    }
    var numero_produit = produit_id.replace(regex,'');
    var nom_produit = document.getElementById('nom_produit' + numero_produit).textContent;
    var row_conteneur = document.getElementById('show_ingredient');
    var croix = document.getElementById('croix_ingredient');
    croix.name = type_produit + numero_produit;
    
    /** si je n'ai pas encore la card pour ajouter des ingredients */
    if(!document.getElementById("nom_produit_ingredient")){
        var h4 = document.createElement('h4');
        h4.innerHTML= nom_produit + ' :';
        h4.className = "col-md-12";
        h4.id = "nom_produit_ingredient";
        row_conteneur.appendChild(h4);
        
        var br = document.createElement('br');
        br.id="br";
        var span = document.getElementById('span');
        span.appendChild(br);
        
        var card_ingredient= document.getElementById('ingredient');
        card_ingredient.style.display = "flex";
    /** si j'ai la card pour ajouter des ingredients et que je clique sur un autre produit */ 
    }else if(document.getElementById("nom_produit_ingredient").textContent != nom_produit + ' :'){
        
        var span = document.getElementById('span');
        var br = document.getElementById('br');
        span.removeChild(br);
        var jean = document.getElementById('nom_produit_ingredient');
        row_conteneur.removeChild(jean);
        if(document.getElementById('lien_ingredient0')){
            
            /**JQuery pour compter le nombre d'élément avec cette classe  */
            var nb_element_de_class=$(".button_ingredient_add").length;
            for(var i=0;i<nb_element_de_class;i++){
                id_ingredient = "lien_ingredient" + i;
                row_conteneur.removeChild(document.getElementById(id_ingredient));
            }
            var formulaire_conteneur = document.getElementById('show_ingredient_formulaire');
            formulaire_conteneur.removeChild(document.getElementById('formulaire_ingredient'));
        }
        show_ingredients(produit);
    }
}
function suppr_ingredients(produit){
    var card_ingredient= document.getElementById('ingredient');
    var span = document.getElementById('span');
    var br = document.getElementById('br');
    var row_conteneur = document.getElementById('show_ingredient');
    var h4 = document.getElementById("nom_produit_ingredient");
    row_conteneur.removeChild(h4);
    span.removeChild(br);
    if(document.getElementById("lien_ingredient0")){
        var formulaire_conteneur = document.getElementById('show_ingredient_formulaire');
        var form = document.getElementById("formulaire_ingredient");
        formulaire_conteneur.removeChild(form);
        var nb_element_de_class=$(".button_ingredient_add").length;
            for(var i=0;i<nb_element_de_class;i++){
                id_ingredient = "lien_ingredient" + i;
                row_conteneur.removeChild(document.getElementById(id_ingredient));
            }
    }
    card_ingredient.style.display = "none";
}
function add_ingredient_for_real(){

}
function add_ingredient(ingredient){
    var nb_element_de_class=$(".button_ingredient_add").length;
    for(var count=0;count<nb_element_de_class;count++){
        if(document.getElementById("lien_ingredient0")){
            var table_ingredient = document.getElementById('lien_ingredient' + count);
            if(table_ingredient.textContent == ingredient.textContent){
                var disable = true;
            }else{
            }
        }
    }
    if(disable != true){

        var ingredient_a = document.createElement('a');
        var ingredient_div = document.createElement('div');
        var row_conteneur = document.getElementById('show_ingredient');
        var formulaire_conteneur = document.getElementById('show_ingredient_formulaire');
        /**création des id unique des liens et de l'input associé*/
        if(document.getElementById("lien_ingredient0")){
            ingredient_a.id = "lien_ingredient" + nb_element_de_class;
            var input = document.createElement('input');
            input.type = "hidden";
            input.name = "lien_ingredient" + nb_element_de_class;
            input.defaultValue = ingredient.textContent;
            var formulaire = document.getElementById('formulaire_ingredient');
            formulaire.appendChild(input);
            /**création de l'id unique du premier lien et du formulaire*/
        }else{
            ingredient_a.id = "lien_ingredient0";
            var croix = document.getElementById('croix_ingredient');
            var formulaire = document.createElement('form');
            formulaire.action = "traitement_ajout_ingredient.php?id=" + croix.name;
            formulaire.method = "post";
            formulaire.id = "formulaire_ingredient";
            var input = document.createElement('input');
            input.type = "hidden";
            input.name = "lien_ingredient0";
            input.defaultValue = ingredient.textContent;
            var button = document.createElement("button");
            button.onclick = add_ingredient_for_real();
            button.className = "btn btn-primary bouton-add-ingredient";
            button.value = "ajouter ingredients";
            button.textContent = "ajouter ingredients";
            formulaire.appendChild(input);
            formulaire.appendChild(button);
        }
        ingredient_a.className = "lien_ingredient";
        ingredient_div.className = "button_ingredient_add";
        ingredient_div.innerHTML = ingredient.textContent;

        ingredient_a.appendChild(ingredient_div);
        row_conteneur.appendChild(ingredient_a);
        formulaire_conteneur.appendChild(formulaire);
    }

}