@extends('layouts.app')
@section('title')
   Member category
@endsection
@section('content')
@include('includes.alertMessage')
<div class="content-wrapper p-3">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card border border-danger">
            <div class="card-header p-1">
               <button class="btn btn-sm btn-success text-light" data-toggle="modal" data-original-title="test" data-target="#addCategory">Add category</button>
            </div>
            <div class="card-body p-1">
               <table class="table table-bordered">
                  <thead class="bg-info">
                     <th>Sl</th>
                     <th>Name</th>
                     <th>PaymentType</th>
                     <th>Fee</th>
                     <th>Percentage(%)</th>
                     <th>Action</th>
                  </thead>
                  <tbody>
                     @foreach($categories as $category)
                        <tr>
                           <td width="30">{{$loop->iteration}}</td>
                           <td>{!!$category->name!!}</td>
                           <td>{!!$category->paymentType!!}</td>
                           <td>{!!$category->fee!!}</td>
                           <td>{!!$category->percentage!!}</td>
                           <td width="15">
                              <div class="btn-group">                                
                                 @if($category->status == 1)
                                    <a href="{{ url('itemStatus', [$category->id, 'member_categories', 'activeMember'])}}" class="btn btn-sm btn-success py-1" title="Click for inactive">Active</a>
                                 @else
                                    <a href="{{ url('itemStatus', [$category->id, 'member_categories', 'activeMember'])}}" class="btn btn-sm btn-danger py-1" title="Click for active">Inactive</a>
                                 @endif
                              </div>
                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   {{-- Add category --}}
   <div class="modal fade" id="addCategory" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h6 class="modal-title text-center" id="exampleModalLabel">Category Information</h6>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
               <form action="{{ route('addCategory') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                  @csrf
                  <div class="form-group">
                     <label for="name">Name*</label>
                     <input type="text" name="name" class="form-control" id="name" placeholder="Category name" required/>
                  </div>

                  <div class="form-group">
                     <label for="paymentType">Payment Type*</label>
                     <select id="paymentType" name="paymentType" class="form-control" required="required">
                        <option value="Monthly">Monthly</option> 
                        <option value="One Time">One Time</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <label for="fee">Registration Fee*</label>
                     <input type="number" name="fee" class="form-control" id="fee" placeholder="100" required/>
                  </div>

                  <div class="form-group">
                     <div class="form-check form-check-inline">
                        <label>Admission fee to be paid in time of application:</label>
                     </div> 
                     <br>
                     <div class="radio-toolbar form-check form-check-inline">
                        <div class="radio">
                           <input type="radio" id="paidNo" name="paid" value="no" checked>
                           <label for="paidNo">No</label>
                        </div>
                        <div class="radio ml-4">
                           <input type="radio" id="paidYes" name="paid" value="yes">
                           <label for="paidYes">Yes</label> 
                        </div>
                     </div> 
                  </div>

                  <div class="hide" id="paidStatus">
                     <div class="" data_id="paidAction"> 
                        <div class="form-group">
                           <label for="fee">Percentage(%) of total admission fee*</label>
                           <input type="number" name="percentage" class="form-control" id="fee" placeholder="10, 20, 30..."/>
                        </div>
                     </div>
                  </div>

                  <div class="modal-footer">
                     <div class="btn-group">
                        <button class="btn btn-sm btn-primary">Save</button>
                        <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Close</button>
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
   