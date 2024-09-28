<?php
function getSongByCode($songCode) {
    $songs = [
        'cayvagio' => [
            'title' => 'Cây, lá và gió',
            'genre' => 'Nhạc trữ tình',
            'summary' => "Em và anh, hai đứa quen nhau thật tình cờ. Lời hát của anh từ bài hát “Cây và gió” đã làm tâm hồn em xao động. Nhưng sự thật phũ phàng rằng em chưa bao giờ nói cho anh biết những suy nghĩ tận sâu trong tim mình. Bởi vì em nhút nhát, em không dám đối mặt với thực tế khắc nghiệt, hay thực ra em không dám đối diện với chính mình.",
            'content' => "Em và anh, hai đứa quen nhau thật tình cờ. Lời hát của anh từ bài hát “Cây và gió” đã làm tâm hồn em xao động. Nhưng sự thật phũ phàng rằng em chưa bao giờ nói cho anh biết những suy nghĩ tận sâu trong tim mình. Bởi vì em nhút nhát, em không dám đối mặt với thực tế khắc nghiệt, hay thực ra em không dám đối diện với chính mình.",
            'author' => 'Nguyễn Văn Giả',
            'image' => '../../public/images/songs/cayvagio.jpg'
        ],
    ];

    return isset($songs[$songCode]) ? $songs[$songCode] : null;
}


function getSongById($id) {
    global $pdo; 
    $stmt = $pdo->prepare("SELECT * FROM songs WHERE id = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
