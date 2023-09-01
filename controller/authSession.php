<?php

    session_start();
    if(!isset($_SESSION['username'])){
        $_SESSION['sess_expired'] = 'Session expired.';
        if($_SERVER['PHP_SELF'] != '/finalexam.ics2609.com/index.php'){
            header("Location: ../login.php");
        }else{
            header("Location: login.php");
        }
 
    }
?>