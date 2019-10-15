<?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../vendor/PHPMailer/src/PHPMailer.php';
    require '../vendor/PHPMailer/src/SMTP.php';
    require '../vendor/autoload.php';
    require '../app/backend/conn.php';
    $mail = new PHPMailer(true);

    if (isset($_POST['submit_email']) && $_POST['email']) {
        $select = runQuery('select email,password from users where email=?', true, array($_POST['email']));


        var_dump($select);
        
        $email = md5($select[0]['email']);
        echo $email."<br>";
        
        $pass = md5($select[0]['password']);
        echo $pass;

        $link = "<a href='http://site.mantorpgym.se/resetPasswordForm?key=".$email.'&reset='.$pass."'>Klicka här för att återställa ditt lösenord.</a>";

        
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host = 'smtp01.binero.se';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                   // Enable SMTP authentication
    $mail->Username = 'hemsida@mantorpgym.se';                     // SMTP username
    $mail->Password = 'Hemsida2019!';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->CharSet = 'utf-8';

        $mail->From = 'info@gym.berzanlabb.se';
        $mail->FromName = 'Mantorp Gym';
        $mail->AddAddress($select[0]['email']);
        $mail->Subject = 'Återställning av lösenord';
        $mail->IsHTML(true);
        $mail->Body = 'En begäran att återställa ditt lösenord har gjorts. Om det inte var du som gjorde begäran kan du ignorera detta meddelande. '.$link.'';
        if ($mail->Send()) {
            echo 'Check Your Email and Click on the link sent to your email';
            header('Location: /login');
        } else {
            echo 'Mail Error - >'.$mail->ErrorInfo;
        }
    }
