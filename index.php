<?php
include('controller/authSession.php');
require_once 'controller/mainController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> DBMS | <?= ucwords($_SESSION['username']) ?></title>
    <link rel="icon" href="css/database-solid.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/header-footer.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="js/app.js" defer></script>
</head>

<body>
    <?php include('css/loader.php'); ?>
    <?php include('header.php'); ?>
    <main>
        <div class="homepage fx-col">
            <span class="welcome float">Welcome to Database Management System (DBMS), <?= ucwords($_SESSION['username']) ?>!
                <br>Select the DBMS table you want to manage :
            </span>
            <section class="table-list fx-row">
                <?php if ($_SESSION['usertype'] === 'ADMINISTRATOR') : ?>
                    <div class="float">
                        <div class="dbms-table" id="account">
                            <img src="css/Profile data-bro.svg" alt="">
                            <span>ACCOUNTS MANAGEMENT</span>
                            <br><br>
                        </div>
                    </div>
                    <div class="float">
                        <div class="dbms-table" id="equipment">
                            <img src="css/Humanitarian Help-cuate.svg" alt="">
                            <span>EQUIPMENT MANAGEMENT</span>
                            <br><br>
                        </div>
                    </div>
                    <div class="float">
                        <div class="dbms-table" id="log">
                            <img src="css/Logistics-amico.svg" alt="">
                            <span>LOGS MANAGEMENT</span>
                            <br><br>
                        </div>
                    </div>
                <?php elseif ($_SESSION['usertype'] === 'TECHNICAL') : ?>
                    <div class="float">
                        <div class="dbms-table" id="equipment">
                            <img src="css/Humanitarian Help-cuate.svg" alt="">
                            <span>EQUIPMENT MANAGEMENT</span>
                            <br><br>
                        </div>
                    </div>
                    <div class="float">
                        <div class="dbms-table" id="log">
                            <img src="css/Logistics-amico.svg" alt="">
                            <span>LOGS MANAGEMENT</span>
                            <br><br>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="float">
                        <div class="dbms-table" id="equipment">
                            <img src="css/Humanitarian Help-cuate.svg" alt="">
                            <span>EQUIPMENT MANAGEMENT</span>
                            <br><br>
                        </div>
                    </div>
                <?php endif; ?>
            </section>
        </div>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>