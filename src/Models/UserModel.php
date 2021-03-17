<?php

namespace Portal\Models;

class UserModel
{
    private $db;

    /**
     * Creates UserModel constructor.
     *
     * @param \PDO $db
     */
    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Gets email and password from database to login.
     *
     * @param $userEmail used by prepared statement
     *
     * @return array contains user email and password.
     */
    public function getUserByEmail($userEmail)
    {
        if ($this->validateEmail($userEmail) !== false) {
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
     * @return bool if email entered exists in database
     */
    public function userLoginVerify(string $userEmail, string $password, $userCredentials): bool
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
     * Inserts new user into database - registering.
     *
     * @param string $registerEmail value provided from form to insert into database
     * @param string $registerPassword value provided from form to insert into database
     *
     * @return $query insert email and password into database.
     */
    public function insertNewUserToDb(string $registerEmail, string $registerPassword)
    {
        $query = $this->db->prepare(
            "INSERT INTO `users` (`email`, `password`) VALUES (:email, :password);"
        );
        $query->bindParam(':email', $registerEmail);
        $query->bindParam(':password', $registerPassword);
        return $query->execute();
    }

    /** Validates if parameter is an email
     *
     * @param $email string value provided for validation
     * @return mixed returns the email as a string if its a valid email otherwise it returns false
     */
    private function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}
