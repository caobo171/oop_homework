<?php
  class Settings extends Controller {
    public function __construct(){
        $this->settingsModel = $this->model('SettingsModel');
    }
    
    public function index(){
    //   $this->view('pages/household/add', []);
      $data = $this->settingsModel->get();
      $this->view('pages/settings/index', $data);
    }

    public function edit() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'ward'     => $_POST['ward'],
                'street'    => $_POST['street'],
                'city'      => $_POST['city']
            ];

            //validated
            if($this->settingsModel->update($data)){
                redirect('settings');
            }else{
                die('Something went wrong');
            }

        }
    }
  }