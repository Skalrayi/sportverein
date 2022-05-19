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
        <button type="button" class="btn btn-default">+ Mitglied hinzufügen</button>
        <form class="search" action="list.php" method="post">
            <input type="text" placeholder="Suche" name="search">
        </form>
    </div>

    <div class="list container">
        <div class="row list-row list-head">
            <div class="col id">#</div>
            <div class="col surname">Nachname</div>
            <div class="col forename">Vorname</div>
            <div class="col plz">PLZ</div>
            <div class="col city">Ort</div>
            <div class="col male">Geschlecht</div>
            <div class="col sport">Sportart</div>
            <div class="col money">Grundbeitrag</div>
            <div class="col edit">Bearbeiten</div>
        </div>
        <div class="row list-row">
            <div class="col">#</div>
            <div class="col">Nachname</div>
            <div class="col">Vorname</div>
            <div class="col">PLZ</div>
            <div class="col">Ort</div>
            <div class="col">Geschlecht</div>
            <div class="col">Sportart</div>
            <div class="col">Grundbeitrag</div>
            <div class="col">Bearbeiten</div>
        </div>
        <div class="row list-row">
            <div class="col">#</div>
            <div class="col">Nachname</div>
            <div class="col">Vorname</div>
            <div class="col">PLZ</div>
            <div class="col">Ort</div>
            <div class="col">Geschlecht</div>
            <div class="col">Sportart</div>
            <div class="col">Grundbeitrag</div>
            <div class="col">Bearbeiten</div>
        </div>
        <div class="row list-row">
            <div class="col">#</div>
            <div class="col">Nachname</div>
            <div class="col">Vorname</div>
            <div class="col">PLZ</div>
            <div class="col">Ort</div>
            <div class="col">Geschlecht</div>
            <div class="col">Sportart</div>
            <div class="col">Grundbeitrag</div>
            <div class="col">Bearbeiten</div>
        </div>
        </tbody>
    </div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#editmember">
        edit
    </button>

    <!-- Modal -->
    <div class="modal fade" id="editmember" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Benutzername</label>
                        <input type="text" class="form-control" id="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Passwort</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . "/../elements/footer.php"
?>

