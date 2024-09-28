<?php
require_once('../config/DBConnection.php');

if (isset($_POST['Sửa'])) {
    $ma_bviet = $_POST['ma_bviet'];
    $tieude = $_POST['txtTieuDe'];
    $ten_bhat = $_POST['txtTenBhat'];
    $ma_tloai = $_POST['txtMaTLoai'];
    $tomtat = $_POST['txtTomTat'];
    //$noidung = $_POST['noidung'];
    $ma_tgia = $_POST['txtMaTGia'];
    $ngayviet = $_POST['ngayviet'];


    if (empty($ma_bviet) || empty($tieude) || empty($ten_bhat) || empty($ma_tloai) || empty($tomtat) || empty($ma_tgia) || empty($ngayviet)) {
        echo "Vui lòng nhập vào đầy đủ thông tin!";
    } else {
        try {
            // Kết nối đến cơ sở dữ liệu
            $dbConn = new DBConnection();
            $pdo = $dbConn->getConnection();

            $sql = "UPDATE baiviet SET tieude = :tieude, ten_bhat= :ten_bhat, ma_tloai = :ma_tloai, tomtat = :tomtat, ma_tgia = :ma_tgia, ngayviet = :ngayviet WHERE ma_bviet = :ma_bviet";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':ma_bviet' => $ma_bviet,
                ':tieude' => $tieude,
                ':ten_bhat' => $ten_bhat,
                ':ma_tloai' => $ma_tloai,
                ':tomtat' => $tomtat,
                ':ma_tgia' => $ma_tgia,
                ':ngayviet' => $ngayviet,
            ]);

            // Chuyển hướng về trang sau khi sửa thành công
            header("Location: ../view/article/articleView.php");
            exit; 
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
?>