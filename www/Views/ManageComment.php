<div class="main">
    <div class="mainblock">
        <div class="container-element block container-element--full unconstrained">

        <?php foreach (static::$comments as $comment) : ?>
                <form action="/managecomment" method="post">
                    <div class="p-2">
                        <div class="d-flex">
                            <div class="ps-5 pt-5" style="width: 150px;">
                                <img class="w-100" src="https://avatars.dicebear.com/api/jdenticon/<?= htmlentities( $comment->getUser()->name ) ?>.svg?b=%238e9dcc&r=50" alt="Profil">
                                <h5 class="text-color-light text-break text-center"><?= $comment->getUser()->name ?></h5>
                            </div>
                            <div class="pt-5 px-5 pb-1 text-color-light d-flex flex-column justify-content-between w-100">
                                <p><?= htmlentities( $comment->text ) ?></p>
                                <p class="text-end"><b><?= htmlentities( $comment->state ) ?></b> <?= htmlentities( $comment->created_at->format('H\hi d/m/Y') ) ?></p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <?php if ($comment->state == 'PUBLIC') : ?>
                                <button type="submit" name="commenttodraft" class="btn btn-link link-color-yellow mx-3" value="<?= htmlentities( $comment->id ) ?>">Dépublier</button>
                            <?php else : ?>
                                <button type="submit" name="commenttopublic" class="btn btn-link link-color-green mx-3" value="<?= htmlentities( $comment->id ) ?>">Publier</button>
                            <?php endif ?>
                            <button type="submit" name="deletecomment" class="btn btn-link link-color-red mx-3" value="<?= htmlentities( $comment->id ) ?>">Supprimer definitivement</button>
                        </div>
                    </div>
                </form>
            <?php endforeach ?>

        </div>
    </div>
</div>