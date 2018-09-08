<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;


class PagesController extends Controller{

    public function getIndex() {
        return view('pages.home');
    }

    public function getBlog() {
        $posts = Post::orderBy('id', 'desc')->limit(12)->get();
        return view('pages.blog')->with('posts', $posts);
    }

    public function getAbout(){
        return view('pages.about');
    }

    public function getContact(){
        return view('pages.contact');
    }

    public function postContact(Request $request){
        $this->validate($request, [
          'email'   => 'required|email',
          'subject' => 'min:3',
          'message' => 'min:10'
        ]);

        $data = array(
          'email' => $request->email,
          'subject' => $request->subject,
          'bodyMessage' => $request->message
        );

        Mail::send('emails.contact', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('paul.l.christ@web.de');
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your email was sent!');

        return redirect('/');
    }
}
