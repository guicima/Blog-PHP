<div class="main">
    <div class="mainblock">
        <div class="container-element block container-element--full">
            <?php $posts = self::query('SELECT * FROM articles') ?>
            
            <?php foreach ($posts as $post) : ?>
                <form action="/managepost" method="post">
                    <div class="d-flex">
                        <h2><?= htmlentities( $post['title'] ) ?></h2>
                        <p><?= htmlentities( $post['tiny_text'] ) ?></p>
                        <h3><?= htmlentities( $post['state'] ) ?></h3>
                        <h4><?= htmlentities( $post['created_at'] ) ?></h4>
                        <a href="/addpost?postid=<?= htmlentities($post['id']) ?>">modifier</a>
                        <button type="submit" name="posttodraft" class="btn btn-primary mb-3" value="<?= htmlentities( $post['id'] ) ?>">Dépublier</button>
                        <button type="submit" name="posttopublic" class="btn btn-primary mb-3" value="<?= htmlentities( $post['id'] ) ?>">Publier</button>
                        <button type="submit" name="posttotrash" class="btn btn-primary mb-3" value="<?= htmlentities( $post['id'] ) ?>">Supprimer</button>
                        <button type="submit" name="deletepost" class="btn btn-primary mb-3" value="<?= htmlentities( $post['id'] ) ?>">Supprimer definitivement</button>
                    </div>
                </form>
            <?php endforeach ?>
        </div>
    </div>
</div>