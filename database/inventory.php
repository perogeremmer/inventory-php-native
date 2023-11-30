<?php
    include('connection.php');
    include('category.php');

    class Inventory {

        function __construct()
        {
            $this->database = new ConnectionDatabase();
        }

        function getAll(){
            $query = "SELECT i.*, c.name as category_name FROM inventory i LEFT JOIN category c ON c.id = i.category_id WHERE deleted_at IS NULL";
            $data = mysqli_query($this->database->connection, $query);
            
            $res = [];
    
            while($item = mysqli_fetch_array($data)) {
                $res[] = $item;
            }

            $this->database->closeConnection();
    
            return $res;
        }

        function store($name, $stock, $expired_at, $category_id){
            $query = "INSERT INTO `inventory` (`name`, `stock`, `expired_at`, `category_id`) VALUES (?,?,?,?)";

            $process = $this->database->connection->prepare($query);

            if($process) {
                $process->bind_param('ssss', $name, $stock, $expired_at, $category_id);
                $process->execute();
            } else {
                $error = $this->database->connection->errno . ' ' . $this->database->connection->error;
                echo $error;
            }
            
            $process->close();
            $this->database->closeConnection();            

            return true;
        }

        function show($id){
            $result = null;
            $query = "SELECT * FROM inventory WHERE id = ?";
            $process = $this->database->connection->prepare($query);
            
            if($process) {
                $process->bind_param('s', $id);
                $process->execute();

                $result = $process->get_result();
                $result = $result->fetch_assoc();
            } else {
                $error = $this->database->connection->errno . ' ' . $this->database->connection->error;
                echo $error;
            }
            
            $process->close();
            $this->database->closeConnection();            

            return $result;
        }

        function update($id, $name, $stock, $expired_at, $category_id){
            $query = "UPDATE `inventory` SET `name` = ?, `stock` = ?, `expired_at` = ?, `category_id` = ? WHERE id = ?";
            $process = $this->database->connection->prepare($query);

            if($process) {
                $process->bind_param('sssss', $name, $stock, $expired_at, $category_id, $id);
                $process->execute();
            } else {
                $error = $this->database->connection->errno . ' ' . $this->database->connection->error;
                echo $error;
            }
            
            $process->close();
            $this->database->closeConnection();            

            return true;
        }

        function delete($id){
            $query = "UPDATE `inventory` SET `deleted_at` = CURRENT_TIMESTAMP() WHERE id = ?";

            $process = $this->database->connection->prepare($query);

            if($process) {
                $process->bind_param('s', $id);
                $process->execute();
            } else {
                $error = $this->database->connection->errno . ' ' . $this->database->connection->error;
                echo $error;
            }
            
            $process->close();
            $this->database->closeConnection();            

            return true;
        }

    }
?>