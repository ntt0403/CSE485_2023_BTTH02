<?php
class DBConnection{
    private $host;
    private $user;
    private $pass;
    private $dbname;
    private $conn=null;

    public function __construct(){
         // B1. Kết nối DB Server
        $this->host = 'localhost';
        $this->user = 'root';
        $this->pass = '';
        $this->dbname = 'btth01_cse485';
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;port=3306", $this->user, $this->pass);
            //echo "Kết nối thành công!";
        } catch (PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }
    }
    public function getConnection(){
        return $this->conn;
    }
}