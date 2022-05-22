
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   {{-- <meta http-equiv="refresh" content="2" /> --}}
   @php 
      $time = DB::table('refresh_status')->where('status', true)->first();
   @endphp               
   <meta http-equiv="refresh" content="{{ ($time==true)? $time->time:''}}">

   <title>@yield('title')</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   {{--  AdminLTE v3.1.0
         Bootstrap v4.6.0 --}}
   <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
   <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}" >
   <link rel="stylesheet" href="{{ asset('css/OverlayScrollbars.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
   <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">

   <!-- summernote -->
   {{-- <link href="{{ asset('/') }}summernote/summernote.css" rel="stylesheet"> --}}
   
   <!-- Datepicker -->
   <link rel="stylesheet" href="{{ asset('/')}}css/datepicker.min.css">

   {{-- dataTables --}}
   <link rel="stylesheet" href="{{ asset('css/dataTables.min.css') }}">

   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
