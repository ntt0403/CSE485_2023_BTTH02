<?php
require_once('../config/DBConnection.php');

// Lấy kết nối PDO
$db = new DBConnection();
$pdo = $db->getConnection();
// Đếm số lượng thể loại
$sql_theloai = "SELECT COUNT(ma_tloai) AS count_theloai FROM theloai";
$stmt_theloai = $pdo->query($sql_theloai);
$count_theloai = $stmt_theloai->fetch()['count_theloai'];

// Đếm số lượng tác giả
$sql_tacgia = "SELECT COUNT(ma_tgia) AS count_tacgia FROM tacgia";
$stmt_tacgia = $pdo->query($sql_tacgia);
$count_tacgia = $stmt_tacgia->fetch()['count_tacgia'];

// Đếm số lượng bài viết
$sql_baiviet = "SELECT COUNT(ma_bviet) AS count_baiviet FROM baiviet";
$stmt_baiviet = $pdo->query($sql_baiviet);
$count_baiviet = $stmt_baiviet->fetch()['count_baiviet'];

// Nếu cần thêm số lượng người dùng, tiếp tục thực hiện tương tự với bảng users (nếu có).
$sql_users = "SELECT COUNT(id) AS count_users FROM users WHERE role = 'user'";
$stmt_users = $pdo->query($sql_users);
$count_users = $stmt_users->fetch()['count_users'];
?>