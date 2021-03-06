<div class="main">
    <img src="/assets/images/unset.jpg" alt="header" class="header-image">
    <div class="mainblock no-margin-top">
        <div class="container-element block container-element--full unconstrained">
            <div class="content-box content-box--full">
                <h1><?= escape( static::$post->title ) ?></h1>
                <p class="m-5 fs-5"><b><?= escape( static::$post->tiny_text ) ?></b></p>

                <?php $maintext = explode("\r\n", static::$post->text) ?>
                <?php foreach ($maintext as $text): ?>
                    <p class="mx-5 my-3 px-5 fs-6" style="text-align: justify;"><?= escape($text) ?></p>
                <?php endforeach; ?>

            </div>
        </div>
        <div class="container-element block container-element--full unconstrained light">
            <h1 class="text-color-light">Commentaires</h1>
            <?php foreach (static::$post->getComments() as $comment) : ?>
                <div class="d-flex background-dark p-3 text-color-light">
                    <div class="pe-3" style="width: 120px">
                        <img src="https://avatars.dicebear.com/api/jdenticon/<?= escape( $comment->getUser()->name ) ?>.svg?b=%238e9dcc&r=50&w=50" class="w-100" alt="Profil">
                        <p class="text-break text-center"><?= escape( $comment->getUser()->name ) ?></p>
                    </div>
                    <div class="w-100 d-flex flex-column justify-content-between">
                        <p><?= escape( $comment->text ) ?></p>
                        <p class="text-end mb-0"><?= escape( $comment->created_at->format('H\hi d/m/Y') ) ?></p>
                    </div>
                </div>
                <?php if ($comment->hasResponses()) : ?>
                    <?php foreach ($comment->getResponses() as $response) : ?>
                        <div class="d-flex ms-5 background-dark p-3 text-color-light">
                            <div class="pe-3" style="width: 85px">
                                <img src="https://avatars.dicebear.com/api/jdenticon/<?= escape( $response->getUser()->name ) ?>.svg?b=%238e9dcc&r=50&w=50" class="w-100" alt="Profil">
                                <p class="text-break text-center"><?= escape( $response->getUser()->name ) ?></p>
                            </div>
                            <div class="w-100 d-flex flex-column justify-content-between">
                                <p><?= escape( $response->text ) ?></p>
                                <p class="text-end mb-0"><?= escape( $response->created_at->format('H\hi d/m/Y') ) ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if (AuthController::isLoggedIn()) : ?>
                    <div class="d-flex ms-5 background-dark p-3 mb-5">
                        <form action="/post&id=<?= escape( static::$post->id ) ?>" class="w-100" method="post">
                            <div class="mb-3">
                                <label for="text<?= escape( $comment->id ) ?>" class="form-label text-color-light">R??pondre</label>
                                <input type="text" class="input-field" maxlength="380" id="text<?= escape( $comment->id ) ?>" name="text" placeholder="Commentaire">
                            </div>
                            <input type="number" value="<?= escape( AuthController::isLoggedIn()['id'] ) ?>" name="user_id" class="visually-hidden">
                            <input type="number" value="<?= escape( static::$post->id ) ?>" name="article_id" class="visually-hidden">
                            <input type="number" value="<?= escape( $comment->id ) ?>" name="response_id" class="visually-hidden">

                            <div class="text-end">
                                <button type="submit" name="comment" class="btn btn-link link-color-green">R??pondre</button>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
            
            <?php if (AuthController::isLoggedIn()) : ?>
                <div class="background-dark p-3">
                    <form action="/post&id=<?= escape( static::$post->id ) ?>" method="post">
                        <div class="mb-3">
                            <label for="text" class="form-label text-color-light">Commenter</label>
                            <input type="text" class="input-field" maxlength="380" id="text" name="text" placeholder="Commentaire">
                        </div>
                        <input type="number" value="<?= escape( AuthController::isLoggedIn()['id'] ) ?>" name="user_id" class="visually-hidden">
                        <input type="number" value="<?= escape( static::$post->id ) ?>" name="article_id" class="visually-hidden">

                        <div class="text-end">
                            <button type="submit" name="comment" class="btn btn-link link-color-green">Commenter</button>
                        </div>
                </form>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>