<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendWelcomeEmail() {
        $toEmail = 'nikita.shakhbazyan@gau.edu.ge';
        $confirmationCode = $this->generateConfirmationCode();
        $message = 'Your confirmation code is: ' . $confirmationCode;
        $subject = 'Welcome subject';

        $res = Mail::to($toEmail)->send(new WelcomeEmail($message,$subject));

        dd($res);
    }
    private function generateConfirmationCode() {
        return mt_rand(100000, 999999); 
    }
}
