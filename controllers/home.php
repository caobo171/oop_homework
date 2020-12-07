<?php
  class Home extends Controller {
    public function __construct(){
      $this->householdModel = $this->model('HouseholdModel');
    }
    
    public function index(){
      $data = [
        'title' => 'SharePosts',
        'description' => 'Simple social network built on the TraversyMVC PHP framework'
      ];
     
      $data = $this->householdModel->getHouseHolds();
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'App to share posts with other users'
      ];

      $this->view('pages/about', $data);
    }
  }
