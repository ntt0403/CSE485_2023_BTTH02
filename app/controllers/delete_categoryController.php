<?php
require_once('../config/DBConnection.php');

if (isset($_POST['xoa_tl'])) {
    $ma_tloai = $_POST['ma_tloai'];
    $ten_tloai= $_POST['ten_tloai'];

    if ($ma_tloai == "" || $ten_tloai== "") {
        echo "Vui lòng nhập vào đầy đủ thông tin!";
    } else {
        try {
            $dbConn = new DBConnection();
            $pdo = $dbConn->getConnection();

            $sql = "DELETE FROM theloai WHERE ma_tloai = :ma_tloai";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'ma_tloai' => $ma_tloai
            ]);
            header("Location: ../view/category/categoryView.php");
            exit; 
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
?>
