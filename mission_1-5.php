<html>
<head>
<body>
<h1>form test</h1>
<pre>
</pre>
<form action="" method="post">
  <input type="text" name="message">
  <input type="submit">
</form>
<?php
 
$message = $_POST['message'];

$data = $data.$message;
$filename ='kadai5.txt';
//echo $filename;

$fp = fopen($filename, 'w');

fwrite($fp, $data);

fclose($fp);

?>