<?php 
    include('partial/partial.php');
    $path = $_SERVER['DOCUMENT_ROOT'];
    include_once($path."/macro/userdb.php");
?>

<?php addHeader("Quản lý người dùng"); ?>

<div class="container">
    <h1>
        Quản lý người dùng
    </h1>
</div>

<div class="container">
    <button type="button" class="btn btn-secondary" onclick="window.location.href='add-user.php';">Thêm tài khoản</button>
</div>

<div class="container">
<?php
    $user = new UserDB();
    $result = $user->get_user_list_by_privil_query("admin", "id", "ASC");

    echo $user->table_for_user_managesment($result);

?>
</div>


<?php addFooter(); ?>