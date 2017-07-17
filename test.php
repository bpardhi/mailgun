<?php
function sendMail($q, $m){
    include("config.php");

      $sql1=$q;
      $msg=$m;
        if ($result=mysqli_query($con,$sql1)){
          $total=mysqli_num_rows($result);
        }
      echo "</br>total no of emails :".$total;
      $off=0;
      echo $q;
      while ($off<$total) {
        $sql=$q;
        $result1 = $con->query($sql);
          if ($result1->num_rows > 0) {
            while($row = $result1->fetch_assoc()) {
                  $to[]=$row['email'];
                  $maildata[$row['email']] = ['first'=>$row['name'],'id'=>$row['id']];
                  $x= json_encode($maildata);
              }
               echo "</br>***".$x."</br>";
            $result = $mgClient->sendMessage($domain, array(
            'from'    => 'bhushan <testmailgunbp@gmail.com>',
            'to'      => $to,
            'subject' => 'Hey %recipient.first%',
            'text'    => $msg,
            'o:campaign-id'=>$cid,
            'o:compaign-name' =>$cname,
            'o:tag' => 'remainder1',
            'recipient-variables' =>$x
          ));
      }
      $off=$off+100;
      }
      echo "Message Sent for payment reminder";
}//funct sendmail ends
$sqlp="SELECT a.id, a.email, a.name, b.dates_opted
        FROM users a, users_course b
        WHERE a.email = b.users_course_email and b.dates_opted
        BETWEEN '" . $today . "' AND  '" . $date . "'
          AND b.users_course_payment_status='Paid' limit 100 offset $off";
$sqlp2="SELECT a.id, a.email, a.name, b.dates_opted, b.users_course_payment_status
        FROM users a, users_course b
        WHERE a.email = b.users_course_email and b.dates_opted
        BETWEEN '" . $today . "' AND  '" . $date . "'
          AND b.users_course_payment_status='Not Paid' limit 100 offset $off";
$msgRem="Dear %recipient.first% This is to remind you about the course you have opted for.
              Please login to check dates.
If you wish to unsubscribe,click http://mailgun/unsubscribe/%recipient.id%";
$msgNpaid="Dear %recipient.first% We are thrilled that you will be joining course at invensis learning!
  I wanted to personally update you regarding your outstanding payment.
  Please go into the online registration system at www.abcd.net/payment and
  make a payment before the payment deadline.
If you wish to unsubscribe,click http://mailgun/unsubscribe/%recipient.id%";
sendMail($sqlp,$msgNpaid);

?>
