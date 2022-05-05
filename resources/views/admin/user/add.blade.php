@extends('layouts.app')
   @section('title')
      User register
   @endsection
@section('content')
@include('includes.alertMessage')
<div class="content-wrapper p-3">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card">
            <h6 class="card-header bg-success text-center py-2">Register new user</h6>
            <form action="{{ Route('addUser') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="card-body">
                  <div class="row">
                     <div class="form-group col">
                        <label for="type">User Type <span class="text-danger">*</span></label> 
                        <select name="user_type" id="type" required="required" class="custom-select">
                           <option value="" disabled="disabled" selected="selected">Select User Type</option>
                           @foreach($user_types as $user)
                              <option value="{{$user->name}}">{{$user->name}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group col">
                        <label for="name">Full Name*</label>
                        <input type="text" class="form-control" name="name" id="name"  value="{{ old('name') }}" placeholder="Enter name" required>
                     </div>                     
                  </div>
                  <div class="row">
                     <div class="form-group col-6">
                        <label for="email">Email*</label>
                        <input type="email" class="form-control" name="email" id="email" value="{!! old('email') !!}" placeholder="Enter email" required>
                     </div>
                     <div class="form-group col-6">
                        <label for="mobile">Mobile number*</label>
                        <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile" required>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-6">
                        <label for="password">Password*</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                        <small class="form-text text-muted bg-info"><i>Minimum 6 characters. Leave blank to assign auto-generated password.</i></small>
                     </div>
                     <div class="form-group col-6">
                        <label for="confirm_password">Confirm Password*</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter confirm_password" required>
                     </div>
                  </div>                 

                  <div class="form-group">
                     <label for="address">Address*</label>
                     <textarea type="address" class="form-control" name="address" id="address" placeholder="Enter address" required></textarea>
                  </div>

                  <div class="row">
                     <div class="form-group col-6">
                        <label for="address">Gender*</label>
                        <select class="form-control" name="gender" required>
                          <option value="">Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                          <option value="Other">Other</option>
                        </select>
                     </div>
                     <div class="form-group col-6">
                        <label for="address">Blood Group*</label>
                        <select class="form-control" name="blood">
                          <option value="">Select Group</option>
                          <option value="O+">O+</option>
                          <option value="O-">O-</option>
                          <option value="A+">A+</option>
                          <option value="A-">A-</option>
                          <option value="B+">B+</option>
                          <option value="B-">B-</option>
                          <option value="AB+">AB+</option>
                          <option value="AB-">AB-</option>
                          <option value="Unknown">Unknown</option>
                        </select>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col">
                        <label for="dob">Date of Birth*</label>
                        <input type="text" class="form-control datepicker" name="dob" placeholder="Day-Month-Year" required/>
                     </div>  
                     <div class="form-group col">
                        <label for="photo">Photo*</label>
                        <input type="file" class="form-control" name="photo"/>
                     </div>
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