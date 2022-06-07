@extends('layouts.app')
   @section('title')
      Add notice
   @endsection
@section('content')
@include('includes.alertMessage')
<div class="content-wrapper p-3">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <h6 class="card-header bg-success text-center py-2">Notice Information</h6>
            <form action="{{ route('editNoticeNow') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="card-body">
                  <input type="hidden" name="id" value="{{$single->id}}">
                  <div class="form-group">
                     <label for="title">Title*</label>
                     <input type="text" class="form-control" name="title" id="title"  value="{{$single->title}}" placeholder="e.g. Summer Vacation" required>
                  </div>
                  {{-- <div class="form-group">
                     <label for="address">Recipient Type*</label>
                     <select class="form-control" name="recipient_type" required>
                        <option value="">Select recipient type</option>
                        @foreach($recipient_Types as $recipient)
                           <option value="{{$recipient->name}}" {{ $single->recipient_type == $recipient->name ? 'selected' : '' }}>{{$recipient->name}}</option>
                        @endforeach
                        <option value="All" {{ $single->recipient_type ==  'All'? 'selected' : '' }}>All recipient</option>
                     </select>
                  </div> --}}

                  <div class="form-group">
                     <label for="address">Recipient Type[User]*</label>
                     <select class="form-control" name="user_type" required>
                        <option value="">Select user type</option>
                        @foreach($userTypes as $user)
                           <option value="{{$user->name}}" {{ $single->user_type == $user->name ? 'selected' : '' }}>{{$user->name}}</option>
                        @endforeach
                        <option value="All" {{ $single->user_type ==  'All'? 'selected' : '' }}>All user</option>
                     </select>
                  </div>                  
                  <div class="form-group">
                     <label for="address">Recipient Type[Member]*</label>
                     <select class="form-control" name="member_type" required>
                        <option value="">Select member type</option>
                        @foreach($memberTypes as $member)
                           <option value="{{$member->name}}" {{ $single->member_type == $member->name ? 'selected' : '' }}>{{$member->name}}</option>
                        @endforeach
                        <option value="All" {{ $single->member_type ==  'All'? 'selected' : '' }}>All member</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <label for="address">Description*</label>
                     <textarea type="description" class="form-control" name="description" rows="8" id="description" placeholder="Enter description" required>{{$single->description}}</textarea>
                  </div>
               </div>
               <div class="card-footer">
                  <div class="btn-group">
                     <a href="{{ route('notice.all') }}" class="btn btn-info">Back</a>
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection
@section('js')
@endsection