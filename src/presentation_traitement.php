<?php   
session_start();
require_once 'config.php';
if(isset($_POST['btn__ok']))
{
  if(isset($_SESSION['user']))
  {
    if(isset($_GET['isbn']))
    {
      if(isset($_POST['lieu']) && isset($_POST['date']))
      {
        $adress_liv = htmlspecialchars($_POST['lieu']);
        $date_liv = htmlspecialchars($_POST['date']);
        

        if(empty($_SESSION['id_cmd']))
        {
          $insert = $bdd->prepare('INSERT INTO commande(ID_CMD, ID_USER, DATE_CMD, ADRESS_LIV, OPTION_CMD, DATE_LIV  ) VALUES(null,\''.$id.'\', :date_cmd, :lieu, :option_cmd, :date)');
          $insert->execute(array(
             'lieu' => $adress_liv,
             'date' => $date_liv,
             'option_cmd' => 'Achat',
             'date_cmd' => date('D, d M Y H:i:s')
          ));
          $_SESSION['id_cmd'] = $bdd -> lastInsertId();
        }
        
          $insertpanier = $bdd->prepare('INSERT INTO commande_livre VALUES(:id, :isbn, :quantite)');
          $insertpanier->execute(array(
             'id' => $_SESSION['id_cmd'],
             'isbn' => $_GET['isbn'],
             'quantite' => '1'
          ));
          header('Location:presentation.php?reg_err=succes');
      
       

      }else header('Location:presentation.php?reg_err=echec');
    }
  }else header('Location:presentation.php?reg_err=noconnect');
 }
 

 if(isset($_POST['btn__ok_location']))
{
  if(isset($_SESSION['user']))
  {
    if(isset($_GET['isbn']))
    {
      if(isset($_POST['lieu']) && isset($_POST['date']))
      {
        $adress_liv = htmlspecialchars($_POST['lieu']);
        $date_liv = htmlspecialchars($_POST['date']);
        

        if(empty($_SESSION['id_cmd']))
        {
          $insert = $bdd->prepare('INSERT INTO commande(ID_CMD, ID_USER, DATE_CMD, ADRESS_LIV, OPTION_CMD, DATE_LIV  ) VALUES(null,\''.$id.'\', :date_cmd, :lieu, :option_cmd, :date)');
          $insert->execute(array(
             'lieu' => $adress_liv,
             'date' => $date_liv,
             'option_cmd' => 'Location',
             'date_cmd' => date('D, d M Y H:i:s')
          ));
          $_SESSION['id_cmd'] = $bdd -> lastInsertId();
        }
        
          $insertpanier = $bdd->prepare('INSERT INTO commande_livre VALUES(:id, :isbn, :quantite)');
          $insertpanier->execute(array(
             'id' => $_SESSION['id_cmd'],
             'isbn' => $_GET['isbn'],
             'quantite' => '1'
          ));
          header('Location:presentation.php?reg_err=succes');
      
       

      }else header('Location:presentation.php?reg_err=echec');
    }
  }else header('Location:presentation.php?reg_err=noconnect');
 }