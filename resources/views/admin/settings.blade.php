@extends('layouts.app')
   @section('title')
      Settings
   @endsection
@section('content')
@include('includes.alertMessage')

<div class="content-wrapper p-3">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card-header p-1">
            <ul class="nav nav-pills" id="tabMenu">
               <li class="nav-item">
                  <a class="nav-link active btn-sm py-1 m-1" data-toggle="pill" href="#customField">Custom Field {{$customFields->count() ? '['.$customFields->count().']' : ''}}</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link btn-sm py-1 m-1" data-toggle="pill" href="#other">Other {{-- [{{$inactiveMembers->count()}}] --}}</a>
               </li>
            </ul>
         </div>

         <div class="card-body p-1">
            
            <div class="tab-content" id="pills-tabContent">
               <div class="tab-pane fade show active" id="customField">
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
                              <th>Action</th>
                           </thead>
                           <tbody>
                              @foreach($customFields as $field)
                                 <tr>
                                    <td width="30">{{$loop->iteration}}</td>
                                    <td>{!!$field->name!!}</td>
                                    <td width="15">
                                       <div class="btn-group">
                                          @if($field->status == 1)
                                             <a href="{{ url('itemStatus', [$field->id, 'custom_fields', 'activeMember'])}}" class="btn btn-sm btn-success py-1" title="Click for inactive">Active</a>
                                          @else
                                             <a href="{{ url('itemStatus', [$field->id, 'custom_fields', 'activeMember'])}}" class="btn btn-sm btn-danger py-1" title="Click for active">Inactive</a>
                                          @endif
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
                                 <h6 class="modal-title text-center" id="exampleModalLabel">Coustom field</h6>
                                 <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                              </div>
                              <div class="modal-body">
                                 <form action="{{ route('addCustomField') }}" method="post" enctype="multipart/form-data" class="needs-validation" >
                                    @csrf
                                    <div class="form-group">
                                       <label for="name">Name*</label>
                                       <input type="text" name="name" class="form-control" id="name" placeholder="Category name" required/>
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

               <div class="tab-pane fade show" id="other">
                  Other data add there;
               </div>
            </div>

         </div>
      </div>
   </div>
</div>

@endsection

@section('js')
@endsection