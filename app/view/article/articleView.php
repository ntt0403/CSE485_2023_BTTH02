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
require_once('../../models/add_articleModels.php');

// Kết nối đến cơ sở dữ liệu
$dbConn = new DBConnection();
$pdo = $dbConn->getConnection();

// Khởi tạo model
//$categoryModel = new add_categoryModels($pdo);
$articleModel = new add_articleModels($pdo);

if (isset($_GET['delete_ma_bviet'])) {
    $ma_bviet = $_GET['delete_ma_bviet'];

    $sql = "DELETE FROM baiviet WHERE ma_bviet = :ma_bviet";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':ma_bviet', $ma_bviet); // Liên kết biến

    // Thực thi câu lệnh
    if ($stmt->execute()) {
        header("Location: articleView.php");
        exit; // Dừng thực thi để tránh tiếp tục chạy mã
    } else {
        echo "Lỗi khi xóa bài viết.";
    }
}

// Lấy danh sách thể loại
$articles = $articleModel->getAllArticles();
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
                            <a class="nav-link" href="../../../public/index.php">Trang ngoài</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../category/categoryView.php">Thể loại</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../author/authorView.php">Tác giả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fw-bold" href="../article/articleView.php">Bài viết</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <a href="../article/add_articleView.php" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Tên bài hát</th>
                            <th scope="col">Mã thể loại</th>
                            <th scope="col">Tóm tắt</th>
                            <th scope="col">Mã tác giả</th>
                            <th scope="col">Ngày viết</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($articles as $index => $article) : ?>
                            <tr>
                                <th scope="row"><?php echo $index + 1; ?></th>
                                <td>
                                    <?php 
                                        echo htmlspecialchars($article->tieude); 
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo htmlspecialchars($article->ten_bhat); 
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo htmlspecialchars($article->ma_tloai); 
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo htmlspecialchars($article->tomtat); 
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo htmlspecialchars($article->ma_tgia); 
                                    ?>
                                </td>
                                <td>
                                    <?php 
                                        echo htmlspecialchars($article->ngayviet); 
                                    ?>
                                </td>
                                
                                <td>
                                    <a href="../article/edit_articleView.php?ma_bviet=<?php echo htmlspecialchars($article->ma_bviet); ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                </td>
                                <td>
                                    <a href="articleView.php?delete_ma_bviet=<?php echo htmlspecialchars($article->ma_bviet); ?>"><i class="fa-solid fa-trash"></i></a>
                                </td>
                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>