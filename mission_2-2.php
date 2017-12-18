<html>
<head>
<title>地方学生の読書感想ブログ</title>
<body>
<h1>地方学生の読書感想ブログ</h1>
<pre>
</pre>
<form action="" method="post">
  <input type="text" name="name">名前
  <input type="text" name="comment">コメント
  <input type="submit">
</form>


<?php
$filename = 'kadai_2-2.txt';

$name = $_POST['name'];//POSTで名前受け取り
$comment = $_POST['comment'];//POSTでコメント受け取り
$time = date("Y-m-d H-i");//時間表示




$fp = fopen($filename, 'a');

fwrite($fp,(count(file($filename))+1)."<>".$name."<>".$comment."<>".$time."\n");

fclose($fp);

?>