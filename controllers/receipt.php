<?php
  class Receipt extends Controller {
    public function __construct(){
        $this->receiptModel = $this->model('ReceiptModel');
        $this->householdModel = $this->model('HouseholdModel');
        $this->typeModel = $this->model('ReceiptTypeModel');
    }
    
    public function index(){
    //   $this->view('pages/household/add', []);
      $data = $this->receiptModel->getAll();
      $this->view('pages/receipt/index', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $household_id = $_POST['household_id'];
            $household = $this->householdModel->getById($household_id);
            $data = [
                'household_id'         => $household_id,
                'householder_name'         => $household->householder_name,
                'type_id'         => $_POST['type_id'],
                'amount'         => $_POST['amount'],
                'receive_date' => $_POST['receive_date'],
                'description' => $_POST['description'],
            ];
            //validated
            if($this->receiptModel->add($data)){
                redirect('receipt');
            }else{
                die('Something went wrong');
            }
        }else{

            $types = $this->typeModel->getAll();
            $households = $this->householdModel->getAll();
            $data = (object)[
                'types' => $types,
                'households'  => $households
            ];
            $this->view('pages/receipt/add', $data);
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