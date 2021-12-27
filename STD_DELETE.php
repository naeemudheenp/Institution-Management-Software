
<?php
echo "<title>STUDENT_MANAGMENT</title>";

$SERVER_NAME="localhost";
$SERVER_USERNAME="naeem";
$SERVER_PASSWORD="naeem";
$SERVER_DATABASE="xmessage";
$HOST_NAME="NONE";
$HOST_PIN="NONE";
$HOST_CLASS="NONE";

$SERVER_CONN=mysql_connect($SERVER_NAME,$SERVER_USERNAME,$SERVER_PASSWORD,$SERVER_DATABASE);

	if(!$SERVER_CONN){
		die("Could Not Connect".mysql_errno());
	}
	$db_test=mysql_select_db($SERVER_DATABASE,$SERVER_CONN);
  if(!$db_test){
  	die("Could not connect".mysql_error());
  }
if(isset($_POST['fname'])){
	$HOST_NAME=$_POST['fname'];
}
if(	$HOST_NAME==""){
  Die("No Value Given");
}

	$SQL_CHECK="SELECT * FROM student WHERE admin_no='".$HOST_NAME."'";
	$RESULT_CHECK=mysql_query($SQL_CHECK,$SERVER_CONN);
  $result_set=mysql_fetch_array($RESULT_CHECK);
	if(!$result_set){
		die("This Username Doesnot Exits");
	}

	$SQL="DELETE FROM student WHERE admin_no='".$HOST_NAME."'";
	$SQL_UPDATE=mysql_query($SQL,$SERVER_CONN);
	if(!$SQL_UPDATE){

		die("Unable To Delete".mysql_error());
		echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';

	}
	else{
		echo("Data Deleted");
		echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
	}
	?>
<body>
</body>
</html>
