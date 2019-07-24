@extends('front.master')
@section('menu')
<ul class="nav navbar-nav navbar-right">
               <li><a href="/index" style="font-size: 16px;">Home</a></li>
                <li><a href="/about" style="font-size: 16px; ">About</a></li>
                <li class="active"><a href="/agent" style="font-size: 16px;font-weight: bold">Agents</a></li>
                <!-- <li><a href="/blog">Blog</a></li> -->
                <li><a href="/contact" style="font-size: 16px;">Contact</a></li>
              </ul>
@endsection
@section('contents')
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="{{url('index')}}">Home</a> / Agents</span>
    <h2>Agents</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer agents">

<div class="row">
  <div class="col-lg-8  col-lg-offset-2 col-sm-12">
      <!-- agents -->
      @foreach($agents as $key => $view)
      <div class="row">
        <div class="col-lg-2 col-sm-2 "><a href="#"><img src="{{('passport/'.$view->passport)}}" class="img-responsive"  alt="agent name"></a></div>
        <div class="col-lg-7 col-sm-7 "><h3>{{$view->last_name}} {{$view->first_name}}</h3><p style="font-size: 19px;">{{$view->details}}.<br/>
          He worked at @if(!$view->district) Kigali, Rwanda @else{{$view->district}}, {{$view->sector}}@endif
        </p></div>
        <div class="col-lg-3 col-sm-3 "><span class="glyphicon glyphicon-envelope" style="size: 19px;"></span> <a href="{{url('https://mail.google.com/mail/?view=cm&fs=1&to='.$view->email.'.com&su=House Rent Rwada&body=BODY&')}}" target="_blank")}}" style="font-size: 19px;">{{$view->email}}</a><br>
        <span class="glyphicon glyphicon-earphone" style="size: 19px;"></span> <a href="{{url('tel:'.$view->telephone)}}" style="font-size: 19px;">{{$view->telephone}}</a></div>
      </div>
      @endforeach
      <!-- agents -->
      <div class="center">

<ul class="pagination">
          <li>{{$agents->links()}}</li>
        </ul>
</div>
      
      <!-- agents -->
      
     
  </div>
</div>


</div>
</div>
@endsection