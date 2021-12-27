<?php
$SERVER_NAME="localhost";
$SERVER_USERNAME="naeem";
$SERVER_PASSWORD="naeem";
$SQL=NULL;
$READER=NULL;
if(isset($_GET['nfame'])){
$sir=$_GET['nfame'];

}

$CONNECTION=mysql_connect($SERVER_NAME,$SERVER_USERNAME,$SERVER_PASSWORD);
if(!$CONNECTION){
  die("Connection Error").mysql_error();
}
$DB_SELECT=mysql_select_db("xmessage");
if(!$DB_SELECT){
  die("Unable To Select Database").mysql_error();
}
$SQL="SELECT * FROM exam WHERE teacher='".$sir."'";
$MYSQL_SYNC=mysql_query($SQL,$CONNECTION);
if(!$MYSQL_SYNC){
  echo "<H1><CENTER>No Exam";;
  goto lst;
}
echo "<center>";
echo "<h1>EXAM MANAGMENT</h1><BR>";
echo "<link href='css/singlePageTemplate.css' rel='stylesheet' type='text/css'>";
echo "<h3>";
echo "<table class='table' border=1 height='30%' width='30%'> ";
echo "<tr>";
echo "<th colspan='1'><center>EXAM LIST</token></center></th>";
echo "</tr>";
echo "<tr>";
echo "<td>Exam Name</td>";
echo "</tr>";
while ($READER=mysql_fetch_array($MYSQL_SYNC)) {
echo "<tr>";

	echo "<td><h4>".$READER['exam']."</td>";
  echo "</tr>";
}
echo "</table>";
lst:;
?>
<HTML>
  <TITLE>EXAM-MANAGMENT</TITLE>
  <center>
  <link href="css/singlePageTemplate.css" rel="stylesheet" type="text/css">
  <BODY background="assets/login-register.JPG"><br><br><br><br><br><br>
  <a href="EXAM_ADD.html" class="scard1">ADD  EXAM </a>
  <a href="EXAM_UPDATE.html" class="scard2">ENTER EXAM MARK</a>
    <a href="EXAM_MARK.html" class="scard4">UPDATE EXAM MARK</a>
  <a href="EXAM_DELETE.html" class="scard3">DELETE EXAM</a>
  <a href="EXAM_PRINT.html" class="scard4">PRINT EXAM RESULT</a>
  <center>
    <form><br><br><br>
    	<input type="button" value="Return to previous page" onClick="javascript:history.go(-1)" />
    </form>

</BODY>
</HTML>
