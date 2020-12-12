<?php
  class Unassign extends Controller {
    public function __construct(){
        $this->peopleModel = $this->model('PeopleModel');
    }
    
    public function index(){
     
      $people = $this->peopleModel->nonAssignPeople();
      $data = (object)[
        'people' => $people
      ];
      $this->view('pages/unassign/index', $data);
    }
  }
