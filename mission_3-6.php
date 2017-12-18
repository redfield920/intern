<?php
   $dsn='データベース';

$user = 'ユーザー名';
$password = 'パスワード';
//?f?[?^?x?[?X??±
$pdo = new PDO($dsn, $user, $password);
$time = date("Y-m-d H-i");//????\?|
$name = $_POST['name'];
$comment = $_POST['comment'];
$pass = $_POST['pass1'];
$button = "button1";     
//?f?[?^?}?u
$stmt =$pdo->prepare("INSERT INTO mission(name,comment,password,time) VALUES(:name,:comment,:password,:time)");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$stmt->bindValue(':password', $pass, PDO::PARAM_INT);
$stmt->bindValue(':time', $time, PDO::PARAM_INT);
//?u??t?H?[??c?c?f?[?^?d? a?e?A?f?[?^?x?[?X??}?u
if($_POST['button1']){
$stmt->execute();
}
//???@?\??v???O???~???O
	if(isset($_POST['deletenumber'])){
	$id = $_POST['delete'];
	if($pass==$_POST['pass2']){
	// ?f?[?^?x?[?X???±
        $pdo = new PDO($dsn, $user, $password);
        $sql = "delete from mission where id= $id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue ($id, PDO::PARAM_INT);
	$stmt->execute();
    }else{
	echo"パスワードが違います。.<br/>";
   }
  }
//??W?@?\??v???O???~???O
if(isset($_POST['editnumber'])){
$sql = 'SELECT*FROM mission';//?e?[?u???a??f?[?^?擾
$result = $pdo->query($sql);
$result2 = $result->fetchAll();
//??W?・???e??z?n????d?擾
for($i=0; $i<count($result2); ++$i){
	if($result2[$i][0] == $_POST['edit']){
	   $editnum = $i;
   //?p?X???[?h?a?e?v?μ????≪
   if(trim($result2[$i][3]) == $_POST['pass3']){
//???O??R?????g?d?t?H?[???\?|?・?????V?μ?￠?????a?u
       $data0 = $result2[$editnum][0];
       $data1 = $result2[$editnum][1];
       $data2 = $result2[$editnum][2];
       $button = 'button2';//???M?{?^???Iname?R?≪?d??X
   }else{
	echo"パスワードが違います。.<br/>";
  }
	}
 }
}

if(isset($_POST['button2'])){
$id = $_POST['henshuu'];

if(strlen($name) && strlen($comment)){
$editTable = "UPDATE mission SET NAME = '$name', COMMENT = '$comment', PASSWORD = '$pass', TIME = '$time' WHERE id = '$id'";
$result3 = $pdo->query($editTable);
echo $_POST['henshuu'].'番を編集しました。.<br/>';//??W???????d?\?|
 }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
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
  <input type="submit" name="<?php echo $button ;?>"><br/>

  削除対象番号:<input type="text" name="delete">
  書き込み時のパスワード:<input type="password" name="pass2">
  <input type="submit" name="deletenumber"><br/>

  編集対象番号:<input type="text" name="edit">
  書き込み時のパスワード:<input type="password" name="pass3">
  <input type="submit" name="editnumber"><br/>

ユーザー登録フォーム
  名前:<input type="text" name="username">
  パスワード:<input type="password" name="userpass">
  <input type="submit" name="login">
</form>
------<br/>
名前とコメント、任意でパスワードを記入してください。<br/>
コメントには好きな本や漫画を記入してください。<br/>
------<br/>

<?php
//mission?e?[?u??????g?d?\?|
$sql = 'SELECT*FROM mission';
$ret = $pdo->query($sql);

foreach($ret as $row){
  echo $row['id'].',';
  echo $row['name'].'<br/>';
  echo $row['comment'].'<br/>';
  echo $row['time'].'<br/>';
}
if(isset($_POST['login'])){
$stmt =$pdo->prepare("INSERT INTO userdata(name,password) VALUES(:name,:password)");
$stmt->bindValue(':name', $_POST['username'], PDO::PARAM_STR);
$stmt->bindValue(':password', $_POST['userpass'], PDO::PARAM_INT);
$stmt->execute();
	echo"ユーザー情報";
}

$sql = 'SELECT*FROM userdata';
$user = $pdo->query($sql);

foreach($user as $re){
  echo $re['id'].' ';
  echo $re['name'].' ';
  echo $re['password'].' ';
}
?>