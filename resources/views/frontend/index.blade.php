@extends('layouts.website-layout')
@section('content')

    <!-- Slider Starts -->
    <div id="main-slide" class="carousel slide carousel-fade" data-ride="carousel">
        <!-- Indicators Starts -->

        <!-- Indicators Ends -->
        <!-- Carousel Inner Starts -->
        <div class="carousel-inner">
            <!-- Carousel Item Starts -->
            <div class="item active bg-parallax item-1">
                <div class="slider-content">
                    <div class="container">
                        <div class="slider-text text-center">
                            <h3 style="font-size: 45px;" class="slide-title"><span> WORLD TRD </span> <br>
                                 INVESTMENT
                            </h3>
                            <p class="px-3">
                                <a href="{{ url('/public/myimages/WORLD TRD-1.pdf') }}" target="_blank" class="slider btn btn-primary">Read More Info</a>
                                <a href="{{ url('/public/myimages/WORLD TRD-1.pdf') }}" download="" class="slider btn btn-primary">Download Info</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carousel Item Ends -->
            <!-- Carousel Item Starts -->

            <!-- Carousel Item Ends -->

            <!-- Carousel Controlers Ends -->
        </div>
        <!-- Slider Ends -->
        <!-- Features Section Starts -->
        <!--<section class="features">-->
        <!--    <div class="container">-->
        <!--        <div class="row features-row ">-->
                    <!-- Feature Box Starts -->
        <!--            <div class="feature-box col-md-6 col-sm-12">-->
        <!--                <span class="feature-icon">-->
        <!--                    <img id="download-bitcoin"-->
        <!--                        src="{{ url('/') }}/public/website_resource/images/icons/orange/download-bitcoin.png"-->
        <!--                        alt="download bitcoin">-->
        <!--                </span>-->
        <!--                <div class="feature-box-content">-->
        <!--                    <h3>USDT Payment are Available</h3>-->
        <!--                 </div>-->
        <!--            </div>-->
                    <!-- Feature Box Ends -->
                    <!-- Feature Box Starts -->
        <!--            <div class="feature-box two col-md-6 col-sm-12">-->
        <!--                <span class="feature-icon">-->
        <!--                    <img id="add-bitcoins"-->
        <!--                        src="{{ url('/') }}/public/website_resource/images/icons/orange/add-bitcoins.png"-->
        <!--                        alt="add bitcoins">-->
        <!--                </span>-->
        <!--                <div class="feature-box-content">-->
        <!--                    <h3>Bank Payment are Available </h3>-->
        <!--                </div>-->
        <!--            </div>-->
                    <!-- Feature Box Ends -->
                    <!-- Feature Box Starts -->

                    <!-- Feature Box Ends -->
        <!--        </div>-->
        <!--    </div>-->
        <!--</section>-->
        <!-- Features Section Ends -->
        <!-- About Section Starts -->
        <section class="about-us">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <h2 class="title-head">About <span>Us</span></h2>
                    <div class="title-head-subtitle">
                        <p>a commercial website that lists wallets, exchanges and other USDrelated info</p>
                    </div>
                </div>
                <!-- Section Title Ends -->
                <!-- Section Content Starts -->
                <div class="row about-content">
                    <!-- Image Starts -->
                    <div class="col-sm-12 col-md-5 col-lg-6 text-center">
                        <img id="about-us" class="img-responsive img-about-us"
                            src="{{ url('/') }}/public/website_resource/images/about-us.jpg" alt="about us">
                    </div>
                    <!-- Image Ends -->
                    <!-- Content Starts -->
                    <div class="col-sm-12 col-md-7 col-lg-6">
                        <h3 class="title-about">WE ARE World TrD</h3>
                        <p class="about-text">World TrD is an excellent opportunity for people who want to safeguard and
                            grow their hard-earned money. World TrD investors can also enjoy a handsome salary. This
                            section will also help you understand how To Start A World TrD Business and grow it by leaps
                            and bounds. Real estate gives you good and consistent returns.
                        </p>

                        <ul class="nav nav-tabs">
                            <li class="active"><a style="font-size: 12px;" data-toggle="tab" href="#menu1">Secure
                                    Investment</a></li>
                            <li><a style="font-size: 12px;" data-toggle="tab" href="#menu2">Verified Security</a></li>
                            <li><a style="font-size: 12px;" data-toggle="tab" href="#menu3">Instant Withdrawal</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="menu1" class="tab-pane fade in active">
                                <p>Securing investors and raising capital for your business. Obtaining funding can be the
                                    difference between making your idea a success</p>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <p>Verified Security employs a team of true security professionals, specializes in access
                                    control, and provides commercial</p>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <p>Use Instant Payouts to instantly send funds to supported debit cards or bank accounts.
                                    With Instant Payouts,</p>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="#">Read More</a>
                    </div>
                    <!-- Content Ends -->
                </div>
                <!-- Section Content Ends -->
            </div>
        </section>
        <!-- About Section Ends -->
        <!-- Features and Video Section Starts -->
        <section class="image-block w-100">
            <div class="container-fluid">
                <div class="row">
                    <!-- Features Starts -->
                    <div class="col-md-12 ts-padding img-block-left">
                        {{-- <div class="col-md-12 ts-padding img-block-left"> --}}
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            <div class="col-sm-4 col-md-4 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
                                        <img id="strong-security"
                                            src="{{ url('/') }}/public/website_resource/images/icons/orange/strong-security.png"
                                            alt="strong security" />
                                    </span>
                                    <h3 class="feature-title">Strong Security</h3>
                                    <p>Protection against DDoS attacks, <br>full data encryption</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                            <div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-4 col-md-4 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
                                        <img id="world-coverage"
                                            src="{{ url('/') }}/public/website_resource/images/icons/orange/world-coverage.png"
                                            alt="world coverage" />
                                    </span>
                                    <h3 class="feature-title">World Coverage</h3>
                                    <p>Providing services in 99% countries<br> around all the globe</p>
                                </div>
                            </div>
                            <div class="gap-20-mobile"></div>

                            <div class="col-sm-4 col-md-4 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
                                        <img id="payment-options"
                                            src="{{ url('/') }}/public/website_resource/images/icons/orange/payment-options.png"
                                            alt="payment options" />
                                    </span>
                                    <h3 class="feature-title">Payment Options</h3>
                                    <p>Popular methods: Visa, MasterCard, bank transfer, <br> cryptocurrency, USDT or Bank
                                    </p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                        </div>
                        <div class="gap-20"></div>
                        <div class="row">
                            <!-- Feature Starts -->
                            {{-- <div class="col-sm-4 col-md-4 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
                                        <img id="payment-options"
                                            src="{{ url('/') }}/public/website_resource/images/icons/orange/payment-options.png"
                                            alt="payment options" />
                                    </span>
                                    <h3 class="feature-title">Payment Options</h3>
                                    <p>Popular methods: Visa, MasterCard, <br>bank transfer, cryptocurrency</p>
                                </div>
                            </div> --}}
                            <!-- Feature Ends -->
                            <div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-4 col-md-4 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
                                        <img id="mobile-app"
                                            src="{{ url('/') }}/public/website_resource/images/icons/orange/mobile-app.png"
                                            alt="mobile app" />
                                    </span>
                                    <h3 class="feature-title">High Profit</h3>
                                    <p>Invest here and get high profit</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                            <!-- Feature Starts -->
                            <div class="col-sm-4 col-md-4 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
                                        <img id="cost-efficiency"
                                            src="{{ url('/') }}/public/website_resource/images/icons/orange/cost-efficiency.png"
                                            alt="cost efficiency" />
                                    </span>
                                    <h3 class="feature-title">Cost efficiency</h3>
                                    <p>Reasonable trading fees for takers<br> and all market makers</p>
                                </div>
                            </div>
                            <!-- Feature Ends -->
                            <div class="gap-20-mobile"></div>
                            <!-- Feature Starts -->
                            <div class="col-sm-4 col-md-4 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
                                        <img id="high-liquidity"
                                            src="{{ url('/') }}/public/website_resource/images/icons/orange/high-liquidity.png"
                                            alt="high liquidity" />
                                    </span>
                                    <h3 class="feature-title">High Liquidity</h3>
                                    <p>Fast access to high liquidity orderbook<br> for top currency pairs</p>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="gap-20"></div> --}}
                        {{-- <div class="row"> --}}
                        <!-- Feature Starts -->
                        {{-- <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
                                        <img id="cost-efficiency"
                                            src="{{ url('/') }}/public/website_resource/images/icons/orange/cost-efficiency.png"
                                            alt="cost efficiency" />
                                    </span>
                                    <h3 class="feature-title">Cost efficiency</h3>
                                    <p>Reasonable trading fees for takers<br> and all market makers</p>
                                </div>
                            </div> --}}
                        <!-- Feature Ends -->
                        {{-- <div class="gap-20-mobile"></div> --}}
                        <!-- Feature Starts -->
                        {{-- <div class="col-sm-6 col-md-6 col-xs-12">
                                <div class="feature text-center">
                                    <span class="feature-icon">
                                        <img id="high-liquidity"
                                            src="{{ url('/') }}/public/website_resource/images/icons/orange/high-liquidity.png"
                                            alt="high liquidity" />
                                    </span>
                                    <h3 class="feature-title">High Liquidity</h3>
                                    <p>Fast access to high liquidity orderbook<br> for top currency pairs</p>
                                </div>
                            </div> --}}
                        <!-- Feature Ends -->
                        {{-- </div> --}}
                    </div>
                    <!-- Features Ends -->
                    <!-- Video Starts -->
                    {{-- <div class="col-md-4 ts-padding bg-image-1">
                        <div>
                            <div class="text-center">
                                <a class="button-video mfp-youtube"
                                    href="https://youtube.com/watch?v=RX9sb4oSuhw&feature=share"></a>
                            </div>
                        </div>
                    </div> --}}
                    <!-- Video Ends -->
                </div>
            </div>
        </section>
        <!-- Features and Video Section Ends -->
        <!-- Pricing Starts -->
        <section class="pricing">
            <div class="container">
                <!-- Section Title Starts -->
                <div class="row text-center">
                    <h2 class="title-head">affordable <span>packages</span></h2>
                    <div class="title-head-subtitle">
                        <p>Purchase USDusing a credit card or with your linked bank account</p>
                    </div>
                </div>
                <!-- Section Title Ends -->
                <!-- Section Content Starts -->
                <div class="row pricing-tables-content">
                    <div class="pricing-container">
                        <!-- Pricing Switcher Starts -->

                        <!-- Pricing Switcher Ends -->
                        <!-- Pricing Tables Starts -->
                        <ul class="pricing-list bounce-invert">


                            @foreach ($data as $item)
                            <li class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                                <ul class="pricing-wrapper">
                                    <li>
                                        <header class="pricing-header">
                                            <p style="position: absolute;
                                            top: -1px;
                                            left: -6px;
                                            background-color: #ff8800;
                                            color: white !important;
                                            padding: 0px 10px;
                                            border-radius: 34px;
                                            font-size: 10px;">{{$item->category_title}}</p>
                                            <br>
                                            @if ($item->profit_daily == 0)
                                            <h2>{{ $item->plan_title }} <span><br> {{ $item->daily_profit_percentage *  $item->duration_number }}%
                                            @else
                                            <h2>{{ $item->plan_title }} <span><br> {{ $item->daily_profit_percentage }} %
                                                @endif
                                             @if ($item->profit_daily == 1)
                                             EVERY DAYS
                                             @else
                                             Once Time <br> which is Daily {{$item->daily_profit_percentage}} %
                                             @endif
                                            </span>
                                        </h2>
                                            <div class="price">

                                                <span class="value" style="font-size: 18px"> {{ $item->minimum_amount }} PKR -
                                                    {{ $item->maximum_amount }} PKR</span>

                                                <br>
                                                <span class="">Capital Return: {{ $item->duration_number }}
                                                    @if ($item->duration_type == 0)
                                                        Days
                                                    @else
                                                    Month
                                                    @endif
                                                </span>
                                            </div>
                                        </header>
                                        <span class=""
                                                style="text-align: center; display: block;color: #fdc01a;">
                                                Capital Will return ?
                                                 Yes
                                                </span>
                                        <footer class="pricing-footer">
                                            @if ($item->pstatus == 0)

                                            <a  style="cursor: pointer;"
                                                class="btn btn-primary disabled" >Temporary Locked&nbsp;&nbsp;<i class="fa-solid fa-lock"></i> Coming Soon</a>

                                            @else
                                            <a href="{{ url('/invest') }}/{{ $item->plan_id }}"
                                                class="btn btn-primary">Invest Now</a>
                                            @endif

                                        </footer>




                                    </li>
                                </ul>
                        @endforeach




                        </ul>
                        </li>



                        </ul>
                        <footer class="" style="text-align: center; margin-top: 30px;">
                            <a href="{{ url('/plans') }}" class="btn btn-primary">More Plans</a>
                        </footer>
                    </div>
                </div>
            </div>
        </section>
        <!-- Pricing Ends -->
        <!-- USDCalculator Section Starts -->

        <!-- USDCalculator Section Ends -->
        <!-- Team Section Starts -->

        <!-- Team Section Ends -->
        <!-- Quote and Chart Section Starts -->
        {{-- <section class="image-block2">
    <div class="container-fluid">
        <div class="row">
            <!-- Quote Starts -->
            <div class="col-md-4 img-block-quote bg-image-2">
                <blockquote>
                    <p>USDis one of the most important inventions in all of human history. For the first time ever, anyone can send or receive any amount of money with anyone else, anywhere on the planet, conveniently and without restriction. It’s the dawn of a better, more free world.</p>
                    <footer><img src="{{ url('/') }}/public/website_resource/images/ceo.jpg" alt="ceo" /> <span>Marc Smith</span> - CEO</footer>
                </blockquote>
            </div>
            <!-- Quote Ends -->
            <!-- Chart Starts -->
            <div class="col-md-8 bg-grey-chart">
                <div class="chart-widget dark-chart chart-1">
                    <div>
                        <div class="btcwdgt-chart" data-bw-theme="dark"></div>
                    </div>
                </div>
                <div class="chart-widget light-chart chart-2">
                    <div>
                        <div class="btcwdgt-chart" bw-theme="light"></div>
                    </div>
                </div>
            </div>
            <!-- Chart Ends -->
        </div>
    </div>
</section> --}}
        <!-- Quote and Chart Section Ends -->
        <!-- Blog Section Starts -->

        <!-- Blog Section Ends -->
        <!-- Call To Action Section Starts -->
        <section class="call-action-all">
            <div class="call-action-all-overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- Call To Action Text Starts -->
                            <div class="action-text">
                                <h2>Get Started Today With USD</h2>
                                <p class="lead">Open account for free and start trading USD !</p>
                            </div>
                            <!-- Call To Action Text Ends -->
                            <!-- Call To Action Button Starts -->
                            {{-- <p class="action-btn"><a class="btn btn-primary" href="register.html">Register Now</a></p> --}}
                            <!-- Call To Action Button Ends -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call To Action Section Ends -->
    @endsection
