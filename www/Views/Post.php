<div class="main">
    <div class="mainblock">
        <div class="container-element block container-element--full">
            <h1><?= static::$post->title ?></h1>
            <p><?= static::$post->tiny_text ?></p>
            <p><?= static::$post->text ?></p>
        </div>
        <div class="container-element block container-element--full">
            <h1>Commentaires</h1>
            <?php foreach(static::$post->getComments() as $comment) : ?>
                <div class="d-flex">
                    <div>
                        <img src="https://avatars.dicebear.com/api/jdenticon/<?= $comment->getUser()->name ?>.svg?b=%238e9dcc&r=50&w=50" alt="Profil">
                        <p><?= $comment->getUser()->name ?></p>

                    </div>
                    <div>
                        <p><?= $comment->text ?></p>
                        <p><?= $comment->created_at->format('H\hi d/m/Y') ?></p>
                    </div>
                </div>
            <?php endforeach ; ?>
            <form action="/post&id=<?= static::$post->id ?>" method="post">
                <div class="mb-3">
                    <label for="comment" class="form-label">Commenter</label>
                    <input type="text" class="form-control" maxlength="380" id="comment" name="comment"  placeholder="Commentaire">
                </div>
                <input type="number" value="<?= $comment->getUser()->id ?>" name="user_id" class="visually-hidden">
                <input type="number" value="<?= static::$post->id ?>" name="article_id" class="visually-hidden">

                <div class="mb-3">
                    <button type="submit" name="comment" class="btn btn-primary mb-3">Commenter</button>
                </div>
            </form>
        </div>
    </div>
</div>