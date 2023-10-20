<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Dashboard | World Trd </title>

    <link rel="shortcut icon" href="{{ url('/') }}/public/myimages/worldtrd.jpg">


    <link rel="stylesheet" href="{{ url('/') }}/public/dashboard_resource/css/bootstrap1.min.css" />

    <link rel="stylesheet" href="{{ url('/') }}/public/dashboard_resource/vendors/themefy_icon/themify-icons.css" />

    {{-- <link rel="stylesheet" href="{{ url('/') }}/public/dashboard_resourc/vendors/niceselect/css/nice-select.css" />

    <link rel="stylesheet"
        href="{{ url('/') }}/public/dashboard_resource/vendors/owl_carousel/css/owl.carousel.css" /> --}}

    <link rel="stylesheet" href="{{ url('/') }}/public/dashboard_resource/vendors/gijgo/gijgo.min.css" />

    <link rel="stylesheet" href="{{ url('/') }}/public/dashboard_resource/vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="{{ url('/') }}/public/dashboard_resource/vendors/tagsinput/tagsinput.css" />

    <link rel="stylesheet" href="{{ url('/') }}/public/dashboard_resource/vendors/datepicker/date-picker.css" />
    <link rel="stylesheet"
        href="{{ url('/') }}/public/dashboard_resource/vendors/vectormap-home/vectormap-2.0.2.css" />

    <link rel="stylesheet" href="{{ url('/') }}/public/dashboard_resource/vendors/scroll/scrollable.css" />

    <link rel="stylesheet"
        href="{{ url('/') }}/public/dashboard_resource/vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet"
        href="{{ url('/') }}/public/dashboard_resource/vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet"
        href="{{ url('/') }}/public/dashboard_resource/vendors/datatable/css/buttons.dataTables.min.css" />

    <link rel="stylesheet"
        href="{{ url('/') }}/public/dashboard_resource/vendors/text_editor/summernote-bs4.css" />

    <link rel="stylesheet" href="{{ url('/') }}/public/dashboard_resource/vendors/morris/morris.css">

    <link rel="stylesheet"
        href="{{ url('/') }}/public/dashboard_resource/vendors/material_icon/material-icons.css" />

    <link rel="stylesheet" href="{{ url('/') }}/public/dashboard_resource/css/metisMenu.css">

    <link rel="stylesheet" href="{{ url('/') }}/public/dashboard_resource/css/style1.css" />
    <link rel="stylesheet" href="{{ url('/') }}/public/dashboard_resource/css/colors/default.css"
        id="colorSkinCSS">

    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .sidebar {
            background-color: #1d1d1d !important;
        }

        .sidebar #sidebar_menu>li>a {

            background-color: #1d1d1d !important;

            font-size: 14px !important;
        }

        .logo {
            background-color: #1d1d1d !important;

        }

        .logo a {
            color: #fd961a !important;
        }

        .sidebar #sidebar_menu>li ul li a {
            font-size: 12px;
            margin-left: 15px;
        }

        .sidebar #sidebar_menu>li a {

            background-color: #1d1d1d !important;

        }

        .main_content .main_content_iner.overly_inner::before {
            background: rgb(253, 150, 26);
            background: linear-gradient(292deg, rgba(253, 150, 26, 1) 0%, rgba(17, 17, 17, 1) 100%);
        }

        .btn-primary {
            background-color: #fd961a !important;
        }

        .sidebar #sidebar_menu>li a:hover,
        .sidebar #sidebar_menu>li a:active,
        .sidebar #sidebar_menu>li a:focus,
        .sidebar #sidebar_menu>li a i {
            color: #ff8800
        }

        .sidebar #sidebar_menu>li a {
            color: #ffffff
        }

        table {
            background: #ff880038 !important;
            color: #000000 !important;
            box-sizing: border-box;
            border: 1px solid white !important;
        }

        tr:hover {
            /* border: 1px solid #ff8800; */
            box-sizing: border-box;
        }

        label {
            color: white !important;
        }

        p {
            color: white !important;
        }

        #loading {
            display: none;
        }

        #loading div {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #00000000;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
            backdrop-filter: blur(6px);
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body class="crm_body_bg">

    <nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y"
        @if (session()->get('role') == 3) style ="background-color:#525252;"; @endif>
        @if (session()->get('role') == 3)
            <div class="logo d-flex justify-content-between border border-0 border-bottom border-white">
                <a href="{{ url('/') }}">Welcome Admin </a>
                <div class="sidebar_close_icon d-lg-none">
                    <i class="ti-close"></i>
                </div>

                <br>
            </div>
        @else
            <div class="logo d-flex justify-content-between border border-0 border-bottom border-white">
                <a href="{{ url('/') }}">
                    <img src="https://worldtrd.com/public/myimages/worldtrd.jpg" style="width: 50px;height: 50px;"
                        alt="">
                </a>
                <div class="sidebar_close_icon d-lg-none">
                    <i class="ti-close"></i>
                </div>
                <br>
            </div>
        @endif
        <ul id="sidebar_menu">
            <li class="">
                <a href="{{ url('/dashboard') }}" class="active" aria-expanded="false">
                    <div class="icon_menu">
                        {{-- <img src="img/menu-icon/5.svg" alt=""> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ff8800"
                            class="me-2 bi bi-house" viewBox="0 0 16 16">
                            <path
                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                        </svg>
                    </div>
                    <span>Dashboard</span>
                </a>
            </li>
            @if (session()->get('role') == 3 || session()->get('role') == 4)
                <li class="">
                    <a href="{{ url('/dashboard/whatsapp-group') }}" class="active" aria-expanded="false">
                        <div class="icon_menu">
                            <i class="fa-brands fa-whatsapp fa-3x"></i>
                        </div>
                        <span>Whats App Group</span>
                    </a>
                </li>
            @endif

            @if (session()->get('role') == 3 || session()->get('role') == 4)

                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="icon_menu">
                            <i class="fa fa-money-check" style="color: #ff8800;"></i>
                        </div>
                        <span>Bank Pay info</span>
                    </a>
                    <ul>
                        <li><a href="{{ url('/dashboard/bank-payment-info') }}">Bank Payment Info</a></li>
                        @if (session()->get('role') == 4)
                            <li><a href="{{ url('/dashboard/add-bank-payment-info') }}">Add Bank Payment Info</a></li>
                        @endif
                    </ul>
                </li>
            @endif

            @if (session()->get('role') == 1 ||  session()->get('access') == 1 || session()->get('role') == 3 || session()->get('role') == 4)
                <li class="">
                    <a href="{{ url('/dashboard/performance-chart') }}">
                        <div class="icon_menu">
                            <i class="fa-solid fa-chart-simple"></i>
                        </div>
                        <span>Performance Chart</span>
                    </a>
                </li>
            @endif


            @if (session()->get('role') == 3 || session()->get('role') == 4)
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="icon_menu">
                            {{-- <img src="{{ url('/') }}/public/dashboard_resource/img/menu-icon/2.svg" alt=""> --}}
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <span>Invested User</span>
                    </a>
                    <ul>
                        <li><a href="{{ url('/dashboard/invested-user') }}">Invested User</a></li>
                        <li><a href="{{ url('/dashboard/deleted-users') }}">Deleted Users</a></li>
                    </ul>
                </li>
            @endif

            @if (session()->get('role') == 3 || session()->get('role') == 4)
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="icon_menu">
                            {{-- <img src="{{ url('/') }}/public/dashboard_resource/img/menu-icon/2.svg" alt=""> --}}
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <span>Users</span>
                    </a>
                    <ul>
                        <li><a href="{{ url('/dashboard/users') }}">All User</a></li>
                        {{-- <li><a href="{{ url('/dashboard/deleted-users') }}">Deleted  Users</a></li> --}}
                    </ul>
                </li>
            @endif


            @if (session()->get('role') == 1 || session()->get('role') == 0 || session()->get('role') == 4)
                <li class="">
                    <a href="{{ url('/dashboard/my-team') }}" aria-expanded="false">
                        <div class="icon_menu">
                            {{-- <img src="{{ url('/') }}/public/dashboard_resource/img/menu-icon/2.svg" alt="">
                         --}}
                            <i class="fa-solid fa-people-group"></i>
                        </div>
                        <span>My Team</span>
                    </a>

                </li>
            @endif

            @if (session()->get('role') == 4 || session()->get('role') == 3)
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="icon_menu">

                            <i class="fa-sharp fa-solid fa-money-bill-transfer"></i>

                        </div>
                        <span>With draw Charges</span>
                    </a>
                    <ul>
                        <li><a href="{{ url('/dashboard/withdraw-charges') }}">With draw Charges</a></li>
                        {{-- <li><a href="{{ url('/dashboard/add-withdraw-charges') }}">Add With draw Charges</a></li> --}}
                    </ul>
                </li>
            @endif
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        {{-- <img src="{{ url('/') }}/public/dashboard_resource/img/menu-icon/2.svg" alt=""> --}}
                        <i class="fa-sharp fa-solid fa-money-bill-transfer"></i>
                    </div>
                    <span>Withdraw</span>
                </a>
                <ul>
                    <li><a href="{{ url('/dashboard/withdraws') }}">Withdraws</a></li>
                    @if (session()->get('withdrawoff') == 1)
                        @if (!session()->get('role') == 1)
                        <li><a href="{{ url('/dashboard/add-withdraws') }}">Add Withdraw</a></li>
                        @endif
                    @endif
                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        {{-- <img src="{{ url('/') }}/public/dashboard_resource/img/menu-icon/2.svg" alt=""> --}}
                        <i class="fa-sharp fa-solid fa-money-bill-transfer"></i>

                    </div>
                    <span>Deposit</span>
                </a>
                <ul>
                    <li><a href="{{ url('/dashboard/deposits') }}">Deposits</a></li>
                    @if (!session()->get('role') == 1)
                    <li><a href="{{ url('/dashboard/add-deposits') }}">Add Deposit</a></li>
                    @endif
                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        {{-- <img src="{{ url('/') }}/public/dashboard_resource/img/menu-icon/2.svg" alt=""> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ff8800"
                            class="me-2 bi bi-sign-intersection-y-fill" viewBox="0 0 16 16">
                            <path
                                d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435Zm1.443 4.762 1.014 1.106L8.75 8.83V12h-1.5V8.83L4.493 6.303l1.014-1.106L8 7.483l2.493-2.286Z" />
                        </svg>
                    </div>
                    <span>Transaction</span>
                </a>
                <ul>
                    <li><a href="{{ url('/dashboard/transactions') }}">All Transactions</a></li>
                </ul>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <i class="fa-solid fa-sack-dollar"></i>
                    </div>
                    <span>Investment</span>
                </a>
                <ul>
                    <li><a href="{{ url('/dashboard/investments') }}">All Investment</a></li>
                </ul>
            </li>

            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <i class="fa-solid fa-hand-holding-dollar"></i>
                    </div>
                    <span>Profit Log</span>
                </a>
                <ul>
                    <li><a href="{{ url('/dashboard/profits') }}">All Profit Log</a></li>
                </ul>
            </li>


            @if (session()->get('role') == 3 || session()->get('role') == 4)
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="icon_menu">
                            {{-- <img src="{{ url('/') }}/public/dashboard_resource/img/menu-icon/2.svg" alt=""> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ff8800"
                                class="me-2 bi bi-flower2" viewBox="0 0 16 16">
                                <path
                                    d="M8 16a4 4 0 0 0 4-4 4 4 0 0 0 0-8 4 4 0 0 0-8 0 4 4 0 1 0 0 8 4 4 0 0 0 4 4zm3-12c0 .073-.01.155-.03.247-.544.241-1.091.638-1.598 1.084A2.987 2.987 0 0 0 8 5c-.494 0-.96.12-1.372.331-.507-.446-1.054-.843-1.597-1.084A1.117 1.117 0 0 1 5 4a3 3 0 0 1 6 0zm-.812 6.052A2.99 2.99 0 0 0 11 8a2.99 2.99 0 0 0-.812-2.052c.215-.18.432-.346.647-.487C11.34 5.131 11.732 5 12 5a3 3 0 1 1 0 6c-.268 0-.66-.13-1.165-.461a6.833 6.833 0 0 1-.647-.487zm-3.56.617a3.001 3.001 0 0 0 2.744 0c.507.446 1.054.842 1.598 1.084.02.091.03.174.03.247a3 3 0 1 1-6 0c0-.073.01-.155.03-.247.544-.242 1.091-.638 1.598-1.084zm-.816-4.721A2.99 2.99 0 0 0 5 8c0 .794.308 1.516.812 2.052a6.83 6.83 0 0 1-.647.487C4.66 10.869 4.268 11 4 11a3 3 0 0 1 0-6c.268 0 .66.13 1.165.461.215.141.432.306.647.487zM8 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </svg>
                        </div>
                        <span>Plan Category</span>
                    </a>
                    <ul>
                        <li><a href="{{ url('/dashboard/plan-categories') }}">Plan Categories</a></li>
                        <li><a href="{{ url('/dashboard/add-plan-categories') }}">Add Plan Category</a></li>
                    </ul>
                </li>
            @endif

            @if (session()->get('role') == 3 || session()->get('role') == 4)
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="icon_menu">
                            {{-- <img src="{{ url('/') }}/public/dashboard_resource/img/menu-icon/2.svg" alt=""> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ff8800"
                                class="me-2 bi bi-airplane-fill" viewBox="0 0 16 16">
                                <path
                                    d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849Z" />
                            </svg>
                        </div>
                        <span>Plan</span>
                    </a>
                    <ul>
                        <li><a href="{{ url('/dashboard/plans') }}">All Plans</a></li>
                        <li><a href="{{ url('/dashboard/add-plan') }}">Add New Plan</a></li>
                    </ul>
                </li>
            @endif


            {{-- @if (session()->get('role') == 3 || session()->get('role') == 4)

            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ff8800" class="me-2 bi bi-incognito" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="m4.736 1.968-.892 3.269-.014.058C2.113 5.568 1 6.006 1 6.5 1 7.328 4.134 8 8 8s7-.672 7-1.5c0-.494-1.113-.932-2.83-1.205a1.032 1.032 0 0 0-.014-.058l-.892-3.27c-.146-.533-.698-.849-1.239-.734C9.411 1.363 8.62 1.5 8 1.5c-.62 0-1.411-.136-2.025-.267-.541-.115-1.093.2-1.239.735Zm.015 3.867a.25.25 0 0 1 .274-.224c.9.092 1.91.143 2.975.143a29.58 29.58 0 0 0 2.975-.143.25.25 0 0 1 .05.498c-.918.093-1.944.145-3.025.145s-2.107-.052-3.025-.145a.25.25 0 0 1-.224-.274ZM3.5 10h2a.5.5 0 0 1 .5.5v1a1.5 1.5 0 0 1-3 0v-1a.5.5 0 0 1 .5-.5Zm-1.5.5c0-.175.03-.344.085-.5H2a.5.5 0 0 1 0-1h3.5a1.5 1.5 0 0 1 1.488 1.312 3.5 3.5 0 0 1 2.024 0A1.5 1.5 0 0 1 10.5 9H14a.5.5 0 0 1 0 1h-.085c.055.156.085.325.085.5v1a2.5 2.5 0 0 1-5 0v-.14l-.21-.07a2.5 2.5 0 0 0-1.58 0l-.21.07v.14a2.5 2.5 0 0 1-5 0v-1Zm8.5-.5h2a.5.5 0 0 1 .5.5v1a1.5 1.5 0 0 1-3 0v-1a.5.5 0 0 1 .5-.5Z"/>
                          </svg>
                    </div>
                    <span>Invest Now</span>
                </a>
                <ul>
                    <li><a href="{{ url('/dashboard/investments') }}">All Investments</a></li>
                    <li><a href="{{ url('/dashboard/add-investments') }}">Add New Investments</a></li>
                </ul>
            </li>

            @endif --}}


            @if (session()->get('role') == 3 || session()->get('role') == 4)
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="icon_menu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ff8800"
                                class="me-2 bi bi-bell-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z" />
                            </svg>
                        </div>
                        <span>Notifications</span>
                    </a>
                    <ul>
                        <li><a href="{{ url('/dashboard/notifications') }}">All Notifications</a></li>
                        <li><a href="{{ url('/dashboard/add-notifications') }}">Add Notification</a></li>
                    </ul>
                </li>
            @endif
            <li class="">
                <a class="" href="{{ url('/plans') }}" aria-expanded="false">
                    <div class="icon_menu">
                        <i class="fa-solid fa-plane"></i>
                    </div>
                    <span>Our Plans</span>
                </a>
            </li>
            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <i class="fa-solid fa-plane"></i>
                    </div>
                    <span>Comission</span>
                </a>
                <ul>
                    <li><a href="{{ url('/dashboard/allcomission') }}">All Comission</a></li>
                </ul>
            </li>

            @if (session()->get('role') == 3 || session()->get('role') == 4)
                <li class="">
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <div class="icon_menu">
                            <i class="fa-solid fa-plane"></i>
                        </div>
                        <span>Team Comission</span>
                    </a>
                    <ul>
                        <li><a href="{{ url('/dashboard/teamcomission') }}">Team Comission</a></li>
                    </ul>
                </li>
            @endif

            <li class="">
                <a class="has-arrow" href="#" aria-expanded="false">
                    <div class="icon_menu">
                        <i class="fa-sharp fa-solid fa-money-bill-transfer"></i>
                    </div>
                    <span>Capital Return</span>
                </a>
                <ul>
                    <li><a href="{{ url('/dashboard/capitalamount') }}">All Return Amount</a></li>
                </ul>
            </li>
            @if (session()->get('role') == 3 || session()->get('role') == 4)
                <li class="">
                    <a href="{{ url('/dashboard/dollarrate') }}">
                        <div class="icon_menu">
                            <i class="fa-sharp fa-solid fa-money-bill-transfer"></i>
                        </div>
                        <span>Dollar Rate</span>
                    </a>
                </li>
            @endif

        </ul>
    </nav>

    <section class="main_content dashboard_part large_header_bg">
        {{-- <div id="loading">
            <div>
                <img style="width: 100px;height: 100px;" class="img-fluid" src="https://i.gifer.com/ZKZg.gif"
                    alt="">
            </div>
        </div> --}}
        <div class="container-fluid g-0">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="serach_field-area d-flex justify-content-end align-items-end">
                            {{-- <div class="search_inner mt-2 ">
                                <form action="#" >
                                    <div class="search_field">
                                        <input type="text" placeholder="Search here...">
                                    </div>
                                    <button type="submit"> <img
                                            src="{{ url('/') }}/public/dashboard_resource/img/icon/icon_search.svg"
                                            alt=""> </button>
                                </form> --}}
                            {{-- </div> --}}


                            <span class="f_s_14 f_w_400 ml_25 white_text text_white">Apps</span>
                        </div>
                        <div class="header_right w-100 d-flex justify-content-end align-items-center">
                            @if (session()->get('id') == 5000 || session()->get('id') == 1308 || session()->get('id') == 2747 || session()->get('id') == 5503)
                            <marquee behavior="" direction="">
                                <h4 class="text-danger">Alert: Last night your withdrawl received from third party account due to our limit exceed of bank please don't share screenshot to anyone. If you share screenshot so your account will be inactive. </h4>
                            </marquee>
                            @endif

                            @if (session()->get('role') == 3 || session()->get('role') == 4)
                                <div class="" id="notificationicondash">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        fill="#198754" class="bi bi-bell" viewBox="0 0 16 16">
                                        <path
                                            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                    </svg>
                                    <span class="fw-bold fs-6">{{ session()->get('depositcount') }}</span>

                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        fill="#dc3545" class="bi bi-cash-coin ms-3" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                        <path
                                            d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                        <path
                                            d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                        <path
                                            d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                    </svg>
                                    <span class="fw-bold fs-6">{{ session()->get('withdrawcount') }}</span>
                                </div>
                            @endif



                            <div class="header_notification_warp d-flex align-items-center">
                                @if (session()->get('role') == 3 || session()->get('role') == 4)
                                    @if (session()->get('withdrawoff') == 1)
                                        <a href="?withdraw=2" class="btn btn-danger">W Off</a>
                                    @else
                                        <a href="?withdraw=1" class="btn btn-success">W On</a>
                                    @endif
                                @endif
                            </div>
                            @php

                                $aa = str_split(session()->get('name'), 1);

                            @endphp
                            @if (session()->get('role') == 0)
                                <div class="">
                                    <!--<img style="width: 100%;    height: 60px;" src="https://worldtrd.com/public/myimages/funds.jpg" class="img-fluid me-auto" /> -->
                                </div>
                            @endif

                            <div class="profile_info">
                                @if (session()->get('role') == 3)
                                    <p style="height:50px;width:50px;border-radius: 50%;background-color:#555;color:white;line-height: 50px;"
                                        class="text-center">Admin</p>
                                @else
                                    <p style="font-size:30px;height:50px;width:50px;border-radius: 50%;background-color:#555;color:white;line-height: 50px;"
                                        class="text-center">
                                        {{ $aa[0] }}
                                    </p>
                                    {{-- <img src="{{ url('/') }}/public/dashboard_resource/img/client_img.png" /> --}}
                                @endif

                                <div class="profile_info_iner bg-dark text-white">
                                    <div class="profile_author_name"
                                        style="background-color: #ff8800 !important;color:#1d1d1d !important;">
                                        <p>{{ session()->get('name') }}</p>
                                        <p style="font-size: 11px;" class="text-wrap">{{ session()->get('email') }}
                                        </p>
                                    </div>
                                    <div class="profile_info_details">
                                        <span> <b> Share Link: </b></span>
                                        <a style="width:150px;font-size:11px;" class="text-white"> <input
                                                type="text" style="border:1px solid white;width:100%;"
                                                id="mytext"
                                                value="http://worldtrd.com/register/{{ session()->get('id') * 2033149 }}" /></a><button
                                            class="btn btn-dark tooltiptext" onclick="myFunction()">Copy <i
                                                class="fa fa-clipboard" style="color:white;"
                                                aria-hidden="true"></i></button>
                                        <hr>
                                        <a href="{{ url('/logout') }}" class="text-white">Log Out </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>





        @yield('content')




        <style>
            #notificationicondash span {
                animation: myanim 0.4s alternate infinite;
                /* animation-timing-function: ; */

            }

            @keyframes myanim {
                0% {
                    opacity: 0;
                    /* font-size: 10px; */
                }

                100% {
                    opacity: 1;
                    /* font-size: 23px; */
                }
            }


            .tooltip {
                position: relative;
                display: inline-block;
            }

            .tooltip .tooltiptext {
                visibility: hidden;
                width: 140px;
                background-color: #555;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 5px;
                position: absolute;
                z-index: 1;
                bottom: 150%;
                left: 50%;
                margin-left: -75px;
                opacity: 0;
                transition: opacity 0.3s;
            }

            .tooltip .tooltiptext::after {
                content: "";
                position: absolute;
                top: 100%;
                left: 50%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: #555 transparent transparent transparent;
            }

            .tooltip:hover .tooltiptext {
                visibility: visible;
                opacity: 1;
            }
        </style>



        <script>
            function myFunction() {
                // Get the text field
                var copyText = document.getElementById("mytext");

                // Select the text field
                copyText.select();
                copyText.setSelectionRange(0, 99999); // For mobile devices

                // Copy the text inside the text field
                navigator.clipboard.writeText(copyText.value);

                // Alert the copied text
                alert("Copied the text: " + copyText.value);
            }
        </script>

        <div class="footer_part" style="background-color: #fd961a !important;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_iner text-center" style="background-color: #fd961a !important;">
                            <p>2023 © All Rights Reserved by <i class="ti-heart"></i> <b>WorldTrD</b> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="CHAT_MESSAGE_POPUPBOX">
        <div class="CHAT_POPUP_HEADER">
            <div class="MSEESAGE_CHATBOX_CLOSE">
                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M7.09939 5.98831L11.772 10.661C12.076 10.965 12.076 11.4564 11.772 11.7603C11.468 12.0643 10.9766 12.0643 10.6726 11.7603L5.99994 7.08762L1.32737 11.7603C1.02329 12.0643 0.532002 12.0643 0.228062 11.7603C-0.0760207 11.4564 -0.0760207 10.965 0.228062 10.661L4.90063 5.98831L0.228062 1.3156C-0.0760207 1.01166 -0.0760207 0.520226 0.228062 0.216286C0.379534 0.0646715 0.578697 -0.0114918 0.777717 -0.0114918C0.976738 -0.0114918 1.17576 0.0646715 1.32737 0.216286L5.99994 4.889L10.6726 0.216286C10.8243 0.0646715 11.0233 -0.0114918 11.2223 -0.0114918C11.4213 -0.0114918 11.6203 0.0646715 11.772 0.216286C12.076 0.520226 12.076 1.01166 11.772 1.3156L7.09939 5.98831Z"
                        fill="white" />
                </svg>
            </div>

        </div>
        <div class="CHAT_POPUP_BODY">
            <p class="mesaged_send_date">
                Sunday, 12 January
            </p>
            <div class="CHATING_SENDER">
                <div class="SMS_thumb">
                    <img src="img/staf/1.png" alt="">
                </div>
                <div class="SEND_SMS_VIEW">
                    <P>Hi! Welcome .
                        How can I help you?</P>
                </div>
            </div>
            <div class="CHATING_SENDER CHATING_RECEIVEr">
                <div class="SEND_SMS_VIEW">
                    <P>Hello</P>
                </div>
                <div class="SMS_thumb">
                    <img src="img/staf/1.png" alt="">
                </div>
            </div>
        </div>
        <div class="CHAT_POPUP_BOTTOM">
            <div class="chat_input_box d-flex align-items-center">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Write your message"
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn " type="button">

                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18.7821 3.21895C14.4908 -1.07281 7.50882 -1.07281 3.2183 3.21792C-1.07304 7.50864 -1.07263 14.4908 3.21872 18.7824C7.50882 23.0729 14.4908 23.0729 18.7817 18.7815C23.0726 14.4908 23.0724 7.50906 18.7821 3.21895ZM17.5813 17.5815C13.9525 21.2103 8.04773 21.2108 4.41871 17.5819C0.78907 13.9525 0.789485 8.04714 4.41871 4.41832C8.04752 0.789719 13.9521 0.789304 17.5817 4.41874C21.2105 8.04755 21.2101 13.9529 17.5813 17.5815ZM6.89503 8.02162C6.89503 7.31138 7.47107 6.73534 8.18131 6.73534C8.89135 6.73534 9.46739 7.31117 9.46739 8.02162C9.46739 8.73228 8.89135 9.30811 8.18131 9.30811C7.47107 9.30811 6.89503 8.73228 6.89503 8.02162ZM12.7274 8.02162C12.7274 7.31138 13.3038 6.73534 14.0141 6.73534C14.7241 6.73534 15.3002 7.31117 15.3002 8.02162C15.3002 8.73228 14.7243 9.30811 14.0141 9.30811C13.3038 9.30811 12.7274 8.73228 12.7274 8.02162ZM15.7683 13.2898C14.9712 15.1332 13.1043 16.3243 11.0126 16.3243C8.8758 16.3243 6.99792 15.1272 6.22834 13.2744C6.09642 12.9573 6.24681 12.593 6.56438 12.4611C6.64238 12.4289 6.72328 12.4136 6.80293 12.4136C7.04687 12.4136 7.27836 12.5577 7.37772 12.7973C7.95376 14.1842 9.38048 15.0799 11.0126 15.0799C12.6077 15.0799 14.0261 14.1836 14.626 12.7959C14.7625 12.4804 15.1288 12.335 15.4441 12.4717C15.7594 12.6084 15.9048 12.9745 15.7683 13.2898Z"
                                    fill="#707DB7" />
                            </svg>

                        </button>
                        <button class="btn" type="button">

                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M11 0.289062C4.92455 0.289062 0 5.08402 0 10.9996C0 16.9152 4.92455 21.7101 11 21.7101C17.0755 21.7101 22 16.9145 22 10.9996C22 5.08472 17.0755 0.289062 11 0.289062ZM11 20.3713C5.68423 20.3713 1.375 16.1755 1.375 10.9996C1.375 5.82371 5.68423 1.62788 11 1.62788C16.3158 1.62788 20.625 5.82371 20.625 10.9996C20.625 16.1755 16.3158 20.3713 11 20.3713ZM15.125 10.3302H11.6875V6.98314C11.6875 6.61363 11.3795 6.31373 11 6.31373C10.6205 6.31373 10.3125 6.61363 10.3125 6.98314V10.3302H6.875C6.4955 10.3302 6.1875 10.6301 6.1875 10.9996C6.1875 11.3691 6.4955 11.669 6.875 11.669H10.3125V15.016C10.3125 15.3855 10.6205 15.6854 11 15.6854C11.3795 15.6854 11.6875 15.3855 11.6875 15.016V11.669H15.125C15.5045 11.669 15.8125 11.3691 15.8125 10.9996C15.8125 10.6301 15.5045 10.3302 15.125 10.3302Z"
                                    fill="#707DB7" />
                            </svg>

                            <input type="file">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="back-top" style="display: none;">
        <a title="Go to Top" href="#">
            <i class="ti-angle-up"></i>
        </a>
    </div>

    <script src="{{ url('/') }}/public/dashboard_resource/js/jquery1-3.4.1.min.js"></script>

    <script src="{{ url('/') }}/public/dashboard_resource/js/popper1.min.js"></script>

    <script src="{{ url('/') }}/public/dashboard_resource/js/bootstrap.min.html"></script>

    <script src="{{ url('/') }}/public/dashboard_resource/js/metisMenu.js"></script>

    <script src="{{ url('/') }}/public/dashboard_resource/vendors/count_up/jquery.waypoints.min.js"></script>

    <script src="{{ url('/') }}/public/dashboard_resource/vendors/chartlist/Chart.min.js"></script>

    <script src="{{ url('/') }}/public/dashboard_resource/vendors/count_up/jquery.counterup.min.js"></script>

    <script src="{{ url('/') }}/public/dashboard_resource/vendors/niceselect/js/jquery.nice-select.min.js"></script>

    <script src="{{ url('/') }}/public/dashboard_resource/vendors/owl_carousel/js/owl.carousel.min.js"></script>

    <script src="{{ url('/') }}/public/dashboard_resource/vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/datatable/js/dataTables.responsive.min.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/datatable/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/datatable/js/buttons.flash.min.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/datatable/js/jszip.min.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/datatable/js/pdfmake.min.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/datatable/js/vfs_fonts.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/datatable/js/buttons.html5.min.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/datatable/js/buttons.print.min.js"></script>

    <script src="{{ url('/') }}/public/dashboard_resource/vendors/datepicker/datepicker.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/datepicker/datepicker.en.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/datepicker/datepicker.custom.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/js/chart.min.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/chartjs/roundedBar.min.js"></script>

    <script src="{{ url('/') }}/public/dashboard_resource/vendors/progressbar/jquery.barfiller.js"></script>

    <script src="{{ url('/') }}/public/dashboard_resource/vendors/tagsinput/tagsinput.js"></script>

    <script src="{{ url('/') }}/public/dashboard_resource/vendors/text_editor/summernote-bs4.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/am_chart/amcharts.js"></script>

    <script src="{{ url('/') }}/public/dashboard_resource/vendors/scroll/perfect-scrollbar.min.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/scroll/scrollable-custom.js"></script>

    <script src="{{ url('/') }}/public/dashboard_resource/vendors/vectormap-home/vectormap-2.0.2.min.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/vectormap-home/vectormap-world-mill-en.js"></script>

    <script src="{{ url('/') }}/public/dashboard_resource/vendors/apex_chart/apex-chart2.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/apex_chart/apex_dashboard.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/echart/echarts.min.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/chart_am/core.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/chart_am/charts.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/chart_am/animated.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/chart_am/kelly.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/vendors/chart_am/chart-custom.js"></script>

    <script src="{{ url('/') }}/public/dashboard_resource/js/dashboard_init.js"></script>
    <script src="{{ url('/') }}/public/dashboard_resource/js/custom.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

<script>
    // $('#loading').show()
    // setTimeout(() => {
    //     $('#loading').hide()
    // }, 3000);
</script>

</body>

<!-- Mirrored from demo.dashboardpack.com/sales-html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 27 Apr 2023 19:41:43 GMT -->

</html>
