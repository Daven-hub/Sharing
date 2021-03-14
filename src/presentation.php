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

  <?php include 'includes/header.php' ?>

  <main class="main container">
    <?php include 'includes/navigation.php' ?>
    <div class="main__section">

      <!-- ici tu met tes section-->

      <?php
      if(isset($_GET['reg_err']))
      {
        $err = htmlspecialchars($_GET['reg_err']);

        switch($err)
            {
              case 'succes':
                ?>
                <div class="error__ error__succes"><i class="fas fa-check-circle"></i></i> Commande Effectuée !</div>
              <?php
              break; 
              
              case 'echec':
                ?>
                <div class="error__ error__message"><i class="fas fa-check-circle"></i></i> Commande Echoué !</div>
              <?php
              break;

            }
          }
              
         ?>




      <section class="book book__statut">
        <div class="statut__model">
          <?php
        require_once('config.php');
        if(isset($_GET['isbn']))
        {
           $select = $bdd -> query("SELECT * FROM livre WHERE ISBN='".$_GET['isbn']."'") -> fetch();     
             ?>
          <div class="statut__head">
            <div class="statut__image">
              <img src="./Book_Images/<?php echo $select['IMAGE1']; ?>" alt="Image">
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
                  <h2 class="book__title"><?php echo $select['TITRE']; ?></h2>
                  <h3 class="author__name"><?php echo $select['NOM_AUTEUR']; ?></h3>
                </div>
                <div>
                  <h1 class="book__price"><span><?php echo $select['PRIX']; ?></span> Fcfa</h1>
                </div>

              </div>
              <div class="book__headline">
                <p><?php echo $select['DESCRIPTION']; ?></p>
              </div>
              <div class="statut__cta">
                <a href="presentation.php?isbn_panier=<?php echo $select['ISBN']; ?>" class="btn btn__border">Ajouter au Panier</a>
                <div class="flex">
                  <a href="#modal1" class="js-modal btn louer btn__secondary">Louer</a>
                  <a href="#modal2" class="js-modal btn achat btn__colored">Acheter</a>
                </div>
              </div>
            </div>
          </div>

         

          <div class="statut__detail">
            <div class="detail__head">
              <h3>Plus de détails</h3>
            </div>
            <div class="detail__content book__description">
              <p> <span>Auteur:</span> <?php echo $select['NOM_AUTEUR']; ?></p>
              <p><span>Titre:</span> <?php echo $select['TITRE']; ?></p>
              <p><span>Langue:</span> <?php echo $select['LANGUE']; ?></p>
              
              <p><span>Catégorie:</span> <?php  $selectCAT = $bdd -> query("SELECT NOM_CAT FROM categorie WHERE ID_CAT='".$select['ID_CAT']."'") -> fetch();    echo $selectCAT['NOM_CAT']; ?></p>
              <div class="book__appreciation">
                <i class=" active fas fa-star"></i>
                <i class=" active fas fa-star"></i>
                <i class=" active fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
            </div>

          </div>
          <?php  }
          if (isset($_GET['isbn_panier']))
          {
            
            if(isset($_SESSION['id_cmd']))
            {
               var_dump($_SESSION['id_cmd']);
               $id_cmd =$_SESSION['id_cmd'];
               $isbnp = $_GET['isbn_panier'] ;
        $insertpanier = $bdd->prepare("INSERT INTO commande_livre VALUES( '$id_cmd','$isbnp', '1')");
        $insertpanier->execute(array(
           'id' => $_SESSION['id_cmd'],
           'isbn' => $_GET['isbn_panier'],
           'quantite' => '1'
        ));
            }else{
              $_SESSION['panier'] = true ;
              if( $_SESSION['panier'] == true)
              {
                
                $id = $_SESSION['user']['ID_USER'];
              $insert = $bdd->prepare("INSERT INTO commande(ID_CMD, ID_USER, DATE_CMD, ADRESS_LIV, OPTION_CMD, DATE_LIV  ) VALUES(null,'$id','2021-04-04',  'Bonaberie', 'Achat', '2021-04-04')");
              $insert -> execute();
                 var_dump($insert);
                 var_dump($bdd -> lastInsertId());
                // $_SESSION['panier'] = false;
                 $_SESSION['id_cmd'] = $bdd -> lastInsertId();
                 $insertpanier = $bdd->prepare('INSERT INTO commande_livre VALUES(:id, :isbn, :quantite)');
                 $insertpanier->execute(array(
                    'id' => $_SESSION['id_cmd'],
                    'isbn' => $_GET['isbn_panier'],
                    'quantite' => '1'
                 ));
              }
              
            }

          }
          ?>
        </div>
      </section>
      <!----Ma Fenetre Modal-->
      
      <aside id="modal1" class="modal" aria-hidden="true" role="dialog" aria-labelledby="titlemodal" style="display:none;">
        <div class="modal-wrapper js-modal-stop">
        <button class="js-modal-close">X</button>
          <h1 id="titlemodal">BookSharing Info: Location du livre <strong class="UP"><?php echo $select['TITRE']; ?></strong></h1>
          <?php
          if (isset($_GET['reg_err'])) {
            $err = htmlspecialchars($_GET['reg_err']);

            switch ($err) {

              case 'noconnect':
                echo "<script>alert(\"vous devez vous connecter\");</script>";
                break;
            }
          }
          ?>
          <p>Pour la colcation de <strong class="UP"><?php echo $select['TITRE']; ?></strong> veuillez remplir le formulaire, vous n'aurez le livre que pour une période <strong class="UP"> 10 Jours </strong> Renouvellable</p>
          <form action="presentation_traitement.php?isbn=<?php echo $select['ISBN']; ?>" method="post">
            <input type="text" name="lieu" id="" placeholder="Lieu de Livraison"><br><br>
            <label for="date">Entrez la date de livarison :</label>
            <input type="date" name="date" id="" placeholder="Date de Livraison"><br><br>
            <button class="btn btn__colored" name="btn__ok">Ok</button>
          </form>
        </div>
      </aside>

      
      <aside id="modal2" class="modal" aria-hidden="true" role="dialog" aria-labelledby="titlemodal" style="display:none;">
        <div class="modal-wrapper js-modal-stop">
        <button class="js-modal-close">X</button>
          <h1 id="titlemodal">BookSharing Info: Achat du livre <strong class="UP"><?php echo $select['TITRE']; ?></strong></h1>
          <?php
          if (isset($_GET['reg_err'])) {
            $err = htmlspecialchars($_GET['reg_err']);

            switch ($err) {

              case 'noconnect':
                echo "<script>alert(\"vous devez vous connecter\");</script>";
                break;
            }
          }
          ?>
          <p>Pour l'achat du livre <strong class="UP"><?php echo $select['TITRE']; ?></strong> , veuillez renseigner le formulaire suivant et vous serez livré dans un délais de 48h</p>
          <form action="presentation_traitement.php?isbn=<?php echo $select['ISBN']; ?>" method="post">
            <input type="text" name="lieu" id="" placeholder="Lieu de Livraison"><br><br>
            <label for="date">Entrez la date de livarison :</label>
            <input type="date" name="date" id="" placeholder="Date de Livraison"><br><br>
            <button class="btn btn__colored" name="btn__ok">Ok</button>
          </form>
        </div>
      </aside>

      <a href="ajout.php"><button class="btn btn__ajouter">Ajouter Vos Propres Livres</button></a>
      <section class="book">
        <h2 class="h2">Dans la même catégorie</h2>
        <hr>
        <div class="new__book">
         <?php
         $isbn = null ;
           if(isset($_GET['isbn']))
           {
             $isbn =$_GET['isbn'];
           }
                if (isset($_GET['search'] )){
                  $search = htmlspecialchars($_GET['search'] );
                  $select = $bdd -> query("SELECT * FROM livre WHERE TITRE LIKE  '%".$search."%' OR NOM_AUTEUR LIKE  '%".$search."%' AND ISBN!='".$isbn."'") -> fetchAll();
                  if($select == null)
                  {
                    echo "Aucun resultat trouvé pour " .$search ;
                  }
                  
                }else if (isset($_GET['ID_CAT'] ))
                {
                  $cat = htmlspecialchars($_GET['ID_CAT'] );
                  $select = $bdd -> query("SELECT * FROM livre WHERE ID_CAT=".$_GET['ID_CAT']." AND ISBN!='".$isbn."'" ) -> fetchAll();
                  if($select == null)
                  {
                    echo "Aucun resultat trouvé pour cette catégorie "  ;
                  }
                }
                else{
                  $select = $bdd -> query("SELECT * FROM livre WHERE ISBN!='".$isbn."'") -> fetchAll();

                }

                foreach($select AS $row)
                {
                  
               ?>
          <a href="./presentation.php?isbn=<?php echo $row['ISBN']; ?>" class="book__items">
            <img src="./Book_Images/<?php echo $row['IMAGE1']; ?>" alt="">
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

  <?php include "includes/footer.php" ?>
  <script src="./JS/app.js"></script>
</body>

</html>