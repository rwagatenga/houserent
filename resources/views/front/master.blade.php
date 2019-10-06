<!DOCTYPE html>
<html lang="en">
<head>
<title>House Rent Rwanda </title>
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.css')}}" />
  <link rel="stylesheet" href="{{asset('assets/style.css')}}"/>
  <script src="{{asset('http://code.jquery.com/jquery-1.9.1.min.js')}}"></script>
  <script src="{{asset('assets/bootstrap/js/bootstrap.js')}}"></script>
  <script src="{{asset('assets/script.js')}}"></script>
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

<!-- Owl stylesheet -->
<link rel="stylesheet" href="{{asset('assets/owl-carousel/owl.carousel.css')}}">
<link rel="stylesheet" href="{{asset('assets/owl-carousel/owl.theme.css')}}">
<script src="{{asset('assets/owl-carousel/owl.carousel.js')}}"></script>
<!-- Owl stylesheet -->


<!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/slitslider/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/slitslider/css/custom.css')}}" />
    <script type="text/javascript" src="{{asset('assets/slitslider/js/modernizr.custom.79639.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/slitslider/js/jquery.ba-cond.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/slitslider/js/jquery.slitslider.js')}}"></script>
<!-- slitslider -->
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-144503295-1');
</script>

<script>
(function(i,s,o,g,r,a,m){i['GooglAnalyticsObject']=r;i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=l*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=l;a.src=g;m.parentNode.insertBefore(a,m)
})(window, document, 'script', 'https://www.google.com/analytics.js','ga');

ga('create', 'UA-144503295-1');
ga('send', 'pageview');
 </script>

</head>

<body>


<!-- Header Starts -->
<div class="navbar-wrapper">

        <div class="navbar-inverse" role="navigation">
          <div class="container">
            <div class="navbar-header">


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse" >
              @yield('menu')
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

    </div>
<!-- #Header Starts -->





<div class="container">

<!-- Header Starts -->
<div class="header">
<a href="{{url('index')}}"><img src="{{asset('images/joe.jpeg')}}" style="width: 100%;max-width: 380px; height: auto;" class = "img-responsive" alt="Realestate"></a>

              <ul class="pull-right">
                <li><a href="/buy">Buy</a></li>
                <li><a href="/sale">Sale</a></li>         
                <li><a href="/rent">Rent</a></li>
              </ul>
</div>
<!-- #Header Starts -->
</div>
  @yield('contents')





<div class="footer">

<div class="container">



<div class="row" style="font-size: 17px;">
            <div class="col-lg-3 col-sm-3">
                   <h4>Information</h4>
                   <ul class="row">
                 <li class="col-lg-12 col-sm-12 col-xs-3"><a href="/">Home</a></li>
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="/about">About</a></li>
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="/agent">Agents</a></li>         
                <li class="col-lg-12 col-sm-12 col-xs-3"><a href="/contact">Contact</a></li>
              </ul>
            </div>
            
            <!-- <div class="col-lg-3 col-sm-3">
                    <h4>Newsletter</h4>
                    <p>Get notified about the latest properties in our marketplace.</p>
                    <form class="form-inline" role="form">
                            <input type="text" placeholder="Enter Your email address" class="form-control">
                                <button class="btn btn-success" type="button">Notify Me!</button></form>
            </div> -->
            
            <div class="col-lg-3 col-sm-3">
                    <h4>Follow us</h4>
                    <a href="https://www.facebook.com" target="_blank"><img src="{{asset('images/facebook.png')}}" alt="facebook"></a>
                    <a href="https://publish.twitter.com/" target="_blank"><img src="{{asset('images/twitter.png')}}" alt="twitter"></a>
                    <!-- <a href="#"><img src="{{asset('images/linkedin.png')}}" alt="linkedin"></a> -->
                    <a href="https://www.instagram.com/jofreerent" target="_blank"><img src="{{asset('images/instagram.png')}}" alt="instagram"></a>
            </div>

             <div class="col-lg-3 col-sm-3">
                    <h4>Contact us</h4>
                    <p><b>House Rent Rwanda</b><br>
<span class="glyphicon glyphicon-map-marker"></span> Kigali Rwanda <br>
<span class="glyphicon glyphicon-envelope"></span> <a href="https://mail.google.com/mail/?view=cm&fs=1&to=jofreerent@gmail.com&su=House Rent Rwada&body=BODY&" target="_blank"> jofreerent@gmail.com</a><br>
<span class="glyphicon glyphicon-earphone"></span> <a href="tel:+250781448238"> +250781448238</a></p>
            </div>
        </div>
<p class="copyright" style="font-size: 16px;"> Copyright &copy 2019. All rights reserved. Designed by <a href="https://fredrw.netlify.com" target="blank" style="color: white green">Rwagatenga Fred </a> </p>


</div></div>




<!-- Modal -->
<div id="loginpop" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="row">
        <div class="col-sm-6 login">
        <h4>Login</h4>
          <form class="" method="POST" action="/login" role="form">
            @csrf
            <input type="hidden" name="csrf-token" 
    value="nc98P987bcpncYhoadjoiydc9ajDlcn">
        <div class="form-group">
          <label class="sr-only" for="exampleInputEmail2">Email address</label>
          <input type="email" name="email" class="form-control form-control-user {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="exampleInputEmail2" placeholder="Enter email">
           @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
        </div>
        <div class="form-group">
          <label class="sr-only" for="exampleInputPassword2">Password</label>
          <input type="password" class="form-control form-control-user {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="exampleInputPassword2" placeholder="Password">
          @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
          </label>
          &nbsp;&nbsp;&nbsp;
          <label><a style="color:black;text-decoration: none;" href="{{ route('password.request') }}">Forgot Password?</a></label>
        </div>
        
        <button type="submit" class="btn btn-success">Sign in</button>
      </form>          
        </div>
        <!-- <div class="col-sm-6">
          <h4>New User Sign Up</h4>
          <p>Join today and get updated with all the properties deal happening around.</p>
          <button type="submit" class="btn btn-info"  onclick="window.location.href='/register'">Join Now</button>
        </div> -->

      </div>
    </div>
  </div>
</div>
<!-- /.modal -->



</body>
</html>
@yield('scripts')