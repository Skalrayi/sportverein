<?php
    include "php/elements/header.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="login-wrapper">
                <div class="login-form-wrapper">
                    <h1>Sportverein</h1>
                    <hr>
                    <form action="php/actions/login.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Benutzername</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Passwort</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-default d-block w-100">Login</button>
                    </form>
                    <?php if (isset($_GET['login'])): ?>
                        <p class="color-red">Die Eingabe war nicht korrekt</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="d-none d-md-block col-md-6 login-background"></div>
    </div>
</div>
</body>
</html>
