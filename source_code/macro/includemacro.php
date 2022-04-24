<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/source_code/macro/userdb.php");
    include_once($path."/source_code/macro/fooddb.php");
    include_once($path."/source_code/macro/orderdb.php");
    include_once($path."/source_code/macro/session.php");
    $userdb = new UserDB;
    $fooddb = new FoodDB;
    $orderdb = new OrderDB;

    
    function paginatedArray($originalArray, $page_index, $item_per_page) { // 0 is the first page
        $no_of_element = count($originalArray);
        $no_of_page = intdiv($no_of_element,$item_per_page);
        
        if ($no_of_element%$item_per_page!=0) {
            $no_of_page++;
        }

        if ( ($page_index<0) || ($page_index>=$no_of_page) ) {
            return false;
        }

        $start_point = $item_per_page*$page_index;
        $end_point = $start_point + $item_per_page;
        $resArray = array();
        for ($i = $start_point; $i < $end_point; $i++) {
            if ($i< $no_of_element) {
                array_push($resArray,$originalArray[$i]);
            } 
        }

        return $resArray;
    }

    function redirect($url) {
        echo "<script>window.location=\"$url\"</script>";
    }

    function checkValidUserName($username) {
        if(preg_match('/^[a-zA-Z0-9]{5,}$/', $username)) { // for english chars + numbers only, 5 char min
            return true;    
        } else {
            return false;
        }
    }

    function checkValidEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        } else {
            return true;
        }
    }

    function checkValidFullName($full_name) {
        if (!preg_match("/^[a-zA-Z\s]+$/",$full_name)) { // Only letters and white space allowed
            return false;
        } else {
            return true;
        }
    }

    function checkValidPassword($password) {
        return (strlen($password)> 4);
    }
?>
