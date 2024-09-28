<?php
class SongController {
    public function displaySong($songName) {
        switch ($songName) {
            case 'cayvagio':
                $songTitle = "Cây, lá và gió";
                $songGenre = "Nhạc trữ tình";
                $songSummary = "Tóm tắt bài hát Cây và gió...";
                $songContent = "Nội dung bài hát...";
                $songAuthor = "Nguyễn Văn Giả";
                $songImage = "images/songs/cayvagio.jpg";
                break;

            default:
                $songTitle = "Không tìm thấy bài hát";
                $songGenre = "";
                $songSummary = "";
                $songContent = "";
                $songAuthor = "";
                $songImage = "images/default.jpg";
                break;
        }

        // Xuất dữ liệu bài hát ra trình duyệt (có thể dùng echo)
        echo "
        <div class='row'>
            <div class='col-sm-4'>
                <img src='$songImage' class='img-fluid' alt='Bài hát'>
            </div>
            <div class='col-sm-8'>
                <h5>$songTitle</h5>
                <p>Thể loại: $songGenre</p>
                <p>Tóm tắt: $songSummary</p>
                <p>Nội dung: $songContent</p>
                <p>Tác giả: $songAuthor</p>
            </div>
        </div>";
    }
}
?>
