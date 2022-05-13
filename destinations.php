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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha256-YLGeXaapI0/5IgZopewRJcFXomhRMlYYjugPLSyNjTY=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/css/swiper.min.css" integrity="sha256-DBYdrj7BxKM3slMeqBVWX2otx7x4eqoHRJCsSDJ0Nxw=" crossorigin="anonymous">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <Link rel="stylesheet" href="css/style.css" type="text/css">

    <title>Desinations to explore</title>
</head>


<body>
    <?php
    include("connexion.php");
    $requete = "SELECT * FROM lien INNER JOIN voyage ON id_voyage=ext_voyage INNER JOIN categorie ON id_categorie=ext_categorie WHERE ext_categorie>=3";
    $stmt = $db->query($requete);
    $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);
    ?>

    <?php
    # fonction : remplacer les milliers par des K (pour les distances) etc (faciliter lecture).
    function readable_number($n)
    {

        // supprimer tout formatage;
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

    <!--note : slider construit et personnalisé avec swiper.js (swiper API)
    code javascript : sliderscript.js-->

    <div class="screen">
        <div class="container">
            <div class="slider-container blue">
                <div class="row">

                    <div class="col-md-5 pr-md-0">
                        <div class="img-container">
                            <?php foreach ($resultat as $img) echo "<div class=\"img-wrapper\"><img src=\"{$img["img_destination"]}\" alt=\"\"></div>" ?>
                        </div>
                    </div>

                    <div class=""></div>
                    <div class="col-md-7">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">



                                <?php foreach ($resultat as $planete) echo "
                                
                                <div class=\"swiper-slide p-md-5 p-3\">
                                    <div class=\"name\">
                                        <div class=\"sub-title\">
                                            <div class=\"text-wrapper\"><h5>ROUND TRIP TO</h5>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-11 offset-md-1\">
                                                <div class=\"title\">
                                                    <div class=\"text-wrapper\"><span>{$planete["nom_destination"]}</span></div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
    
                                    <div class=\"overview\">
                                        <div class=\"title\">
                                            <div class=\"text-wrapper\">
                                                <div class=\"product-price\">
                                                    <span class=\"price-value\">$ " . number_format($planete["voyage_prix"], 0, ".", ",") . "</span>
                                                    <span>/pers.</span>
                                                </div>
                                            </div><div class=\"text-wrapper categ\"><h5>{$planete["categorie_nom"]}</h5></div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-11 offset-md-1\">
                                                <div class=\"text-wrapper\">
                                                <p class=\"description\">" . mb_strimwidth($planete["produit_description"], 0, 190, "...") . "</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=\"details\">
                                    <div class=\"distance\">
                                    <span>" . readable_number($planete["distance_terre"], 0, ".", ",") . "</span>
                                    <span>KM</span>
                                    </div>

                                        <a href=\"planete.php?id_voyage={$planete["id_voyage"]}\"><button type=\"button\" class=\"details-btn\">More infos</button></a>
                                    </div>
                                </div>

                                " ?>

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-slider" style="z-index: -10;">
            <div class="right-btn"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAABBElEQVR4nO3bu03EYBSEUURnFMBCANoAKgfxEnSxSENAQGLHc9n/nAquvpHswPLFBQAAAAAAAAAAAPCPJLlN8pbkOclV+56lJDkmOeXPU/umZWzET5KX9l1L2Il/SnLTvu3sJbnfiP+d5KF929kTv0j8IvGLxC8Sv0j8IvGLxC8Sv0j8IvGLxC8Sv0j8IvGL8vsNd+tjyrF92xKSfK4U/7J9AMN4BA2Q5G7nJfzYvm0ZRhjACAMYYQAjDGCEAYwwgBEGMMIARhjACAMYYQAjDGCEAYwwgBEGyP5Peof2bcvYGeG9fddSNkb4at+0nCSHJK9JPpJct+8BAAAAAAAAAACA8/YDvxVEVJFI9aEAAAAASUVORK5CYII=">
            </div>
            <div class="left-btn"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAAA+UlEQVR4nO3csU0DURREUYvOqMAOQA6gchAQUIaRxgFLguwQ5sE/p4KnuSs72t3tAAAAAAAAAAAAgB+U5DbJc5LXJPv2PcvZxv9ySnJs37SU7cmPCCVJDtvoIrQkubsQ4SPJY/u2ZYgwgAgDiDCACAOIMIAIA4gwgAgDiDCACAOIMIAIA4gwgAgDiDBAkuOFCKckh/Zty7gS4b1913c37QN+WdoHLMFPUFGS+yt/wg/t2/494xcZv8j4RcYvMn6R8YuMX2T8IuMXGb/I+EXGLzJ+kfGLjF8UL+l1JXkzflG8qN2Vz08VPCV5iU8VAAAAAAAAAAAAwB9zBrxJRTlcFzv0AAAAAElFTkSuQmCC">
            </div>
        </div>


    </div>
    </div>



    <button class="back-button" type="button" onclick="history.back()">Go Back</button>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha256-fzFFyH01cBVPYzl16KT40wqjhgPtq6FFUB6ckN2+GGw=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js" integrity="sha256-4sETKhh3aSyi6NRiA+qunPaTawqSMDQca/xLWu27Hg4=" crossorigin="anonymous"></script>
    <script src="js/swiperscript.js"></script>

</body>



</html>