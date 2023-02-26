<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\clinic;
use App\Models\waitinglist;




use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){

$clinic=Clinic::all();

$waitinglists = Waitinglist::with('user', 'clinic')   ->orderByDesc('date')
->orderByDesc('possition')
    ->get();

        return view('Admin.index',compact('clinic','waitinglists'));
    }
public function filter($c_id,$status,$date){
    $clinic=Clinic::all();

    $waitinglists = Waitinglist::with('user', 'clinic');

if($c_id!=0){
  $waitinglists=  $waitinglists->where('c_id',$c_id);

}

if($status!=3){
$waitinglists=$waitinglists ->where('status',$status);
}
if($date!="00-00-00"){

$waitinglists=$waitinglists->where('date',$date);
}


$waitinglists = $waitinglists->orderBy('possition')->get();


                return view('Admin.index',compact('clinic','waitinglists'));
            }


    public function usersview(){

        $users=User::all()->where('role','0');

        return view('Admin.users',compact('users'));
    }



    public function changeState($c_id){
        $chanel=  Waitinglist::where('id',$c_id)->get()->first();

        if($chanel->status==0){
            $chanel->status=1;
        }

        else{
            $chanel->status=0;
        }
        $chanel->save();
        return redirect()->back();

    }
}
