<?php

namespace Core;

class Authenticator
{
    public function login($user)
    {
        $_SESSION['user'] = $user;

        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::destroy();
    }
    public function attempt($email, $password): bool
    {
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login($user);
              return true;
            }
        }
    return false;
    }
}