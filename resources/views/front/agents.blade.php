@extends('front.master')
@section('menu')
<ul class="nav navbar-nav navbar-right">
               <li ><a href="/index">Home</a></li>
                <li><a href="/about">About</a></li>
                <li class="active"><a href="/agent">Agents</a></li>
               <!--  <li><a href="/blog">Blog</a></li> -->
                <li><a href="/contact">Contact</a></li>
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
        <div class="col-lg-7 col-sm-7 "><h4>{{$view->last_name}} {{$view->first_name}}</h4><p>This is our Agent we works with in 5yeas of experience in house commissional and he is worked at especially {{$view->sector}}, {{$view->district}}.</p></div>
        <div class="col-lg-3 col-sm-3 "><span class="glyphicon glyphicon-envelope"></span> <a href="mailto:abc@realestate.com">{{$view->email}}</a><br>
        <span class="glyphicon glyphicon-earphone"></span> {{$view->telephone}}</div>
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