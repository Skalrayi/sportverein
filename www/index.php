<?php
    include "php/elements/header.php";
    include "php/elements/navbar.php";

?>


<div class="container-fluid login-background">
    <div class="container login-wrapper">
        <div class="login-form-wrapper">
            <h1 class="text-center">Sportverein</h1>
            <h2 class="text-center">Login</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="benutzername" class="form-label">Benutzername</label>
                    <input type="text" class="form-control" id="benutzername">
                </div>
                <div class="mb-3">
                    <label for="passwort" class="form-label">Passwort</label>
                    <input type="password" class="form-control" id="passwort">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>


<?php
    include "php/elements/footer.php"
?>
