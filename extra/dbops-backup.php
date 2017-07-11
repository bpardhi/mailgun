<?php
error_reporting(1);
include("index.php");
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "bhushan";
$dbname = "mg";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, email FROM email";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
     $Option['TO_MAIL']=$row["email"];
      $Option['TO_NAME']=$row["name"];


      $result1 = $mailgun->sendMessage($domain, array(

          'from'    => $Option['FROM_NAME']." <".$Option['FROM_MAIL'].">",
          'to'      => $Option['TO_NAME']." <".$Option['TO_MAIL'].">",
          'subject' => $Option['SUBJECT'],
          'text'    => $Option['BODY_TEXT'],
          'html'    => $Option['BODY_HTML'],



     ));

     var_dump($result1);
   }
} else {
   echo "0 results";
}


$conn->close();
?>
