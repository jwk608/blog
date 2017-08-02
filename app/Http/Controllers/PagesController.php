<?php

namespace App\Http\Controllers;

class PagesController extends Controller {

	public function getIndex(){
		return view('pages.welcome');
	}

	public function getAbout(){
		$first = 'Jayden';
		$last = 'Kim';
		$email = 'jayden@gmail.com';

		$fullname = $first . " " . $last;

		$data = [];
		$data['email'] = $email;
		$data['fullname'] = $fullname;
		return view('pages.about')->withData($data);
	}

	public function getContact(){
		return view('pages.contact');
	}

} 