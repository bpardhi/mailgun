<?php

  $con=mysqli_connect("localhost","root","bhushan","mg");

  if (mysqli_connect_errno())
  {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $query = "SELECT name,email,id FROM email limit 1";

  $result = mysqli_query($con,$query);

  $rows = array();
  while($r = mysqli_fetch_array($result)) {
    $rows[] = $r;
  }
  echo json_encode($rows);
  json_decode($rows);


  recipientVars = {
    'bob@companyx.com': {
      first: 'Bob',
      id: 1
    }

    [
     {
        "0":"Steves Roggers",
        "name":"Steves Roggers",
        "1":"bhushanmgtest@gmail.com",
        "email":"bhushanmgtest@gmail.com",
        "2":"1",
        "id":"1"
     }
  ]

  ?>
