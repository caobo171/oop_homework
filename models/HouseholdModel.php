<?php
    class HouseholdModel
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
                 FROM Household
            ");
            return $results = $this->db->resultSet();
        }

        public function add($data){
            $this->db->query('INSERT INTO Household (house_no, house_street, house_ward, house_city, since, last_update) VALUES(:house_no, :house_street, :house_ward, :house_city, :since, :last_update)');
            // Bind values
            $this->db->bind(':house_no', $data['house_no']);
            $this->db->bind(':house_street', $data['house_street']);
            $this->db->bind(':house_ward', $data['house_ward']);
            $this->db->bind(':house_city', $data['house_city']);
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
            $this->db->query('UPDATE Household SET house_no = :house_no, 
            house_street = :house_street, 
            house_ward = :house_ward, 
            house_city = :house_city, 
            householder_id = :householder_id, 
            householder_name = :householder_name,
            last_update = :last_update WHERE id = :id');

            // Bind values
            $this->db->bind(':id', $data['id']);
            $this->db->bind(':house_no', $data['house_no']);
            $this->db->bind(':house_street', $data['house_street']);
            $this->db->bind(':house_ward', $data['house_ward']);
            $this->db->bind(':house_city', $data['house_city']);
            $this->db->bind(':householder_name', $data['householder_name']);
            $this->db->bind(':householder_id', $data['householder_id']);
            $this->db->bind(':last_update',time());
        
            // Execute
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getById($id){
            $this->db->query('SELECT * FROM Household WHERE id = :id');
            $this->db->bind(':id', $id);

            $row = $this->db->single();
            return $row;

        }

        public function delete($id){
            $this->db->query('DELETE FROM Household WHERE id = :id');
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