<div id="update-active-<?= $row['username'] ?>" class="confirm-message">
    <div class="confirm-header">
        <div class="confirm-title">Account Status</div>
        <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="confirm-body">
        <div class="c-message">
            <p>Update the status of '<?= $row['username'] ?>' to 'ACTIVE'?</p>
        </div>
        <button onclick="location.href='activate-account.php?username=<?= $row['username']; ?>'">Yes</button>
        <button data-close-button>Cancel</button>
    </div>
</div>
<div id="update-deactivate-<?= $row['username'] ?>" class="confirm-message">
    <div class="confirm-header">
        <div class="confirm-title">Equipment Status</div>
        <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="confirm-body">
        <div class="c-message">
            <p>Update the status of '<?= $row['username'] ?>' to 'INACTIVE'?</p>
        </div>
        <button onclick="location.href='deactivate-account.php?username=<?= $row['username']; ?>'">Yes</button>
        <button data-close-button>Cancel</button>
    </div>
</div>
<div id="delete-<?= $row['username'] ?>" class="confirm-message">
    <div class="confirm-header">
        <div class="confirm-title">Account Deletion</div>
        <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="confirm-body">
        <div class="c-message">
            <p>Delete "<?= $row['username'] ?>" forever ?</p>
        </div>
        <button onclick="location.href='delete-account.php?username=<?= $row['username']; ?>'">Yes</button>
        <button data-close-button>Cancel</button>
    </div>
</div>
<div class="confirm-message" id="update-account-<?= $row['username']; ?>">
    <div class="confirm-header">
        <div class="success-header">UPDATE ACCOUNT INFORMATION</div>
        <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="confirm-body">
        <div class="c-message">
            <span>Account username: <?= $row['username'] ?></span>
            <br><br>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-modal fx-col">
                <input type="hidden" name="username-update" value="<?= $row['username'] ?>">
                <label for="password-update">Password </label>
                <input type="password" name="password-update" value="<?= $row['password'] ?>" class="input" placeholder="Enter password here" required>
                <label for="usertype-update">User Type </label>
                <select name="usertype-update" class="input" required>
                    <option value="" disabled>--Select User Type--</option>
                    <?php foreach (['ADMINISTRATOR', 'TECHNICAL', 'USER'] as $type) : ?>
                        <?php if ($row['userType'] == $type) : ?>
                            <option value="<?= $type; ?>" selected><?= $type; ?></option>
                        <?php else : ?>
                            <option value="<?= $type; ?>"><?= $type ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <div>
                    <input type="submit" value="Update" name="update-account" class="submit">
                    <input type="reset" value="Cancel" class="submit" data-close-button>
                </div>
            </form>
        </div>
    </div>
</div>