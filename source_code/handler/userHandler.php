<?php

$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/source_code/macro/includemacro.php");
include_once($path . "/source_code/ui/includeUI.php");
include_once($path . "/source_code/class/user.php");


class UserHandler
{
    private $userdb;
    private $loginUI;
    private $sess;
    private $loggedUser;

    public function include(){ //dung ham nay o nhung trang da dang nhap user
        $this->userdb = new UserDB;
        $this->loginUI = new loginUI;
        $this->sess = new Session;

        $result = $this->userdb->select_user_by_id( $this->sess->get("user_id") );// get logged user 
        if ($result == false) {
            $this->loginUI->warningBox("Invalid User");
            redirect("/source_code/login.php");
        } else {
            $this->loggedUser = new User($result['id'],$result['username'],$result['password'],$result['full_name'],$result['privil'],$result['email']);
        }

    }

    public function hello() {
        $this->loginUI->successBox($this->loggedUser->username) ;
    }

}

?>