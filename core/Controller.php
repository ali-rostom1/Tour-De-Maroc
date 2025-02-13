<?php

namespace Core;

class Controller {


    // Appeler view
    public function view($view, $data = []) {
        // check 
        if(file_exists('../app/Views/' . $view . '.php')) {
            
            require_once '../app/Views/' . $view . '.php';
        } else {
            echo("View " . $view . " does not exist");
        }
    }
}