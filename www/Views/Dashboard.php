<div class="main">
    <div class="mainblock">
        <div class="container-element block container-element--full">
            <?php
            $user = new User(AuthController::isLoggedIn()['id']);
            ?>
            <div class="d-flex flex-row justify-content-evenly align-items-center h-100">
                <div class="w-25">
                    <img class="w-100" src="https://avatars.dicebear.com/api/jdenticon/<?= escape( $user->name ) ?>.svg?b=%238e9dcc&r=50" alt="Profil">
                </div>
                <div class="w-50 text-color-light">
                    <h1 class="mb-5">Mon compte</h1>
                    <h4>Pseudonyme</h4>
                    <p><?= escape( $user->name ) ?></p>
                    <h4>Email</h4>
                    <p><?= escape( $user->email ) ?></p>
                </div>
            </div>
        </div>

        <?php if ($user->admin) : ?>

            <a class="container-element d-flex flex-column text-center link-color-light p-5" href="/addpost">
                <i class="fas fa-pen fa-3x mb-2"></i>
                Nouvel article
            </a>
            <a class="container-element d-flex flex-column text-center link-color-light p-5" href="/managepost">
                <i class="fas fa-newspaper fa-3x mb-2"></i>
                Gestion des articles
            </a>
            <a class="container-element d-flex flex-column text-center link-color-light p-5" href="/managecomment">
                <i class="fas fa-comments fa-3x mb-2"></i>
                Gestion des commentaires
            </a>
            <a class="container-element d-flex flex-column text-center link-color-light p-5" href="/logout">
                <i class="fas fa-sign-out-alt fa-3x mb-2"></i>
                Se déconnecter
            </a>
        <?php endif; ?>
    </div>
</div>