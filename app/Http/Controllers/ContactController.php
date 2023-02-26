<?php

namespace App\Http\Controllers;
use \App\Http\Requests\ContactRequest;
use \App\Models\Contact;
use App\Traits\HttpResponses;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    use HttpResponses;

    public function store(ContactRequest $request){
        $request->validated($request->all());

      $message=Contact::create(
        [

            'u_id'=> $request->user()->id,
            'message'=>$request->message





        ]
        );

        return $this->success(
     [], "Send successfully"


        );
    }
}
