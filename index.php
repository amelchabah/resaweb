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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="StyleSheet" href="css/style.css" type="text/css">

    <title>Galactrip</title>
</head>


<body>
    <?php
    //connexion a la bdd
    include("connexion.php");

    //demande des DERNIERS voyages ajoutés (5 derniers uniquement)
    $requete = "SELECT * FROM lien INNER JOIN voyage ON id_voyage=ext_voyage INNER JOIN categorie ON id_categorie=ext_categorie WHERE ext_categorie=2 ORDER BY id_voyage DESC LIMIT 5";

    $stmt = $db->query($requete);
    $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);
    ?>

    <header class="indexheader">

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

        <div class="home">
            <div class="welcome">
                <h1 data-aos="fade-in" data-aos-duration="1300">Need some space?</h1>
                <h4 data-aos="fade-in" data-aos-duration="600" data-aos-delay="1300">Not your typical travel agency</h4>
                <div class="explore" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="2100"><a href="#steps">EXPLORE NOW →</a></div>
                <h5 data-aos="fade-in" data-aos-duration="1000" data-aos-delay="2300">No visa required</h5>
            </div>

        </div>
        <div id="mars"><img src="img/bringerofwar.png" alt=""></div>

    </header>


    <div id="steps" class="steps" data-aos="fade-in" data-aos-duration="2000">
        <h5>EXPLORE THE PLACES OF YOUR DREAMS</h5>
        <p>The experience of a lifetime is only a few steps away. Search our wide range of flights and book your travel today.<br>We look forward to have you on board!
        </p>

        <div class="steps-wrapper">
            <div class="step" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="100">
                <img class="circle-frame" src="./img/icons/planet.png" alt="">
                <h3>Find a destination</h3>
                <span>Pick your dream destination among gas giants or terrestrial objects...</span>
            </div>
            <div class="step" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="300">
                <img class="circle-frame" src="./img/icons/calendar.png" alt="">
                <h3>Complete the booking form</h3>
                <span>Enter a departure date and location, some informations to confirm your trip and you're done!
                </span>
            </div>
            <div class="step" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="500">
                <img class="circle-frame" src="./img/icons/rocket--v1.png" alt="">
                <h3>Enjor your trip!</h3>
                <span>No visa required, no baggage fees : enjoy!</span>
            </div>

        </div>
    </div>


    <div class="presentation" data-aos="fade-in" data-aos-duration="2000">
        <article>
            <h6>ABOUT GALACTRIP</h6>
            <p>Earth has close to 8 billion people and fewer than 600 people have been lucky
                enough to wake up outside of Earth’s atmosphere. Founded in 2022, our space travel company opened the
                door for private
                citizens to explore space – a destination that holds the future for humanity – and we can do the same
                for you.

                We provide the ultimate
                experience for outer space travel with feature destinations like the Moon, Mars, Jupiter, Saturn and more!
                <br>Ready to take some space selfies ?
            </p>
        </article>
    </div>


    <div class="spaceship">
        <div data-aos="fade-up" data-aos-duration="2000" class="spaceship-img">
            <img src="./img/rockk.png" alt="">
        </div>
        <div data-aos="fade-in" data-aos-duration="2000" class="spaceship-desc">
            <h6 data-aos="fade-in" data-aos-duration="1000">TECHNOLOGY</h6>
            <div class="spaceship-intro">

                <h1 data-aos="fade-in" data-aos-duration="2000">Meet GALACSHIP</h1>
                <p data-aos="fade-in" data-aos-duration="2000">Galacship is the one of the most powerful and safest operational rocket in the world. With the ability to lift into orbit nearly 60 metric tons (141,000 lb) - a mass greater than 737 jetliner loaded with passengers, crew, luggage and fuel - Galacship can lift more than twice the payload of the next closest operational vehicle, the Delta IV Heavy.</p>
            </div>

            <h6 data-aos="fade-in" data-aos-duration="1000">OVERVIEW</h6>

            <div class="overview">

                <div data-aos="fade-in" data-aos-duration="2000">
                    <h5>SINGLE ROCKET</h5>
                    <span>Galacship draws upon Falcon 9's proven design, which minimizes stage separation events and maxes reliability. The vehicle's heat shield is designed to withstand multiplle entries.</span>
                </div>

                <div data-aos="fade-in" data-aos-duration="2000">
                    <h5>REUSABILITY</h5>
                    <span>Galacship is the only reusable orbital-class small rocket. Capturing and reflying Galacship's first stage enables higher launch frequency without expanding production and lowers launch costs.
                    </span>
                </div>

                <div data-aos="fade-in" data-aos-duration="2000">
                    <h5>CARBON COMPOSITE</h5>
                    <span>The carbon composite protects satellites during delivery destinations in low Earth orbit (LEO), geosynchronous transfer orbit.</span>
                </div>

            </div>

        </div>


    </div>

    <div class="spacesuit">
        <img src="./img/astronaut.png" alt="" data-aos="fade-in" data-aos-duration="2000">
        <div class="spacesuit-desc">
            <h6 data-aos="fade-in" data-aos-duration="1000">SAFETY FIRST</h6>
            <h1 data-aos="fade-in" data-aos-duration="2000">To space,<br>back and safely</h1>
            <p data-aos="fade-in" data-aos-duration="2000">Safety is our top priority, which is why our space suits are designed by top quality brands like Nike, SpaceX and NASA. Wear our high impact polycarbonate helmet for though exploration conditions and titanium harness for climbing, cave exploration, and zip-line excursions. Our spacesuits are to die for (but not really).</p>

            <div class="product-info-wrapper" data-aos="fade-in" data-aos-duration="2000">
                <div class="product-info">
                    <div class="product-info_content">
                        <span class="value">100%</span>
                    </div>
                    <h5>successful landings</h5>
                </div>

                <div class="product-info">
                    <div class="product-info_content">
                        <span class="value">No. 1</span>
                    </div>
                    <h5>flight company in the world</h5>
                </div>
            </div>
        </div>
    </div>


    <!--last added-->

    <div data-aos="fade-in" data-aos-duration="2000" data-aos-delay="300" id="destinations" class="owl-container">
        <h5>OUR LATEST DESTINATIONS</h5>
        <div class="owl-carousel owl-theme">


            <?php foreach ($resultat as $review) echo "
        <a href=\"planete.php?id_voyage={$review["id_voyage"]}\">
        <div class=\"item\">
            <img src=\"{$review["img_destination"]}\" alt=\"\">
            <div class=\"glass\">
                <h2>{$review["nom_destination"]}</h2>
                <p>" . mb_strimwidth($review["produit_description"], 0, 100, "...") . "</p>

                <div class=\"rating\">
                    <span class=\"fa fa-star checked\"></span>
                    <span class=\"fa fa-star checked\"></span>
                    <span class=\"fa fa-star checked\"></span>
                    <span class=\"fa fa-star checked\"></span>
                    <span class=\"fa fa-star checked\"></span>
                </div>

                <div class=\"price\">
                <h3>$ " . number_format($review["voyage_prix"], 0, ".", ",") . "</h3><span style=\"font-size:medium\">/pers.</span></div>

            </div>
        </div>
    </a>"
            ?>
        </div>
        <button onClick="location.href='destinations.php';">Discover our destinations</button>

    </div>


    <footer>
        <nav class="footerlinks">
            <a href="index.php">Home</a>
            <a href="destinations.php">Destinations</a>
            <a href="mission.php">Circumlunar mission</a>
            <a href="contact.php">Contact</a>
            <a href="credits.php">Terms & Conditions</a>
            <a href="https://github.com/amelchabah" target="_blank"><img src="./img/icons/github.png" alt="" style="height:1.5rem"></a>
        </nav>
        <h6>&copy; Amel Chabah - 2022 - all rights reserved</h6>

    </footer>


    <!--scripts-->

    <script type="text/javascript" src="js/script.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--script unique a cette page, permettant de personnaliser le slider des derniers produits ajoutes-->
    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop: true,
            autoplay: {
                delay: 4000,
            },
            margin: 10,
            nav: false,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                800: {
                    nav: true,
                    items: 2
                },
                1100: {
                    items: 3,
                    nav: true
                }
            }
        })
    </script>
</body>


</html>