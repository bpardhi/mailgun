 <?php
 error_reporting(E_ALL);
 echo "bhushan";
 $servername = "localhost";
 $username = "root";
 $password = "bhushan";
 $dbname= "mg";
 $conn = new mysqli($servername, $username, $password, $dbname);

 $i=0;
 for($i=0; $i<=1000; $i++) {
    $sql = "INSERT INTO email (id,name,email) VALUES ('$i','Steves Roggers', 'bhushanmgtest@gmail.com');";
    $conn->query($sql);
 }

?>
