<?php
$filename = 'kadai_2-2.txt';


$name = $_POST['name'];//POST�Ŗ��O�󂯎��
$comment = $_POST['comment'];//POST�ŃR�����g�󂯎��
$time = date("Y-m-d H-i");//���ԕ\��
  
if(isset($_POST['soushinn'])){
$fp = fopen($filename, 'a');

fwrite($fp,(count(file($filename))+1)."<>".$name."<>".$comment."<>".$time."\n");

fclose($fp);
}

$ret_array = file($filename);//�t�@�C����z��Ƃ��Ċi�[
if(isset($_POST['deletenumber'])){
  
for ($i =0;$i <count($ret_array);++$i){
$line = explode("<>",$ret_array[$i]);
if(($line[0] == $_POST['delete']) !== false){//�폜�Ώ۔ԍ��Ɠ��e�ԍ�����v�����
      unset($ret_array[$i]);
      file_put_contents('kadai_2-2.txt',$ret_array);
    } 
   }
  }
?>
<html>
<head>
<title>�n���w���̓Ǐ����z�u���O</title>
<body>
<h1>�n���w���̓Ǐ����z�u���O</h1>
<pre>
</pre>
<form action="" method="post">
  ���O:<input type="text" name="name">
  �R�����g:<input type="text" name="comment">
  <input type="submit" name="soushinn"><br/>
  
  �폜�Ώ۔ԍ�:<input type="text" name="delete">
  <input type="submit" name="deletenumber">
</form>


<?php
for ($i =0;$i <count($ret_array);++$i){//�t�@�C���̗v�f���J��Ԃ�����

$line = explode("<>",$ret_array[$i]);//�v�f��<>�ŕ������ϐ��ɑ��

echo($line[0].$line[1].$line[2].$line[3]." <br/>\n");//<>�ŕ��������ϐ���php�T�C�g�̕\��
}
?>
