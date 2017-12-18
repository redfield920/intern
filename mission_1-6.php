<html>
<head>
<title>送信データの入力</title>
<body>
<h1>入力フォーム</h1>
<pre>
</pre>
<form action="" method="post">
  <input type="text" name="message">
  <input type="submit">
</form>
<?php
 
$message = $_POST['message'];//ここと二つ下の行がフォームとテキストファイルを連動させてるっぽい

$data = $data.$message;
$filename ='mission_1-7.php';//ファイルが1-5で使ったものと同じなのですでにテキストが打ち込まれている
//echo $filename;
$ret_array = file($ret_array);

for($i = 0; $i <count($ret_array); ++$i ) {
   echo($ret_array[$i] ."<br />\n");

$fp = fopen($filename, 'a');//aを使うと追記が可能

fwrite($fp, $data."<br/>\n");//nで改行できるようになる’ではなく”で挟むのがポイント

fclose($fp);

}
?>