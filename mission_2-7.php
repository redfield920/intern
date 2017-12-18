<?php

//データベースの接続
   $dsn='データベース';

$user = 'ユーザー名';
$password = 'パスワードl';

$pdo = new PDO($dsn, $user, $password, array(
     PDO::ATTR_PERSISTENT => true
));
?>