@extends('layouts.app2')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-6">
         <div class="card mt-5">
            <div class="text-center">
               @if(true==true)
                  <img src="{{asset('images/default.jpg')}}" class="img-thumbnail" alt="No Image found" width="100">
               <br>
               <h2 class="singerName">CoachSys Demo</h2>
               <p>Sign in to your account</p>
            @endif 
            <hr>
         </div>        
         {{-- <div class="card-header text-center bg-info">{{ __('Admin login') }}</div> --}}
         <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
               @csrf
               <div class="form-group row">
                  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                  <div class="col-md-6">
                     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="admin@gmail.com" required autocomplete="email" autofocus>
                     @error('email')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               </div>
               <div class="form-group row">
                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                  <div class="col-md-6">
                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="123456789" required autocomplete="current-password">
                     @error('password')
                     <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>
               </div>
               <div class="form-group row">
                  <div class="col-md-6 offset-md-4">
                     <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                           {{ __('Remember Me') }}
                        </label>
                     </div>
                  </div>
               </div>
               <div class="form-group row mb-0">
                  <div class="col-md-8 offset-md-4">
                     @if (Route::has('password.request'))
                        <a class="btn btn-link pl-0" href="{{ route('password.request') }}">
                           {{ __('Forgot Your Password?') }}
                        </a>
                     @endif
                     <button type="submit" class="btn btn-sm btn-primary px-3">
                        {{ __('Sign in') }}
                     </button>
                  </div>
               </div>
            </form>
            <div class="mt-3 text-center">
               <button type="button" data-toggle="modal" data-target="#existingOrNewStudentModal" class="btn btn-apply btn-block btn-lg elevation-3 py-3 text-uppercase text-sm font-weight-bold text-white bg-primary">Apply for Admission</button>
               <div id="existingOrNewStudentModal" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
                  <div role="document" class="modal-dialog modal-dialog-centered">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title">Do you have an account here?</h5>
                           <button type="button" data-dismiss="modal" aria-label="Close" class="close">
                              <span aria-hidden="true">×</span>
                           </button>
                        </div> 
                        <div class="modal-body">
                           <div class="text-center">
                              <button class="btn btn-lg bg-purple">😃 Yes, I do</button> 
                              <a href="{{url('/member-register')}}" class="btn btn-lg btn-default ml-2">☹️ Nope, I don't</a>
                           </div>
                        </div> 
                        <div class="modal-footer">
                           <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <p class="text-center small text-muted mt-3 mb-2">
               © <?=date('Y');?> <a href="#" target="_blank" class="font-weight-bold">Club</a>
               {{-- Version: 6.0.0. --}}
           </p>
         </div>
      </div>
   </div>
</div>
</div>
@endsection