<?php
require_once("phpmailer/class.phpmailer.php");
require_once("phpmailer/class.smtp.php");
    class MailHelper{

        public function __construct(){

        }
        public function sendMail($token, $direccion, $username){
        $nombre= "Qevana";
        $smtpHost = "smtp.gmail.com";  // Server Smtp que utilizo
        $smtpUsuario = "";  // Cuenta de gmail
        $smtpClave = "";  // Mi contraseña
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->Port = 587; 
        $mail->IsHTML(true); 
        $mail->CharSet = "utf-8";
        $mail->Host = $smtpHost; 
        $mail->Username = $smtpUsuario; 
        $mail->Password = $smtpClave;
        $mail->From = $smtpUsuario; // Email desde donde envio el correo.
        $mail->FromName = $nombre;
        $mail->AddAddress($direccion); // Direccion de mail donde enviamos
        $mail->Subject = "Recuperacion de la contraseña"; // Este es el titulo del email.
        $mail->Body = "
        <html> 

        <body> 

        <h1>Recuperacion de contraseña</h1>

        <p>username del solicitado: {$username}</p>

        <a href='http://localhost/WEB-2/TPE-1/password_recovery?token={$token}'>{$token} </a>

        </body> 

        </html>

        ";
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $success = $mail->Send();
        if($success){
            return TRUE;
            }else{
                return FALSE;
            }
        }
    }