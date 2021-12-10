<?php

Route::set('index.php', function () {
    HomeController::LoadView('Home');
});

Route::set('articles', function () {
    PostsController::LoadView('Posts');
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
    }
    LoginController::LoadView('Login');
});

Route::set('inscription', function () {
    if (AuthController::isLoggedIn()) {
        header("Location: /dashboard");
    }
    RegisterController::LoadView('Register');
});

Route::set('logout', function () {
    AuthController::Logout();
    header("Location: /");
});

Route::set('dashboard', function () {
    if (!AuthController::isLoggedIn()) {
        header("Location: /connexion");
    }
    DashboardController::LoadView('Dashboard');
});

Route::set('addpost', function () {
    if (!AuthController::isLoggedIn()) {
        header("Location: /connexion");
    } elseif (!AuthController::isLoggedIn()['is_admin']) {
        header("Location: /dashboard");
    }
    AddPostController::LoadView('AddPost');
});

Route::set('managepost', function () {
    if (!AuthController::isLoggedIn()) {
        header("Location: /connexion");
    } elseif (!AuthController::isLoggedIn()['is_admin']) {
        header("Location: /dashboard");
    }
    ManagePostController::LoadView('ManagePost');
});

Route::set('managecomment', function () {
    if (!AuthController::isLoggedIn()) {
        header("Location: /connexion");
    } elseif (!AuthController::isLoggedIn()['is_admin']) {
        header("Location: /dashboard");
    }
    ManageCommentController::LoadView('ManageComment');
});