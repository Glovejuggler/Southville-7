<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function basic_email()
    {
      $pw = Str::random(8);
      $data = array('name' => "Shalltear", 'pw' => $pw);
   
      Mail::send('mail.test', $data, function($message) {
         $message->to('aelizaga77@gmail.com')->subject
            ('Welcome to Southville 7 Credit Cooperative');
      });
      
      return redirect()->route('home');
   }
}
