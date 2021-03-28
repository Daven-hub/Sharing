
<?php  
   require_once 'config.php';


   if(isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['tel']) && isset($_POST['wzp']) && isset($_POST['fcbk']) && isset($_POST['profession']) && isset($_POST['country']) && isset($_POST['city']) && isset($_POST['password_retype']) && isset($_POST['tel']))
   {

      $nom = htmlspecialchars($_POST['nom']);
      $email = htmlspecialchars($_POST['email']);
      $password = htmlspecialchars($_POST['password']);
      $password_retype = htmlspecialchars($_POST['password_retype']);
      $tel = htmlspecialchars($_POST['tel']);
      $wzp = htmlspecialchars($_POST['wzp']);
      $fcbk = htmlspecialchars($_POST['fcbk']);
      $profession = htmlspecialchars($_POST['profession']);
      $country = htmlspecialchars($_POST['country']);
      $city = htmlspecialchars($_POST['city']);

      if(isset($_GET['ID_USER']))
      {
         if(strlen($nom) <= 100 )
            {
             if(strlen($email) <= 100)
             {
               if(filter_var($email, FILTER_VALIDATE_EMAIL))
               {
               if($password == $password_retype)
               {
                  $password = hash('sha256', $password);
                
   
                     $update = $bdd->prepare("UPDATE  utilisateurs SET NOM_PRENOM=:nom, TEL=:tel, EMAIL=:email, REGION=:country, VILLE=:city, WHATSAPP=:wzp, FACEBOOK=:fcbk, PROFESSION=:profession, MDP=:passwords WHERE ID_USER=".$_GET['ID_USER']);
                     $update->execute(array(
                        'nom' => $nom,
                        'tel' => $tel,
                        'email' => $email,
                        'country' => $country,
                        'city' => $city,
                        'wzp' => $wzp,
                        'fcbk' => $fcbk,
                        'profession' => $profession,
                        'passwords' => $password
                     ));
                     
                   header('Location:parametre.php?setting=compte&reg_err=succes');
               }else header('Location:parametre.php?setting=compte&reg_err=password');
               }else header('Location:parametre.php?setting=compte&reg_err=email');
             }else header('Location:parametre.php?setting=compte&reg_err=email_length');
            }else header('Location:parametre.php?setting=compte&reg_err=nom_length');
      }
      else
      {
         $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE EMAIL = ?');
         $check->execute(array($email));
         $data = $check->fetch();
         $row = $check->rowCount();
   
         if($row == 0)
         {
            if(strlen($nom) <= 100 )
            {
             if(strlen($email) <= 100)
             {
               if(filter_var($email, FILTER_VALIDATE_EMAIL))
               {
               if($password == $password_retype)
               {
                  $password = hash('sha256', $password);
                
   
                     $insert = $bdd->prepare('INSERT INTO utilisateurs(ID_USER,NOM_PRENOM, TEL, EMAIL, REGION, VILLE, WHATSAPP, FACEBOOK, PROFESSION, MDP) VALUES(null,:nom, :tel, :email, :country, :city, :wzp, :fcbk, :profession, :passwords)');
                     $insert->execute(array(
                        'nom' => $nom,
                        'tel' => $tel,
                        'email' => $email,
                        'country' => $country,
                        'city' => $city,
                        'wzp' => $wzp,
                        'fcbk' => $fcbk,
                        'profession' => $profession,
                        'passwords' => $password
                     ));
                   header('Location:inscription.php?reg_err=succes');
               }else header('Location:inscription.php?reg_err=password');
               }else header('Location:inscription.php?reg_err=email');
             }else header('Location:inscription.php?reg_err=email_length');
            }else header('Location:inscription.php?reg_err=nom_length');
         }else header('Location:inscription.php?reg_err=already');
      }
    
   }
