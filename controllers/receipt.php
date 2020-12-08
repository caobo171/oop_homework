<?php
  class Receipt extends Controller {
    public function __construct(){
        $this->receiptModel = $this->model('ReceiptModel');
        $this->householdModel = $this->model('HouseholdModel');
        $this->typeModel = $this->model('ReceiptTypeModel');
    }
    
    public function index(){
        $receipts = $this->receiptModel->getAll();
        $households = $this->householdModel->getAll();
      
        $households_array = [];
        foreach ($households as $household) {
            $households_array[$household->id] = $household;
        }

      $data = (object) [
          'receipts' => $receipts,
          'households_array' => $households_array
        ];
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
                'id' => (int) $id, 
                'household_id'         => $household_id,
                'householder_name'         => $household->householder_name,
                'type_id'         => $_POST['type_id'],
                'amount'         => $_POST['amount'],
                'receive_date' => $_POST['receive_date'],
                'description' => $_POST['description'],
            ];

            //validated
            if($this->householdModel->update($data)){
                redirect('household');
            }else{
                die('Something went wrong');
            }

        }else{
            //get existing post from model
            $types = $this->typeModel->getAll();
            $households = $this->householdModel->getAll();
            $receipt = $this->receiptModel->getById($id);
            $data = (object)[
                'types' => $types,
                'households'  => $households,
                'receipt' => $receipt
            ];
            $this->view('pages/receipt/edit', $data);
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