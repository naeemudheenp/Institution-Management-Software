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
$DB_SELECT=mysql_select_db("id7631548_xmessage");
if(!$DB_SELECT){
  die("Unable To Select Database").mysql_error();
}
$SQL="SELECT * FROM class";
$MYSQL_SYNC=mysql_query($SQL,$CONNECTION);
echo "<center>";
echo "<h1>CLASS MANAGMENT</h1><BR>";
echo "<link href='css/singlePageTemplate.css' rel='stylesheet' type='text/css'>";
echo "<h3>";
echo "<table class='table' border=1 height='30%' width='30%'> ";
echo "<tr>";
echo "<th colspan='4'><center>STUDENT LIST</token></center></th>";
echo "</tr>";
echo "<tr>";
echo "<td>Unique Id</td>";
echo "<td>Class</td>";
echo "<td>Year</td>";
echo "<td>Class Teacher</td>";
echo "</tr>";
while ($READER=mysql_fetch_array($MYSQL_SYNC)) {
echo "<tr>";
	echo "<td><h4>".$READER['id']."</td>";
	echo "<td><h4>".$READER['name']."</td>";
  echo "<td><h4>".$READER['year']."</td>";
  echo "<td><h4>".$READER['teacher']."</td>";
echo "</tr>";
}
echo "</table>";
?>
<HTML>
  <TITLE>CLASS-MANAGMENT</TITLE>
  <link href="css/singlePageTemplate.css" rel="stylesheet" type="text/css">
  <BODY background="assets/login-register.JPG"><br><br><br><br><br><br>
  <a href="CLASS_ADD.html" class="scard1">ADD CLASS </a>
  <a href="CLASS_UPDATE.html" class="scard2">UPDATE CLASS</a>
  <a href="CLASS_DELETE.html" class="scard3">DELETE CLASS</a>
  <center>

    <p><br><br>
    	<a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Go back</a>
    </p>
</BODY>
</HTML>
