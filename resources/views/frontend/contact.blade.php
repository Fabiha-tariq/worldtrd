@extends('layouts.website-layout')
@section('content')
    <!-- Banner Area Starts -->
    <section class="banner-area">
        <div class="banner-overlay">
            <div class="banner-text text-center">
                <div class="container">
                    <!-- Section Title Starts -->
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <!-- Title Starts -->
                            <h2 class="title-head">Get in <span>touch</span></h2>
                            <!-- Title Ends -->
                            <hr>
                            <!-- Breadcrumb Starts -->
                            <ul class="breadcrumb">
                                <li><a href="{{ url('/') }}"> home</a></li>
                                <li>contact</li>
                            </ul>
                            <!-- Breadcrumb Ends -->
                        </div>
                    </div>
                    <!-- Section Title Ends -->
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Area Ends -->
    <!-- Contact Section Starts -->
    <section class="contact">
        <div class="container">
            <h1 class="text-center " style="color:white !important;">Customer Service </h1>
            <br><br>
            <div class="row my-5">
                <div class="col-md-4"></div>
                    <div class="col-md-4 text-center text-white " >
                        <div class="card " style="border-radius: 34px; border:1px solid white !important;padding:20px !important;">

                            <p>{{$data[0]->start_time}} - {{$data[0]->end_time}} </p>
                            <p>Customer Service Hours</p>

                            <h4 class="my-2 " style="color:white !important;">Hi , World TrD Investors</h4>

                            <p >
                                {{$data[0]->message}} </p>
                            <br>
                            <a class="btn btn-primary" href="https://wa.me/+923277067838" target="_blank">Contact on whats App <i class="fa-brands fa-whatsapp "></i></a>

                        </div>
                    </div>

                {{-- <div class="col-xs-12 col-md-8 contact-form">
                    <h3 class="col-xs-12">feel free to drop us a message</h3>
                    <p class="col-xs-12">Need to speak to us? Do you have any queries or suggestions? Please contact us
                        about all enquiries including membership and volunteer work using the form below.</p>
                    <form class="form-contact" method="post" action="{{ url('contact-store') }}">
                        <div class="form-group col-md-6">
                            <input class="form-control" name="firstname" id="firstname" placeholder="FIRST NAME"
                                type="text" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control" name="lastname" id="lastname" placeholder="LAST NAME"
                                type="text" required>
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control" name="email" id="email" placeholder="EMAIL" type="email"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control" name="text" id="subject" placeholder="SUBJECT" type="text"
                                required>
                        </div>
                        <div class="form-group col-xs-12">
                            <textarea class="form-control" id="message" name="message" placeholder="MESSAGE" required></textarea>
                        </div>
                        <div class="form-group col-xs-12 col-sm-4">
                            <button class="btn btn-primary btn-contact" type="submit">send message</button>
                        </div>

                        <div class="col-xs-12 text-center output_message_holder d-none">
                            <p class="output_message"></p>
                        </div>
                    </form>

                </div> --}}


                {{-- <div class="col-xs-12 col-md-4">
                <div class="widget">
                    <div class="contact-page-info">
                        <!-- Contact Info Box Starts -->
                        <div class="contact-info-box">
                            <i class="fa fa-home big-icon"></i>
                            <div class="contact-info-box-content">
                                <h4>Address</h4>
                                <p>123 Disney Street Slim Av. Brooklyn Bridge, NY, New York</p>
                            </div>
                        </div>
                        <!-- Contact Info Box Ends -->
                        <!-- Contact Info Box Starts -->
                        <div class="contact-info-box">
                            <i class="fa fa-phone big-icon"></i>
                            <div class="contact-info-box-content">
                                <h4>Phone Numbers</h4>
                                <p>+88 0123 4567 890<br>+88 0231 3421 453</p>
                            </div>
                        </div>
                        <!-- Contact Info Box Ends -->
                        <!-- Contact Info Box Starts -->
                        <div class="contact-info-box">
                            <i class="fa fa-envelope big-icon"></i>
                            <div class="contact-info-box-content">
                                <h4>Email Addresses</h4>

                                <p>contact@example.com<br>info@example.com</p>
                            </div>
                        </div>
                        <!-- Contact Info Box Ends -->
                        <!-- Social Media Icons Starts -->
                        <div class="contact-info-box">
                            <i class="fa fa-share-alt big-icon"></i>
                            <div class="contact-info-box-content">
                                <h4>Social Profiles</h4>
                                <div class="social-contact">
                                    <ul>
                                        <li class="facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        <li class="google-plus"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Social Media Icons Starts -->
                    </div>
                </div>
            </div> --}}


                <!-- Contact Widget Ends -->
            </div>
        </div>
    </section>
    <!-- Contact Section Ends -->
    <!-- Call To Action Section Starts -->
    <section class="call-action-all">
        <div class="call-action-all-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="action-text">
                            <h2>Get Started Today With World trd</h2>
                            <p class="lead">Open account for free and start trading World trd!</p>
                        </div>

                        <p class="action-btn"><a class="btn btn-primary" href="{{ url('/register') }}">Register Now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action Section Ends -->
@endsection
