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

    <link rel="StyleSheet" href="css/style.css" type="text/css">

    <title>You're looking for...</title>
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


    <main class="catalog">
        <form action="catalog.php" class="searchBox">
            <div class="searchContainer">
                <input id="search" class="searchInput" type="text" name="search" placeholder="Try typing a destination...">

                <div class="filters">
                    <div class="wrap-switch">
                        <input type="checkbox" id="checkbox1" name="rock">
                        <label id="checkbutton" for="checkbox1">
                            <div id="knob"></div>
                        </label>

                        <h5>Rocky destination</h5>
                    </div>

                    <div class="wrap-switch">
                        <input type="checkbox" id="checkbox2" name="gas">
                        <label id="checkbutton" for="checkbox2">
                            <div id="knob"></div>
                        </label>

                        <h5>Gas giant</h5>
                    </div>
                </div>
            </div>
            <input type="submit" class="searchButton" value="">
        </form>


        <!--catalogue-->
        <div class="array">

            <?php

            if (isset($_GET["search"])) {
                include("connexion.php");
                $argument = "%" . htmlspecialchars($_GET["search"]) . "%";
                $requete = "SELECT * FROM lien 
                INNER JOIN voyage ON id_voyage=ext_voyage 
                INNER JOIN categorie ON id_categorie=ext_categorie 
                WHERE ext_categorie=2 AND nom_destination LIKE ?";

                //filtre permettant de choisir d'exécuter sa recherche parmi 2 catégories, l'une, ou l'autre
                if (isset($_GET["gas"], $_GET["rock"])) {
                    $requete = "SELECT * FROM lien 
                    INNER JOIN voyage ON id_voyage=ext_voyage 
                    INNER JOIN categorie ON id_categorie=ext_categorie 
                    WHERE ext_categorie=2 AND nom_destination LIKE ?";
                } else if (isset($_GET["rock"])) {
                    $requete = "SELECT * FROM lien
                    INNER JOIN voyage ON id_voyage=ext_voyage
                    INNER JOIN categorie ON id_categorie=ext_categorie
                    WHERE ext_categorie=3 AND nom_destination LIKE ?";
                } else if (isset($_GET["gas"])) {
                    $requete = "SELECT * FROM lien
                    INNER JOIN voyage ON id_voyage=ext_voyage
                    INNER JOIN categorie ON id_categorie=ext_categorie
                    WHERE ext_categorie=4 AND nom_destination LIKE ?";
                };


                //lancer la requete simple avec prepare
                $stmt = $db->prepare($requete);

                //PDO sous forme de chaine de caracteres
                $stmt->bindValue(1, $argument, PDO::PARAM_STR);
                $stmt->execute();
                $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);

                foreach ($resultat as $dest) {
            ?>

                    <div class="result">

                        <a href="planete.php?id_voyage=<?= $dest["id_voyage"] ?>">

                            <div class="item" data-aos="fade-in" data-aos-duration="2000">
                                <img src="<?= $dest["img_destination"] ?>" alt="">
                                <div class="glass">
                                    <h2><?= $dest["nom_destination"] ?></h2>
                                    <p><?= mb_strimwidth($dest["produit_description"], 0, 100, "...") ?></p>
                                    <div class="price">
                                        <h3>$ <?= number_format($dest["voyage_prix"], 0, ".", ",") ?></h3><span style="font-size:medium">/pers.</span>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>


                <?php
                };
                //si aucun resultat n'a ete trouve, renvoyer une suggestion :
                if (empty($resultat)) {
                ?>
                    <div class="no-result">
                        <h3>Sorry, no result were found :(</h3>
                        <h4>Try typing <a href="catalog.php?search=saturn">&nbsp;Saturn&nbsp;</a> instead!</h4>
                    </div>
            <?php

                };
            };

            ?>
        </div>
        </div>

    </main>

    <button class="back-button" onClick="location.href='destinations.php';">Discover more destinations</button>



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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</body>

</html>