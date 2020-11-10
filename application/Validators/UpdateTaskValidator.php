<?php
namespace App\Validators;
use Rakit\Validation\Validator;

class UpdateTaskValidator extends Validator {
    public function construct()
    {
        parent::__construct();
    }

    public function rules()
    {
        return [
            "id" => "required|numeric",
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