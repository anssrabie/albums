@extends('layouts.master2')
@section('title', 'Login')
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The content half -->
            <div class="col-md-12 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">
                                    <div class="card-sigin">
                                        <div class="main-signup-header">
                                            <h2>Welcome back Admin</h2>
                                            <h5 class="font-weight-semibold mb-4 ">Please sign in to continue</h5>

                                            <form action="{{route('post.login')}}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Email address</label>
                                                    <input class="form-control" value="{{$user->email}}" name="email" placeholder="Enter your email" type="email">
                                                    @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input class="form-control" value="12345678" name="password" placeholder="Enter your password" type="password">
                                                    @error('password')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div><button class="btn btn-main-primary btn-block">Login</button>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
@section('js')
@endsection
