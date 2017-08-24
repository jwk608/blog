<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Mail;

class PagesController extends Controller {

	public function getIndex()
	{
		$posts = Post::orderBy('created_at','desc')->limit(4)->get();
		return view('pages.welcome')->withPosts($posts);
	}

	public function getAbout()
	{
		$first = 'Jayden';
		$last = 'Kim';
		$email = 'jayden@gmail.com';

		$fullname = $first . " " . $last;

		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;
		return view('pages.about')->withData($data);
	}

	public function getContact()
	{
		return view('pages.contact');
	}

	public function postContact(Request $request)
	{
		$this->validate($request, [
				'email' => 'required|email',
				'subject' => 'min:3',
				'message' => 'min:10'
			]);
		$data = array(
				'email' => $request->email,
				'subject' => $request->subject,
				'bodyMessage' => $request->message
			);

		Mail::send('emails.contact', $data, function($message) use ($data) {
			$message->from($data['email']);
			$message->to('joongwonkim608@gmail.com');
			$message->subject($data['subject']);
		});
		//Mail;;queue() ---> for a lot of emails

		
		return redirect('/')->with('success', 'Thanks! Your message has been sent');

	}

} 