<?php

namespace App\Http\Controllers;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use \App\Http\Requests\Storewaiting;
use \App\Http\Requests\Yettogo;

use App\Models\Waitinglist;
use Auth;


class WaitingController extends Controller
{
    use HttpResponses;
public function store(Storewaiting $request){

    $request->validated($request->all());
if($channel=Waitinglist::where('date',$request->date)->where('c_id',$request->c_id)->where('u_id',$request->user()->id)->first()){
    return $this->error('', 'you have already apointment on '.$request->date, 401);
}
    $count=Waitinglist::where('date',$request->date)->where('c_id',$request->c_id)->max('possition');
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
public function yettogo(Yettogo $request){
    // return ("Yet to go");
   if( $channel=Waitinglist::where('id',$request->id)->first()){
    $count=Waitinglist::where('date',$channel->date)->where('c_id',$channel->c_id)->where('possition','<',$channel->possition)->where('status',0)->get()->count();
    return $this->success([
        'possition' => $channel->possition,
        'yetToGo'=>$count

    ]);

   }
   else{
  return $this->error('', 'id do not match', 401);
   }

}

}
