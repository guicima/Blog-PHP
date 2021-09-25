<?php

    Route::set('index.php', function()
    {
        HomeController::LoadView('Home');
    });

    Route::set('a-propos', function()
    {
        AboutController::LoadView('About');
    });

    Route::set('contact', function()
    {
        ContactController::LoadView('Contact');
    });

    Route::set('connexion', function()
    {
        LoginController::LoadView('Login');
    });

    Route::set('inscription', function()
    {
        RegisterController::LoadView('Register');
    });
?>