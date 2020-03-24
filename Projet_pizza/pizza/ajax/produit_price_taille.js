//variable utilisé pour le changement de quantité dans produit
var taille = document.getElementById("taille");

function getXMLHttpRequest(){
    var xhr = null;
    
    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            } catch(e) {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            //permet de faire une requete HTTP au serveur et une fois la requête envoyé les données renvoyé
            //peuvent être récupéré
            xhr = new XMLHttpRequest(); 
        }
    } else {
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return null;
    }
    return xhr;
}

function request(taille,produit,page,idPrix = null,idQuantite = null) {
   
    if(page == 'produit' || typeof(taille) == "object"){ 
        //pareil que taille.value
        var value = taille.options[taille.selectedIndex].value;
    }else{
        //on rentre ici pour le changement de quantité dans le panier
        var value = document.getElementById(taille).value;
    }
    //on crée l'objet qui permet de faire la requète http au serveur
	var xhr   = getXMLHttpRequest();
	
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            if(page == "produit") {
			    readData(xhr.responseXML);
            }else{
                readDataPanier(xhr.responseXML,idPrix,idQuantite);
            }
		} else if (xhr.readyState < 4) {
			
		}
	};
    
    if(page == "produit"){
        xhr.open("POST", "traitement_ajax_maj_price.php", true);
    }else{
        xhr.open("POST", "../pizza/traitement_ajax_maj_price.php", true);
    }
	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.send("idEditor=" + value + "&idEditoring=" + produit);
}

function readData(oData) {
        var nodes   = oData.getElementsByTagName("item");
        var quantite = document.getElementById('quantite').value;
        var oSelect = document.getElementById("prix");
        var oOption, oInner;
        
        oSelect.innerHTML = "";
        //for (var i=0, c=nodes.length; i<c; i++) {
            oOption = document.createElement("option");
            oInner  = document.createTextNode(nodes[0].getAttribute("name") * quantite);
            oOption.style.fontWeight = "bold";
            oOption.value = nodes[0].getAttribute("id");
            
            oOption.appendChild(oInner);
            oSelect.appendChild(oOption);
    //}
}

function readDataPanier(oData,idPrix,idQuantite){
        var number_button = idQuantite.split('e');
        number_button = number_button[1];
        var button = "boutton" + number_button;
        var button_specifique = document.getElementById(button);
        button_specifique.style.display = "flex";
        button_specifique.style.transition = "1.5s";
        var nodes   = oData.getElementsByTagName("item");
        var quantite = document.getElementById(idQuantite).value;
        var oSelect = document.getElementById(idPrix);
        var oOption, oInner;
        oSelect.innerHTML = "";

        oOption = document.createElement("option");
        oInner = document.createTextNode(nodes[0].getAttribute("name") * quantite);
        oOption.style.fontWeight = "bold";
        oOption.value = nodes[0].getAttribute("id");
        oOption.appendChild(oInner);
        oSelect.appendChild(oOption);
}