<?php
namespace App\Controllers;

use Symfony\Component\HttpFoundation\Request;
use App\Validators\LoginValidator;

class LoginController extends Controller {


    public function index(Request $request)
    {   
        return $this->render("login");
    }

    public function auth(Request $request)
    {
        $data = [
            "login" => $request->get("login"),
            "password" => $request->get("password")
        ];

        $validator = new LoginValidator;
        $errors = $validator->_validate($data);
        
        if(empty($errors)) {
            \App\Helpers\Guard::Auth($data);
        } else {
            $_SESSION['messages'] = $errors;
            return $this->redirect("login");
        }

        return $this->redirect("index");
    }

    public function logout()
    {
        \App\Helpers\Guard::Logout();

        return $this->redirect("index");
    }

}