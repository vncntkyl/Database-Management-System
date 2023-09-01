<?php
include('../controller/authSession.php');
require_once '../controller/mainController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> DBMS | <?= ucwords($_SESSION['username']) ?> | Logs Management</title>
    <link rel="icon" href="../css/database-solid.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
    <script src="../js/app.js" defer></script>
    <script src="../js/main.js" defer></script>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/table.css">
</head>

<body>
<?php include('../css/loader.php'); ?>
    <?php include('../header.php'); ?>
    <main class="fx-col tables">
        <div class="homepage fx-col">
            <span class="welcome">Welcome to Logs Management Page, <?= ucwords($_SESSION['username']) ?>!
                <br>as an <strong><?= $_SESSION['usertype']; ?></strong>,
                <?php if ($_SESSION['usertype'] === 'ADMINISTRATOR') : ?>
                    you can <span class="italicized">search</span>, and<span class="italicized">view</span> all the logs record.
                <?php elseif ($_SESSION['usertype'] === 'TECHNICAL') : ?>
                    you can <span class="italicized">search</span>, and<span class="italicized">view</span> your logs record.
                <?php endif; ?>
            </span>
        </div>
        <section class="table fx-col">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-search fx-row">
                <input type="search" name="log-search" id="log-search" class="input searchbar" placeholder="Search for log here" required>
                <input type="submit" value="Find" name="search-log" class="submit submit-equipment">
                <input type="submit" value="Show All" name="show-all" class="submit submit-equipment" formnovalidate>
            </form>
            <table id="database-table" class="logs">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Action</th>
                        <?php if ($_SESSION['usertype'] === "ADMINISTRATOR") : ?>
                            <th>Username | Asset Number</th>
                        <?php elseif ($_SESSION['usertype'] === "TECHNICAL") : ?>
                            <th>Asset Number</th>
                        <?php endif; ?>
                        <th>Performed By</th>
                        <th>Module</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0) : ?>
                        <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                            <tr>
                                <td><?= $row['datelog']; ?></td>
                                <td><?= $row['timelog']; ?></td>
                                <td><?= $row['action']; ?></td>
                                <td><?= $row['user']; ?></td>
                                <td><?= $row['performedBy']; ?></td>
                                <td><?= $row['module']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <tr>
                            <td>
                                <?= 'No logs found.'; ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>
    <div id="overlay"></div>
    <?php include('../footer.php'); ?>
</body>

</html>