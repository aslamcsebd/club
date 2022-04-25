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
            <h6 class="card-header bg-success text-center py-2">Single member</h6>
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
                  @foreach($needed_columns as $column)                  
                     <tr>
                        <td width="20%">
                           <label class="capitalize">{{$column}}</label>
                        </td>
                        <td>{{$single->$column}}</td>
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