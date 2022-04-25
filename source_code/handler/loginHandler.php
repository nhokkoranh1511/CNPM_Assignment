<?php

$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . "/macro/includemacro.php");
include_once($path . "/ui/includeUI.php");


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
        $this->sess-> init();
        $this->sess -> set("user_id", $result['id']);
        $this->sess -> set("privil",$result['privil']);

    }

    public function signup($username, $password,$repass,$full_name,$email)
    {
        $valid = true;
        if (!checkValidUserName($username)) {
            $valid = false;
            //UI
            $this->loginUI->warningBox("Invalid Username");
            echo "<br>";
        }

        if ( $this->userdb->select_user_by_name($username)!= false) {
            $valid = false;
            //UI
            $this->loginUI->warningBox("Username exist");
            echo "<br>";
        }

        if (!checkValidPassword($password)) {
            $valid = false;
            // UI
            $this->loginUI->warningBox("Invalid Password");
            echo "<br>";
        }

        if ($password!= $repass) {
            $valid = false;
            $this->loginUI->warningBox("Repassword didnt match");
            echo "<br>";
            // UI
        }

        if (!checkValidFullName($full_name)) {
            $valid = false;

            $this->loginUI->warningBox("Invalid fullname");
            echo "<br>";
            
            // UI
        }

        if (!checkValidEmail($email)) {
            $valid = false;
            // UI
            $this->loginUI->warningBox("Invalid email");
            echo "<br>";
        }

        if ($valid==true) {
            $result = $this->userdb->insert_user($username,$password,$full_name,"customer",$email);
            if ($result == false) {
                // UI: unexpected error.
            } else {
                $this->login($username,$password);
            }
        }
    }

    public function checkSessionLoginPage() {// redirect khoi login.php khi da dang nhap roi
        $this->sess-> init();
        if ( $this->sess->checkSession("user_id")==true ) {
            
            if ($this->sess->get("privil")=="admin") {
                redirect("/admin/admin.php");
            } else {
                redirect("/user-menu.php");
            }
        }
    }

    public function checkLogin() { // false khi chua dang nhap, true neu dang nhap roi.
        if ($this->sess->checkSession("user_id")== false ) {
            return false;
        } else {
            return true;
        }
    }

    public function logout(){
        $this->sess->destroy();
        redirect("/login.php");
    }
}

?>