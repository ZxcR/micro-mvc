<?php
namespace App\Validators;
use Rakit\Validation\Validator;

class LoginValidator extends Validator {
    public function construct()
    {
        parent::__construct();
    }

    public function rules()
    {
        return [
            "login" => "required",
            'password' => 'required',
        ];
    }

    public function _validate($data)
    {
        $validation = $this->make($data, $this->rules());
        $validation->validate();
        $errors = [];

        if($validation->fails()) {
            $errors = $validation->errors();
            $errors = $errors->toArray();
        } else {
            if($data["login"] !== "admin") {
                $errors["login"][] = "Login is not valid";
            }
            if($data["password"] != "123") {
                $errors["password"][] = "Password is not valid";
            }
        }
        return $errors;
    }
}