<?php
$db_link = mysql_connect('localhost', 'naeem', 'naeem','xmessage');
if (!$db_link)
    die('Cannot connect : ' . mysql_error());

# select database
$db_selected = mysql_select_db('xmessage', $db_link);
if (!$db_selected)
    die ('Cannot select database : ' . mysql_error());
$class=$_POST['nfame'];
# execute search query
$sql = "SELECT admin_no,name,class,number FROM student WHERE class='".$class."'";
$result = mysql_query($sql);

# check result
if (!$result)
    die('Could not successfully run query: ' . mysql_error());
    # display returned data
    echo "<center><form action='TMESSAGE_SENT.php' method='post'>";
$messagetype=$_POST['choose'];
if($messagetype=="absent"){

  echo $class;
  $date=$_POST['date'];
  echo "<center >Message Type:<input  type='' name='ftype' value='$messagetype'><br><br>";
  echo "Date:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  type='' name='date' value='$date''><br><br>";
  echo "Message Preview:<br><textarea >Your Child CHILDNAME WAS ABSENT ON $date</textarea>";
}elseif ($messagetype=="mark") {
  // code...
  $exam=$_POST['exam'];
  echo "<center >Message Type:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  type='' name='ftype' value='$messagetype''><br><br>";
  echo "Examname:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  type='' name='exam' value='$exam''><br><br>";
  echo "Message Preview:<br><textarea >Hello,Your Child Report For Exam:$exam. Mark</textarea>";
}elseif ($messagetype=="custom") {
  $message=$_POST['message'];
  // code...
  echo "<center >Message Type:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  type='' name='ftype' value='$messagetype''><br><br>";
  echo "Message:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input  type='' name='message' value='$message''><br><br>";
  echo "Message Preview:<br><textarea disabled>$message</textarea>";
}else {
  die("Please Select A Option");
}
if (mysql_num_rows($result) > 0)
{
  echo "<h1><center>STUDENTS LIST<BR></h1>";
  echo "<BODY background='assets/login-register.JPG'>";
echo "<link href='css/singlePageTemplate.css' rel='stylesheet' type='text/css'>";

    echo "<table>";

    echo '<input type="button" onclick="selectAll()" value="Select All"/>
    		<input type="button" onclick="UnSelectAll()" value="Unselect All"/>';
        echo"<input Value='Send' type='submit'/>";
            while ($row = mysql_fetch_assoc($result))
            {
                echo '<tr><td>';
                echo '<input type="checkbox" name="selected[]" value="'.$row['admin_no'].'"/>';
                echo '</td>';
                foreach ($row as $key => $value)
                    echo '<td>'.htmlspecialchars($value).'&nbsp;&nbsp;&nbsp;</td>';
                echo '</tr>';
            }

    echo"</table><br><br>";


    echo "</form";
    echo "</BODY>";
    echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
    echo "</html>";

  }
    else {
      echo "no student";
      echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
    }
  ?>







  <script type="text/javascript">
    function selectAll() {

        var items = document.getElementsByName('selected[]');
        for (var i = 0; i < items.length; i++) {
            if (items[i].type == 'checkbox')
                items[i].checked = true;
        }
    }

    function UnSelectAll() {
        var items = document.getElementsByName('selected[]');
        for (var i = 0; i < items.length; i++) {
            if (items[i].type == 'checkbox')
                items[i].checked = false;
        }
    }
</script>
