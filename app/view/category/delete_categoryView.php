<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>

<?php
    require_once('../../config/DBConnection.php');
    require_once('../../models/add_categoryModels.php');

    $dbConn = new DBConnection();
    $pdo = $dbConn->getConnection();

    $ma_tloai= $_GET['ma_tloai'];

    $categoryModel = new add_categoryModels($pdo);

    $category = $categoryModel->getCategoryById($ma_tloai);
?>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="article.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container mt-5">
        <h2 class="text-center text-danger">Xóa thông tin thể loại</h2>
        <form action="../../controllers/delete_categoryController.php" method="post">
            <div class="mb-3">
                <label for="ma_tloai" class="form-label">Mã thể loại</label>
                <input type="number" class="form-control col-10" name="ma_tloai" value="<?php echo htmlspecialchars($category->ma_tloai); ?>" readonly>
                </div>
            <div class="mb-3">
                <label for="ten_tloai" class="form-label">Tên thể loại</label>
                <input type="text" class="form-control col-10" name="ten_tloai" value="<?php echo htmlspecialchars($category->ten_tloai); ?>" required>
                </div>
           
            <button type="submit" name="xoa_tl" class="btn btn-primary">Xóa</button>
            <a href="category.php" class="btn btn-warning">Quay lại</a>
        </form>
    </div>
    
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>