<?php
require_once('../config/DBConnection.php');

// Lấy danh sách thể loại
function getAllCategories($pdo) {
    $sql = "SELECT * FROM theloai";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

// Kiểm tra xem có gửi form không
if (isset($_POST['Thêm'])) {
    $ten_tloai = $_POST['txtCatName']; 
    if ($ten_tloai == "") {
        echo "Vui lòng nhập vào Tên thể loại!";
    } else {
        try {
            // Kết nối đến cơ sở dữ liệu
            $dbConn = new DBConnection();
            $pdo = $dbConn->getConnection();

            // Thêm thể loại vào cơ sở dữ liệu
            $sql = "INSERT INTO theloai (ten_tloai) VALUES (:ten_tloai)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['ten_tloai' => $ten_tloai]);

            // Chuyển hướng về trang categoryView.php sau khi thêm thành công
            header("Location: ../view/category/categoryView.php");
            exit; 
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }   
}

// Lấy danh sách thể loại để hiển thị
try {
    $dbConn = new DBConnection();
    $pdo = $dbConn->getConnection();
    $categories = getAllCategories($pdo);
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>