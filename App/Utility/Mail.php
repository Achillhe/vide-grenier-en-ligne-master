<?php
   namespace App\Utility;
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   use PHPMailer\PHPMailer\SMTP;

    require 'vendor/PHPMailer-6.8.0/src/Exception.php';
    require 'vendor/PHPMailer-6.8.0/src/PHPMailer.php';
    require 'vendor/PHPMailer-6.8.0/src/SMTP.php';


   /**
    * Mail
    */
   class Mail{

    /**
     * sendMail
     * @param string $recv
     * @param string $content
     */
    static function sendMail($recv="videgrenier-enligne@outlook.fr", $content="hello", $title="Vos produits ont intéressé quelqu'un !"){


   $mail = new PHPMailer(true);

   $mail->SMTPOptions = array(
    'tls' => array(
    'verify_peer' => false,
    'verify_peer_name' => false,
    'allow_self_signed' => true
    )
    );
    $mail->CharSet = 'UTF-8';

   $mail->SMTPDebug = 2;

   $mail->isSMTP();

   $mail->Host = 'smtp.office365.com';

   $mail->SMTPAuth = true;

   $mail->Username = "videgrenier-enligne@outlook.fr";

   $mail->Password = "videgrenier1234";

   $mail->SMTPSecure = "tls";

   $mail->Port = 587;

   $mail->From = "videgrenier-enligne@outlook.fr";

   $mail->FromName = "VideGrenier";

   $mail->isHTML(true);

   $mail->Subject = $title;

   $mail->Body =  $content;

   $mail->AltBody = "This is the plain text version of the email content";


   try {

       $mail->send();

       echo "Message has been sent successfully";

   } catch (Exception $e) {

       echo "Mailer Error: " . $mail->ErrorInfo;

   }
    }}
?>