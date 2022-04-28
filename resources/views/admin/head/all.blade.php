@extends('layouts.app')
@section('title')
   All head
@endsection
@section('content')
@include('includes.alertMessage')
<div class="content-wrapper p-3">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card border border-danger">
            <div class="card-header p-1">
               <a href="{{ Route('head.new') }}" class="btn btn-sm btn-success text-light">Add head</a>
            </div>
            <div class="card-body p-1">
               <table class="table table-bordered">
                  <thead class="bg-info">
                     <th>Sl</th>
                     <th>Name</th>
                     <th>Type</th>
                     <th>Is material</th>
                     <th>Is gift</th>
                     <th>Created By</th>
                     <th>Date</th>
                     <th>Status</th>
                     <th>Action</th>
                  </thead>
                  <tbody>                   
                     @foreach($headInfos as $headInfo)
                        <tr>
                           <td width="30">{{$loop->iteration}}</td>
                           <td>{!!$headInfo->name!!}</td>
                           <td>{!!$headInfo->head_type!!}</td>                         
                           <td>{!!$headInfo->material!!}</td>                         
                           <td>{!!$headInfo->gift!!}</td>                     
                           <td>
                              <span class="bg-primary userType">Root</span>
                           </td>
                           <td>{{date('d-M-Y', strtotime($headInfo->created_at))}}</td>
                           <td width="15">
                              <div class="btn-group">
                                 @if($headInfo->status == 1)
                                    <a href="{{ url('itemStatus', [$headInfo->id, 'head_infos', 'tabName'])}}" class="btn btn-sm btn-success py-1" title="Click for inactive">Active</a>
                                 @else
                                    <a href="{{ url('itemStatus', [$headInfo->id, 'head_infos', 'tabName'])}}" class="btn btn-sm btn-danger py-1" title="Click for active">Inactive</a>
                                 @endif 
                              </div>
                           </td>
                           <td width="15">
                              <div class="btn-group">
                                 <a href="{{ url('editHead', [$headInfo->id, 'head_infos', 'tapName'])}}" class="btn btn-sm btn-outline-info py-1">Edit</a>                                
                                 <a href="{{ url('itemDelete', [$headInfo->id, 'head_infos', 'tapName'])}}" class="btn btn-sm btn-outline-danger py-1" onclick="return confirm('Are you want to delete this?')">Delete</a>
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
                           <input type="radio" id="paidNo" name="" value="no" checked>
                           <label for="paidNo">No</label>
                        </div>
                        <div class="radio ml-4">
                           <input type="radio" id="paidYes" name="" value="yes">
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
   