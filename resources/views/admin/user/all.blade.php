@extends('layouts.app')
   @section('title')
      All users
   @endsection
@section('content')
@include('includes.alertMessage')

<div class="content-wrapper p-3">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card border border-danger">
            <div class="card-header p-1 bg-secondary">
               <div class="card-title ml-2">All Users</div>
               <div class="btn-group float-right">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                     <i class="fa fa-user-shield"></i>
                  </button>
                  <div class="dropdown-menu">
                     <a href="{{ Route('user.all') }}" class="dropdown-item">All</a>
                     @foreach($userCategory as $key=>$user)
                        <a href="{{ Route('user.get', $key) }}" class="dropdown-item">
                           {!!$key!!} [{{$user->count()}}]
                        </a>
                     @endforeach
                  </div>
               </div>
            </div>

            <div class="card-body p-1">
               <table class="table table-bordered">
                  <thead class="bg-info">
                     <th>Sl</th>
                     <th>Name</th>
                     <th>Type</th>
                     <th>Email</th>
                     <th>Mobile</th>
                     <th>DOB</th>
                     <th>Status</th>
                  </thead>
                  <tbody>
                     @php $si=1;@endphp
                     @foreach($users as $user2)
                        @foreach($user2->sortByDesc('id') as $user)
                           <tr>
                              <td width="30">{{$si}}</td> @php $si++;@endphp
                              <td>{!!$user->name!!}</td>
                              <td> <span class="bg-primary userType">{!!$user->user_type!!}</span></td>
                              <td>{!!$user->email!!}</td>
                              <td>{!!$user->mobile!!}</td>
                              <td>{!! date('d-M-Y', strtotime($user->dob)) !!} <br>
                                 [{{\Carbon\Carbon::parse($user->dob)->diff(\Carbon\Carbon::now())->format(' %y years ')}}]
                              </td>
                              <td>
                                 <input type="checkbox" 
                                    data-model="all_users" 
                                    data-id="{{ $user->id }}" 
                                    data-tab="activeUsers" 
                                    name="status"
                                    class="js-switch" 
                                    {{ $user->status == 1 ? 'checked' : '' }}>
                              </td>
                           </tr>
                        @endforeach
                     @endforeach
                  </tbody>
               </table>
            </div>                   
         </div>
      </div>
   </div>
</div>

@endsection

@section('js')
@endsection