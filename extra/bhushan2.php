
<?php
ini_set('display_errors', 1);
$servername = "localhost";
$username = "root";
$password = "bhushan";
$dbname = "mg";
$con = new mysqli($servername, $username, $password, $dbname);
$sql1="SELECT email FROM email";
if ($result=mysqli_query($con,$sql1))
  {
    $total=mysqli_num_rows($result);
  }
echo $total;
$off=0;
while ($off<$total) {
  $sql="SELECT email from email limit 1000 offset $off";
  $result1 = $con->query($sql);
  if ($result1->num_rows > 0) {
     while($row = $result1->fetch_assoc()) {
        echo $row["email"];
        echo "<br>";
        echo mysqli_num_rows($result1);
}
}
$off=$off+1000;  //1000,
echo "ruchika";
}
?>
