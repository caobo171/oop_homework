<?php
    class SettingsModel
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function isExist()
        {
            $this->db->query(
                "SELECT *
                 FROM Settings
            ");
            $results = $this->db->resultSet();
            return count($results) > 0;
        }

        public function get() {
            $this->db->query(
                "SELECT *
                 FROM Settings
                 WHERE id = 1
            ");
            $result = $this->db->single();
            return $result;
        }

        public function update($data){
            if ($this->isExist()) {
                $this->db->query("UPDATE Settings SET 
                street = :street, 
                ward = :ward, 
                city = :city,  
                last_update = :last_update WHERE id = 1");

                // Bind values
                $this->db->bind(':street', $data['street']);
                $this->db->bind(':ward', $data['ward']);
                $this->db->bind(':city', $data['city']);
                $this->db->bind(':last_update', time());

                // Execute
                if($this->db->execute()){
                    return true;
                } else {
                    return false;
                }
            } else {
                $this->db->query('INSERT INTO Settings (id, street, ward, city, since, last_update) 
                VALUES(:id, :street, :ward, :city, :since, :last_update)');


                // Bind values
                $this->db->bind(':id', 1);
                $this->db->bind(':street', $data['street']);
                $this->db->bind(':ward', $data['ward']);
                $this->db->bind(':city', $data['city']);
                $this->db->bind(':last_update', time());
                $this->db->bind(':since', time());

                // Execute
                if($this->db->execute()){
                    echo('AAAAAAAAAAAAAA');
                    return true;
                } else {
                    return false;
                }
            }

        }

    }
?>