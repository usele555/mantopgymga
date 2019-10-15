<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/src/SMTP.php';

// Load Composer's autoloader
require '../vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host = 'smtp01.binero.se';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
    $mail->Username = 'hemsida@mantorpgym.se';                     // SMTP username
    $mail->Password = 'Hemsida2019!';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->CharSet = 'utf-8';
    
    //Recipients
    
    $mail->addReplyTo($_POST['email_input'], $_POST['name_input']);
    $mail->setFrom("info@gym.berzanlabb.se","Kontaktformulär på mantorpgym.se från ".$_POST['name_input'] );
    $recipient = $_POST['name_select'];
    $mail->addAddress($recipient);     // Add a recipient
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['subject_input'];
    $mail->Body = $_POST['message_input']."<br><br><b>FÖR ATT UPPFYLLA GDPR:s KRAV, TA BORT DETTA MEDDELANDE DÅ ÄRENDET ÄR AVKLARAT</b>";
    $mail->AltBody = $_POST['message_input'];
    $mail->send();
    header('Location: /kontakt');
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
