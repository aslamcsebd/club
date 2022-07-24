@extends('layouts.app')
   @section('title')
      Edit category
   @endsection
@section('content')
@include('includes.alertMessage')
<div class="content-wrapper p-3 view">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card">
            <h6 class="card-header bg-success text-center py-2">Edit category</h6>
            <div class="card-body">
               <form action="{{ Route('editCategory2') }}" method="post" enctype="multipart/form-data" class="needs-validation">
                  @csrf
                  <input type="hidden" name="id" value="{{$edit->id}}">
                  <div class="form-group">
                     <label for="name">Name*</label>
                     <input type="text" name="name" class="form-control" id="name" value="{{$edit->name}}" placeholder="Category name" required/>
                  </div>

                  <div class="form-group">
                     <label for="paymentType">Payment Type*</label>
                     <select id="paymentType2" name="paymentType" class="form-control" required="required">
                        <option value="Monthly" {{($edit->paymentType=='Monthly') ? 'selected' : ''}}>Monthly</option> 
                        <option value="One Time" {{($edit->paymentType=='One Time') ? 'selected' : ''}}>One Time</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <label for="reg_fee">Registration Fee*</label>
                     <input type="number" name="reg_fee" class="form-control" id="reg_fee" value="{{$edit->reg_fee}}" placeholder="1000" required/>
                  </div>

                  <div class="form-group">
                     <div class="form-check form-check-inline">
                        <label>Admission fee to be paid in time of application:</label>
                     </div>
                     <br>
                     <div class="radio-toolbar form-check form-check-inline" id="paidMatter">
                        <div class="radio">
                           <input type="radio" id="paidNo" name="paid" value="no" {{($edit->percentage==null) ? 'checked' : ''}}>
                           <label for="paidNo2">No</label>
                        </div>
                        <div class="radio ml-4">
                           <input type="radio" id="paidYes" name="paid" value="yes" {{($edit->percentage!=null) ? 'checked' : ''}}>
                           <label for="paidYes2">Yes</label> 
                        </div>
                     </div> 
                  </div>

                  <div class="hide" id="paidStatus">
                     <div class="" data_id="paidAction">
                        <div class="form-group">
                           <label for="fee">Percentage(%) of total admission fee*</label>
                           <input type="number" name="percentage" class="form-control" id="fee" value="{{$edit->percentage}}" placeholder="10, 20, 30..."/>
                        </div>
                     </div>
                  </div>

                  <div id="monthly2" class="hide">
                     <div class="form-group" data_id="monthlyFee2">
                        <label for="monthly">Monthly Fee*</label>
                        <input type="number" name="monthly" class="form-control" value="{{$edit->monthly}}" id="monthlyFee" placeholder="500"/>
                     </div>
                  </div>
                 
                  <button class="btn btn-primary">Save & Back</button>
               </form>                         
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('js')
@endsection