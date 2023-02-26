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

$waitinglists = Waitinglist::with('user', 'clinic')
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


$waitinglists = $waitinglists->get();


                return view('Admin.index',compact('clinic','waitinglists'));
            }


    public function usersview(){

        $users=User::all()->where('role','0');

        return view('Admin.users',compact('users'));
    }
}
