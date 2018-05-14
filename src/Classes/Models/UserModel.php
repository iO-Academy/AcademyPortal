<?php

namespace Portal\Models;


class UserModel
{
    public $loginFormUserName;
    public $loginFormPassword;
    public $userCredentials;

    public function setUserCredentials ($loginFormUserName, $loginFormPassword) {
        $this->loginFormUserName = $loginFormUserName;
        $this->loginFormPassword = $loginFormPassword;
    }

    private function userLoginVerify(string $loginFormUserName, string $loginFormPassword, UserCredentials $userCredentials) {

        if (($loginFormUserName === $userCredentials->userName) && (password_verify($loginFormPassword,$userCredentials->password))) {
            //returns json object
            return true;
        } else {
            //return json with error message
            return false;
        }

    }

}