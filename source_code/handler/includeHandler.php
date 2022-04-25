<?php
$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path."/handler/loginHandler.php");
include_once($path."/handler/userHandler.php");
include_once($path."/handler/orderHandler.php");
include_once($path."/handler/foodHandler.php");

$loginHandler = new LoginHandler;
$userHandler = new UserHandler;
$orderHandler = new OrderHandler;
$foodHandler = new FoodHandler;
?>