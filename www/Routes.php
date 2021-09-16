<?php

    Route::set('index.php', function()
    {
        HomeController::CreateView('Home');
    });

    Route::set('contact', function()
    {
        ContactController::CreateView('Contact');
    });

?>