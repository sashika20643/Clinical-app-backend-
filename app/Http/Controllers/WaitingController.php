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
    if($request->c_id==4){
        $date="00-00-00";


    }
    else{
        $date=$request->date;

    }
    if($channel=Waitinglist::where('date',$date)->where('c_id',$request->c_id)->where('u_id',$request->user()->id)->first()){
        return $this->error('', 'you have already apointment on '.$request->date, 401);
    }


    $count=Waitinglist::where('date',$request->date)->where('c_id',$request->c_id)->max('possition');
    $pos=$count+1;

    $wait=Waitinglist::create(
        [
            'c_id'=>$request->c_id,
            'u_id'=> $request->user()->id,
            'date'=>$date,
            'possition'=>$pos,




        ]
        );


        return $this->success([
            'possition' => $pos,
            'detailes'=>$wait,
            'details'=>$wait

        ]);

}
public function yettogo(Yettogo $request){
    // return ("Yet to go");
   if( $channel=Waitinglist::where('id',$request->id)->where('u_id',$request->user()->id)->first()){
    $count=Waitinglist::where('date',$channel->date)->where('c_id',$channel->c_id)->where('possition','<',$channel->possition)->where('status',0)->get()->count();
    $behind= Waitinglist::where('date',$channel->date)->where('c_id',$channel->c_id)->where('possition','>',$channel->possition)->where('status',0)->get()->count();
    return $this->success([
        'possition' => $channel->possition,
        'front'=>$count,
        'behind'=>$behind

    ]);

   }
   else{
  return $this->error('', 'id do not match', 401);
   }

}

public function allchanels(Request $request){
    $channel=Waitinglist::where('u_id',$request->user()->id)->get();
    return $this->success([
        'chanels' => $channel,


    ]);
}
public function chaneldetails(Request $request){
    $details=Waitinglist::where('id',$request->id)->where('u_id',$request->user()->id)->first();
    return $this->success([
        'details' => $details,


    ]);
}


}
