<?php
$filename = 'kadai_2-2.txt';


$name = $_POST['name'];//POSTで名前受け取り
$comment = $_POST['comment'];//POSTでコメント受け取り
$time = date("Y-m-d H-i");//時間表示
  
if(isset($_POST['soushinn'])){
$fp = fopen($filename, 'a');

fwrite($fp,(count(file($filename))+1)."<>".$name."<>".$comment."<>".$time."\n");

fclose($fp);
}

$ret_array = file($filename);//ファイルを配列として格納
if(isset($_POST['deletenumber'])){
  
for ($i =0;$i <count($ret_array);++$i){
$line = explode("<>",$ret_array[$i]);
if(($line[0] == $_POST['delete']) !== false){//削除対象番号と投稿番号が一致すれば
      unset($ret_array[$i]);
      file_put_contents('kadai_2-2.txt',$ret_array);
    } 
   }
  }
?>
<html>
<head>
<title>地方学生の読書感想ブログ</title>
<body>
<h1>地方学生の読書感想ブログ</h1>
<pre>
</pre>
<form action="" method="post">
  名前:<input type="text" name="name">
  コメント:<input type="text" name="comment">
  <input type="submit" name="soushinn"><br/>
  
  削除対象番号:<input type="text" name="delete">
  <input type="submit" name="deletenumber">
</form>


<?php
for ($i =0;$i <count($ret_array);++$i){//ファイルの要素を繰り返し処理

$line = explode("<>",$ret_array[$i]);//要素を<>で分割し変数に代入

echo($line[0].$line[1].$line[2].$line[3]." <br/>\n");//<>で分割した変数をphpサイトの表示
}
?>
