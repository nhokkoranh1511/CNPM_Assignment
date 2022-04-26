<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path . "/macro/includemacro.php");
?>

<?php
    $user = new UserDB();
    echo $_POST['username'];
    $user->update_user_by_id($_GET['id'], "username", $_REQUEST['username']);
?>