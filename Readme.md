# Webサーバについて

＊どちらも同じディレクトリで作業すること

Webサーバを立てるだけでは、phpは使えない

→phpは別途サーバ？を立てる必要がある

python -m http.server 8000

php -S localhost:8000

# DataBaseについて

コマンドでは、サーバを立てることはできないから

xamppでSQLサーバを立てるなり、VMWare・Oracle Virtual~を入れて仮想マシンでサーバを立てるかして

# phpでのMySQLとの接続

|id<br>int|name<br>varchar(30)|user<br>varchar(30)|
|:---:|:---:|:----:|
|1|takuya|No.1|

上のようなデータベースを使う

```php

<?php

// 何も書かないとたまにエラーが表示されないときがある
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

```

# 結果
![alt text](./image/image.png)