<?php session_start();?>
<header class="header ">
  <div class="header__nav">
    <a href="/Booksharing/index.php" class="header__logo">
      <img src="/Booksharing/images/logo.svg" alt="logo">
    </a>
    <?php
       try{
        $bdd = new PDO('mysql:host=localhost; dbname=booksharing;charset=utf8', 'root', '');
    }catch(Exception $e)
    {
     die('Erreur' .$e->getMessage());   
    }
        $prixt = 0;
        if (isset($_SESSION['user'])) {

          $query = "SELECT count(*) as nbr from livre l,commande c,commande_livre cl WHERE l.ISBN=cl.ISBN and c.ID_CMD=cl.ID_CMD and c.ID_USER=" . $_SESSION['user']['ID_USER'];
          $select = $bdd->query($query)->fetch();
          
        }
      
          
          ?>

    <div class="header__icon">
    <span class="shop"><?php $nbr=0;  if (isset($_SESSION['user'])) { echo $select['nbr']; } ?></span>
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