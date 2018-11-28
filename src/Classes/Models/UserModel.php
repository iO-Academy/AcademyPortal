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
     * Gets email and password from database to login
     *
     * @param $userEmail used by prepared statement.
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
     * @return true if email entered exists in database
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
     * Inserts new user into database - registering
     *
     * @param string $registerEmail value provided from form to insert into database
     * @param string $registerPassword value provided from form to insert into database
     *
     * @return insert email and password into database
     */
    public function insertNewUserToDb(string $registerEmail, string $registerPassword) {
            $query = $this->db->prepare(
                "INSERT INTO `users` (`email`, `password`) VALUES (:email, :password);");
            $query->bindParam(':email', $registerEmail);
            $query->bindParam(':password', $registerPassword);
            return $query->execute();
    }
}
