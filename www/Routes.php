<?php

Route::set('index.php', function () {
    HomeController::LoadView('Home');
});

Route::set('a-propos', function () {
    AboutController::LoadView('About');
});

Route::set('contact', function () {
    ContactController::LoadView('Contact');
});

Route::set('connexion', function () {
    if (LoginController::isLoggedIn()) {
        header("Location: /dashboard");
        die();
    }
    LoginController::LoadView('Login');
});

Route::set('inscription', function () {
    if (RegisterController::isLoggedIn()) {
        header("Location: /dashboard");
        die();
    }
    RegisterController::LoadView('Register');
});

Route::set('logout', function () {
    Controller::Logout();
    header("Location: /");
    die();
});

Route::set('dashboard', function () {
    if (!DashboardController::isLoggedIn()) {
        header("Location: /connexion");
        die();
    }
    DashboardController::LoadView('Dashboard');
});
