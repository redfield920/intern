<html>
<head>
<title>���M�f�[�^�̓���</title>
<body>
<h1>���̓t�H�[��</h1>
<pre>
</pre>
<form action="" method="post">
  <input type="text" name="message">
  <input type="submit">
</form>
<?php
 
$message = $_POST['message'];//�����Ɠ���̍s���t�H�[���ƃe�L�X�g�t�@�C����A�������Ă���ۂ�

$data = $data.$message;
$filename ='mission_1-7.php';//�t�@�C����1-5�Ŏg�������̂Ɠ����Ȃ̂ł��łɃe�L�X�g���ł����܂�Ă���
//echo $filename;
$ret_array = file($ret_array);

for($i = 0; $i <count($ret_array); ++$i ) {
   echo($ret_array[$i] ."<br />\n");

$fp = fopen($filename, 'a');//a���g���ƒǋL���\

fwrite($fp, $data."<br/>\n");//n�ŉ��s�ł���悤�ɂȂ�f�ł͂Ȃ��h�ŋ��ނ̂��|�C���g

fclose($fp);

}
?>