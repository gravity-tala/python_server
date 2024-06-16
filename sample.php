<?php

define('WP_DEBUG', true);

// DBへ接続
$mysqli = new mysqli('localhost', 'root', '', 'test');
if(!$mysqli){
    die("データベースの接続に失敗しました");
}

if ($mysqli->connect_error) {
    echo $mysqli->connect_error;
    exit();
} else {
    $mysqli->set_charset("utf8");
}

// ここにDB処理いろいろ書く（後述）

// 完成済みのSELECT文を実行する
$sql = "SELECT * FROM test.sample";
if ($result = $mysqli->query($sql)) {
    // 連想配列を取得
    while ($row = $result->fetch_assoc()) {
        echo $row["id"] . $row["name"] . $row["user"] ."<br>";
    }
    // 結果セットを閉じる
    $result->close();
}

// DB接続を閉じる
$mysqli->close();

?>