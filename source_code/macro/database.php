<?php
    // Save to database

Class Database{
  
   public $host   = "localhost";
   public $user   = "root";
   public $pass   = "";
   public $dbname = "";
 
 
   public $conn;
   public $db_select;
 
    public function __construct(){
     $this->connectDB();
     }
 
private function connectDB(){
    $this->conn = mysqli_connect($this->host, $this->user, '');

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit();
            }

    $this->db_select = mysqli_select_db($this->conn, 'database') or die(mysqli_error($this->conn));
 }
 
// Select or Read data
public function select($query){
  $result = $this->conn->query($query) or 
   die($this->conn->error.__LINE__);
  if($result->num_rows > 0){
    return $result;
  } else {
    return false;
  }
 }
 
// Insert data
public function insert($query){
   $insert_row = $this->conn->query($query) or 
     die($this->conn->error.__LINE__);
   if($insert_row){
     return $insert_row;
   } else {
     return false;
    }
 }
  
// Update data
 public function update($query){
   $update_row = $this->conn->query($query) or 
     die($this->conn->error.__LINE__);
   if($update_row){
    return $update_row;
   } else {
    return false;
    }
 }
  
// Delete data
 public function delete($query){
   $delete_row = $this->conn->query($query) or 
     die($this->conn->error.__LINE__);
   if($delete_row){
     return $delete_row;
   } else {
     return false;
    }
   }
 
}


?>