<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>House Rent Rwanda</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top" onLoad="getLocation()">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{asset('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">House Rent Rwanda</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="{{asset('home')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Agent')
      <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Manage Properties:</h6>
            <a class="collapse-item active" href="{{url('admin/addProperty')}}">Add Properties</a>
            <a class="collapse-item" href="{{url('admin/viewProperty')}}">View Properties</a>
          </div>
        </div>
      </li>
      @endif

      <!-- Divider -->
     <!--  <hr class="sidebar-divider">-->

      <!-- Heading -->
      <!-- <div class="sidebar-heading">
        Addons
      </div> -->

      <!-- Nav Item - Utilities Collapse Menu -->
      @if(Auth::user()->role == 'Admin')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Management</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User Management:</h6>
            <a class="collapse-item" href="{{url('admin/addUser')}}">Add Users</a>
            <a class="collapse-item" href="{{url('admin/viewAgent')}}">View Agents</a>
            <a class="collapse-item" href="{{url('admin/viewOwner')}}">View Owners</a>
            <!-- <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a> -->
          </div>
        </div>
      </li>
      @endif

      <!-- Divider -->
     <!--  <hr class="sidebar-divider">-->

      <!-- Heading -->
      <!-- <div class="sidebar-heading">
        Addons
      </div> -->

      @if(Auth::user()->role == 'Agent')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-inbox"></i>
          <span>Incoming</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Incoming Information:</h6>
            <a class="collapse-item" href="{{url('admin/messages')}}">View Messages</a>
            <!-- <a class="collapse-item" href="{{url('admin/notifications')}}">View Notifications</a> -->
            <!-- <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a> -->
          </div>
        </div>
      </li>
      @endif

      @if(Auth::user()->role == 'Admin')
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-inbox"></i>
          <span>Incoming</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Incoming Information:</h6>
            <a class="collapse-item" href="{{url('admin/messages')}}">View Messages</a>
            <a class="collapse-item" href="{{url('admin/notifications')}}">View Notifications</a>
            <!-- <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a> -->
          </div>
        </div>
      </li>
      @endif

      <!-- Nav Item - Charts -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li> -->

      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item active">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <!-- Sidebar Toggle (Topbar) -->
          <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button> -->

          <!-- Topbar Search -->
          <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div> -->
            </li>
            @if(Auth::user()->role == 'Admin')
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">@if($noti > 0) {{$noti}}@endif</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notification Center
                </h6>
                @foreach($notify as $key => $view)
                <a class="dropdown-item d-flex align-items-center" href="{{url('admin/notifications/read/'.$view->id)}}">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">{{$view->created_at}}</div>
                    <span class="font-weight-bold">{{substr($view->message, 0, 34)}}</span>
                  </div>
                </a>
                @endforeach
                <a class="dropdown-item text-center small text-gray-500" href="{{url('admin/notifications')}}">Show All Notification</a>
              </div>
            </li>
            @endif

            @if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Agent')
            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">@if($number > 0) {{$number}}@endif</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                @foreach($numbers as $key => $view)
                <a class="dropdown-item d-flex align-items-center" href="{{url('admin/messages/read/'.$view->id)}}">
                  <div class="dropdown-list-image mr-3">
                    <!-- <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div> -->
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">
                      {{substr($view->message, 0, 20)}}...</div>
                    <div class="small text-gray-500">{{$view->full_names}}</div>
                  </div>
                </a>
                @endforeach
                <a class="dropdown-item text-center small text-gray-500" href="{{url('admin/messages')}}">Read More Messages</a>
              </div>
            </li>
            @endif

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->last_name}} {{Auth::user()->first_name}}</span>
                <img class="img-profile rounded-circle" src="{{asset('passport/'.Auth::user()->passport)}}">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{url('update/profile/'.Auth::user()->id)}}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a> -->
                <!-- <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a> -->
                <div class="dropdown-divider"></div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                <a class="dropdown-item" href="{{route('logout')}}" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Upload Properties</h1>

          <div class="row">

            <div class="col-lg-6">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Information</h6>
                </div>
                <div class="card-body">
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
                  <form method="POST" action="{{url('admin/addProperty')}}"  enctype="multipart/form-data" class="user">
                    @csrf
                    <input type="text" name="family_name" placeholder="Enter House Owner's Family Name...Eg: Rwabugiri, Kayonga" class="form-control{{ $errors->has('family_name') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
                    @if ($errors->has('family_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('family_name') }}</strong>
                                    </span>
                                @endif
                    <br/>
                    <input type="text" name="other_name" placeholder="Enter House Owner's Other Name...Eg: Pascal, Bienvenue"class="form-control{{ $errors->has('other_name') ? ' is-invalid' : '' }}" value="{{ old('other_name') }}" required>
                    @if ($errors->has('other_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('other_name') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <input type="text" name="email" placeholder="Enter House Owner's Email...Eg: example@gmail.com" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
                    @if ($errors->has('email
                    '))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <input type="text" name="telephone" placeholder="Enter House Owner's Telephone...Eg: 07XXXXXXXX"class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" value="{{ old('telephone') }}" required>
                    @if ($errors->has('telephone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <input type="text" name="province" placeholder="Enter Province...Eg: North, East" class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}" value="{{ old('province') }}" required>
                    @if ($errors->has('province'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <input type="text" name="district" class="form-control" placeholder="Enter District...Eg: Gasabo, Kicukiro" class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}" value="{{ old('district') }}" required>
                    @if ($errors->has('district'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('district') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <input type="text" name="sector" class="form-control" placeholder="Enter Sector...Eg: Kacyuru, Gatenga" class="form-control{{ $errors->has('sector') ? ' is-invalid' : '' }}" value="{{ old('sector') }}" required>
                    @if ($errors->has('sector'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sector') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <input type="text" name="address" placeholder="Enter Zip Address...Eg: KN 67 AV" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ old('address') }}" required>
                    @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <select name="house_class" class="form-control{{ $errors->has('house_class') ? ' is-invalid' : '' }}" value="{{ old('house_class') }}" required>
                      <option disabled selected hidden">Select House Class</option>
                      <option>House</option>
                      <option>Appartment</option>
                      <option>Office</option>
                    </select>
                    @if ($errors->has('house_class'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('house_class') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <select name="house_type" class="form-control{{ $errors->has('house_type') ? ' is-invalid' : '' }}" value="{{ old('house_type') }}" required>
                      <option disabled selected hidden">Select House Type</option>
                      <option>Rent</option>
                      <option>Buy</option>
                      <option>Sale</option>
                    </select>
                            @if ($errors->has('house_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('house_type') }}</strong>
                                    </span>
                                @endif
                                <br/>
                  <input type="text" name="bedroom" placeholder="Enter Number of Bedrooms...Eg: 0 or 2 or 3 " class="form-control{{ $errors->has('bedroom') ? ' is-invalid' : '' }}" value="{{ old('bedroom') }}" required>
                    @if ($errors->has('bedroom'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bedroom') }}</strong>
                                    </span>
                                @endif
                                <br/>
                  <input type="text" name="bathroom" placeholder="Enter Number of Bathroom...Eg: 0 or 1 or 3 " class="form-control{{ $errors->has('bathroom') ? ' is-invalid' : '' }}" value="{{ old('bathroom') }}" required>
                    @if ($errors->has('bathroom'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bathroom') }}</strong>
                                    </span>
                                @endif
                                <br/>
                  <input type="text" name="kitchen" placeholder="Enter Number of Kitchen...Eg: 0 or 2 or 3 " class="form-control{{ $errors->has('kitchen') ? ' is-invalid' : '' }}" value="{{ old('kitchen') }}" required>
                    @if ($errors->has('kitchen'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kitchen') }}</strong>
                                    </span>
                                @endif
                                <br/>
                  <input type="text" name="parking" placeholder="Enter Number of Cars can be Parked...Eg: 1 or 2 " class="form-control{{ $errors->has('parking') ? ' is-invalid' : '' }}" value="{{ old('parking') }}" required>
                    @if ($errors->has('parking'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('parking') }}</strong>
                                    </span>
                                @endif
                                <br/>
                </div>
              </div>

            </div>

            <div class="col-lg-6">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">House's Information</h6>
                </div>
                <div class="card-body">
                  <br/>
                  
                  <input type="text" name="price" placeholder="Enter Price...Eg: 35$ - 40$" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ old('price') }}" required>
                    @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                                <br/>
                  <select name="currency" class="form-control{{ $errors->has('currency') ? ' is-invalid' : '' }}" value="{{ old('currency') }}" required>
                      <option disabled selected hidden">Select Currency</option>
                      <option>frw</option>
                       <option>$</option>
                      <!-- <option>High</option> -->
                    </select>
                            @if ($errors->has('currency'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('currency') }}</strong>
                                    </span>
                                @endif
                                <br/>
                  <select name="negotiate" class="form-control{{ $errors->has('negotiate') ? ' is-invalid' : '' }}" value="{{ old('negotiate') }}" required>
                      <option disabled selected hidden">Negotiate</option>
                      <option>Negotiable</option>
                      <option>Not Negotiable</option>
                    </select>
                            @if ($errors->has('negotiate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('negotiate') }}</strong>
                                    </span>
                                @endif
                                <br/>
                  <select name="commission" class="form-control{{ $errors->has('commission') ? ' is-invalid' : '' }}" value="{{ old('commission') }}" required>
                      <option disabled selected hidden">Select Commission</option>
                      <option>Low</option>
                      <option>High</option>
                    </select>
                     @if ($errors->has('commission'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('commission') }}</strong>
                                    </span>
                                @endif
                    <br/>
                  <label>Enter Front Picture</label>
                    <input type="file" name="photo" placeholder="Enter Front Picture..." class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" value="{{ old('photo') }}" required>
                    @if ($errors->has('photo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <label>Enter Other Pictures</label>
                    <input type="file" multiple = "multiple" name="my_file[]" placeholder="Enter District..." class="form-control{{ $errors->has('my_file[]') ? ' is-invalid' : '' }}" value="{{ old('my_file[]') }}" required>
                    @if ($errors->has('my_file[]'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('my_file[]') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <label>More Details</label><br/>
                    <TEXTAREA name="details" placeholder="Enter More Details..." style="height: 120px;" class="form-control{{ $errors->has('details') ? ' is-invalid' : '' }}" required>
                      {{ old('details') }}
                    </TEXTAREA>
                    @if ($errors->has('details'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <label>Latitude</label>
                    <input type="text" name="latitude" id="latitude" placeholder="Enter Latitude" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" value="{{ old('latitude') }}">
                    @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('latitude') }}</strong>
                                    </span>
                                @endif
                                
                                <label>Longitude</label>
                                <input type="text" name="longitude" id="longitude" placeholder="Enter Longitude" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" value="{{ old('longitude') }}" >
                    @if ($errors->has('longitude'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('longitude') }}</strong>
                                    </span>
                                @endif
                                <br/><br/>
                    <button class="btn btn-primary">Upload</button>
                    &nbsp; &nbsp; &nbsp; &nbsp;
                    <a href="{{url('admin/addProperty')}}" class="btn btn-danger">Cancel</a>
                  </form>
  
                </div>
              </div>

            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-primary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
<script>

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else { 
    alert("Geolocation is not supported by this browser.");
  }
}

function showPosition(position) {
  $("#latitude").val(position.coords.latitude);
  $("#longitude").val(position.coords.longitude);
}

function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      alert("User denied the request for Geolocation. Allow Your Location");
      break;
    case error.POSITION_UNAVAILABLE:
      alert("Location information is unavailable. Can you Change your Browser");
      break;
    case error.TIMEOUT:
      alert("The request to get user location timed out.");
      break;
    case error.UNKNOWN_ERROR:
      alert("An unknown error occurred.");
      break;
  }
}
</script>
