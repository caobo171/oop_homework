<?php
  class Home extends Controller {
    public function __construct(){
      $this->householdModel = $this->model('HouseholdModel');
    }
    
    public function index(){
      $data = $this->householdModel->getAll();
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'App to manage household'
      ];

      $this->view('pages/about', $data);
    }
  }
