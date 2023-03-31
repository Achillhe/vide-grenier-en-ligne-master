<?php
   namespace App\Utility;


   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\SMTP;
   use PHPMailer\PHPMailer\Exception;

   require '../../vendor/autoload.php';

   /**
    * Mail
    */
   class Mail{

    /**
     * sendMail
     * @param string $recv
     * @param string $content
     */
    public static function sendMail($subject, $body) {
        // Instantiation de PHPMailer
        $mail = new PHPMailer(true);
    
        try {
            // Configuration de SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'videgrenier-enligne@outlook.fr';  // Adresse Gmail
            $mail->Password = 'videgrenier1234';  // Mot de passe Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
    
            // Configuration de l'email
            $mail->setFrom('videgrenier-enligne@outlook.fr', 'Vide Grenier');  // Adresse email expéditeur
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body;
    
            // Envoi de l'email
            $mail->send();
            echo 'Email envoyé avec succès';
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}";
        }
    }
}
?>