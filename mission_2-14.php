<?php

//�f�[�^�x�[�X�̐ڑ�
   $dsn='�f�[�^�x�[�X';

$user = '���[�U�[��';
$password = '�p�X���[�h';

try {
	if (empty($_POST['delete'])) throw new Exception('id�s��')�G
	$id = $_POST['delete'];

	// �f�[�^�x�[�X�Ɛڑ�
        $pdo = new PDO($dsn, $user, $password);
        $sql = "delete from mission where id= $id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(, $id, PDO::PARAM_INT);
	$stmt->execute();

    if ($_POST['deletenumber']){
        print('�f�[�^�̍폜�ɐ������܂���<br>');
    }else{
        print('�f�[�^�̍폜�Ɏ��s���܂���<br>');
    }
   }
?>