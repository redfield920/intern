<?php
   $dsn='�f�[�^�x�[�X';

$user = '���[�U�[��';
$password = '�p�X���[�h';
$pdo = new PDO($dsn, $user, $password);
$time = date("Y-m-d H-i");//���ԕ\��
       
$stmt =$pdo->prepare("INSERT INTO mission(id,name,password,time) VALUES('',$_POST['name'],$_POST['comment'],$_POST['pass1'],$time,)");

$stmt->execute();
?>