<html>
<head>
  <body background="assets/login-register.JPG">
<?php
echo "<htmL>";

$db_link = mysql_connect('localhost', 'naeem', 'naeem');
if (!$db_link)
    die('Cannot connect : ' . mysql_error());

# select database
$db_selected = mysql_select_db('xmessage', $db_link);
if (!$db_selected)
    die ('Cannot select database : ' . mysql_error());

# execute search query
$sql = 'SELECT admin_no,name,class,number FROM student';
$result = mysql_query($sql);

# check result
if (!$result)
    die('Could not successfully run query: ' . mysql_error());
    # display returned data
if (mysql_num_rows($result) > 0)
{
  echo "<center><form action='MESSAGE_READ.php' method='post'>";
  echo "<h1><center>STUDENTS LIST<BR></h1>";


  echo "<CENTER><textarea name='message' size='60'></textarea><br><br>";


echo "<link href='css/singlePageTemplate.css' rel='stylesheet' type='text/css'>";

    echo "<table>";
  echo"<input Value='SEND' type='submit'/>";
echo '<input type="button" onclick="selectAll()" value="Select All"/>
		<input type="button" onclick="UnSelectAll()" value="Unselect All"/>
    <a href="balance.php"><input type="button" value="balance"></a>';

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
    echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';

    }
    else {
      echo "No Students.";
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
</body>
</head>
</html>
