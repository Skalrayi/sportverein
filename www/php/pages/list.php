<?php
include __DIR__ . "/../elements/header.php";
include __DIR__ . "/../elements/navbar.php";

?>

<div class="container">
    <div class="mb-5 mt-5">
        <h1>Mitgliederverwaltung</h1>
        <hr>
    </div>

    <div class="action-bar mb-5">
        <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#addmember">+ Mitglied hinzufügen</button>
        <form class="search" action="list.php" method="post">
            <input type="text" placeholder="Suche" name="search">
        </form>
    </div>

    <div class="list container">
        <div class="row list-row list-head">
            <div class="col id">#</div>
            <div class="col surname">Nachname</div>
            <div class="col forename">Vorname</div>
            <div class="col zip">PLZ</div>
            <div class="col city">Ort</div>
            <div class="col male">Geschlecht</div>
            <div class="col sport">Sportart</div>
            <div class="col money">Grundbeitrag</div>
            <div class="col edit">Bearbeiten</div>
        </div>
        <div class="row list-row">
            <div class="col id">#</div>
            <div class="col surname">Nachname</div>
            <div class="col forename">Vorname</div>
            <div class="col zip">PLZ</div>
            <div class="col city">Ort</div>
            <div class="col male">Geschlecht</div>
            <div class="col sport">Sportart</div>
            <div class="col money">Grundbeitrag</div>
            <div class="col edit">
                <button type="button" class="edit-button" data-bs-toggle="modal" data-bs-target="#editmember">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </button>
                <button type="button" class="delete-button" data-bs-toggle="modal" data-bs-target="#deletemember">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>

            </div>
        </div>
        <div class="row list-row">
            <div class="col id">#</div>
            <div class="col surname">Nachname</div>
            <div class="col forename">Vorname</div>
            <div class="col zip">PLZ</div>
            <div class="col city">Ort</div>
            <div class="col male">Geschlecht</div>
            <div class="col sport">Sportart</div>
            <div class="col money">Grundbeitrag</div>
            <div class="col edit">Bearbeiten</div>
        </div>
        <div class="row list-row">
            <div class="col id">#</div>
            <div class="col surname">Nachname</div>
            <div class="col forename">Vorname</div>
            <div class="col zip">PLZ</div>
            <div class="col city">Ort</div>
            <div class="col male">Geschlecht</div>
            <div class="col sport">Sportart</div>
            <div class="col money">Grundbeitrag</div>
            <div class="col edit">Bearbeiten</div>
        </div>
        </tbody>
    </div>
    <!-- Button trigger modal -->


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
                <form action="" method="post">
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="forename" class="form-label">Vorname *</label>
                            <input type="text" class="form-control" id="forename" name="forename" required>
                        </div>
                        <div class="col-6">
                            <label for="surname" class="form-label">Nachname *</label>
                            <input type="text" class="form-control" id="surname" name="surname" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="zip" class="form-label">PLZ *</label>
                            <input type="text" class="form-control" id="zip" name="zip" required>
                        </div>
                        <div class="col-6">
                            <label for="city" class="form-label">Ort *</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="male" class="form-label">Geschlecht *</label>
                            <select class="form-select" id="male" name="male"  required>
                                <option selected>Geschlecht</option>
                                <option value="male">Männlich</option>
                                <option value="female">Weiblich</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="sport" class="form-label">Sportarten *</label>
                            <select type="text" class="form-select mb-4" id="sport" name="sport" required>
                                <option selected>Geschlecht</option>
                                <option value="male">Männlich</option>
                                <option value="female">Weiblich</option>
                            </select>
                            <button type="submit" class="btn btn-default submit-edit d-block w-100">Speichern</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
   <div class="modal fade" id="editmember" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                <form action="" method="post">
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="forename" class="form-label">Vorname *</label>
                            <input type="text" class="form-control" id="forename" name="forename" required>
                        </div>
                        <div class="col-6">
                            <label for="surname" class="form-label">Nachname *</label>
                            <input type="text" class="form-control" id="surname" name="surname" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="zip" class="form-label">PLZ *</label>
                            <input type="text" class="form-control" id="zip" name="zip" required>
                        </div>
                        <div class="col-6">
                            <label for="city" class="form-label">Ort *</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-6">
                            <label for="male" class="form-label">Geschlecht *</label>
                            <select class="form-select" id="male" name="male"  required>
                                <option selected>Geschlecht</option>
                                <option value="male">Männlich</option>
                                <option value="female">Weiblich</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="sport" class="form-label">Sportarten *</label>
                            <select type="text" class="form-select mb-4" id="sport" name="sport" required>
                                <option selected>Geschlecht</option>
                                <option value="male">Männlich</option>
                                <option value="female">Weiblich</option>
                            </select>
                            <button type="submit" class="btn btn-default submit-edit d-block w-100">Speichern</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deletemember" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                <form action="" method="post">
                    <button type="submit" class="btn btn-default submit-delete d-block w-100">Löschen</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . "/../elements/footer.php"
?>

