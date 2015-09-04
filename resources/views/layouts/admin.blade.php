<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <title>Michigain State Button Bar Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{!! asset('css/bootstrap.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/font-awesome.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/fontawesome-iconpicker.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/styles.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/admin.css') !!}">
    <script src="{!! asset('js/admin.js') !!}"></script>
</head>
<body>
    



    <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-md-8">
                  <!-- Logo -->
                  <div class="logo">
                     <h1><a href="{!! url('admin') !!}">Button Bar Admin</a></h1>
                  </div>
               </div>
               <div class="col-md-4">
                  <div class="row">
                    <div class="col-lg-12">
                    
                            

                    </div>
                  </div>
               </div>
               <div class="col-md-4">

               

               @if(Auth::check())
                  <div class="navbar navbar-inverse" role="banner">
                      <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->email}}<b class="caret"></b></a>
                            <ul class="dropdown-menu animated fadeInUp">
                              <!-- <li><a href="profile.html">Login</a></li> -->
                              <li><a href="{!! action('Auth\AuthController@getLogout') !!}">Logout</a></li>
                            </ul>
                          </li>
                        </ul>
                      </nav>
                  </div>
                @endif  

              
               </div>
            </div>
         </div>
    </div>

    <div class="page-content">
        <div class="row">
          <div class="col-md-2">
                <p class="nav-collapser visible-sm visible-xs"><span class="glyphicon glyphicon-th-list  pull-right" data-toggle="collapse" data-target=".nav" ></span></p>
            <div class="sidebar content-box" style="display: block;">
                @if(Auth::check())
                  <ul class="nav collapse in">
                      <!-- Main menu -->

                      <li><a href="{{url('admin')}}"><span class="glyphicon glyphicon-dashboard"></span> Index</a></li>

                      @foreach ($buttonBars as $bar)
                        <li><a href="{{route('admin.buttonBar.show',$bar->id)}}">{{ $bar->title }}</a></li>
                      @endforeach
        
                      <li><a href="{{ route('admin.users.index') }}"><span class="glyphicon glyphicon-user"></span> Admin Users</a></li>
                       
                  </ul>
                @endif
             </div>
          </div>
          <div class="col-md-10">
            
                <div class="col-sm-12 content-box-large">
    
                  <div class="content-box-header">
                      
                      <div class="row">
                          
                          <div class="col-sm-6 title">
                
                              <h3>
                                @yield('title','')
                
                              </h3>

                          </div>
                      
                          <div class="col-sm-4">

                              @yield('search','')
                          
                          </div>

                          <div class="col-sm-2 ">
                            
                              @yield('action')

                          </div>

                      </div>

                  </div>


                  @include('includes/flash')

                  
                  <div class="row">
                      
                      <div class="col-sm-12">
                        
                        @yield('content','')
                      
                      </div>

                  </div>

              </div>
 
        </div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2014 <a href='http://www.trms.com'>Tightrope Media Systems</a>
            </div>
            
         </div>
      </footer>
  </body>
</html>



