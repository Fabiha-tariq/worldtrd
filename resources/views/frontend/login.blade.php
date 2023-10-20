@extends('layouts.login-layout')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@section('login_content')

<div class="container mt-5 pt-5">
        <!-- Section Title Starts -->
        <div class="row text-center">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                @if (session()->has('status'))

                <div class="alert alert-danger alert-dismissible show" role="alert">
                    <strong>{{session()->get('status')}}</strong>.
                    <button type="button" class="btn-close mt-3" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <h2 class="title-head ">member <span>login</span></h2>
                <p class="info-form">Send, receive and securely store your amount in your wallet</p>

                <form action="{{url('/login-store')}}" method="post">
                    @csrf
                    <!-- Input Field Starts -->
                    <div class="form-group">
                        <input class="form-control" name="email" id="email" placeholder="EMAIL" type="email" required>
                    </div>
                    <!-- Input Field Ends -->
                    <!-- Input Field Starts -->
                    <div class="form-group">
                        <input class="form-control" name="password" id="password" placeholder="PASSWORD" type="password"
                            required>
                    </div>
                    <!-- Input Field Ends -->
                    <!-- Submit Form Button Starts -->
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">login</button>
                    </div>
                    <a href="{{ url('/') }}" class=" text-center d-flex align-items-center justify-content-center text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="white" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5ZM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5Z" />
                    </svg> &nbsp;Back To Website</a>
                    <!-- Submit Form Button Ends -->
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <br><br><br>
@endsection
