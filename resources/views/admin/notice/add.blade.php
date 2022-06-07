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
            <form action="{{ Route('notice.add') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="card-body">
                  <div class="form-group">
                     <label for="title">Title*</label>
                     <input type="text" class="form-control" name="title" id="title"  value="{{ old('title') }}" placeholder="e.g. Summer Vacation" required>
                  </div>
                  <div class="form-group">
                     <label for="address">Recipient Type[User]*</label>
                     <select class="form-control" name="user_type" required>
                        <option value="">Select user type</option>
                        @foreach($userTypes as $user)
                           <option value="{{$user->name}}">{{$user->name}}</option>
                        @endforeach
                        <option value="All">All user</option>
                     </select>
                  </div>                  
                  <div class="form-group">
                     <label for="address">Recipient Type[Member]*</label>
                     <select class="form-control" name="member_type" required>
                        <option value="">Select member type</option>
                        @foreach($memberTypes as $member)
                           <option value="{{$member->name}}">{{$member->name}}</option>
                        @endforeach
                        <option value="All">All member</option>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="address">Description*</label>
                     <textarea type="description" class="form-control" name="description" rows="8" id="description" placeholder="Enter description" required></textarea>
                  </div>
               </div>
               <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection
@section('js')
@endsection