<?php
$messagevalue=null;

if(isset($_POST['ftype'])){
$messagetype=$_POST['ftype'];

if($messagetype=="absent"){

  $date=$_POST['date'];
sent($date,$messagetype);
}elseif ($messagetype=="mark") {
  // code...

  $exam=$_POST['exam'];
sent($exam,$messagetype);
}elseif ($messagetype=="custom") {

  $message=$_POST['message'];

  $message=strval($message);

  // code...
sent($message,"car");}}

  else {
    echo "No Value";
  }
   function sent($value,$value2)
  {
    $db_link = mysql_connect('localhost', 'naeem', 'naeem');
    if (!$db_link)
        die('Cannot connect : ' . mysql_error());

    # select database
    $db_selected = mysql_select_db('xmessage', $db_link);
    if (!$db_selected)
        die ('Cannot select database : ' . mysql_error());

    # execute search query


    $checked_count = count($_POST['selected']);
    echo "You have selected following ".$checked_count." option(s): <br/>";
    foreach($_POST['selected'] as $selected) {

    $sql = "SELECT name,class,number FROM student WHERE admin_no='".$selected."'";
    $result = mysql_query($sql);
    if (!$result){
        die('Could not successfully run query: ' . mysql_error());
    }
    $result_set=mysql_fetch_array($result);
    $name=$result_set['name'];
    $numbersdata=$result_set['number'];
    $message=message($value2,$selected,$value);
    // Authorisation details.
    $username = "macbethsoftwares@gmail.com";
    $hash = "f7e40b601bbc359332e5706c5538061be5440be644893611190ffd5df1e1f791";

    // Config variables. Consult http://api.textlocal.in/docs for more info.
    $test = "true";

    // Data for text message. This is the text message data.
    $sender = "TXTLCL  "  ; // This is who the message appears to be from.
    $numbers = $numbersdata; // A single number or a comma-seperated list of numbers


    // 612 chars or less
    // A single number or a comma-seperated list of numbers
    echo "messahge is: $message";
    $message = preg_replace("/[^A-Za-z0-9]/", "", $message);
    $message = urlencode($message);
    $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;

    $ch = curl_init('http://api.textlocal.in/send/?');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $resultinfo = curl_exec($ch); // This is the result from the API


    $result = json_decode($resultinfo);
        if ($result->status == 'failure') {
            echo ("Unable to sent message to '".$numbers."'. Error report: " . $resultinfo."<br>");
        }curl_close($ch);
    // code...

  }
echo "Message Sent Succeffully";
}
  function message($value3,$adm,$dt)
  {

    $jointmessage="";
    $sql = "SELECT name,class,number FROM student WHERE admin_no='".$adm."'";
    $result = mysql_query($sql);
    $result_set=mysql_fetch_array($result);
    $name=$result_set['name'];
$messagedata=$value3;
    $sql = "SELECT name,class,number FROM student WHERE admin_no='".$adm."'";
    $result = mysql_query($sql);
    if (!$result){
        die('Could not successfully run query: ' . mysql_error());
    }
    $result_set=mysql_fetch_array($result);
    if($messagedata=="absent"){
      $name=$result_set['name'];
      $messagevalue="Dear Parent,Your Child $name Was Absent On $dt";
      }
      elseif ($messagedata=="mark") {

        $messagevalue="REPORT CARD  EXAM NAME:$dt Student Name:$name MARKS ";

        $examname=mysql_real_escape_string($dt);
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
$jointmessage=$jointmessage."$columntable:$mark";
$j++;
  ft:
}
  $i++;        // code...
        }
        // code...
$messagevalue=$messagevalue;
$messagevalue=$messagevalue.$jointmessage;
$messagevalue=$messagevalue;
}else {
  $messagevalue=$dt;
}
    // code...
    return $messagevalue;
  }
  echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
?>
