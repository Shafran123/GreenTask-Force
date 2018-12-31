@extends('staff.layout.auth')

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
        <link rel="stylesheet" href="/css/staffdsh.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    </head>
    <body>

<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h4>Staff Dashboard</h4>
          
        </div>
        <div class=logo>
        
        </div>
        <ul class="list-unstyled components">
            
            <p>Welcome Green Task Force<br>  </p>
           
           <li>
           <a href="{{ url('/staff/home') }}" class="">Home</a>

           </li>
          
            <li >

            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Manage Reports</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li class="active"><a href="">All Verified Reports</a></li>
                    <li><a href="{{ url('/staff/newreport') }}">Not Completed Reports</a></li>
                    <li><a href="{{ url('/staff/newreport') }}">On Going Reports</a></li>
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
            
            <li><a class="logout" href="{{ url('/staff/logout') }} " 
            onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                    Logout
            </a>
            <form id="logout-form" action="{{ url('/staff/logout') }}" method="POST" style="display: none;">
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
                    <span> <h4>Welcome Staff : {{ Auth::user()->name }} </h4> </span>
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


                  <h2>All Reports</h2>
               
                        <div id="map" style="height: 500px; width: 100%;"></div>
              
<table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Report Title</th>
                    <th scope="col">Reported At</th>
                    <th scope="col">City</th>
                    <th scope="col">Verified Status</th>
                    <th scope="col">Threat Level</th>
                    <th scope="col">Job Status</th>
                    <th scope="col">View</th>
                   
                    </tr>
                </thead>
                <tbody>
                    
                @foreach($reports as $report)


                    <tr>
                    <th scope="row">{{$report->id}}</th>
                    <td>{{$report->title}}</td>
                    <td>{{$report->date}}</td>
                    <td>{{$report->city}}</td>
                    

                    @if($report ->verified)
                    <td><button type="button" class="btn btn-success" data-toggle="popover" title="Verified By Captain" data-content="{{$report->verified_by}}">&nbsp &nbsp Verifiefd &nbsp &nbsp</button></td>
                    @else
                    <td><button type="button" class="btn btn-danger">Not Verifiefd</button></td>
                    @endif
                    

                    @if($report ->threat_level=='1')              
                    <td><button type="button" class="btn btn-success">&nbsp &nbsp &nbsp &nbsp Low &nbsp &nbsp &nbsp &nbsp</button></td>
                    @elseif($report ->threat_level=='2')
                    <td><button type="button" class="btn btn-success">&nbsp Moderate &nbsp</button></td>
                    @elseif($report ->threat_level=='3')
                    <td><button type="button" class="btn btn-warning">&nbspSubstantial</button></td>        
                    @elseif($report ->threat_level=='4')
                    <td><button type="button" class="btn btn-warning">&nbsp &nbsp &nbsp Severe &nbsp &nbsp</button></td>      
                    @elseif($report ->threat_level=='5')
                    <td><button type="button" class="btn btn-danger">&nbsp &nbsp &nbspCritical &nbsp &nbsp</button></td> 
                          
                    @else
                    <td><button type="button" class="btn btn-success">Not Defined</button></td>
                    @endif



                    @if($report ->status)
                    <td><button type="button" class="btn btn-success" data-toggle="popover" title="Completed By Staff" data-content="{{$report->completed_by}}">&nbsp &nbsp Completed &nbsp &nbsp</button></td>                   
                    @else
                    <td><button type="button" class="btn btn-danger">Not Completed</button></td>
                    @endif

 
                    <td><button type="button" class="btn btn-warning"><a href="/staff/view_verified_report/{{$report->id}}"><span class="glyphicon glyphicon-eye-open"></span></button></td>
                   
                </tr>
                    

                    @endforeach
                    
                </tbody>
                </table>
        
    <script>
        var map;
       
        function initAutocomplete(){
            console.log(document.getElementById('map'));
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 6.870066  , lng: 79.879710},
                zoom: 10
            });

          
           


      @foreach($reports as $report)

            var content_string{{$report->id}}= '<h3 id="firstHeading" class="firstHeading">{{$report->title}}</h3><h4>Posted By:{{$report->posted_by}}</h4><p>Posted Date:{{$report->date}}<br>Threat Level:{{$report->threat_level}}</p>';

            var infowindow{{$report->id}} = new google.maps.InfoWindow({
                 content: content_string{{$report->id}}
            });

            var marker{{$report->id}}= new google.maps.Marker({
                
                position: {
                    
                    lat:{{$report->latitude}},
                    lng: {{$report->longitude}}
                },      
                map: map,
              
                draggable: false
            });
            
            @if($report ->threat_level=='1') 
            marker{{$report->id}}.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png')
            @elseif($report ->threat_level=='2') 
            marker{{$report->id}}.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png')
            @elseif($report ->threat_level=='3') 
            marker{{$report->id}}.setIcon('http://maps.google.com/mapfiles/ms/icons/yellow-dot.png')
            @elseif($report ->threat_level=='4')
            marker{{$report->id}}.setIcon('http://maps.google.com/mapfiles/ms/icons/yellow-dot.png')
            @else
            marker{{$report->id}}.setIcon('http://maps.google.com/mapfiles/ms/icons/red-dot.png')
            @endif

            marker{{$report->id}}.addListener('click', function() {
              infowindow{{$report->id}}.open(map, marker{{$report->id}});
            });

            @endforeach
            

        }
        
     </script>
     echo {{$report->latitude}}

      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvYuXaCOJAPtjRUtbnYgkoDHiGB9rC1Gs&libraries=places&callback=initAutocomplete"async defer></script>

@endsection
