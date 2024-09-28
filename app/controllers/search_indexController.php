<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["search"])) {
                $search = $_POST["search"];
                
                if ($search === "Cây, lá và gió") {
                    header("Location: ../view/detail.php?song=cayvagio");
                    exit();
                } 
                elseif ($search === 'Cuộc sống mến thương') {
                    header("Location: ../view/detail.php?song=cuocsongmenthuong");
                    exit();
                } 
                elseif ($search === 'Lòng mẹ') {
                    header("Location: ../view/detail.php?song=longme");
                    exit();
                }
                elseif ($search === 'Phôi pha') {
                    header("Location: ../view/detail.php?song=phoipha");
                    exit();
                } 
                elseif ($search === 'Nơi tình yêu bắt đầu') {
                    header("Location: ../view/detail.php?song=noitinhyeubatdau");
                    exit();
                } 
                else {
                    echo "Không tìm thấy nội dung.";
                }
            }
        }
    }      
?>
