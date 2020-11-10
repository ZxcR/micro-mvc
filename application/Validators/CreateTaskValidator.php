<?php
namespace App\Validators;
use Rakit\Validation\Validator;

class CreateTaskValidator extends Validator {
    public function construct()
    {
        parent::__construct();
    }

    public function rules()
    {
        return [
            'user' => 'required|max:50',
            'title' => 'required|max:128',
            'content' => 'required|max:1000',
            'email'  => 'required|email|max:50'
        ];
    }

    public function _validate($data)
    {
        $validation = $this->make($data, $this->rules());
        $validation->validate();

        if($validation->fails()) {
            return $validation->errors();
            
        } else {
            return true;
        }
    }
}