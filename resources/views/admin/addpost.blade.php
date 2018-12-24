@extends('admin.layout.auth')

@section('content')



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

       

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="/css/admindsh.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    </head>
    <body>

<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h4>Admin Dashboard</h4>
          
        </div>
        <div class=logo>
        
        </div>
        <ul class="list-unstyled components">
            
            <p>Welcome Green Task Force<br>  </p>
           
           <li>
           <a href="{{ url('/admin/home ') }}" class="active">Home</a>

           </li>
          
            <li >

            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Manage Users</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li class=""><a href="{{ url('/admin/addgc') }}">Green Captain</a></li>
                    <li><a href="{{ url('/admin/staff') }}">Staff</a></li>
                    </ul>
            </li>
              
            <li>
            <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false">Manage Posts</a>
                <ul class="collapse list-unstyled" id="pageSubmenu1">
                    <li><a href="">Posts</a></li>
                    <li class="active"><a href="#">Add New Post</a></li>
                    </ul>
            </li>


            <li>
                <a href="#">Messeage User</a>
            </li>
           
            <li>
                <a href="#">Settings</a>
            </li>
          
        </ul>   
         @if (Auth::guest())

         @else
        <ul class="list-unstyled CTAs">
            
            <li><a class="logout" href="{{ url('/admin/logout')}} " 
            onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    Logout
            </a>
            <form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
                 {{ csrf_field() }}
        </form>
        </li>
        @endif
        </ul>
     
    </nav>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                    <span> <h4>Welcome Admin : {{ Auth::user()->name }} </h4> </span>
                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-warning navbar-btn">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Toggle Sidebar</span>
                            </button>
                        
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                          
                                
                            </ul>   
                        </div>
                    </div>
                </nav>
                  <!-- Page Content Holder -->


                  <h2>Add Post</h2>
             
                    <form method="POST" action="/admin/new_post">
                    @csrf
                    <p class="req">Fields with * are required<br></p>

                    <div class="form-group">
                         <label class="col-md-4">Post Titile</label>
                            <input class="form-control " type="text" name="title" value="">
                    </div>

                      <div class="form-group">
                         <label class="col-md-4">Post Content</label>
                         <textarea rows="10" class="form-control" name="content" placeholder=""></textarea>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 ">
                            <button type="submit" class="btn btn-primary"  style="width: 100%">
                                   ADD NEW POST
                            </button>
                        </div>
                    </div>
                    
                </form>
                </div>
                
         






@endsection