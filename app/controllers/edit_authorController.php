<?php
require_once('../config/DBConnection.php');

if (isset($_POST['Sửa'])) {
    $ma_tgia = $_POST['ma_tgia'];
    $ten_tgia = $_POST['ten_tgia'];

    if ($ma_tgia == "" || $ten_tgia == "") {
        echo "Vui lòng nhập vào đầy đủ thông tin!";
    } else {
        try {
            $dbConn = new DBConnection();
            $pdo = $dbConn->getConnection();

            $sql = "UPDATE tacgia SET ten_tgia = :ten_tgia WHERE ma_tgia = :ma_tgia";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'ten_tgia' => $ten_tgia,
                'ma_tgia' => $ma_tgia
            ]);

            header("Location: ../view/author/authorView.php");
            exit; 
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
?>
