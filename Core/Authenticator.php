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
        $_SESSION = [];
        session_destroy();
        $params = session_get_cookie_params();
        setcookie('HTTPSESSION', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
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