<?php
class User {
        // Properties
        public $id;
        public $username;
        public $password;
        public $full_name;
        public $privil;
        public $email;


        public function __construct($id,$username,$password,$full_name,$privil,$email){
            $this-> id= $id;
            $this-> username = $username;
            $this-> password = $password;
            $this-> full_name = $full_name;
            $this-> privil = $privil;
            $this-> email = $email;
        }
}
?>