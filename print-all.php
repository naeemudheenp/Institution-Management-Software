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
if(isset($_POST['examname'])){
$examname=$_POST['examname'];
if($examname==""){
  die("Please Enter The Data");
}
$f=0;
$examsql="SELECT name FROM exam WHERE exam='".$examname."'";
$examsqlsync=mysql_query($examsql);
$examsqlreader=mysqL_fetch_array($examsqlsync);
if(!$examsqlreader){
  die("EXAM NOT FOUND");
}
$examinfo=$examsqlreader['name'];

echo "<center>";
        echo "<H2>KUNHALI MARRAKAR HSS<BR></H2><BR>";
        echo "<H3>REPORT CARD</H3> <BR><BR>";
        echo "Exam Name:$examinfo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<table border='2'>";
        echo "<tr>";
        echo "<th>admin id</th>";
        echo "<div class='p'>";
        $examname=mysql_real_escape_string($examname);
        $sql="SELECT * FROM ".$examname." ";
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
$marksql="SELECT ".$columntable." FROM ".$examname."";
$marksqlsync=mysql_query($marksql);
$markarray=mysqL_fetch_array($marksqlsync);
$mark=$markarray[$key];




echo "<th>$columntable</th>";
$ar[$f]=$columntable;
$f++;


$j++;
  ft:
  $g=0;
}
  $i++;        // code...
        }
echo "<tr>";
        $f=0;
        $marksql="SELECT admin FROM ".$examname."";
        $marksqlsync=mysql_query($marksql);
        while($markarray=mysqL_fetch_array($marksqlsync)){
        $ar[$f]= $markarray['admin'];
        $f++;

}
$end=$f;

for($f=1;$f<$end;$f++){
$marksql="SELECT * FROM ".$examname." where admin='".$ar[$f]."'";
$marksqlsync=mysql_query($marksql);
while($markarray=mysqL_fetch_array($marksqlsync)){
echo "<tr>";
$k=0;
foreach ($markarray as $value) {
if($value==null|| $k==1){
$k=0;
  continue;
}

  echo "<td>".$value."";
$k=$k+1;

}
       // code...
}echo "<br></tr>";

}}
else {
  echo "Please Enter Data";
}

echo "</table><br><br>";
?>




<body>
  <input  class='scard1'  type='button' id='print'  value='print' onClick='onprint()'>
  <script type="text/JavaScript">
  function onprint(){

  var printbutton= document.getElementById('print');
    printbutton.style.visibility='hidden';
    window.print();
      printbutton.style.visibility='visible';
 }
  </script>
<div>
-KMHSS-
</div>
</body>
</html>
