<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Tác Giả</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <?php
    require_once('../../config/DBConnection.php');
    require_once('../../models/add_articleModels.php');

    // Kết nối đến cơ sở dữ liệu
    $dbConn = new DBConnection();
    $pdo = $dbConn->getConnection();

    // Lấy mã bài viết từ query string
    $ma_bviet = $_GET['ma_bviet'];

    // Khởi tạo model
    $articleModel = new add_articleModels($pdo);

    // Lấy thông tin bài viết cần sửa
    $article = $articleModel->getArticleById($ma_bviet);
    ?>
    
    <main class="container mt-5">
        <h3 class="text-center">Sửa Bài Viết</h3>
        <form action="../../controllers/edit_articleController.php" method="post">
            <input type="hidden" name="ma_bviet" value="<?php echo htmlspecialchars($article->ma_bviet); ?>">
                    <!--<div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Mã bài viết</span>
                        <input type="text" class="form-control" name="txtMaBViet" required>
                    </div>-->

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tiêu đề</span>
                        <input type="text" class="form-control" name="txtTieuDe" value="<?php echo htmlspecialchars($article->tieude); ?>" required>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tên bài hát</span>
                        <input type="text" class="form-control" name="txtTenBhat" value="<?php echo htmlspecialchars($article->ten_bhat); ?>" required>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Mã thể loại</span>
                        <input type="text" class="form-control" name="txtMaTLoai" value="<?php echo htmlspecialchars($article->ma_tloai); ?>" required>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Tóm tắt</span>
                        <input type="text" class="form-control" name="txtTomTat" value="<?php echo htmlspecialchars($article->tomtat); ?>" required>
                    </div>

                    <!--<div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Nội dung</span>
                        <textarea class="form-control" name="txtNoiDung" required></textarea>
                    </div>-->

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Mã tác giả</span>
                        <input type="text" class="form-control" name="txtMaTGia" value="<?php echo htmlspecialchars($article->ma_tgia); ?>" required>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text">Ngày viết</span>
                        <input type="date" class="form-control" name="ngayviet" value="<?php echo htmlspecialchars($article->ngayviet); ?>" required>
                    </div>

                    <!--<div class="mb-3">
                        <span class="input-group-text">Hình ảnh</span>
                        <input type="file" class="form-control" name="hinhanh" accept="image/*" required>
                    </div>-->

                    <div class="form-group float-end">
                        <input type="submit" name="Sửa" value="Sửa" class="btn btn-success">
                        <a href="./articleView.php" class="btn btn-warning">Quay lại</a>
                    </div>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sh
    