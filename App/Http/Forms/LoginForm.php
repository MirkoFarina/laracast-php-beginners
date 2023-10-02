<?php

namespace App\Http\Forms;

use Core\FormException;
use Core\Validator;
class LoginForm
{

    protected  $errors = [];
    public function __construct(public array $attributes)
    {
        if (Validator::required($attributes['email'])) {
            $this->errors['email'] = 'A email is required';
        }
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide an email address';
        }
        if (Validator::string($attributes['password'], 7, 255)) {
            $this->errors['password'] = 'A password can have minimum 7 characaters and  maximum 255 characaters';
        }
    }

    public static function validate($attributes)
    {
        $instance = new static($attributes);
        return $instance->failed() ?  $instance->throw() : $instance;

    }
    public function throw():void
    {
        FormException::throw($this->errors(), $this->attributes);
    }
    public function failed()
    {
        return count($this->errors);
    }
    public function errors(): array
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
        return $this;
    }
}