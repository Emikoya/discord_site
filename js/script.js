$(document).ready(function() {
    $("#publie").keypress(function a(event){ 
        if (event.which == 13){
            console.log("Touche entrée");
            console.log($("#publie").val());
            $.ajax({ 
                type: 'POST', 
                url: 'php/ajax.php', 
                data: { texte:$("#publie").val()}, 
                success: publicationMessage 
            });
           
        }

    });
    function publicationMessage(retour){
         $("#publie").val('');
         console.log(retour);
         $("#affichage").append(retour);
    }

    setInterval(a, 3000);
    function a(){
        $.ajax({ 
            type: 'POST', 
            url: 'php/ajaxMess.php',
            success: publiMess 
        });
    }
    function publiMess(retour){
        console.log(retour);
        $.getJSON( "js/message.json", function( data ) {
            // traitement à effectuer une fois les données chargées
            for (i in data){
                nom = data[i].user_name;
                text = data[i].mes_texte;
                date = data[i].mes_date;
                $("#affichage").append('<div>' + nom + ", " + date + '</br>' + text + '</br>' + '</div>');
            }
        });
        //$("#affichage").append(retour);
    }
});