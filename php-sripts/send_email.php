<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $period = htmlspecialchars($_POST['period']);
    $hotel = htmlspecialchars($_POST['hotel']);
    $country = htmlspecialchars($_POST['country']);
    $guests = htmlspecialchars($_POST['guests']);
    $children = htmlspecialchars($_POST['children']);
    $nights = htmlspecialchars($_POST['nights']);

    $mail = new PHPMailer(true);

    try {
        // Настройка SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.mail.ru';
        $mail->SMTPAuth = true;
        $mail->Username = 'delizhan.bogdan@mail.ru';
        $mail->Password = 'samecia246890';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Шифрование SMTPS
        $mail->Port = 465;

        // Настройка письма
        $mail->setFrom('your-email@gmail.com', 'Booking Form');
        $mail->addAddress('delizhan.bogdan@mail.ru');
        $mail->Subject = 'New Booking Request';
        $mail->Body = "
            Phone Number: $phone\n
            Email: $email\n
            Period of Stay: $period\n
            Hotel: $hotel\n
            Country: $country\n
            Number of Guests: $guests\n
            Children's Ages: $children\n
            Number of Nights: $nights
        ";

        $mail->send();
        echo 'Your request has been sent successfully!';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
