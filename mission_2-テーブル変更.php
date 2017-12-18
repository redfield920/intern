<?php

//データベースの接続
   $dsn='データベース';

$user = 'ユーザー名';
$password = 'パスワード';



	// データベースと接続
        $pdo = new PDO($dsn, $user, $password);

	// テーブル変更のためのSQL
	$sql = "ALTER TABLE mission change time time datetime";
	$sql = "ALTER TABLE mission drop column id";
	$sql = "ALTER TABLE mission add id int(11) primary key not null auto_increment first ->index(id) ->auto_increment = 1";
	
	$res = $pdo->query( $sql);
	echo '変更しました';
?>