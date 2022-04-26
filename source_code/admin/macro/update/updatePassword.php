<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path . "/macro/includemacro.php");
?>

<?php
    $user = new UserDB();
    echo $_POST['password'];
    $user->update_user_by_id($_GET['id'], "password", $_REQUEST['password']);
?>