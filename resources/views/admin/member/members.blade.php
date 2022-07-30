@extends('layouts.app')
   @section('title')
      All members
   @endsection
@section('content')
@include('includes.alertMessage')

<div class="content-wrapper p-3">
   <div class="row justify-content-center">
      <div class="col-md-12">
         @if(request()->routeIs('member.online'))
            <a class="nav-link btn-sm py-1 my-1 pl-1" href="{{ (request()->routeIs('member.online')) ? url('/member-register') : '' }}" target="_blank"> 
               {{ (request()->routeIs('member.online')) ? 'Registration link: '.url('/member-register') : '' }}
            </a>
         @endif
         <div class="card">
            <div class="card-body p-1">
               <table class="table table-bordered">
                  <thead class="bg-info">
                     <th>Sl</th>
                     <th>Member no</th>
                     <th>Name</th>
                     <th>Member category</th>
                     <th>Mobile</th>
                     <th>DOB</th>
                     <th>Publication</th>
                     <th>Action</th>
                  </thead>
                  <tbody>
                     @foreach($members as $member)
                        <tr>
                           <td width="30">{{$loop->iteration}}</td>
                           <td>{!!$member->member_no!!}</td>
                           <td>{!!$member->name!!}</td>
                           <td>
                              @foreach($member->memberCategoryList as $category)
                                 <span class="bg-primary userType">{{$category->memberCategory->name}}</span>
                              @endforeach
                           </td>
                             
                           </td>
                           <td>{!!$member->mobile!!}</td>
                           <td>{!! date('d-M-Y', strtotime($member->dob)) !!} <br>
                              [{{\Carbon\Carbon::parse($member->dob)->diff(\Carbon\Carbon::now())->format(' %y years ')}}]
                           </td>
                           <td>
                              <input type="checkbox" class="js-switch status"
                                 data-model="members" 
                                 data-field="status"
                                 data-id="{{ $member->id }}" 
                                 data-tab="tabName"
                                 {{ $member->status == 1 ? 'checked' : '' }}
                              />
                           </td>
                           <td width="15">
                              <div class="btn-group">
                                 <a href="{{ url('view', [$member->id, 'members', 'activeMember'])}}" class="btn btn-sm btn-outline-info py-1">View</a>
                                 <a href="{{ url('itemDelete', ['members', $member->id, 'tabName'])}}" class="btn btn-sm btn-danger py-1" onclick="return confirm('Are you want to delete this?')">Delete</a>
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

@endsection

@section('js')
@endsection
