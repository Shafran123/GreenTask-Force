@extends('member.layout.auth')

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
        <link rel="stylesheet" href="/css/memberdsh.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    </head>
    <body>

<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h4>Member Dashboard</h4>
          
        </div>
        <div class=logo>
        
        </div>
        <ul class="list-unstyled components">
            
            <p>Welcome Green Task Force<br>  </p>
           
           <li>
           <a href="#" class="active">Home</a>

           </li>
          
            <li >

            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Manage Reports</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li class=""><a href="{{ url('/member/reports') }}">My Reports</a></li>
                    <li class="active"><a href="">Submit New Report</a></li>
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
            
            <li><a class="logout" href="{{ url('/member/logout') }} " 
            onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    Logout
            </a>
            <form id="logout-form" action="{{ url('/member/logout') }}" method="POST" style="display: none;">
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
                    <span> <h4>Welcome Member : {{ Auth::user()->name }} </h4> </span>
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



             <h2>Submit Report</h2>
             
             <form method="POST" action="/member/new_report" enctype="multipart/form-data">
             @csrf
             <p class="req">Fields with * are required<br></p>

            <div class="form-group">
                  <label class="col-md-4">Posting As</label>
                     <input class="form-control " type="text" name="postedby" value="{{ Auth::user()->name }}" readonly>
             </div>


             <div class="form-group">
                  <label class="col-md-4">Titile</label>
                     <input class="form-control " type="text" name="title" value="">
             </div>


             <div class="form-group">
                  <label class="col-md-4">Date</label>
                     <input class="form-control " type="date" name="date" value="">
             </div>


            <div class="form-group">
                  <label class="col-md-4">Impact</label>
                     <input class="form-control " type="text" name="impact" value="">
             </div>


            <div class="form-group">
                  <label class="col-md-4">City</label>
                     <input class="form-control " type="text" name="city" value="">
             </div>
           

               <div class="form-group">
                  <label class="col-md-4">Description</label>
                  <textarea rows="10" class="form-control" name="desc" placeholder=""></textarea>
             </div>

             <div class="form-group">
                  <label class="col-md-4">Upload Images </label>
                  <input type="file" class="form-control-file {{ $errors->has('images') ? ' is-invalid' : '' }}" id="images" name="file" accept=".jpg, .png" multiple>
             </div>


            <div class="form-group">
                        <label>Please select an approximate location from the map</label> 
                        <div class="d-inline-block">
                          <label for="lat">Latitude</label>
                      
                        <input type="text" name="lat" id="lat" class="form-control" value="{{ old('lat') }}" readonly></div>
                         <div class="d-inline-block">
                         <label for="lng" style="margin-top: 10px;">Longitude</label>
                          <input type="text" name="lng" id="lng" class="form-control" value="{{ old('lng') }}" readonly></div>
                        
                        
                        <div id="map" style="height: 500px; width: 100%;"></div>
            </div>

          
             <br>
                
             <div class="form-group">
                 <div class="col-md-12 ">
                     <button type="submit" class="btn btn-primary"  style="width: 100%">
                       Submit New Report
                     </button>
                 </div>
             </div>
             
         </form>



    <script>
        var map;
        function initAutocomplete(){
            console.log(document.getElementById('map'));
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 6.870066, lng: 79.879710},
                zoom: 15
            });
            var marker = new google.maps.Marker({
                position: {
                    lat: 6.870066,
                    lng: 79.879710
                },
                map: map,
                draggable: true
            });

//            document.getElementById('lat').value = marker.getPosition().lat();
//            document.getElementById('lng').value = marker.getPosition().lng();

            var input = document.getElementById('pac-input');

            var searchBox = new google.maps.places.SearchBox(input);

            google.maps.event.addListener(searchBox, 'places_changed',function(){
                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();
                var i, place;

                for (i=0; place=places[i]; i++) {
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                }

                map.fitBounds(bounds);
                map.setZoom(15);
            });

            google.maps.event.addListener(marker, 'position_changed', function(){
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();

                document.getElementById('lat').value = lat;
                document.getElementById('lng').value = lng;
            });
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvYuXaCOJAPtjRUtbnYgkoDHiGB9rC1Gs&libraries=places&callback=initAutocomplete"
            async defer></script>

@endsection
