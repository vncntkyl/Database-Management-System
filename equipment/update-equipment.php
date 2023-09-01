<?php
include('../controller/authSession.php');
require_once '../controller/equipmentController.php';

$updateSQL = 'UPDATE tblequipment SET serialNumber = ? , type = ?, manufacturer = ? , yearModel = ?, description = ?, department = ? WHERE assetNumber = ?';
if($stmt = mysqli_prepare($conn,$updateSQL)){
    mysqli_stmt_bind_param($stmt,'sssisss',$_SESSION['serialNum-update'],$_SESSION['e-type-update'],$_SESSION['manu-update'],
    $_SESSION['year-update'],$_SESSION['desc-update'],$_SESSION['e-dept-update'],$_SESSION['assNum-update']);
    if(mysqli_stmt_execute($stmt)){
        $logSQL = 'INSERT INTO tbllogs VALUES (?,?,?,?,?,?)';
        if($stmt = mysqli_prepare($conn,$logSQL)){
            $action = 'Update';
            $module = 'Equipment';
            mysqli_stmt_bind_param($stmt, 'ssssss', date("m/d/Y"), date("h:i:sa"), $action, $_SESSION['assNum-update'], $_SESSION['username'], $module);
            if(mysqli_stmt_execute($stmt)){
                unset($_SESSION['assNum-update']);
                unset($_SESSION['serialNum-update']);
                unset($_SESSION['e-type-update']);
                unset($_SESSION['e-dept-update']);
                unset($_SESSION['manu-update']);
                unset($_SESSION['year-update']);
                unset($_SESSION['desc-update']);
                $_SESSION['success'] = 'Equipment updated successfully.';
                header('Location: index.php?'.$_SESSION['success']);
            }
        }

    }
}  
?>