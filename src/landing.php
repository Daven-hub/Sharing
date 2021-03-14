<?php

session_start();
if (!isset($_SESSION['user']))
  header('Location:connexion.php')

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <title>BookSharing</title>
</head>

<body>
  <header class="header ">
    <div class="header__nav">
      <a href="" class="header__logo">
        <img src="../images/logo.svg" alt="logo">
      </a>

      <div class="header__icon">
        <a href="panier.php"><i class="fal fa-shopping-cart"></i></a>
        <div class="user__setting">
          <ul class="user__nav">
            <li><?php echo ucfirst($_SESSION['user']['NOM_PRENOM']); ?> <i class="far fa-user-circle"></i>
              <ul class="user__submenu">
                <li><a href=""><i class="far fa-question-circle"></i>Assisstance</a></li>
                <li><a href=""><i class="far fa-cog"></i>Paramètres</a></li>
                <li><a href=""><i class="fal fa-sign-out"></i>Déconnexion</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>

      <a href="#" class="header__menu">
        <span></span>
        <span></span>
        <span></span>
      </a>

    </div>
    <div class="header__action">
      <label class="header__search_bar">
        <input type="search" name="search" id="search" autocomplete="off" placeholder="Rechercher un livre">
        <button><label for="search"><i class="fal fa-search"></i></label></button>
      </label>
    </div>
  </header>
  <main class="main container">
    <nav class="main__navigation">
      <div class="nav__header">
        <h3>Catégories</h3>
      </div>
      <ul>
        <li class="sub__category">Sujets populaires</li>
        <li><a href="">Business</a></li>
        <li><a href="">Histoire</a></li>
        <li><a href="">Réligion</a></li>
        <li><a href="">Ordinateur</a></li>
        <li><a href="">Science</a></li>
        <li><a href="">Santé et bien être</a></li>
        <li class="sub__category">Fiction et action</li>
        <li><a href="">Crime</a></li>
        <li><a href="">Adultes</a></li>
        <li><a href="">Romance</a></li>
        <li><a href="">Suspense</a></li>
        <li><a href="">Science fiction</a></li>
        <li><a href="">Enfant et jeunesse</a></li>
      </ul>
    </nav>
    <div class="main__section">

      <!-- ici tu met tes section-->
      <section class="marketing__blog">
        <div class="marketing__text">
          <h3 class="title__tag">Livre de la semaine</h3>
          <h1 class="title">Libérer votre cerveau</h1>
          <h4 class="author__name">Idriss ABERKANE</h4>
        </div>
        <img src="../images/book1.svg" class="marketing__img" alt="book">
      </section>
      <section class="book">
        <h2 class="h2">Nouveautés</h2>
        <hr>
        <div class="new__book">
          <a href="presentation.php" class="book__items">
            <img src="../images/livre1.png" alt="">
            <div class="book__description">
              <h3 class="book__title">The Last Magician</h3>
              <p class="author__name">Bertrand Raul</p>
              <div class="book__appreciation">
                <i class=" active fas fa-star"></i>
                <i class=" active fas fa-star"></i>
                <i class=" active fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <p class="book__price">18 Fcfa</p>
            </div>
          </a>
          <a href="#" class="book__items">
            <img src="../images/livre1.png" alt="">
            <div class="book__description">
              <h3 class="book__title">The Last Magician</h3>
              <p class="author__name">Bertrand Raul</p>
              <div class="book__appreciation">
                <i class=" active fas fa-star"></i>
                <i class=" active fas fa-star"></i>
                <i class=" active fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <p class="book__price">18 Fcfa</p>
            </div>
          </a>
          <a href="#" class="book__items">
            <img src="../images/livre1.png" alt="">
            <div class="book__description">
              <h3 class="book__title">The Last Magician</h3>
              <p class="author__name">Bertrand Raul</p>
              <div class="book__appreciation">
                <i class=" active fas fa-star"></i>
                <i class=" active fas fa-star"></i>
                <i class=" active fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <p class="book__price">18 Fcfa</p>
            </div>
          </a>
          <a href="#" class="book__items">
            <img src="../images/livre1.png" alt="">
            <div class="book__description">
              <h3 class="book__title">The Last Magician</h3>
              <p class="author__name">Bertrand Raul</p>
              <div class="book__appreciation">
                <i class=" active fas fa-star"></i>
                <i class=" active fas fa-star"></i>
                <i class=" active fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <p class="book__price">18 Fcfa</p>
            </div>
          </a>
          <a href="#" class="book__items">
            <img src="../images/livre1.png" alt="">
            <div class="book__description">
              <h3 class="book__title">The Last Magician</h3>
              <p class="author__name">Bertrand Raul</p>
              <div class="book__appreciation">
                <i class=" active fas fa-star"></i>
                <i class=" active fas fa-star"></i>
                <i class=" active fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <p class="book__price">18 Fcfa</p>
            </div>
          </a>
        </div>

      </section>
    </div>

  </main>

  <?php include("../src/includes/footer.php") ?>

  <script src="./JS/app.js"></script>
</body>

</html>