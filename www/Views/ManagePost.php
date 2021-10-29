<div class="main">
    <div class="mainblock">
        <div class="container-element block container-element--full">
            <?php $posts = self::query('SELECT * FROM articles') ?>
            
            <?php foreach ($posts as $post) : ?>
                <form action="/managepost" method="post">
                    <div class="d-flex">
                        <h2><?= $post['title'] ?></h2>
                        <p><?= $post['tiny_text'] ?></p>
                        <h3><?= $post['state'] ?></h3>
                        <h4><?= $post['created_at'] ?></h4>
                        <a href="/addpost?postid=<?=$post['id']?>">modifier</a>
                        <button type="submit" name="posttodraft" class="btn btn-primary mb-3" value="<?= $post['id'] ?>">Dépublier</button>
                        <button type="submit" name="posttopublic" class="btn btn-primary mb-3" value="<?= $post['id'] ?>">Publier</button>
                        <button type="submit" name="posttotrash" class="btn btn-primary mb-3" value="<?= $post['id'] ?>">Supprimer</button>
                        <button type="submit" name="deletepost" class="btn btn-primary mb-3" value="<?= $post['id'] ?>">Supprimer definitivement</button>
                    </div>
                </form>
            <?php endforeach ?>
        </div>
    </div>
</div>