<?php
   $dsn='�f�[�^�x�[�X';

$user = '���[�U�[��';
$password = '�p�X���[�h';
$pdo = new PDO($dsn, $user, $password);

$sql = 'SELECT*FROM mission';
$result = $pdo->query($sql);

foreach($result as $row){
  echo $row['id'].',';
  echo $row['name'].'<br/>';
  echo $row['comment'].'<br/>';
  echo $row['password'].'<br/>';
  echo $row['time'].'<br/>';
}
?>