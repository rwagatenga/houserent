@extends('front.master')

@section('menu')
<ul class="nav navbar-nav navbar-right">
               <li><a href="/index" style="font-size: 16px;">Home</a></li>
                <li class="active"><a href="/about" style="font-size: 16px; font-weight: bold">About</a></li>
                <li><a href="/agent" style="font-size: 16px;">Agents</a></li>
                <!-- <li><a href="/blog">Blog</a></li> -->
                <li><a href="/contact" style="font-size: 16px;">Contact</a></li>
              </ul>
@endsection
@section('contents')
<!------------------------>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="{{url('index')}}">Home</a> / About Us</span>
    <h2>About Us</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row">
  <div class="col-lg-8  col-lg-offset-2">
  <img src="images/about.jpg" class="img-responsive thumbnail"  alt="realestate">
  <h3>Business Background</h3>
  <p style="font-size: 19px;">Joe Solution LTD is a company that help in renting of small and big living houses. We help also those who need short and long living Appartment and who need Offices. Joe Solution help people who need to sell houses and those ones need to buy them in the same time and the service related on buying and selling houses.</p>
  <!-- <h3>Company Profile</h3>
  <p></p> -->
  <h3>Our Mission</h3>
  <p style="font-size: 19px;">We would like to inform you that at Joe Solution LTD we have this services:
    <ul style="font-size: 18px; list-style-type: square;">
      <li>We want to improve the way of getting rent house for free in quick manner in order to avoid some disorder from some people.</li><br/>
      <li>We invite all clerk in housing services to work with us because we can give them access to facilate their work.</li><br/>
      <li>We help people who want to sell and buy house in Easily way.</li>
    </ul></p>
  <!-- <p style="font-size: 19px;"></p> -->
  </div>
 
</div>
</div>
</div>
@endsection