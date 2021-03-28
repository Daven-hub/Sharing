
<?php  
try{
    $bdd = new PDO('mysql:host=localhost; dbname=booksharing;charset=utf8', 'root', '');
}catch(Exception $e)
{
 die('Erreur' .$e->getMessage());   
}

  var_dump($_POST);

   if(isset($_POST['adminname']) && isset($_POST['email']) &&  isset($_POST['tel']) && isset($_POST['city']) && isset($_FILES['profil']) && isset($_POST['password']) &&  isset($_POST['password_retype']))
   {
    echo "Bonjour oh ";
    include "uploadprofils.php";
    $image=$_FILES['profil']['name'];

      $nom = htmlspecialchars($_POST['nom']);
      $email = htmlspecialchars($_POST['email']);
      $tel = htmlspecialchars($_POST['tel']);
      $city = htmlspecialchars($_POST['city']);
      $profil = htmlspecialchars($_FILES['profil']);
      $password = htmlspecialchars($_POST['password']);
      $password_retype = htmlspecialchars($_POST['password_retype']);
 
         
         $check = $bdd->prepare('SELECT * FROM administrateurs WHERE EMAIL = ?');
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
                
   
                     $insert = $bdd->prepare('INSERT INTO administrateurs(ID_ADMIN,ADMIL_NAME,EMAIL, TEL, VILLE, PROFIL, MDP) VALUES(null,:nom, :email, :tel, :city, :profil, :passwords)');
                     $insert->execute(array(
                        'nom' => $nom,
                        'email' => $email,
                        'tel' => $tel,
                        'city' => $city,
                        'profil' => $profil,
                        'passwords' => $password
                     ));
                   header('Location:login.php');
               }else header('Location:register_traitement.php?reg_err=password');
               }else header('Location:register.php?reg_err=email');
             }else header('Location:register.php?reg_err=email_length');
            }else header('Location:register.php?reg_err=nom_length');
         }else header('Location:register.php?reg_err=already');
      }
