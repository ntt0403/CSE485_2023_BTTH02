<?php
    session_start(); 
    require_once('../config/DBConnection.php');

    if(isset($_POST['dangnhap'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == 'admin' && $password == '1234@@') {
            $_SESSION['role'] = 'admin';
            header('Location: ../view/admin_indexView.php');
            exit;
        } elseif ($username == 'user1' && $password == '1234@') {
            $_SESSION['role'] = 'user'; 
            header('Location: ../../public/index.php'); 
            exit;
        } elseif ($username == 'user2' && $password == '1234@') {
            $_SESSION['role'] = 'user';
            header('Location: ../../public/index.php');
            exit;
        } else {
            echo '<div class="alert alert-danger" role="alert"> Tài khoản hoặc mật khẩu sai! </div>';
        }
    }
?>
