<?php
require_once('../config/DBConnection.php');
require_once('../models/edit_categoryModels.php'); // Đảm bảo rằng file models này đã tồn tại

$dbConn = new DBConnection();
$pdo = $dbConn->getConnection();

if (isset($_GET['ma_tloai'])) {
    $ma_tloai = $_GET['ma_tloai']; 

    // Tạo đối tượng edit_categoryModels
    $editCategoryModel = new edit_categoryModels($pdo, $ma_tloai);
    $category = $editCategoryModel->getCategory();

    if (!$category) {
        echo "Thể loại không tồn tại!";
        exit;
    }

    if (isset($_POST['Luu_lai'])) {
        $ten_tloai = $_POST['ten_tloai'];

        if (empty($ten_tloai)) {
            echo "Vui lòng nhập tên thể loại!";
        } else {
            // Cập nhật thể loại
            $editCategoryModel->updateCategory($ten_tloai);
            header("Location: ../view/category/categoryView.php");
            exit;
        }
    }
} else {
    echo "Mã thể loại không được cung cấp!";
}
?>
