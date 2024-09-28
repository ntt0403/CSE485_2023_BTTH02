<?php
    require_once('../config/DBConnection.php');

    // Lấy danh sách bài viết
    function getAllArticles($pdo) {
        $sql = "SELECT * FROM baiviet";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll();
    }

    if (isset($_POST['Thêm'])) {
        // Lấy dữ liệu từ biểu mẫu
        $ma_bviet = $_POST['txtMaBViet'];
        $tieude = $_POST['txtTieuDe'];
        $ten_bhat = $_POST['txtTenBhat'];
        $ma_tloai = $_POST['txtMaTLoai'];
        $tomtat = $_POST['txtTomTat'];
        //$noidung = $_POST['noidung'];
        $ma_tgia = $_POST['txtMaTGia'];
        $ngayviet = $_POST['ngayviet'];
    
        // Xử lý upload hình ảnh
       //$hinhanh = $_FILES['hinhanh'];
        //$hinhanh_path = 'uploads/' . basename($hinhanh['name']);
        //move_uploaded_file($hinhanh['tmp_name'], $hinhanh_path);
    
        // Chuẩn bị câu lệnh SQL
        if (empty($ma_bviet) || empty($tieude) || empty($ten_bhat) || empty($ma_tloai) || empty($tomtat) || empty($ma_tgia) || empty($ngayviet)) {
            echo "Vui lòng nhập đầy đủ thông tin!";
        } else {
            // Kết nối đến cơ sở dữ liệu
            $dbConn = new DBConnection();
            $pdo = $dbConn->getConnection();

            $sql = "INSERT INTO baiviet (ma_bviet, tieude, ten_bhat, ma_tloai, tomtat,/* noidung,*/ ma_tgia, ngayviet/*, hinhanh*/) VALUES (:ma_bviet, :tieude, :ten_bhat, :ma_tloai, :tomtat/*, :noidung*/, :ma_tgia, :ngayviet/*, :hinhanh*/)";
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
            // Thực thi câu lệnh
            header("Location: ../view/article/articleView.php");
            exit;
        }
    }
    // Lấy danh sách thể loại để hiển thị
    try {
    $dbConn = new DBConnection();
    $pdo = $dbConn->getConnection();
    $articles = getAllArticles($pdo);
    } catch (PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
    }
?>
?>