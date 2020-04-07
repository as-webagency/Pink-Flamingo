<?php

$userName = $_POST['user_name'];
$userPhone = $_POST['user_phone'];
$userCall = $_POST['user_call'];

if (isset($_POST['user_email']) or !empty($_POST['user_email'])) {
    $userEmail = $_POST['user_email'];
} 

if (isset($_POST['user_text']) or !empty($_POST['user_text'])) {
    $userQuestions = 'Ваш вопрос: ' . $_POST['user_text'] . '';
} 

if (isset($_POST['first']) or !empty($_POST['first'])) {
    $discount = 'Ваша квартира после ремонта? - ' . $_POST['first'] . '';
}

if (isset($_POST['second']) or !empty($_POST['second'])) {
    $discount = 'Укажите площадь Вашей квартиры/дома? - ' . $_POST['second'] . '';
}

if (isset($_POST['third']) or !empty($_POST['third'])) {
    $discount = 'Как давно у Вас проводилась генеральная уборка? - ' . $_POST['third'] . '';
}

if (isset($_POST['fourth']) or !empty($_POST['fourth'])) {
    $discount = 'Требуется ли мытье окон? - ' . $_POST['fourth'] . '';
}

if (isset($_POST['recomendation']) or !empty($_POST['recomendation'])) {
    $recomendation = 'Рекомендация: ' . $_POST['recomendation'] . '';
}

if (isset($_POST['discount']) or !empty($_POST['discount'])) {
    $discount = 'Подарок: ' . $_POST['discount'] . '';
}




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
    $mail->addAddress('sniper.semenov@ukr.net', 'Розовый Фламинго');     // Add a recipient
    $mail->addAddress($userEmail, 'Розовый Фламинго');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Новая заявка с сайта - "Розовый Фламинго"';
    $mail->Body    = '
        Как к Вам обращаться: ' . $userName . ' <br> 
        Телефон: ' . $userPhone . ' <br>
        Способ связи: ' . $userCall . ' <br>
        ' . $userQuestions . ' <br>
        ' . $recomendation . '<br>
        ' . $discount . ' <br>
        ' . $text . '
    ';
//  recomendation: ' . $recomendation . '<br>
// discount: ' . $discount . '<br>
    if ($mail->send()) {
        echo "ok";
    } else {
        echo "Письмо не отправлено. Код ошибки: {$mail->ErrorInfo}";
    }
    
    //header('Location: thanks.html');
} catch (Exception $e) {
    echo "Письмо не отправлено. Код ошибки: {$mail->ErrorInfo}";
}