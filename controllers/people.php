<?php
  class People extends Controller {
    public function __construct(){
        $this->peopleModel = $this->model('PeopleModel');
        $this->householdModel = $this->model('HouseholdModel');
        $this->actionlogModel = $this->model('ActionLogModel');
    }
    
    public function index(){
    //   $this->view('pages/household/add', []);
        $queries = array();
        parse_str($_SERVER['QUERY_STRING'], $queries);
        $people = $this->peopleModel->getAll($queries);
        $households = $this->householdModel->getAll();
    
        $households_array = [];
        foreach ($households as $household) {
            $households_array[$household->id] = $household;
        }
      

        $data = (object)[
            'households_array' => $households_array,
            'people' => $people,
            'queries' => $queries
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
                'native_place' => $_POST['native_place'],
                'status' => 1,
            ];
            //validated
            $res = $this->peopleModel->add($data);

            if($res){

                $action_log = [
                    "people_id" => $res,
                    "name" => "Thêm nhân khẩu ".$data['name'],
                    'household_id' => $data['household_id'],
                    'description' => '',
                    'action_type' => 'add'
                ];

                $this->actionlogModel->add($action_log);
                redirect('household/detail/'.$data['household_id']);
            }else{
                die('Something went wrong');
            }
        }else{
            //get existing post from model
            $queries = array();
            parse_str($_SERVER['QUERY_STRING'], $queries);
            $household = null ;
            if (isset($queries['household_id'])) {
                $household = $this->householdModel->getById($queries['household_id']);
            }
            $households = $this->householdModel->getAll();
            $data = (object)[
                'households' => $households,
                'household' => $household
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
                'native_place' => $_POST['native_place'],
                'householder_relationship' => isset($_POST['householder_relationship']) ? $_POST['householder_relationship'] : '',
            ];

            $person = $this->peopleModel->getById($id);
            if ($person->id != $data['household_id']) { 
                $action_log = [
                    "people_id" => $person->id,
                    "name" => "Thêm nhân khẩu ".$data['name'],
                    'household_id' => $data['household_id'],
                    'description' => '',
                    'action_type' => 'add'
                ];
                $this->actionlogModel->add($action_log);
                if ($person->status == 0 ) {
                    $action_log_2 = [
                        "people_id" => $person->id,
                        "name" => "Chuyển nhân khẩu ".$person->name." đi",
                        'household_id' => $person->household_id,
                        'description' => '',
                        'action_type' => 'remove'
                    ];
                    $this->actionlogModel->add($action_log_2);
                }
            } 
            

            //validated
            if($this->peopleModel->update($data)){
                $this->peopleModel->updateStatus([
                    "status"=> 0,
                    "id" => $data['id']
                ]);
                redirect('household/detail/'.$data['household_id']);
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
            $person = $this->peopleModel->getById($id);

            $old_household_id = $person->household_id;
            $data = [
                "id" => $person->id,
                "status" => -1,
            ];

            $action_log = [
                "people_id" => $person->id,
                "name" => "Chuyển nhân khẩu ".$person->name." đi",
                'household_id' => $old_household_id,
                'description' => '',
                'action_type' => 'remove'
            ];
            $this->actionlogModel->add($action_log);

            if($this->peopleModel->updateStatus($data)){
                redirect('household/detail/'.$old_household_id);
            }else{
                die('Something went wrong');
            }

        }
    }
  }
?>