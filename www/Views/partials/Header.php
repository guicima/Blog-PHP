<nav class="navbar navbar-expand-lg navbar-dark px-4 py-3" style="background-color: #7D84B2;">
    <a class="navbar-brand" href="/">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link mx-4 <?= self::$url == 'index.php' ? 'active' : '' ?>" href="/">Articles</a>
            <a class="nav-item nav-link mx-4 <?= self::$url == 'a-propos' ? 'active' : '' ?>" href="/a-propos">À propos</a>
            <a class="nav-item nav-link <?= self::$url == 'contact' ? 'active' : '' ?>" href="/contact" style="margin-left: 1.5rem; margin-right: 3rem">Contact</a>

            <?php if (self::isLoggedIn()) : ?>
                <div class="dropdown">
                    <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="" src="https://avatars.dicebear.com/api/jdenticon/<?= self::isLoggedIn()['username'] ?>.svg?b=%238e9dcc&r=50&size=40" alt="Profil">
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                </div>
            <?php else : ?>
                <a class="nav-item nav-link <?= self::$url == 'connexion' ? 'active' : '' ?>" href="/connexion" style="margin-left: 0rem; margin-right: 1.5rem">Se connecter</a>
                <a class="nav-item nav-link <?= self::$url == 'inscription' ? 'active' : '' ?>" href="/inscription" style="margin-left: 1.5rem; margin-right: 3rem">S'incrire</a>
            <?php endif; ?>
        </div>
    </div>
</nav>