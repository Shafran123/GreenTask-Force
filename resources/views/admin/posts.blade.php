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
           <a href="#" class="active">Home</a>

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
                    <li class="active"><a href="">Posts</a></li>
                    <li class=""><a href="{{ url('/admin/addpost') }}">Add New Post</a></li>
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

 <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                       <th>Id</th>
                       <th>Post Title</th>
                       
                       <th>Draft</th>  
                       <th>Edit</th>  
                       <th>Delete</th>
                   </thead>
            <tbody>
            @foreach($posts as $post)
                   <tr>
                           <td> {{$post->id}} </td>  	
                           <td> {{$post->title}} </td>  
                        
                           <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#post{{$post->id}}" ><span class="glyphicon glyphicon-eye-open"></span></button></p></td>
                           <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#{{$post->id}}" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                           <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><a href="/admin/deletepost/{{$post->id}}"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                   </tr>



                        <!-- View psotPopup -->
                         <div class="modal fade" id="post{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                                 <div class="modal-header">
                                                    <h3 class="modal-title custom_align" id="Heading">Post Draft View</h3>
                                                 </div>

                                    <div class="modal-body">

                                            <div class="form-group">
                                            <label class="col-md-6">Post ID</label>   
                                            <label class="col-md-6">{{$post->id}}</label>                                    
                                            </div>
<br>
                                            
                                            <div class="form-group">
                                            <label class="col-md-6">Post Name</label>   
                                            <label class="col-md-6">{{$post->title}}</label>
                                            </div>
<br>
                                            <div class="form-group">
                                            <label class="col-md-6">Post Content</label>   
                                            <label class="col-md-6">{{$post->content}}</label>
                                            </div>

                                     </div>
                                 </div>
                              </div>
                        </div>






                    <form method="POST" action="updatepost/{{$post->id}}">
                    @csrf
                    <!-- View Profile Button Popup -->
                            <div class="modal fade" id="{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                  <!--  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button -->
                                    <h3 class="modal-title custom_align" id="Heading">Edit Green Captian Details</h3>
                                </div>
                                    <div class="modal-body">

                                    <div class="form-group">
                                    <label class="col-md-4">ID</label>
                                    <input class="form-control " type="text" name="id" value="{{$post->id}}">
                                    </div>

                                    <label class="col-md-4">Title</label>
                                    <div class="form-group">
                                    <input class="form-control " type="text" name="title" value="{{$post->title}}">
                                    </div>

                                      <label class="col-md-4">Title</label>
                                    <div class="form-group">
                                    <textarea rows="10" class="form-control" name="content" placeholder="">{{$post->content}}</textarea>

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
</table>
@endsection