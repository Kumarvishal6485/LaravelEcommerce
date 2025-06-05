<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use Illuminate\Support\Facades\Mail;
use App\Mail\customermail;

class mailer extends Controller
{
    public static function sendMail($userEmail, $subject)
    {
        $mail = new PHPMailer(true);

        try{
            $subject = $subject;
            $body = "<h1>Hii Vishal</h1>";
            foreach ($userEmail as $user) {
                $to = $user;
                if (!Mail::to($to)->send(new customermail($body,$subject))) {
                    throw new Exception("Can't send Mail");
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
