<?php
include('../controller/authSession.php');
require_once '../controller/accountController.php';

$checkSQL = 'SELECT * FROM tblaccount WHERE username = ?';
if($stmt = mysqli_prepare($conn, $checkSQL)){
    mysqli_stmt_bind_param($stmt,'s',$username_create);
    if(mysqli_stmt_execute($stmt)){
        $reuslt = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result) != 1){
            $insertSQL = "INSERT INTO tblaccount (username, password, userType, status, createdBy)
            VALUES (?,?,?,?,?)";
            if($stmt = mysqli_prepare($conn,$insertSQL)){
                $status = 'ACTIVE';
                $createdBy = $_SESSION['username'];
                mysqli_stmt_bind_param($stmt,'sssss',$_SESSION['username_create'],$_SESSION['password_create'],$_SESSION['usertype_create'],$status,$createdBy);
                if(mysqli_stmt_execute($stmt)){
                    unset($_SESSION['username_create']);    
                    unset($_SESSION['password_create']);
                    unset($_SESSION['usertype_create']);  
                    $_SESSION['success'] = "Account registered successfully!";
                    header("Location: index.php?".$_SESSION['success']);
                }else{
                    $_SESSION['success'] = "Username already registered";
                    header("Location: index.php?".$_SESSION['success']);
                }
            }
        }else{
            $_SESSION['success'] = $errors['user-found'] = 'Username is already registered.';
            header('Location: index.php?'.$errors['user-found']);
        }
    }
}
?>