<?php
class YourModelName {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getCategoryById($ma_tloai) {
        $sql = "SELECT * FROM theloai WHERE ma_tloai = :ma_tloai";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['ma_tloai' => $ma_tloai]);
        return $stmt->fetch();
    }
}
?>

