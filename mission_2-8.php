<?php

//�f�[�^�x�[�X�̐ڑ�
   $dsn='�f�[�^�x�[�X';

$user = '���[�U�[��';
$password = '�p�X���[�h';



	// �f�[�^�x�[�X�Ɛڑ�
        $pdo = new PDO($dsn, $user, $password);

	// �e�[�u���쐬�̂��߂�SQL
	$sql = "CREATE TABLE userdata (
	id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(50),
        password varchar(50)
)";
	// SQL�N�G�����s
	$res = $pdo->query( $sql);
	var_dump($res);
?>