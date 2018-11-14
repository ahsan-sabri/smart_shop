
<!DOCTYPE html>
<html>
    <head>
        <title>Smart | @yield('title')</title>
        <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Smart Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <link href="{{ asset('public/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
        <!-- pignose css -->
        <link href="{{ asset('public/css/pignose.layerslider.css') }}" rel="stylesheet" type="text/css" media="all" />
        <!-- //pignose css -->
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/jquery-ui.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('public/css/flexslider.css') }}">
        <link href="{{ asset('public/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
        <!-- js -->
        <script type="text/javascript" src="{{ asset('public/js/jquery-2.1.4.min.js') }}"></script>
        <!-- //js -->
        <!-- cart -->
        <script src="{{ asset('public/js/simpleCart.min.js') }}"></script>
        <!-- cart -->
        <!-- for bootstrap working -->
        <script type="text/javascript" src="{{ asset('public/js/bootstrap-3.1.1.min.js') }}"></script>
        <!-- //for bootstrap working -->
        <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic' rel='stylesheet' type='text/css'>     
        <script src="{{ asset('public/js/jquery.flexslider.js') }}"></script>
        <script src="{{ asset('public/js/imagezoom.js') }}"></script>
        <script src="{{ asset('public/js/jquery.easing.min.js') }}"></script>
    </head>
    <body>
        <!-- header -->
        <div class="header">
            <div class="container">
                <ul>
                    <li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Free and Fast Delivery</li>
                    <li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Free shipping On all orders</li>
                    <li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">info@example.com</a></li>
                </ul>
            </div>
        </div>
        <!-- //header -->
        <!-- header-bot -->
        <div class="header-bot">
            <div class="container">
                <div class="col-md-3 header-left">
                    <h1><a href="{{ url('/') }}"><img src="{{ asset($logo->logo) }}"></a></h1>
                </div>
                <div class="col-md-6 header-middle">
                    <form>
                        <div class="search">
                            <input type="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {
                                        this.value = 'Search';
                                    }" required="">
                        </div>
                        <div class="section_room">
                            <select id="country" onchange="change_country(this.value)" class="frm-field required">
                                <option value="null">All categories</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->categoryName }}</option>     
                                @endforeach
                            </select>
                        </div>
                        <div class="sear-sub">
                            <input type="submit" value=" ">
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
                <div class="col-md-3 header-right footer-bottom">
                    <ul>
                        <li><a href="{{ url('/customer/login') }}" class="use1"><span>Login</span></a>

                        </li>
                        <li><a class="fb" href="#"></a></li>
                        <li><a class="twi" href="#"></a></li>
                        <li><a class="insta" href="#"></a></li>
                        <li><a class="you" href="#"></a></li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>