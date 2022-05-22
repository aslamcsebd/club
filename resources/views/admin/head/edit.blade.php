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
            <h6 class="card-header bg-success text-center py-2">Head Information</h6>
            <form action="{{ Route('editHeadNow') }}" method="post" enctype="multipart/form-data">
               @csrf
               <div class="card-body">
                  <input type="hidden" name="id" value="{{$single->id}}">
                  <div class="form-group">
                     <label for="name">Name*</label>
                     <input type="text" class="form-control" name="name" id="name"  value="{{$single->name}}" placeholder="e.g. Pen" required>
                  </div>

                  <div class="form-group">
                     <label for="address">Type*</label>
                     <select class="form-control" name="head_type" required>
                        <option value="">Select head type</option>
                        <option value="Expense" {{ $single->head_type == 'Expense' ? 'selected' : '' }}>Expense</option>
                        <option value="Income" {{ $single->head_type == 'Income' ? 'selected' : '' }}>Income</option>
                     </select>
                  </div>

                  <div class="custom-control custom-checkbox form-group">
                     <input type="checkbox" id="material" name="material" value="Yes" {{ $single->material == 'Yes' ? 'checked' : '' }} class="custom-control-input">
                     <label for="material" class="custom-control-label">Is material?</label>
                  </div>

                  <div class="form-group">
                     <label for="address">Head Parent*</label>
                     <select class="form-control" name="parent_head" required>
                        <option value="">Select parent head</option>
                        @foreach($headParents as $head)
                           <option value="{{$head->name}}" {{ $single->parent_head == $head->name ? 'selected' : '' }}>{{$head->name}}</option>
                        @endforeach
                     </select>
                  </div>

               </div>
               <div class="card-footer">
                  <div class="btn-group">
                     <a href="{{ route('head.all') }}" class="btn btn-info">Back</a>
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