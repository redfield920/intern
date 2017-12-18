<?php

//データベースの接続
   $dsn='データベース';

$user = 'ユーザー名';
$password = 'パスワード';



	// データベースと接続
        $pdo = new PDO($dsn, $user, $password);

	// テーブル作成のためのSQL
	$sql = "CREATE TABLE userdata (
	id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(50),
        password varchar(50)
)";
	// SQLクエリ実行
	$res = $pdo->query( $sql);
	var_dump($res);
?>