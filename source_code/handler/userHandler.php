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
            $this->loginUI->warningBox("Mật khẩu cũ không chính xác");
            return false;
        }

        if (!checkValidPassword($password)) {
            $this->loginUI->warningBox("Mật khẩu mới không hợp lệ");
            return false;
        }

        if ($password!=$repassword) {
            $this->loginUI->warningBox("Mật khẩu nhập lại không khớp");
            return false;
        }
        
        $result = $this->userdb->update_user_by_id( $this->loggedUser['id'],"password",$password);
        if ($result == false) {
            $this->loginUI->warningBox("Có lỗi xảy ra");
            return false;
        }
        $this->loginUI->successBox("Đổi mật khẩu thành công");
        return true;
    }

    public function changeEmail($email) {
        if (!checkValidEmail($email)) {
            $this->loginUI->warningBox("Email không hợp lệ");
            return false;
        }
        
        $result = $this->userdb->update_user_by_id( $this->loggedUser['id'],"email",$email);
        if ($result == false) {
            $this->loginUI->warningBox("Có lỗi xảy ra");
            return false;
        }
        return true;
        $this->loginUI->successBox("Đổi Email thành công");
    }

    public function changeFullName($full_name) {
        if (!checkValidFullName($full_name)) {
            $this->loginUI->warningBox("Tên chỉ được chứa kí tự A-Z và khoảng trắng");
            return false;
        }
        
        $result = $this->userdb->update_user_by_id( $this->loggedUser['id'],"full_name",$full_name);
        if ($result == false) {
            $this->loginUI->warningBox("Có lỗi xảy ra");
            return false;
        }
        $this->loginUI->successBox("Đổi tên thành công");
        return true;

    }

}

?>