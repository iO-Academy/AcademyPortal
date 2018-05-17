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
        if ($this->validateEmail($userEmail) !== false){
            $query = $this->db->prepare("SELECT `email`, `password` FROM `users` WHERE `email` = :email;");
            $query->bindParam(':email', $userEmail);
            $query->execute();
            return $query->fetch();
        }
        return [];
    }

    /**
     * Verifies user credentials by comparing form input with email and hashed password in database
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

    /**
     * Validates if parameter is an email
     *
     * @param $email string value provided for validation
     * @return mixed returns the email as a string if its a valid email otherwise it returns false
     */
    private function validateEmail ($email) {
        return filter_var($email,FILTER_VALIDATE_EMAIL);
    }
}