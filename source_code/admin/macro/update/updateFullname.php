<?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path . "/macro/includemacro.php");
?>

<?php
    $user = new UserDB();
    echo $_POST['full_name'];
    $user->update_user_by_id($_GET['id'], "full_name", $_REQUEST['full_name']);
?>