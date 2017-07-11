<?php
$date = date("Y/m/d", strtotime(" +1 months"));
    echo $date;

//SELECT a.email, a.name, b.dates_opted FROM users a, users_course b
//WHERE a.email = b.users_course_email

?>
if($row["dates_opted"]>$today && $row["dates_opted"]<$date){
