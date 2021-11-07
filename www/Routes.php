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

Route::set('post', function () {
    PostController::LoadView('Post');
});

Route::set('connexion', function () {
    if (AuthController::isLoggedIn()) {
        header("Location: /dashboard");
        die();
    }
    LoginController::LoadView('Login');
});

Route::set('inscription', function () {
    if (AuthController::isLoggedIn()) {
        header("Location: /dashboard");
        die();
    }
    RegisterController::LoadView('Register');
});

Route::set('logout', function () {
    AuthController::Logout();
    header("Location: /");
    die();
});

Route::set('dashboard', function () {
    if (!AuthController::isLoggedIn()) {
        header("Location: /connexion");
        die();
    }
    DashboardController::LoadView('Dashboard');
});

Route::set('addpost', function () {
    if (!AuthController::isLoggedIn()) {
        header("Location: /connexion");
        die();
    } elseif (!AuthController::isLoggedIn()['is_admin']) {
        header("Location: /dashboard");
        die();
    }
    AddPostController::LoadView('AddPost');
});

Route::set('managepost', function () {
    if (!AuthController::isLoggedIn()) {
        header("Location: /connexion");
        die();
    } elseif (!AuthController::isLoggedIn()['is_admin']) {
        header("Location: /dashboard");
        die();
    }
    ManagePostController::LoadView('ManagePost');
});

Route::set('managecomment', function () {
    if (!AuthController::isLoggedIn()) {
        header("Location: /connexion");
        die();
    } elseif (!AuthController::isLoggedIn()['is_admin']) {
        header("Location: /dashboard");
        die();
    }
    ManageCommentController::LoadView('ManageComment');
});