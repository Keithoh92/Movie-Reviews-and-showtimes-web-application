<?php

namespace TuDublin;

use Mattsmithdev\PdoCrudRepo\DatabaseTableRepository;
use Mattsmithdev\PdoCrudRepo\DatabaseManager;
use PDO;
class UserRepository extends DatabaseTableRepository
{
    public function __construct()
    {
        parent::__construct('TuDublin', 'User', 'user');
    }

    public function existsUser($username, $password)
    {
        $db = new DatabaseManager();
        $connection = $db->getDbh();

        $sql = "SELECT * FROM user WHERE username = :username";

        $statement = $connection->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->bindParam(':username', $username, PDO::PARAM_STR);

        $statement->execute();
        $result = $statement->fetch();

        $userId = $result['id'];

        if (password_verify($password, $result['password']))
        {
            return $userId;
        } else {
            return '';
        }
    }
}