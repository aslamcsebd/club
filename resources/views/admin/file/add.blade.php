@extends('layouts.app')
@section('title')
   Add file
@endsection
@section('content')
@include('includes.alertMessage')
<div class="content-wrapper p-3">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <h6 class="card-header bg-success text-center py-2">File Information</h6>
            <form action="{{ Route('file.add') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="card-body">
                  <div class="form-group">
                     <label for="name">File Name*</label>
                     <input type="text" class="form-control" name="name" id="name"  value="{{ old('name') }}" placeholder="Name" required>
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
                  
                  <div class="form-group mt-2">
                     <div class="form-group">
                        <label for="photo">File*</label>
                        <input type="file" class="form-control" name="file" required />
                     </div>
                     <small class="form-text text-muted">
                        <span>Supported file formats: pdf, doc, docx, odt, xls, xlsx, jpeg, jpg, png.</span> 
                        <span>Maximum file size: 10 MB.</span>
                     </small>
                  </div>
               </div>
               <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection

@section('js')
@endsection