@extends('admin.layouts.layout')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Welcome {{ Auth::guard('admin')->user()->name }}</h3>
                            <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span
                                    class="text-primary">3 unread alerts!</span></h6>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="justify-content-end d-flex">
                                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button"
                                        id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="true">
                                        <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                        <a class="dropdown-item" href="#">January - March</a>
                                        <a class="dropdown-item" href="#">March - June</a>
                                        <a class="dropdown-item" href="#">June - August</a>
                                        <a class="dropdown-item" href="#">August - November</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Update Password</h4>
                            <p class="card-description">
                               Change your Password
                            </p>
                            @if (Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <strong>Error:</strong> {{ SessIon::get('error_message') }}
                              {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                            </div>
                            @endif
                            @if (Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <strong>Success:</strong> {{ SessIon::get('success_message') }}
                              {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                            </div>
                            @endif
                            @if($errors->any())           
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="forms-sample" action="{{ url('admin/update-details') }}" method="post">@csrf
                              <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputUsername1">Email Address</label>
                                    <input class="form-control" readonly value="{{ Auth::guard('admin')->user()->email }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Admin Type</label>
                                    <input class="form-control" readonly value="{{ Auth::guard('admin')->user()->type }}">
                                </div>
                              </div>
                              <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputPassword1">Name</label>
                                    <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->name }}"
                                        placeholder="Enter New Name" name="name" id="name">
                                        <span id="password_error"></span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputConfirmPassword1">Mobile Number</label>
                                    <input type="text" class="form-control" value="{{ Auth::guard('admin')->user()->mobile}}"
                                        placeholder="Enter New Mobile Number" name="mobile">
                                </div>
                              </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('admin.layouts.footer')
                <!-- partial -->
            </div>
        @endsection
