@extends('layouts.layout')

@section('content')


<div class="container">
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">message Name</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Message</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>

              </tr>
            </thead>
            <tbody>
                @foreach ($mesages as $message )
                <tr>

                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{ ($message->id)}}</p>

                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-secondary text-xs font-weight-bold">{{$message->name}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{$message->message }}</span>
                    </td>
                    <td class="align-middle text-center">
                        <span class="badge badge-sm bg-gradient-success">{{$message->created_at}}</span>
                      </td>


                  </tr>



                @endforeach



            </tbody>
          </table>
        </div>
      </div>


</div>
</div>


@endsection
