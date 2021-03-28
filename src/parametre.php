<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./CSS/style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title> BookSharing </title>
  </head>
  <body class= "register__page">

<?php session_start(); require_once('config.php');?>
<header class="header ">
  <div class="header__nav">
    <a href="/Booksharing/index.php" class="header__logo">
      <img src="/Booksharing/images/logo.svg" alt="logo">
    </a>

    <div class="header__icon">
      <a href="/Booksharing/src/panier.php"><i class="fal fa-shopping-cart"></i></a>
      <?php if (isset($_SESSION['user']['NOM_PRENOM'])) : ?>
        <div class="user__setting">
          <ul class="user__nav">
            <li> <?= ucfirst($_SESSION['user']['NOM_PRENOM']); ?> <i class="far fa-user-circle"></i>
              <ul class="user__submenu">
                <li><a href=""><i class="far fa-question-circle"></i>Assisstance</a></li>
                <li><a href="/Booksharing/src/parametre.php"><i class="far fa-cog"></i>Paramètres</a></li>
                <li><a href="/Booksharing/src/déconnexion.php"><i class="fal fa-sign-out"></i>Déconnexion</a></li>
              </ul>
            </li>
          </ul>
        </div>
      <?php endif ?>
    </div>

    <a href="#" class="header__menu">
      <span></span>
      <span></span>
      <span></span>
    </a>
  </div>
  <div class="header__action">
  <form action="" method="GET">
  <label class="header__search_bar">
      <input type="search" name="search" id="search" autocomplete="off" placeholder="Rechercher un livre">
      <button type="submit"><label for="search"><i class="fal fa-search"></i></label></button>
    </label><br>
  </form>
    <?php if (!isset($_SESSION['user']['NOM_PRENOM'])) : ?>
      <div class="header__cta">
        <a href="/Booksharing/src/connexion.php" class="btn btn__border">Connection</a>
        <a href="/Booksharing/src/inscription.php" class="btn btn__colored">Inscription <i class="fal fa-long-arrow-right"></i></a>
      </div>
    <?php endif ?>
  </div>
</header>



    <main class="main container">

    <?php include './includes/settings.php' ?>
    
    <div class="main__section">
      <section>
        
        <!--
        <center>
          <a href="?setting=default"> <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
           <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_vaulkzeq.json" mode="bounce" background="transparent"  speed="1"  style="width: 600px; height: 600px;"  loop  autoplay></lottie-player></a>
        </center>
        --->
        <?php
           if(isset($_GET['setting']))
                  {
                    $sett = htmlspecialchars($_GET['setting']);
                    
              switch($sett)
              {
                   case 'compte':    
                     include ('./includes/setting/compte.php');
                     break;
                    
                   case 'livres':    
                     include ('./includes/setting/mybook.php');
                    break;  

                    case 'commande':    
                      include ('./includes/setting/mycommand.php');
                      break;
                     
                    case 'secure':    
                      include ('./includes/setting/secure.php');
                     break;   
                    
                     case 'prime':    
                      include ('./includes/setting/prime.php');
                      break;
                     
                    case 'adresse':    
                      include ('./includes/setting/adresse.php');
                     break;  
 
                     case 'message':    
                       include ('./includes/setting/message.php');
                       break;
                      
                     case 'aide':    
                       include ('./includes/setting/aide.php');
                      break; 

                      case 'app':    
                        include ('./includes/setting/app.php');
                       break;  
              }    
        }
        ?>
      </section>
    </div>
    </main>
  </body>
</html>