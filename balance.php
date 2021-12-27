<?php
// Authorisation details.
$username = "macbethsoftwares@gmail.com";
$hash = "f7e40b601bbc359332e5706c5538061be5440be644893611190ffd5df1e1f791";

// You shouldn't need to change anything here.
$data = "username=".$username."&hash=".$hash;
$ch = curl_init('http://api.textlocal.in/balance/?');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$credits = curl_exec($ch);
// This is the number of credits you have left
echo "<h4>Balance:".$credits;
curl_close($ch);
echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
?>
