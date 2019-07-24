@extends('front.master')

@section('menu')
<ul class="nav navbar-nav navbar-right">
               <li class="active"><a href="{{url('/index')}}">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/agent">Agents</a></li>
                <!-- <li><a href="/blog">Blog</a></li> -->
                <li><a href="/contact">Contact</a></li>
              </ul>
@endsection

@section('contents')
<!------------------------>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="{{url('index')}}">Home</a> / {{$read[0]->house_type}}</span>
    <h2>{{$read[0]->house_type}}</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">

<div class="hot-properties hidden-xs">
<h4>Hot Properties</h4>
@foreach($hot as $key => $view)
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="{{asset('rent_images/'.$view->first_photo)}}" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="{{url('details/'.$view->id)}}">{{$view->house_class}} For {{$view->house_type}}</a></h5>
                  <p class="price">${{$view->price}}</p> </div>
              </div>
              @endforeach
<!-- <div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/3.jpg" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div>

<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="images/properties/2.jpg" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p> </div>
              </div> -->

</div>



<div class="advertisement">
  <h4>Advertisements</h4>
  <img src="{{asset('images/mtn.gif')}}" class="img-responsive" alt="advertisement">

</div>

</div>

<div class="col-lg-9 col-sm-8 ">

<h2>{{$read[0]->bedroom}} Rooms and {{$read[0]->bathroom}} Bathrooms {{$read[0]->house_class}}</h2>
<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators hidden-xs">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
        <li data-target="#myCarousel" data-slide-to="3" class=""></li>
      </ol>
      <div class="carousel-inner">

        @foreach($read as $view)
        <!-- Item 1 -->
        
          @foreach($distination as $key => $look)
          @if($key == 0)
          <div class="item active">
          <img src="{{asset('rent_images/'.$look)}}" class="img-rounded properties" style="width: 560px;height: 350px;" alt="properties"/>
           </div>
           @else 
           <div class="item">
          <img src="{{asset('rent_images/'.$look)}}" class="properties" style="width: 560px;height: 350px;" alt="properties" />
           </div>
           @endif
          @endforeach
       
        @endforeach
        <!-- #Item 1 -->
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
<!-- #Slider Ends -->

  </div>
  


@foreach($read as $key => $view)
  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Properties Detail</h4>
  <p style="font-size: 17px;">
  {{$view->details}}
</p>

  <p class="text-responsive" style="font-size: 17px;">

</p>

  </div>
  @endforeach
  @if(($view->latitude !== NULL && $view->longitude !== NULL) || ($view->latitude != "" && $view->longitude != "")) 
  <div><h4><span class="glyphicon glyphicon-map-marker"></span> Location</h4>
<div class="well">
  <!-- <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe> -->
  <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="350" id="gmap_canvas" src="https://maps.google.com/maps?q={{$view->latitude}}%2C%20{{$view->longitude}}&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.pureblack.de"></a></div><style>.mapouter{position:relative;text-align:right;height:300;width:500px;}.gmap_canvas {overflow:hidden;background:none!important;height:350px;width:500px;}</style></div>

  <!-- <a href="https://www.latlong.net/c/?lat={{$view->latitude}}&long={{$view->longitude}}" target="_blank">({{$view->latitude}}, {{$view->longitude}})</a> -->
    <div id="map_canvas"></div>
  </div>
  </div>
  @endif
  </div>
  <div class="col-lg-4">
    @foreach($read as $key => $view)
  <div class="col-lg-12  col-sm-6">
<div class="property-info" style="font-size: 17px;>
<p class="price">{{$view->price}}</p>
  <p class="area"><span class="glyphicon glyphicon-map-marker"></span> {{$view->address}} {{$view->sector}}, {{$view->district}}, {{$view->province}}</p>
  @foreach($agent as $agent)
  <div class="profile">
  <span class="glyphicon glyphicon-user"></span> Agent Details
  <p>{{$agent->last_name}} {{$agent->first_name}}<br>{{$agent->telephone}}</p>
  </div>
  @endforeach
</div>

    <h5><span class="glyphicon glyphicon-home"></span> Availabilty</h6>
    <div class="listing-detail">
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">{{$view->bedroom}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bath Room">{{$view->bathroom}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">{{$view->parking}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>

</div>
@endforeach
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">
  <h6><span class="glyphicon glyphicon-envelope"></span> Post Enquiry</h6>
  @foreach($read as $key => $view)
  @if (\Session::has('errors'))
                      <div class="col-sm-12">
                          <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                            {{Session::get('errors')}}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                          </div>
                      </div>
                      @elseif(\Session::has('success'))
                      <div class="col-sm-12">
                          <div class="alert  alert-primary alert-dismissible fade show" role="alert">
                            {{Session::get('success')}}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                          </div>
                      </div>
                      <br/>
                  @endif
                  
  <form method="POST" action="{{url('message/'.$view->agent_id)}}">
              
              {{csrf_field()}}
                <input type="text" name="fullNames" placeholder="Full Name" class="form-control{{ $errors->has('fullNames') ? ' is-invalid' : '' }}" value="{{ old('fullNames') }}" required autofocus>

                                @if ($errors->has('fullNames'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fullNames') }}</strong>
                                    </span>
                                    <br/>
                                @endif
                                
                <input type="text" name="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    <br/>
                                @endif

                <input type="text" name="phone" placeholder="Enter Phone Number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    <br/>
                                @endif
                <textarea rows="4" placeholder="Message" name="message" class="form-control" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}"  required autofocus>{{ old('message') }}</textarea>

                                @if ($errors->has('message'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                    <br/>
                                @endif
                                <button type="submit" class="btn btn-success" name="Submit">Send Message</button>
            </form>
      @endforeach
 </div>         
</div>
  </div>
</div>
</div>
</div>
</div>
</div>

<!---------------------------->
@endsection

@section('scripts')
<script>
  // var map = new google.maps.Map(document.getElementById('map-canvas'), {
  //   center: {
  //     lat: {{$view->latitude}},
  //     lng: {{$view->longitude}}
  //   },
  //   zoom: 15
  // });

  // var marker = new google.maps.Marker({
  //   position: {
  //     lat: 1.949287,
  //     lng: -30.99989
  //   },
  //   map: map,
  // });
  var directionsDisplay,
    directionsService,
    map;

function initialize() {
  var directionsService = new google.maps.DirectionsService();
  directionsDisplay = new google.maps.DirectionsRenderer();
  var chicago = new google.maps.LatLng(41.850033, -87.6500523);
  var mapOptions = { zoom:7, mapTypeId: google.maps.MapTypeId.ROADMAP, center: chicago }
  map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
  directionsDisplay.setMap(map);
}

</script>
@endsection






