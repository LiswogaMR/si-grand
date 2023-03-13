<?php

   include("connection.php");

   $name = trim(stripslashes($_POST['name']));
   $email = trim(stripslashes($_POST['email']));
   $subject = "Si-Grand online retail query";
   $contact_message = trim(stripslashes($_POST['message']));

   if(isset($name) && isset($mail)){
      //Insert a new user
      $sql = "INSERT INTO si-grand (email, comments, datetime) VALUES ('".$name."', '".$surname."', '".$contact_message."')";
      
      //Email the credentials to the new user
      if (mysqli_query($conn, $sql)){
         //Send to myself an email
         $to = "Tshimabiblos0925@gmail.com";
         
         $subject = "Notification From Si-grand Website";

         $message_mail = "There is a new notification from the Website. it is From :" .$name ."<br/><br/>";
         $message_mail .= "It is from Email : ".$email. "The message is : ".$contact_message;

         // Always set content-type when sending HTML email
         $headers = "MIME-Version: 1.0" . "\r\n";
         $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

         // More headers
         $headers .= 'From: si-grand@gmail.co.za' . "\r\n";

         //cc the other team members who are supposed to get the notification
         $headers .= 'Cc:LanceR@gmail.com' . "\r\n";
         // $headers .= 'Cc: myboss@example.com' . "\r\n";
         $template = file_get_contents('../emails/employee.php');
         $template = str_replace('[message]', $message_mail, $template);
         mail($to,$subject,$template,$headers);
         
         //send confirmation email to the external user.
         $to = $mail;
         $subject = "Confirmation Of Message Sent";
         $message =" <br/>Thank You, You have Sent a message to the Si-grand members. One of our team members will be in contact with you soon.<br/><br/>";

         // Always set content-type when sending HTML email
         $headers = "MIME-Version: 1.0" . "\r\n";
         $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
         // More headers
         $headers .= 'From: appraisal@vexall.co.za' . "\r\n";
         $headers .= 'Cc:rofhiwa.liswoga@vexall.co.za' . "\r\n";
         // $headers .= 'Cc: myboss@example.com' . "\r\n";
         $template = file_get_contents('../emails/appraisal_external_link.php');
         $template = str_replace('[name]', $name, $template);
         $template = str_replace('[message]', $message, $template);
         mail($to,$subject,$template,$headers);

      ?>
         <script>
            alert("Messege Successfully Sent. One of our Admin Will attend to it ASAP.");
            window.location.href="../index.php"; 
         </script>
      <?php
      
      }else{
         //still send an notification to show there was an error with inserting a user message to the developer team to have a look.

         //the developer is Liswoga
         $to = "Liswogar1@gmail.com";
         
         $subject = "Error Notification From Si-grand Website";

         $message_mail = "There Was an error with inserting records and sending mail From the Si-grand Website. Please have a Look.<br/><br/>";

         // Always set content-type when sending HTML email
         $headers = "MIME-Version: 1.0" . "\r\n";
         $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

         // More headers
         $headers .= 'From: si-grand@gmail.co.za' . "\r\n";

         // $headers .= 'Cc: myboss@example.com' . "\r\n";
         $template = file_get_contents('../emails/employee.php');
         $template = str_replace('[message]', $message_mail, $template);
         mail($to,$subject,$template,$headers);

         //notify the user that their email was not sent
         ?>
         <script>
               alert("Messege not Sent. Please check your form or try again later.");
               window.location.href="../../index.php"; 
         </script>
         <?php
      }
   }else{ 
   ?>
      <script>
            alert("Messege not Sent. Please check your form or try again later.");
            window.location.href="../../index.php"; 
      </script>
   <?php
   }

?>


