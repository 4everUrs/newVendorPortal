<?php

namespace App\Http\Controllers;

use App\Mail\InquiryEmail;
use Illuminate\Http\Request;
use Mail;

class InquiryMailController extends Controller
{
    public function sendMail(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        Mail::to('admin@techtrendzph.com')->send(new InquiryEmail($data));
    }
}
