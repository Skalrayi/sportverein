<?php
include __DIR__ . "/../elements/header.php";
include __DIR__ . "/../elements/navbar.php";
/**
 * @var array $userData
 * @var int|null $page
 * @var int $lastPage
 */
?>

<div class="container body-list">
    <div class="mb-5 mt-5">
        <h1>Mitgliederverwaltung</h1>
        <hr>
    </div>

    <div class="action-bar mb-5">
        <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#addmember">+ Mitglied hinzufügen</button>
        <?php if (isset($_GET['missingParameters'])) : //TODO html anpassen ?>
            <p class="color-red">Fehlerhafte Eingaben!</p>
        <?php endif; ?>
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
        <?php foreach ($userData as $user) : ?>
            <div class="row list-row">
                <div class="col id"><?= $user['mi_id'] ?></div>
                <div class="col surname"><?= $user['nachname'] ?></div>
                <div class="col forename"><?= $user['vorname'] ?></div>
                <div class="col zip"><?= $user['plz'] ?></div>
                <div class="col city"><?= $user['ort'] ?></div>
                <div class="col male"><?= $user['geschlecht'] ?></div>
                <div class="col sport"><?= $user['or_id'] ?></div>
                <div class="col money"><?= $user['beitrag'] ?></div>
                <div class="col edit">
                    <button type="button" class="edit-button" data-bs-toggle="modal" data-bs-target="#editmember">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="delete-button" data-bs-toggle="modal" data-bs-target="#deletemember" data-id="<?= $user['mi_id'] ?>">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="row list-row list-pagination">
            <div class="results">
                <p>Ergebnisse pro Seite</p>
                <form action="" method="get">
                    <input type="number" class="form-control" name="amount" placeholder="z.B. 20" min="1">
                </form>
                <p class="color-grey"> 1 - 20 von 120</p>
            </div>
            <div class="page">
                <p>Aktuelle Seite</p>
                <form action="" method="get">
                    <input type="number" class="form-control" placeholder="z.B. 20" min="1" value="<?= isset($_GET['page']) ? $_GET[$page] : '' ?>">
                </form>
                <div class="arrows">
                    <?php // TODO paginagin auslagern und überarbeiten ?>
                    <?php // TODO auslagern in den Controller und nur der View die Variablen übergeben, logik dafür noch bauen!!! ?>
                    <a href="./list.php?page=1"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                    <a href="<?= isset($_GET['page']) ? ($_GET['page'] == 1 ? './list.php?page=1' : './list.php?page=' . $_GET['page'] - 1) : './list.php?page=1' ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    <a href="<?= isset($_GET['page']) ? './list.php?page=' . $_GET['page'] + 1 : './list.php?page=2' ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    <?php //TODO amountPerPage muss gemacht werden!!!?>
                    <a href="<?= './list.php?page=' . $lastPage ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . "/../elements/modals.php";
include __DIR__ . "/../elements/footer.php"
?>

