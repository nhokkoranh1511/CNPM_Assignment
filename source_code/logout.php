<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/handler/includeHandler.php");
    $loginHandler->checkLogin();
    $loginHandler->logout();
?>

