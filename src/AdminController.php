<?php

namespace TuDublin;

class AdminController
{
    private $userRepository;
    private $cinemaRepository;
    private $movieRepository;
    private $showtimeRepository;
    private $reviewRepository;
    private $mainController;
    private $sessionManager;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->cinemaRepository = new CinemaRepository();
        $this->movieRepository = new MovieRepository();
        $this->showtimeRepository = new ShowtimeRepository();
        $this->reviewRepository = new ReviewRepository();
        $this->mainController = new MainController();
        $this->sessionManager = new SessionManager();
    }

    function adminPage()
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $pageTitle = 'Administration';
            $adminPageStyle = " active";
            require_once __DIR__ . '/../templates/admin.php';
        } else {
            $errors[] = 'You must be an Administrator to access this page.';
            $this->mainController->errorPage($errors);
        }
    }

    function newMovieForm()
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $pageTitle = 'new movie';
            $adminPageStyle = " active";
            require_once __DIR__ . '/../templates/newMovieForm.php';
        } else {
            $errors = [];
            $errors[] = 'You must be an Administrator to access this page.';
            $this->mainController->errorPage($errors);
        }
    }

    function newReviewForm()
    {
        if ($this->sessionManager->isLoggedIn())
        {
            $movies = $this->movieRepository->getAll();
            $pageTitle = 'new review';
            $adminPageStyle = " active";
            require_once __DIR__ . '/../templates/newReviewForm.php';
        } else {
            $errors = [];
            $errors[] = 'You must be logged in to access this page.';
            $this->mainController->errorPage($errors);
        }

    }

    function newCinemaForm()
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $movies = $this->cinemaRepository->getAll();
            $pageTitle = 'new cinema';
            $adminPageStyle = " active";
            require_once __DIR__ . '/../templates/newCinemaForm.php';
        } else {
            $errors = [];
            $errors[] = 'You must be an Administrator to access this page.';
            $this->mainController->errorPage($errors);
        }

    }

    function newShowTimeForm()
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $showTimes = $this->showtimeRepository->getAll();
            $movies = $this->movieRepository->getAll();
            $cinemas = $this->cinemaRepository->getAll();
            $pageTitle = 'new showTime';
            $adminPageStyle = " active";
            require_once __DIR__ . '/../templates/newShowTimeForm.php';
        } else {
            $errors = [];
            $errors[] = 'You must be an Administrator to access this page.';
            $this->mainController->errorPage($errors);
        }
    }

    public function registerNewUser()
    {
        $users = $this->userRepository->getAll();
        $pageTitle = 'register new user';
        require_once __DIR__ . '/../templates/newUserForm.php';
    }

    public function processRegistration()
    {
        $username = filter_input(INPUT_POST, 'username');
        $password1 = filter_input(INPUT_POST, 'password1');
        $password2 = filter_input(INPUT_POST, 'password2');
        $email = filter_input(INPUT_POST, 'email');

        $errors = [];

        if ($password1 != $password2) {
            $errors[] = 'passwords do not match';
            $pageTitle = 'error';
            require_once __DIR__ . '/../templates/error.php';
        } else {
            $password = password_hash($password1, PASSWORD_DEFAULT);
        }

        if (empty($this->validateRegistration($username, $password, $email)))
        {
            $this->insertUser($username, $password, $email);
        } else {
            $this->mainController->errorPage($errors);
        }
    }

    private function insertUser($username, $password, $email)
    {
        $user = new User();
        $user->setUsername($username);
        $user->setPassword($password);
        $user->setType('member');
        $user->setEmail($email);

        $id = $this->userRepository->create($user);

        if($id > -1){
            $message = "User: '" . $user->getUsername() . "', has been registered";
            $this->mainController->messagePage($message);
        } else {
            $errors = [];
            $errors[] = "error creating new user";
            $this->mainController->errorPage($errors);
        }
    }

    private function validateRegistration($username, $password, $email)
    {
        $errors = [];
        if(empty($username)) {
            $errors[] = '- missing or empty username';
        }
        if(empty($password)){
            $errors[] = '- missing or empty password';
        }
        if(empty($email)){
            $errors[] = '- missing or empty e-mail';
        }
        if ($this->userRepository->existsUser($username, $password)) {
            $errors[] = 'invalid credentials';
        }
        return $errors;
    }

    function createNewMovie()
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $title = filter_input(INPUT_GET, 'title');
            $genre = filter_input(INPUT_GET, 'genre');
            $classification = filter_input(INPUT_GET, 'classification');
            $rating = filter_input(INPUT_GET, 'rating');

            $errors = $this->validateNewMovie($title, $genre, $classification, $rating);
            if(empty($errors)) {
                $this->insertMovie($title, $genre, $classification, $rating);
            } else {
                $this->mainController->errorPage($errors);
            }
        } else {
            $errors[] = 'You must be an Administrator to access this page.';
            $this->mainController->errorPage($errors);
        }
    }

    private function validateNewMovie($title, $genre, $classification, $rating)
    {
        $errors = [];
        if(empty($title) || strlen($title) > 45) {
            $errors[] = '- title must be 1 - 45 characters';
        }
        if(empty($genre) || strlen($genre) > 45){
            $errors[] = '- genre must be 1 - 45 characters';
        }
        if(empty($classification || strlen($classification) > 45)){
            $errors[] = '- classification must be 1 - 45 characters';
        }
        if(empty($rating) || !is_numeric($rating) || $rating < 1 || $rating > 5){
            $errors[] = '- rating must be a number from 1 - 5';
        }
        return $errors;
    }

    private function insertMovie($title, $genre, $classification, $rating)
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $movie = new Movie();
            $movie->setTitle($title);
            $movie->setGenre($genre);
            $movie->setClassification($classification);
            $movie->setRating($rating);

            $movieRepository = new MovieRepository();
            $success = $movieRepository->create($movie);
            if($success){
                $message = 'Movie successfully created.';
                $this->mainController->messagePage($message);
            } else {
                $errors = [];
                $errors[] = "there was an error trying to create movie with title = '$title', genre = '$genre' and classification = '$classification'";
                $this->mainController->errorPage($errors);
            }
        } else {
            $errors[] = 'You must be an Administrator to access this page.';
            $this->mainController->errorPage($errors);
        }
    }

    function createNewReview()
    {
        if ($this->sessionManager->isLoggedIn())
        {
            $movieId = filter_input(INPUT_GET, 'movieId');
            $helpfulness = 0;
            $reviewTitle = filter_input(INPUT_GET, 'reviewTitle');
            $text = filter_input(INPUT_GET, 'text');
            $userId = filter_input(INPUT_GET, 'userId');
            $ratingCount = 0;

            $errors = $this->validateNewReview($helpfulness, $reviewTitle, $text, $userId, $movieId, $ratingCount);
            if(empty($errors)) {
                $this->insertReview($helpfulness, $reviewTitle, $text, $userId, $movieId, $ratingCount);
            } else {
                $errors[] = 'Failed to create new review';
                $this->mainController->errorPage($errors);
            }
        } else {
            $errors[] = 'You must be logged in to access this page.';
            $this->mainController->errorPage($errors);
        }
    }

    private function validateNewReview($helpfulness, $reviewTitle, $text, $userId, $movieId, $ratingCount)
    {
        $errors = [];
        if(empty($movieId) || !is_numeric($movieId) || $movieId > 999999) {
            $errors[] = '- a valid movie id must be selected';
        }
        if(empty($reviewTitle) || strlen($reviewTitle) > 25) {
            $errors[] = '- a Title less than 25 characters must be entered';
        }
        if(empty($text) || strlen($text) > 1000){
            $errors[] = '- text of up to 1000 characters must be entered';
        }
        if(empty($userId) || !is_numeric($userId) || $userId <= 0 || $userId > 999999){
            $errors[] = '-not a valid userId';
        }
        if($helpfulness != 0){
            $errors[] = '- helpfulness must be zero';
        }
        if ($ratingCount != 0) {
            $errors[] = '- rating count must be zero';
        }
        return $errors;
    }

    private function insertReview($helpfulness, $reviewTitle, $text, $userId, $movieId, $ratingCount)
    {
        if ($this->sessionManager->isLoggedIn())
        {
            $review = new Review();
            $review->setMovieId($movieId);
            $review->setReviewTitle($reviewTitle);
            $review->setText($text);
            $review->setUserId($userId);
            $review->setHelpfulness($helpfulness);
            $review->setRatingCount($ratingCount);

            $reviewRepository = new ReviewRepository();
            $success = $reviewRepository->create($review);
            if($success){
                // now display the review
                $mainController = new MainController();
                $mainController->listReviews($movieId, '', $helpfulness);
            } else {
                $errors = [];
                $errors[] = "there was an error trying to create review for movieId = '$movieId',title = '$reviewTitle', text = '$text', helpfulness = '$helpfulness' and userId = '$userId'";
                $this->mainController->errorPage($errors);
            }
        } else {
            $errors[] = 'You must be logged in to access this page.';
            $this->mainController->errorPage($errors);
        }
    }

    function createNewCinema()
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $location = filter_input(INPUT_GET, 'location');
            $name = filter_input(INPUT_GET, 'name');
            $errors = $this->validateNewCinema($location, $name);
            if(empty($errors)) {
                $this->insertCinema($location, $name);
            } else {
                $this->mainController->errorPage($errors);
            }
        } else {
            $errors[] = 'You must be an Administrator to access this page.';
            $this->mainController->errorPage($errors);
        }
    }

    private function validateNewCinema($location, $name)
    {
        $errors = [];
        if(empty($location) || strlen($location) > 45) {
            $errors[] = '- a location of up to 45 characters must be entered';
        }
        if(empty($name) || strlen($name) > 45){
            $errors[] = '- a name of up to 45 characters must be entered';
        }
        return $errors;
    }

    private function insertCinema($location, $name)
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $cinema = new Cinema();
            $cinema->setLocation($location);
            $cinema->setName($name);

            $cinemaRepository = new CinemaRepository();
            $success = $cinemaRepository->create($cinema);
            if($success){
                // now list all cinemas
                $mainController = new MainController();
                $mainController->listCinemas();
            } else {
                $errors = [];
                $errors[] = "there was an error trying to create cinema for location = '$location' and name = '$name'";
                $this->mainController->errorPage($errors);
            }
        } else {
            $errors[] = 'You must be an Administrator to access this page.';
            $this->mainController->errorPage($errors);
        }
    }

    function createNewShowTime()
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $movieId = filter_input(INPUT_GET, 'movieId');
            $cinemaId = filter_input(INPUT_GET, 'cinemaId');
            $date = filter_input(INPUT_GET, 'date');
            $time = filter_input(INPUT_GET, 'time');

            $errors = $this->validateNewShowTime($movieId, $cinemaId, $date, $time);
            if(empty($errors)) {
                $this->insertShowTime($movieId, $cinemaId, $date, $time);
            } else {
                $this->mainController->errorPage($errors);
            }
        } else {
            $errors[] = 'You must be an Administrator to access this page.';
            $this->mainController->errorPage($errors);
        }
    }

    private function validateNewShowTime($movieId, $cinemaId, $date, $time)
    {
        $errors = [];
        if(empty($movieId) || !is_numeric($movieId) || $movieId <= 0 || $movieId > 999999) {
            $errors[] = '- a valid movie must be selected';
        }
        if(empty($cinemaId) || !is_numeric($cinemaId) || $cinemaId <= 0 || $movieId > 999999) {
            $errors[] = '- a valid cinema must be selected';
        }
        if(empty($date)) {
            $errors[] = '- a valid date must be entered';
        }
        if (!empty($date)) {
            list($year,$month,$day) = explode('-',$date);
            if (!checkdate($month,$day,$year)){
                $errors[] = '- date must be in the format yyyy-mm-dd';
            }
        }
        if(empty($time)){
            $errors[] = '- a valid time must be entered';
        }
        if (!empty($time)) {
            list($hour,$min) = explode(':',$time);
            if ($hour < 0 && $hour >= 24 && $min < 0 && $min > 59){
                $errors = '- time must be in the format hh:mm';
            }
        }
        return $errors;
    }

    private function insertShowTime($movieId, $cinemaId, $date, $time)
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $showTime = new Showtime();
            $showTime->setMovieId($movieId);
            $showTime->setCinemaId($cinemaId);
            $showTime->setDate($date);
            $showTime->setTime($time);

            $showTimeRepository = new ShowtimeRepository();
            $success = $showTimeRepository->create($showTime);
            if($success){
                $message = "Showtime successfully created for MovieId = '$movieId', CinemaId = '$cinemaId', Date = '$date' and Time = '$time'";
                $this->mainController->messagePage($message);
            } else {
                $errors = [];
                $errors[] = "there was an error trying to create Show-Time for MovieId = '$movieId', CinemaId = '$cinemaId', Date = '$date' and Time = '$time'";
                $this->mainController->errorPage($errors);
            }
        } else {
            $errors[] = 'You must be an Administrator to access this page.';
            $this->mainController->errorPage($errors);
        }
    }

    public function processUpdateMovie()
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $id= filter_input(INPUT_GET, 'id');
            $title = filter_input(INPUT_GET, 'title');
            $genre = filter_input(INPUT_GET, 'genre');
            $classification = filter_input(INPUT_GET, 'classification');
            $rating = filter_input(INPUT_GET, 'rating');

            $movie = new Movie();
            $movie->setId($id);
            $movie->setTitle($title);
            $movie->setGenre($genre);
            $movie->setClassification($classification);
            $movie->setRating($rating);

            $success = $this->movieRepository->update($movie);
            if($success){
                $this->mainController->listAllMovies();
            } else {
                $errors[] = "error trying to UPDATE with id = '$id', title = '$title', genre = '$genre', classification = '$classification' and rating = '$rating'";
                $this->mainController->errorPage($errors);
            }
        } else {
            $errors[] = 'You must be an Administrator to access this page.';
            $this->mainController->errorPage($errors);
        }
    }

    public function processUpdateCinema()
    {
        $id= filter_input(INPUT_GET, 'id');
        $location = filter_input(INPUT_GET, 'location');
        $name = filter_input(INPUT_GET, 'name');

        $cinema = new Cinema();
        $cinema->setId($id);
        $cinema->setLocation($location);
        $cinema->setName($name);

        $success = $this->cinemaRepository->update($cinema);
        if($success){
            $this->mainController->listCinemas();
        } else {
            $errors[] = "error trying to UPDATE with id = '$id', location = '$location', name = '$name'";
            $this->mainController->errorPage($errors);
        }
    }

    public function processUpdateReview()
    {
        $id= filter_input(INPUT_GET, 'id');
        $helpfulness = filter_input(INPUT_GET, 'helpfulness');
        $reviewTitle = filter_input(INPUT_GET, 'reviewTitle');
        $text = filter_input(INPUT_GET, 'text');
        $userId = filter_input(INPUT_GET, 'userId');
        $movieId = filter_input(INPUT_GET, 'movieId');

        $review = new Review();
        $review->setId($id);
        $review->setHelpfulness($helpfulness);
        $review->setReviewTitle($reviewTitle);
        $review->setText($text);
        $review->setUserId($userId);
        $review->setMovieId($movieId);

        $success = $this->reviewRepository->update($review);
        if($success){
            $this->mainController->listAllReviews();
        } else {
            $errors = [];
            $errors[] = "error trying to UPDATE with id = '$id', helpfulness = '$helpfulness', review title = '$reviewTitle', text = '$text', user ID = '$userId' and movie ID = $movieId";
            $this->mainController->errorPage($errors);
        }
    }

    public function processUpdateShowTime()
    {
        $id= filter_input(INPUT_GET, 'id');
        $date = filter_input(INPUT_GET, 'date');
        $time = filter_input(INPUT_GET, 'time');
        $cinemaId = filter_input(INPUT_GET, 'cinemaId');
        $movieId = filter_input(INPUT_GET, 'movieId');

        $showTime = new Showtime();
        $showTime->setId($id);
        $showTime->setDate($date);
        $showTime->setTime($time);
        $showTime->setCinemaId($cinemaId);
        $showTime->setMovieId($movieId);

        $errors = $this->validateNewShowTime($movieId, $cinemaId, $date, $time);
        if (empty($errors)) {
            $success = $this->showtimeRepository->update($showTime);
            if($success){
                $this->mainController->listShowTimes();
            } else {
                $errors[] = "error trying to UPDATE with id = '$id', date = '$date', time = '$time', cinemaId = '$cinemaId' and movie ID = $movieId";
                $this->mainController->errorPage($errors);
            }
        } else {
            $this->mainController->errorPage($errors);
        }
    }

    public function deleteCinema()
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $id = filter_input(INPUT_GET, 'cinemaId');
            $success = $this->cinemaRepository->delete($id);
            if($success){
                $this->mainController->listCinemas();
            } else {
                $errors = [];
                $errors[] = "there was an error trying to DELETE cinema with id = '$id''";
                $this->mainController->errorPage($errors);
            }
        } else {
            $errors[] = 'You must be an Administrator to access this page.';
            $this->mainController->errorPage($errors);
        }
    }

    public function deleteMovie()
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $id = filter_input(INPUT_GET, 'movieId');
            $success = $this->movieRepository->delete($id);
            if($success){
                $this->mainController->listAllMovies();
            } else {
                $errors = [];
                $errors[] = "there was an error trying to DELETE movie with id = '$id''";
                $this->mainController->errorPage($errors);
            }
        } else {
            $errors[] = 'You must be an Administrator to access this page.';
            $this->mainController->errorPage($errors);
        }
    }

    public function deleteReview()
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $id = filter_input(INPUT_GET, 'reviewId');
            $success = $this->reviewRepository->delete($id);
            if($success){
                $this->mainController->listAllReviews();
            } else {
                $errors = [];
                $errors[] = "there was an error trying to DELETE review with id = '$id''";
                $this->mainController->errorPage($errors);
            }
        } else {
            $errors[] = 'You must be an Administrator to access this page.';
            $this->mainController->errorPage($errors);
        }
    }

    public function deleteShowTime()
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $id = filter_input(INPUT_GET, 'showTimeId');
            $success = $this->showtimeRepository->delete($id);
            if($success){
                $this->mainController->listShowTimes();
            } else {
                $errors = [];
                $errors[] = "there was an error trying to DELETE show time with id = '$id''";
                $this->mainController->errorPage($errors);
            }
        } else {
            $errors[] = 'You must be an Administrator to access this page.';
            $this->mainController->errorPage($errors);
        }
    }

    public function deleteUser()
    {
        if ($this->sessionManager->usernameFromSession() == 'admin')
        {
            $id = filter_input(INPUT_GET, 'userId');
            $success = $this->userRepository->delete($id);
            if($success){
                $this->mainController->listUsers();
            } else {
                $errors = [];
                $errors[] = "there was an error trying to DELETE user with id = '$id''";
                $this->mainController->errorPage($errors);
            }
        } else {
            $errors[] = 'You must be an Administrator to access this page.';
            $this->mainController->errorPage($errors);
        }
    }

}