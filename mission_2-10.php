<?php

//�f�[�^�x�[�X�̐ڑ�
   $dsn='�f�[�^�x�[�X';

$user = '���[�U�[��';
$password = '�p�X���[�h';

$pdo = new PDO($dsn, $user, $password);

$stmt =$pdo->query('SET NAMES utf8');
//�e�[�u���̒��g�m�F
$stmt =$pdo->query('SHOW CREATE TABLE mission');
foreach ($stmt as $re){
     print_r($re);
}
?>