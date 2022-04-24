<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/source_code/handler/includeHandler.php");
    $loginHandler->checkLogin();
    $loginHandler->logout();
?>

 
