@extends('layouts.app')
   @section('title')
      Settings
   @endsection
@section('content')
@include('includes.alertMessage')

<div class="content-wrapper p-3">
   <div class="row justify-content-center">
      <div class="col-md-12">
         <div class="card-header p-1">
            <ul class="nav nav-pills" id="tabMenu">
               <li class="nav-item">
                  <a class="nav-link active btn-sm py-1 m-1" data-toggle="pill" href="#memberCategory">Member category {{$categories->count() ? '['.$categories->count().']' : ''}}</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link btn-sm py-1 m-1" data-toggle="pill" href="#customField">Custom Field {{$customFields->count() ? '['.$customFields->count().']' : ''}}</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link btn-sm py-1 m-1" data-toggle="pill" href="#userType">User Type {{$userTypes->count() ? '['.$userTypes->count().']' : ''}}</a>
               </li>              
               <li class="nav-item">
                  <a class="nav-link btn-sm py-1 m-1" data-toggle="pill" href="#headParent">Head Parent {{$headParents->count() ? '['.$headParents->count().']' : ''}}</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link btn-sm py-1 m-1" data-toggle="pill" href="#general">General</a>
               </li>
            </ul>
         </div>

         <div class="card-body p-1">            
            <div class="tab-content" id="pills-tabContent">

               <div class="tab-pane fade show active" id="memberCategory">
                  <div class="card border border-danger">
                     <div class="card-header p-1">
                        <button class="btn btn-sm btn-success text-light" data-toggle="modal" data-original-title="test" data-target="#addCategory">Add category</button>
                     </div>
                     <div class="card-body p-1">
                        <table class="table table-bordered">
                           <thead class="bg-info">
                              {{-- <th>Sl</th> --}}
                              <th>Name</th>
                              <th>PaymentType</th>
                              <th>Fee</th>
                              <th>Percentage(%)</th>
                              <th>Monthly fee</th>
                              <th>Created_by</th>
                              <th>Status</th>
                              <th>Action</th>
                           </thead>
                           <tbody>
                              @foreach($categories as $category)
                                 <tr>
                                    {{-- <td width="30">{{$loop->iteration}}</td> --}}
                                    <td>{!!$category->name!!}</td>
                                    <td>{!!$category->paymentType!!}</td>
                                    <td>{!!$category->reg_fee!!}</td>
                                    <td>{!!$category->percentage!!}</td>
                                    <td>{!!$category->monthly!!}</td>
                                    <td>
                                       <span class="bg-primary userType">{!!$category->created_by!!}</span>
                                    </td>
                                    <td width="15">
                                       <input type="checkbox" class="js-switch status"
                                          data-model="member_categories" 
                                          data-field="status"
                                          data-id="{{ $category->id }}" 
                                          data-tab="memberCategory"

                                          {{ $category->status == 1 ? 'checked' : '' }}
                                       />
                                    </td>
                                    <td width="15">
                                       <div class="btn-group">
                                          <a href="{{ url('editCategory', ['member_categories', $category->id, 'memberCategory'])}}" class="btn btn-sm btn-outline-info">Edit</a>                                         

                                          <a href="{{ url('itemDelete', ['member_categories', $category->id, 'memberCategory'])}}" class="btn btn-danger btn-sm btn-info" onclick="return confirm('Are you want to delete this?')">Delete</a>
                                       </div>
                                    </td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>

                  {{-- Add category --}}
                  <div class="modal fade" id="addCategory" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h6 class="modal-title text-center" id="exampleModalLabel">Category Information</h6>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">??</span></button>
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
                                    <label for="reg_fee">Registration Fee*</label>
                                    <input type="number" name="reg_fee" class="form-control" id="reg_fee" placeholder="1000" required/>
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

                                 <div id="monthly" class="hide">
                                    <div class="form-group" data_id="monthlyFee">
                                       <label for="monthly">Monthly Fee*</label>
                                       <input type="number" name="monthly" class="form-control" id="monthlyFee" placeholder="500"/>
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
               </div>

               <div class="tab-pane fade show" id="customField">
                  <div class="card border border-danger">
                     <div class="card-header p-1">
                        <ul class="nav nav-pills" id="tabMenu">
                           <li class="nav-item">
                              <button class="btn btn-sm btn-success text-light" data-toggle="modal" data-original-title="test" data-target="#addCustomField">Add field</button>
                           </li>
                        </ul>
                     </div>
                     <div class="card-body p-1">
                        <table class="table table-bordered">
                           <thead class="bg-info">
                              <th>Sl</th>
                              <th>Name</th>
                              <th>Required[Mandatory]</th>
                              <th>Created by</th>
                              <th>Status</th>
                              <th>Action</th>
                           </thead>
                           <tbody>
                              @foreach($customFields as $field)
                                 <tr>
                                    <td width="30">{{$loop->iteration}}</td>
                                    <td>{!!$field->name!!}</td>
                                    <td width="20%">     
                                       <input type="checkbox" class="js-switch status"
                                          data-model="custom_fields" 
                                          data-field="required"
                                          data-id="{{ $field->id }}" 
                                          data-tab="customField"

                                          {{ $field->required == 1 ? 'checked' : '' }}
                                       />
                                    </td>
                                    <td>
                                       <span class="bg-primary userType">{!!$field->created_by!!}</span>
                                    </td>
                                    <td width="15">
                                       <input type="checkbox" class="js-switch status"
                                          data-model="custom_fields" 
                                          data-field="status"
                                          data-id="{{ $field->id }}" 
                                          data-tab="customField"

                                          {{ $field->status == 1 ? 'checked' : '' }}
                                       />
                                    </td>
                                    <td width="15">
                                       <div class="btn-group">
                                          <a href="{{ url('deleteCustomField', [$field->id, 'custom_fields', 'customField'])}}" class="btn btn-sm btn-info py-1" onclick="return confirm('Are you want to delete this?')">Delete</a>
                                       </div>
                                    </td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>                    
                     </div>

                     {{-- Add field --}}
                     <div class="modal fade" id="addCustomField" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h6 class="modal-title text-center" id="exampleModalLabel">Custom field</h6>
                                 <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">??</span></button>
                              </div>
                              <div class="card-header p-1">
                                 <ul class="nav nav-pills">
                                    <li class="nav-item">
                                       <a class="nav-link active btn-sm py-1 m-1" data-toggle="pill" href="#field">Text</a>
                                    </li>
                                    <li class="nav-item">
                                       <a class="nav-link btn-sm py-1 m-1" data-toggle="pill" href="#date">Date</a>
                                    </li>
                                    <li class="nav-item">
                                       <a class="nav-link btn-sm py-1 m-1" data-toggle="pill" href="#dropdown">Dropdown</a>
                                    </li>                                 
                                 </ul>
                              </div>

                              <div class="modal-body">
                                 <div class="tab-content" id="pills-tabContent">

                                    <div class="tab-pane fade active show" id="field">
                                       <form action="{{ route('addCustomField') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                                          @csrf
                                          <div class="form-group">
                                             <label for="field">Name*</label>
                                             <input type="text" name="text" class="form-control" id="text" placeholder="Text name" required/>
                                          </div>
                                          <div class="form-group">
                                             <label for="field">Mandatory*</label>
                                             <br>
                                             <input type="checkbox" name="required" class="js-switch" checked/>
                                          </div>
                                          <div class="modal-footer">
                                             <div class="btn-group">
                                                <button class="btn btn-sm btn-primary">Save</button>
                                                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Close</button>
                                             </div>
                                          </div>
                                       </form>                                      
                                    </div>

                                    <div class="tab-pane fade show" id="date">
                                       <form action="{{ route('addCustomField') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                                          @csrf
                                          <div class="form-group">
                                             <label for="date">DateTime name*</label>
                                             <input type="text" name="date" class="form-control" id="date" placeholder="Field name" required/>
                                          </div>
                                          <div class="form-group">
                                             <label for="field">Mandatory*</label>
                                             <br>
                                             <input type="checkbox" name="required" class="js-switch" checked/>
                                          </div>  
                                          <div class="modal-footer">
                                             <div class="btn-group">
                                                <button class="btn btn-sm btn-primary">Save</button>
                                                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Close</button>
                                             </div>
                                          </div>
                                       </form>                                      
                                    </div>

                                    <div class="tab-pane fade show" id="dropdown">
                                       <form action="{{ route('addCustomField') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                                          @csrf
                                          <div class="form-group">
                                             <label for="dropdown">Title name*</label>
                                             <input type="text" name="dropdown" class="form-control" id="dropdown" placeholder="Field name" required/>
                                          </div>
                                          <fieldset>
                                             <legend>Value options</legend>
                                                <div id="extraDropdown">
                                                   <div class="row justify-content-center">
                                                      <i class="fa fa-chevron-down pt-3"></i>
                                                      <div class="col-8 form-group">
                                                         <input type="text" name="dropdownValue[]" class="form-control" placeholder="Value name" required/>
                                                      </div>
                                                      <button type="button" class="btn">
                                                         <i class="fa fa-trash "></i>
                                                      </button>
                                                   </div>                  
                                                </div>
                                                <div class="row justify-content-center"> 
                                                   <div class="col-8">
                                                      <button type="button" id="addExtraDropdown" class="btn btn-primary">
                                                         <i class="fa fa-plus">&nbsp; Add dropdown</i>
                                                      </button>
                                                   </div>
                                                </div>
                                          </fieldset>
                                          <div class="form-group">
                                             <label for="field">Mandatory*</label>
                                             <br>
                                             <input type="checkbox" name="required" class="js-switch" checked/>
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
                        </div>
                     </div>                  
                  </div>
               </div>

               <div class="tab-pane fade show" id="userType">
                  <div class="card border border-danger">
                     <div class="card-header p-1">
                        <ul class="nav nav-pills" id="tabMenu">
                           <li class="nav-item">
                              <button class="btn btn-sm btn-success text-light" data-toggle="modal" data-original-title="test" data-target="#addUserType">Add user type</button>
                           </li>
                        </ul>                       
                     </div>
                     <div class="card-body p-1">
                        <table class="table table-bordered">
                           <thead class="bg-info">
                              <th>Sl</th>
                              <th>Name</th>
                              <th>Created by</th>
                              <th>Status</th>
                              <th>Action</th>
                           </thead>
                           <tbody>
                              @foreach($userTypes as $user)
                                 <tr>
                                    <td width="30">{{$loop->iteration}}</td>
                                    <td>{!!$user->name!!}</td>
                                    <td>
                                       <span class="bg-primary userType">{!!$user->created_by!!}</span>
                                    </td>
                                    <td width="15">
                                       <input type="checkbox" class="js-switch status"
                                          data-model="user_types" 
                                          data-field="status"
                                          data-id="{{ $user->id }}" 
                                          data-tab="userType"

                                          {{ $user->status == 1 ? 'checked' : '' }}
                                       />
                                    </td>
                                    <td width="15">
                                       <div class="btn-group">
                                          <a href="{{ url('itemDelete', ['user_types', $user->id, 'userType'])}}" class="btn btn-sm btn-info py-1" onclick="return confirm('Are you want to delete this?')">Delete</a>
                                       </div>
                                    </td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>                    
                     </div>

                     {{-- Add field --}}
                     <div class="modal fade" id="addUserType" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h6 class="modal-title text-center" id="exampleModalLabel">Add user type</h6>
                                 <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">??</span></button>
                              </div>
                              <div class="modal-body">
                                 <form action="{{ route('addUserType') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                                    @csrf
                                    <div class="form-group">
                                       <label for="name">Name*</label>
                                       <input type="text" name="name" class="form-control" id="name" placeholder="Student, teacher, sub-admin, staf..." required/>
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
                  </div>
               </div>             

               <div class="tab-pane fade show" id="headParent">
                  <div class="card border border-danger">
                     <div class="card-header p-1">
                        <ul class="nav nav-pills" id="tabMenu">
                           <li class="nav-item">
                              <button class="btn btn-sm btn-success text-light" data-toggle="modal" data-original-title="test" data-target="#addHeadParent">Add Head Parent</button>
                           </li>
                        </ul>
                     </div>
                     <div class="card-body p-1">
                        <table class="table table-bordered">
                           <thead class="bg-info">
                              <th>Sl</th>
                              <th>Name</th>
                              <th>Created by</th>
                              <th>Status</th>
                              <th>Action</th>
                           </thead>
                           <tbody>
                              @foreach($headParents as $headParent)
                                 <tr>
                                    <td width="30">{{$loop->iteration}}</td>
                                    <td>{!!$headParent->name!!}</td>
                                    <td>
                                       <span class="bg-primary userType">{!!$headParent->created_by!!}</span>
                                    </td>
                                    <td width="10">                                       
                                       <input type="checkbox" class="js-switch status"
                                          data-model="head_parents" 
                                          data-field="status"
                                          data-id="{{ $headParent->id }}" 
                                          data-tab="headParent"

                                          {{ $headParent->status == 1 ? 'checked' : '' }}
                                       />
                                    </td>
                                    <td width="10">
                                       <div class="btn-group">
                                          <a href="{{ url('itemDelete', ['head_parents', $headParent->id, 'headParent'])}}" class="btn btn-sm btn-info py-1" onclick="return confirm('Are you want to delete this?')">Delete</a>
                                       </div>
                                    </td>
                                 </tr>
                              @endforeach
                           </tbody>
                        </table>                    
                     </div>

                     {{-- Add field --}}
                     <div class="modal fade" id="addHeadParent" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <h6 class="modal-title text-center" id="exampleModalLabel">Add head parent</h6>
                                 <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">??</span></button>
                              </div>
                              <div class="modal-body">
                                 <form action="{{ route('addHeadParent') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                                    @csrf
                                    <div class="form-group">
                                       <label for="name">Name*</label>
                                       <input type="text" name="name" class="form-control" id="name" placeholder="Student, teacher, sub-admin, staf..." required/>
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
                  </div>
               </div>

               <div class="tab-pane fade show" id="general">
                  <div class="card border border-danger">
                     <div class="card-body p-4">
                        <form action="{{ route('addGeneral') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                           @csrf
                           <input type="hidden" name="id" value="{{ $general->id ?? '' }}">
                           <div class="form-group">
                              <label for="company_name" class="control-label">Institution Name:</label>
                              <input type="text" id="company_name" name="company_name" value="{{ $general->company_name ?? 'Add company name' }}" autocomplete="off" class="form-control">
                           </div>
                           <div class="form-group">
                              <label for="company_address" class="control-label">Institution Address:</label>
                              <input type="text" id="company_address" name="company_address" value="{{ $general->company_address ?? 'Add company address' }}" autocomplete="off" class="form-control">
                           </div>
                           <div class="form-group">
                              <img id="preview" src="{{ $general->company_logo ?? asset('images/general/default.jpg') }}" alt="Company Logo" class="avatar">
                           </div>
                           <div class="form-group">
                              <div class="custom-file">
                                 <input type="hidden" name="photoName" value="{{ $general->company_logo ?? '' }}">
                                 <input type="file" id="company_logo" name="photo" class="custom-file-input">
                                 <label for="company_logo" class="custom-file-label">Choose file</label>
                              </div>
                           </div>
                           <hr>
                           <button type="submit" class="btn btn-primary px-5">Save</button>
                        </form>
                     </div>
                  </div>
               </div>
              
            </div>
         </div>
      </div>
   </div>
</div>

@endsection

@section('js')
@endsection
