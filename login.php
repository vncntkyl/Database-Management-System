<?php require_once 'controller/mainController.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> DBMS | Login</title>
    <link rel="icon" href="css/database-solid.svg" type="image/x-icon">
    <script src="js/main.js" defer></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/modals.css">
    <link rel="stylesheet" href="css/header-footer.css">
</head>

<body class="show">
    <?php include('header.php'); ?>
    <main class="login-page">
        <img src="css/Server-cuate.svg" alt="server" class="server float-sideways">
        <section class="login">
            <div class="container fx-col float-delay">
                <div class="logo fx-row">
                    <i class="fas fa-database"></i>
                    <span>Database Management System</span>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-login fx-col">
                    <label for="username">Username</label>
                    <input type="text" name="username-login" class="input" placeholder="Enter username here" required>
                    <label for="password">Password</label>
                    <input type="password" name="password-login" class="input" placeholder="Enter password here" required>
                    <input type="submit" value="Login" name="login" class="submit">
                </form>
                <span><a href="#">Forgot password?</a></span>
            </div>
        </section>
    </main>
    <?php if (count($errors) != 0) : ?>
        <div class="success-message active">
            <div class="success-header">
                PAGE ALERT
            </div>
            <div class="message">
                <ul>
                    <?php foreach ($errors as $err) : ?>
                        <li><?= $err ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div id="overlay" class="active"></div>
    <?php endif; ?>
    <?php include('footer.php'); ?>
</body>

</html>