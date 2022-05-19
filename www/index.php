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
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Benutzername</label>
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Passwort</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <button type="submit" class="btn btn-default d-block w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="d-none d-md-block col-md-6 login-background"></div>
    </div>
</div>
</body>
</html>
