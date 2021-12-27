
<?php
echo "<title>CLASS_MANAGMENT</title>";

$SERVER_NAME="localhost";
$SERVER_USERNAME="naeem";
$SERVER_PASSWORD="naeem";
$SERVER_DATABASE="id7631548_xmessage";
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
if(isset($_POST['fclass'])&& isset($_POST['fyear']) && isset($_POST['fteacher'])){
	$HOST_NAME=$_POST['fclass'];
	$HOST_NEWNAME=$_POST['nfclass'];
	$HOST_YEAR=$_POST['fyear'];
	$HOST_TEACHER=$_POST['fteacher'];
  $HOST_ID=$HOST_NAME;

}
	else{
		die("Please Complete All The Field");
	}
	if($HOST_NAME==""||$HOST_YEAR==""||$HOST_TEACHER==""){
		die("Please Complete All The Fields");
	}
	$SQL_CHECK="SELECT * FROM class WHERE id='".$HOST_ID."'";
	$RESULT_CHECK=mysql_query($SQL_CHECK,$SERVER_CONN);
  $result_set=mysql_fetch_array($RESULT_CHECK);
	if(!$result_set){
		die("Class Not Found");
	}
	$SQL_CHECK="SELECT * FROM users WHERE username='".$HOST_TEACHER."'";
	$RESULT_CHECK=mysql_query($SQL_CHECK,$SERVER_CONN);
	$result_set=mysql_fetch_array($RESULT_CHECK);
	if(!$result_set){
		die("Specified Teacher Not Available");
	}

	$SQL="UPDATE class SET id='".$HOST_NEWNAME."' ,name='".$HOST_NEWNAME."',year='".$HOST_YEAR."',teacher='".$HOST_TEACHER."' WHERE id='".$HOST_ID."' ";
	$SQL_UPDATE=mysql_query($SQL,$SERVER_CONN);
	if(!$SQL_UPDATE){

		die("Unable TO Update").error();

	}
	$SQL="UPDATE users SET class='".$HOST_NEWNAME."' WHERE username='".$HOST_TEACHER."'";
	$SQL_UPDATE=mysql_query($SQL,$SERVER_CONN);
	if(!$SQL_UPDATE){die ("UNABLE TO ADD");}
	$SQL="UPDATE student SET class='".$HOST_NEWNAME."' WHERE class='".$HOST_NAME."'";
	$SQL_UPDATE=mysql_query($SQL,$SERVER_CONN);
	if(!$SQL_UPDATE){die ("UNABLE TO ADD");}
	else{
		echo("<h1><center>CLASS UPDATED<bR>");
    echo("<h4><center>CLASS NAME:'".$HOST_NEWNAME."'</h4><bR>");
    echo("<h4><center>CLASS YEAR:'".$HOST_YEAR."'</h4><bR>");
    echo("<h4><center>CLASS TEACHER:'".$HOST_TEACHER."'</h4><bR>");
		echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
	}
	?>
<body>
</body>
</html>
