<?php

namespace DDWeekend\Mail;

use DDWeekend\Models\User;
use PHPMailer\PHPMailer\PHPMailer;

class Mail
{
    public $user;
    public $template_path;
    public $phpmailer;

    public function __construct(User $user, $template = '')
    {
        $this->user = $user;
        $this->template_path = $template;
    }

    public function send()
    {
        try {
            $this->phpmailer->send();
        } catch (\Exception $e) {
            return False;
        }
        return True;
    }

     public function buildData()
    {
        // var_dump($this->config());die();
        $mail = new PHPMailer();
        $mail->Charset = 'utf-8';
        ini_set('default_charset', 'UTF-8');

        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = $this->config()['username'];
        $mail->Password = $this->config()['password'];
        $mail->setFrom('info@deepdiveweekend.com', 'Deep Dive Weekend.');
        $mail->addReplyTo('femi@golumino.com', 'Femi Okaseun');
        $mail->addAddress('femi@golumino.com', 'Femi Okaseun.');
        $mail->addBCC('xaviertim017@gmail.com', 'Tim Tesla');
        $mail->Subject = "New Registeration Received";
        $mail->msgHTML($this->template_path);
        $mail->AltBody = "This is a test email";

        $this->phpmailer = $mail;

        return $mail;
    }

    private function config()
    {
        $config = include __DIR__.'/../config/mail.php';

        return $config;
    }
}