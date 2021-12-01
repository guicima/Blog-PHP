<div class="main">
    <div class="mainblock">
        <?php if (static::$posts) : ?>
            <div class="container-element block container-element--full unconstrained">
                <?php foreach (static::$posts as $post) : ?>
                    <form action="/managepost" method="post">
                        <div class="p-2">
                            <div class="pt-5 px-5 pb-1 text-color-light">
                                <h2><?= escape( $post->title ) ?></h2>
                                <p><?= escape( $post->tiny_text ) ?></p>
                                <p class="text-end"><b><?= escape( $post->state ) ?></b> <?= escape( $post->created_at->format('H\hi d/m/Y') ) ?></p>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a class="btn btn-link link-color-yellow mx-3" href="/addpost?postid=<?= escape($post->id) ?>">Modifier</a>
                                <?php if ($post->state == 'PUBLIC') : ?>
                                    <button type="submit" name="posttodraft" class="btn btn-link link-color-yellow mx-3" value="<?= escape( $post->id ) ?>">Dépublier</button>
                                <?php elseif ($post->state == 'DRAFT') : ?>
                                    <button type="submit" name="posttopublic" class="btn btn-link link-color-green mx-3" value="<?= escape( $post->id ) ?>">Publier</button>
                                <?php endif ?>
                                <?php if ($post->state == 'TRASH') : ?>
                                    <button type="submit" name="posttodraft" class="btn btn-link link-color-yellow mx-3" value="<?= escape( $post->id ) ?>">Restaurer</button>
                                    <button type="submit" name="deletepost" class="btn btn-link link-color-red mx-3" value="<?= escape( $post->id ) ?>">Supprimer definitivement</button>
                                <?php else : ?>
                                    <button type="submit" name="posttotrash" class="btn btn-link link-color-red mx-3" value="<?= escape( $post->id ) ?>">Supprimer</button>
                                <?php endif ?>
                                <a class="btn btn-link link-color-green mx-3" href="/post&id=<?= escape( $post->id ) ?>">Consulter</a>
                            </div>
                        </div>
                    </form>
                <?php endforeach ?>
            </div>
        <?php else : ?>
            <div style="grid-column: span 4; height: 600px; display: flex; flex-flow: column;">
                <img src="/assets/images/desert.svg" alt="Vide">
                <p class="text-center fs-5 fw-bold" style="color: #9FB0E3">Cette page semble vide.</p>
            </div>
        <?php endif ?>
    </div>
</div>