<div class="main">
    <div class="mainblock">
        <div class="container-element block container-element--full">
            <h1>S'inscrire</h1>
            <form action="/inscription" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Nom d'utilisateur</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Doe156">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="********">
                </div>

                <div class="mb-3">
                    <button type="submit" name="createaccount" class="btn btn-primary mb-3">S'inscrire</button>
                </div>

            </form>

            <?php if (self::$success) : ?>
                <?php
                foreach (self::$success as $message) {
                    echo $message;
                }
                ?>
            <?php endif; ?>
            <?php if (self::$errors) : ?>
                <?php
                foreach (self::$errors as $message) {
                    echo $message;
                }
                ?>
            <?php endif; ?>

        </div>
    </div>
</div>