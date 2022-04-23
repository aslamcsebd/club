@extends('layouts.app')
   @section('title')
      Single member
   @endsection
@section('content')
@include('includes.alertMessage')
<div class="content-wrapper p-3">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card card-success">
            <div class="card-header p-1">
               <h5 class="bg-success text-center">Single member</h5>              
            </div>

            <style type="text/css">
               table.dataTable tbody td:first-child {
                  text-align: right;
                  padding-right: 5px
                  vertical-align: unset;            
               }
               table.dataTable tbody td:first-child label{
                  padding-right: 15px;                
               }
    
               table.dataTable tbody td:last-child {
                  text-align: unset;
                  padding-left: 15px;                
               }
            </style>         

            <div class="card-body">
               <table class="table table-bordered">                  
                  <tr>
                     <td colspan="2">
                        <div class="text-center">
                           @if($single->photo !=null)
                              <img src="{{asset('')}}/{{$single->photo}}" class="img-thumbnail" alt="No Image found" width="100">
                              <br>
                              <span class="singerName">{{$single->name}}</span>
                           @endif               
                        </div>
                     </td>
                  </tr>
                  <tr>
                     <td width="20%">
                        <label>Email</label>
                     </td>
                     <td>{{$single->email}}</td>
                  </tr>
                  <tr>
                     <td width="20%">
                        <label>User type</label>
                     </td>
                     <td>{{$single->user_type}}</td>
                  </tr>
                  <tr>
                     <td width="20%">
                        <label>Mobile</label>
                     </td>
                     <td>{{$single->mobile}}</td>
                  </tr>
                  <tr>
                     <td width="20%">
                        <label>Address</label>
                     </td>
                     <td>{{$single->address}}</td>
                  </tr>
                  <tr>
                     <td width="20%">
                        <label>Gender</label>
                     </td>
                     <td>{{$single->gender}}</td>
                  </tr>
                  <tr>
                     <td width="20%">
                        <label>Blood Group</label>
                     </td>
                     <td>{{$single->blood}}</td>
                  </tr>
                  <tr>
                     <td width="20%">
                        <label>Date of Birth</label>
                     </td>
                     <td>{{date('d-M-Y', strtotime($single->dob))}}</td>
                  </tr>
                  @foreach($customFields as $field)
                     @php $title = $field->name; @endphp
                     <tr>
                        <td width="20%">
                           <label class="capitalize">{{$title}}</label>
                        </td>
                        <td>{{$single->$title}}</td>
                     </tr>
                  @endforeach
               </table>             
            </div>

            <div class="card-footer">
               <a href="{{ route('member.all') }}" class="btn btn-primary">Back</a>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('js')
@endsection