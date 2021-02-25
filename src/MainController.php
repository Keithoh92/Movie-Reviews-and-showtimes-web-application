<?php

namespace TuDublin;

class MainController
{
    private $cinemaRepository;
    private $movieRepository;
    private $reviewRepository;
    private $showTimeRepository;
    private $userRepository;
    private $searchFunctions;
    private $sessionManager;

    public function __construct()
    {
        $this->cinemaRepository = new CinemaRepository();
        $this->movieRepository = new MovieRepository();
        $this->reviewRepository = new ReviewRepository();
        $this->showTimeRepository = new ShowtimeRepository();
        $this->userRepository = new UserRepository();
        $this->searchFunctions = new SearchFunctions();
        $this->sessionManager = new SessionManager();
    }

    function moviesPage()
    {
        $showTimes = $this->showTimeRepository->getAll();
        $cinemas = $this->cinemaRepository->getAll();
        $movies = $this->movieRepository->getAll();
        $locations = [];
        foreach ($cinemas as $cinema)
        {
            $locations = $cinema->getLocation();
        }
        $pageTitle = 'Movies';
        $moviesPageStyle = " active";
        require_once __DIR__ . '/../templates/movies.php';
    }
    function reviewsPage()
    {
        $reviews = $this->reviewRepository->getAll();
        $movies = $this->movieRepository->getAll();

        $pageTitle = 'Reviews';
        $reviewsPageStyle = " active";
        require_once __DIR__ . '/../templates/reviews.php';
    }

    function readReview($reviewId, $movieTitle)
    {
        $review = $this->reviewRepository->getOneById($reviewId);
        $movies = $this->movieRepository->getAll();
        $movieTitle = $movieTitle;
        $pageTitle = 'read review';
        $reviewsPageStyle = " active";
        require_once __DIR__ . '/../templates/readReview.php';
    }

    function listMovies($location, $cinemaId, $movieId, $rating, $genre, $startTime)
    {
        $criteria = $this->searchFunctions->toArrayForMovieSearch($location,$cinemaId,$movieId,
            $rating,$genre,$startTime);
        $showTimeResults = $this->searchFunctions->searchShowTimes($criteria);
        $cinemas = $this->cinemaRepository->getAll();
        $movies = $this->movieRepository->getAll();

        $pageTitle = 'Search Results';
        $moviesPageStyle = ' active';
        require_once __DIR__ . '/../templates/movieResults.php';
    }

    function listAllMovies()
    {
        $movies = $this->movieRepository->getAll();

        $pageTitle = 'All Movies';
        $adminPageStyle = ' active';
        require_once __DIR__ . '/../templates/allMovieResults.php';
    }

    function listCinemas()
    {
        $cinemas = $this->cinemaRepository->getAll();
        $movies = $this->movieRepository->getAll();

        $pageTitle = 'Cinema Results';
        $adminPageStyle = ' active';
        require_once __DIR__ . '/../templates/cinemaResults.php';
    }

    function listReviews($movieId, $rating, $helpfulness)
    {
        $criteria = $this->searchFunctions->toArrayForReviewSearch($movieId, $rating, $helpfulness);
        $reviewResults = $this->searchFunctions->searchReviews($criteria);
        $reviews = $this->reviewRepository->getAll();
        $movies = $this->movieRepository->getAll();

        $pageTitle = 'Review Results';
        $reviewPageStyle = ' active';
        require_once __DIR__ . '/../templates/reviewResults.php';
    }

    function listShowTimes()
    {
        $showTimes = $this->showTimeRepository->getAll();
        $cinemas = $this->cinemaRepository->getAll();
        $movies = $this->movieRepository->getAll();

        $pageTitle = 'Show Time Results';
        $adminPageStyle = ' active';
        require_once __DIR__ . '/../templates/showTimeResults.php';
    }

    function editShowTime($showTimeId)
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $showTime = $this->showTimeRepository->getOneById($showTimeId);
            $pageTitle = 'edit ShowTime';
            $adminPageStyle = ' active';
            require_once __DIR__ . '/../templates/editShowTimeForm.php';
        } else {
            $errors[] = 'You must be an Administrator to access this page.';
            $pageTitle = 'error';
            require_once __DIR__ . '/../templates/error.php';
        }
    }

    function listUsers()
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $users = $this->userRepository->getAll();
            $pageTitle = 'User Results';
            $adminPageStyle = ' active';
            require_once __DIR__ . '/../templates/userResults.php';
        } else {
            $errors[] = 'You must be an Administrator to access this page.';
            $pageTitle = 'error';
            require_once __DIR__ . '/../templates/error.php';
        }
    }

    function editMovie($movieId)
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $movie = $this->movieRepository->getOneById($movieId);
            $pageTitle = 'edit Movie';
            $adminPageStyle = ' active';
            require_once __DIR__ . '/../templates/editMovieForm.php';
        } else {
            $errors[] = 'You must be an Administrator to access this page.';
            $pageTitle = 'error';
            require_once __DIR__ . '/../templates/error.php';
        }
    }

    function editReview($reviewId)
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $review = $this->reviewRepository->getOneById($reviewId);
            $pageTitle = 'edit Review';
            $adminPageStyle = ' active';
            require_once __DIR__ . '/../templates/editReviewForm.php';
        } else {
            $errors[] = 'You must be an Administrator to access this page.';
            $pageTitle = 'error';
            require_once __DIR__ . '/../templates/error.php';
        }
    }

    function editCinema($cinemaId)
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $cinema = $this->cinemaRepository->getOneById($cinemaId);
            $pageTitle = 'edit Cinema';
            $adminPageStyle = ' active';
            require_once __DIR__ . '/../templates/editCinemaForm.php';
        } else {
            $errors[] = 'You must be an Administrator to access this page.';
            $pageTitle = 'error';
            require_once __DIR__ . '/../templates/error.php';
        }
    }

    function listAllReviews()
    {
        $reviews = $this->reviewRepository->getAll();
        $pageTitle = 'All Reviews';
        $adminPageStyle = ' active';
        require_once __DIR__ . '/../templates/allReviewResults.php';
    }

    function rateReview($reviewId, $helpfulness)
    {
        $review = $this->reviewRepository->getOneById($reviewId);
        $review->updateHelpfulness($helpfulness);
        $success = $this->reviewRepository->update($review);
        if ($success){
            $message = 'Thank you for your vote!';
            require_once __DIR__ . '/../templates/message.php';
        } else {
            $errors = [];
            $errors[] = "error trying to UPDATE your review rating";
            require_once __DIR__ . '/../templates/error.php';
        }
    }
    function messagePage($message)
    {
        $pageTitle = 'message';
        require_once __DIR__ . '/../templates/message.php';
    }

    function errorPage($errors)
    {
        $pageTitle = 'error';
        require_once __DIR__ . '/../templates/error.php';
    }
}
