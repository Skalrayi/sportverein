<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/php/list.php">Mitgliederverwaltungsprogramm</a>
        <!--
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link logout" href="/php/actions/logout.php"><?php echo $_SESSION['username'] ?> <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>