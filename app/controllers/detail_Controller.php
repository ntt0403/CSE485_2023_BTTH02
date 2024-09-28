<?php
require_once '../models/Detail_Models.php';

$songCode = isset($_GET['song']) ? $_GET['song'] : null;

if ($songCode === null) {
    echo "Mã bài hát không được cung cấp.";
    exit();
}

$song = getSongByCode($songCode);

if ($song === null) {
    echo "Không tìm thấy bài hát tương ứng.";
    exit();
}

