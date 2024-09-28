<?php
class add_articleModels {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllArticles() {
        $sql = "SELECT * FROM baiviet";
        $stmt = $this->pdo->query($sql);
        $articles = $stmt->fetchAll(PDO::FETCH_ASSOC); 

       
        $articlesArray = [];
        foreach ($articles as $article) {
            $articlesArray[] = (object) $article; 
        }

        return $articlesArray; 
    }
    public function getArticleById($ma_bviet) {
        $sql = "SELECT * FROM baiviet WHERE ma_bviet = :ma_bviet";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':ma_bviet', $ma_bviet);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ); 
    }

}

?>