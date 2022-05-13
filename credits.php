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
    <title>Terms & conditions</title>
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


    <main class="container wrapper">
        <div class="credits">
            <article>
                <div>
                    <h1>Meet the creator!</h1>
                    <br>
                    <p>Hi, I'm <b>Amel Chabah</b> and I'm 18 years old. <b>First year multimedia student and digital artist in my
                            spare time,</b> I'm learning to manage multimedia projects through all their aspects, whether it is
                        design, web development or audiovisual.
                        Motivated and passionate about the artistic field since childhood, I know how to put my
                        creativity to good use and like to expand my visual universe whether in music, drawing, or design.
                        <br><br><b>You guessed it, this website is purely fictional.</b>
                    </p>
                </div>
                <img src="./img/3dastro.png" alt="">

            </article>

            <article>
                <h5>Legislation on personal data</h5>
                <br>

                <p><b>Host :</b> o2switch.fr - 222-224 Boulevard Gustave Flaubert - 63000 Clermont-Ferrand, France
                    <br><br>
                    The collection of personal data on this website occurs only at the time of booking, in order to send you the confirmation email. Your data will never be transmitted to third parties and will never be marketed. These data are kept in the database of the website, accessible by the data protection officer only.
                    For any request for deletion or any question related to the collection or processing of your personal data through the website, you can leave a mail to : <b>amel.chabah@edu.univ-eiffel.fr</b>.
                    They will be removed as soon as possible.
                    <br><br>
                    This website constitutes a work of the spirit within the meaning of the Code of the Intellectual Property.
                    <br>
                    All images used are licensed under Creative Commons or equivalent (from pexels, icons8, free3dicon, wikimedia.commons...), and will remain in the context of university projects : no image will be used for commercial use.
                </p>
            </article>
        </div>

        <button class="back-button" type="button" onclick="history.back()">Go Back</button>
    </main>


    <br>
    <br>

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