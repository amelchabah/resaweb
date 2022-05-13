<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=League+Spartan:wght@100;200;300;400&display=swap" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="180x180" href="img/icons/rocket180.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/icons/rocket32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/icons/rocket16.png">
    <link rel="icon" href="img/icons/rocket48.ico">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Contact us</title>
</head>

<body>

    <?php
    /*envoyer données formulaire de contact par mail au gestionnaire*/
    include("connexion.php");

    if (isset($_POST['contact_submit'])) {
        $firstname = $_POST['contact_prenom'];
        $lastname = $_POST['contact_nom'];
        $mailFrom = $_POST['contact_mail'];
        $subject = "New mail from a Galactrip user!";
        $txt = $_POST['contact_message'];
        $mailTo = "amel.chabah@edu.univ-eiffel.fr";

        // version MIME
        // $headers = "MIME-Version: 1.0\n";
        // en-têtes expéditeur
        // priorité urgente
        // $headers .= "X-Priority : 1\n";
        // type de contenu (HTML)
        $headers = "Content-type: text/html; charset=utf-8\n";
        // code de transportage
        // $headers .= "Content-Transfer-Encoding: 8bit\n";

        // message HTML
        $message = '<div style="font-family:Noto sans, sans-serif"><h4>You have received a mail from ' . $firstname . ' ' . $lastname . ' (' . $mailFrom . ') :</h4><p>&laquo; ' . $txt . ' &raquo;</p></div>';

        mail($mailTo, $subject, $message, $headers);
        header("Location: mailsent.html");
    }

    ?>

    <nav class="main-menu">
        <a href="index.php"><img src="./img/icons/rocket.png" alt="" style="height: 1.5rem;"></a>
        <div class="navlinks">
            <a href="index.php">Home</a>
            <a href="destinations.php">Destinations</a>
            <a href="mission.php">Circumlunar mission</a>
            <a href="contact.php">Contact</a>

            <form action="catalog.php" class="searchBox">
                <input type="submit" class="searchButton" value=" ">
            </form>

        </div>

    </nav>

    <input type="checkbox" id="hamburger-input" class="burger-shower">
    <label id="hamburger-menu" for="hamburger-input">
        ☰
        <nav id="sidebar-menu">
            <a href="index.php">Home</a>
            <a href="destinations.php">Destinations</a>
            <a href="mission.php">Circumlunar mission</a>
            <a href="contact.php">Contact</a>
            <form action="catalog.php" class="searchBox">
                <input type="submit" class="searchButton" value=" ">
            </form>
        </nav>
    </label>

    <div class="overlay"></div>
    <div class="stars"></div>

    <main class="container wrapper">

        <div class="faq">
            <h1>Need help ?</h1>
            <h4>We have answers. Below you'll find answers to the most commons questions you may have on Galactrip. If you still can't find the answer you're looking for, just <b><a href="#contact">contact us</a></b>!</h4>

            <div class="content">
                <article data-aos="fade-in" data-aos-duration="600">
                    <input type="checkbox" id="question1" name="q" class="questions">
                    <div class="plus">&#8250;</div>
                    <label for="question1" class="question">
                        How do I book a trip ?
                    </label>
                    <div class="answers">
                        <p>
                            To book a trip, you can select a destination in the DESTINATIONS page and access more details. Once on the chosen destination page, you can click on the BOOK TRIP button and will be redirected to a booking form. Select a destination, the number of passengers, select your departure and return dates, and enter needed personal informations - that won't be shared or sold. After purchasing, a confirmation email will be sent.
                        </p>
                    </div>
                </article>

                <article data-aos="fade-in" data-aos-duration="600">
                    <input type="checkbox" id="question2" name="q" class="questions">
                    <div class="plus">&#8250;</div>
                    <label for="question2" class="question">
                        Can I book more than one trip ?
                    </label>
                    <div class="answers">
                        <p>
                            Of course, but only one trip can be booked at a time.
                        </p>
                    </div>
                </article>

                <article data-aos="fade-in" data-aos-duration="600">
                    <input type="checkbox" id="question3" name="q" class="questions">
                    <div class="plus">&#8250;</div>
                    <label for="question3" class="question">
                        How do I change my destination, number of passengers, departure/return dates, any personal information or cancel a booking ?
                    </label>
                    <div class="answers">
                        <p>
                            If you need to change any information entered during your booking, you can send an email at "amelou518@gmail.com", or in the form below (at the bottom of the page), with the informations you need to change or a booking cancellation request. You should receive an answer in the following days.
                        </p>
                    </div>
                </article>

                <article data-aos="fade-in" data-aos-duration="600">
                    <input type="checkbox" id="question4" name="q" class="questions">
                    <div class="plus">&#8250;</div>
                    <label for="question4" class="question">
                        What do I do once I received the confirmation email ?
                    </label>
                    <div class="answers">
                        <p>
                            Your date, time and place of departure will be available in the confirmation email. You have nothing to do, but don't be late, the universe won't wait!
                        </p>
                    </div>
                </article>
            </div>

        </div>

        <section id="contact" class="contactmain" data-aos="fade-in" data-aos-duration="600">

            <article class="formulaire">
                <h3>Didn't find what you were looking for ?</h3>

                <form class="contact" action="" method="post">

                    <fieldset>
                        <div>
                            <label>First name<span style="color:red"> *</span></label>
                            <div class="errorTxt"></div>

                            <input type="text" name="contact_prenom" placeholder="Amel" required>
                        </div>
                        <br>
                        <div><label>Last name<span style="color:red"> *</span></label>
                            <div class="errorTxt"></div>

                            <input type="text" name="contact_nom" placeholder="Chabah" required>
                        </div>
                    </fieldset>
                    <br>

                    <label>Mail<span style="color:red"> *</span></label>

                    <input type="email" name="contact_mail" placeholder="your@address.idk" required>
                    <br>
                    <label>Your text<span style="color:red"> *</span></label>
                    <div class="errorTxt"></div>

                    <textarea type="text" name="contact_message" placeholder="How can we help ?" rows="6" required></textarea>
                    <h6 class="required-field"><span style="color:red">*</span> Required field</h6>
                    <br>

                    <input class="submit-btn" type="submit" name="contact_submit" value="Send">
                </form>

            </article>
            <aside class="infos">
                <div>
                    <h3>You can find us on :</h3>
                    <div class="icon-text">
                        <img src="./img/icons/github48.png" alt="" style="height:1.5rem">
                        <a href="https://github.com/amelchabah" target="_blank">github</a>
                    </div>
                    <br>
                    <div class="icon-text">
                        <img src="./img/icons/instagram48.png" alt="" style="height:1.5rem">

                        <a href="https://instagram.com/vwel00" target="_blank">instagram</a>
                    </div>
                </div>
                <div>
                    <h4>Wanna travel to the Earth's center ?</h4>
                    <div class="icon-text">
                        <img src="./img/icons/earth-planet.png" alt="" style="height:1.5rem">

                        <a href="https://resaweb.crunchant.butmmi.o2switch.site/" target="_blank">The fabulous world of <b>Verne</b></a>
                    </div>
                </div>

            </aside>
        </section>
        <h6 class="back-button"><a href="javascript:history.back()">Go Back</a></h6>


    </main>


    <footer>
        <nav class="footerlinks">
            <a href="index.php">Home</a>
            <a href="destinations.php">Destinations</a>
            <a href="mission.php">Circumlunar mission</a>
            <a href="contact.php">Contact</a>
            <a href="credits.php">Terms & Conditions</a>
            <a href="https://github.com/amelchabah" target="_blank"><img src="img/icons/github.png" alt="" style="height:1.5rem"></a>
        </nav>
        <h6>&copy; Amel Chabah - 2022 - all rights reserved</h6>

    </footer>



    <!--scripts-->

    <script type="text/javascript" src="js/script.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


</body>

</html>