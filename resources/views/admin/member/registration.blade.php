@extends('layouts.app')
   @section('title')
      Register
   @endsection
@section('content')
@include('includes.alertMessage')

<div class="content-wrapper p-3">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card">
            <h6 class="card-header bg-success text-center py-2">Register new member</h6>
            <form action="{{ Route('addMember') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="card-body">
                  <div class="row">
                     <div class="form-group col-6">
                        <label for="mobile">Mobile number*</label>
                        <input type="number" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile" required>
                     </div>
                     <div class="form-group col-6">
                        <label for="name">Full Name*</label>
                        <input type="text" class="form-control" name="name" id="name"  value="{{ old('name') }}" placeholder="Enter name" required>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-12">
                        <label for="email">Email*</label>
                        <input type="email" class="form-control" name="email" id="email" value="{!! old('email') !!}" placeholder="Enter email" required>
                     </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-6">
                        <label for="password">Password*</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" required>
                        <small class="form-text text-muted bg-info p-1"><i>Minimum 6 characters. Leave blank to assign auto-generated password.</i></small>
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
                          <option value="O +ve">O +ve</option>
                          <option value="O -ve">O -ve</option>
                          <option value="A +ve">A +ve</option>
                          <option value="A -ve">A -ve</option>
                          <option value="B +ve">B +ve</option>
                          <option value="B -ve">B -ve</option>
                          <option value="AB +ve">AB +ve</option>
                          <option value="AB -ve">AB -ve</option>
                          <option value="Unknown">Unknown</option>
                        </select>
                     </div>
                  </div>

                  <div class="form-group">
                     <label for="dob">Date of Birth*</label>
                     <input type="text" class="form-control datepicker" name="dob" placeholder="Day-Month-Year" required/>
                  </div>  

                  <div class="form-group">
                     <label for="photo">Photo*</label>
                     <input type="file" class="form-control" name="photo"/>
                     <small class="form-text text-muted bg-info p-1 col-6">
                        <i>Image format: jpeg, png, jpg, gif, svg. Maximum size : 2 MB.</i>
                     </small> 
                  </div>

                  @foreach($customFields as $field)
                     @php $title = $field->name; @endphp
                     @if($field->type=='dropdown')
                        <div class="form-group">
                           <label class="capitalize" for="{{$title}}">{{$title}}*</label>
                           @php
                              $values = App\Models\CustomField::where('name', $title)->where('type', '=', null)->get();
                           @endphp
                           <select class="form-control" name="{{$title}}" id="{{$title}}" {{($field->required==1)? 'required':''}}>
                              <option value="">Select dropdown</option>
                              @foreach($values as $value)
                                 <option value="{{$value->child}}">{{$value->child}}</option>
                              @endforeach
                           </select>
                        </div>
                     @else
                        <div class="form-group">
                           <label class="capitalize" for="{{$title}}">{{$title}}*</label>
                           <input type="{{($field->type=='date')? 'date':'text'}}" class="form-control" name="{{$title}}" id="{{$title}}" placeholder="Enter {{$title}}" {{($field->required==1)? 'required':''}}>
                        </div>
                     @endif
                  @endforeach
                  <hr>
                  <div class="row">
                     <div class="form-group col">
                        <label for="address">Member category*</label>
                        <select class="form-control" name="member_category" required>
                           <option value="">Select member category</option>
                           @foreach($memberCategory as $member)
                              <option value="{{$member->name}}">{{$member->name}}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group col">
                        <label for="form_no">Member Number*</label>
                        <input type="text" class="form-control" name="member_no" placeholder="Member no" />
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