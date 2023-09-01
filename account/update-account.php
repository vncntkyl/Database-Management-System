<?php
include('../controller/authSession.php');
require_once '../controller/accountController.php';

$updateSQL = 'UPDATE tblaccount SET password = ?, userType = ? WHERE username = ?';
if($stmt = mysqli_prepare($conn,$updateSQL)){
    mysqli_stmt_bind_param($stmt,'sss',$_SESSION['password_update'], $_SESSION['usertype_update'],$_GET['username']);
    if(mysqli_stmt_execute($stmt)){
        $logSQL = 'INSERT INTO tbllogs VALUES (?,?,?,?,?,?)';
        if($stmt = mysqli_prepare($conn,$logSQL)){
            $action = 'Update';
            $module = 'Account';
            mysqli_stmt_bind_param($stmt, 'ssssss', date("m/d/Y"), date("h:i:sa"), $action,$_GET['username'], $_SESSION['username'], $module);
            if(mysqli_stmt_execute($stmt)){
                unset($_SESSION['username_update']);    
                unset($_SESSION['password_update']);
                unset($_SESSION['usertype_update']);
                $_SESSION['success'] = 'Account updated successfully.';
                header('Location:index.php?'.$_SESSION['success']);
            }
        }
    }
}
?>