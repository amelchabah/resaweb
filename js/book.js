document.addEventListener("DOMContentLoaded", function () {

    // form

    //generation du message d'erreur lorsqu'une donnée est incorrecte
    var v = $("#booking-form").validate({
        errorElement: "span",
        errorClass: "error",
        errorPlacement: function (error, element) {
            error.insertBefore(element);
        }
    });

    //au clic du bouton de retour a l'etape 1, cacher la tab, faire apparaitre l'etape 1, allumer le point 1 de la progress bar
    $(".prev-btn1").click(function () {
        $(".tab-pane").hide();
        $("#step1").fadeIn(1000);
        $('.progressbar-dots').removeClass('active');
        $('.progressbar-dots:nth-child(1)').addClass('active');
    });

    //au clic du bouton de retour a l'etape 2, meme principe, et faire reapparaitre l'image de fusee qui disparait a la derniere etape de confirmation
    $(".prev-btn2").click(function () {
        $(".tab-pane").hide();
        $("#step2").fadeIn(1000);
        $('.progressbar-dots').removeClass('active');
        $('.progressbar-dots:nth-child(2)').addClass('active');
        $('.sideimg').fadeIn(500);
        document.querySelector('.sideimg').style.display = 'block';
    });

    //au clic du bouton d'acces a l'etape 2...
    $(".next-btn1").click(function () {
        if (v.form()) {
            $(".tab-pane").hide();
            $("#step2").fadeIn(1000);
            $('.progressbar-dots').removeClass('active');
            $('.progressbar-dots:nth-child(2)').addClass('active');
        }
    });


    //empecher la date de retour d'etre inferieure a la duree du voyage (et ainsi rendre la duree du voyage coherente) avec data min = duree minimale
    //afficher dans la console la duree minimale
    // console.log(document.querySelectorAll('.datepicker')[1].getAttribute('data-min'));

    $('.datepicker').on('input', function () {
        //creer firstDate, valeur de la date de départ en ms
        let firstDate = new Date(document.querySelectorAll('.datepicker')[0].value);
        //recuperer la duree minimale
        const nbJours = document.querySelectorAll('.datepicker')[1].getAttribute('data-min');
        //additionner a la date de depart la duree en ms
        firstDate.setTime(firstDate.getTime() + (nbJours * 24 * 60 * 60 * 1000))
        //injecter a la date de retour le minimum, converti en annees, mois, jours (avec getMonth qui démarre à janvier=1, et ajouter un 0 au premier caractere du mois s'il est supérieur à 9)
        document.querySelectorAll('.datepicker')[1].min = `${firstDate.getFullYear()}-${firstDate.getMonth() + 1 > 9 ? firstDate.getMonth() + 1 : '0' + (firstDate.getMonth() + 1)}-${firstDate.getDate() > 9 ? firstDate.getDate() : '0' + firstDate.getDate()}`;
    })


    //au clic du bouton de confirmation, 
    $(".next-btn2").click(function () {
        if (v.form()) {
            $(".tab-pane").hide();
            $("#step3").fadeIn(1000);
            $('.progressbar-dots').removeClass('active');
            $('.progressbar-dots:nth-child(3)').addClass('active');
            $('.sideimg').fadeOut(500);

            //changer l'apparence du formulaire
            document.querySelector(".booking-form").style.width = '90%';
            document.querySelector('.sideimg').style.display = 'none';

            //injecter dans l'html les données entrées précedemment, avec formatage des dates et du prix total multiplié par le nombre de passagers
            document.querySelector('.confirmation-order-infos').innerHTML =
                '<h5>Order informations</h5><p><b>Destination :</b> ' + document.querySelector('.nom_destination').value + '</p><p><b>Check in :</b> ' + new Date(document.querySelectorAll('.datepicker')[0].value).toLocaleDateString() + '</p><p><b>Check out :</b> ' + new Date(document.querySelectorAll('.datepicker')[1].value).toLocaleDateString() + '</p><p><b>Departure place :</b> ' + document.querySelector('.lieu_depart').value + '</p><p>For <b>' + document.querySelector('.nb_voyageurs').value + ' passenger(s)</b></p><br>';

            document.querySelector('.confirmation-perso-infos').innerHTML =
                '<h5>Your information</h5><p>' + document.querySelector('.client_prenom').value + ' ' + document.querySelector('.client_nom').value + '</p><p>' + document.querySelector('.client_mail').value + '</p><p>' + document.querySelector('.client_tel').value + '</p>';


            //fonction qui calcule le prix total et l'affiche dans la page de confirmation
            var a = parseInt(document.querySelector('.nb_voyageurs').value);
            var b = parseInt(document.querySelector('.prix').value);

            function calculprix(x, y) {
                return x * y;
            }

            var int1 = new Intl.NumberFormat();
            var prix_total = int1.format(calculprix(a, b));
            document.querySelector('.confirmation-price').innerHTML = 'Order total : $ ' + prix_total;
        }
    });

})
