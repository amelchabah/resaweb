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

    <title>Circumlunar mission</title>
</head>


<body>
    <?php
    include("connexion.php");
    $requete = "SELECT * FROM voyage WHERE id_voyage=1";
    $stmt = $db->query($requete);
    $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);
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


    <main>
        <div class="container">
            <div class="nav-slider">
                <div class="right-btn"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAABBElEQVR4nO3bu03EYBSEUURnFMBCANoAKgfxEnSxSENAQGLHc9n/nAquvpHswPLFBQAAAAAAAAAAAPCPJLlN8pbkOclV+56lJDkmOeXPU/umZWzET5KX9l1L2Il/SnLTvu3sJbnfiP+d5KF929kTv0j8IvGLxC8Sv0j8IvGLxC8Sv0j8IvGLxC8Sv0j8IvGL8vsNd+tjyrF92xKSfK4U/7J9AMN4BA2Q5G7nJfzYvm0ZRhjACAMYYQAjDGCEAYwwgBEGMMIARhjACAMYYQAjDGCEAYwwgBEGyP5Peof2bcvYGeG9fddSNkb4at+0nCSHJK9JPpJct+8BAAAAAAAAAACA8/YDvxVEVJFI9aEAAAAASUVORK5CYII=">
                </div>
                <div class="left-btn"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGAAAABgCAYAAADimHc4AAAABmJLR0QA/wD/AP+gvaeTAAAA+UlEQVR4nO3csU0DURREUYvOqMAOQA6gchAQUIaRxgFLguwQ5sE/p4KnuSs72t3tAAAAAAAAAAAAgB+U5DbJc5LXJPv2PcvZxv9ySnJs37SU7cmPCCVJDtvoIrQkubsQ4SPJY/u2ZYgwgAgDiDCACAOIMIAIA4gwgAgDiDCACAOIMIAIA4gwgAgDiDBAkuOFCKckh/Zty7gS4b1913c37QN+WdoHLMFPUFGS+yt/wg/t2/494xcZv8j4RcYvMn6R8YuMX2T8IuMXGb/I+EXGLzJ+kfGLjF8UL+l1JXkzflG8qN2Vz08VPCV5iU8VAAAAAAAAAAAAwB9zBrxJRTlcFzv0AAAAAElFTkSuQmCC">
                </div>
            </div>

            <div class="discover">
                <a href="#mission" id="mission">
                    <h4>DISCOVER</h4>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAABmJLR0QA/wD/AP+gvaeTAAAAhElEQVRIie3UPQ6AIAxAYS4h0fvfRCf/Fhk8znOwAyFGkcLWl5g4WL50QOcsy7JqBYzABvgKZ3lgB6acjxfuggYXNMhZc85ABxwycAJDAZqe0ZcOZuPFqAZXoyV4NfQPXh3NwZuhb3hzNMLjuxmSd/UP5wuPt2y76QPugVWetptalmWlXc/UbESIyB5IAAAAAElFTkSuQmCC">
                </a>
            </div>

            <div class="diapo-title">
                <h1>Witness Earthrise</h1>
            </div>

            <div class="js-slider" id="decaleGauche">
                <div class="js-photos">
                    <!--the first and last slide are clones, for infinite loop-->
                    <div class="js-photo" style="background-image: url('./img/moonview.jpg');">
                    </div>

                    <div class="js-photo" style="background-image: url('./img/moonbg.jpg');">
                    </div>
                    <div class="js-photo" style="background-image: url('./img/astro.jpg');">
                    </div>
                    <div class="js-photo" style="background-image: url('./img/moonview.jpg');">
                    </div>

                    <div class="js-photo" style="background-image: url('./img/moonbg.jpg');">
                    </div>
                </div>

                <!--arrows buttons credits to icons8.com-->
            </div>
        </div>


        <section class="mission-section">
            <article>
                <h1>CIRCUMLUNAR MISSION</h1>
                <p><?php foreach ($resultat as $moon) echo "{$moon["produit_description"]}" ?></p>
            </article>
            <aside>
                <div>
                    <h2>How long does the tour take ?</h2>
                    <p>It takes about 3 days to reach the Moon from Earth. <b>A circumlunar mission would last approximately 6 days.</b></p>
                </div>
                <div>
                    <h2>How much would it cost ?</h2>
                    <p>This circumlunar tour costs <b>$ <?= number_format($moon["voyage_prix"], 0, ".", ",") ?></b> per passenger.</b><br>No visa required, no baggage fees.</p>
                </div>

            </aside>
        </section>

        <div class="gallery">
            <h5>PHOTO GALLERY</h5>
            <img src="./img/earth-soil-creep-moon-lunar-surface-87009.jpeg" alt="" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="300">
            <img src="./img/moon-landing-apollo-11-nasa-buzz-aldrin-41162.jpeg" alt="" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="500">
            <img src="./img/earthrise-apollo.png" alt="" data-aos="fade-in" data-aos-duration="2000" data-aos-delay="700">
        </div>


        <section>
            <div class="book-ad">
                <h2>Ready to blast off ? 🚀</h2>
                <p>The experience of a lifetime is only a few steps away. Pick a departure date and book your travel today.<br>We look forward to have you on board.</p>
                <button onClick="location.href='book.php?id_voyage=1';">Book your circumlunar trip today</button>
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



    <!--script-->

    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/slider.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</body>

</html>