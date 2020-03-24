    function escapeHtml(unsafe) {
      return unsafe
         .replace(/&/g, "&amp;")
         .replace(/</g, "&lt;")
         .replace(/>/g, "&gt;")
         .replace(/"/g, "&quot;")
         .replace(/'/g, "&#039;");
    }

    function surline(champ,erreur){
      if(erreur)
			  champ.style.backgroundColor = "#fba";
		  else
			  champ.style.backgroundColor = "white";
    }

    function verifconnexion(f){
      var email = f.email;
      var password = f.password;
      var regexEmail = /^[A-Za-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
      if(!email.value.match(regexEmail)){
        surline(email,true);
        document.getElementById('email_aide').innerHTML = "format: exemple@gmail.com";
        return false;
      }else{
        surline(email,false);
        document.getElementById('email_aide').innerHTML = "";
      }
      if(password.value.length == 0){
        surline(password,true);
        document.getElementById('password_aide').innerHTML = "remplissez ce champ";
        return false;
      }else{
        surline(password,false);
        document.getElementById('password_aide').innerHTML = "";
      }
    }

    function verifinscription(f){
      var nom = f.nom;
      var prenom = f.prenom;
      var telephone = f.telephone;
      var email = f.email;
      var password = f.password;
      var password_confirm = f.password_confirm;
      var code_postale = f.code_postale;
      var adresse = f.adresse_libelle;
      var ville = f.ville;
      var regexNom = /^[A-Za-z- ]+$/;
		  var regexNum = /^[0-9]+$/;
      var regexTel = /^0[0-9]{9}$/
      var regexNom_Num = /^[A-Za-z-_0-9! ]+$/;
      var regexEmail = /^[A-Za-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

      if(!nom.value.match(regexNom) || nom.value.length > 20){
        surline(nom,true);
        document.getElementById('nom_aide').innerHTML = "lettres majuscule,minuscule,tirets ,espaces et max 20 carractères";
        return false;
      }else{
        surline(nom,false);
        document.getElementById('nom_aide').innerHTML = "";
      }
      if(!prenom.value.match(regexNom) || prenom.value.length > 20){
        surline(prenom,true);
        document.getElementById('prenom_aide').innerHTML = "lettres majuscule,minuscule,tirets ,espaces et max 20 carractères";
        return false;
      }else{
        surline(prenom,false);
        document.getElementById('prenom_aide').innerHTML = "";
      }
      if(!telephone.value.match(regexTel)){
        surline(telephone,true);
        document.getElementById('telephone_aide').innerHTML = "10 chiffres sous le format 0635353546";
        return false;
      }else{
        surline(telephone,false);
        document.getElementById('telephone_aide').innerHTML = "";
      }
      if(!email.value.match(regexEmail)){
        surline(email,true);
        document.getElementById('email_aide').innerHTML = "format: exemple@gmail.com";
        return false;
      }else{
        surline(email,false);
        document.getElementById('email_aide').innerHTML = "";
      }
      if(!password.value.match(regexNom_Num) || password.value.length < 8 || password.value.length > 20){
        surline(password,true);
        document.getElementById('password_aide').innerHTML = "mot de passe entre 8 et 20 carractères";
        return false;
      }else{
        surline(password,false);
        document.getElementById('password_aide').innerHTML = "";
      }
      if(password_confirm.value != password.value || password_confirm.value.length == 0 ){
        surline(password_confirm,true);
        document.getElementById('password_confirm_aide').innerHTML = "le mot de passe n'est pas le même que la confirmation";
        return false;
      }else{
        surline(password_confirm,false);
        document.getElementById('password_confirm_aide').innerHTML = "";
      }
      if(!adresse.value.match(regexNom_Num) || adresse.value.length == 0 ){
        surline(adresse,true);
        document.getElementById('adresse_aide').innerHTML = "l'adresse est vide";
        return false;
      }else{
        surline(adresse,false);
        document.getElementById('adresse_aide').innerHTML = "";
      }
      if(!ville.value.match(regexNom)){
        surline(ville,true);
        document.getElementById('ville_aide').innerHTML = "la ville n'est pas renseignée";
        return false;
      }else{
        surline(ville,false);
        document.getElementById('ville_aide').innerHTML = "";
      }
      if(!code_postale.value.match(regexNum) || code_postale.value.length != 5 ){
        surline(code_postale,true);
        document.getElementById('code_postale_aide').innerHTML = "le code postale doit contenir 5 chiffres ex: 95120";
        return false;
      }else{
        surline(code_postale,false);
        document.getElementById('code_postale_aide').innerHTML = "";
      }
    }  