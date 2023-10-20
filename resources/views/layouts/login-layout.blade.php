<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>World TrD - Trading Company - Login</title>
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
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/public/website_resource/css/styleswitcher.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Template JS Files -->
    <script src="{{ url('/') }}/public/website_resource/js/modernizr.js"></script>

</head>

<body>
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

    @yield('login_content')

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
