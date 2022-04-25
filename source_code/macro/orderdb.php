<?php
	/*$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
    */
	$path = $_SERVER['DOCUMENT_ROOT'];
    include_once ($path.'/macro/database.php');
?>

<?php
	/**
	 * 
	 */
	class OrderDB
	{
        private $table_name = "tbl_order";
		private $db;
		public function __construct()
		{
			$this->db = new Database();
		}

		public function insert_order($food, $price, $date, $status, $customer_id){
            $query = "INSERT INTO `$this->table_name` (`id`, `food`, `price`, `date`, `status`, `customer_id`) VALUES (NULL, '$food', '$price', '$date', '$status', '$customer_id');";
            $result = $this->db->insert($query);
            return $result;
		}

        public function update_order_by_id($id,$field,$value){
            $query = "UPDATE  `$this->table_name` SET `$field` = '$value' WHERE `$this->table_name`.`id` = '$id';";
            $result = $this->db->update($query);
			return $result;
        }

		public function delete_order_by_id($id){
            $query = "DELETE FROM `$this->table_name` WHERE `$this->table_name`.`id` = '$id';";
            $result = $this->db->delete($query);
			return $result;
        } 

		public function select_order_by_id($id){
            $query = "SELECT * FROM `$this->table_name` WHERE `$this->table_name`.`id` = '$id';";
            $result = $this->db->select($query);
			if ($result == false) {
				return false;
			} else {
				$row = $result ->fetch_assoc();
				return $row;
			}
        }

		public function get_order_list_all($sortfield,$ascending){
            
			if ($ascending == true) {
				$asc = "ASC";
			} else {
				$asc = "DESC";
			}

			$query = "SELECT * FROM `$this->table_name` ORDER BY $sortfield $asc";
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

		public function get_order_list_by_customer_id($customer_id,$sortfield,$ascending){
            
			if ($ascending == true) {
				$asc = "ASC";
			} else {
				$asc = "DESC";
			}

			$query = "SELECT * FROM `$this->table_name` WHERE `$this->table_name`.`customer_id` = '$customer_id'ORDER BY $sortfield $asc  ;";
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

		public function get_order_list_by_status($status,$sortfield,$ascending){
            
			if ($ascending == true) {
				$asc = "ASC";
			} else {
				$asc = "DESC";
			}

			$query = "SELECT * FROM `$this->table_name` WHERE `$this->table_name`.`status` = '$status'  ORDER BY $sortfield $asc;";
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

		public function get_order_list_by_customer_id_and_status($customer_id,$status,$sortfield,$ascending){
            
			if ($ascending == true) {
				$asc = "ASC";
			} else {
				$asc = "DESC";
			}

			$query = "SELECT * FROM `$this->table_name` WHERE `$this->table_name`.`status` = '$status' AND `$this->table_name`.`customer_id` = '$customer_id'  ORDER BY $sortfield $asc;";
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