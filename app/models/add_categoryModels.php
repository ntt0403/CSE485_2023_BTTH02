<?php
class add_categoryModels {
    // Thuộc tính
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllCategories() {
        $sql = "SELECT * FROM theloai";
        $stmt = $this->pdo->query($sql);
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC); // Lấy kết quả dưới dạng mảng liên kết

        // Chuyển đổi sang đối tượng
        $categoriesArray = [];
        foreach ($categories as $category) {
            $categoriesArray[] = (object) $category; // Chuyển đổi mảng liên kết thành đối tượng
        }

        return $categoriesArray; // Trả về mảng các đối tượng
    }
}

?>