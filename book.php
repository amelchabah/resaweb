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

    <?php
    //connexion a la bdd
    include("connexion.php");
    //afficher ?id_voyage=... dans le lien
    if (isset($_GET["id_voyage"])) {
        $_GET["id_voyage"] = intval($_GET["id_voyage"]); //protéger la bdd en affichant l'id en entiers
        $requete = "SELECT * FROM voyage WHERE id_voyage=" . $_GET["id_voyage"];
    }

    $stmt = $db->query($requete);
    $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);

    ?>

    <title><?php foreach ($resultat as $planete) {
                echo "Book a trip to {$planete["nom_destination"]}";
            } ?></title>
</head>

<body>
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

    <main class="booking">
        <section class="booking-form">
            <form action="insert_reservation.php" id="booking-form" method="post">
                <div class="tab-content">
                    <div class="tab-pane" id="step1">

                        <h1>Book your trip to

                            <?php foreach ($resultat as $qua) echo "{$planete["nom_destination"]}";
                            if (empty($qua)) {
                                header("Location:404.html");
                            }  ?>
                        </h1>

                        <fieldset>
                            <div>
                                <label for="date_depart">From</label>
                                <div class="errorTxt"></div>
                                <input type="date" class="datepicker" name="date_depart" min="2022-05-12" required>
                            </div>
                            <div>
                                <label for="date_retour">To</label>
                                <div class="errorTxt"></div>
                                <input type="date" class="datepicker" name="date_retour" min="2022-05-13" data-min="<?= "{$planete["duree"]}" ?>" required>
                            </div>
                        </fieldset>

                        <label for="lieu_depart">Select a departure location</label>
                        <div class="errorTxt"></div>
                        <select name="lieu_depart" class="lieu_depart" required>
                            <option value="Kennedy Space Center, Florida">Kennedy Space Center, Florida</option>
                            <option value="Spaceport America, New Mexico">Spaceport America, New Mexico</option>
                        </select>

                        <label for="nb_voyageurs">Select a number of passengers</label>
                        <div class="errorTxt"></div>
                        <select name="nb_voyageurs" class="nb_voyageurs" required>
                            <option value="">How many passengers ?</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>


                        <!--cet input de destination est utile uniquement à l'envoi des données par mail/dans la bdd, ce pourquoi il n'est pas affiché-->
                        <input type="hidden" name="nom_destination" class="nom_destination" style="display:none;" value="<?php echo "{$planete["nom_destination"]}"; ?>">

                        <button class="next-btn next-btn1" type="button">Next</button>
                    </div>
                    <div class="tab-pane" id="step2">
                        <h1>Your information</h1>

                        <fieldset>
                            <div>
                                <label for="client_prenom">First name<span style="color:red"> *</span></label>
                                <div class="errorTxt"></div>
                                <input type="text" name="client_prenom" class="client_prenom" placeholder="Amel" maxlength="20" required>

                            </div>
                            <div>
                                <label for="client_nom">Last name<span style="color:red"> *</span></label>
                                <div class="errorTxt"></div>
                                <input type="text" name="client_nom" class="client_nom" placeholder="Chabah" maxlength="20" required>

                            </div>

                        </fieldset>

                        <label for="client_mail">Your mail address<span style="color:red"> *</span></label>
                        <div class="errorTxt"></div>
                        <input type="email" name="client_mail" class="client_mail" placeholder="example@mail.com" maxlength="80" required>

                        <label for="client_tel">Your phone number<span style="color:red"> *</span></label>
                        <input type="tel" name="client_tel" class="client_tel" placeholder="0011223344" maxlength="10" required>

                        <h6 class="required-field"><span style="color:red">*</span> Required field</h6>

                        <div style="display: flex; flex-direction:row; gap:2rem">
                            <button class="prev-btn prev-btn1" type="button">Prev</button>
                            <button class="next-btn next-btn2" type="button">Next</button>
                        </div>

                    </div>

                    <div class="tab-pane" id="step3">
                        <h1>Booking confirmation</h1>

                        <input type="hidden" name="prix" class="prix" value="<?php echo $planete["voyage_prix"]; ?>">

                        <div class="confirmation-page">
                            <div class="confirmation-order-infos"></div>
                            <div class="confirmation-infos2">
                                <div class="confirmation-perso-infos"></div>
                                <h3 class="confirmation-price"></h3>
                            </div>

                        </div>


                        <div style="display: flex; flex-direction:row; gap:2rem">
                            <input class="prev-btn prev-btn2" type="button" value="Prev">
                            <input class="submit-btn" type="submit" name="booking_submit" value="Purchase">
                        </div>
                    </div>
                </div>

                <div class="progress-wrap">
                    <div class="line-progress-bar">
                        <!-- <div class="line"></div> -->
                        <ul class="checkout-bar">
                            <li class="progressbar-dots active"></li>
                            <li class="progressbar-dots"></li>
                            <li class="progressbar-dots"></li>
                        </ul>
                    </div>
                </div>

                <div id="loader" style="display: none; margin: 0 auto">

                    <!-- By Sam Herbert (@sherb), for everyone. More @ http://goo.gl/7AJzbL -->
                    <svg width="60" height="15" viewBox="0 0 120 30" xmlns="http://www.w3.org/2000/svg" fill="#fff">
                        <circle cx="15" cy="15" r="15">
                            <animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite" />
                            <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite" />
                        </circle>
                        <circle cx="60" cy="15" r="9" fill-opacity="0.3">
                            <animate attributeName="r" from="9" to="9" begin="0s" dur="0.8s" values="9;15;9" calcMode="linear" repeatCount="indefinite" />
                            <animate attributeName="fill-opacity" from="0.5" to="0.5" begin="0s" dur="0.8s" values=".5;1;.5" calcMode="linear" repeatCount="indefinite" />
                        </circle>
                        <circle cx="105" cy="15" r="15">
                            <animate attributeName="r" from="15" to="15" begin="0s" dur="0.8s" values="15;9;15" calcMode="linear" repeatCount="indefinite" />
                            <animate attributeName="fill-opacity" from="1" to="1" begin="0s" dur="0.8s" values="1;.5;1" calcMode="linear" repeatCount="indefinite" />
                        </circle>
                    </svg>
                </div>
            </form>
        </section>

        <div class="sideimg"><img src="./img/3drocket.png" alt=""></div>


    </main>
    <button class="button back-button" type="button" onclick="history.back()">Go Back</button>


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
    <script type="text/javascript" src="js/book.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</body>

</html>