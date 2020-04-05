<?php

$userName = $_POST['user_name'];
$userPhone = $_POST['user_phone'];
$userCall = $_POST['user_call'];
$userQuestions = $_POST['user_text'];


// Load Composer's autoloader
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->CharSet = 'utf-8';

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'semenovaleksandr407@gmail.com';                     // SMTP username
    $mail->Password   = '242175rko05';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('semenovaleksandr407@gmail.com', 'Розовый Фламинго');
    $mail->addAddress('sniper.semenov@ukr.net', 'Joe User');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Новая заявка с сайта - "Розовый Фламинго"';
    $mail->Body    = '
        Как к Вам обращаться: ' . $userName . '<br> 
        Телефон: ' . $userPhone . '<br>
        Способ связи: ' . $userCall . '<br>
        Ваш вопрос: ' . $userQuestions . '
    ';

    if ($mail->send()) {
        echo "ok";
    } else {
        echo "Письмо не отправлено. Код ошибки: {$mail->ErrorInfo}";
    }
    
    //header('Location: thanks.html');
} catch (Exception $e) {
    echo "Письмо не отправлено. Код ошибки: {$mail->ErrorInfo}";
}