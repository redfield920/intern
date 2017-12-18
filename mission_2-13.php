<?php
   $dsn='データベース';

$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn, $user, $password);
$time = date("Y-m-d H-i");//時間表示
$name = $_POST['name'];
$comment = $_POST['comment'];
$pass = $_POST['pass1'];

$stmt =$pdo->prepare( "update mission set name= :name,comment= :comment, where id=$_POST['edit']");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

$stmt->execute();

// 更新完了のメッセージ
echo '更新完了しました';
?>