<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - <?= escape( self::$page_title ) ?></title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link href="/assets/css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e6b889dda3.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/svg+xml" href="/assets/images/logo_color.svg">

</head>
<body style="background-color: #8e9dcc;">

<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div class="toast-container">
        <?php if(SuperCookie::has('success')): ?>
            <?php foreach(SuperCookie::getArray('success') as $message): ?>
                <div class="toast background-green text-success show align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                        <?= $message ?>
                    </div>
                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if(SuperCookie::has('errors')): ?>
            <?php foreach(SuperCookie::getArray('errors') as $message): ?>
                <div class="toast background-red text-danger show align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                        <?= $message ?>
                    </div>
                        <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    
    </div>
</div>