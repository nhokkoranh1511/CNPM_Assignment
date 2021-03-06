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
        $this->sess->init();
    }

    public function login($username, $password)
    {
        
        $result = $this->userdb->select_user_by_name($username);

        if ($result == false) {
            $this->loginUI->warningBox("Tên đăng nhập hoặc mật khẩu sai");
            return;
        }

        if ($result['password'] != $password) {
            $this->loginUI->warningBox("Tên đăng nhập hoặc mật khẩu sai");
            return;
        }

        $this->sess -> set("user_id", $result['id']);
        $this->sess -> set("privil",$result['privil']);

    }

    public function signup($username, $password,$repass,$full_name,$email)
    {
        $valid = true;
        if (!checkValidUserName($username)) {
            $valid = false;
            //UI
            $this->loginUI->warningBox("Tên tài khoản phải có 5-20 kí tự và không chứa kí tự đặc biệt");
            echo "<br>";
        }

        if ( $this->userdb->select_user_by_name($username)!= false) {
            $valid = false;
            //UI
            $this->loginUI->warningBox("Tên tài khoản đã tồn tại");
            echo "<br>";
        }

        if (!checkValidPassword($password)) {
            $valid = false;
            // UI
            $this->loginUI->warningBox("Mật khẩu phải hơn 4 kí tự");
            echo "<br>";
        }

        if ($password!= $repass) {
            $valid = false;
            $this->loginUI->warningBox("Mật khẩu không khớp");
            echo "<br>";
            // UI
        }

        if (!checkValidFullName($full_name)) {
            $valid = false;

            $this->loginUI->warningBox("Tên đầy đủ chỉ được chứa kí tự A-Z và khoảng trắng");
            echo "<br>";
            
            // UI
        }

        if (!checkValidEmail($email)) {
            $valid = false;
            // UI
            $this->loginUI->warningBox("Email không hợp lệ");
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
        if ( $this->sess->checkSession("user_id")==true ) {
            
            if ($this->sess->get("privil")=="admin") {
                redirect("/admin/admin.php");
            } else {
                redirect("/food-menu.php");
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