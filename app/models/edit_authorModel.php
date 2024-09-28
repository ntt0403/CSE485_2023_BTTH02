<?php
class YourModelName {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAuthorById($ma_tgia) {
        $sql = "SELECT * FROM tacgia WHERE ma_tgia = :ma_tgia";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['ma_tgia' => $ma_tgia]);
        return $stmt->fetch();
    }
}
?>

