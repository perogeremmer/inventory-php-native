<?php

    class Category {

        function __construct()
        {
            $this->db = new ConnectionDatabase();
        }

        function getAll(){
            $query = "SELECT * FROM category";
            $data = mysqli_query($this->db->connection, $query);
            
            $res = [];
    
            while($item = mysqli_fetch_array($data)) {
                $res[] = $item;
            }

            $this->db->closeConnection();
    
            return $res;
        }

    }
?>