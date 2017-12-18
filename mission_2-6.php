<?php
$filename = 'kadai_2-6.txt';
$buttonx = 'button1';

$name = $_POST['name'];//POSTで名前受け取り
$comment = $_POST['comment'];//POSTでコメント受け取り
$time = date("Y-m-d H-i");//時間表示
$password = $_POST['pass1'];//POSTでパスワード受け取り

if(isset($_POST['button1'])){
$fp = fopen($filename, 'a');

fwrite($fp,(count(file($filename))+1)."<>".$name."<>".$comment."<>".$time."<>".$password."\n");

fclose($fp);
}

$ret_array = file($filename);//ファイルを配列として格納
if(isset($_POST['deletenumber'])){
  $delnum = $_POST['delete'];

$fp = fopen($filename, 'w');

$gotpass = explode("<>",$ret_array[$delnum-1]);

if(trim($gotpass[4])==$_POST['pass2']){
   for($i=0;$i<count($ret_array); ++$i){
   $array = explode("<>", $ret_array[$i]);
   if($array[0] !=$delnum){
      if($array[0]> $delnum){
         $array[0] = $array[0]-1;
      }
      fwrite($fp, $array[0]."<>".$array[1]."<>".$array[2]."<>".$array[3]."<>".$array[4]);
    }else{
       echo $delnum."番を削除しました。.<br/>";
    }
   }
 }else{
   echo "パスワードが違います.<br/>";
   for($i=0;$i< count($ret_array); ++$i){
       $array = explode("<>",$ret_array[$i]);
       fwrite($fp, $array[0]."<>".$array[1]."<>".$array[2]."<>".$array[3]."<>".$array[4]);
   }
 }
 fclose($fp);
}

   
//POST送信で編集番号を受信、その際if文で送信されたときだけ処理するよう分岐
if(isset($_POST['editnumber'])){
//配列の数だけループ処理
for($i=0;$i <count($ret_array);++$i){
//ループの中でexplodeを使って投稿番号を取得
$line = explode("<>",$ret_array[$i]);

//投稿番号と編集番号を比較し、イコールの時の配列の値を取得
if($line[0] == $_POST['edit'] and trim($line[4]) == $_POST['pass3']){//投稿番号と編集番号、パスワードを比較

//名前とコメントをフォームに表示するために新しい変数に代入
       $data0 = $line[0];
       $data1 = $line[1];
       $data2 = $line[2];
       $buttonx = 'button2';//送信ボタンのname属性を変更
   }
  }
 }

if(isset($_POST['button2'])){
//配列の数だけループ処理
for($i=0;$i <count($ret_array[$i]);++$i){
//explodeで投稿番号を取得
$line = explode("<>",$ret_array[$i]);
//番号比較を行い、編集モード下で新しい値を差し替え
if(($line[0] == $_POST['henshuu']) and trim($line[4]) == $_POST['pass3']){//投稿番号と編集番号を比較
   echo $_POST['henshuu'].'を編集しました。';//編集中の番号を表示
  $ret_array[$i]=($_POST['henshuu'].'<>'.$_POST['name'].'<>'.$_POST['comment'].'<>'.date("Y-m-d H-i")."\n");
 file_put_contents('kadai_2-6.txt',$ret_array);//テキストファイルの上書き保存
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
  パスワード:<input type="password" name="pass1">
  <input type="hidden" name="henshuu" value="<?php echo $data0;?>">
  <input type="submit" name="<?php echo $buttonx ;?>"><br/>
  
  削除対象番号:<input type="text" name="delete">
  書き込み時のパスワード:<input type="password" name="pass2">
  <input type="submit" name="deletenumber"><br/>

  編集対象番号:<input type="text" name="edit">
  書き込み時のパスワード:<input type="password" name="pass3">
  <input type="submit" name="editnumber">
</form>
------<br/>
名前とコメント、任意でパスワードを記入してください<br/>
コメントには好きな本や漫画を書いてください<br/>
------<br/>
<?php
        $ret_array = file("$filename");
for ($i =0;$i <count($ret_array);++$i){//ファイルの要素を繰り返し処理

$line = explode("<>",$ret_array[$i]);//要素を<>で分割し変数に代入

echo($line[0].$line[1].$line[2].$line[3]." <br/>\n");//<>で分割した変数をphpサイトの表示

}
?>