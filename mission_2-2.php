<html>
<head>
<title>�n���w���̓Ǐ����z�u���O</title>
<body>
<h1>�n���w���̓Ǐ����z�u���O</h1>
<pre>
</pre>
<form action="" method="post">
  <input type="text" name="name">���O
  <input type="text" name="comment">�R�����g
  <input type="submit">
</form>


<?php
$filename = 'kadai_2-2.txt';

$name = $_POST['name'];//POST�Ŗ��O�󂯎��
$comment = $_POST['comment'];//POST�ŃR�����g�󂯎��
$time = date("Y-m-d H-i");//���ԕ\��




$fp = fopen($filename, 'a');

fwrite($fp,(count(file($filename))+1)."<>".$name."<>".$comment."<>".$time."\n");

fclose($fp);

?>