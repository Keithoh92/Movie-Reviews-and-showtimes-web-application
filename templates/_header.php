<?php

//----- login variables
use TuDublin\SessionManager;
$sessionManager = new SessionManager();
$isLoggedIn = $sessionManager->isLoggedIn();
$username = $sessionManager->usernameFromSession();
use TuDublin\AdminController;
$adminController = new AdminController();
if(empty($pageTitle)){
    $pageTitle = '';
}
if(empty($moviesPageStyle)) $moviesPageStyle = '';
if(empty($reviewsPageStyle)) $reviewsPageStyle = '';
if(empty($loginPageStyle)) $loginPageStyle = '';
if(empty($adminPageStyle)) $adminPageStyle = '';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title><?= $pageTitle ?></title>
</head>
<body class="container-fluid bg-light">

<header class="bg-light">
    <div class="text-center text-info">
        <i class="fas fa-film"></i>
            <i class="fas fa-video"></i>
                <strong>Cinema Listing & Movie Reviews</strong>
            <i class="fas fa-video"></i>
        <i class="fas fa-film"></i>
    </div>
</header>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <ul class="navbar-nav nav-pills">
        <div class="btn-toolbar mx-2">
            <li class="nav-item<?= $moviesPageStyle ?>">
                <a href="/index.php?action=movies" class="nav-link mr-1">Movies</a>
            </li>
        </div>
        <div class="btn-toolbar mx-2">
            <li class="nav-item<?= $reviewsPageStyle ?>">
                <a href="/index.php?action=reviews" class="nav-link mr-1">Reviews</a>
            </li>
        </div>
<?php
if ($username == 'admin'):
?>
        <div class="btn-toolbar mx-2">
            <li class="nav-item<?= $adminPageStyle ?>">
                <a href="/index.php?action=admin" class="nav-link mr-1">Admin</a>
            </li>
        </div>
<?php
endif;
if($isLoggedIn):
?>
    <span class="navbar-text text-success">Welcome: <strong><?= $username ?></strong></span>
        <div class="btn-toolbar mx-2">
            <li class="nav-item<?= $adminPageStyle ?>">
                <a href="/index.php?action=logout" class="nav-link mr-1">
                     Logout</a>
<?php
else:
?>
        <div class="btn-toolbar mx-2">
            <li class="nav-item<?= $loginPageStyle ?>">
                <a href="/index.php?action=login" class="nav-link mr-1">Login</a>
            </li>
        </div>
<?php
endif;
?>
            </li>
        </div>
    </ul>
</nav>
<main class="mb-5">
    <div class="container-fluid">
        <div class="page-header">