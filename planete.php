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
    <Link rel="StyleSheet" href="css/style.css" type="text/css">

    <?php
    //connexion a la bdd
    include("connexion.php");
    //afficher ?id_voyage=... dans le lien
    if (isset($_GET["id_voyage"])) {
        $_GET["id_voyage"] = intval($_GET["id_voyage"]); //protéger la bdd en affichant l'id en entiers

        $requete = "SELECT * FROM lien INNER JOIN voyage ON id_voyage=ext_voyage INNER JOIN categorie ON id_categorie=ext_categorie WHERE ext_categorie>=3 AND id_voyage=" . $_GET["id_voyage"];
    }
    $stmt = $db->query($requete);
    $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);
    ?>

    <title><?php foreach ($resultat as $planete) {
                echo "Visit {$planete["nom_destination"]}";
            }
            if (empty($planete)) {
                header("Location:404.html");
            } ?></title>
</head>

<body>

    <?php
    # fonction : remplacer les milliers par des K (pour les distances) etc (faciliter lecture).
    function readable_number($n)
    {    // supprimer tout formatage;
        $n = (0 + str_replace(",", "", $n));

        // vérifier que n est un nombre
        if (!is_numeric($n)) return false;

        // filtrer n
        if ($n > 1000000000000) return round(($n / 1000000000000), 1) . 'T';
        else if ($n > 1000000000) return round(($n / 1000000000), 1) . 'B';
        else if ($n > 1000000) return round(($n / 1000000), 1) . 'M';
        else if ($n > 1000) return round(($n / 1000), 1) . 'K';

        //renvoyer n, formaté
        return number_format($n);
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


    <main class="container" style="color:white">

        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="javascript:history.back()">Destinations</a></li>
            <li><?php foreach ($resultat as $planete) {
                    echo "{$planete["nom_destination"]}";
                } ?></li>
        </ul>

        <?php
        foreach ($resultat as $planete) {
            echo "            
    <div class=\"planete\">

        <div class=\"detail\">
        
            <h3 data-aos=\"fade-in\" data-aos-duration=\"2000\">VISIT</h3>
            <h1 data-aos=\"fade-in\" data-aos-duration=\"2000\"class=\"titre\">{$planete["nom_destination"]}</h1>
            <p data-aos=\"fade-in\" data-aos-duration=\"2000\">{$planete["produit_description"]}</p>
           
            <div class=\"product-info-wrapper\">
                <div class=\"product-info\" data-aos=\"fade-in\" data-aos-duration=\"2000\">
                <h5>STARTING AT</h5>
                <div class=\"product-info_content\">
                <span class=\"value\">$ " . number_format($planete["voyage_prix"], 0, ".", ",") . "</span><span style=\"font-size:medium\">/pers.</span></div>
                </div>

                <div class=\"product-info\" data-aos=\"fade-in\" data-aos-duration=\"2000\">
                <h5>DISTANCE FROM EARTH</h5>
                <div class=\"product-info_content\">
                <span class=\"value\">" . readable_number($planete["distance_terre"], 0, ".", ",") . "</span>
                <span> KM</span></div>
                </div>

                <div class=\"product-info\" data-aos=\"fade-in\" data-aos-duration=\"2000\">
                <h5>JOURNEY DURATION</h5>
                <div class=\"product-info_content\">
                <span class=\"value\">" . number_format($planete["duree"], 0, ".", ",") . "</span><span style=\"font-size:medium\"> days</span></div>
                </div>

            </div>

        </div>


        <div data-aos=\"fade-in\" data-aos-duration=\"2000\" class=\"product-img\"><img src=\"{$planete["img_destination"]}\" alt=\"\"></div>

        <div class=\"discover\">
        <a href=\"#product-desc\" id=\"product-desc\">
            <img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAAAhElEQVRIie3UPQ6AIAxAYS4h0fvfRCf/Fhk8znOwAyFGkcLWl5g4WL50QOcsy7JqBYzABvgKZ3lgB6acjxfuggYXNMhZc85ABxwycAJDAZqe0ZcOZuPFqAZXoyV4NfQPXh3NwZuhb3hzNMLjuxmSd/UP5wuPt2y76QPugVWetptalmWlXc/UbESIyB5IAAAAAElFTkSuQmCC\">
        </a>
    </div>
    
    </div>
    
    <br>
    
    <div class=\"product-desc\" data-aos=\"fade-in\" data-aos-duration=\"2000\" style=\"background-image:url(" . "{$planete["img_destination_bg"]}\n" . ")\">
    <h2>{$planete["categorie_nom"]}</h2>
        <h4>{$planete["categorie_description"]}</h4>
    </div>

    ";
        }

        ?>
        <section>
            <div class="book-ad">
                <h2>Ready to blast off ? 🚀</h2>
                <p>The experience of a lifetime is only a few steps away. Search our wide range of destinations and book your travel today.<br>We look forward to have you on board.</p>
                <button onClick="location.href='book.php?id_voyage=<?php foreach ($resultat as $planete) echo "{$planete["id_voyage"]}" ?>';">Book your trip to <?php echo $planete["nom_destination"] ?> today</button>
                <h5>No visa required</h5>
            </div>
        </section>

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