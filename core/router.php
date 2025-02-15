<?php

namespace Core;

class Router {
    protected $currentController = 'HomeController';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->getUrl();
        
        if(isset($url[0]) ){
            if(file_exists('../app/Controllers/' . ucwords($url[0]). 'Controller.php'))
            {
                $this->currentController = ucwords($url[0])."Controller";
                unset($url[0]);

            }else {
                $this->currentController = 'NotFoundController';
            }

        }

        require_once '../app/Controllers/'. $this->currentController . '.php';

        $controllerClass = "App\\Controllers\\" . $this->currentController;
        $this->currentController = new $controllerClass();

        if (isset($url[1])  ) {
            if( method_exists($this->currentController, $url[1]))
            {
                $this->currentMethod = $url[1];
                unset($url[1]);
            } else {
                require_once '../app/Controllers/NotFoundController.php';
                $this->currentController = new \app\Controllers\NotFoundController();
                $this->currentMethod = 'index';
            }

        }


        // Get params
        $this->params = $url ? array_values($url) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return [];
    }
}
?>
