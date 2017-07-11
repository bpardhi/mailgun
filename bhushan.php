<?php
ini_set('display_errors', 1);
require 'vendor/autoload.php';
use Mailgun\Mailgun;

# Instantiate the client.
$mgClient = new Mailgun('YOUR_API_KEY');
$domain = "YOUR_DOMAIN_NAME";
$servername = "localhost";
$username = "root";
$password = "bhushan";
$dbname = "mg";
$con = new mysqli($servername, $username, $password, $dbname);
$sql1="SELECT email FROM email";
  if ($result=mysqli_query($con,$sql1)){
    $total=mysqli_num_rows($result);
  }
echo $total;
$off=0;
$i=0;
while ($off<$total) {
  $sql="SELECT email from email limit 100 offset $off";
  $result1 = $con->query($sql);
  if ($result1->num_rows > 0) {
     while($row = $result1->fetch_assoc()) {
       echo $i++."__";

      //  echo $row["email"];
//echo "<br>";
        //echo mysqli_num_rows($result1);
        //mailgun

        $result = $mgClient->sendMessage($domain, array(
            'from'    => 'Excited User <YOU@YOUR_DOMAIN_NAME>',
            'to'      => array('bob@example.com, alice@example.com'),
            'subject' => 'Hey %recipient.first%',
            'text'    => 'If you wish to unsubscribe,
                                  click http://mailgun/unsubscribe/%recipient.id%',
                    'recipient-variables' => '{"bob@example.com": {"first":"Bob", "id":1},
                                               "alice@example.com": {"first":"Alice", "id": 2}}'
        ));//mailgun ends

      }
  }
$off=$off+100;  //1000,
$i=0;
echo "<br>";
}
?>
