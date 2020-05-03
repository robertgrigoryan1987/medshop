<?php

namespace App\Http\Controllers;

use App\AboutHeader;
use App\ContactUs;
use Illuminate\Http\Request;
use App\OrderingProduct;
use Session;
use App\Message;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;


class ContactController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $about_headers = AboutHeader::where('id', 1)->firstOrFail();
        $contact_us = ContactUs::where('id', 1)->firstOrFail();
        $ordering_products_count = OrderingProduct::all()->where('session', Session::getId())->count();

        return view('medshop.contact')->with([
            'ordering_products_count' => $ordering_products_count,
            'about_headers' => $about_headers,
            'contact_us' => $contact_us,
        ]);
    }

    public function message(Request $request){
        $this->validate($request, [
            'name'	=>	'required|max:50',
            'email' =>  'required|email',
            'message'	=>	'required',
        ]);


        $data = $request->all();
        $message = new Message();
        if($message->create($data)){
            Mail::to('youngman87@mail.ru')->send(new Contact($data));
            $requestMessage = 'Request have been sent';
            return redirect()->back();
        }

    }
}
