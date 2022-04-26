<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path . "/macro/includemacro.php");
?>

<?php
    $user = new UserDB();
    echo $_POST['email'];
    $user->update_user_by_id($_GET['id'], "email", $_REQUEST['email']);
?>