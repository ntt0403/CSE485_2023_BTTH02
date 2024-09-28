<?php
class add_articleModels {
    // Thuộc tính
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllArticles() {
        $sql = "SELECT * FROM baiviet";
        $stmt = $this->pdo->query($sql);
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC); // Lấy kết quả dưới dạng mảng liên kết

        // Chuyển đổi sang đối tượng
        $articlesArray = [];
        foreach ($articles as $article) {
            $articlesArray[] = (object) $article; // Chuyển đổi mảng liên kết thành đối tượng
        }

        return $articlesArray; // Trả về mảng các đối tượng
    }
    public function getArticleById($ma_bviet) {
        $sql = "SELECT * FROM baiviet WHERE ma_bviet = :ma_bviet";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ma_bviet', $ma_bviet);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ); // Hoặc PDO::FETCH_ASSOC tùy vào cách bạn muốn lấy kết quả
    }

}

?>