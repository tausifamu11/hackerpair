<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ContactFormRequest;
use App\Contact;
use DB;

class AdminController extends Controller
{
    public function form(Request $request){
       return view('form');
    }

    public function store(ContactFormRequest $request)
    {

        $contact = new Contact;

        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->msg = $request->get('msg');
        $contact->save();
    }

    public function dashboard(){
        Contact::all();
       $query= DB::table('contacts')->select();
        $result=$query->get();
        return view('form',compact('result'));
    }
}
