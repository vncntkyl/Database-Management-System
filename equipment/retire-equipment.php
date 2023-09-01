<?php
include('../controller/authSession.php');
require_once '../controller/equipmentController.php';
$retireSQL = 'UPDATE tblequipment SET status = ? WHERE assetNumber = ?';
if($stmt = mysqli_prepare($conn,$retireSQL)){
    $status = 'RETIRE';
    mysqli_stmt_bind_param($stmt,'ss',$status,$_GET['AN']);
    if(mysqli_stmt_execute($stmt)){
        $logSQL = 'INSERT INTO tbllogs VALUES (?,?,?,?,?,?)';
        if($stmt = mysqli_prepare($conn,$logSQL)){
            $action = 'RETIRE';
            $module = 'Equipment';
            mysqli_stmt_bind_param($stmt, 'ssssss', date("m/d/Y"), date("h:i:sa"), $action, $_GET['AN'], $_SESSION['username'], $module);
            if(mysqli_stmt_execute($stmt)){
                $_SESSION['success'] = 'Status updated successfully.';
                header('Location: index.php?'.$_SESSION['success']);
            }
        }
    }
}
?>