<div class="main">
    <div class="mainblock" style="">
        <?php if(static::$posts) : ?>
            <?php foreach (static::$posts as $key => $post) : ?>
                <div class="container-element container-element--<?= $key == 0 ? 'full' : 'half' ?>">
                    <div class="img-container">
                        <img class="image" src="/assets/images/unset.jpg" alt="">
                    </div>
                    <div class="content-box">
                        <h1><?= escape( $post->title ) ?></h1>
                        <p><?= escape( $post->tiny_text ) ?></p>
                    </div>
                    <a class="more" href="/post&id=<?= escape( $post->id ) ?>">Lire plus</a>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div style="grid-column: span 4; height: 600px; display: flex; flex-flow: column;">
                <img src="/assets/images/desert.svg" alt="Vide">
                <p class="text-center fs-5 fw-bold" style="color: #9FB0E3">Cette page semble vide.</p>
            </div>
        <?php endif; ?>
    </div>
</div>
