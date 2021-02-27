
        $(document).ready(function(){
    $("#form1").on("submit", function(e){
        e.preventDefault();
        //on desactive le comportement par defaut du formulaire
        var form = $("#form1");
        /*var nom = $("#fullname").val();
        var email = $("#fullname").val();
        var mdp = $("#fullname").val();*/

        $.ajax({
            method: "POST",
            url: "welcome.php",
            dataType: "HTML",
            data: form.serialize(),
            success: function(reponse)
            {
                switch (reponse) {
                  case '':
                    $("#message").addClass("alert alert-success").html(reponse);
                        
                    break;
                  
                  default:
                    $("#message").addClass("alert alert-danger").html(reponse);
                    break;
                }
            },
            error: function () {
                alert("Erreur d'envoi de donnée");
            }
        })
    });

     })
    