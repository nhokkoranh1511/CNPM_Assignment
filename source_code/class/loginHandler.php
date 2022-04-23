<?php

$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/source_code/macro/includemacro.php");
include_once($path . "/source_code/ui/includeUI.php");


class LoginHandler
{
    private $userdb;
    private $loginUI;
    private $sess;

    public function __construct(){
        $this->userdb = new UserDB;
        $this->loginUI = new loginUI;
        $this->sess = new Session;
    }
    public function login($username, $password)
    {
        
        $result = $this->userdb->select_user_by_name($username);

        if ($result == false) {
            $this->loginUI->warningBox("Wrong username");
            return;
        }

        if ($result['password'] != $password) {
            $this->loginUI->warningBox("Wrong password");
            return;
        }
        $this->sess->init();
        $this->sess -> set("user_id", $result['id']);
        $this->sess -> set("privil",$result['privil']);

    }

    public function checkSessionLoginPage() {
        if ( $this->sess->checkSession("user_id")==true ) {
            if ($this->sess->get("privil")=="admin") {
                redirect("/source_code/admin/admin.php");
            } else {
                redirect("/source_code/sample.php");
            }
        }
    }

    public function requireLogin() {
        if ($this->sess->checkSession("user_id")== false ) {
            redirect("/source_code/login.php");
        }
    }
}

?>