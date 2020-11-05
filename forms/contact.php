<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'aniketskhara@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  // $contact->smtp = array(
  //   'host' => 'example.com',
  //   'username' => 'aniketkharaofficial@gmail.com',
  //   'password' => 'aniket@123456',
  //   'port' => '587'
  // );


  // $contact->add_message( $_POST['name'], 'From');
  // $contact->add_message( $_POST['email'], 'Email');
  // $contact->add_message( $_POST['message'], 'Message', 10);

  // echo $contact->send();

  require 'PHPMailerAutoload.php';

  $mail = new PHPMailer;
  
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'aniketkharaofficial@gmail.com';                 // SMTP username
  $mail->Password = 'aniket@123456';                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted
  
  $mail->From = 'from@example.com';
  $mail->FromName = 'Mailer';
  $mail->addAddress('aniketskhara@gmail.com', 'Aniket Khara');     // Add a recipient
  $mail->addAddress('aniketskhara@gmail.com');               // Name is optional
  $mail->addReplyTo('info@example.com', 'Information');
  // $mail->addCC('cc@example.com');
  // $mail->addBCC('bcc@example.com');
  
  $mail->WordWrap = 50;                                 // Set word wrap to 50 characters
  // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  $mail->isHTML(true);                                  // Set email format to HTML
  
  $mail->Subject = 'Here is the subject';
  $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  
  if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      echo 'Message has been sent';
  }
?>
