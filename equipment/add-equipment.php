<?php
include('../controller/authSession.php');
require_once '../controller/equipmentController.php';

$checkSQL = 'SELECT * FROM tblequipment WHERE assetNumber = ? AND serialNumber = ?';
if($stmt = mysqli_prepare($conn,$checkSQL)){
    mysqli_stmt_bind_param($stmt,'ss',$_SESSION['assNum'],$_SESSION['serialNum']);
    if(mysqli_stmt_execute($stmt)){
        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) != 1){
            $registerSQL = 'INSERT INTO `tblequipment`(`assetNumber`, `serialNumber`, `type`, `manufacturer`, `yearModel`, `description`, `department`, `status`) 
            VALUES (?,?,?,?,?,?,?,?)';
            if($stmt = mysqli_prepare($conn,$registerSQL)){
                mysqli_stmt_bind_param($stmt,'ssssisss',$_SESSION['assNum'],$_SESSION['serialNum'],$_SESSION['e-type'],$_SESSION['manu'],
                $_SESSION['year'],$_SESSION['desc'],$_SESSION['e-dept'],$_SESSION['stat']);
                if(mysqli_stmt_execute($stmt)){
                    session_start();
                    unset($_SESSION['assNum']);
                    unset($_SESSION['serialNum']);
                    unset($_SESSION['e-type']);    
                    unset($_SESSION['e-dept']);
                    unset($_SESSION['manu']);    
                    unset($_SESSION['year']);    
                    unset($_SESSION['desc']);
                    unset($_SESSION['stat']);
                    $_SESSION['success'] = 'Equipment added successfully.';
                    header('Location: index.php?equipment-added-successfully');
                }
            }
        }else{
            $_SESSION['success'] = $errors['user-found'] = 'Asset Number and/or Serial Number is already registered.';
            header('Location: index.php?'.$errors['user-found']);
        }
    }
}
?>