<?php
class add_categoryModels {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllCategories() {
        $sql = "SELECT * FROM theloai";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ); 
    }

    public function getCategoryById($ma_tloai) {
        $sql = "SELECT * FROM theloai WHERE ma_tloai = :ma_tloai";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['ma_tloai' => $ma_tloai]);
        return $stmt->fetch(PDO::FETCH_OBJ); 
    }

    public function updateCategory($ma_tloai, $ten_tloai) {
        $sql = "UPDATE theloai SET ten_tloai = :ten_tloai WHERE ma_tloai = :ma_tloai";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'ten_tloai' => $ten_tloai,
            'ma_tloai' => $ma_tloai
        ]);
    }
    public function deleteCategory($ma_tloai) {
        $sql = "DELETE FROM theloai WHERE ma_tloai = :ma_tloai";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['ma_tloai' => $ma_tloai]);
    }    
    
}
?>
