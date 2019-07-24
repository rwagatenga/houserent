@extends('front.master')
@section('menu')
<ul class="nav navbar-nav navbar-right">
               <li><a href="/index" style="font-size: 16px;">Home</a></li>
                <li><a href="/about" style="font-size: 16px; ">About</a></li>
                <li><a href="/agent" style="font-size: 16px;">Agents</a></li>
                <!-- <li><a href="/blog">Blog</a></li> -->
                <li class="active"><a href="/contact" style="font-size: 16px;font-weight: bold">Contact</a></li>
              </ul>
@endsection
@section('contents')
<!------------------------>
<!-- banner -->
<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="{{url('index')}}">Home</a> / Contact Us</span>
    <h2>Contact Us</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="spacer">
<div class="row contact">
  <div class="col-lg-6 col-sm-6 ">
    

            <form method="POST" action="{{url('contact')}}" class="user">
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
                  @endif
                  <br/>
              @csrf
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
                <textarea rows="6" placeholder="Message" name="message" class="form-control" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}"  required autofocus>{{ old('message') }}</textarea>

                                @if ($errors->has('message'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                    <br/>
                                @endif
                                <button type="submit" class="btn btn-success" name="Submit">Send Message</button>
            </form>
          


                
        </div>
  <div class="col-lg-6 col-sm-6 ">
  <div class="well"><div class="mapouter"><div class="gmap_canvas"><iframe width="513" height="331" id="gmap_canvas" src="https://maps.google.com/maps?q=Kigali%20Rwandex%20&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><span style="font-size:12px;">Werbung: <a href="https://www.jetzt-drucken-lassen.de">jetzt-drucken-lassen.de</a></span><a href="https://www.embedgooglemap.net/elegantthemes/" class="lic" rel="nofollow">Divi. The Ultimate WordPress Theme.</a></div><style>.mapouter{position:relative;text-align:right;height:331px;width:513px;}.lic{position:absolute;z-index:999;bottom:-14px;right:0;font-size:11px;font-family:arial;color:#666;}.gmap_canvas {overflow:hidden;background:none!important;height:331px;width:513px;}</style></div></div>
  </div>
</div>
</div>
</div>
@endsection