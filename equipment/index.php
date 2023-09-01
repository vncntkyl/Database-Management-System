<?php
include('../controller/authSession.php');
require_once '../controller/equipmentController.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> DBMS | <?= ucwords($_SESSION['username']) ?> | Equipment Management</title>
    <link rel="icon" href="../css/database-solid.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
    <script src="../js/app.js" defer></script>
    <script src="../js/main.js" defer></script>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/modals.css">
    <link rel="stylesheet" href="../css/header-footer.css">
    <link rel="stylesheet" href="../css/table.css">
</head>

<body>
    <?php include('../css/loader.php'); ?>
    <?php include('../header.php'); ?>
    <?php include('equipment-add-modal.php'); ?>
    <main class="fx-col tables">
        <div class="homepage fx-col">
            <span class="welcome">Welcome to Equpment Management Page, <?= ucwords($_SESSION['username']) ?>!
                <br>as an <strong><?= $_SESSION['usertype']; ?></strong>,
                <?php if ($_SESSION['usertype'] === 'ADMINISTRATOR') : ?>
                    you can <span class="italicized">search</span>, <span class="italicized">view</span>, and <span class="italicized">edit</span> the records below.
                <?php elseif ($_SESSION['usertype'] === 'TECHNICAL') : ?>
                    you can <span class="italicized">search</span>, <span class="italicized">view</span>, and <span class="italicized">edit</span> the records below.
                <?php elseif ($_SESSION['usertype'] === 'USER') : ?>
                    you can only <span class="italicized">search</span>, and <span class="italicized">view</span> the records below.
                <?php endif; ?>
            </span>
        </div>
        <section class="table equipment fx-col">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-search fx-row">
                <input type="search" name="equipment-search" id="equipment-search" class="input searchbar" placeholder="Search for an equipment here" required>
                <input type="submit" value="Find" name="search-equipment" class="submit submit-equipment">
                <input type="submit" value="Show All" name="show-all" class="submit submit-equipment" formnovalidate>
            </form>
            <?php if (isset($_SESSION['searched'])) : ?>
                <span><?= $_SESSION['searched'] ?></span>
            <?php endif; ?>
            <table id="database-table">
                <thead>
                    <tr>
                        <th>Asset Number</th>
                        <th>Serial Number</th>
                        <th>Type</th>
                        <th>Department</th>
                        <th>Status</th>
                        <?php if ($_SESSION['usertype'] === "ADMINISTRATOR" || $_SESSION['usertype'] === "TECHNICAL") : ?>
                            <th>Options</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($result) > 0) : ?>
                        <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                            <tr>
                                <td><?= $row['assetNumber']; ?></td>
                                <td><?= $row['serialNumber']; ?></td>
                                <td><?= $row['type']; ?></td>
                                <td><?= $row['department']; ?></td>
                                <?php if ($row['status'] == 'WORKING') : ?>
                                    <td class="working"><span><?= $row['status']; ?></span></td>
                                <?php elseif ($row['status'] == 'ON-REPAIR') : ?>
                                    <td class="on-repair"><span><?= $row['status']; ?></span></td>
                                <?php elseif ($row['status'] == 'RETIRE') : ?>
                                    <td class="retire"><span><?= $row['status']; ?></span></td>
                                <?php endif; ?>
                                <?php if ($_SESSION['usertype'] === "ADMINISTRATOR" || $_SESSION['usertype'] === "TECHNICAL") : ?>
                                    <td class="options">
                                        <a data-modal-target="#update-equipment-<?= $row['assetNumber'] ?>" class="a_sql">Update</a>
                                        <?php if ($row['status'] == 'WORKING') : ?>
                                            <a class="edit a_repair" data-modal-target="#update-on-repair-<?= $row['assetNumber'] ?>">On-Repair</a>
                                            <a class="edit a_retire" data-modal-target="#update-retire-<?= $row['assetNumber'] ?>">Retire</a>
                                        <?php elseif ($row['status'] == 'ON-REPAIR') : ?>
                                            <a class="edit a_retire" data-modal-target="#update-retire-<?= $row['assetNumber'] ?>">Retire</a>
                                            <a class="edit a_working" data-modal-target="#update-working-<?= $row['assetNumber'] ?>">Working</a>
                                        <?php elseif ($row['status'] == 'RETIRE') : ?>
                                            <a class="edit a_working" data-modal-target="#update-working-<?= $row['assetNumber'] ?>">Working</a>
                                        <?php endif; ?>
                                        <a class="a_sql" data-modal-target="#delete-<?= $row['assetNumber'] ?>">Delete</a>
                                        <?php include('modals.php'); ?>
                                    </td>
                                <?php endif; ?>
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