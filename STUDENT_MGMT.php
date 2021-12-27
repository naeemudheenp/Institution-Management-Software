<HTML>
  <TITLE>STUDENT-MANAGMENT</TITLE>
  <link href="css/singlePageTemplate.css" rel="stylesheet" type="text/css">
  <BODY background="assets/login-register.JPG"><center>
    <h3>STUDENT-MANAGMENT</h3><br><br><br>
  <a href="STD_ADD.html" class="scard1">ADD STUDENT </a>
  <a href="STD_UPDATE.html" class="scard2">UPDATE STUDENT</a>
  <a href="STD_DELETE.html" class="scard3">DELETE STUDENT</a><br><br><br>
  <center>

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
$SQL="SELECT * FROM student";
$MYSQL_SYNC=mysql_query($SQL,$CONNECTION);
echo "<center>";
echo "<link href='css/singlePageTemplate.css' rel='stylesheet' type='text/css'>";
echo "<h3>";
echo "<table class='table' border=1 height='30%' width='30%'> ";
echo "<tr>";
echo "<th colspan='8'><center>STUDENT LIST</token></center></th>";
echo "</tr>";
echo "<tr>";
echo "<td>Admin Number</td>";
echo "<td>Name</td>";
echo "<td>Gender</td>";
echo "<td>Class:</td>";
echo "<td>Year:</td>";
echo "<td>Roll Number</td>";
echo "<td>Mobile Number</td>";
echo "<td>Address</td>";
echo "</tr>";
while ($READER=mysql_fetch_array($MYSQL_SYNC)) {
echo "<tr>";
	echo "<td><h4>".$READER['admin_no']."</td>";
	echo "<td><h4>".$READER['name']."</td>";
  echo "<td><h4>".$READER['gender']."</td>";
  echo "<td><h4>".$READER['class']."</td>";
  echo "<td><h4>".$READER['year']."</td>";
  echo "<td><h4>".$READER['rollno']."</td>";
  echo "<td><h4>".$READER['number']."</td>";
    echo "<td><h4>".$READER['address']."</td>";
	echo "</tr>";
}
echo "</table>";
echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
?>


</BODY>
</HTML>
