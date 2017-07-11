
<?php
ini_set('display_errors', 1);
//include("dbops.php");
require 'vendor/autoload.php';
use Mailgun\Mailgun;
$servername = "localhost";
$username = "root";
$password = "bhushan";
$dbname = "inv";
$conn = new mysqli($servername, $username, $password, $dbname);

$mgClient = new Mailgun('key-0427bd4591761a73f95fb3769c02ef55');
$listAddress = 'mail@sandboxd2f0c1e9c484445c839c3632037e853b.mailgun.org';
//2017-06-15
$date = date("Y/m/d", strtotime(" +4 months"));
$today=date("Y/m/d");
$date1=strtotime($date);
$today1=strtotime($today);
$sql = "SELECT a.email, a.name, b.dates_opted
        FROM users a, users_course b
        WHERE a.email = b.users_course_email  ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {

    if( (strtotime($row["dates_opted"])>$today) && (strtotime($row["dates_opted"]<$date))  ){

     $emailtoadd=$row["email"];
      $name= $row["name"];
      // $result1 = $mgClient->post("lists/$listAddress/members", array(
      //     'address'     => $emailtoadd,
      //     'name'        => $name,
      //     'description' => 'customers',
      //     'subscribed'  => true,
      //     'vars'        => '{"age": 26}'
      // ));
      echo $row["email"];
      echo "<br>";
     echo $row["dates_opted"];
     echo "<br>";
}
}
}
}

 ?>
