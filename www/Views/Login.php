<div class="main">
    <div class="mainblock">
        <div class="container-element container-element--full">
            <div class="img-container">
                <img src="/assets/images/unset.jpg" alt="login" class="image">
            </div>
            <div class="content-box pad-right-larger">
                <h1>Se connecter</h1>
                <form action="/connexion" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" class="input-field" id="email" name="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="input-field" id="password" name="password" placeholder="********">
                    </div>
                    <button type="submit" name="login" class="more">Se connecter</button>
                </form>
                <div class="mb-3">
                    <?php if (self::$errors) : ?>
                        <?php foreach (self::$errors as $message) : ?>
                            <p><?= htmlentities( $message ) ?></p>
                        <?php endforeach;?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>