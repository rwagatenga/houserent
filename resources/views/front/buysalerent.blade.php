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
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="{{url('index')}}">Home</a> / Buy, Sale & Rent</span>
    <h2>Buy, Sale & Rent</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">

  <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Search for</h4>
    <form class="user" method="POST" action="{{url('search')}}">
          @csrf
    <input type="text" name="search" class="form-control" placeholder="Search for Location">
    <div class="row">
      
            <div class="col-lg-5">
              <select class="form-control" name="house_type">
                @foreach($search as $key => $view)
                <option>{{$view->house_type}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-lg-7">
             <!--  <select class="form-control" name="price">
                @foreach($search as $key => $view)
                
                <option>{{$view->price}} <?php //echo " - "; ?> {{$view->price +50}}</option>
               
                @endforeach
              </select> -->
            </div>
          </div>

          <div class="row">
          <div class="col-lg-12">
              <select class="form-control" name="house_class">
                @foreach($search as $key => $view)
                
                <option>{{$view->house_class}}</option>
                
                @endforeach
              </select>
              </div>
          </div>
          <button class="btn btn-primary">Find Now</button>

  </div>



<div class="hot-properties hidden-xs">
<h4>Hot Properties</h4>
@foreach($hot as $key => $view)
<div class="row">
                <div class="col-lg-4 col-sm-5"><img src="{{asset('rent_images/'.$view->first_photo)}}" class="img-responsive img-circle" alt="properties"/></div>
                <div class="col-lg-8 col-sm-7">
                  <h5><a href="{{url('details/'.$view->id)}}">{{$view->house_class}} For {{$view->house_type}}</a></h5>
                  <p class="price">Price: {{$view->price}} &nbsp &nbsp @if($view->negotiate == 'Negotiable'){{$view->negotiate}} @else {{" "}} @endif</p> </div>
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


</div>

<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
<div class="pull-left result">Showing: {{$search->count()}} of {{$all->count()}} 
</div>

  <div class="pull-right">
  <!-- <select class="form-control">
  <option>Sort by</option>
  <option>Price: Low to High</option>
  <option>Price: High to Low</option>
</select> -->
</div>

</div>
<br/>
<div class="row">

     <!-- properties -->
     @foreach($search as $key => $view)
      <div class="col-lg-4 col-sm-6">
      <div class="properties">
        <div class="image-holder"><img src="images/properties/1.jpg" class="img-responsive" alt="properties">
          <div class="status sold">{{$view->house_type}}</div>
        </div>
        <h4><a href="property-detail.php">{{$view->house_class}}</a></h4>
        <p class="price">Price: {{$view->price}} &nbsp &nbsp @if($view->negotiate == 'Negotiable'){{$view->negotiate}} @else {{" "}} @endif</p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">{{$view->bedroom}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bath Room">{{$view->bathroom}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">{{$view->parking}}</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">{{$view->kitchen}}</span> </div>
        <a class="btn btn-primary" href="{{url('details/'.$view->id)}}">View Details</a>
      </div>
      </div>
      @endforeach
      <!-- properties -->


      <!-- properties -->
      <!-- <div class="col-lg-4 col-sm-6">
      <div class="properties">
        <div class="image-holder"><img src="images/properties/2.jpg" class="img-responsive" alt="properties">
          <div class="status sold">Sold</div>
        </div>
        <h4><a href="property-detail.php">Royal Inn</a></h4>
        <p class="price">Price: $234,900</p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen">1</span> </div>
        <a class="btn btn-primary" href="property-detail.php">View Details</a>
      </div>
      </div> -->
      <!-- properties -->

    
      <div class="center">

<ul class="pagination">
          {{$search->links()}}
          <!-- <li><a href="#">«</a></li>
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#">»</a></li> -->
        </ul>
</div>
</div>
</div>
</div>
</div>
</div>

@endsection