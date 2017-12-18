<?php
   $dsn='データベース';

$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn, $user, $password);
$time = date("Y-m-d H-i");//時間表示
       
$stmt =$pdo->prepare("INSERT INTO mission(id,name,password,time) VALUES('',$_POST['name'],$_POST['comment'],$_POST['pass1'],$time,)");

$stmt->execute();
?>