<?php
echo"<HTML>";
echo"</head>";
  echo"<TITLE>MESSAGE_MANAGMENT</TITLE>";
  echo"<link href='css/singlePageTemplate.css' rel='stylesheet' type='text/css'>";
echo"</head>";
echo"<BODY background='assets/login-register.JPG'>";
echo"<center>";
  echo"<br><br><br>";
  echo"<div>";
    echo"<font color='black'>";
echo"<form  class='login-card' name='STD_ADD' action='TMESSAGE_MGMT.php' method='post'>";
echo"Please Choose A Format:<br><br>";
$nfame=$_GET['nfame'];
echo"<input hidden  value='$nfame' name='nfame'><br><br>";
echo"Leave<input type='radio' value='absent' name='choose'><br><br>";
echo"Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text'  name='date'><br><br>";
echo"Mark Report<input type='radio' value='mark' name='choose'><br><br>";
echo"Exam Name&nbsp;&nbsp;<input type='text'  name='exam'><br><br>";
echo"Custom<input type='radio' value='custom' name='choose'><br><br>";
echo"<textarea name='message'></textarea><br>";
echo"<input type='submit'>";
  echo"</form>";
  echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
  echo"</html>";
?>
