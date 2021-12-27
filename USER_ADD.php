
<?php
echo "<title>USER_MANAGMENT</title>";

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
if(isset($_POST['fname'])&& isset($_POST['fpin'])){
	$HOST_NAME=$_POST['fname'];
	$HOST_PASSWORD=$_POST['fpin'];

}
	else{
		die("Please Complete All The Field");
	}
	if($HOST_NAME=="" ||$HOST_PASSWORD==""||$HOST_CLASS=="" ){
		die("Complete All Fields");
	}
	$SQL_CHECK="SELECT * FROM users WHERE username='".$HOST_NAME."'";
	$RESULT_CHECK=mysql_query($SQL_CHECK,$SERVER_CONN);
	$RESULTREADER=mysql_fetch_array($RESULT_CHECK);
	if($RESULTREADER){
		die("This Username Is Already Taken! Try Other");
	}
	$SQL="INSERT INTO users(username,password) VALUES('".$HOST_NAME."','".$HOST_PASSWORD."')";
	$SQL_UPDATE=mysql_query($SQL,$SERVER_CONN);
	if(!$SQL_UPDATE){
echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
		die("Unable TO SignUp This Username Already Taken");

	}
	else{
		echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
		echo("USER REGISTERED");
	}
	?>
<body>
</body>
</html>
