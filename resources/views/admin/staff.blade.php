@extends('admin.layout.auth')

@section('content')



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Green Task Force</title>

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


            <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Manage Users</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li><a href="{{ url('/admin/addgc ') }}">Green Captain</a></li>
                    <li class="active"><a href="#">Staff</a></li>
                    </ul>
            </li>
            
            <li>
            <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false">Manage Posts</a>
                <ul class="collapse list-unstyled" id="pageSubmenu1">
                    <li><a href="">Posts</a></li>
                    <li class=""><a href="#">Add New Post</a></li>
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
  

                <h2>List Of Staff</h2>

<!-- LIST OF MEMBERS -->
                    
            <table id="mytable" class="table table-bordred table-striped">
                   
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Edit</th>  
                        <th>Delete</th>
                    </thead>
             <tbody>
             @foreach($staffs as $staff)
                    <tr>
                            <td> {{$staff->id}} </td>  
                            <td> {{$staff->name}} </td>  
                            <td> {{$staff->email}} </td>
                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#{{$staff->id}}" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><a href="/admin/deletestaff/{{$staff->id}}"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                    </tr>
             
                    <form method="POST" action="updatestaff/{{$staff->id}}">
                    @csrf
                    <!-- View Profile Button Popup -->
                            <div class="modal fade" id="{{$staff->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                  <!--  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button -->
                                    <h3 class="modal-title custom_align" id="Heading">Edit Green Captian Details</h3>
                                </div>
                                    <div class="modal-body">

                                    <div class="form-group">
                                    <label class="col-md-4">ID</label>
                                    <input class="form-control " type="text" name="id" value="{{$staff->id}}">
                                    </div>

                                    <label class="col-md-4">Name</label>
                                    <div class="form-group">
                                    <input class="form-control " type="text" name="name" value="{{$staff->name}}">
                                    </div>

                                    <label class="col-md-4">E-mail</label>
                                    <div class="form-group">
                                    <input class="form-control " type="text" name="email" value="{{$staff->email}}">
                                    </div>
                                    
                                    <label class="col-md-4">Mobile</label>
                                    <div class="form-group">
                                    <input class="form-control " type="text" name="number" value="{{$staff->mobile}}" >
                                    </div>

                                </div>
                                    <div class="modal-footer ">
                                    <button type="submit" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span>Update</button>
                                </div>
                                    </div>
                                <!-- /.modal-content --> 
                            </div>
                        </form>
                            </div>
                            <!-- View Profile Button Popup -->
                            @endforeach

            </tbody>
        <table>





<!-- ADD GTF MEMBER -->
            <h2> Create Staff Account</h2>
                  <div class="card-body">
                    <form method="POST" action="/admin/reg_new_staff">
                    @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>      
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="tpassword" class="col-md-4 col-form-label text-md-right">Temp Password</label>

                            <div class="col-md-6">
                                <input id="tmppassword" type="password" class="form-control{{ $errors->has('tmppassword') ? ' is-invalid' : '' }}" name="tmppassword" value="{{ old('tmppassword') }}" required>      
                            </div>
                        </div> 



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Register New Staff
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>

@endsection