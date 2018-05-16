<?php

namespace Portal\Models;

class UserModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Gets email and password from database
     *
     * @param $userEmail used by prepared statement
     *
     * @return array contains user email and password
     */
    public function getUserByEmail($userEmail)
    {
        $query = $this->db->prepare("SELECT `email`, `password` FROM `users` WHERE `email` = :email;");
        $query->bindParam(':email', $userEmail);
        $query->execute();
        $userCredentials = $query->fetch();
        return $userCredentials;
    }

    /**
     * Verifies user credentials
     *
     * @param string $userEmail value provided for comparison
     * @param string $password value provided for comparison
     * @param array $userCredentials values provided for comparison
     *
     * @return bool
     */
    public function userLoginVerify(string $userEmail, string $password, $userCredentials):bool
    {
        if (
            (is_array($userCredentials)) &&
            ($userEmail === $userCredentials['email']) &&
            (password_verify($password, $userCredentials['password']))
        ) {
            return true;
        }
        return false;
    }

}