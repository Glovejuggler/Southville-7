<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function basic_email() {
      $data = array('name' => "Shalltear");
   
      Mail::send('mail.test', $data, function($message) {
         $message->to('aelizaga77@gmail.com', 'Angelo Elizaga')->subject
            ('Test mail');
      });
      
      return redirect()->route('home');
   }
}
