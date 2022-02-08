<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{
    //
    public function sendSms()
    {
        return view('admin.sms.send');
    }
    public function senderId()
    {
        return view('admin.sms.sender_id');
    }
    public function campaign()
    {
        return view('admin.sms.campaign');
    }
    public function templates()
    {
        return view('admin.sms.templates');
    }
}
