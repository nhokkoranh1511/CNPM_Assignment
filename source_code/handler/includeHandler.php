<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path."/handler/loginHandler.php");
include_once($path."/handler/userHandler.php");
include_once($path."/handler/orderHandler.php");

$loginHandler = new LoginHandler;
$userHandler = new UserHandler;
$orderHandler = new OrderHandler;
?>