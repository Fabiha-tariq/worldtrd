@extends('layouts.login-layout')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
@section('login_content')
    <br>


    <div class="container">

        <div class="row text-center">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                    <br>
                    @if (session()->has('status'))

                    <div class="alert alert-danger alert-dismissible show" role="alert">
                        <strong>Already Registered</strong> try Another Email.
                        <button type="button" class="btn-close mt-3" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (session()->has('status1'))

                    <div class="alert alert-success alert-dismissible show" role="alert">
                        <strong>Thanks : {{session()->get('status1')}}</strong>
                        <button type="button" class="btn-close mt-3" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                <h2 class="title-head hidden-xs">get <span>started</span></h2>
                <p class="info-form">Open account for free and start trading Bitcoins now!</p>

                <form action="{{url('/register-store')}}/{{$pid}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input class="form-control" name="name" value="{{old('name')}}" id="name" placeholder="FULL NAME" type="text"
                            >
                    </div>

                    @error('name')
                    <p class="text-danger text-left">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <input class="form-control" name="phone" id="phone" value="{{old('phone')}}" placeholder="03162299456" type="text"
                            >
                    </div>
                    @error('phone')
                    <p class="text-danger text-left">{{$message}}</p>
                    @enderror
                    <!-- Input Field Ends -->
                    <!-- Input Field Starts -->
                    <div class="form-group">
                        <input class="form-control" name="email" value="{{old('email')}}" id="email" placeholder="Enter Email or Username " type="email"
                            >
                    </div>
                    @error('email')
                    <p class="text-danger text-left">{{$message}}</p>
                    @enderror
                    <!-- Input Field Ends -->
                    <!-- Input Field Starts -->
                    <div class="form-group">
                        <input class="form-control" name="password"  id="password" placeholder="Enter Password" type="password"
                            >
                    </div>
                    @error('password')
                    <p class="text-danger text-left">{{$message}}</p>
                    @enderror
                    <div class="form-group">
                        <input class="form-control" name="conpassword" id="password" placeholder="Enter Confirm Password"
                            type="password" >
                    </div>
                    @error('conpassword')
                    <p class="text-danger text-left">{{$message}}</p>
                    @enderror

                    <!-- Input Field Ends -->
                    <!-- Submit Form Button Starts -->
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">create account</button>
                            <br>
                            <br>
                        <p class="text-center ">already have an account ? <a href="{{url('/login')}}">Login</a>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <br><br><br>
@endsection
