<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Mail;

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

    public function sendemail() {
        $field_rules = array(
        'name' => 'required',
        'email'   => 'required|valid_email',
        'message' => 'required'
        );

        // change your error messages here
        $error_messages = array(
            'required'    => 'This field is required',
            'valid_email' => 'Please enter a valid email address'
        );

        $error_placements = array();

        // success message
        $success_message            = new \stdClass();
        $success_message->message   = 'Thank you! Your message has been sent.';
        $success_message->field     = 'submitButton';

        // mail failure message
        $mail_error_message            = new \stdClass();
        $mail_error_message->message   = 'Sorry your mail was not sent - please try again later';
        $mail_error_message->field     = 'submitButton';

        $fields = $_POST;

        $returnVal           = new \stdClass();
        $returnVal->status   = 'error';
        $returnVal->messages = array();

        if (!empty($fields)) {
            //Validate each of the fields
            foreach ($field_rules as $field => $rules) {
                $rules = explode('|', $rules);

                foreach ($rules as $rule) {
                    $result = null;

                    if (isset($fields[$field])) {
                        if (!empty($rule)) {
                            $result = $rule($fields[$field]);
                        }

                        if ($result === false) {
                            $error = new \stdClass();
                            $error->field = $field;
                            $error->message = $error_messages[$rule];
                            $error->placement = $error_placements[$field];

                            $returnVal->messages[] = $error;
                            // break from the rule loop so we only get 1 error at a time
                            break;
                        }
                    } else {
                        $returnVal->messages[] =  $field . ' ' . $error_messages['required'];
                    }
                }
            }

            if (empty($returnVal->messages)) {                         // Enable encryption, 'ssl' also accepted
                $email = stripslashes(safe($fields['email']));
                $body = stripslashes(safe($fields['message']));
                $content = $email . " sent you a message from your contact form:<br><br>";
                $content .= "-------<br>" . $body . "<br><br><br><br>Email: " . $email;      

                $res = Mail::send('emails.send', ['title' => "Email from contact from", 'content' => $content], function ($message) 
                {
                    $message->subject("Hello from tienda contact");
                    $message->to('hello@tienda.ph');

                });

                $returnVal->messages[] = $success_message;
                $returnVal->status = 'ok';
            }
            return response()->json($returnVal, 200);
        }
    }
}
