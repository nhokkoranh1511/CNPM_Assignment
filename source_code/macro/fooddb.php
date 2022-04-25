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
	class FoodDB
	{
        private $table_name = "tbl_food";
		private $db;
		public function __construct()
		{
			$this->db = new Database();
		}

		public function insert_food($title, $description, $price, $image, $category_id,$feature,$active){
            $query = "INSERT INTO `$this->table_name` (`id`,`title`, `description`, `price`, `image`, `category_id`, `feature`, `active`) VALUES (NULL, '$title', '$description', '$price', '$image', '$category_id', '$feature', '$active');";
            $result = $this->db->insert($query);
            return $result;
		}

        public function update_food_by_id($id,$field,$value){
            $query = "UPDATE  `$this->table_name` SET `$field` = '$value' WHERE `$this->table_name`.`id` = '$id';";
            $result = $this->db->update($query);
			return $result;
        }

		public function delete_food_by_id($id){
            $query = "DELETE FROM `$this->table_name` WHERE `$this->table_name`.`id` = '$id';";
            $result = $this->db->delete($query);
			return $result;
        } 

		public function select_food_by_id($id){
            $query = "SELECT * FROM `$this->table_name` WHERE `$this->table_name`.`id` = '$id';";
            $result = $this->db->select($query);
			if ($result == false) {
				return false;
			} else {
				$row = $result ->fetch_assoc();
				return $row;
			}
        }

		public function get_food_list_by_category($cat_id, $sortfield, $ascending){

			if ($ascending == true) {
				$asc = "ASC";
			} else {
				$asc = "DESC";
			}

			$query = "SELECT * FROM `$this->table_name`  WHERE `$this->table_name`.`category_id` = '$cat_id' ORDER BY $sortfield $asc;";
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

		public function get_food_list_all($sortfield, $ascending){

			if ($ascending == true) {
				$asc = "ASC";
			} else {
				$asc = "DESC";
			}

			$query = "SELECT * FROM `$this->table_name` ORDER BY $sortfield $asc;";
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