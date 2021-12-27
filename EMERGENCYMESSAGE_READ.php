<?php
$db_link = mysql_connect('localhost', 'naeem', 'naeem');
if (!$db_link)
    die('Cannot connect : ' . mysql_error());

# select database
$db_selected = mysql_select_db('xmessage', $db_link);
if (!$db_selected)
    die ('Cannot select database : ' . mysql_error());

# execute search query



if(!empty($_POST['selected'])) {
if(!isset($_POST['message'])){
  echo "string";
}
$message=$_POST['message'];
$message = preg_replace("/[^A-Za-z0-9]/", "", $message);


// Counting number of checked checkboxes.
$checked_count = count($_POST['selected']);
echo "You have selected following ".$checked_count." option(s): <br/>";
foreach($_POST['selected'] as $selected) {
$sql = "SELECT name,class,number FROM student WHERE admin_no='".$selected."'";
$result = mysql_query($sql);
if (!$result){
    die('Could not successfully run query: ' . mysql_error());
}
$result_set=mysql_fetch_array($result);
$numbersdata=$result_set['number'];

// Authorisation details.
$username = "macbethsoftwares@gmail.com";
$hash = "f7e40b601bbc359332e5706c5538061be5440be644893611190ffd5df1e1f791";

// Config variables. Consult http://api.textlocal.in/docs for more info.
$test = true;

// Data for text message. This is the text message data.
$sender = "TXTLCL"  ; // This is who the message appears to be from.
$numbers = $numbersdata; // A single number or a comma-seperated list of numbers
$message = $message;
echo $message."<br><br>";
// 612 chars or less
// A single number or a comma-seperated list of numbers
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
}

echo "Message sent successfully";
echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
}
else{
echo "<b>Please Select Atleast One Option.</b>";
echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
}


?>
