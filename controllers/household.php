<?php
  class Household extends Controller {
    public function __construct(){
        $this->householdModel = $this->model('HouseholdModel');
    }
    
    public function index(){
    //   $this->view('pages/household/add', []);
      $data = $this->householdModel->getHouseHolds();
      $this->view('pages/household/index', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'house_no'         => trim($_POST['house_no']),
                'house_street'     => trim($_POST['house_street']),
                'house_ward'     => $_POST['house_ward'],
                'house_city'      => $_POST['house_city']
            ];
            //validated
            if($this->householdModel->addPost($data)){
                redirect('household');
            }else{
                die('Something went wrong');
            }
        }else{
            $data = [
                'title' => '',
                'body'  => ''
            ];
            $this->view('pages/household/add', $data);
        }
    }

    public function edit($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id'            => (int)$id,
                'house_no'         => trim($_POST['house_no']),
                'house_street'     => trim($_POST['house_street']),
                'house_ward'     => $_POST['house_ward'],
                'house_city'      => $_POST['house_city']
            ];

            //validated
            if($this->householdModel->updatePost($data)){
                redirect('household');
            }else{
                die('Something went wrong');
            }

        }else{
            //get existing post from model
            $household = $this->householdModel->getById($id);
            $this->view('pages/household/edit', $household);
        }        
    }


    public function delete($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //validated
            if($this->householdModel->delete($id)){
                redirect('household');
            }else{
                die('Something went wrong');
            }

        }
    }
  }