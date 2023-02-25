<?php

namespace App\Http\Controllers;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use \App\Http\Requests\Storewaiting;
use App\Models\Waitinglist;
use Auth;


class WaitingController extends Controller
{
    use HttpResponses;
public function store(Storewaiting $request){

    $request->validated($request->all());
    $count=Waitinglist::where('date',$request->date)->max('possition');
    $pos=$count+1;
    $wait=Waitinglist::create(
        [
            'c_id'=>$request->c_id,
            'u_id'=> $request->user()->id,
            'date'=>$request->date,
            'possition'=>$pos,




        ]
        );


        return $this->success([
            'possition' => $pos,
            'detailes'=>$wait

        ]);

}


}
