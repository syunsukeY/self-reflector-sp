﻿<html>
<body>

<h1>過去のコメント</h1>

<?php
$user_id = $_GET['user_id'];

echo $user_id;


 $today = date("Y/m/d l H:i:s");
 echo $today;



$con = mysql_connect('127.0.0.1', 'root', '');
if (!$con) {
  exit('データベースに接続できませんでした。');
}

$result = mysql_select_db('mentors_development', $con);
if (!$result) {
  exit('データベースを選択できませんでした。');
}

$result = mysql_query('SET NAMES utf8', $con);
if (!$result) {
  exit('文字コードを指定できませんでした。');
}

$result = mysql_query("INSERT INTO assessments (created_at) VALUES ($today)",$con);
while ($data = mysql_fetch_array($result)) {
  echo '<p>' . $data['created_at']  . "</p>\n";
}

$result = mysql_query("SELECT * FROM assessments WHERE user_id = '".$user_id."'", $con);
while ($data = mysql_fetch_array($result)) {
  echo '<p>' . $data['created_at'] . "：" . $data['day_comment'] . "</p>\n";
}


$con = mysql_close($con);
if (!$con) {
  exit('データベースとの接続を閉じられませんでした。');
}

?>

</body>
</html>