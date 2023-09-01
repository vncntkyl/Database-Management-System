<?php
    require_once 'config.php';
    require_once 'collegeList.php';
    $errors = array();

    if(isset($_POST['login'])){
        $username = $_POST['username-login'];
        $password = $_POST['password-login'];

        $loginSQL = 'SELECT * FROM tblaccount WHERE username = ? AND password = BINARY ?';
        if($stmt = mysqli_prepare($conn,$loginSQL)){
            mysqli_stmt_bind_param($stmt,'ss',$username,$password);
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) > 0){
                    $account = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    session_start();
                    if($account['status'] != 'INACTIVE'){
                        $_SESSION['username'] = $account['username'];
                        $_SESSION['usertype'] = $account['userType'];
                        header("Location: index.php");
                    }else{
                        $errors['login'] = 'Inactive account,<br> contact admin for activation.';
                    }
                }else{
                    $errors['login'] = 'Incorrect Username or Password.';
                }
            }
        }
    }
    if(isset($_POST['search-log'])){
        if($_SESSION['usertype'] == "ADMINISTRATOR"){
            $searchSQL = 'SELECT * FROM tbllogs WHERE datelog LIKE ? OR (action LIKE ? OR timelog LIKE ? OR user LIKE ? OR performedBy LIKE ? or module LIKE ?) ORDER BY datelog';
        }elseif($_SESSION['usertype'] == "TECHNICAL"){
            $searchSQL = 'SELECT * FROM tbllogs WHERE performedBy = ? AND (action LIKE ? OR timelog LIKE ? OR user LIKE ? OR datelog LIKE ? or module LIKE ?) ORDER BY datelog';
        }
        $log_search = '%'.$_POST['log-search'].'%';
        if($stmt = mysqli_prepare($conn,$searchSQL)){
            mysqli_stmt_bind_param($stmt,'ssssss', $log_search,$log_search,$log_search,$log_search,$log_search,$log_search);
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
            }else{
                $errors['search'] = 'no record found';
            }
        }
    }else{
        if(isset($_SESSION['usertype'])){
            if($_SESSION['usertype'] == "ADMINISTRATOR"){
                $displaySQL = 'SELECT * FROM tbllogs ORDER BY datelog ASC';
                if($query = mysqli_query($conn,$displaySQL)){
                    $result = $query;
                }
            }elseif($_SESSION['usertype'] == "TECHNICAL"){
                $displaySQL = 'SELECT * FROM tbllogs WHERE performedBy = ? ORDER BY datelog ASC';
                if($stmt = mysqli_prepare($conn,$displaySQL)){
                    mysqli_stmt_bind_param($stmt,'s', $_SESSION['username']);
                    if(mysqli_stmt_execute($stmt)){
                        $result = mysqli_stmt_get_result($stmt);
                    }else{
                        $errors['search'] = 'no record found';
                    }
                }
            }
        }
    }
?>