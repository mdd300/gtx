<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Fo_email
{

    /**
     * @param string $Data ['to'] : o e-mail do destinatário único. Caso seja multíplo, melhor enviar num foreach, do que parametrizar por aqui
     * @param string $Data ['name'] : o nome do destinatário
     * @param string $Data ['html'] : O html que será enviado
     * @param string $Data ['subject'] : O assunto do e-mail
     * @return array
     */

    public static function from_system(array $Data)
    {

        //require_once "application/libraries/phpmailer/phpmailer/src/SMTP.php";
        //require_once "application/libraries/phpmailer/phpmailer/src/PHPMailer.php";

        $mail = new PHPMailer(true);

        $result = false;

        $to = $Data['to'] ?? false;
        $name = $Data['name'] ?? false;
        $html = $Data['html'] ?? false;
        $subject = $Data['subject'] ?? false;

        if ($to and $name and $html and $subject) {
            try {
                //Server settings
//                $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'victor.za.oshiro5@gmail.com';                 // SMTP username
                $mail->Password = '89720228';                           // SMTP password
                $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465;                                    // TCP port to connect to
                $mail->CharSet = 'UTF-8';
                $mail->setFrom('victor.za.oshiro5@gmail.com', 'GTX');
                $mail->addAddress($to, $name);     // Add a recipient
                $mail->addReplyTo('victor.za.oshiro5@gmail.com', 'GTX');

                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = $subject;
                $mail->msgHTML($html);
                $mail->Body = $html;
                $mail->AltBody = strip_tags($html);
                $mail->send();

                $result = true;

            } catch (Exception $e) {
//                var_dump($e->errorMessage());
                $result = false;
            }

        } else {
            $result = false;
        }
        return $result;
    }

}
