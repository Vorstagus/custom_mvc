<?php
  // Report all errors except E_NOTICE
  
   

  error_reporting(E_ALL & ~E_NOTICE );
   
   /*
   * App Core Class
   * reates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
   class Core {
    
    protected $currentController = 'Main';
    protected $currentMethod = 'index';
    protected $parmas = [];
    

    public function __construct(){
        $url = isset($_SERVER['PATH_INFO']) ? explode('/', filter_var(ltrim($_SERVER['PATH_INFO'],'/'), FILTER_SANITIZE_URL)) : array('');
      
        if(file_exists('../app/controllers/' .ucwords($url[0]). '.php')){
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
       
        require_once '../app/controllers/' .$this->currentController.'.php';
        $this->currentController = new $this->currentController;

        if(isset($url[1])){
          if(method_exists($this->currentController, $url[1])){
            //if you dont want case sensitive add the convert string to lower char between url[1]
            $this->currentMethod = $url[1];
            
            unset($url[1]);

          }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
 

    }

   }