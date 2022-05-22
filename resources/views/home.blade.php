@extends('layouts.app')

@section('content')   
   <div class="content-wrapper">
      <div class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-6"><h1 class="m-0 text-dark">Dashboard</h1></div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="#">Home</a></li>
                     <li class="breadcrumb-item active">Dashboard</li>
                  </ol>
               </div>
            </div>
         </div>   
      </div>

      <section class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-3 col-6">
                  <div class="small-box bg-info">
                     <div class="inner text-center">
                        <h3>{{$member->count() ? $member->count() :'0'}}</h3>
                        <p>All member</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-bag"></i>
                     </div>
                     <a href="{{ route('member.all') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>

               <div class="col-lg-3 col-6">
                  <div class="small-box bg-primary">
                     <div class="inner text-center">
                        <h3>{{$memberCategory->count() ? $memberCategory->count() :'0'}}</h3>
                        <p>Member Category</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                     </div>
                     <a href="{{ route('category') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>

               <div class="col-lg-3 col-6">
                  <div class="small-box bg-secondary">
                     <div class="inner text-center">
                        <h3>{{$customField->count() ? $customField->count() :'0'}}</h3>
                        <p>Custom Field</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-person-add"></i>
                     </div>
                     <a href="{{ route('settings') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>

               <div class="col-lg-3 col-6">
                  <div class="small-box bg-danger">
                     <div class="inner text-center">
                        <h3>{{$userType->count() ? $userType->count() :'0'}}</h3>
                        <p>User Type</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                     </div>
                     <a href="{{ route('settings') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>

              <div class="col-lg-3 col-6">
                  <div class="small-box bg-warning">
                     <div class="inner text-center">
                        <h3>{{$files->count() ? $files->count() :'0'}}</h3>
                        <p>Total file</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-bag"></i>
                     </div>
                     <a href="{{ route('file.all') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>

               <div class="col-lg-3 col-6">
                  <div class="small-box bg-info">
                     <div class="inner text-center">
                        <h3>{{$headInfos->count() ? $headInfos->count() :'0'}}</h3>
                        <p>Total Head</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                     </div>
                     <a href="{{ route('head.all') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>
 {{-- 
               <div class="col-lg-3 col-6">
                  <div class="small-box bg-light">
                     <div class="inner text-center">
                        <h3>90</h3>
                        <p>User Registrations</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-person-add"></i>
                     </div>
                     <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>

               <div class="col-lg-3 col-6">
                  <div class="small-box bg-dark">
                     <div class="inner text-center">
                        <h3>80</h3>
                        <p>Unique Visitors</p>
                     </div>
                     <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                     </div>
                     <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                  </div>
               </div>
 --}}
            </div>           
         </div>
      </section>
      
   </div> 
<footer class="main-footer">
<strong>Copyright &copy; 2021 <a href="https://adminlte.io/" target="_blank">AdminLTE</a>.</strong>
All rights reserved.
<div class="float-right d-none d-sm-inline-block">
   <b>Version</b> 3.1.0
</div>
</footer>

@endsection