<?php

//�f�[�^�x�[�X�̐ڑ�
   $dsn='�f�[�^�x�[�X';

$user = '���[�U�[��';
$password = '�p�X���[�hl';

$pdo = new PDO($dsn, $user, $password, array(
     PDO::ATTR_PERSISTENT => true
));
?>