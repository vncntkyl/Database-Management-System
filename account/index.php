<?php
include('../controller/authSession.php');
require_once '../controller/accountController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> DBMS | <?= ucwords($_SESSION['username']) ?> | Accounts Management</title>
    <link rel="icon" href="../css/database-solid.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
    <script src="../js/app.js" defer></script>
    <script src="../js/main.js" defer></script>
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/modals.css">
    <link rel="stylesheet" href="../css/header-footer.css">
</head>

<body>
<?php include('../css/loader.php'); ?>
    <?php include('../header.php'); ?>
    <main class="fx-col">
        <div class="homepage fx-col">
            <span class="welcome">Welcome to Accounts Management Page, <?= ucwords($_SESSION['username']) ?>!
                <br>as an <strong><?= $_SESSION['usertype']; ?></strong>,
                you can <span class="italicized">search</span>, <span class="italicized">view</span>, and <span class="italicized">edit</span> the records below.
            </span>
        </div>
        <section class="table fx-col">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-search fx-row">
                <input type="search" name="account-search" id="account-search" class="input searchbar" placeholder="Search for an account here" required>
                <input type="submit" value="Find" name="search-account" class="submit submit-account">
                <input type="submit" value="Show All" name="show-all" class="submit submit-account" formnovalidate>
            </form>
            <table id="database-table">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>User Type</th>
                        <th>Status</th>
                        <th>Created By</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0) : ?>
                        <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                            <tr>
                                <td><?= $row['username']; ?></td>
                                <td><?= $row['userType']; ?></td>
                                <?php if ($row['status'] == 'ACTIVE') : ?>
                                    <td class="active-working"><span><?= $row['status']; ?></span></td>
                                <?php else : ?>
                                    <td class="inactive-retire"><span><?= $row['status']; ?></span></td>
                                <?php endif; ?>
                                </td>
                                <td><?= $row['createdBy']; ?></td>
                                <td class="options">
                                    <a data-modal-target="#update-account-<?= $row['username'] ?>" class="a_sql">Update</a>
                                    <?php if ($row['status'] != 'ACTIVE') : ?>
                                        <a class="edit a_activate" data-modal-target="#update-active-<?= $row['username'] ?>">Activate</a>
                                    <?php else : ?>
                                        <a class="edit a_deactivate" data-modal-target="#update-deactivate-<?= $row['username'] ?>">Deactivate</a>
                                    <?php endif; ?>
                                    <a class="a_sql" data-modal-target="#delete-<?= $row['username'] ?>">Delete</a>
                                    <?php include('modals.php'); ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <tr>
                            <td>
                                <?= 'No account found.'; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="confirm-message form" id="add-account">
                <div class="confirm-header">
                    <div class="success-header">ACCOUNT REGISTRATION</div>
                    <button data-close-button class="close-button">&times;</button>
                </div>
                <div class="confirm-body">
                    <div class="c-message">
                        <span>Fill up the form and submit to add a new user.</span>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="account-registration-form" class="form-modal fx-col">
                            <input type="text" name="username-add" id="username-add" class="input" placeholder="Enter username here" required>
                            <input type="password" name="password-add" id="password-add" class="input" placeholder="Enter password here" required>
                            <select name="usertype-add" id="usertype-add" class="input" required>
                                <option value="" selected disabled>--Select User Type--</option>
                                <option value="ADMINISTRATOR">ADMINISTRATOR</option>
                                <option value="TECHNICAL">TECHNICAL</option>
                                <option value="USER">USER</option>
                            </select>
                            <div>
                                <input type="submit" value="Register" name="register-account" class="submit">
                                <input type="reset" value="Cancel" class="submit" data-close-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php if (isset($_SESSION['success'])) : ?>
        <div class="success-message active">
            <div class="success-header">
                PAGE ALERT
            </div>
            <div class="message">
                <?= $_SESSION['success']; ?>
            </div>
        </div>
        <div id="overlay" class="active"></div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <div id="overlay"></div>
    <?php include('../footer.php'); ?>
</body>

</html>