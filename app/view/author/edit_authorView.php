<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Tác Giả</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    require_once('../../config/DBConnection.php');
    require_once('../../models/add_authorModel.php');

    // Kết nối đến cơ sở dữ liệu
    $dbConn = new DBConnection();
    $pdo = $dbConn->getConnection();

    // Khởi tạo model
    $authorModel = new add_authorModel($pdo);

    // Lấy mã tác giả từ URL
    $ma_tgia = isset($_GET['ma_tgia']) ? $_GET['ma_tgia'] : null;

    // Lấy thông tin tác giả theo mã
    if ($ma_tgia) {
        $author = $authorModel->getAuthorById($ma_tgia);
    } else {
        echo "Không tìm thấy tác giả.";
        exit;
    }
    ?>

    <div class="container mt-5">
        <h3 class="text-center">Chỉnh Sửa Tác Giả</h3>
        <form action="../../controllers/edit_authorController.php" method="post">
            <input type="hidden" name="ma_tgia" value="<?php echo htmlspecialchars($author->ma_tgia); ?>">
            <div class="mb-3">
                <label for="txtAuthorName" class="form-label">Tên Tác Giả</label>
                <input type="text" class="form-control" name="txtAuthorName" value="<?php echo htmlspecialchars($author->ten_tgia); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="../author/authorView.php" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
</body>
</html>
