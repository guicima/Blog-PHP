<div class="main">
    <div class="mainblock">
        <div class="container-element block container-element--full">
            <?php
                //$user = new User(AuthController::isLoggedIn()['id']);
                if (!empty(SuperGet::get('postid') && self::query('SELECT * FROM articles WHERE id=:postid', array(':postid' => SuperGet::get('postid'))))) {
                    $modifypost = self::query('SELECT * FROM articles WHERE id=:postid', array(':postid' => SuperGet::get('postid')))[0];
                } else {
                    $modifypost = null;
                }
            ?>

            <h1><?= $modifypost ? 'Modifier' : 'Nouvel' ?> article</h1>
            <form action="/addpost" method="post">

                <?php if($modifypost) : ?>
                    <input type="number" value="<?= htmlentities( SuperGet::get('postid') ) ?>" name="postid" class="visually-hidden">
                <?php endif ?>

                <div class="mb-3">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" class="form-control" maxlength="32" id="title" name="title" value="<?= htmlentities( $modifypost ? $modifypost['title'] : '' ) ?>" placeholder="Titre">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" maxlength="380" id="description" name="description" value="<?= htmlentities( $modifypost ? $modifypost['tiny_text'] : '' ) ?>" placeholder="Petite description">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Contenu</label>
                    <textarea type="text" class="form-control" id="content" name="content" placeholder="contenu"><?= htmlentities( $modifypost ? $modifypost['text'] : '' ) ?></textarea>
                </div>

                <div class="mb-3">
                    <button type="submit" name="addpost" class="btn btn-primary mb-3" value="draft">Ajouter aux brouillons</button>
                    <button type="submit" name="addpost" class="btn btn-primary mb-3" value="public"><?= $modifypost ? 'Modifier publiquement' : 'Publier' ?></button>
                </div>

            </form>
        </div>
    </div>
</div>