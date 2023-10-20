    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>World TrD - Trading Company</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <!-- Favicon -->
        {{-- <link rel="shortcut icon" href="{{ url('/') }}/public/website_resource/images/logo.png"> --}}
        <link rel="shortcut icon" href="{{ url('/') }}/public/myimages/worldtrd.jpg">

        <!-- Template CSS Files -->
        <link rel="stylesheet" href="{{ url('/') }}/public/website_resource/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ url('/') }}/public/website_resource/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ url('/') }}/public/website_resource/css/magnific-popup.css">
        <link rel="stylesheet" href="{{ url('/') }}/public/website_resource/css/select2.min.css">
        <link rel="stylesheet" href="{{ url('/') }}/public/website_resource/css/style.css">
        <link rel="stylesheet" href="{{ url('/') }}/public/website_resource/css/skins/orange.css">

        <!-- Live Style Switcher - demo only -->
        <link rel="alternate stylesheet" type="text/css" title="orange"
            href="{{ url('/') }}/public/website_resource/css/skins/orange.css" />
        <link rel="alternate stylesheet" type="text/css" title="green"
            href="{{ url('/') }}/public/website_resource/css/skins/green.css" />
        <link rel="alternate stylesheet" type="text/css" title="blue"
            href="{{ url('/') }}/public/website_resource/css/skins/blue.css" />
        <link rel="stylesheet" type="text/css"
            href="{{ url('/') }}/public/website_resource/css/styleswitcher.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
            integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Template JS Files -->
        <script src="{{ url('/') }}/public/website_resource/js/modernizr.js"></script>

    </head>

    <body>
        <a href="https://wa.me/+923426247655" target="_blank" id="whatsapp-icon" class="whatsapp-icon"><i
                class="fa-brands fa-whatsapp fa-3x"></i></a>
        <!-- SVG Preloader Starts -->
        <div id="preloader">
            <div id="preloader-content">
                {{-- <img src="{{ url('/') }}/public/website_resource/images/loading.png" alt=""> --}}
                {{-- <img src="{{ url('/') }}/public/myimages/worldtrd.jpg" alt=""> --}}
                <div class="d-flex justify-content-center text-white">
                    <div class="spinner-border text-white" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>

            </div>
        </div>
        <!-- SVG Preloader Ends -->
        <!-- Live Style Switcher Starts - demo only -->

        <!-- Live Style Switcher Ends - demo only -->
        <!-- Wrapper Starts -->
        <div class="mobile_nav">
            <ul class="">
                <li class="list-style-none"><a href="{{ url('/') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black"
                            class="bi bi-house" viewBox="0 0 16 16">
                            <path
                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                        </svg>
                        Home</a></li>
                <li class="list-style-none"><a href="{{ url('/about') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black"
                            class="bi bi-info-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                        </svg>
                        About Us</a></li>
                <li class="list-style-none"><a href="{{ url('/plans') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black"
                            class="bi bi-journal-text" viewBox="0 0 16 16">
                            <path
                                d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                            <path
                                d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                            <path
                                d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                        </svg>
                        Plans</a></li>
                <li class="list-style-none"><a href="{{ url('/dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black"
                            class="bi bi-speedometer2" viewBox="0 0 16 16">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
                            <path fill-rule="evenodd"
                                d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
                        </svg>
                        Dashboard</a></li>
                <li class="list-style-none"><a href="{{ url('/contact') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black"
                            class="bi bi-headset" viewBox="0 0 16 16">
                            <path
                                d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z" />
                        </svg>
                        Customer Service</a></li>

            </ul>
        </div>

        @if (session()->has('email'))
            <div class="d-block-sm">
                <div
                    style="border-radius: 34px;
padding: 0px 20px;
margin: 10px 10px 0px 10px;
display: flex; align-items: center;
justify-content: space-between;
margin-top: 10px;">
                    {{-- Mobile Sidebar --}}
                    <div class="off-canvas">
                        <span
                            style="font-size: 15px;
    font-family: system-ui;
    color: #bbbbbb;
    border-bottom: 1px solid #ffffff42;
    padding-bottom: 7px;
    width: 100%;
    display: block;
    font-weight: 500;
    text-transform: capitalize;">Welcome
                            back! &nbsp;{{ session()->get('name') }}

                            {{-- @if (session()->has('email')) --}}
                            @if (session()->has('upliner'))
                                @if (session()->get('upliner') == 'Naveed')
                                    <span style="color: #fff;font-size: 10px;display: block;text-align: left;">Linked
                                        By: Admin</span>
                                @else
                                    <span style="color: #fff;font-size: 10px;display: block;text-align: left;">Linked
                                        By:
                                        {{ session()->get('upliner') }}</span>
                                @endif
                            @endif
                        </span>
                        <ul class="" style="margin-bottom: 10px;
    padding: 0;
    margin-top: 10px;">
                            <li class="list-style-none"><a style="color: white; display: flex; align-items: center;"
                                    href="{{ url('/') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="white" class="bi bi-house" viewBox="0 0 16 16">
                                        <path
                                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z">
                                        </path>
                                    </svg>
                                    &nbsp; &nbsp;
                                    Home</a></li>
                            <li class="list-style-none"><a style="color: white; display: flex; align-items: center;"
                                    href="{{ url('/about') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="white" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z">
                                        </path>
                                        <path
                                            d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z">
                                        </path>
                                    </svg>
                                    &nbsp; &nbsp;
                                    About Us</a></li>
                            <li class="list-style-none"><a style="color: white; display: flex; align-items: center;"
                                    href="{{ url('/plans') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="white" class="bi bi-journal-text" viewBox="0 0 16 16">
                                        <path
                                            d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z">
                                        </path>
                                        <path
                                            d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z">
                                        </path>
                                        <path
                                            d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z">
                                        </path>
                                    </svg>
                                    &nbsp; &nbsp;
                                    Plans</a></li>
                            <li class="list-style-none"><a style="color: white; display: flex; align-items: center;"
                                    href="{{ url('/dashboard') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="white" class="bi bi-speedometer2" viewBox="0 0 16 16">
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z">
                                        </path>
                                    </svg>
                                    &nbsp; &nbsp;
                                    Dashboard</a></li>
                            <li class="list-style-none"><a style="color: white; display: flex; align-items: center;"
                                    href="https://wa.me/+923426247655">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="white" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path
                                            d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z" />
                                    </svg>
                                    &nbsp; &nbsp;
                                    Connect With Whatsapp</a></li>
                            <li class="list-style-none"><a style="color: white; display: flex; align-items: center;"
                                    href="{{ url('/contact') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="white" class="bi bi-headset" viewBox="0 0 16 16">
                                        <path
                                            d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z">
                                        </path>
                                    </svg>
                                    &nbsp; &nbsp;
                                    Customer Service</a></li>
                            <li class="list-style-none"><a style="color: white; display: flex; align-items: center;"
                                    href="{{ url('/logout') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="white" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z">
                                        </path>
                                    </svg>
                                    &nbsp; &nbsp;
                                    Logout</a></li>

                        </ul>
                    </div>
                    {{-- Mobile Sidebar --}}
                    <span><a class="off-canvas-toggle navbar-text">
                            <svg style="margin-bottom: -2px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                            </svg>
                        </a> &nbsp; &nbsp; <svg xmlns="http://www.w3.org/2000/svg" width="15" height="11"
                            fill="#fd961a" class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg> &nbsp; <span style="font-size: 16px;
    text-transform: capitalize;
    color: white;
    font-weight: 500;">{{ session()->get('name') }}</span></span>
                    {{-- @if (session()->has('email')) --}}
                    <a style="width: auto;
    padding: 3.4px 20px;
    border-color: #ff00005c;
    font-size: 9px;
    display: flex;
    align-items: center;"
                        class="btn btn-primary" href="{{ url('/logout') }}"><svg xmlns="http://www.w3.org/2000/svg"
                            width="11" height="11" fill="currentColor" class="bi bi-box-arrow-left"
                            viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z" />
                            <path fill-rule="evenodd"
                                d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z" />
                        </svg> &nbsp; Logout</a>
                </div>
            </div>
        @else
        @endif
        <div class="wrapper">
            <marquee class="" behavior="" direction="">
                Important --&gt; If Deposit is in Rupees Then You,ll have to Withdraw Also in Rupees &amp; Same
                Process
                for USDT as Well
            </marquee>
            <!-- Header Starts -->
            <header class="header">
                <div class="container">
                    <div class="row" style="display: flex; align-items: center; justify-content: space-between;">
                        <!-- Logo Starts -->
                        <div class="main-logo col-xs-12 col-md-3 col-md-2 col-lg-2 hidden-xs">
                            <a href="{{ url('/') }}">
                                <img id="logo" class="img-responsive"
                                    src="{{ url('/') }}/public/myimages/worldtrd.jpg" alt="logo">
                            </a>
                        </div>
                        {{-- Mobile Signup --}}
                        <div class="col-md-3 col-lg-3 d-block-sm">
                            <ul class="unstyled user d-flex">

                                {{-- @if (session()->has('email')) --}}

                                {{-- <li class="dropdown " style="position: relative; z-index: 881;margin-right:50px;"> --}}
                                @if (session()->has('upliner'))
                                    @if (session()->get('upliner') == 'Naveed')
                                        <span style="color:#fff;">Linked By: Admin</span>&nbsp;&nbsp;
                                    @else
                                        <span style="color:#fff;">Linked By:
                                            {{ session()->get('upliner') }}</span>&nbsp;&nbsp;
                                    @endif
                                @endif


                                {{ session()->get('name') }}
                                <a href="{{ url('/dashboard') }}">Dashboard</a>
                                <a href="{{ url('/logout') }}">Logout</a>

                                {{-- join group  --}}

                                @if (session()->has('whatsapplink'))
                                    <li style="margin-top: 20px;"><a target="_blank"
                                            href="{{ session()->get('whatsapplink') }}"
                                            style="background-color:#075e54 !important;padding:10px;color:white;">Join
                                            Community Group &nbsp;&nbsp;<i class="fa-brands fa-whatsapp fa-3x"
                                                style="font-size: 16px;"></i> </a></li>
                                @endif
                                {{-- @else --}}
                                <li class="sign-in"><a href="{{ url('/login') }}" class="btn btn-primary"><i
                                            class="fa fa-user"></i> sign in</a></li>
                                {{-- @endif --}}

                            </ul>

                        </div>
                        {{-- Mobile Signup --}}

                        <div class="col-md-8">

                            <ul class="unstyled user d-flex" style="padding-top: 0px;padding-bottom: 16px;">



                                {{-- join group  --}}
                                @if (session()->has('email'))

                                    @if (session()->has('whatsapplink'))
                                        <li style="margin-top: 20px;"><a target="_blank"
                                                href="{{ session()->get('whatsapplink') }}"
                                                style="background-color:#075e54 !important;padding:10px;color:white;">Join
                                                Community Group &nbsp;&nbsp;<i class="fa-brands fa-whatsapp fa-3x"
                                                    style="font-size: 16px;"></i> </a></li>
                                    @endif

                                    @if (session()->has('upliner'))
                                        @if (session()->get('upliner') == 'Naveed')
                                            <span style="color:#fff;">Linked By: Admin</span>&nbsp;&nbsp;
                                        @else
                                            <span style="color:#fff;">Linked By:
                                                {{ session()->get('upliner') }}</span>&nbsp;&nbsp;
                                        @endif
                                    @endif

                                    <li class="dropdown " style="position: relative;margin-right:50px;">

                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false"><i class="fa fa-user"></i> &nbsp;&nbsp;
                                            {{ session()->get('name') }} &nbsp;
                                            <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu w-50" style="z-index: 991;">
                                            <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                            <li><a href="{{ url('/logout') }}">Logout</a></li>
                                        </ul>
                                    </li>
                                @else
                                    <li class="sign-in"><a href="{{ url('/login') }}" class="btn btn-primary"><i
                                                class="fa fa-user"></i> sign in</a></li>
                                    <li class="sign-in"><a href="{{ url('/register/0') }}" class="btn btn-primary"><i
                                                class="fa fa-user"></i> register</a></li>
                                @endif
                            </ul>



                        </div>

                    </div>
                </div>
                <!-- Navigation Menu Starts -->
                <nav class="site-navigation navigation" id="site-navigation" style="z-index: 89;">
                    <div class="container">
                        <div class="site-nav-inner">
                            <!-- Logo For ONLY Mobile display Starts -->
                            <a class="logo-mobile" href="{{ url('/') }}">
                                <img id="logo-mobile" class="img-responsive"
                                    src="{{ url('/') }}/public/myimages/worldtrd.jpg"
                                    style="width: 150px !important;height:60px;" alt="logo">
                            </a>
                            <!-- Logo For ONLY Mobile display Ends -->
                            <!-- Toggle Icon for Mobile Starts -->
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!-- Toggle Icon for Mobile Ends -->
                            <div class="collapse navbar-collapse navbar-responsive-collapse">
                                <!-- Main Menu Starts -->
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                    <li><a href="{{ url('/about') }}">About Us</a></li>
                                    <li><a href="{{ url('/plans') }}">Plans</a></li>
                                    <li><a href="{{ url('/contact') }}">Customer Service</a></li>
                                    <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>


                                    <!-- <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">pages <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="register.html">Register page</a></li>
                                            <li><a href="login.html">Login page</a></li>
            <li><a href="shopping-cart.html">Shopping cart</a></li>
                                            <li><a href="shopping-checkout.html">shopping checkout</a></li>
                                            <li><a href="faq.html">FAQ page</a></li>
                                            <li><a href="404.html">404 Page</a></li>
            <li><a href="503.html">Server Error Page</a></li>
                                            <li><a href="terms-of-services.html">Terms of Services</a></li>
            <li><a href="coming-soon.html">Coming Soon</a></li>
                                        </ul>
                                    </li> -->
                                    <!-- Search Icon Ends -->
                                </ul>
                                <!-- Main Menu Ends -->
                            </div>
                        </div>
                    </div>
                    <!-- Search Input Starts -->
                    <div class="site-search">
                        <div class="container">
                            <input type="text" placeholder="type your keyword and hit enter ...">
                            <span class="close">×</span>
                        </div>
                    </div>
                    <!-- Search Input Ends -->
                </nav>
                <!-- Navigation Menu Ends -->
            </header>
            <!-- Header Ends -->
            <div class="d-block-sm">

                {{-- Mobile Header --}}
                @if (session()->has('email'))
                    <header class="mobile_header">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-3 col-lg-3">
                                    <ul class="unstyled user d-flex">
                                        <a style="font-size: 8px;
                                display: flex;
                                justify-content: center;
                                align-items: center;
                                width: 45%;
                                border-bottom-right-radius: 0;
    border-top-right-radius: 0;"
                                            class="text-dark btn btn-primary" style="font-size: 10px;"
                                            href="{{ url('/dashboard') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                                width="16" height="16" fill="#fd961a"
                                                class="bi bi-speedometer2" viewBox="0 0 16 16">
                                                <path
                                                    d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z">
                                                </path>
                                                <path fill-rule="evenodd"
                                                    d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z">
                                                </path>
                                            </svg> &nbsp; Dashboard</a>
                                        @if (session()->has('whatsapplink'))
                                            <a target="_blank" href="{{ session()->get('whatsapplink') }}"
                                                style="padding: 5px 10px;
                                        color: white;
                                        font-size: 9px;
                                        border-radius: 34px;
                                        margin-left: 5px;
                                        width: 50%;
                                        display: flex;
                                        align-items: center;
                                        border: 1px solid #25D366;
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        white-space: nowrap;
                                        border-bottom-left-radius: 0;
    border-top-left-radius: 0;
                                        ">Join
                                                Community Group &nbsp;&nbsp;<i class="fa-brands fa-whatsapp fa-3x"
                                                    style="font-size: 16px;color: #25D366;"></i> </a>
                                        @endif
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </header>
                @else
                    <a style="width: 85%;
            text-align: center;
            transform: translateX(-50%);
            left: 50%;
            position: relative;
            margin-bottom: 10px;
            margin-top: 2px;
            border: 1px solid #ffffff73;"
                        href="{{ url('/login') }}" class="btn btn-primary"><i class="fa fa-user"></i>
                        sign in</a>
                        <a style="width: 85%;
                        text-align: center;
                        transform: translateX(-50%);
                        left: 50%;
                        position: relative;
                        margin-bottom: 10px;
                        margin-top: 2px;
                        border: 1px solid #ffffff73;"
                                    href="{{ url('/register/0') }}" class="btn btn-primary"><i class="fa fa-user"></i>
                                    Register</a>
                @endif
                {{-- Mobile Header --}}

            </div>
            @yield('content')



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
            </script>
            <!-- Footer Starts -->
            <footer class="footer">
                <!-- Footer Top Area Starts -->
                <div class="top-footer">
                    <div class="container">
                        <div class="row"
                            style="border: 1px solid white;
                        margin: 0px 0px;
                        border-radius: 34px;
                        padding: 20px 0px;">
                            <!-- Footer Widget Starts -->
                            <div class="col-sm-4 col-md-2">
                                <h4>Our Company</h4>
                                <div class="menu">
                                    <ul>
                                        <li><a href="{{ url('/') }}">Home</a></li>
                                        <li><a href="{{ url('/about') }}">About</a></li>
                                        <li><a href="{{ url('/plan') }}">Our Plans</a></li>
                                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Widget Ends -->
                            <!-- Footer Widget Starts -->
                            <div class="col-sm-4 col-md-2">
                                <h4>Help & Support</h4>
                                <div class="menu">
                                    <ul>
                                        <li><a href="{{ url('/about') }}">FAQ</a></li>
                                        <li><a href="{{ url('/') }}">Terms of Services</a></li>
                                        <li><a href="{{ url('/login') }}">Login</a></li>

                                        <li><a href="{{ url('/about') }}">Coming Soon</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Widget Ends -->
                            <!-- Footer Widget Starts -->
                            <div class="col-sm-4 col-md-3">
                                <h4>Contact Us </h4>
                                <div class="contacts">

                                    <div>
                                        <span>0342-6247655</span>
                                    </div>

                                </div>

                            </div>
                            <!-- Footer Widget Ends -->
                            <!-- Footer Widget Starts -->
                            <div class="col-sm-12 col-md-5">
                                <h4>Payments</h4>
                                <hr>
                                <!-- Supported Payment Cards Logo Starts -->
                                <div class="payment-logos">
                                    <h4 class="payment-title">supported payment methods</h4>
                                    {{-- <img src="{{ url('/') }}/public/website_resource/images/icons/payment/american-express.png"
                                        alt="american-express"> --}}
                                    <img src="{{ url('/') }}/public/website_resource/images/icons/payment/mastercard.png"
                                        alt="mastercard">
                                    <img src="{{ url('/') }}/public/website_resource/images/icons/payment/visa.png"
                                        alt="visa">
                                    {{-- <img src="{{ url('/') }}/public/website_resource/images/icons/payment/paypal.png"
                                        alt="paypal"> --}}
                                    <img class="last"
                                        src="{{ url('/') }}/public/website_resource/images/icons/payment/maestro.png"
                                        alt="maestro">
                                    <img src="{{ url('/') }}/public/myimages/USDTimg.png" alt="usd">
                                    <img src="{{ url('/') }}/public/myimages/faysalbank.png" alt="faysalbank">
                                </div>
                                <!-- Supported Payment Cards Logo Ends -->
                            </div>
                            <!-- Footer Widget Ends -->
                        </div>
                    </div>
                </div>
                <!-- Footer Top Area Ends -->
                <!-- Footer Bottom Area Starts -->
                <div class="bottom-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- Copyright Text Starts -->
                                <p class="text-center">Created with Love by <a href="templateshub.net"
                                        target="_blank">World TrD</a></p>
                                <!-- Copyright Text Ends -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer Bottom Area Ends -->
            </footer>
            <!-- Footer Ends -->
            <!-- Back To Top Starts  -->
            <style>
                #whatsapp-icon {
                    position: fixed;
                    top: 50%;
                    left: 87%;
                    z-index: 99;
                    width: 60px;
                    height: 60px;
                    background-color: white;
                    text-align: center;
                    border-radius: 20px;
                }

                #whatsapp-icon i {
                    padding-top: 5px;
                    color: #075E54 !important;
                }
            </style>
            <a href="#" id="back-to-top" class="back-to-top fa fa-arrow-up"></a>

            <!-- Back To Top Ends  -->

            <!-- Template JS Files -->
            <script src="{{ url('/') }}/public/website_resource/js/jquery-2.2.4.min.js"></script>
            <script src="{{ url('/') }}/public/website_resource/js/bootstrap.min.js"></script>
            <script src="{{ url('/') }}/public/website_resource/js/select2.min.js"></script>
            <script src="{{ url('/') }}/public/website_resource/js/jquery.magnific-popup.min.js"></script>
            <script src="{{ url('/') }}/public/website_resource/js/custom.js"></script>

            <!-- Live Style Switcher JS File - only demo -->
            <script src="{{ url('/') }}/public/website_resource/js/styleswitcher.js"></script>


        </div>

        <script>
            let data = JSON.stringify({{ session()->get('dollarrate') }});
            console.log(data);
            localStorage.setItem('dollarrate', data);
        </script>
        <script>
            $('.off-canvas-toggle').click(function(event) {
                // event.preventDefault();
                $('body').toggleClass('off-canvas-active');
            });

            // $(document).on('mouseup touchend', function(event) {
            //     var offCanvas = $('.off-canvas')
            //     if (!offCanvas.is(event.target) && offCanvas.has(event.target).length === 0) {
            //         $('body').removeClass('off-canvas-active')
            //     }
            // });
        </script>
        <!-- Wrapper Ends -->


    </body>


    </html>
