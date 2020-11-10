<?php 
namespace App\Core;

abstract class Controller {

    public $layout = __DIR__ . "/../Views/layouts/main.php";

    
    public function __construct()
    {

    }

    protected function render($view, $dataArray = [])
    {
        $viewObject = new View($this->layout, $view);
        if(isset($_SESSION['messages'])) {
            $dataArray = array_merge($dataArray, ['messages' => $_SESSION['messages']]);
            unset($_SESSION['messages']);
        }
        $viewObject->render($dataArray);    
    }

    protected function redirect($url)
    {
        return header("Location: $url");
    }
}