<?php
    class ActionLogModel
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getAll()
        {
            $this->db->query(
                "SELECT *
                 FROM ActionLogs
            ");
            return $results = $this->db->resultSet();
        }

        public function add($data){
            $this->db->query('INSERT INTO ActionLogs (action_type, name, people_id, household_id, description, since, last_update) 
            VALUES(:action_type, :name, :people_id, :household_id, :description, :since, :last_update)');
            // Bind values
            $this->db->bind(':action_type', $data['action_type']);
            $this->db->bind(':people_id', $data['people_id']);
            $this->db->bind(':household_id', $data['household_id']);
            $this->db->bind(':description', $data['description']);

            $this->db->bind(':since', time());
            $this->db->bind(':last_update',time());

            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function update($data){
            $this->db->query('UPDATE ActionLogs SET name = :name, 
            action_type = :action_type, 
            people_id = :people_id, 
            household_id = :household_id, 
            description = :description, 
            last_update = :last_update WHERE id = :id');

            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':action_type', $data['action_type']);
            $this->db->bind(':people_id', $data['people_id']);
            $this->db->bind(':household_id', $data['household_id']);
            $this->db->bind(':description', $data['description']);

            $this->db->bind(':last_update',time());
        
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getById($id){
            $this->db->query('SELECT * FROM ActionLogs WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();
            return $row;
        }

        public function delete($id){
            $this->db->query('DELETE FROM ActionLogs WHERE id = :id');
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