<?php

namespace App\Http\Controllers;
use \App\Http\Requests\ContactRequest;
use \App\Models\Contact;
use App\Traits\HttpResponses;
use DB;

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

public function contactview(){
    $mesages = DB::table('contacts')
    ->join('users', 'contacts.u_id', '=', 'users.id')
    ->select('contacts.*', 'users.name')
    ->get();

    return view('Admin.message',compact('mesages'));
}


}
