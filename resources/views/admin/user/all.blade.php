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
            <div class="card-header p-1">
               <ul class="nav nav-pills" id="tabMenu">
                  <li class="nav-item">
                     <a class="nav-link active btn-sm py-1 m-1" data-toggle="pill" href="#activeUsers">Active Member {{$activeUsers->count() ? '['.$activeUsers->count().']': ''}}</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link btn-sm py-1 m-1" data-toggle="pill" href="#inactiveUsers">Inactive Member {{$inactiveUsers->count() ? '['.$inactiveUsers->count().']': ''}}</a>
                  </li>
               </ul>
            </div>

            <div class="card-body p-1">
               <div class="tab-content" id="pills-tabContent">

                  <div class="tab-pane fade show active" id="activeUsers">
                     <table class="table table-bordered">
                        <thead class="bg-info">
                           <th>Sl</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Mobile</th>
                           <th>DOB</th>
                           <th>Action</th>
                        </thead>
                        <tbody>
                           @foreach($activeUsers as $user)
                              <tr>
                                 <td width="30">{{$loop->iteration}}</td>
                                 <td>{!!$user->name!!}</td>
                                 <td>{!!$user->email!!}</td>
                                 <td>{!!$user->mobile!!}</td>
                                 <td>{!! date('d-M-Y', strtotime($user->dob)) !!} <br>
                                    [{{\Carbon\Carbon::parse($user->dob)->diff(\Carbon\Carbon::now())->format(' %y years ')}}]
                                 </td>
                                 <td width="15">
                                    <div class="btn-group">
                                       <a href="{{ url('userView', [$user->id, 'all_users', 'activeUsers'])}}" class="btn btn-sm btn-outline-info py-1">View</a>

                                       @if($user->status == 1)
                                          <a href="{{ url('itemStatus', [$user->id, 'all_users', 'activeUsers'])}}" class="btn btn-sm btn-success py-1" title="Click for inactive">Active</a>
                                       @else
                                          <a href="{{ url('itemStatus', [$user->id, 'all_users', 'activeUsers'])}}" class="btn btn-sm btn-danger py-1" title="Click for active">Inactive</a>
                                       @endif
                                    </div>
                                 </td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>

                  <div class="tab-pane fade show" id="inactiveUsers">
                     <table class="table table-bordered">
                        <thead class="bg-info">
                           <th>Sl</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>Mobile</th>
                           <th>DOB</th>
                           <th>Action</th>
                        </thead>
                        <tbody>
                           @foreach($inactiveUsers as $user)
                              <tr>
                                 <td width="30">{{$loop->iteration}}</td>
                                 <td>{!!$user->name!!}</td>
                                 <td>{!!$user->email!!}</td>
                                 <td>{!!$user->mobile!!}</td>
                                 <td>{!! date('d-M-Y', strtotime($user->date)) !!} <br>
                                    [{{\Carbon\Carbon::parse($user->date)->diff(\Carbon\Carbon::now())->format(' %y years ')}}]
                                 </td>
                                 <td width="15">
                                    <div class="btn-group">
                                       <a href="{{ url('userView', [$user->id, 'all_users', 'inactiveUsers'])}}" class="btn btn-sm btn-outline-info py-1">View</a>

                                       @if($user->status == 1)
                                          <a href="{{ url('itemStatus', [$user->id, 'all_users', 'inactiveUsers'])}}" class="btn btn-sm btn-success py-1" title="Click for inactive">Active</a>
                                       @else
                                          <a href="{{ url('itemStatus', [$user->id, 'all_users', 'inactiveUsers'])}}" class="btn btn-sm btn-danger py-1" title="Click for active">Inactive</a>
                                       @endif
                                    </div>
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
   </div>
</div>

@endsection

@section('js')
@endsection