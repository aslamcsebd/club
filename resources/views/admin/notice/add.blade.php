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

                  <div class="row">
                     <div class="form-group col-4">
                        <label for="address">Recipient Type[User]*</label>
                     </div>
                     <div class="form-group col-4">
                        <select class="multiple-checkboxes" multiple="multiple" name="user_id[]">
                           @foreach($userTypes as $user)
                              <option value="{{$user->id}}">{{$user->name}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
               
                  <div class="row">
                     <div class="form-group col-4">
                        <label for="address">Recipient Type[Member]*</label> 
                     </div>
                     <div class="form-group col-4">
                        <select class="multiple-checkboxes" multiple="multiple" name="member_id[]">
                           @foreach($memberTypes as $member)
                              <option value="{{$member->id}}">{{$member->name}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="address">Description*</label>
                     <textarea type="description" class="form-control" name="description" rows="6" id="description" placeholder="Enter description" required></textarea>
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
