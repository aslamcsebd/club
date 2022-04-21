@extends('layouts.app')
   @section('title')
      Register
   @endsection
@section('content')
@include('includes.alertMessage')
<div class="content-wrapper p-3">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card card-success">
            <div class="card-header p-1">
               <h5 class="bg-success text-center">Register new member</h5>              
            </div>
            <form action="{{ Route('addMember') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="card-body">
                  <div class="form-group">
                     <label for="name">Full Name*</label>
                     <input type="text" class="form-control" name="name" id="name"  value="{{ old('name') }}" placeholder="Enter name" required>
                  </div>

                  <div class="form-group">
                     <label for="email">Email*</label>
                     <input type="email" class="form-control" name="email" id="email" value="{!! old('email') !!}" placeholder="Enter email" required>
                  </div>

                  <div class="row">
                     <div class="form-group col-6">
                        <label for="password">Password*</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                        <small class="form-text text-muted">Minimum 6 characters. Leave blank to assign auto-generated password.</small>
                     </div>
                     <div class="form-group col-6">
                        <label for="confirm_password">Confirm Password*</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Enter confirm_password" required>
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="mobile">Mobile number*</label>
                     <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile" required>
                  </div>

                  <div class="form-group">
                     <label for="address">Address*</label>
                     <textarea type="address" class="form-control" name="address" id="address" placeholder="Enter address" required></textarea>
                  </div>

                  <div class="form-group">
                     <label for="address">Gender*</label>
                     <select class="form-control" name="gender">
                       <option selected>Select Gender</option>
                       <option value="Male">Male</option>
                       <option value="Female">Female</option>
                       <option value="Other">Other</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <label for="date">Date of Birth*</label>
                     <input type="text" class="form-control datepicker" name="date" placeholder="Day-Month-Year" required />
                  </div>  

                  <div class="form-group">
                     <label for="photo">Photo*</label>
                     <input type="file" class="form-control" name="photo"/>
                  </div> 
                 
                  <div class="form-check">
                     <input type="checkbox" class="form-check-input" id="checkbox">
                     <label class="form-check-label" for="checkbox">Check me out</label>
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