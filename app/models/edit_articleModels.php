<?php
class YourModelName {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getArticleById($ma_bviet) {
        $sql = "SELECT * FROM baiviet WHERE ma_bviet = :ma_bviet";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['ma_bviet' => $ma_bviet]);
        return $stmt->fetch();
    }
}
?>