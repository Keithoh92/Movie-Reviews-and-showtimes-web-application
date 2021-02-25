<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../vendor/autoload.php';

use TuDublin\MainController;
use TuDublin\AdminController;
use TuDublin\LoginController;

$action = filter_input(INPUT_GET, 'action');
if(empty($action)){
    $action = filter_input(INPUT_POST, 'action');
}
$selectedLocation = filter_input(INPUT_GET, 'location');
$selectedCinemaId = filter_input(INPUT_GET, 'cinema');
$selectedMovieId = filter_input(INPUT_GET, 'movie');
$selectedRating = filter_input(INPUT_GET, 'rating');
$selectedHelpfulness = filter_input(INPUT_GET, 'helpfulness');
$selectedGenre = filter_input(INPUT_GET, 'genre');
$selectedStartTime = filter_input(INPUT_GET, 'startTime');
$reviewId = filter_input(INPUT_GET, 'reviewId');
$movieId = filter_input(INPUT_GET, 'movieId');
$cinemaId = filter_input(INPUT_GET, 'cinemaId');
$showTimeId = filter_input(INPUT_GET, 'showTimeId');
$helpfulness = filter_input(INPUT_GET, 'helpfulness');
$movieTitle = filter_input(INPUT_GET, 'movieTitle');

$mainController = new MainController();
$adminController = new AdminController();
$loginController = new LoginController();

switch ($action) {
    case 'login':
        $loginController->loginPage();
        break;

    case 'processLogin':
        $loginController->processLogin();
        break;

    case 'logout':
        $loginController->logout();
        break;

    case 'movies':
        $mainController->moviesPage();
        break;

    case 'reviews':
        $mainController->reviewsPage();
        break;

    case 'readReview':
        $mainController->readReview($reviewId, $movieTitle);
        break;

    case 'Search Movies':
        $mainController->listMovies($selectedLocation, $selectedCinemaId, $selectedMovieId,
            $selectedRating, $selectedGenre, $selectedStartTime);
        break;

    case 'Search Reviews':
        $mainController->listReviews($selectedMovieId, $selectedRating, $selectedHelpfulness);
        break;

    case 'Search Cinemas':
        $mainController->listCinemas();
        break;

    case 'listShowTimes':
        $mainController->listShowTimes();
        break;

    case 'listUsers':
        $mainController->listUsers();
        break;

    case 'listAllMovies':
        $mainController->listAllMovies();
        break;

    case 'listAllReviews':
        $mainController->listAllReviews();
        break;

    case 'Rate Review':
        $mainController->rateReview($reviewId, $helpfulness);
        break;

    // ------ admin section --------
    case 'admin':
        $adminController->adminPage();
        break;

    case 'newMovieForm':
        $adminController->newMovieForm();
        break;

    case 'newReviewForm':
        $adminController->newReviewForm();
        break;

    case 'newCinemaForm':
        $adminController->newCinemaForm();
        break;

    case 'newShowTimeForm':
        $adminController->newShowTimeForm();
        break;

    case 'createNewMovie':
        $adminController->createNewMovie();
        break;

    case 'createNewReview':
        $adminController->createNewReview();
        break;

    case 'createNewShowTime';
        $adminController->createNewShowTime();
        break;

    case 'newUserForm':
        $adminController->registerNewUser();
        break;

    case 'createNewCinema':
        $adminController->createNewCinema();
        break;

    case 'processRegistration':
        $adminController->processRegistration();
        break;

    case 'editMovieForm':
        $mainController->editMovie($movieId);
        break;

    case 'processUpdateMovie':
        $adminController->processUpdateMovie();
        break;

    case 'deleteMovie':
        $adminController->deleteMovie();
        break;

    case 'processUpdateCinema':
        $adminController->processUpdateCinema();
        break;

    case 'editCinemaForm':
        $mainController->editCinema($cinemaId);
        break;

    case 'deleteCinema':
        $adminController->deleteCinema();
        break;

    case 'deleteUser':
        $adminController->deleteUser();
        break;

    case 'processUpdateReview':
        $adminController->processUpdateReview();
        break;

    case 'editReviewForm':
        $mainController->editReview($reviewId);
        break;

    case 'deleteReview':
        $adminController->deleteReview();
        break;

    case 'processUpdateShowTime':
        $adminController->processUpdateShowTime();
        break;

    case 'editShowTimeForm':
        $mainController->editShowTime($showTimeId);
        break;

    case 'deleteShowTime':
        $adminController->deleteShowTime();
        break;

    case 'message':
        $mainController->messagePage();
        break;

    case 'error':
        $mainController->errorPage();
        break;

    default:
        $mainController->moviesPage();
}