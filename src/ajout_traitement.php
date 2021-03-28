<?php  
session_start();
   //var_dump($_SESSION['user']);
   require_once 'config.php';
   if(isset($_POST['save']))
   {
      
     if(isset($_SESSION['user'])==true)
     {
   if(isset($_POST['isbn']) && isset($_POST['categorie']) &&  isset($_POST['title'])  && isset($_FILES['image']) && isset($_POST['prix']) && isset($_POST['langue']) && isset($_POST['nom']) && isset($_POST['edition']) && isset($_POST['date']))
   //    
   {
     // var_dump($_SESSION['user']);
      include "uploadimages.php";
      $image=$_FILES['image']['name'];
      
      $isbn = htmlspecialchars($_POST['isbn']);
      $title = htmlspecialchars($_POST['title']);
      $nom = htmlspecialchars($_POST['nom']);
      $edition = htmlspecialchars($_POST['edition']);
      $date = htmlspecialchars($_POST['date']);
      $prix = htmlspecialchars($_POST['prix']);
      $categorie = htmlspecialchars($_POST['categorie']);
      $description = htmlspecialchars($_POST['description']);
      $langue = htmlspecialchars($_POST['langue']);
      $id_user = $_SESSION['user']['ID_USER'];
      $date_ajout=date('Y-m-d H:i:s');

      $check = $bdd->prepare('SELECT * FROM livre WHERE isbn = ?');
      $check->execute(array($isbn));
      $data = $check->fetch();
      $row = $check->rowCount();

      if($row == 0)
      {
         if(strlen($nom) <= 100 )
         {
          if(strlen($isbn) == 13)
          {
  
                  $insert = $bdd->prepare('INSERT INTO livre(ISBN, ID_CAT ,TITRE, NOM_AUTEUR, NOM_EDITION, DATE_PARITION,PRIX, LANGUE,IMAGE1, DESCRIPTION, ID_USER,DATE_AJOUT) VALUES(:isbn,:id_cat,:title, :nom, :edition, :date, :prix, :langue, :image,:description,:id_user,\''.date("Y-m-d H:i:s").'\')');
                $insert->execute(array(
                     'isbn' => $isbn,
                     'id_cat' => $categorie,
                     'title' => $title,
                     'nom' => $nom,
                     'edition' => $edition,
                     'date' => $date,
                     'prix' => $prix,
                     'langue' => $langue,
                     'image' => $image,
                     'description' => $description,
                     'id_user' => $id_user
                ));
             
                 if($insert ){
                     header('Location:ajout.php?reg_err=succes');
                }else
                  var_dump($bdd->errorInfo());
               
          }else header('Location:ajout.php?reg_err=isbn_length');
         }else header('Location:ajout.php?reg_err=nom_length');
      }else header('Location:ajout.php?reg_err=already');
   }else header('Location:ajout.php?reg_err=empty');
  
} else header('Location:ajout.php?reg_err=noconnect');
}