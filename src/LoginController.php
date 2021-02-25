<?php

namespace TuDublin;

class LoginController
{
    private $userRepository;
    private $sessionManager;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->sessionManager = new SessionManager();
    }

    function loginPage($error = false)
    {
        $pageTitle = 'Login';
        $loginPageStyle = " active";
        if($error){
            $errorMessage = 'invalid credentials - please try again';
        }
        require_once __DIR__ . '/../templates/login.php';
    }

    public function processLogin()
    {
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');

        $userId = $this->userRepository->existsUser($username, $password);

        if (!empty($userId)) {
            $this->successfulLoginAction($username, $userId);
        } else {
            $errors[] = 'invalid login credentials - try again';
            $pageTitle = 'error';
            require_once __DIR__ . '/../templates/error.php';
        }
    }

    private function validLoginCredentials($username, $password)
    {
        $userId = $this->userRepository->existsUser($username, $password);
        if (!empty($userId)) {
            return true;
        }
        return false;
    }

    private function successfulLoginAction($username, $userId)
    {
        $_SESSION['username'] = $username;
        $_SESSION['userId'] = $userId;

        if ($username == 'admin') {
            $adminController = new AdminController();
            $adminController->adminPage();
        } else {
            $mainController = new MainController();
            $mainController->moviesPage();
        }
    }

    public function logout()
    {
        $this->sessionManager->killSession();
        $_SESSION = [];
        $mainController = new MainController();
        $mainController->moviesPage();
    }
}