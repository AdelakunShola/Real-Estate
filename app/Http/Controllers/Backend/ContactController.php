<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    
        public function ContactUs(){
    
            return view('frontend.contact.contact_us');
    
        }//end method


        public function ContactSubmit(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'phone' => 'required',
            'message' => 'required',
        ]);

        // Send email
        Mail::to('officialadelakun@gmail.com')->send(new ContactMail($data));

        $notification = array(
            'message' => 'Message sent successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
