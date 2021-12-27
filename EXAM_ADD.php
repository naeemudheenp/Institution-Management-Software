<?php
$db_link = mysql_connect('localhost', 'naeem', 'naeem');
if (!$db_link)
    die('Cannot connect : ' . mysql_error());

# select database
$db_selected = mysql_select_db('xmessage', $db_link);
if (!$db_selected)
    die ('Cannot select database : ' . mysql_error());

# execute search query



if(!empty($_POST['selected'])) {
if(!isset($_POST['fname'])){
  die("Please Complete All The Fields");
}
$Exam=$_POST['fname'];
$Class=$_POST['fclass'];
$teacher=$_POST['teacher'];
if($Exam==""||$Class==""||$teacher==""){
  die("Please Complete All The Fields");
}
$CHECKSQL="SELECT * FROM users WHERE username='".$teacher."'";
$CHECKSQLSYNC=mysql_query($CHECKSQL,$db_link);
$checkread=mysql_fetch_array($CHECKSQLSYNC);
if(!$checkread){
  die("Specified Teacher Not Found");
}

$CHECKSQL="SELECT * FROM class WHERE id='".$Class."'";
$CHECKSQLSYNC=mysql_query($CHECKSQL,$db_link);
$checkread=mysql_fetch_array($CHECKSQLSYNC);
if(!$checkread){
  die("Specified Class Not Found");
}
$examinfo=$Exam;
$dexam=$Exam;
$Exam = mysql_real_escape_string($_POST['fname']);
$Exam=$Exam.$Class;
$SQL="CREATE TABLE ".$Exam."(
admin  VARCHAR(76) PRIMARY KEY,
id INT(5)
)";

$test=mysql_query($SQL,$db_link);
if(!$test){
  die("error1".mysql_error());
}
$INSERTSQL="INSERT INTO ".$Exam." (ID) VALUE(0)";
$INSERTSQLSYNC=mysql_query($INSERTSQL,$db_link);
if(!$INSERTSQLSYNC){
  die("Error2".mysql_error());
}
$REFERSQL="INSERT INTO exam VALUES('".$Exam."','".$teacher."','".$examinfo."')";
$refersync=mysql_query($REFERSQL,$db_link);
if(!$refersync){
  die("Error3".mysql_error());
}
// Counting number of checked checkboxes.
$checked_count = count($_POST['selected']);
foreach($_POST['selected'] as $selected) {
  $data=mysql_real_escape_string($selected);

  $alter="ALTER TABLE ".$Exam." ADD ".$data." VARCHAR(76)  NULL" ;
  $update=mysql_query($alter,$db_link );

  if(!$update){
    echo $data;
    die("Alter Erro".mysql_error());

  }


}
  foreach($_POST['selected'] as $selected) {
  $data=mysql_real_escape_string($selected);

  $INSERTSQL="UPDATE ".$Exam." SET ".$data."='".$selected."' WHERE id=0";
  $INSERTSQLSYNC=mysql_query($INSERTSQL,$db_link);
  if(!$INSERTSQLSYNC){
    die(mysql_error());

}}
echo "<h1>EXAM ADDED<br>";
echo "<h1>Unique ID:".$Exam;
echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
}else {
  die("Please Complete All The Fields");
  echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
}
?>
