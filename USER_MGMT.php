<HTML>
  <TITLE>USER-MANAGMENT</TITLE>
  <link href="css/singlePageTemplate.css" rel="stylesheet" type="text/css">
  <BODY background="assets/login-register.JPG" >
<center>
  <h3>USER-MANAGMENT</h3><br><br><br>
  <a href="USER_ADD.html" class="scard1">ADD USER </a>
  <a href="USER_UPDATE.html" class="scard2">UPDATE USER</a>
  <a href="USER_DELETE.html" class="scard3">DELETE USER</a>
  <a href="USER_ADMIN.html" class="scard3">CHANGE ADMIN</a><br><br><br>
</center>


<?php
$SERVER_NAME="localhost";
$SERVER_USERNAME="naeem";
$SERVER_PASSWORD="naeem";
$SQL=NULL;
$READER=NULL;

$CONNECTION=mysql_connect($SERVER_NAME,$SERVER_USERNAME,$SERVER_PASSWORD);
if(!$CONNECTION){
  die("Connection Error").mysql_error();
}
$DB_SELECT=mysql_select_db("xmessage");
if(!$DB_SELECT){
  die("Unable To Select Database").mysql_error();
}
$SQL="SELECT * FROM users";
$MYSQL_SYNC=mysql_query($SQL,$CONNECTION);
echo "<center>";

echo "<link href='css/singlePageTemplate.css' rel='stylesheet' type='text/css'>";
echo "<h3>";
echo "<table class='table' border=1 height='30%' width='30%'> ";
echo "<tr>";
echo "<th colspan='3'><center>USER LIST</token></center></th>";
echo "</tr>";
echo "<tr>";
echo "<td>Name:</td>";
echo "<td>Pin:</td>";
echo "<td>Class:</td>";
echo "</tr>";
while ($READER=mysql_fetch_array($MYSQL_SYNC)) {
echo "<tr>";
	echo "<td><h4>".$READER['username']."</td>";
	echo "<td><h4>".$READER['password']."</td>";
  echo "<td><h4>".$READER['class']."</td>";
	echo "</tr>";
}
echo "</table>";
echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
?>

</BODY>
</HTML>
