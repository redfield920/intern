<?php
   $dsn='�f�[�^�x�[�X';

$user = '���[�U�[��';
$password = '�p�X���[�h';
$pdo = new PDO($dsn, $user, $password);
$time = date("Y-m-d H-i");//���ԕ\��
$name = $_POST['name'];
$comment = $_POST['comment'];
$pass = $_POST['pass1'];

$stmt =$pdo->prepare( "update mission set name= :name,comment= :comment, where id=$_POST['edit']");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

$stmt->execute();

// �X�V�����̃��b�Z�[�W
echo '�X�V�������܂���';
?>