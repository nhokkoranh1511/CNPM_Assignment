<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path."/source_code/handler/loginHandler.php");
include_once($path."/source_code/handler/userHandler.php");

$loginHandler = new LoginHandler;
$userHandler = new UserHandler;
?>