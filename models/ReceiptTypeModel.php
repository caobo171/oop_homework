<?php
    class ReceiptTypeModel
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
                 FROM ReceiptTypes
            ");
            return $results = $this->db->resultSet();
        }

        public function add($data){
            $this->db->query('INSERT INTO ReceiptTypes (id, type_name, description, since, last_update) 
            VALUES(:id, :type_name, :description, :since, :last_update)');
            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':type_name', $data['type_name']);
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
            $this->db->query('UPDATE ReceiptTypes SET 
            type_name = :type_name, 
            description = :description, 
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
            $this->db->query('SELECT * FROM ReceiptTypes WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();
            return $row;
        }

        public function delete($id){
            $this->db->query('DELETE FROM ReceiptTypes WHERE id = :id');
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