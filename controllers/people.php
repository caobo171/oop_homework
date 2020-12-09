<?php
  class People extends Controller {
    public function __construct(){
        $this->peopleModel = $this->model('PeopleModel');
        $this->householdModel = $this->model('HouseholdModel');
    }
    
    public function index(){
    //   $this->view('pages/household/add', []);
      $people = $this->peopleModel->getAll();
      $households = $this->householdModel->getAll();
    
      $households_array = [];
        foreach ($households as $household) {

                $households_array[$household->id] = $household;
            
        }
      

      $data = (object)[
          'households_array' => $households_array,
          'people' => $people
      ];

      $this->view('pages/people/index', $data);
    }

    public function add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name'         => $_POST['name'],
                'birth_day'     => $_POST['birth_day'],
                'household_id'    => $_POST['household_id'],
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
            //get existing post from model
            $households = $this->householdModel->getAll();
            $data = (object)[
                'households' => $households,
            ];
            $this->view('pages/people/add', $data);
        }
    }

    public function detail($id) {
        $person = $this->peopleModel->getById($id);
        $household = $this->householdModel->getById($person->household_id);
        $data = (object)[
            'household' => $household,
            'person' => $person
        ];
        $this->view('pages/people/detail', $data);
    }

    public function edit($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id'           => (int)$id,
                'name'         => $_POST['name'],
                'birth_day'    => $_POST['birth_day'],
                'household_id'    => $_POST['household_id'],
                'sex'     => $_POST['sex'],
                'job'      => $_POST['job'],
                'ethnic'   => $_POST['ethnic'],
                'id_card_no' => $_POST['id_card_no'],
                'job_place' => $_POST['job_place'],
                'native_place' => $_POST['native_place']
            ];

            //validated
            if($this->peopleModel->update($data)){
                redirect('people');
            }else{
                die('Something went wrong');
            }

        }else{
            //get existing post from model
            $households = $this->householdModel->getAll();
            $person = $this->peopleModel->getById($id);

            $data = (object)[
                'households' => $households,
                'person' => $person
            ];
            $this->view('pages/people/edit', $data);
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