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
  echo htmlspecialchars($_POST['message']);
?>