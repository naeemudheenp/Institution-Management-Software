<?php
echo "  <BODY background='assets/login-register.JPG'>";
if(!isset($_POST['FUSERNAME']) & !isset($_POST['FPASSWORD'])){
  die("Please Input All The Values");
}
$SERVER_NAME="localhost";
$SERVER_USERNAME="naeem";
$SERVER_PASSWORD="naeem";
$fUSER=$_POST['FUSERNAME'];
$fPIN=$_POST['FPASSWORD'];
$dUSER=NULL;
$dPIN=NULL;
$SQL=NULL;
$READER=NULL;
if($fUSER=="" || $fPIN==""){
  die("Please Input All The Values");
}
$CONNECTION=mysql_connect($SERVER_NAME,$SERVER_USERNAME,$SERVER_PASSWORD);
if(!$CONNECTION){
  die("Connection Error").mysql_error();
}
$DB_SELECT=mysql_select_db("xmessage");
if(!$DB_SELECT){
  die("Unable To Select Database").mysql_error();
}
$SQL="SELECT * FROM admin";
$SQL_SYNC=mysql_query($SQL,$CONNECTION);
$READER=MYSQL_FETCH_ARRAY($SQL_SYNC);
if(!$READER){
  die("No Data Found");
}
$dUSER=$READER['id'];
$dpin=$READER['pin'];
if($dUSER!=$fUSER | $dpin!=$fPIN ){
  die("Credential Wrong.");
}


?>
<HTML>
  <TITLE>ADMIN</TITLE>
  <link href="css/singlePageTemplate.css" rel="stylesheet" type="text/css">
<center>
  <FONT color="white"><br><br><br><br>
    <h1><U><B>K U N H A L I M A R R A K A R H S S</h1><BR>
<h1>S  C  H  O  O  L  M  A  N  A  G  M  E  N  T  S  Y  S  T  E  M  </h1></U></B>
</center></font>
<br><br><br><br><br><br><br>
  <a href="USER_MGMT.php" class="scard1">USER MANAGMENT</a>
  <a href="STUDENT_MGMT.php" class="scard2">STUDENT MANAGMENT</a>
  <a href="CLASS_MGMT.php" class="scard3">CLASS MANAGEMENT</a>
  <a href="NEWS_MGMT.php" class="scard4">NEWS MANAGEMENT</a>
  <a href="MESSAGE_MGMT.php" class="scard5">MESSAGE MANAGMENT</a><br><br><br><br><br><br><br>
  <a href="EMERGENCYMESSAGE_MGMT.php" class="scard5">EMERGENCY MESSAGES</a>
  <center>


</BODY>
<br><br><br>
<p>
	<a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Go back</a>
</p>
</HTML>
