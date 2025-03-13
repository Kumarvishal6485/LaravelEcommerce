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
    public function sendMail()
    {
        $mail = new PHPMailer(true);

        try{
            $to = "kumarvishal6485@gmail.com";
            $subject = "Welcome";
            $body = "<h1>Hii Vishal</h1>";
            Mail::to($to)->send(new customermail($body,$subject));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
