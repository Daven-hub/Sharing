<?php
session_start();
require_once 'config.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    $check = $bdd->prepare('SELECT * FROM administrateurs WHERE EMAIL = ?');
    $check->execute(array($email));
    $data = $check->fetch();
    $row = $check->rowCount();

    if ($row == 1) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if ($data['MDP'] === $password) {
                $_SESSION['admin']['ID_ADMIN'] = $data['ID_ADMIN'];
                $_SESSION['admin']['ADMIN_NAME'] = $data['ADMIN_NAME'];
                $_SESSION['admin']['EMAIL'] = $data['EMAIL'];
                header('Location:/Booksharing/admin/admin.php');
            } else header('Location:login.php?login_err=password');
        } else header('Location:login.php?login_err=email');
    } else header('Location:login.php?login_err=already');
} else header('Location:login.php');
