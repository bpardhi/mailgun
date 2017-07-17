  <?php

  if(isset($_POST["submit"] ))
  {
        $cname = $_POST["name"];
        $task = $_POST["task"];

  function sendMail($t){

      if ($t == "reminder") {
        include("config.php");
        $sql1="SELECT a.id, a.email, a.name, b.dates_opted
                FROM users a, users_course b
                 WHERE a.id = b.user_id and b.dates_opted
                BETWEEN '" . $today . "' AND  '" . $date . "'
                    AND b.users_course_payment_status='Paid' limit 100 offset $off";
          if ($result=mysqli_query($con,$sql1)){
            $total=mysqli_num_rows($result);
          }
        echo "</br>total no of emails :".$total;
        $off=0;
        while ($off<$total) {
          $sql="SELECT a.id, a.email, a.name, b.dates_opted
                  FROM users a, users_course b
                   WHERE a.id = b.user_id and b.dates_opted
                   BETWEEN '" . $today . "' AND  '" . $date . "'
                     AND b.users_course_payment_status='Paid' limit 100 offset $off";
          $result1 = $con->query($sql);
            if ($result1->num_rows > 0) {
              while($row = $result1->fetch_assoc()) {
                    $to[]=$row['email'];
                    $maildata[$row['email']] = ['first'=>$row['name'],'id'=>$row['id']];
                    $x= json_encode($maildata);
                }
                 echo "</br>***".$x."</br>";
                 $res=$mgClient->PUT /sandbox27de0e7e6ba14d88a638bc02d3167f41.mailgun.org/campaigns/$cname;

              $result = $mgClient->sendMessage($domain, array(
              'from'    => 'bhushan <testmailgunbp@gmail.com>',
              'to'      => $to,
              'subject' => 'Hey %recipient.first%',
              'text'    => 'Dear %recipient.first% This is to remind you about the course you have opted for.
                            Please login to check dates.

                            If you wish to unsubscribe,
                            click %unsubscribe_url%',
              'campaigns-id'=>$cid,
              'campaigns-name' =>$cname,
              'o:tag' => $cname,
              'recipient-variables' =>$x
            ));
        }
        $off=$off+100;
        var_dump($result);

        }
        echo "Message Sent for payment reminder";


      } elseif ($t == "payreminder") {

        include("config.php");

        $result="SELECT a.id, a.email, a.name, b.dates_opted, b.users_course_payment_status
                FROM users a, users_course b
                 WHERE a.id = b.user_id and b.dates_opted
                BETWEEN '" . $today . "' AND  '" . $date . "'
                  AND b.users_course_payment_status='Not Paid' limit 100 offset $off";
          if ($result1=mysqli_query($con,$result)){
            $total=mysqli_num_rows($result1);
          }
        echo "</br>total no of emails :".$total;
        $off=0;
        while ($off<$total) {
          $sql="SELECT a.id, a.email, a.name, b.dates_opted, b.users_course_payment_status
                  FROM users a, users_course b
                   WHERE a.id = b.user_id and b.dates_opted
                   BETWEEN '" . $today . "' AND  '" . $date . "'
                  AND b.users_course_payment_status='Not Paid' limit 100 offset $off";
          $result1 = $con->query($sql);
            if ($result1->num_rows > 0) {
              while($row = $result1->fetch_assoc()) {
                    $to[]=$row['email'];
                    $maildata[$row['email']] = ['first'=>$row['name'],'id'=>$row['id']];
                    $x= json_encode($maildata);
                }

              $result = $mgClient->sendMessage($domain, array(
              'from'    => 'bhushan <testmailgunbp@gmail.com>',
              'to'      => $to,
              'subject' => 'Hey %recipient.first%',
              'text'    => ' Dear %recipient.first% We are thrilled that you will be joining course at invensis learning!
                I wanted to personally update you regarding your outstanding payment.
                Please go into the online registration system at www.abcd.net/payment and
                make a payment before the payment deadline.
              If you wish to unsubscribe,click http://mailgun/unsubscribe/%recipient.id%',
              'o:campaign-id'=>$cid,
              'o:compaign-name' =>$cname,
              'o:tag' => $cname,
              'recipient-variables' =>$x
            ));
        }
        $off=$off+100;
        var_dump($result);

        }
        echo "Message Sent for payment reminder";


      }//loop end elseif

  }//funct sendmail ends
  sendMail($task);
  }
  ?>
