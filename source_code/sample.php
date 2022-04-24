<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/source_code/handler/includeHandler.php");
    
    $loginHandler -> requireLogin();
    $userHandler -> include();

    $userHandler -> hello();

    
    
?>

<button type="submit" onclick="window.location.href='/source_code/logout.php'">Logout</button> 