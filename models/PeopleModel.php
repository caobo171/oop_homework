<?php
    class PeopleModel
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getAll(){
            $this->db->query(
                "SELECT *
                 FROM People
                 WHERE status = 0
                 ORDER BY id DESC 
            ");
            return $results = $this->db->resultSet();
        }

        public function nonAssignPeople(){
            $this->db->query(
                "SELECT *
                 FROM People
                 WHERE status = -1
                 ORDER BY id DESC 
            ");
            return $results = $this->db->resultSet();
        }

        public function getByHouseholdId($household_id){
            $this->db->query(
                "SELECT *
                 FROM People
                 WHERE household_id = {$household_id} and status = 0
                 ORDER BY id DESC 
            ");
            return $results = $this->db->resultSet();
        }

        public function add($data){
            $this->db->query('INSERT INTO People (name, birth_day, native_place, sex, ethnic, id_card_no, job, job_place, household_id, householder_relationship, since, last_update) 
            VALUES(:name, :birth_day, :native_place, :sex, :ethnic, :id_card_no, :job, :job_place, :household_id, :householder_relationship, :since, :last_update)');
            // Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':birth_day', $data['birth_day']);
            $this->db->bind(':native_place', $data['native_place']);
            $this->db->bind(':sex', $data['sex']);
            $this->db->bind(':ethnic', $data['ethnic']);
            $this->db->bind(':id_card_no', $data['id_card_no']);
            $this->db->bind(':job', $data['job']);
            $this->db->bind(':job_place', $data['job_place']);
            $this->db->bind(':household_id', $data['household_id']);
            $this->db->bind(':householder_relationship', $data['householder_relationship']);

            $this->db->bind(':since', time());
            $this->db->bind(':last_update',time());

            // Execute
            $res = $this->db->execute();
            if($res){
                return $this->db->lastInsertId();;
            } else {
                return false;
            }
        }

        public function updateStatus($data){
                $this->db->query('UPDATE People SET 
                status = :status, 
                last_update = :last_update WHERE id = :id');
                $this->db->bind(':id', $data['id']);
                $this->db->bind(':status', $data['status']);
                $this->db->bind(':last_update', time());
        
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function update($data){
            $this->db->query('UPDATE People SET name = :name, 
            nickname = :nickname, 
            birth_day = :birth_day, 
            native_place = :native_place, 
            sex = :sex, 
            ethnic = :ethnic, 
            id_card_no = :id_card_no, 
            job = :job, 
            job_place = :job_place, 
            household_id = :household_id,
            householder_relationship = :householder_relationship,
            last_update = :last_update WHERE id = :id');

            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':nickname', $data['nickname']);
            $this->db->bind(':birth_day', $data['birth_day']);
            $this->db->bind(':native_place', $data['native_place']);
            $this->db->bind(':sex', $data['sex']);
            $this->db->bind(':ethnic', $data['ethnic']);
            $this->db->bind(':id_card_no', $data['id_card_no']);
            $this->db->bind(':job', $data['job']);
            $this->db->bind(':job_place', $data['job_place']);
            $this->db->bind(':household_id', $data['household_id']);
            $this->db->bind(':householder_relationship', $data['householder_relationship']);
            $this->db->bind(':last_update',time());
        
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getById($id){
            $this->db->query('SELECT * FROM People WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();
            return $row;

        }

        public function delete($id){
            $this->db->query('DELETE FROM People WHERE id = :id');
            // Bind values
            $this->db->bind(':id', $id);
        
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

    }