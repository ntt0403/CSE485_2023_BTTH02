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
    require_once('../../models/add_authorModel.php');

    $dbConn = new DBConnection();
    $pdo = $dbConn->getConnection();

    $ma_tgia = $_GET['ma_tgia'];

    $authorModel = new add_authorModel($pdo);
    $author = $authorModel->getAuthorById($ma_tgia);
    ?>
    
    <main class="container mt-5">
        <h3 class="text-center">Sửa Tác Giả</h3>
        <form action="../../controllers/edit_authorController.php" method="post">
            <input type="hidden" name="ma_tgia" value="<?php echo htmlspecialchars($author->ma_tgia); ?>">
            <div class="mb-3">
                <label for="ten_tgia" class="form-label">Tên Tác Giả</label>
                <input type="text" class="form-control" name="ten_tgia" value="<?php echo htmlspecialchars($author->ten_tgia); ?>" required>
            </div>
            <div class="form-group float-end">
                <input type="submit" name="Sửa" value="Sửa" class="btn btn-primary">
                <a href="../author/authorView.php" class="btn btn-warning">Quay lại</a>
            </div>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sh
    