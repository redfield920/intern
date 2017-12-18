<?php

//データベースの接続
   $dsn='データベース';

$user = 'ユーザー名';
$password = 'パスワード';

$pdo = new PDO($dsn, $user, $password);

$stmt =$pdo->query('SET NAMES utf8');
//テーブルの中身確認
$stmt =$pdo->query('SHOW CREATE TABLE mission');
foreach ($stmt as $re){
     print_r($re);
}
?>