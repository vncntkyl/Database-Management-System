<?php
    require_once 'config.php';
    require_once 'collegeList.php';
    $errors = array();
    
    if(isset($_POST['search-account'])){
        $searchSQL = 'SELECT * FROM tblaccount WHERE username <> ? AND (username LIKE ? OR userType LIKE ? OR status LIKE ?) ORDER BY username';
        $account_search = '%'.$_POST['account-search'].'%';
        if($stmt = mysqli_prepare($conn,$searchSQL)){
            mysqli_stmt_bind_param($stmt,'ssss', $_SESSION['username'],$account_search,$account_search,$account_search);
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
            }else{
                $errors['search'] = 'no record found';
            }
        }
    }else{
        $select = 'SELECT * FROM tblaccount WHERE username <> ? ORDER BY username';

        if($stmt = mysqli_prepare($conn,$select)){
            mysqli_stmt_bind_param($stmt,'s',$_SESSION['username']);
            
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
            }
            else{
                echo "Error on form load";
            }
        }
    }
    if(isset($_POST['register-account'])){
        $username_create = $_POST['username-add'];
        $password_create = $_POST['password-add'];
        $usertype_create = $_POST['usertype-add'];

        $_SESSION['username_create'] = $username_create;            
        $_SESSION['password_create'] = $password_create;
        $_SESSION['usertype_create'] = $usertype_create;
        
        header("Location: add-account.php?username=".$username_create);
    }
    if(isset($_POST['update-account'])){
        $username_update = $_POST['username-update'];
        $password_update = $_POST['password-update'];
        $usertype_update = $_POST['usertype-update'];

        $_SESSION['username_update'] = $username_update;            
        $_SESSION['password_update'] = $password_update;
        $_SESSION['usertype_update'] = $usertype_update;
        
        header("Location: update-account.php?username=".$username_update);
    }
?>