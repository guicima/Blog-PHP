<div class="main">
    <div class="mainblock">
        <div class="container-element block container-element--full unconstrained p-5">
            <?php
                //$user = new User(AuthController::isLoggedIn()['id']);
                if (!empty(SuperGet::get('postid') && self::query('SELECT * FROM articles WHERE id=:postid', array(':postid' => SuperGet::get('postid'))))) {
                    $modifypost = self::query('SELECT * FROM articles WHERE id=:postid', array(':postid' => SuperGet::get('postid')))[0];
                } else {
                    $modifypost = null;
                }
            ?>

            <h1 class="text-light"><?= $modifypost ? 'Modifier' : 'Nouvel' ?> article</h1>
            <form action="/addpost" method="post">

                <?php if($modifypost) : ?>
                    <input type="number" value="<?= htmlentities( SuperGet::get('postid') ) ?>" name="postid" class="visually-hidden">
                <?php endif ?>

                <div class="mb-3">
                    <label for="title" class="form-label text-light">Titre</label>
                    <input type="text" class="input-field" maxlength="32" id="title" name="title" value="<?= htmlentities( $modifypost ? $modifypost['title'] : '' ) ?>" placeholder="Titre">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label text-light">Description</label>
                    <input type="text" class="input-field" maxlength="380" id="description" name="description" value="<?= htmlentities( $modifypost ? $modifypost['tiny_text'] : '' ) ?>" placeholder="Petite description">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label text-light">Contenu</label>
                    <textarea type="text" class="input-field" id="content" name="content" placeholder="Contenu"><?= htmlentities( $modifypost ? $modifypost['text'] : '' ) ?></textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" name="addpost" class="btn btn-link link-color-yellow" value="draft">Ajouter aux brouillons</button>
                    <button type="submit" name="addpost" class="btn btn-link link-color-green" value="public"><?= $modifypost ? 'Modifier publiquement' : 'Publier' ?></button>
                </div>

            </form>
        </div>
    </div>
</div>