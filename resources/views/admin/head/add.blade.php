@extends('layouts.app')
@section('title')
Add head
@endsection
@section('content')
@include('includes.alertMessage')
<div class="content-wrapper p-3">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <h6 class="card-header bg-success text-center py-2">Head Information</h6>
            <form action="{{ Route('head.add') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="card-body">

                  <div class="form-group">
                     <label for="name">Name*</label>
                     <input type="text" class="form-control" name="name" id="name"  value="{{ old('name') }}" placeholder="e.g. Pen" required>
                  </div>

                  <div class="form-group">
                     <label for="address">Type*</label>
                     <select class="form-control" name="head_type" required>
                        <option value="">Select head type</option>
                        <option value="Expense">Expense</option>
                        <option value="Income">Income</option>
                        <option value="Expense & income">Expense & income</option>
                     </select>
                  </div>

                  <div class="custom-control custom-checkbox form-group">
                     <input type="checkbox" id="material" name="material" value="Yes" class="custom-control-input">
                     <label for="material" class="custom-control-label">Is material?</label>
                  </div>

                  <div class="form-group">
                     <label for="address">Head Parent*</label>
                     <select class="form-control" name="parent_head" required>
                        <option value="">Select parent head</option>
                        @foreach($headParents as $head)
                           <option value="{{$head->name}}">{{$head->name}}</option>
                        @endforeach
                     </select>
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