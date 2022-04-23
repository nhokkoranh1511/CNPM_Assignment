<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path."/source_code/macro/includemacro.php");
/**
 *Session Class
 **/
class Session
{

    public static function init()
    {
        if (version_compare(phpversion(), '5.4.0', '<')) {
            if (session_id() == '') {
                session_start();
            }
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
    }

    public static function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public static function checkSession()
    {
        self::init();
        if (self::get("user_id") == false) {
            self::destroy();
            redirect("/source_code/login.php");
        }
    }

    public static function checkLogin()
    {
        self::init();
        if (self::get("privil") == "admin") {
            redirect("/source_code/admin/admin.php");
        } else {
            if (self::get("privil") == "user") {
                redirect("/source_code/sample.php");
            }
        }
    }

    public static function destroy()
    {
        session_destroy();
    }
}
