<?php
  class Receipttype extends Controller {
    public function __construct(){
        $this->typeModel = $this->model('ReceiptTypeModel');
        $this->receiptModel = $this->model('ReceiptModel');
        $this->householdModel = $this->model('HouseholdModel');
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


    public function detail($id){
        $type = $this->typeModel->getById($id);
        $households = $this->householdModel->getAll();
        $households_array = [];
        foreach ($households as $household) {
            $households_array[$household->id] = $household;
        }
        $receipts = $this->receiptModel->getByType($type->id);

      $data = (object) [
          'type' => $type,
          'receipts' => $receipts,
          'households_array' => $households_array
        ];
      $this->view('pages/receipttype/detail', $data);
    }


    public function edit($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'type_name'         => $_POST['type_name'],
                'description'     => $_POST['description']
            ];
            $data = [
                'id'            => (int)$id,
                'type_name'         => $_POST['type_name'],
                'description'     => $_POST['description']
            ];

            //validated
            if($this->typeModel->update($data)){
                redirect('receipttype');
            }else{
                die('Something went wrong');
            }

        }else{
            //get existing post from model
            $data = $this->typeModel->getById($id);
            $this->view('pages/receipttype/edit', $data);
        }        
    }


    public function delete($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //validated
            if($this->typeModel->delete($id)){
                redirect('receittype');
            }else{
                die('Something went wrong');
            }

        }
    }
  }