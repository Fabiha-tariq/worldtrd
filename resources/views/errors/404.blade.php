<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!-- Template CSS Files -->
      <link rel="stylesheet" href="{{ url('/') }}/public/website_resource/css/font-awesome.min.css">
      <link rel="stylesheet" href="{{ url('/') }}/public/website_resource/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{ url('/') }}/public/website_resource/css/magnific-popup.css">
      <link rel="stylesheet" href="{{ url('/') }}/public/website_resource/css/select2.min.css">
      <link rel="stylesheet" href="{{ url('/') }}/public/website_resource/css/style.css">
      <link rel="stylesheet" href="{{ url('/') }}/public/website_resource/css/skins/orange.css">
  
    <title>404 Page | World TrD </title>
</head>
<style>
.myerrortext{
    /* margin-top: -400px; */
    position: absolute;
    top: 80%;
    left: 50%;
    transform: translate(-50%,-50%);
    color: white !important;
}

</style>
<body>
   
    <div class="wrapper">
        <div class="container-fluid error">
			<div>
				<div class="text-center">
					<!-- Logo Starts -->
					<a class="logo" href="index.html">
    
                        <img id="logo"  src="{{ url('/') }}/public/website_resource/images/loading.png" alt="">

						{{-- <img id="logo" class="img-responsive" src="images/logo-dark.png" alt="logo"> --}}
					</a>
					<!-- Logo Ends -->
					<!-- Error 404 Content Starts -->
                </div>
                <br><br>
                    <div class="myerrortext text-center ">

                        <h1> <span style="font-weight: bold;"> 404 </span> oops ! ... Page not found</h1>
                       
                        <a href="{{url('/')}}" class="btn btn-primary">Back</a>
                    </div>
					<!-- Error 404 Content Starts -->
			</div>
		</div>


                <!-- Template JS Files -->
                <script src="{{ url('/') }}/public/website_resource/js/jquery-2.2.4.min.js"></script>
                <script src="{{ url('/') }}/public/website_resource/js/bootstrap.min.js"></script>
                <script src="{{ url('/') }}/public/website_resource/js/select2.min.js"></script>
                <script src="{{ url('/') }}/public/website_resource/js/jquery.magnific-popup.min.js"></script>
                <script src="{{ url('/') }}/public/website_resource/js/custom.js"></script>
        
                <!-- Live Style Switcher JS File - only demo -->
                <script src="{{ url('/') }}/public/website_resource/js/styleswitcher.js"></script>
        
</body>
</html>