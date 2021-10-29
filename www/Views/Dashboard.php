<div class="main">
    <div class="mainblock">
        <div class="container-element block container-element--full">
            <?php
                $user = new User(AuthController::isLoggedIn()['id']);
            ?>
            <div class="d-flex flex-row justify-content-evenly align-items-center h-100">
                <div class="w-25">
                    <img class="w-100" src="https://avatars.dicebear.com/api/jdenticon/<?= $user->name ?>.svg?b=%238e9dcc&r=50" alt="Profil">
                </div>
                <div>
                   <h1>Dashboard</h1>
                    <p><?= $user->name ?></p>
                    <p><?= $user->email ?></p>
                </div>
            </div>
        </div>

        <?php if ($user->admin) : ?>
            
                <a class="container-element block" href="/addpost">
                    Nouvel article
                </a>
                <a class="container-element block" href="/managepost">
                    Gestion des articles
                </a>
                <a class="container-element block" href="#">
                    Gestion des commentaires
                </a>
                <a class="container-element block" href="/logout">
                    Se déconnecter
                </a>
        <?php endif; ?>
    </div>
</div>