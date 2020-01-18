<?php
    /*
     * App core class 
     * Creates URL & loads core controller 
     * URL format - /controller/method/params
     */

     class Core{
         protected $currentController = 'Pages';
         protected $currentMethod = 'index';
         protected $params = [];

         public function __construct()
         {
            // print_r($this->getURL());
            $url = $this->getURL();

            //Look in controllers for first value
            if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
                //if exist, set as the current controller 
                $this->currentController = ucwords($url[0]);
                //Unset zero index
                unset($url[0]);
            }

            //Require the controller
            require_once('../app/controllers/' . $this->currentController . '.php');

            //Instantiate controller class
            $this->currentController = new $this->currentController;
         }

         public function getURL(){
           if(isset($_GET['url'])){
               $url = rtrim($_GET['url'], '/');
               $url = filter_var($url, FILTER_SANITIZE_URL);
               $url = explode('/', $url);
               return $url;
           }
         }

     }