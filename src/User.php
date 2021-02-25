<?php

namespace TuDublin;

class User
{
    private $id;
    private $username;
    private $password;
    private $type;
    private $email;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        if (is_numeric($id) && $id < 1000000){
            $this->id = $id;
        }
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        if (!empty($username) && !is_numeric($username) && strlen($username) >= 4 && strlen
            ($username) <= 45) {
            $this->username = $username;
        }
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        if (!empty($password) && !is_numeric($password) && strlen($password) >= 4 && strlen
        ($password) <= 255) {
            $this->password = $password;
        }
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        if (!empty($type) && !is_numeric($type) && strlen($type) <= 45) {
            $this->type = $type;
        }
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        if (!empty($email) && !is_numeric($email) && strlen($email) <= 45) {
            $this->email = $email;
        }
    }




}