<?php
   // Load Config
require_once '../config/config.php';

 

   // Load Helpers
 //  require_once 'helpers/url_helper.php';
 // require_once 'helpers/session_helper.php';

   // Autoload Core Libraries - To work, you need to have the class name as the file name
   spl_autoload_register(function($className){
      require_once 'libraries/' . $className . '.php';
   });