<?php
require_once 'config.php';
if (isset($_SESSION['user'])) {
  header('Location:connexion.php');
} else

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./CSS/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="shortcut icon"  href="/Booksharing/images/logo.svg">
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <title>BookSharing</title>
</head>

<body>

  <?php include 'includes/header.php' ?>
  <main class="main container">
 
    <div class="main__section">
      <section class="book__shop">
        <?php
        if (isset($_GET['reg_err'])) {
          $err = htmlspecialchars($_GET['reg_err']);

          switch ($err) {

            case 'succes':
        ?>
              <div class="error__ error__succes"><i class="fas fa-check-circle"></i></i> Suppression Réussie !</div>
            <?php
              break;

            case 'error':
            ?>
              <div class="error__ error__message"><i class="fas fa-exclamation-circle"></i></i> Suppression Echoué !</div>
        <?php
              break;
          }
        }
        ?>
        <div class="shop__head">
          <h3>Mon panier</h3>
          <p>Les articles ajoutés au panier s’afficherons ici</p>
        </div>
        <?php
        require_once("config.php");
        $prixt = 0;
        if (isset($_SESSION['user'])) {

          $query = "SELECT l.* from livre l,commande c,commande_livre cl WHERE l.ISBN=cl.ISBN and c.ID_CMD=cl.ID_CMD and c.ID_USER=" . $_SESSION['user']['ID_USER'] . " GROUP by ISBN";
          $select = $bdd->query($query)->fetchAll();
          foreach ($select as $row) {
            $prixt += $row['PRIX'];
        ?>
            <div class="shop__articles">
              <div class="articles__items">
                <div class="statut__head">
                  <div class="statut__image">
                    <img src="./Book_Images/<?php echo $row['IMAGE1']; ?>" alt="Image">
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
                        <h2 class="book__title"><?php echo $row['TITRE']; ?></h2>
                        <h3 class="author__name"><?php echo $row['NOM_AUTEUR']; ?></h3>
                      </div>
                      <div>
                        <h1 class="book__price"><span id="prix_<?= $row['ISBN']; ?>"><?php echo $row['PRIX']; ?></span> Fcfa</h1>
                      </div>

                    </div>
                    <div class="quantity flex">
                      <div class="form__group">
                        <label for="book__number">Quantité : </label>
                        <input type="number" name="" id="book__number" min="1" max="10" isbn="<?= $row['ISBN']; ?>" onchange="calculqt(this.getAttribute('isbn'), this.value, <?= $row['PRIX']; ?>)">
                      </div>
                      <button class="btn btn__warning"><a href="?ISBN=<?php echo $row['ISBN']; ?>"> Supprimer</a></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <?php }
        } ?>
        <div class="shop__cost">
          <div class="total__price">TOTAL : <span id="total__price"><?php echo $prixt; ?></span> Frcfa</div>
          <div class="shop__cta">
            <a href="/BookSharing/index.php" class="btn btn__secondary">Continuer les achats</a>
            <a href="#modal1" class="js-modal btn btn__success">Valider la commande</a>
            
          </div>
        </div>
      </section>

      <!----Ma Fenetre Modal-->
      <aside id="modal1" class="modal" aria-hidden="true" role="dialog" aria-labelledby="titlemodal" style="display:none;">
      <?php 
        $query = "SELECT l.* from livre l,commande c,commande_livre cl WHERE l.ISBN=cl.ISBN and c.ID_CMD=cl.ID_CMD and c.ID_USER=" . $_SESSION['user']['ID_USER'] . " GROUP by ISBN";
        $select = $bdd->query($query)->fetchAll();
        foreach ($select as $row){}
      
      ?>
        <div class="modal-wrapper js-modal-stop">
          <button class="js-modal-close">X</button>
          <h1 id="titlemodal">BookSharing Info: Validation de votre Panier</h1>
          <?php
          ?>
          <p>Vous avez  <strong class="UP"> 4 </strong> article dans votre panier veuillez remplir le formulaire, vous n'aurez le livre que pour une période <strong class="UP"> 10 Jours </strong> Renouvellable</p>
          <form action="presentation_traitement.php?isbn=<?php echo $select['ISBN']; ?>" method="post">
            <input type="text" name="lieu" id="" placeholder="Lieu de Livraison"><br><br>
            <label for="date">Entrez la date de livarison :</label>
            <input type="date" name="date" id="" placeholder="Date de Livraison"><br><br>
            <button class="btn btn__colored" name="btn__ok">Ok</button>
          </form>
        </div>
      </aside>
    </div>
  </main>
  <?php
                                      if (isset($_GET['ISBN'])) {
                                            $query = "DELETE FROM `commande_livre` WHERE `commande_livre`.ISBN='" . $_GET['ISBN'] . "'";
                                            if ($bdd->query($query)) {
                                                    echo "  <script>window.location.assign(\"panier.php?reg_err=succes\")</script>";
                                            }
                                        }
                                    ?>
                            
  <?php include("includes/footer.php") ?>
  <script>
    var  totalprice = 0 ;
  </script>
  <script src="./JS/app.js?v=1"></script>

</body>

</html>