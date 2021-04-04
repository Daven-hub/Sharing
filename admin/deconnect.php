<?php
session_start();
require_once "config.php";
    unset($_SESSION['admin']); 
    header('Location: /Booksharing/admin/login.php');

  