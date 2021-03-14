
<section>
  <?php
  if(isset($_GET['id_user']))
  {
    $id_user =$_GET['ID_USER'];
    $select = $bdd -> query("SELECT * FROM utilisateurs WHERE ID_USER='".$_GET['id_user']."'") -> fetch(); 
  }
  ?>
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
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="mdp-verify" value="<?php echo $select['MDP']; ?>" class="" /><br />
               
              </div>
              <div class="form__group">
                <label for="mdp-verify">Confirmer votre mot de passe</label>
                <input type="password" name="password_retype" id="mdp-verify" value="<?php echo $select['MDP']; ?>" class="" /><br />
              </div>
              <button class="btn btn__colored ">Modifier</button>
</section>

