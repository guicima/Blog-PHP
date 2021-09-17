<?php

    Route::set('index.php', function()
    {
        HomeController::LoadView('Home');
    });

    Route::set('contact', function()
    {
        ContactController::LoadView('Contact');
    });

?>