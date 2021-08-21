<?php
   /*
   *Base controller
   *Loads the models and views
   */

   class Controller {
   
   public function model($model){
      require_once '../app/models/' .$model. '.php';
      return new model; 

   }
   
   public function view($view){
      if(file_exists('../resources/views/' .$view. '.php'))
      { 
         require_once '../resources/views/' .$view. '.php'; 
      }
      else 
      { 
         return die('View does not exist');
      }

   }

   }