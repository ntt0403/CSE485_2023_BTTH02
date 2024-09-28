<?php
class add_authorModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllAuthors() {
        $sql = "SELECT * FROM tacgia";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ); 
    }

    public function getAuthorById($ma_tgia) {
        $sql = "SELECT * FROM tacgia WHERE ma_tgia = :ma_tgia";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['ma_tgia' => $ma_tgia]);
        return $stmt->fetch(PDO::FETCH_OBJ); 
    }

    public function updateAuthor($ma_tgia, $ten_tgia) {
        $sql = "UPDATE tacgia SET ten_tgia = :ten_tgia WHERE ma_tgia = :ma_tgia";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'ten_tgia' => $ten_tgia,
            'ma_tgia' => $ma_tgia
        ]);
    }
}
?>
