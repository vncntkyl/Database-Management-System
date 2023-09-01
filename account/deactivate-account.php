<?php
include('../controller/authSession.php');
require_once '../controller/accountController.php';

$deactivateSQL = 'UPDATE tblaccount SET status = ? WHERE username = ?';
if($stmt = mysqli_prepare($conn,$deactivateSQL)){
    $status = 'INACTIVE';
    mysqli_stmt_bind_param($stmt,'ss',$status,$_GET['username']);
    if(mysqli_stmt_execute($stmt)){
        $logSQL = 'INSERT INTO tbllogs VALUES (?,?,?,?,?,?)';
        if($stmt = mysqli_prepare($conn,$logSQL)){
            $action = $status;
            $module = 'Account';
            mysqli_stmt_bind_param($stmt, 'ssssss', date("m/d/Y"), date("h:i:sa"), $action,$_GET['username'], $_SESSION['username'], $module);
            if(mysqli_stmt_execute($stmt)){
                $_SESSION['success'] = 'Status updated successfully.';
                header('Location:index.php?'.$_SESSION['success']);
            }
        }
    }
}
?>