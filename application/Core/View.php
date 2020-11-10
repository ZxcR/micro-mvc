<?php
namespace App\Core;

class View {
    
    public function __construct($layout, $view)
    {
        $this->layout = $layout;
        $this->view = $view;
    }

    public function render($data)
    {   
        if(is_array($data)) {
            extract($data);
        }

        ob_start();
        $fileView = __DIR__. "/../views/" . $this->view . ".php";

        if(is_file($fileView)) {
            require $fileView;
        } else {
            throw new \Exception("{$fileView} view not found", 1);
        }

        $content = ob_get_clean();

        $fileLayout = $this->layout;
        if(is_file($fileLayout)) {
            require $fileLayout;
        } else {
            throw new \Exception("{$fileLayout} layout not found", 1);
        }
    }


}