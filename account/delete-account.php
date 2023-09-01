<?php
include('../controller/authSession.php');
require_once '../controller/accountController.php';

$deleteSQL = 'DELETE FROM tblaccount WHERE username = ?';
if($stmt = mysqli_prepare($conn,$deleteSQL)){
    mysqli_stmt_bind_param($stmt,'s',$_GET['username']);
    if(mysqli_stmt_execute($stmt)){
        $logSQL = 'INSERT INTO tbllogs VALUES (?,?,?,?,?,?)';
        if($stmt = mysqli_prepare($conn,$logSQL)){
            $action = "Delete";
            $module = 'Account';
            mysqli_stmt_bind_param($stmt, 'ssssss', date("m/d/Y"), date("h:i:sa"), $action,$_GET['username'], $_SESSION['username'], $module);
            if(mysqli_stmt_execute($stmt)){
                $_SESSION['success'] = 'Account deleted successfully.';
                header('Location:index.php?'.$_SESSION['success']);
            }
        }
    }
}
?>