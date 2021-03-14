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
    <main class="auth__signin">
        <div class="form__container auth__register">
          <div class="register__container">
        <header>
              <a href="../index.php" class="header__logo"><img src="../images/logo.svg" width="140" alt="Logo" /></a>
              <a href="./connexion.php" class="btn btn__colored">Connexion <i class="fal fa-long-arrow-right"></i></a>
        </header>
        <div class="form__register">
          <div class="form__legend">
            <div class="user__avatar">
             
              <h3>Inscription</h3>
            </div>
            <p>Inscrivez-vous afin d'avoir accès à nos différents produits</p>
          </div>
        <form class="login__form" action="inscription_traitement.php" method="post">
      <?php
          if(isset($_GET['reg_err']))
          {
            $err = htmlspecialchars($_GET['reg_err']);

            switch($err)
            {

              case 'succes':
                ?>
                <div class="error__ error__succes"><i class="fas fa-check-circle"></i></i> Inscription Réussie !</div>
              <?php
              break; 

              case 'password':
                ?>
                <div class="error__ error__message"><i class="fas fa-exclamation-circle"></i> Mot de passe different !</div>
              <?php
              break; 

              case 'email':
                ?>
                <div class="error__ error__message"><i class="fas fa-exclamation-circle"></i> Email non valide</div>
              <?php
              break; 

              case 'email_length':
                ?>
                <div class="error__ error__message"><i class="fas fa-exclamation-circle"></i> Email trop long</div>
              <?php
              break;

              case 'nom_length':
                ?>
                <div class="error__ error__message"><i class="fas fa-exclamation-circle"></i> Nom trop long</div>
              <?php
              break;

              case 'already':
                ?>
                <div class="error__ error__message"><i class="fas fa-exclamation-circle"></i> Compte déja existant</div>
              <?php
              break;
             }
          }
        ?>   
        <br>
              <div class="auth__grid">
                <div class="form__group">
                  <label for="nom">Nom et Prénom</label>
                  <input type="text" name="nom" id="" placeholder="Nom d'utilisateur"/><br />
                 
                </div>
              <div class="form__group">
                <label for="tel">Téléphone</label>
                <input type="number" name="tel" id="tel" placeholder="tel" class="tel" /><br />
               
              </div>
              <div class="form__group">
                <label for="email">Email</label>
                <input type="email" name="email" id="" placeholder="Email" class="mail" /><br />
               
              </div>
              <div class="form__group">
                <label for="country">Région</label>
                <input type="text" name="country" id="country" placeholder="Ex: Littoral" class="" /><br />
          
              </div>
              <div class="form__group">
                <label for="city">Ville</label>
                <input type="text" name="city" id="city" placeholder="Ex: Douala" class="" /><br />
         
              </div>
              <div class="form__group">
                <label for="wzp">Numéro Whatsapp</label>
                <input type="text" name="wzp" id="wzp" placeholder="" class="" /><br />
                
               
              </div>
              <div class="form__group">
                <label for="fcbk">Nom Facebook</label>
                <input type="text" name="fcbk" id="fcbk" placeholder="" class="" /><br />
                
              </div>
              <div class="form__group">
                <label for="profession">Profession</label>
                <input type="text" name="profession" id="profession" placeholder="" class="" /><br />
               
              </div>
              <div class="form__group">
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="mdp-verify" placeholder="" class="" /><br />
               
              </div>
              <div class="form__group">
                <label for="mdp-verify">Confirmer votre mot de passe</label>
                <input type="password" name="password_retype" id="mdp-verify" placeholder="" class="" /><br />
                
              </div>
              <div class="login__options">
              </div>
              </div>
              <button class="btn btn__colored btn__connexion">S'inscrire</button>
        </form>
        </div>
      </div>
    </div>
      <div class="auth__sidebar"></div>
      </main>
  </body>
</html>