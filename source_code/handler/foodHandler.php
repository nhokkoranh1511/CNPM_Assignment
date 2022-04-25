<?php

$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/macro/includemacro.php");
include_once($path . "/ui/includeUI.php");


class FoodHandler
{
    private $userdb;
    private $fooddb;
    private $loginUI;
    private $sess;
    public $loggedUser;

    public function __construct(){ //dung ham nay o nhung trang da dang nhap user
        $this->userdb = new UserDB;
        $this->fooddb = new FoodDB;
        $this->loginUI = new loginUI;
        $this->sess = new Session;

        $this->sess->init();
        if ( $this->sess->get("user_id")!=false) {
            $this->loggedUser = $this->userdb->select_user_by_id( $this->sess->get("user_id") );
        } else {
            $this->loggedUser = false;
        }
    }

    public function get_food_list($select,$sortField,$isAscending) {
        // ex $list = get_food_list("all","price",false) tra ve 1 mảng php bao gồm các thức ăn
        // được xếp theo thứ tự giá giảm dần.
        // $list[0]['name'] trả về tên, $list[0]['price'] trả về giá  của phần tử đầu tiên.

         // ex $list = get_food_list(0,"name",true) tra ve 1 mảng php bao gồm pizzas
        // được xếp theo thứ tự A-Z
        if ($select == "all") {
            return $this-> fooddb ->get_food_list_all($sortField,$isAscending);
        } else {
            return $this-> fooddb ->get_food_list_by_category($select,$sortField,$isAscending);
        }
    }
}