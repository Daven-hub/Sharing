<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./CSS/style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;700&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
    <title>BookSharing</title>
  </head>
  <body>
            <!--<div class="text__welcome">
                <h3>Partager vos Livres avec les Autres</h3>
                <p>Vous etes Auteur, Libraire ou alors un Particulier, et vous souhaitez mettre à disposition vos livres,
                    C'est simple, Inscrivez vous et remplissez le formulaire suivant pour vos Ajouts
                   <span>NB: Image 1: Taille(210*310) , Image 2: Taille(130*200)</span> 
                </p>
            </div>
          -->
              <main class="auth__signin">
        <div class="form__container auth__register">
          <div class="register__container">
        <header>
        <div class="header__nav">
    <a href="/Booksharing/index.php" class="header__logo">
      <img src="/Booksharing/images/logo.svg" alt="logo">
    </a>

    <div class="header__icon">
      <?php if (isset($_SESSION['user']['NOM_PRENOM'])) : ?>
        <div class="user__setting">
          <ul class="user__nav">
            <li> <?= ucfirst($_SESSION['user']['NOM_PRENOM']); ?> <i class="far fa-user-circle"></i>
              <ul class="user__submenu">
                <li><a href=""><i class="far fa-question-circle"></i>Assisstance</a></li>
                <li><a href="parametre.php"><i class="far fa-cog"></i>Paramètres</a></li>
                <li><a href="/Booksharing/src/déconnexion.php"><i class="fal fa-sign-out"></i>Déconnexion</a></li>
              </ul>
            </li>
          </ul>
        </div>
      <?php endif ?>
    </div>
  </div>
  <div class="header__action">
  <?php if (!isset($_SESSION['user']['NOM_PRENOM'])) : ?>
      <div class="header__cta addb">
        <a href="/Booksharing/src/connexion.php" class="btn btn__colored">Connection</a>
      </div>
    <?php endif ?>
  </div>
        </header>
        <div class="form__register">
          <div class="form__legend">
            <div class="user__avatar">
              <!--Avatar du user ici-->
              <h3>Partager vos livre avec les autres</h3>
            </div>
            <p>Vous etes Auteur, Libraire ou alors un Particulier, et vous souhaitez mettre à disposition vos livres,C'est simple, Inscrivez vous et remplissez le formulaire suivant pour vos Ajouts </p>
            <p><strong>NB : </strong> <span>Veuillez entrez une image nette et visible </span></p>
          </div>
        <form class="login__form" action="ajout_traitement.php" method="POST" enctype="multipart/form-data">

        <?php
          if(isset($_GET['reg_err']))
          {
            $err = htmlspecialchars($_GET['reg_err']);

            switch($err)
            {

              case 'succes':
                ?>
                <div class="error__ error__succes"><i class="fas fa-exclamation-circle"></i> Ajout Effectué avec Succès !</div>
              <?php
              break; 

              case 'isbn_length':
                ?>
                <div class="error__ error__message"><i class="fas fa-exclamation-circle"></i> ISBN Incorrect</div>
              <?php
              break;

              case 'empty':
                ?>
                <div class="error__ error__message"><i class="fas fa-exclamation-circle"></i> vous devez remplir tous les champs</div>
              <?php
              break; 

              case 'nom':
                ?>
                <div class="error__ error__message"><i class="fas fa-exclamation-circle"></i> Nom Trop Long</div>
              <?php
              break; 

              case 'already':
                ?>
                <div class="error__ error__message"><i class="fas fa-exclamation-circle"></i> Livre déja existant</div>
              <?php
              break;
              
              case 'noconnect':
                ?>
                <div class="error__ error__message"><i class="fas fa-exclamation-circle"></i>Vous devez vous connecter</div>
              <?php
              break;
             }
          }
        ?>   


              <div class="auth__grid">
                <div class="form__group">
                  <label for="title">Titre du livre</label>
                  <input type="text" name="title" id="title"/><br />
                </div>
              <div class="form__group">
                <label for="name">Nom de l'auteur</label>
                <input type="text" name="nom" id="name"/><br />
              </div>
              <div class="form__group">
                <label for="edition">Nom d'édition</label>
                <input type="text" name="edition" id="edition" /><br />
              </div>
              <div class="form__group">
                <label for="date">Date de parution</label>
                <input type="date" name="date" id="date" placeholder="10/12/1877"/><br />
              </div>
              <div class="form__group">
                <label for="langue">Langue</label>
                <input type="text" name="langue" id="langue" /><br />
              </div>
              <div class="form__group">
                <label for="isbn">Numéro ISBN</label>
                <input type="number" name="isbn" id="isbn" /><br />
              </div>
              <div class="form__group">
                <label for="categorie">Catégorie</label><br>
                <select name="categorie" id="">
                <option value="0"></option>
               <?php
                require_once('config.php');
                $select = $bdd -> query('SELECT * FROM categorie') -> fetchAll();
                foreach($select AS $row)
                {
                  echo "<option value = \"".$row['ID_CAT']."\">".$row['NOM_CAT']."</option>";
                }
               ?>
                </select>
              </div>
              <div class="form__group">
                <label for="prix">Prix (FCFA) :</label>
                <input type="number" name="prix" id="prix" /><br />
              </div>
             
              <div class="login__options">
              </div>
            </div>
            <div class="book__cover">
              <div class="img__cover"></div>
              <div class="uploadbtn">
                <label for="img__file" class="btn btn__border">Image </label>
                <input type="file" name="image" id="img__file">
              </div>
            </div><br>
            <div class="form__group">
                <label for="description">Description :</label><br>
                <textarea id="description" name="description"></textarea>
              </div>

            <div class="form__group checkbox__group">
              <input type="checkbox" name="" id="privacy" class="input__checkbox">
              <label for="privacy" class="checkbox"></label>
              <label for="privacy">Accepter vous les termes liés à la publication de vos articles sur notre platefrome ? </label>
            </div>
           
              <button class="btn btn__colored" name="save">Ajouter</button>
        </form>
        </div>
      </div>
        </div>
      <div class="auth__sidebar"></div>
      </main>
          </div>
      </div>
      
  </body>
</html>
