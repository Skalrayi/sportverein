<?php
include __DIR__ . "/../elements/header.php";
include __DIR__ . "/../elements/navbar.php";
/**
 * @var array $userData
 * @var int|null $page
 * @var int $lastPage
 */
?>

<?php if (isset($_GET['edit'])) : ?>
<?php // wenn man editieren will, dann kommt das Editmodal ausgefahren mit Einflug und Backdrop ?>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#editmember').modal('show');
        });
    </script>
<?php endif; ?>
<div class="container body-list">
    <div class="mb-5 mt-5">
        <h1>Mitgliederverwaltung</h1>
        <hr>
    </div>

    <div class="action-bar mb-5">
        <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#addmember">+ Mitglied hinzufügen</button>
        <?php if (isset($_GET['missingParameters'])) : ?>
            <p class="color-red">Fehlerhafte Eingaben!</p>
        <?php endif; ?>
        <div class="search-wrapper">
            <i class="fa fa-search" aria-hidden="true"></i>
            <form class="search" action="list.php" method="get">
                <input type="text" maxlength="50" placeholder="Suche" name="search">
            </form>
        </div>

    </div>
    <?php if (!empty($userData)) : ?>
    <div class="list container">
        <div class="row list-row list-head">
            <div class="col id"><span>ID</span></div>
            <div class="col surname"><span>Nachname</span> <div class="filter"><a href="" class="ascending"></a> <a href="" class="descending"></a></div> </div>
            <div class="col forename"><span>Vorname</span> <div class="filter"><a href="" class="ascending"></a> <a href="" class="descending"></a></div> </div>
            <div class="col zip"><span>PLZ</span> <div class="filter"><a href="" class="ascending"></a> <a href="" class="descending"></a></div> </div>
            <div class="col city"><span>Ort</span> <div class="filter"><a href="" class="ascending"></a> <a href="" class="descending"></a></div> </div>
            <div class="col male"><span>Geschlecht</span> <div class="filter"><a href="" class="ascending"></a> <a href="" class="descending"></a></div> </div>
            <div class="col sport"><span>Sportart</span> <div class="filter"><a href="" class="ascending"></a> <a href="" class="descending"></a></div> </div>
            <div class="col edit"><span>Bearbeiten</span></div>
        </div>
        <?php foreach ($userData as $user) : ?>
            <div class="row list-row">
                <div class="col id"><?= $user['mi_id'] ?></div>
                <div class="col surname"><?= $user['nachname'] ?></div>
                <div class="col forename"><?= $user['vorname'] ?></div>
                <div class="col zip"><?= $user['plz'] ?></div>
                <div class="col city"><?= $user['ort'] ?></div>
                <div class="col male"><?= $user['geschlecht'] ?></div>
                <div class="col sport"><?= $user['abteilung'] ?? '/' ?></div>
                <div class="col edit">
                    <a type="button" class="edit-button"  href="<?= Utility::buildEditLink($user['mi_id'])?>">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    <button type="button" class="delete-button" data-bs-toggle="modal" data-bs-target="#deletemember" data-id="<?= $user['mi_id'] ?>">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="row list-row list-pagination">
            <div class="results d-none">
                <p>Ergebnisse pro Seite</p>
                <form action="" method="get">
                    <input type="number" class="form-control" name="amount" placeholder="z.B. 20" min="1">
                </form>
                <p class="color-grey"> 1 - 20 von 120</p>
            </div>
            <div class="page">
                <div class="curren-page d-none">
                    <p>Aktuelle Seite</p>
                    <form action="" method="get">
                        <input type="number" class="form-control" placeholder="z.B. 20" min="1" value="<?= isset($_GET['page']) ? $_GET[$page] : '' ?>">
                    </form>
                </div>
                <div class="arrows">
                    <a href="./list.php?page=1"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
                    <a href="<?= isset($_GET['page']) ? ($_GET['page'] == 1 ? './list.php?page=1' : './list.php?page=' . $_GET['page'] - 1) : './list.php?page=1' ?>"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    <a href="<?= isset($_GET['page']) ? './list.php?page=' . $_GET['page'] + 1 : './list.php?page=2' ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    <a href="<?= './list.php?page=' . $lastPage ?>"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php else : ?>
    <div class="no-results">
        <p>Keine Ergebnisse</p>
        <a href="javascript:history.back()">Zurück</a>
    </div>
    <?php endif; ?>
</div>

<?php
include __DIR__ . "/../elements/modals.php";
include __DIR__ . "/../elements/footer.php"
?>

