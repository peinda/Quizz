$(document).ready(function(){
    var error = false;
    $('#form-connect').submit(function(){
        if ($("#username").val().length===0) {
            $("#username").after("<span>Merci de remplir ce champ</span>"); 
            error = true;
            event.preventDefault();   
        }
         if ($("#password").val().length===0) {
            $("#password").after("<span>Merci de remplir ce champ</span>");  
            error = true;
            event.preventDefault();  
        }
        if(error == false){//si y'a pas d'erreur
            let form_data=$(this).serializeArray();
            $.post("./data/message.php",form_data,
                function(result){
                    if (result == '  admin') {
                        window.location=`index.php?user=admin`;
                    }
                    else if (result == '  jeux') {
                        window.location=`index.php?user=joueur`;
                    }
                    else{
                        alert('login ou mot de passe incorrect');
                    }
            })
        }
    })
})
