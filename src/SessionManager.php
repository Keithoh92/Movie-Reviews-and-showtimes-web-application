<?php

namespace TuDublin;

class SessionManager
{
    private $username = '';
    private $userId = '';
    private $loggedIn = false;

// ---------------- UNCOMMENT this whole function for acceptance testing -----------------------
//    public function __construct()
//    {
//        $this->username = 'admin';  // admin can be changed to Bob for a normal user
//        $this->userId = 15;         // 15 can be changed to 17 for Bob
//        $this->loggedIn = true;
//
//        if(isset($_SESSION['username'])){
//            $this->username = $_SESSION['username'];
//            $this->userId = $_SESSION['userId'];
//            $this->loggedIn = true;
//        }
//    }

//----------------- COMMENT OUT this whole function for acceptance testing ------------------------
    public function __construct()
    {
        if(isset($_SESSION['username'])){
            $this->username = $_SESSION['username'];
            $this->userId = $_SESSION['userId'];
            $this->loggedIn = true;
        }
    }

    public function isLoggedIn()
    {
        return $this->loggedIn;
    }

    public function usernameFromSession()
    {
        return $this->username;
    }

    public function userIdFromSession()
    {
        return $this->userId;
    }

    public function killSession()
    {
        $_SESSION = [];

        if (ini_get('session.use_cookies')){
            $params = session_get_cookie_params();
            setcookie(	session_name(),
                '', time() - 42000,
                $params['path'], $params['domain'],
                $params['secure'], $params['httponly']
            );
        }
        session_destroy();
    }
}