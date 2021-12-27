
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
if(isset($_POST['fadm'])&& isset($_POST['fname']) && isset($_POST['fgender'])&& isset($_POST['fclass'])&& isset($_POST['fyear'])&& isset($_POST['frno'])&& isset($_POST['fmno'])&& isset($_POST['fad'])){
	$Ad_no=$_POST['fadm'];
	$name=$_POST['fname'];
	$gender=$_POST['fgender'];
	$class=$_POST['fclass'];
	$fyear=$_POST['fyear'];
	$Roll_no=$_POST['frno'];
	$Mobile_no=$_POST['fmno'];
	$add=$_POST['fad'];
	$class=$class;
}
	else{
		die("Please Complete All The Field");
	}
	if($Ad_no==""||$class==""||$fyear==""){
		die("Please Complete All The Fields");
	}
	$SQL_CHECK="SELECT * FROM student WHERE admin_no='".$Ad_no."'";
	$RESULT_CHECK=mysql_query($SQL_CHECK,$SERVER_CONN);
$RESULT_SET=mysql_fetch_array($RESULT_CHECK);
	if($RESULT_SET){
		die("This Username Is Already Taken! Try Other");
	}
	$SQL_CHECK="SELECT * FROM class WHERE id='".$class."'";
	$RESULT_CHECK=mysql_query($SQL_CHECK,$SERVER_CONN);
$RESULT_SET=mysql_fetch_array($RESULT_CHECK);
	if(!$RESULT_SET){
		die("Specified Class Not Found.");
	}
	$SQL="INSERT INTO STUDENT VALUES('".$Ad_no."','".$name."','".$gender."','".$Mobile_no."','".$Roll_no."','".$add."','".$class."','".$fyear."')";
	$SQL_UPDATE=mysql_query($SQL,$SERVER_CONN);
	if(!$SQL_UPDATE){

		die("Unable TO SignUp This Username Already Taken");

	}
	else{
		echo("STUDENT REGISTERED");
	}
	?>
	<HTML>
	</head>
	  <TITLE>STUDENT_MANAGMENT</TITLE>
	  <link href="css/singlePageTemplate.css" rel="stylesheet" type="text/css">
	</head>
	  <BODY background="assets/login-register.JPG">
	<center>
	  <br><br><br>
	  <div>
	<form  class="login-card" name="STD_ADD" action="STD_ADD.php" method="post">
	Admission Number:<input type="text" name="fadm"><br><br>
	Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="fname"><br><br>
	Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="fgender"><br><br>
	Class:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="fclass"><br><br>
	Year:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="fyear"><br><br>
	Roll Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="frno"><br><br>
	Mobile Number:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="fmno"><br><br>
	Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="fad"><br><br>
	<input type="submit" class="button">
	<p>
		<a href="javascript:history.go(-1)" title="Return to the previous page">&laquo; Go back</a>
	</p>
	  </form>
		<script type="text/javascript">
	  var value = "<?php echo $class ?>";
	 var year="<?php echo $fyear ?>";
	 var rollno="<?php echo $Roll_no ?>";
	 rollno=Number(rollno);
	 rollno=rollno+1;
	 document.STD_ADD.fyear.value=year;
	 document.STD_ADD.frno.value=rollno;
	 document.STD_ADD.fclass.value=value;
	 document.STD_ADD.fclass.readOnly=true;
	 if(value==""){
		 document.STD_ADD.fclass.readOnly=false;
	 }
	 </script>
	</body>
	  </html>
