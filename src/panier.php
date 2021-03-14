<?php  
   require_once 'config.php';
     if(isset($_SESSION['user']))
      {
        header('Location:connexion.php');
      }
      else
        
  ?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>BookSharing</title>
</head>
<body>

<?php include 'includes/header.php' ?>

    <div class="main__section">
       <section class="book__shop">
         <div class="shop__head">
           <h3>Mon panier</h3>
           <p>Les articles ajoutés au panier s’afficherons ici</p>
         </div>
         <div class="shop__articles">
           <div class="articles__items">
            <div class="statut__head">
              <div class="statut__image">
                <img src="../images/five-feet-apart-9781534437333_hr-679x1024.png" alt="Image">
              </div>
        <div class="statut__text">
         <div class="statut__header book__description">
           <div>
             <div class="book__appreciation">
              <i class=" active fas fa-star"></i>
              <i class=" active fas fa-star"></i>
              <i class=" active fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h2 class="book__title">Five Feet APART</h2>
            <h3 class="author__name">Bertrand Raoul</h3>
           </div>
           <div>
             <h1 class="book__price"><span>18</span> Fcfa</h1>
           </div>
      
         </div>
         <div class="quantity flex">
           <div class="form__group">
             <label for="book__number">Quantité : </label>
             <input type="number" name="" id="book__number">
           </div>
           <button class="btn btn__warning">Supprimer</button>
         </div>
        </div>
          </div>
           </div>
         </div>
         <div class="shop__articles">
           <div class="articles__items">
            <div class="statut__head">
              <div class="statut__image">
                <img src="../images/five-feet-apart-9781534437333_hr-679x1024.png" alt="Image">
              </div>
        <div class="statut__text">
         <div class="statut__header book__description">
           <div>
             <div class="book__appreciation">
              <i class=" active fas fa-star"></i>
              <i class=" active fas fa-star"></i>
              <i class=" active fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h2 class="book__title">Five Feet APART</h2>
            <h3 class="author__name">Bertrand Raoul</h3>
           </div>
           <div>
             <h1 class="book__price"><span>18</span> Fcfa</h1>
           </div>
      
         </div>
         <div class="quantity flex">
           <div class="form__group">
             <label for="book__number">Quantité : </label>
             <input type="number" name="" id="book__number">
           </div>
           <button class="btn btn__warning">Supprimer</button>
         </div>
        </div>
          </div>
           </div>
         </div>
         <div class="shop__articles">
           <div class="articles__items">
            <div class="statut__head">
              <div class="statut__image">
                <img src="../images/five-feet-apart-9781534437333_hr-679x1024.png" alt="Image">
              </div>
        <div class="statut__text">
         <div class="statut__header book__description">
           <div>
             <div class="book__appreciation">
              <i class=" active fas fa-star"></i>
              <i class=" active fas fa-star"></i>
              <i class=" active fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <h2 class="book__title">Five Feet APART</h2>
            <h3 class="author__name">Bertrand Raoul</h3>
           </div>
           <div>
             <h1 class="book__price"><span>18</span> Fcfa</h1>
           </div>
      
         </div>
         <div class="quantity flex">
           <div class="form__group">
             <label for="book__number">Quantité : </label>
             <input type="number" name="" id="book__number">
           </div>
           <button class="btn btn__warning">Supprimer</button>
         </div>
        </div>
          </div>
           </div>
         </div>
         <div class="shop__cost">
           <div class="total__price">TOTAL : <span>12500</span> Frcfa</div>
           <div class="shop__cta">
             <a href="#" class="btn btn__secondary">Continuer les achats</a>
             <a href="#" class="btn btn__success">Valider la commande</a>
           </div>
         </div>
       </section>
    </div>
  </main>

     <?php include("includes/footer.php") ?>

  <script src="../src/JS/app.js"></script>
</body>
</html>