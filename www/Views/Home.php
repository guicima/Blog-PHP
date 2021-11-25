<div class="main">
    <div class="mainblock" style="">
        <?php if(static::$posts) : ?>
            <?php foreach (static::$posts as $key => $post) : ?>
                <div class="container-element container-element--<?= $key == 0 ? 'full' : 'half' ?>">
                    <div class="img-container">
                        <img class="image" src="/assets/images/unset.jpg" alt="">
                    </div>
                    <div class="content-box">
                        <h1><?= htmlentities( $post->title ) ?></h1>
                        <p><?= htmlentities( $post->tiny_text ) ?></p>
                    </div>
                    <a class="more" href="/post&id=<?= htmlentities( $post->id ) ?>">Lire plus</a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
