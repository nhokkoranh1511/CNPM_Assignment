<?php

$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/source_code/macro/includemacro.php");
include_once($path . "/source_code/ui/includeUI.php");


class OrderHandler
{
    private $userdb;
    private $orderdb;
    private $loginUI;
    private $sess;
    public $loggedUser;

    public function __construct(){ //dung ham nay o nhung trang da dang nhap user
        $this->userdb = new UserDB;
        $this->orderdb = new OrderDB;
        $this->loginUI = new loginUI;
        $this->sess = new Session;

        $this->sess->init();
        if ( $this->sess->get("user_id")!=false) {
            $this->loggedUser = $this->userdb->select_user_by_id( $this->sess->get("user_id") );
        } else {
            $this->loggedUser = false;
        }
    }

    public function logged_user_privil() {
        return $this->loggedUser['privil'];
    }

    public function create_order($foodlist,$total_price) {
        $date = date("D M d, Y G:i");
        $customer_id = $this->loggedUser['id'];
        $result = $this->orderdb->insert_order($foodlist,$total_price,$date,"waiting",$customer_id);
        
        if ($result == false) {
            //UI
            return;
        } else {
            //UI success
            return;
        }
    }

    public function verify_payment($key) {
        if ($key== "success") {
            return true;
        } else {
            return false;
        }
    }

    public function served_order($id) {
            $current_order = $this->orderdb->select_order_by_id($id);

            if ($current_order['status'] == "done") {
                $result = $this->orderdb->update_order_by_id($id,"status","served");
            }
    }

    public function cancel_order($id) {
        $current_order = $this->orderdb->select_order_by_id($id);

        if ($current_order['status'] == "waiting") {
            $result = $this->orderdb->update_order_by_id($id,"status","canceled");
        }
    }

    public function reject_order($id) {
        if ($this->logged_user_privil()=="staff") {
            $current_order = $this->orderdb->select_order_by_id($id);

            if ($current_order['status'] == "waiting") {
                $result = $this->orderdb->update_order_by_id($id,"status","rejected");
            }
        }
    }

    public function done_order($id) {
        if ($this->logged_user_privil()=="staff") {

            $current_order = $this->orderdb->select_order_by_id($id);

            if ($current_order['status'] == "waiting") {
                $result = $this->orderdb->update_order_by_id($id,"status","done");
            }
        }
    }

    public function refunded_order($id) {
        if ($this->logged_user_privil()=="staff") {
            $current_order = $this->orderdb->select_order_by_id($id);
            if ($current_order['status'] == "canceled" || $current_order['status'] == "rejected") {
                $result = $this->orderdb->update_order_by_id($id,"status","refunded");
            }
        }
    }

    public function order_list($select){
        if ($select == "all") {
            if ($this->logged_user_privil()=="staff") {
                $order_list = $this->orderdb->get_order_list_all("id",true);
            } 

            if ($this->logged_user_privil()=="customer") {
                $cus_id = $this->loggedUser['id'];
                $order_list = $this->orderdb->get_order_list_by_customer_id($cus_id,"id",true);
            } 
            return;
        }

        if ($select != "all") {
            if ($this->logged_user_privil()=="staff") {
                $order_list = $this->orderdb->get_order_list_by_status($select,"id",true);
            } 

            if ($this->logged_user_privil()=="customer") {
                $cus_id = $this->loggedUser['id'];
                $order_list = $this->orderdb->get_order_list_by_customer_id_and_status($cus_id,$select,"id",true);
            } 
            return;
        }
    }

}

?>