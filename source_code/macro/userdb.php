<?php
	/*$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
    */
	$path = $_SERVER['DOCUMENT_ROOT'];
    include_once ($path.'/source_code/macro/database.php');
?>

<?php
	/**
	 * 
	 */
	class UserDB
	{
        private $table_name = "tbl_user";
		private $db;
		public function __construct()
		{
			$this->db = new Database();
		}

		public function insert_user($username, $password, $full_name, $privil, $email){
            $query = "INSERT INTO `$this->table_name` (`id`, `full_name`, `username`, `password`, `privil`, `email`) VALUES (NULL, '$full_name', '$username', '$password', '$privil', '$email');";
            $result = $this->db->insert($query);
            return $result;
		}

        public function update_user_by_id($id,$field,$value){
            $query = "UPDATE  `$this->table_name` SET `$field` = '$value' WHERE `$this->table_name`.`id` = '$id';";
            $result = $this->db->update($query);
			return $result;
        }

		public function update_user_by_name($name,$field,$value){
            $query = "UPDATE  `$this->table_name` SET `$field` = '$value' WHERE `$this->table_name`.`username` = '$name';";
            $result = $this->db->update($query);
			return $result;
        }

		public function delete_user_by_name($name){
            $query = "DELETE FROM `$this->table_name` WHERE `$this->table_name`.`name` = '$name';";
            $result = $this->db->delete($query);
			return $result;
        }

		public function delete_user_by_id($id){
            $query = "DELETE FROM `$this->table_name` WHERE `$this->table_name`.`id` = '$id';";
            $result = $this->db->delete($query);
			return $result;
        } 

		public function select_user_by_id($id){
            $query = "SELECT * FROM `$this->table_name` WHERE `$this->table_name`.`id` = '$id';";
            $result = $this->db->select($query);
			if ($result == false) {
				return false;
			} else {
				$row = $result ->fetch_assoc();
				return $row;
			}
        }

		public function select_user_by_name($name){
            $query = "SELECT * FROM `$this->table_name` WHERE `$this->table_name`.`name` = '$name';";
            $result = $this->db->select($query);
			if ($result == false) {
				return false;
			} else {
				return $result ->fetch_assoc();
			}
        }

		public function get_user_list_by_privil($privil,$sortfield,$ascending){
            
			if ($ascending == true) {
				$asc = "ASC";
			} else {
				$asc = "DESC";
			}

			$query = "SELECT * FROM `$this->table_name`  WHERE `$this->table_name`.`privil` = '$privil' ORDER BY $sortfield $asc;";
			$result = $this->db->select($query);

			if ($result == false) {
				return false;
			} else { // fetch into array
				$resultArr= array();
				while ($row = $result ->fetch_assoc()) {
					array_push($resultArr,$row);
				}
				return $resultArr;
			}
        }
		 //return false co nghia la fail
	}
    
?>