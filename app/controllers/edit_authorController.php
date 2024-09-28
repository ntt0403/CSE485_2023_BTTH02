<?php
require_once('../config/DBConnection.php');

// Kiểm tra xem có gửi form không
if (isset($_POST['Sửa'])) {
    $ma_tgia = $_POST['ma_tgia'];
    $ten_tgia = $_POST['ten_tgia'];

    if ($ma_tgia == "" || $ten_tgia == "") {
        echo "Vui lòng nhập vào đầy đủ thông tin!";
    } else {
        try {
            // Kết nối đến cơ sở dữ liệu
            $dbConn = new DBConnection();
            $pdo = $dbConn->getConnection();

            // Cập nhật thông tin tác giả
            $sql = "UPDATE tacgia SET ten_tgia = :ten_tgia WHERE ma_tgia = :ma_tgia";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'ten_tgia' => $ten_tgia,
                'ma_tgia' => $ma_tgia
            ]);

            // Chuyển hướng về trang sau khi sửa thành công
            header("Location: ../view/author/authorView.php");
            exit; 
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
?>
