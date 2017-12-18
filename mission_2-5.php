<?php
$filename = 'kadai_2-2.txt';
$buttonx = 'button1';

$name = $_POST['name'];//POSTで名前受け取り
$comment = $_POST['comment'];//POSTでコメント受け取り
$time = date("Y-m-d H-i");//時間表示
  
if(isset($_POST['button1'])){
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
//2-5で追加した内容
//POST送信で編集番号を受信、その際if文で送信されたときだけ処理するよう分岐
if(isset($_POST['editnumber'])){

//配列の数だけループ処理
for ($i =0;$i <count($ret_array);++$i){
//ループの中でexplodeを使って投稿番号を取得
$line = explode("<>",$ret_array[$i]);
//各投稿番号と編集番号を比較し、イコールの時の配列の値を取得
if(($line[0] == $_POST['edit']) !== false){//投稿番号と編集番号を比較
//名前とコメントをフォームに表示するため新しい変数に代入
      $data0 = $line[0]; //投稿番号を変数に代入
      $data1 = $line[1];
      $data2 = $line[2];
      $buttonx = 'button2';
  }
 }
}

if(isset($_POST['button2'])){
//配列の数だけループ処理
for ($i =0;$i <count($ret_array);++$i){
//explodeで投稿番号を取得
$line = explode("<>",$ret_array[$i]);
//番号比較を行い、編集モード下で新しい値に差し替え
if(($line[0] == $_POST['henshuu']) !== false){//投稿番号と編集番号を比較
   echo $_POST['henshuu'];//編集データを投稿したら反応するか確認するための出力
  $ret_array[$i]=($_POST['henshuu'].'<>'.$_POST['name'].'<>'.$_POST['comment'].'<>'.date("Y-m-d H-i")."\n");//ここでは'<>'と"\n"を確実に入れて12行目と同じ状態で上書きすることに注意
 file_put_contents('kadai_2-2.txt',$ret_array);//テキストファイルの上書き保存
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
  名前:<input type="text" name="name" value="<?php echo $data1;?>">
  コメント:<input type="text" name="comment" value="<?php echo $data2;?>">
   <input type="hidden" name="henshuu" value="<?php echo $data0;?>">
  <input type="submit" name="<?php echo $buttonx ;?>"><br/>
  
  削除対象番号:<input type="text" name="delete">
  <input type="submit" name="deletenumber"><br/>
  
  編集対象番号:<input type="text" name="edit">
  <input type="submit" name="editnumber">
</form>

<?php
for ($i =0;$i <count($ret_array);++$i){//ファイルの要素を繰り返し処理

$line = explode("<>",$ret_array[$i]);//要素を<>で分割し変数に代入

echo($line[0].$line[1].$line[2].$line[3]." <br/>\n");//<>で分割した変数をphpサイトの表示
}
?>