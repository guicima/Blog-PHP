<div class="main">
    <div class="mainblock">
        <div class="container-element block container-element--full unconstrained">
            <?php foreach (static::$posts as $post) : ?>
                <form action="/managepost" method="post">
                    <div class="p-2">
                        <div class="pt-5 px-5 pb-1 text-color-light">
                            <h2><?= htmlentities( $post->title ) ?></h2>
                            <p><?= htmlentities( $post->tiny_text ) ?></p>
                            <p class="text-end"><b><?= htmlentities( $post->state ) ?></b> <?= htmlentities( $post->created_at->format('H\hi d/m/Y') ) ?></p>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-link link-color-yellow mx-3" href="/addpost?postid=<?= htmlentities($post->id) ?>">Modifier</a>
                            <?php if ($post->state == 'PUBLIC') : ?>
                                <button type="submit" name="posttodraft" class="btn btn-link link-color-yellow mx-3" value="<?= htmlentities( $post->id ) ?>">Dépublier</button>
                            <?php elseif ($post->state == 'DRAFT') : ?>
                                <button type="submit" name="posttopublic" class="btn btn-link link-color-green mx-3" value="<?= htmlentities( $post->id ) ?>">Publier</button>
                            <?php endif ?>
                            <?php if ($post->state == 'TRASH') : ?>
                                <button type="submit" name="posttodraft" class="btn btn-link link-color-yellow mx-3" value="<?= htmlentities( $post->id ) ?>">Restaurer</button>
                                <button type="submit" name="deletepost" class="btn btn-link link-color-red mx-3" value="<?= htmlentities( $post->id ) ?>">Supprimer definitivement</button>
                            <?php else : ?>
                                <button type="submit" name="posttotrash" class="btn btn-link link-color-red mx-3" value="<?= htmlentities( $post->id ) ?>">Supprimer</button>
                            <?php endif ?>
                            <a class="btn btn-link link-color-green mx-3" href="/post&id=<?= htmlentities( $post->id ) ?>">Consulter</a>
                        </div>
                    </div>
                </form>
            <?php endforeach ?>
        </div>
    </div>
</div>