<?php
include __DIR__ . "/../elements/header.php";
include __DIR__ . "/../elements/navbar.php";
?>

<div class="container body-list">
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
            <div class="col id">ID</div>
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
            <div class="col edit">
                <button type="button" class="edit-button" data-bs-toggle="modal" data-bs-target="#editmember">
                    <i class="fa fa-pencil" aria-hidden="true"></i>
                </button>
                <button type="button" class="delete-button" data-bs-toggle="modal" data-bs-target="#deletemember">
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </button>

            </div>
        </div>
        <div class="row list-row list-pagination">
            <div class="results">
                <p>Ergebnisse pro Seite</p>
                <form action="" method="post">
                    <input type="number" class="form-control" placeholder="z.B. 20">
                </form>
                <p class="color-grey"> 1 - 20 von 120</p>
            </div>
            <div class="page">
                <p>Aktuelle Seite</p>
                <form action="" method="post">
                    <input type="number" class="form-control" placeholder="z.B. 20">
                </form>
                <div class="arrows">
                    <a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . "/../elements/modals.php";
include __DIR__ . "/../elements/footer.php"
?>

