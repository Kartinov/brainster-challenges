<?php

require_once __DIR__ . '/../classes/User.php';
require_once __DIR__ . '/../classes/Session.php';

class Authenticator
{
    public function login($username, $password)
    {
        if (!(new User)->where(['username' => $username])->exists()) {
            Session::set('message', 'Either your username or password is incorrect');
            return false;
        }

        $user = (new User)->where(['username' => $username])->first();

        if (!password_verify($password, $user->password)) {
            Session::set('message', 'Either your username or password is incorrect');
            return false;
        }

        Session::set('user', $user);

        return true;
    }
}
