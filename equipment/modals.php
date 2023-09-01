<div id="update-working-<?= $row['assetNumber'] ?>" class="confirm-message">
    <div class="confirm-header">
        <div class="confirm-title">Equipment Status</div>
        <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="confirm-body">
        <div class="c-message">
            <p>Update the status of the equipment with the Asset Number of <?= $row['assetNumber'] ?> to 'WORKING'?</p>
        </div>
        <button onclick="location.href='working-equipment.php?AN=<?= $row['assetNumber']; ?>'">Yes</button>
        <button data-close-button>Cancel</button>
    </div>
</div>
<div id="update-on-repair-<?= $row['assetNumber'] ?>" class="confirm-message">
    <div class="confirm-header">
        <div class="confirm-title">Equipment Status</div>
        <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="confirm-body">
        <div class="c-message">
            <p>Update the status of the equipment with the Asset Number of <?= $row['assetNumber'] ?> to 'ON-REPAIR'?</p>
        </div>
        <button onclick="location.href='repair-equipment.php?AN=<?= $row['assetNumber']; ?>'">Yes</button>
        <button data-close-button>Cancel</button>
    </div>
</div>
<div id="update-retire-<?= $row['assetNumber'] ?>" class="confirm-message">
    <div class="confirm-header">
        <div class="confirm-title">Equipment Status</div>
        <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="confirm-body">
        <div class="c-message">
            <p>Update the status of the equipment with the Asset Number of <?= $row['assetNumber'] ?> to 'RETIRE'?</p>
        </div>
        <button onclick="location.href='retire-equipment.php?AN=<?= $row['assetNumber']; ?>'">Yes</button>
        <button data-close-button>Cancel</button>
    </div>
</div>
<div id="delete-<?= $row['assetNumber'] ?>" class="confirm-message">
    <div class="confirm-header">
        <div class="confirm-title">Equipment Deletion</div>
        <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="confirm-body">
        <div class="c-message">
            <p>Asset Number: <?= $row['assetNumber'] ?> <br> Delete this equipment?</p>
        </div>
        <button onclick="location.href='delete-equipment.php?AN=<?= $row['assetNumber']; ?>'">Yes</button>
        <button data-close-button>Cancel</button>
    </div>
</div>
<div class="confirm-message equipment-form no-width" id="update-equipment-<?= $row['assetNumber'] ?>">
    <div class="confirm-header">
        <div class="success-header">UPDATE EQUIPMENT</div>
        <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="confirm-body">
        <div class="c-message">
            <span>Update an equipment. <br>NOTE: Asset Number cannot be edited.</span>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form-add fx-col">
                <div class="input-list fx-row">
                    <div class="input-cont fx-col">
                        <label for="assetNum-update">Asset Number</label>
                        <input type="text" value="<?= $row['assetNumber'] ?>" class="input" data-field-input placeholder="ex. 03PRSC1120" disabled>
                        <input type="hidden" name="assetNum-update" value="<?= $row['assetNumber'] ?>">
                    </div>
                    <div class="input-cont fx-col">
                        <label for="serialNum-update">Serial Number</label>
                        <input type="text" name="serialNum-update" value="<?= $row['serialNumber'] ?>" data-field-input class="input" placeholder="ex. JJ3K8DDDGOMT7NYXPJWS" required>
                    </div>
                    <div class="input-cont fx-col">
                        <label for="type-update">Equipment Type</label>
                        <select name="type-update" class="input" data-field-select required>
                            <option value="" class="disabled">Equipment type</option>
                            <?php foreach (['Monitor', 'CPU', 'Keyboard', 'Mouse', 'AVR', 'MAC', 'Printer', 'Projector'] as $type) : ?>
                                <?php if ($row['type'] == $type) : ?>
                                    <option value="<?= $type; ?>" selected><?= $type; ?></option>
                                <?php else : ?>
                                    <option value="<?= $type; ?>"><?= $type; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="input-list fx-row">
                    <div class="input-cont fx-col">
                        <label for="manufacturer-update">Manufacturer</label>
                        <input type="text" name="manufacturer-update" data-field-input value="<?= $row['manufacturer'] ?>" class="input" placeholder="ex. Samsung" required>
                    </div>
                    <div class="input-cont fx-col">
                        <label for="year-update">Year Model</label>
                        <input type="number" name="year-update" class="input" data-field-input value="<?= $row['yearModel'] ?>" placeholder="ex. 2021" min="1950" max="3000" onKeyPress="if(this.value.length==4) return false;" required>
                    </div>
                    <div class="input-cont fx-col">
                        <label for="department-update">Equipment Department</label>
                        <select name="department-update" class="input" data-field-select required>
                            <option value="" class="disabled">Equipment Department</option>
                            <?php foreach ($collegeNames as $col) : ?>
                                <?php if ($row['department'] == $col) : ?>
                                    <option value="<?= $row['department'] ?>" selected><?= $row['department'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $col; ?>"><?= $col; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <textarea name="description-update" placeholder="Enter the description here" data-field-input required><?= $row['description'] ?></textarea>
                <div class="fx-row">
                    <input type="submit" value="Update" name="update-equipment" class="submit">
                    <input type="reset" value="Cancel" class="submit" data-close-button>
                </div>
            </form>
        </div>
    </div>
</div>