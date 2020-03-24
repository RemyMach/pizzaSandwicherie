function surline(champ,erreur){
    if(erreur)
            champ.style.backgroundColor = "#fba";
        else
            champ.style.backgroundColor = "white";
}
function verifCommande(f){
    var element = f.element;
    var password = f.password;
    var champ = document.getElementById('champ').textContent;
    var regex = /^[A-Za-z- ]+$/;
    var regex_number = /^[0-9]{5}$/;
    var regex_all = /^[A-Za-z-0-9 ]+$/;
    var regexEmail = /^[A-Za-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if(password.value.length == 0){
        surline(password,true);
        return false;
    }else{
        surline(password,false);
    }
    if(champ == "cp"){
        if(!element.value.match(regex_number)){
            surline(element,true);
            return false;
        }else{
            surline(element,false);
        }
    }else if(champ == "adresse"){
        if(!element.value.match(regex_all)){
            surline(element,true);
            return false;
        }else{
            surline(element,false);
        }
    }else if(champ == "mail"){
        if(!element.value.match(regexEmail)){
            surline(element,true);
            return false;
        }else{
            surline(element,false);
        }
    }else{
        if(!element.value.match(regex)){
            surline(element,true);
            return false;
        }else{
            surline(element,false);
        }
        
    }
}