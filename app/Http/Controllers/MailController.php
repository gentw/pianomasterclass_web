<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;

class MailController extends Controller
{
    public function sendMail(Request $request){
    	\Mail::send(new SendMail($request));
    }
    
    
}