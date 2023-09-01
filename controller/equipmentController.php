<?php
    require_once 'config.php';
    require_once 'collegeList.php';
    $errors = array();
    $collegeNames = array();
    $colleges = printColleges($conn);
    if(mysqli_num_rows($colleges) > 0){
        while($college = mysqli_fetch_array($colleges,MYSQLI_ASSOC)){
            array_push($collegeNames,$college['collegeName']);
        }
    }

    if(isset($_POST['search-equipment'])){
        if(isset($_SESSION['searched'])){
            unset($_SESSION['searched']);
        }
        $searchSQL = 'SELECT * FROM tblequipment WHERE assetNumber LIKE ? OR (serialNumber LIKE ? OR type LIKE ? OR department LIKE ? OR yearModel LIKE ? OR description LIKE ? OR manufacturer LIKE ? OR status LIKE ?) ORDER BY assetNumber';
        $equipment_search = '%'.$_POST['equipment-search'].'%';
        if($stmt = mysqli_prepare($conn,$searchSQL)){
            mysqli_stmt_bind_param($stmt,'ssssssss', $equipment_search,$equipment_search,$equipment_search,$equipment_search,$equipment_search,$equipment_search,$equipment_search,$equipment_search);
            if(mysqli_stmt_execute($stmt)){
                $_SESSION['searched'] = 'Results for <strong>'.$_POST['equipment-search'].'</strong> shown below<br><br>';
                $result = mysqli_stmt_get_result($stmt);
            }else{
                $errors['seach'] = 'no record found';
            }
        }
    }else{
        if(isset($_SESSION['searched'])){
            unset($_SESSION['searched']);
        }
        $displaySQL = 'SELECT * FROM tblequipment ORDER BY assetNumber ASC';
        if($query = mysqli_query($conn,$displaySQL)){
            $result = $query;
        }
    }
    if(isset($_POST['register-equipment'])){
        $_SESSION['assNum'] = $_POST['assetNum-add'];
        $_SESSION['serialNum'] = $_POST['serialNum-add'];
        $_SESSION['e-type'] = $_POST['type-add'];
        $_SESSION['e-dept'] = $_POST['department-add'];
        $_SESSION['manu'] = $_POST['manufacturer-add'];
        $_SESSION['year'] = $_POST['year-add'];
        $_SESSION['desc'] = $_POST['description-add'];
        $_SESSION['stat'] = 'WORKING';

        header('Location: add-equipment.php?AN='.$_SESSION['assNum']);
    }
    if(isset($_POST['update-equipment'])){
        $_SESSION['assNum-update'] = $_POST['assetNum-update'];
        $_SESSION['serialNum-update'] = $_POST['serialNum-update'];
        $_SESSION['e-type-update'] = $_POST['type-update'];
        $_SESSION['e-dept-update'] = $_POST['department-update'];
        $_SESSION['manu-update'] = $_POST['manufacturer-update'];
        $_SESSION['year-update'] = $_POST['year-update'];
        $_SESSION['desc-update'] = $_POST['description-update'];

        header('Location: update-equipment.php?AN='.$_SESSION['serialNum-update']);
    }
?>