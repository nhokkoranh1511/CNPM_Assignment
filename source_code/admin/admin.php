<?php 
    include('partial/header.php')
?>

<div class="container">
    <h1>
        Tài khoản Admin
    </h1>
</div>

<div class="container">
    <button type="button" class="btn btn-secondary" onclick="window.location.href='add-user.php';">Thêm tài khoản</button>
</div>


<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Họ và tên</th>
                <th scope="col">username</th>
                <th scope="col">password</th>
                <th scope="col">Quyền</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                    <button type="button" class="btn btn-danger">Xóa</button>
                    <button type="button" class="btn btn-secondary">Thay đổi</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>












<?php 
    include('partial/footer.php')
?>