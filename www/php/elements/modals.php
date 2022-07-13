<?php
/**
 * @var string $forename
 * @var string $surname
 * @var string $zip
 * @var string $city
 * @var string $gender
 * @var int $id
 * @var array $sportarten
 * @var array $memberSportarten
 */
?>
<!-- Add Modal -->
<div class="modal fade" id="addmember" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h2 class="modal-title" id="exampleModalLongTitle">Mitglied hinzufügen</h2>
                    <hr>
                </div>
                <button type="button" class="close btn btn-light" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/php/actions/insert.php" method="post">
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="forename" class="form-label">Vorname *</label>
                        <input type="text" class="form-control" id="forename" name="forename" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="surname" class="form-label">Nachname *</label>
                        <input type="text" class="form-control" id="surname" name="surname" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="zip" class="form-label">PLZ *</label>
                        <input type="text" class="form-control" maxlength="6" id="zip" name="zip" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="city" class="form-label">Ort *</label>
                        <input type="text" class="form-control" id="city" name="city" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="male" class="form-label">Geschlecht *</label>
                        <select class="form-select" id="gender" name="gender"  required>
                            <option selected disabled value="">Geschlecht</option>
                            <option value="m">Männlich</option>
                            <option value="w">Weiblich</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="sport" class="form-label">Sportarten *</label>
                        <select type="text" class="form-select mb-4" id="sport" name="sport[]" required multiple>
                            <option selected disabled value="">Sportart</option>
                            <?php foreach ($sportarten as $sportart) : ?>
                                <option value="<?= $sportart['sa_id'] ?>"><?= $sportart['abteilung'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-default submit-edit d-block w-100">Speichern</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade in" id="editmember" tabindex="-1" role="dialog" data-show="true" data-backdrop="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h2 class="modal-title" id="exampleModalLongTitle">Mitglied bearbeiten</h2>
                    <hr>
                </div>
                <button type="button" class="close btn btn-light" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/php/actions/edit.php" method="post">
                <input type="hidden" name="id" value="<?= $id ?>">
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="forename" class="form-label">Vorname *</label>
                        <input type="text" class="form-control" id="forename" name="forename" value="<?= $forename ?>" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="surname" class="form-label">Nachname *</label>
                        <input type="text" class="form-control" id="surname" name="surname" value="<?= $surname ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="zip" class="form-label">PLZ *</label>
                        <input type="text" class="form-control maxlength="6"" id="zip" name="zip" value="<?= $zip ?>" required>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="city" class="form-label">Ort *</label>
                        <input type="text" class="form-control" id="city" name="city" value="<?= $city ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label for="male" class="form-label">Geschlecht *</label>
                        <select class="form-select" id="male" name="gender"  required>
                            <option disabled>Geschlecht</option>
                            <option <?= $gender == 'm' ? 'selected' : '' ?> value="m">Männlich</option>
                            <option <?= $gender == 'w' ? 'selected' : '' ?> value="w">Weiblich</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label for="sport" class="form-label">Sportarten *</label>
                        <select type="text" class="form-select mb-4" id="sport" name="sport[]" required multiple>
                            <option disabled selected>Sportart</option>
                            <?php foreach($sportarten as $sportart) : ?>
                                <option <?= in_array($sportart, $memberSportarten) ? 'selected' : '' ?>  value="<?= $sportart['sa_id'] ?>"><?= $sportart['abteilung'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-default submit-edit d-block w-100">Speichern</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade deletemember" id="deletemember" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h2 class="modal-title" id="exampleModalLongTitle">Mitglied wirklich löschen?</h2>
                    <hr>
                </div>
                <button type="button" class="close btn btn-light" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/php/actions/delete.php" method="post">
                <input type="hidden" name="id" id="id-field">
                <button type="submit" class="btn btn-default submit-delete d-block w-100">Löschen</button>
            </form>
        </div>
    </div>
</div>
