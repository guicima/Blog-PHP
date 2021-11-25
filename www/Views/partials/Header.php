<?php
$user = AuthController::isLoggedIn() ? new User(AuthController::isLoggedIn()['id']) : null;
?>
<nav class="navbar navbar-expand-lg navbar-dark px-4 py-3" style="background-color: #7D84B2;">
    <a class="navbar-brand" href="/">Cima</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link mx-4 <?= self::$url == 'index.php' ? 'active' : '' ?>" href="/">Articles</a>
            <a class="nav-item nav-link mx-4 <?= self::$url == 'a-propos' ? 'active' : '' ?>" target="_blank" href="/assets/CV.pdf">À propos</a>
            <a class="nav-item nav-link <?= self::$url == 'contact' ? 'active' : '' ?>" href="/contact" style="margin-left: 1.5rem; margin-right: 3rem">Contact</a>

            <?php if ($user != null) : ?>
                <div class="dropdown">
                    <a class="" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <img class="" src="https://avatars.dicebear.com/api/jdenticon/<?= htmlentities( $user->name ) ?>.svg?b=%238e9dcc&r=50&size=40" alt="Profil">
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                        <?php if ($user->admin) : ?>
                            <li><a class="dropdown-item" href="/addpost">Nouvel article</a></li>
                            <li><a class="dropdown-item" href="/managepost">Gestion des articles</a></li>
                            <li><a class="dropdown-item" href="/managecomment">Gestion des commentaires</a></li>
                        <?php endif; ?>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/logout">Se déconnecter</a></li>
                    </ul>
                </div>
            <?php else : ?>
                <a class="nav-item nav-link <?= self::$url == 'connexion' ? 'active' : '' ?>" href="/connexion" style="margin-left: 0rem; margin-right: 1.5rem">Se connecter</a>
                <a class="nav-item nav-link <?= self::$url == 'inscription' ? 'active' : '' ?>" href="/inscription" style="margin-left: 1.5rem; margin-right: 3rem">S'incrire</a>
            <?php endif; ?>
        </div>
    </div>
</nav>