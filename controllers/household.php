<?php
  class Household extends Controller {
    public function __construct(){
        $this->householdModel = $this->model('HouseholdModel');
        $this->peopleModel = $this->model('PeopleModel');
        $this->settingsModel = $this->model('SettingsModel');
        $this->actionlogModel = $this->model('ActionLogModel');
    }
    
    public function index(){
    //   $this->view('pages/household/add', []);
      $data = $this->householdModel->getAll();
      $this->view('pages/index', $data);
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
            if($this->householdModel->add($data)){
                redirect('household');
            }else{
                die('Something went wrong');
            }
        }else{
            $settings = $this->settingsModel->get();
            $data = (object)[
                "settings" => $settings
            ];
            $this->view('pages/household/add', $data);
        }
    }

    public function detail($id) {
        $household = $this->householdModel->getById($id);
        $people = $this->peopleModel->getByHouseholdId($household->id);
        $actionlogs = $this->actionlogModel->getByHouseholdId($household->id);
        $data = (object) [
            'household' => $household,
            'people' => $people,
            'actionlogs' => $actionlogs
        ];
        $this->view('pages/household/detail', $data);
    }

    public function edit($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $householder = $this->peopleModel->getById($_POST['householder_id']);
            $data = [
                'id'            => (int)$id,
                'house_no'         => trim($_POST['house_no']),
                'house_street'     => trim($_POST['house_street']),
                'householder_id' => $householder->id,
                'householder_name' => $householder->name,
                'house_ward'     => $_POST['house_ward'],
                'house_city'      => $_POST['house_city']
            ];

            //validated
            if($this->householdModel->update($data)){
                redirect('household/detail/'.$id);
            }else{
                die('Something went wrong');
            }

        }else{
            //get existing post from model
            $household = $this->householdModel->getById($id);
            $people = $this->peopleModel->getByHouseholdId($household->id);
            $settings = $this->settingsModel->get();
            $data = (object) [
                'household' => $household,
                'people' => $people,
                'settings' => $settings
            ];
            $this->view('pages/household/edit', $data);
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
?>