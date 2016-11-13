<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;

use App\Models\Ecommerce\Supplier;

class PagesController extends Controller
{
    public function about() {
    	return view('pages.about');
    }

    public function privacy() {
    	return view('pages.privacy');
    }

    public function terms() {
    	return view('pages.terms');
    }

    public function how() {
    	return view('pages.how');
    }

    public function faq() {
    	return view('pages.faq');
    }

    public function contact() {
    	return view('pages.contact');
    }

    public function sitemap() {
    	return view('pages.sitemap');
    }

    public function sendemail( Request $request ) {

        if(Mail::send('emails.send',['name' => $request['name'], 
                                  'email' => $request['email'], 
                                  'enquiry' => $request['message']], function ($message) 
            {
                $message->subject("Message from Tienda.ph contact form");
                $message->to('rasseljandavid@gmail.com');

        })) {

            

            $error = new \stdClass();
            $error->message = "Whoops, looks like something went wrong. Please try again.";

            $returnVal->messages[] = $error;
            $returnVal->status   = 'error';
        } else {

            $msg = new \stdClass();
            $msg->message = "Thank you! Your message has been sent. We will contact you shortly.";
            $returnVal->messages[] = $msg;
            $returnVal->status = 'ok';
        }

        return response()->json($returnVal, 200);
     
    }


    public function suppliers() {
        $suppliers = Supplier::all();
        
        return view('pages.suppliers', compact('suppliers')); 
    }
}
