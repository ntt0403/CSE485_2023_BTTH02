<?php
require_once('../config/DBConnection.php');

function getAllAuthors($pdo) {
    $sql = "SELECT * FROM tacgia";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

if (isset($_POST['Thêm'])) {
    $ten_tgia = $_POST['txtAuthorName'];  

    if ($ten_tgia == "") {
        echo "Vui lòng nhập vào Tên tác giả!";
    } else {
        try {
            $dbConn = new DBConnection();
            $pdo = $dbConn->getConnection();

            $sql = "SELECT MAX(ma_tgia) AS max_ma_tgia FROM tacgia";
            $stmt = $pdo->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $new_ma_tgia = $result['max_ma_tgia'] + 1; 

            
            $checkQuery = "SELECT COUNT(*) FROM tacgia WHERE ma_tgia = :ma_tgia";
            $checkStmt = $pdo->prepare($checkQuery);
            $checkStmt->execute(['ma_tgia' => $new_ma_tgia]);

            if ($checkStmt->fetchColumn() > 0) {
                echo "Mã tác giả đã tồn tại, vui lòng chọn mã khác!";
            } else {
               
                $sql = "INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (:ma_tgia, :ten_tgia)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    'ma_tgia' => $new_ma_tgia,
                    'ten_tgia' => $ten_tgia
                ]);

                // Chuyển hướng về trang sau khi thêm thành công
                header("Location: ../view/author/authorView.php");
                exit; 
            }
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }   
}

// Lấy danh sách tác giả để hiển thị
try {
    $dbConn = new DBConnection();
    $pdo = $dbConn->getConnection();
    $authors = getAllAuthors($pdo);
} catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}
?>
