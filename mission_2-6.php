<?php
$filename = 'kadai_2-6.txt';
$buttonx = 'button1';

$name = $_POST['name'];//POST�Ŗ��O�󂯎��
$comment = $_POST['comment'];//POST�ŃR�����g�󂯎��
$time = date("Y-m-d H-i");//���ԕ\��
$password = $_POST['pass1'];//POST�Ńp�X���[�h�󂯎��

if(isset($_POST['button1'])){
$fp = fopen($filename, 'a');

fwrite($fp,(count(file($filename))+1)."<>".$name."<>".$comment."<>".$time."<>".$password."\n");

fclose($fp);
}

$ret_array = file($filename);//�t�@�C����z��Ƃ��Ċi�[
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
       echo $delnum."�Ԃ��폜���܂����B.<br/>";
    }
   }
 }else{
   echo "�p�X���[�h���Ⴂ�܂�.<br/>";
   for($i=0;$i< count($ret_array); ++$i){
       $array = explode("<>",$ret_array[$i]);
       fwrite($fp, $array[0]."<>".$array[1]."<>".$array[2]."<>".$array[3]."<>".$array[4]);
   }
 }
 fclose($fp);
}

   
//POST���M�ŕҏW�ԍ�����M�A���̍�if���ő��M���ꂽ�Ƃ�������������悤����
if(isset($_POST['editnumber'])){
//�z��̐��������[�v����
for($i=0;$i <count($ret_array);++$i){
//���[�v�̒���explode���g���ē��e�ԍ����擾
$line = explode("<>",$ret_array[$i]);

//���e�ԍ��ƕҏW�ԍ����r���A�C�R�[���̎��̔z��̒l���擾
if($line[0] == $_POST['edit'] and trim($line[4]) == $_POST['pass3']){//���e�ԍ��ƕҏW�ԍ��A�p�X���[�h���r

//���O�ƃR�����g���t�H�[���ɕ\�����邽�߂ɐV�����ϐ��ɑ��
       $data0 = $line[0];
       $data1 = $line[1];
       $data2 = $line[2];
       $buttonx = 'button2';//���M�{�^����name������ύX
   }
  }
 }

if(isset($_POST['button2'])){
//�z��̐��������[�v����
for($i=0;$i <count($ret_array[$i]);++$i){
//explode�œ��e�ԍ����擾
$line = explode("<>",$ret_array[$i]);
//�ԍ���r���s���A�ҏW���[�h���ŐV�����l�������ւ�
if(($line[0] == $_POST['henshuu']) and trim($line[4]) == $_POST['pass3']){//���e�ԍ��ƕҏW�ԍ����r
   echo $_POST['henshuu'].'��ҏW���܂����B';//�ҏW���̔ԍ���\��
  $ret_array[$i]=($_POST['henshuu'].'<>'.$_POST['name'].'<>'.$_POST['comment'].'<>'.date("Y-m-d H-i")."\n");
 file_put_contents('kadai_2-6.txt',$ret_array);//�e�L�X�g�t�@�C���̏㏑���ۑ�
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
  ���O:<input type="text" name="name" value="<?php echo $data1;?>">
  �R�����g:<input type="text" name="comment" value="<?php echo $data2;?>">
  �p�X���[�h:<input type="password" name="pass1">
  <input type="hidden" name="henshuu" value="<?php echo $data0;?>">
  <input type="submit" name="<?php echo $buttonx ;?>"><br/>
  
  �폜�Ώ۔ԍ�:<input type="text" name="delete">
  �������ݎ��̃p�X���[�h:<input type="password" name="pass2">
  <input type="submit" name="deletenumber"><br/>

  �ҏW�Ώ۔ԍ�:<input type="text" name="edit">
  �������ݎ��̃p�X���[�h:<input type="password" name="pass3">
  <input type="submit" name="editnumber">
</form>
------<br/>
���O�ƃR�����g�A�C�ӂŃp�X���[�h���L�����Ă�������<br/>
�R�����g�ɂ͍D���Ȗ{�▟��������Ă�������<br/>
------<br/>
<?php
        $ret_array = file("$filename");
for ($i =0;$i <count($ret_array);++$i){//�t�@�C���̗v�f���J��Ԃ�����

$line = explode("<>",$ret_array[$i]);//�v�f��<>�ŕ������ϐ��ɑ��

echo($line[0].$line[1].$line[2].$line[3]." <br/>\n");//<>�ŕ��������ϐ���php�T�C�g�̕\��

}
?>