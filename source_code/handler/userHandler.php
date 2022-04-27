<?php

$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/macro/includemacro.php");
include_once($path . "/ui/includeUI.php");


class UserHandler
{
    private $userdb;
    private $loginUI;
    private $sess;
    public $loggedUser;

    public function __construct(){ //dung ham nay o nhung trang da dang nhap user
        $this->userdb = new UserDB;
        $this->loginUI = new loginUI;
        $this->sess = new Session;

        $this->sess->init();
        if ( $this->sess->get("user_id")!=false) {
            $this->loggedUser = $this->userdb->select_user_by_id( $this->sess->get("user_id") );
        } else {
            $this->loggedUser = false;
        }
    }

    public function changePassword($oldPassword,$password,$repassword) {
        if ($oldPassword!= $this->loggedUser['password']) {
            //UI
            return false;
        }

        if (!checkValidPassword($password)) {
            //UI
            return false;
        }

        if ($password!=$repassword) {
            //UI
            return false;
        }
        
        $result = $this->userdb->update_user_by_id( $this->loggedUser['id'],"password",$password);
        if ($result == false) {
            //UI failed
            return false;
        }
        return true;
    }

    public function changeEmail($email) {
        if (!checkValidEmail($email)) {
            //UI
            return false;
        }
        
        $result = $this->userdb->update_user_by_id( $this->loggedUser['id'],"email",$email);
        if ($result == false) {
            //UI failed
            return false;
        }
        return true;
    }

    public function changeFullName($full_name) {
        if (!checkValidFullName($full_name)) {
            //UI
            return false;
        }
        
        $result = $this->userdb->update_user_by_id( $this->loggedUser['id'],"full_name",$full_name);
        if ($result == false) {
            //UI failed
            return false;
        }
        return true;

    }

}

?>