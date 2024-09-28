<?php
require_once('../config/DBConnection.php');

function getAllCategories($pdo) {
    $sql = "SELECT * FROM theloai";
    $stmt = $pdo->query($sql);
    $categories = $stmt->fetchAll();
}

if (isset($_POST['Thêm'])) {
    $ten_tloai = $_POST['txtCatName']; 
    if ($ten_tloai == "") {
        echo "Vui lòng nhập vào Tên thể loại!";
    } else {
        try {
            $dbConn = new DBConnection();
            $pdo = $dbConn->getConnection();

            $sql = "INSERT INTO theloai (ten_tloai) VALUES (:ten_tloai)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['ten_tloai' => $ten_tloai]);

            header("Location: ../view/category/categoryView.php");
            exit; 
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }   
}

try {
    $dbConn = new DBConnection();
    $pdo = $dbConn->getConnection();
    $categories = getAllCategories($pdo);
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>