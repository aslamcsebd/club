@extends('layouts.app')
   @section('title')
      All members
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
                     <a class="nav-link active btn-sm py-1 m-1" data-toggle="pill" href="#activeMember">Active Member {{$activeMembers->count() ? '['.$activeMembers->count().']': ''}}</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link btn-sm py-1 m-1" data-toggle="pill" href="#inactiveMember">Inactive Member {{$inactiveMembers->count() ? '['.$inactiveMembers->count().']': ''}}</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link btn-sm py-1 m-1" href="{{ (request()->routeIs('member.online')) ? url('/member-register') : '' }}" target="_blank"> 
                        {{ (request()->routeIs('member.online')) ? 'Registration link: '.url('/member-register') : '' }}
                     </a>
                  </li>
               </ul>
            </div>

            <div class="card-body p-1">
               <div class="tab-content" id="pills-tabContent">

                  <div class="tab-pane fade show active" id="activeMember">
                     <table class="table table-bordered">
                        <thead class="bg-info">
                           <th>Sl</th>
                           <th>Member no</th>
                           <th>Name</th>
                           <th>Member category</th>
                           <th>Mobile</th>
                           <th>DOB</th>
                           <th>Action</th>
                        </thead>
                        <tbody>
                           @foreach($activeMembers as $member)
                              <tr>
                                 <td width="30">{{$loop->iteration}}</td>
                                 <td>{!!$member->member_no!!}</td>
                                 <td>{!!$member->name!!}</td>
                                 <td>{!!$member->member_category!!}</td>
                                 <td>{!!$member->mobile!!}</td>
                                 <td>{!! date('d-M-Y', strtotime($member->dob)) !!} <br>
                                    [{{\Carbon\Carbon::parse($member->dob)->diff(\Carbon\Carbon::now())->format(' %y years ')}}]
                                 </td>
                                 <td width="15">
                                    <div class="btn-group">
                                       <a href="{{ url('view', [$member->id, 'members', 'activeMember'])}}" class="btn btn-sm btn-outline-info py-1">View</a>

                                       @if($member->status == 1)
                                          <a href="{{ url('itemStatus', [$member->id, 'members', 'activeMember'])}}" class="btn btn-sm btn-success py-1" title="Click for inactive">Active</a>
                                       @else
                                          <a href="{{ url('itemStatus', [$member->id, 'members', 'activeMember'])}}" class="btn btn-sm btn-danger py-1" title="Click for active">Inactive</a>
                                       @endif
                                    </div>
                                 </td>
                              </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>

                  <div class="tab-pane fade show" id="inactiveMember">
                     <table class="table table-bordered">
                        <thead class="bg-info">
                           <th>Sl</th>
                           <th>Name</th>
                           <th>Member category</th>
                           <th>Mobile</th>
                           <th>DOB</th>
                           <th>Action</th>
                        </thead>
                        <tbody>
                           @foreach($inactiveMembers as $member)
                              <tr>
                                 <td width="30">{{$loop->iteration}}</td>
                                 <td>{!!$member->name!!}</td>
                                 <td>{!!$member->member_category!!}</td>
                                 <td>{!!$member->mobile!!}</td>
                                 <td>{!! date('d-M-Y', strtotime($member->dob)) !!} <br>
                                    [{{\Carbon\Carbon::parse($member->dob)->diff(\Carbon\Carbon::now())->format(' %y years ')}}]
                                 </td>
                                 <td width="15">
                                    <div class="btn-group">
                                       <a href="{{ url('view', [$member->id, 'members', 'inactiveMember'])}}" class="btn btn-sm btn-outline-info py-1">View</a>

                                       @if($member->status == 1)
                                          <a href="{{ url('itemStatus', [$member->id, 'members', 'inactiveMember'])}}" class="btn btn-sm btn-success py-1" title="Click for inactive">Active</a>
                                       @else
                                          <a href="{{ url('itemStatus', [$member->id, 'members', 'inactiveMember'])}}" class="btn btn-sm btn-danger py-1" title="Click for active">Inactive</a>
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