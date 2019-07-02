<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>House Rent Rwanda</title>

  <!-- Custom fonts for this template -->
  <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{asset('admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
  <style type="text/css">
    /* The Modal (background) */
#openedModal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;

}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
  </style>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">House Rent Rwanda</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.html">
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
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
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
              </div>
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
          <h1 class="h3 mb-2 text-gray-800">Properties Table</h1>
          <p class="mb-4">This Table is for showing you about a little bit information of House Rental so that it can be easily found by search</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Properties Table</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="dataTable" class="table table-responsive"><br/>
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Telephone</th>
                      <th>Picture</th>
                      <th>Type</th>
                      <th>District</th>
                      <th>Sector</th>
                      <th>Bedrooms</th>
                      <th>Bathroom</th>
                      <th>Packing</th>
                      <th>Price</th>
                      @if(Auth::user()->role == 'Admin')
                      <th colspan="3">Action</th>
                      @<?php else: ?>
                      <th colspan="2">Action</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($reads as $view)

                    <tr>
                      <td>{{$view->first_name}} {{$view->last_name}}</td>
                      <td>{{$view->telephone}}</td>
                      <td><img src="{{asset('rent_images/'.$view->first_photo)}}" style="width:150px; height: 90px;"></td>
                      <td>{{$view->house_type}}</td>
                      <td>{{$view->district}}</td>
                      <td>{{$view->sector}}</td>
                      <td>{{$view->bedroom}}</td>
                      <td>{{$view->bathroom}}</td>
                      <td>{{$view->parking}}</td>
                      <td>{{$view->price}}</td>
                      @if(Auth::user()->role == 'Admin')
                      <td><button style="color: white;" class="btn btn-primary" id="openModal">Edit</button></td>
                      <td><a href="{{url('admin/disable/'.$view->id)}}" class="btn btn-danger">Disable</a></td>
                      <td><a href="{{url('admin/enable/'.$view->id)}}" class="btn btn-warning">Enable</a></td>
                      @else 
                      <td><a href="{{url('admin/disable/'.$view->id)}}" class="btn btn-danger">Disable</a></td>
                      <td><a href="{{url('admin/enable/'.$view->id)}}" class="btn btn-warning">Enable</a></td>
                      @endif
                    </tr>
                    @endforeach
          
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      <div id="openedModal">
        <span class="close">&times;</span>
      <div class="row" id="modal-content">
            <div class="col-lg-6">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Upload House Location</h6>
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
                   @foreach($reads as $view)
                  <form method="POST" action="{{url('admin/editProperty/'.$view->id)}}"  enctype="multipart/form-data" class="user">
                    @csrf
                   
                    <input type="text" name="family_name" placeholder="Enter House Owner's Family Name...Eg: Rwabugiri, Kayonga" class="form-control{{ $errors->has('family_name') ? ' is-invalid' : '' }}" value="{{ $view->first_name }}" required>
                    @if ($errors->has('family_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('family_name') }}</strong>
                                    </span>
                                @endif
                    <br/>
                    <input type="text" name="other_name" placeholder="Enter House Owner's Other Name...Eg: Pascal, Bienvenue"class="form-control{{ $errors->has('other_name') ? ' is-invalid' : '' }}" value="{{ $view->last_name }}" required>
                    @if ($errors->has('other_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('other_name') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <input type="text" name="email" placeholder="Enter House Owner's Email...Eg: example@gmail.com" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $view->email }}" required>
                    @if ($errors->has('email
                    '))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <input type="text" name="telephone" placeholder="Enter House Owner's Telephone...Eg: 07XXXXXXXX"class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" value="{{ $view->telephone }}" required>
                    @if ($errors->has('telephone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <input type="text" name="province" placeholder="Enter Province...Eg: North, East" class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}" value="{{ $view->province }}" required>
                    @if ($errors->has('province'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('province') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <input type="text" name="district" class="form-control" placeholder="Enter District...Eg: Gasabo, Kicukiro" class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}" value="{{ $view->district }}" required>
                    @if ($errors->has('district'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('district') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <input type="text" name="sector" class="form-control" placeholder="Enter Sector...Eg: Kacyuru, Gatenga" class="form-control{{ $errors->has('sector') ? ' is-invalid' : '' }}" value="{{ $view->sector }}" required>
                    @if ($errors->has('sector'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('sector') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <input type="text" name="address" placeholder="Enter Zip Address...Eg: KN 67 AV" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" value="{{ $view->address }}" required>
                    @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <select name="house_class" class="form-control{{ $errors->has('house_class') ? ' is-invalid' : '' }}" value="{{ $view->house_class }}" required>
                      <option>{{ $view->house_class }}</option>
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
                    <select name="house_type" class="form-control{{ $errors->has('house_type') ? ' is-invalid' : '' }}" value="{{ $view->house_type }}" required>
                      <option>{{ $view->house_type }}</option>
                      <option>Buy</option>
                      <option>Sale</option>
                      <option>Rent</option>
                    </select>
                            @if ($errors->has('house_type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('house_type') }}</strong>
                                    </span>
                                @endif
                                <br/>
                  <input type="text" name="bedroom" placeholder="Enter Number of Bedrooms...Eg: 0 or 2 or 3 " class="form-control{{ $errors->has('bedroom') ? ' is-invalid' : '' }}" value="{{ $view->bedroom }}" required>
                    @if ($errors->has('bedroom'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bedroom') }}</strong>
                                    </span>
                                @endif
                                <br/>
                </div>
              </div>

            </div>

            <div class="col-lg-6">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Upload House Layouts</h6>
                </div>
                <div class="card-body">
                  <br/>
                  <input type="text" name="bathroom" placeholder="Enter Number of Bathroom...Eg: 0 or 1 or 3 " class="form-control{{ $errors->has('bathroom') ? ' is-invalid' : '' }}" value="{{ $view->bathroom }}" required>
                    @if ($errors->has('bathroom'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bathroom') }}</strong>
                                    </span>
                                @endif
                                <br/>
                  <input type="text" name="kitchen" placeholder="Enter Number of Kitchen...Eg: 0 or 2 or 3 " class="form-control{{ $errors->has('kitchen') ? ' is-invalid' : '' }}" value="{{ $view->kitchen }}" required>
                    @if ($errors->has('kitchen'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kitchen') }}</strong>
                                    </span>
                                @endif
                                <br/>
                  <input type="text" name="parking" placeholder="Enter Number of Cars can be Parked...Eg: 1 or 2 " class="form-control{{ $errors->has('parking') ? ' is-invalid' : '' }}" value="{{ $view->parking }}" required>
                    @if ($errors->has('parking'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('parking') }}</strong>
                                    </span>
                                @endif
                                <br/>
                  <input type="text" name="price" placeholder="Enter Price...Eg: 35$ - 40$" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" value="{{ $view->price }}" required>
                    @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                                <br/>
                  <select name="commission" class="form-control{{ $errors->has('commission') ? ' is-invalid' : '' }}" value="{{ old('commission') }}" required>
                      <option>{{ $view->commission }}</option>
                    </select>
                            @if ($errors->has('commission'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('commission') }}</strong>
                                    </span>
                                @endif
                                <br/>
                  <label>Enter Front Picture</label>
                    <input type="file" name="photo" placeholder="Enter Front Picture..." class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" value="{{ $view->first_photo }}">
                    @if ($errors->has('photo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <label>Enter Other Pictures</label>
                    <input type="file" multiple = "multiple" name="my_file[]" placeholder="Enter District..." class="form-control{{ $errors->has('my_file[]') ? ' is-invalid' : '' }}" value="{{ $view->inside_photos }}">
                    @if ($errors->has('my_file[]'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('my_file[]') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <TEXTAREA name="details" placeholder="Enter More Details..." style="height: 120px;" class="form-control{{ $errors->has('details') ? ' is-invalid' : '' }}" required>
                      {{ $view->details }}
                    </TEXTAREA>
                    @if ($errors->has('details'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('details') }}</strong>
                                    </span>
                                @endif
                                <br/>
                    <input type="hidden" name="latitude" class="form-control" placeholder="Enter Latitude...">
                    <input type="hidden" name="longitude" class="form-control" placeholder="Enter Longitude...">
                    <button class="btn btn-primary">Upload</button>
                    &nbsp; &nbsp; &nbsp; &nbsp;
                    <a href="{{url('admin/addProperty')}}" class="btn btn-danger">Cancel</a>
                  </form>
                  @endforeach
                </div>
              </div>

            </div>
          </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; House Rent Rwanda 2019 Powerd By Fred Rwagatenga</span>
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
  <script src="{{asset('admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('admin/js/sb-admin-2.min.js')}}"></script>

  <!-- Page level plugins -->
  <script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

  <script>
// Get the modal
var modal = document.getElementById('openedModal');

// Get the button that opens the modal
var btn = document.getElementById("openModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>

</html>
