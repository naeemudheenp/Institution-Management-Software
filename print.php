<html>
<head>

</head>


<?php
echo "<link rel='stylesheet' href='margin.css'>";

$db_link = mysql_connect('localhost', 'naeem', 'naeem','xmessage');
if (!$db_link)
    die('Cannot connect : ' . mysql_error());

# select database
$db_selected = mysql_select_db('xmessage', $db_link);
if (!$db_selected)
    die ('Cannot select database : ' . mysql_error());
if(isset($_POST['examname'])&&isset($_POST['adm'])){
$examname=$_POST['examname'];
$adm=$_POST['adm'];
if($examname=="" || $adm==""){
  die("Please Enter The Data");
}
$sql = "SELECT name,class,number FROM student WHERE admin_no='".$adm."'";
$result = mysql_query($sql);
if (!$result){
    die('Could not successfully run query: ' . mysql_error());
}
$examsql="SELECT name FROM exam WHERE exam='".$examname."'";
$examsqlsync=mysql_query($examsql);
$examsqlreader=mysqL_fetch_array($examsqlsync);
if(!$examsqlreader){
  die("EXAM NOT FOUND");
}
$examinfo=$examsqlreader['name'];
$examdiplayname=$examinfo;
$result_set=mysql_fetch_array($result);
$name=$result_set['name'];
$studentsql="SELECT * from student where admin_no='".$adm."'";
$studentsqlsync=mysql_query($studentsql);
if(!$studentsqlsync){
  die("Eroor".mysql_error());
}
$studentsqlreader=mysqL_fetch_array($studentsqlsync);
echo "<div class='print1' >";
echo "<center>";
echo "<H1>KUNHALI MARRAKAR HSS</H1>";
echo "<H3>REPORT CARD</H3>";

echo "<table border='+2'>";
echo "<tr><th>EXAM NAME</th>";
echo "<th>STUDENT ADM NO.</th>";
echo "<th>STUDENT NAME</th>";
echo "<th>CLASS</th>";
echo "<th>ROLL NO.</th>";
echo "</tr>";
echo "<tr>";
echo "<td>$examdiplayname<br></td>";
$sum=0;

$name=$studentsqlreader['name'];
$class=$studentsqlreader['class'];
$roll=$studentsqlreader['rollno'];

echo "<td>$adm </td>";
echo "<td>$name</td>";
echo "<td>$class</td>";
echo "<td>$roll</td></tr></table>";
echo "</h5></p>";
echo "<center>";
echo "<table border='+2'";
        $examname=mysql_real_escape_string($examname);
        $sql="SELECT * FROM ".$examname." WHERE admin='".$adm."'";
        $selectsqlsync=mysql_query($sql);
        if(!$selectsqlsync){
          die("Error5".mysql_error());
        }
        $selectreader=mysqL_fetch_array($selectsqlsync);
        if(!$selectreader){
          die("STUDENT WITH $adm ADMMISION ID  NOT FOUND IN EXAM LIST".mysql_error());
        }
        $i=0;
        $j=0;
        foreach ($selectreader as $key => $value) {

if($i>4){
  if($j==1){
      $j=0;
    goto ft;

  }

  $columntable=mysql_real_escape_string($key);
$marksql="SELECT ".$columntable." FROM ".$examname." WHERE admin='".$adm."'";
$marksqlsync=mysql_query($marksql);
$markarray=mysqL_fetch_array($marksqlsync);
$mark=$markarray[$key];
$sum=$sum+$mark;

echo "<tr>";

echo "<td>$columntable</td>";
echo "<td>$mark</td>";
echo "</tr>";
echo "</tr>";



$j++;
  ft:
}
  $i++;        // code...
        }
        echo "</table>";
        echo "<BR><BR><BR>";
        echo "<DIV>";
        echo '<p align="left">'.$sum.'</p>';
        echo "<p align='left'>TOTAL MARK &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;PRINCIPAL SIGN&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;TEACHER SIGN&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;PARENT SIGN</p>";
        echo "</DIV>";
        echo "</div>";

}

else {
  echo "Please Enter Data";
}

echo "</table><br><br>";
?>




<body>
  <script type="text/JavaScript">


window.print();

  </script>
</body>
</html>
