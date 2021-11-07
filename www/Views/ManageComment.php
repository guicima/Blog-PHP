<div class="main">
    <div class="mainblock">
        <div class="container-element block container-element--full">
            <?php $comments = self::query('SELECT * FROM comments') ?>
            
            <?php foreach ($comments as $comment) : ?>
                <form action="/managecomment" method="post">
                    <div class="d-flex">
                        <p><?= $comment['text'] ?></p>
                        <h3><?= $comment['state'] ?></h3>
                        <h4><?= $comment['created_at'] ?></h4>
                        <button type="submit" name="commenttodraft" class="btn btn-primary mb-3" value="<?= $comment['id'] ?>">Dépublier</button>
                        <button type="submit" name="commenttopublic" class="btn btn-primary mb-3" value="<?= $comment['id'] ?>">Publier</button>
                        <button type="submit" name="deletecomment" class="btn btn-primary mb-3" value="<?= $comment['id'] ?>">Supprimer definitivement</button>
                    </div>
                </form>
            <?php endforeach ?>
        </div>
    </div>
</div>