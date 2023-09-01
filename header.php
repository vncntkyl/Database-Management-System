<header class="fx-row">
    <div class="logo fx-row">
        <i class="fas fa-database"></i>
        <span>Database Management System</span>
    </div>
    <?php if (isset($_SESSION['username'])) : ?>
        <div class="user fx-row">
            <?php if($_SESSION['usertype'] !== "USER"):?>
                <?php if ($_SERVER['PHP_SELF'] == '/finalexam.ics2609.com/equipment/index.php') : ?>
                <a data-modal-target="#add-equipment">Add Equipment</a>
            <?php elseif ($_SERVER['PHP_SELF'] == '/finalexam.ics2609.com/account/index.php') : ?>
                <a data-modal-target="#add-account">Add Account</a>
            <?php endif; ?>
                <?php endif;?>
            <?php if ($_SERVER['PHP_SELF'] != '/finalexam.ics2609.com/index.php') : ?>
                <a href="../index.php">Home </a>
            <?php else : ?>
                <a href="index.php">Home </a>
            <?php endif; ?>
            <label for="icon"><span><?= ucwords($_SESSION['username']); ?></span><i class="fas fa-user-circle"></i></label>
            <input type="checkbox" name="icon" id="icon">
            <div class="user-dropdown">
                <span>Username: <?= ucwords($_SESSION['username']) ?></span>
                <span>User Type: <?= $_SESSION['usertype'] ?></span>
                <?php if ($_SERVER['PHP_SELF'] != '/finalexam.ics2609.com/index.php') : ?>
                    <a href="../logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
                <?php else : ?>
                    <a href="logout.php">Logout <i class="fas fa-sign-out-alt"></i></a>
                <?php endif; ?>

            </div>
        </div>
    <?php endif; ?>
</header>