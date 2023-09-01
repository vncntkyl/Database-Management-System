<?php
    require_once 'controller/mainController.php';
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['usertype']);
    unset($_SESSION['searched']);
    unset($errors);
    session_destroy();
    header('Location: login.php?logout-sucessful');
?>