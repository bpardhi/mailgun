<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;
    $off=0;
    $cid=mt_rand();
    $mgClient = new Mailgun('key-342c837c9a0cee132186a11d63b02fe7');
    $domain = "sandbox27de0e7e6ba14d88a638bc02d3167f41.mailgun.org";
    $servername = "localhost";
    $username = "root";
    $password = "bhushan";
    $dbname = "inv";
    $con = new mysqli($servername, $username, $password, $dbname);
    $date = date("Y-m-d", strtotime(" +4 months"));
    $today=date("Y-m-d");
    $date1=strtotime($date);
    $today1=strtotime($today);
    echo "today is:".$today;
    echo "<br>upto:".$date;
?>
