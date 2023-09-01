<div class="confirm-message form equipment-form no-width" id="add-equipment">
    <div class="confirm-header">
        <div class="success-header">EQUIPMENT REGISTRATION</div>
        <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="confirm-body">
        <div class="c-message">
            <span>Fill up the form and submit to add a new equipment.</span>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id="equipment-registration-form" class="form-add fx-col">
                <div class="input-list fx-row">
                    <div class="input-cont fx-col">
                        <label for="assetNum-add">Asset Number</label>
                        <input type="text" name="assetNum-add" id="assetNum-add" class="input" data-field-input placeholder="ex. 03PRSC1120" required>
                    </div>
                    <div class="input-cont fx-col">
                        <label for="serialNum-add">Serial Number</label>
                        <input type="text" name="serialNum-add" id="serialNum-add" class="input" data-field-input placeholder="ex. JJ3K8DDDGOMT7NYXPJWS" required>
                    </div>
                    <div class="input-cont fx-col">
                        <label for="type-add">Equipment Type</label>
                        <select name="type-add" id="type-add" data-field-select class="input" required>
                            <option value="" class="disabled" selected>Equipment type</option>
                            <?php foreach (['Monitor', 'CPU', 'Keyboard', 'Mouse', 'AVR', 'MAC', 'Printer', 'Projector'] as $type) : ?>
                                <option value="<?= $type; ?>"><?= $type; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="input-list fx-row">
                    <div class="input-cont fx-col">
                        <label for="manufacturer-add">Manufacturer</label>
                        <input type="text" name="manufacturer-add" id="manufacturer-add" data-field-input class="input" placeholder="ex. Samsung" required>
                    </div>
                    <div class="input-cont fx-col">
                        <label for="year-add">Year Model</label>
                        <input type="number" name="year-add" id="year-add" class="input" data-field-input placeholder="ex. 2021" min="1950" max="3000" onKeyPress="if(this.value.length==4) return false;" required>
                    </div>
                    <div class="input-cont fx-col">
                        <label for="department-add">Equipment Department</label>
                        <select name="department-add" data-field-select id="department-add" class="input" required>
                            <option value="" class="disabled" selected>Equipment Department</option>
                            <?php foreach ($collegeNames as $col) : ?>
                                <option value="<?= $col; ?>"><?= $col; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <textarea name="description-add" data-field-input id="description-add" placeholder="Enter the description here" required></textarea>
                <div class="fx-row">
                    <input type="submit" value="Register" name="register-equipment" class="submit">
                    <input type="reset" value="Cancel" class="submit" data-close-button>
                </div>
            </form>
        </div>
    </div>
</div>