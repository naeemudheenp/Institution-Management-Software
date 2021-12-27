<?php
echo"<HTML>";
echo"</head>";
  echo"<TITLE>MESSAGE_MANAGMENT</TITLE>";
  echo"<link href="css/singlePageTemplate.css" rel="stylesheet" type="text/css">";
echo"</head>";
echo"<body text="Black" >";
echo"<center>";
  echo"<br><br><br>";
  echo"<div>";
    echo"<font color="black">";
echo"<form  class="login-card" name="STD_ADD" action="TMESSAGE_MGMT.php" method="post">";

  $class=$_POST['nfame'];
  echo"input type='' value='$class' name='nfame'>";

echo"Please Choose A Format:";
echo"Leave<input type="radio" value="absent" name="choose">";
echo"Leave<input type="radio" value="absent" name="choose">";
  echo"</form>";
  echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
  echo"</html>";
?>
