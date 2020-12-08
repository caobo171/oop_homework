<?php
  class People extends Controller {
    public function __construct(){
        $this->peopleModel = $this->model('PeopleModel');
    }
    
    public function index(){
    //   $this->view('pages/household/add', []);
      $data = $this->peopleModel->getAll();
      $this->view('pages/people/index', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name'         => $_POST['name'],
                'birth_day'     => $_POST['birth_day'],
                'sex'     => $_POST['sex'],
                'job'      => $_POST['job'],
                'id_card_no' => $_POST['id_card_no'],
                'job_place' => $_POST['job_place'],
                'native_place' => $_POST['native_place']
            ];
            //validated
            if($this->peopleModel->add($data)){
                redirect('people');
            }else{
                die('Something went wrong');
            }
        }else{
            $data = [
                'title' => '',
                'body'  => ''
            ];
            $this->view('pages/people/add', $data);
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
            if($this->householdModel->update($data)){
                redirect('household');
            }else{
                die('Something went wrong');
            }

        }else{
            //get existing post from model
            $household = $this->peopleModel->getById($id);
            $this->view('pages/people/edit', $household);
        }        
    }


    public function delete($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //validated
            if($this->peopleModel->delete($id)){
                redirect('people');
            }else{
                die('Something went wrong');
            }

        }
    }
  }