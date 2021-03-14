
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/CSS/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <title>BookSharing</title>
</head>

<body>
  <?php include 'src/includes/header.php' ?>

  <main class="main container">
    <?php include 'src/includes/navigation.php' ?>

    <div class="main__section">
      <!-- ici tu met tes section-->
      <section class="marketing__blog">
        <div class="marketing__text">
          <h3 class="title__tag">Livre de la semaine</h3>
          <h1 class="title">Libérer votre cerveau</h1>
          <h4 class="author__name">Idriss ABERKANE</h4>
        </div>
        <img src="./images/book1.svg" class="marketing__img" alt="book">
      </section>
      <section class="book">
        <h2 class="h2">Nouveautés</h2>
        <hr>
        <div class="new__book">
         <?php
                require_once('./src/config.php');
                if (isset($_GET['search'] )){
                  $search = htmlspecialchars($_GET['search'] );
                  $select = $bdd -> query("SELECT * FROM livre WHERE TITRE LIKE  '%".$search."%' OR NOM_AUTEUR LIKE  '%".$search."%'") -> fetchAll();
                  if($select == null)
                  {
                    echo "Aucun resultat trouvé pour " .$search ;
                  }
                  
                }else if (isset($_GET['ID_CAT'] ))
                {
                  $cat = htmlspecialchars($_GET['ID_CAT'] );
                  $select = $bdd -> query("SELECT * FROM livre WHERE ID_CAT=".$_GET['ID_CAT'] ) -> fetchAll();
                  if($select == null)
                  {
                    echo "Aucun resultat trouvé pour cette catégorie "  ;
                  }
                }
                else{
                  $select = $bdd -> query('SELECT * FROM livre') -> fetchAll();

                }

                foreach($select AS $row)
                {
                  
               ?>
          <a href="./src/presentation.php?isbn=<?php echo $row['ISBN']; ?>" class="book__items">
            <img src="./src/Book_Images/<?php echo $row['IMAGE1']; ?>" alt="">
            <div class="book__description">
              <h3 class="book__title"><?php echo $row['TITRE']; ?></h3>
              <p class="author__name"><?php echo $row['NOM_AUTEUR']; ?></p>
              <div class="book__appreciation">
                <i class=" active fas fa-star"></i>
                <i class=" active fas fa-star"></i>
                <i class=" active fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <p class="book__price"><?php echo $row['PRIX']; ?> Fcfa</p>
            </div>
          </a> 
          <?php
              }
               ?>
          
        </div>

      </section>
    </div>

  </main>
  <?php include "src/includes/footer.php" ?>
  <script src="./src/JS/app.js"></script>
</body>
</html>
