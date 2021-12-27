<?php
$db_link = mysql_connect('localhost', 'naeem', 'naeem');
if (!$db_link)
    die('Cannot connect : ' . mysql_error());

# select database
$db_selected = mysql_select_db('xmessage', $db_link);
if (!$db_selected)
    die ('Cannot select database : ' . mysql_error());

# execute search query




if(!isset($_POST['fname'])){
  die( "Please Complete Data");
}
$did=$_POST['fname'];
$id=mysql_real_escape_string($_POST['fname']);
if($did==""){
  die("Please Complete All The Fields");
}
$SQL="DROP TABLE ".$id."";
$DELETESQLSYNQ=mysql_query($SQL,$db_link);
if(!$DELETESQLSYNQ){
  die("ERROR".mysql_error());
}
$SQL="DELETE FROM exam WHERE exam='".$did."'";
$DELETESQLSYNQ=mysql_query($SQL,$db_link);
if($DELETESQLSYNQ){
  echo "EXAM DELETED";
  echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
}
else {
  DIE("Unable To Delete".mysql_error());
  echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
}
