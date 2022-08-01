@extends('layouts.app')
   @section('title')
      Single member
   @endsection
@section('content')
@include('includes.alertMessage')
<div class="content-wrapper p-3 view">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card">
            <h6 class="card-header bg-success text-center py-2">Single notice</h6>
            <div class="card-body">
               <table class="table table-bordered"> 
                  <tr>
                     <td width="20%">
                        <label>Title</label>
                     </td>
                     <td>{{$single->title}}</td>
                  </tr>                 
                  <tr>
                     <td width="20%">
                        <label>Description</label>
                     </td>
                     <td>{{$single->description}}</td>
                  </tr>
                  <tr>
                     <td width="20%">
                        <label>Created at</label>
                     </td>
                     <td>{{date('d-M-Y', strtotime($single->created_at))}}</td>
                  </tr>
                  <tr>
                     <td width="20%">
                        <label>Created By</label>
                     </td>
                     <td>
                        <span class="bg-primary userType">{{$single->created_by}}</span>
                     </td>
                  </tr>                  
                  <tr>
                     <td width="20%">
                        <label>To[User]</label>
                     </td>
                     <td>
                        @foreach($single->userType as $user)
                           <span class="bg-primary userType">{{$user->name}}</span>
                        @endforeach                        
                     </td>
                  </tr>
                  <tr>
                     <td width="20%">
                        <label>To[Member]</label>
                     </td>
                     <td>
                        @foreach($single->memberType as $member)
                           <span class="bg-primary userType">{{$member->name}}</span>
                        @endforeach
                     </td>   
                  </tr>
               </table>             
            </div>

            <div class="card-footer">
               <a href="{{ route('notice.all') }}" class="btn btn-primary">Back</a>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('js')
@endsection
