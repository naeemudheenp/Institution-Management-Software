<?php
echo "  <BODY background='assets/login-register.JPG'><br><br><br><br><br><br><CENTER>";
echo "<H1> PLEASE ENTER YOUR MARK:</H1><H3>";
echo "<link href='css/singlePageTemplate.css' rel='stylesheet' type='text/css'>";
$db_link = mysql_connect('localhost', 'naeem', 'naeem');
if (!$db_link)
    die('Cannot connect : ' . mysql_error());

# select database
$db_selected = mysql_select_db('xmessage', $db_link);
if (!$db_selected)
    die ('Cannot select database : ' . mysql_error());
$Id=mysql_real_escape_string($_POST['fid']);
if($Id==""){
  die("Please Complete All The Fields");
}
    $SQLSELECT="SELECT * FROM ".$Id." WHERE id=0 ";
    $SQLSELECTSYNC=mysql_query($SQLSELECT,$db_link);
    if(!$SQLSELECTSYNC){
      die("Exam Not Found");
    }
    $SQLSELECTREADER=mysqL_fetch_array($SQLSELECTSYNC);
    $i=0;
    $j=0;
    echo "<form method='post' action='EXAM_UPDATE2.php'>";
    echo "Exam Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='' name='fid' value='$Id'<br><br>";
    echo "<br>Adm. Number:&nbsp;&nbsp;<input type='text' name='id'<br><br><br>";
    echo "<table border='2'";
    echo "<tr><th>NUMBER</th>";
      echo "<th>SUBJECTS</th>";
      echo "<th>MARKS</th></tr>";

    foreach ($SQLSELECTREADER as $key => $value) {
    $i=$i+1;
    if($i>4){
        echo"<td>". $key."</td>";

        $j=$j+1;

        if($j==2){

          echo "<td><input type='text' name='$key'></td>";
echo "<tr>";
          $j=0;
        }
      }
    }
    echo "</table>";
    echo "<input  type='submit'>";
    echo "</form";
    echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
 ?>
