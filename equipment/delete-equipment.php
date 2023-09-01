<?php
include('../controller/authSession.php');
require_once '../controller/equipmentController.php';

$deleteSQL = 'DELETE FROM tblequipment WHERE assetNumber = ?';
if($stmt = mysqli_prepare($conn,$deleteSQL)){
    mysqli_stmt_bind_param($stmt,'s',$_GET['AN']);
    if(mysqli_stmt_execute($stmt)){
        $logSQL = 'INSERT INTO tbllogs VALUES (?,?,?,?,?,?)';
        if($stmt = mysqli_prepare($conn,$logSQL)){
            $action = 'Delete';
            $module = 'Equipment';
            mysqli_stmt_bind_param($stmt, 'ssssss', date("m/d/Y"), date("h:i:sa"), $action, $_GET['AN'], $_SESSION['username'], $module);
            if(mysqli_stmt_execute($stmt)){
                $_SESSION['success'] = 'Equipment deleted successfully.';
                header('Location: index.php?'.$_SESSION['success']);
            }
        }
    }
}
?>