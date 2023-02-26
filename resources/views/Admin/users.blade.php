@extends('layouts.layout')

@section('content')

<div class="container">
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Sur Name</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of Birth</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Patient Number</th>

                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mobile Number</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user )
                <tr>

                    <td>
                      <p class="text-xs font-weight-bold mb-0">{{ ($user->name)}}</p>
                      <p class="text-xs text-secondary mb-0">{{$user->id}}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-secondary text-xs font-weight-bold">{{$user->surName}}</span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold">{{$user->dateOfBirth }}</span>
                    </td>
                    <td class="align-middle text-center">
                        <span class="badge badge-sm bg-gradient-success">{{$user->patientNo}}</span>
                      </td>
                    <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold">{{$user->phone}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{$user->email }}</span>
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
