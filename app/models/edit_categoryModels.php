<?php
// class edit_categoryModels {
//     // Thuộc tính
//     private $pdo;
//     private $ma_tloai;

//     // Constructor
//     public function __construct($pdo, $ma_tloai) {
//         $this->pdo = $pdo;
//         $this->ma_tloai = $ma_tloai;
//     }

//     // Phương thức để lấy thể loại theo mã
//     public function getCategory() {
//         $sql = "SELECT * FROM theloai WHERE ma_tloai = :ma_tloai";
//         $stmt = $this->pdo->prepare($sql);
//         $stmt->execute(['ma_tloai' => $this->ma_tloai]);
//         $category = $stmt->fetch(PDO::FETCH_ASSOC);

//         return $category ? (object) $category : null; // Trả về đối tượng thể loại hoặc null nếu không tìm thấy
//     }

//     // Phương thức cập nhật thể loại
//     public function updateCategory($ten_tloai) {
//         $sql = "UPDATE theloai SET ten_tloai = :ten_tloai WHERE ma_tloai = :ma_tloai";
//         $stmt = $this->pdo->prepare($sql);
//         $stmt->execute([
//             'ten_tloai' => $ten_tloai,
//             'ma_tloai' => $this->ma_tloai
//         ]);
//     }

//     // Getter cho mã thể loại
//     public function getMaTloai() {
//         return $this->ma_tloai;
//     }
// }
public function getCategory($ma_tloai) {
    $sql = "SELECT * FROM theloai WHERE ma_tloai = :ma_tloai";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':ma_tloai', $ma_tloai, PDO::PARAM_INT);
    $stmt->execute();

    $category = $stmt->fetch(PDO::FETCH_ASSOC);
    return (object) $category; // Chuyển đổi sang đối tượng
}

?>
