@extends('layouts.layout')

@section('content')

<div class="container">
    <h3>Filter</h3>

    <div class="d-flex justify-content-between align-items-center flex-wrap">




            <select id="c_id" class="form-select form-select-sm mb-2" style="max-width:300px;height:fit-content;padding-top:3px;padding-bottom:3px;" aria-label="Default select example">
                <option value="0" selected>All</option>

                @foreach ($clinic as $item )
<option value="{{$item->id}}" select>{{$item->name}}</option>
@endforeach


              </select>

          <div class="form-group">
            <label for="">Date</label>
            <input type="date" name="" id="date">
          </div>
              <select id="status" class="form-select form-select-sm" style="max-width:300px;height:fit-content;padding-top:3px;padding-bottom:3px;"aria-label="Default select example">
                <option value="3" selected>All</option>

                <option value="0" select>Waiting</option>
                <option value="1">Completed</option>

              </select>
              <div class="btn-group">
                <button onclick="filter()" class="btn btn-outline-primary" tyle="padding-left: 1rem;padding-right:1rem ;padding:.8rem">Filter</button>
                <a href="{{route('dashboard')}}" class="btn btn-outline-secondary"  style="padding-left: 1rem;padding-right:1rem ;padding:.8rem" >Clear</a>

              </div>
    </div>

<div class="container">
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">chanel id</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Chanel Type</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User name</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>

                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Possition</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($waitinglists as $waiting )
                <tr>

                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{ ($waiting->id)}}</p>

                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-secondary text-xs font-weight-bold">{{$waiting->clinic->name}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{$waiting->user->name }}</span>

                    </td>
                    <td class="align-middle text-center">
                        <span class="badge badge-sm bg-gradient-success">{{$waiting->date}}</span>
                      </td>
                    <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold">{{$waiting->possition}}</span>
                      </td>
                      <td class="align-middle text-center">

@if ($waiting->status==0 )
<a href="{{route('changeState',$waiting->id)}}" class="badge badge-sm bg-gradient-warning">
Waiting
@else
<a href="{{route('changeState',$waiting->id)}}"  class="badge badge-sm bg-gradient-success">
Completed
@endif

</a>
                      </td>

                  </tr>



                @endforeach



            </tbody>
          </table>
        </div>
      </div>


</div>
</div>
</div>

<script>
 function filter(){
    var c_id = document.getElementById("c_id").value;
    var status=document.getElementById("status").value;
    var date=document.getElementById("date").value;

    if(date=="" || c_id=='4'){
        date='00-00-00'
    }
    var url="{{route('dashboard')}}/filter/"+c_id+'/'+status+'/'+date;
   // Simulate a mouse click:
window.location.href = url;
    }
//     var date = new Date();

// var day = date.getDate();
// var month = date.getMonth() + 1;
// var year = date.getFullYear();

// if (month < 10) month = "0" + month;
// if (day < 10) day = "0" + day;

// var today = year + "-" + month + "-" + day;
// document.getElementById("date").value = today;

</script>
@endsection
