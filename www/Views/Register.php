<div class="main">
    <div class="mainblock">
        <div class="container-element container-element--full unconstrained">
            <div class="img-container">
                <img src="/assets/images/unset.jpg" alt="login" class="image">
            </div>

            <div class="content-box pad-right-larger pb-5">
                <h1>S'inscrire</h1>
                <form action="/inscription" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nom d'utilisateur</label>
                        <input type="text" class="input-field" id="username" name="username" placeholder="Doe156">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" class="input-field" id="email" name="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="input-field" id="password" name="password" placeholder="********">
                    </div>
                    
                    <button type="submit" name="createaccount" class="more">S'inscrire</button>
                    
                </form>

                <?php if (self::$errors) : ?>
                    <?php foreach (self::$errors as $message) : ?>
                        <div class="alert alert-danger"><?= htmlentities( $message ) ?></div>
                    <?php endforeach;?>
                <?php endif; ?>

                <?php if (self::$success) : ?>
                    <?php foreach (self::$success as $message) : ?>
                        <div class="alert alert-success"><?= htmlentities( $message ) ?></div>
                    <?php endforeach;?>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>