<?php
    //include ('connect.php');
    if(isset($_POST['dangnhap'])){
        echo 'Đăng nhập đã được kích hoạt';
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == 'admin' && $password == '1234@@') {
            header('Location: admin/index.php?role=admin'); // Thêm tham số role
            exit;
        } elseif ($username == 'user1' && $password == '1234@') {
            header('Location: index.php?role=user'); // Thêm tham số role
            exit;
        } elseif ($username == 'user2' && $password == '1234@') {
            header('Location: index.php?role=user'); // Thêm tham số role
            exit;
        } else {
            echo '<div class="alert alert-danger" role="alert"> Tài khoản hoặc mật khẩu sai! </div>';
        }
    }
?>