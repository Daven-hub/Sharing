<?php
session_start();
require_once 'config.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $check = $bdd->prepare('SELECT * FROM utilisateurs WHERE EMAIL = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if ($row == 1) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $password = hash('sha256', $password);
            if ($data['MDP'] === $password) {
                $_SESSION['user']= $data;
                $query = "UPDATE utilisateurs SET STATUT=1 WHERE ID_USER=".$_SESSION['user']['ID_USER'];
                $id = $_SESSION['user']['ID_USER'];
                $select = $bdd -> query("SELECT ID_CMD FROM commande WHERE ID_USER=$id" ) -> fetch();
                if(!empty($select))
                {
                    $_SESSION['id_cmd']=$select['ID_CMD'];
                }   

               if( $bdd->query($query))
                header('Location:/Booksharing/index.php');
            } else header('Location:connexion.php?login_err=password');
        } else header('Location:connexion.php?login_err=email');
    } else header('Location:connexion.php?login_err=already');
} else header('Location:connexion.php');
