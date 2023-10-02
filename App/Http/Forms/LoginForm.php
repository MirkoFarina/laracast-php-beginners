<?php

namespace App\Http\Forms;

use Core\Validator;
class LoginForm
{
    protected  $errors = [];
    public function validate($email, $password): bool
    {
// validation element
        if (Validator::required($email)) {
            $this->errors['email'] = 'A email is required';
        }
        if (!Validator::email($email)) {
            $this->errors['email'] = 'Please provide an email address';
        }
        if (Validator::string($password, 7, 255)) {
            $this->errors['password'] = 'A password can have minimum 7 characaters and  maximum 255 characaters';
        }

        return empty($this->errors);
    }
    public function errors(): array
    {
        return $this->errors;
    }
}