<div class="main">
    <img src="/assets/images/unset.jpg" alt="header" class="header-image">
    <div class="mainblock no-margin-top">
        <div class="container-element block container-element--full unconstrained">
            <div class="content-box content-box--full">
                <h1><?= htmlentities( static::$post->title ) ?></h1>
                <p><?= htmlentities( static::$post->tiny_text ) ?></p>
                <p><?= htmlentities( static::$post->text ) ?></p>

            </div>
        </div>
        <div class="container-element block container-element--full unconstrained light">
            <h1>Commentaires</h1>
            <?php foreach (static::$post->getComments() as $comment) : ?>
                <div class="d-flex background-dark p-3">
                    <div>
                        <img src="https://avatars.dicebear.com/api/jdenticon/<?= htmlentities( $comment->getUser()->name ) ?>.svg?b=%238e9dcc&r=50&w=50" alt="Profil">
                        <p><?= htmlentities( $comment->getUser()->name ) ?></p>

                    </div>
                    <div>
                        <p><?= htmlentities( $comment->text ) ?></p>
                        <p><?= htmlentities( $comment->created_at->format('H\hi d/m/Y') ) ?></p>
                    </div>
                </div>
                <?php if ($comment->hasResponses()) : ?>
                    <?php foreach ($comment->getResponses() as $response) : ?>
                        <div class="d-flex ms-5 background-dark p-3">
                            <div>
                                <img src="https://avatars.dicebear.com/api/jdenticon/<?= htmlentities( $response->getUser()->name ) ?>.svg?b=%238e9dcc&r=50&w=50" alt="Profil">
                                <p><?= htmlentities( $response->getUser()->name ) ?></p>

                            </div>
                            <div>
                                <p><?= htmlentities( $response->text ) ?></p>
                                <p><?= htmlentities( $response->created_at->format('H\hi d/m/Y') ) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if (AuthController::isLoggedIn()) : ?>
                    <div class="d-flex ms-5 background-dark p-3 mb-5">
                        <form action="/post&id=<?= htmlentities( static::$post->id ) ?>" method="post">
                            <div class="mb-3">
                                <label for="text" class="form-label">Répondre</label>
                                <input type="text" class="input-field" maxlength="380" id="text" name="text" placeholder="Commentaire">
                            </div>
                            <input type="number" value="<?= htmlentities( AuthController::isLoggedIn()['id'] ) ?>" name="user_id" class="visually-hidden">
                            <input type="number" value="<?= htmlentities( static::$post->id ) ?>" name="article_id" class="visually-hidden">
                            <input type="number" value="<?= htmlentities( $comment->id ) ?>" name="response_id" class="visually-hidden">

                            <div class="mb-3">
                                <button type="submit" name="comment" class="btn btn-primary mb-3">Répondre</button>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            
            <?php if (AuthController::isLoggedIn()) : ?>
                <div class="background-dark p-3">
                    <form action="/post&id=<?= htmlentities( static::$post->id ) ?>" method="post">
                        <div class="mb-3">
                            <label for="text" class="form-label">Commenter</label>
                            <input type="text" class="input-field" maxlength="380" id="text" name="text" placeholder="Commentaire">
                        </div>
                        <input type="number" value="<?= htmlentities( AuthController::isLoggedIn()['id'] ) ?>" name="user_id" class="visually-hidden">
                        <input type="number" value="<?= htmlentities( static::$post->id ) ?>" name="article_id" class="visually-hidden">

                        <div class="mb-3">
                        <button type="submit" name="comment" class="btn btn-primary mb-3">Commenter</button>
                    </div>
                </form>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>