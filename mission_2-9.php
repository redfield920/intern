<?php

//データベースの接続
   $dsn='データベース';

$user = 'ユーザー名';
$password = 'パスワード';

$pdo = new PDO($dsn, $user, $password);

$stmt =$pdo->query('SET NAMES utf8');
//テーブル表示
$stmt = $pdo->query('SHOW TABLES');
foreach($stmt as $re){
      echo $re[0];
      echo '<br/>';
}
?>
