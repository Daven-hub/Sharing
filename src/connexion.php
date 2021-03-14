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
      <main class="auth__login">
        <div class="form__container">
        <header>
              <a href="../index.php" class="header__logo"><img src="../images/logo.svg" width="140" alt="Logo" /></a>
              <a href="./inscription.php" class="btn btn__border">Inscription <i class="fal fa-long-arrow-right"></i></a>
        </header>
        <div class="form__block">
          <div class="form__legend">
            <h3>Bienvenue</h3>
            <p>Connectez-vous pour gerer vos Livres et Compte</p>
          </div>
        <form class="login__form" action="connex.php" method="post">
        <?php
                  if(isset($_GET['login_err']))
                  {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {

                      case 'password':
                        ?>
                        <div class="error__ error__message"><i class="fas fa-exclamation-circle"></i> Mot de Passe Incorret incorrect</div>
                      <?php
                      break;  

                      case 'email':
                        ?>
                        <div class="error__ error__message"><i class="fas fa-exclamation-circle"></i> Email Incorret incorrect</div>
                      <?php
                      break;  

                      case 'already':
                        ?>
                        <div class="error__ error__message"><i class="fas fa-exclamation-circle"></i> Compte non existant</div>
                      <?php
                      break;
                    }
                  }
                 ?>  
                <br>
              <div class="form__group">
                <input type="email" name="email" id="" placeholder="Email" required /><br />
              </div>
              <div class="form__group">
                <input type="password" name="password" id="" placeholder="Mot de passe" class="mdp" required /><br />
              </div>
              <div class="login__options">
              <p>Vous n'avez pas de compte ? <a href="inscription.php">Inscrivez vous !</a></p>
               <a href="reset.php">Mot de passe oubliez ?</a>
              </div>
              <button class="btn btn__colored btn__connexion">Connexion</button>
        </form>
        </div>
      </div>
      <div class="auth__sidebar"></div>
      </main>
  </body>
</html>
