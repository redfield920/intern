<?php

//�f�[�^�x�[�X�̐ڑ�
   $dsn='�f�[�^�x�[�X';

$user = '���[�U�[��';
$password = '�p�X���[�h';

$pdo = new PDO($dsn, $user, $password);

$stmt =$pdo->query('SET NAMES utf8');
//�e�[�u���\��
$stmt = $pdo->query('SHOW TABLES');
foreach($stmt as $re){
      echo $re[0];
      echo '<br/>';
}
?>