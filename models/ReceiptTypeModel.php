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
                 ORDER BY id DESC 
            ");
            return $results = $this->db->resultSet();
        }

        public function add($data){
            $this->db->query('INSERT INTO ReceiptTypes ( type_name, description, since, last_update) 
            VALUES(:type_name, :description, :since, :last_update)');
            // Bind values
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
            $this->db->bind(':type_name', $data['type_name']);
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
?>