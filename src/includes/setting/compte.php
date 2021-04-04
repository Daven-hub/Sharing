
<section>
  <?php
  if(isset($_SESSION['user']))
  {
    $id_user =$_SESSION['user']['ID_USER'];
    $select = $bdd -> query("SELECT * FROM utilisateurs WHERE ID_USER='$id_user'") -> fetch();
   

     ?>
     <form action="inscription_traitement.php?ID_USER=<?php echo $id_user; ?>" method="POST">
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
                  <input type="text" name="nom" id="" value="<?php echo $select['NOM_PRENOM']; ?>"/><br />
                 
                </div>
              <div class="form__group">
                <label for="tel">Téléphone</label>
                <input type="number" name="tel" id="tel" value="<?php echo $select['TEL']; ?>" class="tel" /><br />
               
              </div>
              <div class="form__group">
                <label for="email">Email</label>
                <input type="email" name="email" id=""value="<?php echo $select['EMAIL']; ?>" /><br />
               
              </div>
              <div class="form__group">
                <label for="country">Région</label>
                <input type="text" name="country" id="country"value="<?php echo $select['REGION']; ?>" class="" /><br />
          
              </div>
              <div class="form__group">
                <label for="city">Ville</label>
                <input type="text" name="city" id="city" value="<?php echo $select['VILLE']; ?>" class="" /><br />
         
              </div>
              <div class="form__group">
                <label for="wzp">Numéro Whatsapp</label>
                <input type="text" name="wzp" id="wzp" value="<?php echo $select['WHATSAPP']; ?>" /><br />
                
               
              </div>
              <div class="form__group">
                <label for="fcbk">Nom Facebook</label>
                <input type="text" name="fcbk" id="fcbk"value="<?php echo $select['FACEBOOK']; ?>" /><br />
                
              </div>
              <div class="form__group">
                <label for="profession">Profession</label>
                <input type="text" name="profession" id="profession" value="<?php echo $select['PROFESSION']; ?>" class="" /><br />
               
              </div>
              <div class="form__group">
                <label for="password">Nouveau Mot de passe</label>
                <input type="password" name="password" id="mdp-verify" value="<?php echo ""; ?>" class="" /><br />
               
              </div>
              <div class="form__group">
                <label for="mdp-verify">Confirmer votre mot de passe</label>
                <input type="password" name="password_retype" id="mdp-verify" value="<?php echo ''; } ?>" class="" /><br />
              </div>
              <button name="modif"  class="btn btn__colored ">Modifier</button>  
     </form>
</section>

