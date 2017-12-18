<?php

//データベースの接続
   $dsn='データベース';

$user = 'ユーザー名';
$password = 'パスワード';

try {
	if (empty($_POST['delete'])) throw new Exception('id不正')；
	$id = $_POST['delete'];

	// データベースと接続
        $pdo = new PDO($dsn, $user, $password);
        $sql = "delete from mission where id= $id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(, $id, PDO::PARAM_INT);
	$stmt->execute();

    if ($_POST['deletenumber']){
        print('データの削除に成功しました<br>');
    }else{
        print('データの削除に失敗しました<br>');
    }
   }
?>