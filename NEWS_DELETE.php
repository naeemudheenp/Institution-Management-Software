
<?php
echo "<title>CLASS_MANAGMENT</title>";

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
if(isset($_POST['fid'])){
	$HOST_ID=$_POST['fid'];


}
	else{
		die("Please Complete All The Field");
	}
	$SQL_CHECK="SELECT * FROM news WHERE id='".$HOST_ID."'";
	$RESULT_CHECK=mysql_query($SQL_CHECK,$SERVER_CONN);
  $result_set=mysql_fetch_array($RESULT_CHECK);
	if(!$result_set){
		die("News Not Found");
	}

	$SQL="DELETE FROM news WHERE id='".$HOST_ID."' ";
	$SQL_UPDATE=mysql_query($SQL,$SERVER_CONN);
	if(!$SQL_UPDATE){

		die("Unable TO Delete");
echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
	}
	else{
		echo("<h1><center>DELETED<bR>");
echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
	}
	?>
<body>
</body>
</html>
