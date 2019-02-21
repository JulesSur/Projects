<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <title>MyFeeds - Overview</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">
    
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:900i" rel="stylesheet">
    <link rel="stylesheet" href="../css/FontAwsome/css/fontawesome-all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Mr+Dafoe" rel="stylesheet">
    <link rel="icon" type="image/png" href="../img/logo.ico" sizes="16x16">

    <!--Jquery bibliotheek binnen laden-->
    <script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>

    <!--Binnen laden van de eerste artikels via contentLoader.php en extra content binnen laden als de scroll-bar bijna aan de bodem van de pagina bevind-->
    <script type="text/javascript" src="../js/ContentLoader.js"></script>
    <!--De Masonry script uitvoeren op de .items en de container #cards-->
    <script type="text/javascript" src="../js/masonry.js"></script>
    <!--Verstuur data (UID en ArtikelID) naar phpVerwerk als men op een "like" knop drukt-->
    <script type="text/javascript" src="../js/Toevoegen.js"></script>
    <!--Stiky Nav: zorgt er voor dat de navigatie balk zich boven aan de pagina bevind moest men naar beneden scrollen-->
    <script type="text/javascript" src="../js/StickyNav.js"></script>
    <!--ScrollTop: Scrold automatich naar de div top (#top) als men op het logo klikt-->
    <script type="text/javascript" src="../js/ScrollTop.js"></script>
    <!-- Het filteren van de data -->
    <script type="text/javascript" src="../js/filter.js"></script>
    <!--Zoekbalk zijn zoekfunctie-->
    <script type="text/javascript" src="../js/zoeken.js"></script>
    <!--Gaat na of de link actief er een link actief is zo wel verwijderd hij de classe active en geef hij deze classe door aan de laatst aangeklikte link-->
    <script type="text/javascript" src="../js/linkActiveChecker.js"></script>
    
    
</head>

        <body>
            <div id="top"></div>
            <header>
                <h1>Feeds</h1>
            </header>
            

            <nav>
                <div id="navRapper">
                <?php 
                    if (isset($_SESSION['u_id'])) {
                        /* This sets the $time variable to the current hour in the 24 hour clock format */
                        $time = date("H");
                        /* Set the $timezone variable to become the current timezone */
                        $timezone = date("e");
                        /* If the time is less than 1200 hours, show good morning */
                        if ($time < "12") {
                            echo "Goede morgen";
                            echo ', '.$_SESSION['u_id']; 
                        } else
                        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
                        if ($time >= "12" && $time < "17") {
                            echo "Goede namiddag";
                            echo ', '.$_SESSION['u_id']; 
                        } else
                        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
                        if ($time >= "17" && $time < "19") {
                            echo "Goede avond";
                            echo ', '.$_SESSION['u_id']; 
                        } else
                        /* Finally, show good night if the time is greater than or equal to 1900 hours */
                        if ($time >= "19") {
                            echo "Goede nacht";
                            echo ', '.$_SESSION['u_id']; 
                        } else {
                        echo 'Sorry, U bent niet aangemeld. maak hier uw account en ondek de mogelijkheden.';
                        }
                    }
                    ?>
                            <div id="accountNaam">
                        <!--User zijn login naam + afmeld knop-->
             
                    </div>
                </div>
            </nav>
                
            <div class="togelAside">
              <i class="fas fa-bars"></i>
             </div>
             
            
   
            
            <div id="container">
                <aside id="aside">
                    <aside id="asideWrapper">
                        <ul>
                            <li>
                                <i class="fas fa-home"></i><a href="overview.php">Overview</a>
                            </li>
                            <li>
                                <i class="far fa-heart"></i><a href="collectie.php">Mijn collectie</a>
                            </li>
                            <li>
                                <i class="fas fa-user-alt"></i><a href="../paginas/profiel.html">Mijn profiel</a>
                            </li>
                      
                                <li>
                                    <i class="fas fa-newspaper"></i><a href="#">Bronnen</a>
                                </li>
                                <li>
                                    <img src="../img/feedsLogos/StandaardLogo.png">Standaard
                                </li>
                                    <ul id="Standaard">
                                        <li class="optie">Trendy<div class="waardenAside"> De Standaard : Homepage</div></li>
                                        <li class="optie">Biz<div class="waardenAside"> De Standaard : Biz</div></li>
                                        <li class="optie">Binnenland<div class="waardenAside"> De Standaard : Binnenland</div></li>
                                        <li class="optie">Buitenland<div class="waardenAside"> De Standaard : Buitenland</div></li>
                                        <li class="optie">Cultuur en media<div class="waardenAside"> De Standaard : Cultuur en media</div></li>
                                        <li class="optie">Sport<div class="waardenAside"> De Standaard : Sport</div></li>
                                    </ul>
                                <li>
                                    <img src="../img/feedsLogos/HLNLogo.png">HLN
                                </li>
                                    <ul id="HLN">
                                        <li class="optie">Binnenland<div class="waardenAside">HLN Binnenland</div></li>
                                        <li class="optie">Buitenland<div class="waardenAside">HLN Buitenland</div></li>
                                        <li class="optie">iHLN<div class="waardenAside">HLN IHLN</div></li>
                                        <li class="optie">Sport<div class="waardenAside">HLN Sport</div></li>
                                    </ul>
                        
                        <?php
                            if(isset($_SESSION['u_id'])){
                             echo '<form id="afmelden" action="loguit.php" method="POST">
                                    <button type="submit" name="submit">
                                        <li>
                                            <i class="fas fa-sign-out-alt"></i>Afmelden
                                        </li>
                                    </button>
                                   </form>';
                            }                        
                        ?>
                           
                        </ul>
                        <div id="topScroll">
                            <a href="#top"><i class="far fa-arrow-alt-circle-up"></i></a>
                        </div>
                </aside>
            </aside>
            
        <!--Loading screen moest er een heel slechte connectie zijn met d00e databank.
        Krijgt de gebruiker een laad venster te zien om op zijn minst enige response te geven.-->
            <div id ="loading">
                <div class='loader'></div>
                 <p>Even geduld...</p>
            </div>
        

            
            <div class="content">
                <div id="zoekBalk">
                    <div id="zoekBalkWrapper">
                        <button><i class="fas fa-search"></i></button>
                        <input id="zoeker" type="text" placeholder="Zoeken"></button>
                    </div>
                </div>
                    <div id="masonry" class="clearfix">
                       <!--Artikels worden hier binnen geladen van uit de ../php/contentLoader.php-->
                    </div>
                </div>
         
            </div>
            <div id="result">Feed werd toegevoegd aan uw collectie</div>
    </body>
</html>




