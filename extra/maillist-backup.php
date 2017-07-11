
<?php



require 'vendor/autoload.php';
use Mailgun\Mailgun;

$mgClient = new Mailgun('key-0427bd4591761a73f95fb3769c02ef55');
$listAddress = 'mail@sandboxd2f0c1e9c484445c839c3632037e853b.mailgun.org';
//2017-06-15
$date = date("Y/m/d", strtotime(" +4 months"));

$sql = "SELECT a.email, a.name, b.dates_opted
        FROM users a, users_course b0
        WHERE a.email = b.users_course_email  ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()) {
     
     $emailtoadd=$row["email"];
      $name= $row["name"];


      $result = $mgClient->post("lists/$listAddress/members", array(
          'address'     => $emailtoadd,
          'name'        => $nameA,
          'description' => 'customers',
          'subscribed'  => true,
          'vars'        => '{"age": 26}'
      ));


   }
}

 ?>
