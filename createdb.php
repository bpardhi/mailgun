
  <?php
  ini_set('display_errors', 1);
  $servername = "localhost";
  $username = "root";
  $password = "bhushan";
  $dbname = "inv";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
  }
  for($i=8000;$i<8200;$i++){
    $j=$i;
  $sql = "INSERT INTO `users_course` (`id`, `users_course_email`, `user_id`, `users_course_name`, `users_course_type`, `name`, `processing_fee`, `amount_quoted`, `users_course_amount`, `currency`, `discount`, `discount_type`, `users_course_payment_status`, `mode_of_training`, `training_prog_id`, `training_status`, `feedback_send`, `lead_source`, `refered_by`, `training_type`, `trainer_email`, `trainer_charges`, `venue_email`, `no_of_participants`, `participants_info`, `dates_opted`, `end_date`, `from_time`, `upto_time`, `time_zone`, `country`, `city`, `transaction_id`, `invoice_no`, `mode_of_transaction`, `transaction_datetime`, `remarks`, `flag`, `admin_email`, `course_stage`, `course_type`, `time_frame`, `users_course_time_stamp`, `last_modified`, `last_modified_by`) VALUES (NULL, '', '$j', '', '', '', NULL, NULL, '', NULL, NULL, NULL, 'Not Paid', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-08-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2017-07-31', NULL, NULL, NULL)";

   $conn->query($sql);
}
  ?>
