<?php

namespace App\Http\Controllers\Admin;

use App\contactUs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function __construct(){
        $this->middleware('checkAuth')->except('Logout');
    }

    public function contactUs(){
        $messages = contactUs::get();
        return view('Admin.Pages.contact_us', compact('messages'));
    }

    public function replyMail(Request $request, $id){
        $this->validate($request, [
            'mail' => 'bail|required',
        ]);
        try {
            $contact = contactUs::where('idcontactus', $id)->first();
            $message = $contact->message;
            Mail::to($contact->user->email)->send(new \App\Mail\replyMail($message, $contact->user->fullname,$request->mail));
            contactUs::where('idcontactUs', $id)->update([
                'attended_to' => 1
            ]);
            return redirect()->back()->with('success', 'Email Successfully sent');
        }
        catch (\Exception $exception){
            return redirect()->back()->with('failure', $exception->getMessage());
        }
    }
}
