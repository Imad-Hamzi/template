

/******************************************************************************
    Fonction qui me permet de gérer les photos de la galerie photo 
 ******************************************************************************/

$(function () {
  var selectedClass = "";

// Au click sur un des 3 btn(All, chiens, chats)
  $(".filter").click(function () {

  // Je récupère la valeur de l'attribut dans le data-rel(all, 1 ou 2)
    selectedClass = $(this).attr("data-rel");
      
    $("#gallery").fadeTo(100, 0.1);
    // Tous les éléments qui n'ont pas le selectedClass, j'enlève la class animation
    $("#gallery div").not("." + selectedClass).fadeOut().removeClass('animation');
    
    setTimeout(function () {
      $("." + selectedClass).fadeIn().addClass('animation');
      $("#gallery").fadeTo(300, 1);
    }, 300);
  });
});

/******************************************************************************
    Fonction qui me permet de gérer les coeurs sur la page pensionnaire 
 ******************************************************************************/

function addcoeur(id){
  $.ajax({
    url : "./ajax/coeur/add.coeur.php",
    type : 'GET',
    data: "idAnimal=" + id,
    dataType : 'text',
    success : function(code_html, statut){
      $('.countSess').text(code_html);
    },
    error : function(resultat, statut, erreur){
    },
    complete : function(resultat, statut){
    }
  });
} 

/******************************************************************************
    Fonction qui me permet de gérer mon caroussel avec owl caroussel
******************************************************************************/


$(document).ready(function () {
  $(".owl-carousel").owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 3000,
    responsive: {
      0: {
        items: 1,
        nav: true
      },
      700: {
        items: 2,
      },
      1000: {
        items: 3,
      }
    }
  });
});

/******************************************************************************
    Fonction qui gère les 4 boutons dans la page accueil
******************************************************************************/ 

$('#btn2').click(function () {
  $('#block1').addClass('d-none');
  $('#block3').addClass('d-none');
  $('#block3').addClass('d-none');
  $('#block2').removeClass('d-none');
});
  
$('#btn3').click(function () {
  $('#block1').addClass('d-none');
  $('#block2').addClass('d-none');
  $('#block4').addClass('d-none');
  $('#block3').removeClass('d-none');
});
  
$('#btn1').click(function () {
  $('#block2').addClass('d-none');
  $('#block3').addClass('d-none');
  $('#block4').addClass('d-none');
  $('#block1').removeClass('d-none');
});
  
$('#btn4').click(function () {
  $('#block2').addClass('d-none');
  $('#block3').addClass('d-none');
  $('#block1').addClass('d-none');
  $('#block4').removeClass('d-none');
});

/******************************************************************************
    Ajax pour la partie de gestion des soins
******************************************************************************/ 

function chargeSoin(ctl){
  // alert(ctl.value);
  
  $.ajax({
    url : 'ajax/soins/soin.php',
    type : 'POST',
    data: "action=get&idSoin=" + ctl.value ,
    dataType : 'json',
    success : function(code_html, statut){
        // alert(JSON.stringify(code_html));
        $('#nomSoin').val(code_html.nom_soin);
        $('#prixSoin').val(code_html.prix_soin);
        $('#idSoinu').val(code_html.id_soins);
        // alert(code_html.id_soins);
        $('#info_soin').show('slow');
    },
    error : function(resultat, statut, erreur){
    },
    complete : function(resultat, statut){
    }
   })
}

/******************************************************************************
    Fonction qui permet l'envoi pour la newsletter
******************************************************************************/ 

function send_newsletter() {
  event.preventDefault();

  $.ajax({
    url: 'ajax/forms/formulaireNewsletter.php',
    type: 'POST',
    data: "mailNewsletter=" + $('#input_newsletter').val()+ "&recaptcha-response1=" + $('#recaptchaResponse1').val() ,
    dataType: 'text',
    success: function (code_html, statut) {
      $('#result_newsletter').html(code_html);
    },
    error: function (resultat, statut, erreur) {
    },
    complete: function (resultat, statut) {
    }
  })
}

/******************************************************************************
    Validation de formulaire de contact
******************************************************************************/ 

function valideForm(){
  event.preventDefault();
    $.ajax({
      url : 'ajax/forms/formulaireContact.php',
      type : 'POST',
      data: "nom=" + $('#nom').val() + "&email=" + $('#email').val() + "&sujet=" + $('#sujet').val() + "&message=" + $('#message').val() + "&recaptcha-response=" + $('#recaptchaResponse').val(),
      dataType : 'text',
      success : function(code_html, statut){
        $('#reponse_form').html(code_html);
        if(code_html == " Votre message a bien été pris en compte. <br> Nous nous efforcerons d’y répondre dans les plus bref délais !"){
          $('#btn-form').addClass("disabled");
        }
      },
      error : function(resultat, statut, erreur){
      },
      complete : function(resultat, statut){
      }
  })
}