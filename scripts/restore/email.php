<?php
declare(strict_types=1);

use Thomd729\Itblog\Restore;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if (! isNotEmpty()) {
    $error = 'Поле должно быть заполнено';
} else if (isNotEmpty()) {
    $email = strip_tags($_POST['email']);
    $error = checkForWrongSymbols($email) ? 'Были введены недопустимые символы' : '';

    if (empty($error)) {
        $login = Restore::findlogin($pdo, $email);

        if (! empty($login)) {
            Restore::saveTmpPassword($pdo, $login[0]['login']); 
            sendEmail($login[0]['login'], $email);
        } else {
            $error = 'Нет пользователя с таким email';
        }
    }
} 

function sendEmail(string $login, string $email): void 
{
    $mail = new PHPMailer(true);
    echo 'sendEmail ' . $login;
    //Tell PHPMailer to use SMTP
    $mail->isSMTP();

    //Enable SMTP debugging
    //SMTP::DEBUG_OFF = off (for production use)
    //SMTP::DEBUG_CLIENT = client messages
    //SMTP::DEBUG_SERVER = client and server messages
    $mail->SMTPDebug = SMTP::DEBUG_OFF;

    //Set the hostname of the mail server
    $mail->Host = 'smtp.gmail.com';

    //Set the SMTP port number:
    // - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
    // - 587 for SMTP+STARTTLS
    $mail->Port = 465;

    //Set the encryption mechanism to use:
    // - SMTPS (implicit TLS on port 465) or
    // - STARTTLS (explicit TLS on port 587)
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = 'thomd209@gmail.com';

    //Password to use for SMTP authentication
    $mail->Password = 'redFish209';

    //Set who the message is to be sent from
    $mail->setFrom('thomd209@gmail.com', 'ITBLOG');

    //Set an alternative reply-to address
    $mail->addReplyTo('thomd209@gmail.com', 'ITBLOG');

    //Set who the message is to be sent to
    $mail->addAddress($email, $login);

    //Set the subject line
    $mail->Subject = 'Restore password';

    $body = 'Здравствуйте, ' . $login . '. Ссылка для восстановления пароля: 
    <a href="http://itblog_host.com/templates/restore/newPassword.php">Восстановить пароль</a>';

    $mail->Body = $body;

    $mail->isHTML();

    if (! $mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }

    header('Location: ../../templates/restore/emailSuccess.php');
}

function isNotEmpty(): bool
{
    return ! empty($_POST['email']);
}

function checkForWrongSymbols($email): bool
{
    if (! preg_match('/^[\w@.]*$/', $email)) {
        return true;
    }

    return false;
}