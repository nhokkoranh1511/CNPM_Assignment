<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path . "/macro/includemacro.php");
?>

<?php

    $user = new UserDB();
    $user->delete_user_by_id($_GET['id']);
    redirect("/admin/user-management.php");
?>