<?php
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
$SQL="SELECT * FROM users WHERE username='".$fUSER."'";
$SQL_SYNC=mysql_query($SQL,$CONNECTION);
$READER=MYSQL_FETCH_ARRAY($SQL_SYNC);
if(!$READER){
  die("No Data Found");
}
$dUSER=$READER['username'];
$dpin=$READER['password'];
$dclass=$READER['class'];

if($dUSER==$fUSER & $dpin==$fPIN ){



echo "<HTML>";
echo "<BODY><h3><CENTER>Welcome To KMHSS Teachers Page<br><bR></h3>";
echo "<link href='css/singlePageTemplate.css' rel='stylesheet' type='text/css'>";
  echo "<center><h3>Name:".$dUSER;
  echo "<BR>";
  echo "<center><h3>Class:".$dclass;
  echo "<Body  Background='assets/login-register.JPG' height='70%' width='100%'></center>";
  echo "<a class='scard1' href=javascript:check('$dclass')>STUDENT MANAGMENT</a>";
  echo "<a class='scard2' href=javascript:check1('$dUSER')>EXAM MANAGMENT</a>";
  echo "<a class='scard3' href=javascript:check2('$dclass')>MESSAGE MANAGMENT</a>";
  echo "<br><br><br><br>";
  echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
}
else{
echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
  die("Credential Wrong.");

}
?>


    <script type="text/javascript">
    function	check(dname){

    	var name=dname;
    	var page='TSTUDENT_MGMT.php?nfame='+name;
    	document.location.href=page;

    }  function	check1(dname){

      	var name=dname;
      	var page='TEXAM_MGMT.php?nfame='+name;
      	document.location.href=page;

      }  function	check2(dname){

        	var name=dname;
        	var page='TMESSAGE_MGMT1.php?nfame='+name;
        	document.location.href=page;

        }
    </script>
