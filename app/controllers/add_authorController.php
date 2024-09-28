<?php
require_once('../config/DBConnection.php');

// Lấy danh sách tác giả
function getAllAuthors($pdo) {
    $sql = "SELECT * FROM tacgia";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

// Kiểm tra xem có gửi form không
if (isset($_POST['Thêm'])) {
    $ten_tgia = $_POST['txtAuthorName'];  // Nhận tên tác giả từ form

    if ($ten_tgia == "") {
        echo "Vui lòng nhập vào Tên tác giả!";
    } else {
        try {
            // Kết nối đến cơ sở dữ liệu
            $dbConn = new DBConnection();
            $pdo = $dbConn->getConnection();

            // Lấy mã tác giả cao nhất
            $sql = "SELECT MAX(ma_tgia) AS max_ma_tgia FROM tacgia";
            $stmt = $pdo->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $new_ma_tgia = $result['max_ma_tgia'] + 1; // Tăng mã tác giả lên 1

            // Kiểm tra mã tác giả mới không bị trùng
            $checkQuery = "SELECT COUNT(*) FROM tacgia WHERE ma_tgia = :ma_tgia";
            $checkStmt = $pdo->prepare($checkQuery);
            $checkStmt->execute(['ma_tgia' => $new_ma_tgia]);

            if ($checkStmt->fetchColumn() > 0) {
                echo "Mã tác giả đã tồn tại, vui lòng chọn mã khác!";
            } else {
                // Thêm tác giả vào cơ sở dữ liệu với mã tác giả mới
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
