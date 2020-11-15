<?php
  /*
   * Base Controller
   * Loads the models and views
   */
  class Controller {
    // Load model
    public function model($model){
      require_once 'models/' . $model . '.php';

      // Instatiate model
      return new $model();
    }

    // Load view
    public function view($view, $data = []){
      // Check for view file
      if(file_exists('views/' . $view . '.php')){
        require_once 'views/' . $view . '.php';
      } else {
        // View does not exist
        die('View does not exist');
      }
    }
  }