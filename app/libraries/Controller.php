<?php
  /*
   * Base Controller
   * Loads the models and views
   */
  class Controller {
    // Load helper
    public function helper($helper){
      // Require helper file
      if (file_exists('../app/helpers/' . $helper . '.php')) {
        require_once '../app/helpers/' . $helper . '.php';
      }else{
        die("<span style='color:red;'>".$helper . " :</span> helper not exist in helpers directory!");
      }
    }
    // Load model
    public function model($model){
      // Require model file
      if (file_exists('../app/models/' . $model . '.php')) {
        require_once '../app/models/' . $model . '.php';
      }else{
        die("<span style='color:red;'>".$model . " :</span> model not exist in models directory!");
      }

      // Instatiate model
      return new $model();
    }
    public function validator($validate){
      // Require validator file
      if (file_exists('../app/validate/' . $validate . '.php')) {
        require_once '../app/validate/' . $validate . '.php';
      }else{
        die("<span style='color:red;'>".$validate . " :</span> validator not exist in validate directory!");
      }
      // Instatiate validator
      return new $validate();
    }

    // Load view
    public function view($view, $data = [], $error = []){
      // Check for view file
      if(file_exists('../app/views/' . $view . '.php')){
        require_once '../app/views/' . $view . '.php';
      } else {
        // View does not exist
        die("<span style='color:red;'>".$view . " :</span> view not exist in view directory!");
      }
    }
    
  }
