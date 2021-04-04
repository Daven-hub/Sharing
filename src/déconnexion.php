<?php
session_start();
require_once "config.php";

$query = "UPDATE utilisateurs SET STATUT=0 WHERE ID_USER=".$_SESSION['user']['ID_USER'];
             
if( $bdd->query($query))
{
    unset($_SESSION['user']);
    unset($_SESSION['id_cmd']);  
    header('Location: /Booksharing/index.php');
}
  

