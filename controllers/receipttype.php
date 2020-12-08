<?php
  class Receipttype extends Controller {
    public function __construct(){
        $this->typeModel = $this->model('ReceiptTypeModel');
    }
    
    public function index(){
      $data = $this->typeModel->getAll();
      $this->view('pages/receipttype/index', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'type_name'         => $_POST['type_name'],
                'description'     => $_POST['description']
            ];
            //validated
            if($this->typeModel->add($data)){
                redirect('receipttype');
            }else{
                die('Something went wrong');
            }
        }else{
            $data = [
                'title' => '',
                'body'  => ''
            ];
            $this->view('pages/receipttype/add', $data);
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