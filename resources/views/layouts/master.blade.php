<!DOCTYPE html>
<html lang="en">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>eShop</title>

    <link rel="stylesheet" type="text/css" href="{{asset('app/css/fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/crumina-fonts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/grid.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/styles.css')}}">


    <!--Plugins styles-->

    <link rel="stylesheet" type="text/css" href="{{asset('app/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/swiper.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/primary-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app/css/magnific-popup.css')}}">

    <!--Styles for RTL-->

    <!--<link rel="stylesheet" type="text/css" href="{{asset('app/css/rtl.css')}}">-->
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

    <!--External fonts-->

    <link href='https://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

</head>


<body class=" ">

<header class="header" id="site-header">

    <div class="container">

        <div class="header-content-wrapper">
            <ul class="nav-add">
                <li class="cart">

                    <a href="#" class="js-cart-animate">
                        <i class="seoicon-basket"></i>
                        <span class="cart-count">{{ Cart::content()->count() }}</span>
                    </a>

                    <div class="cart-popup-wrap">
                        <div class="popup-cart align-center">
                            <h4 class="title-cart">Total in Cart</h4>
                            <p class="subtitle">{{ Cart::total() }}</p>
                            <a href="{{ route('cart') }}">
                                <div class="btn btn-small btn--dark">
                                    <span class="text">View Cart</span>
                                </div>
                            </a>
                        </div>
                    </div>

                </li>
            </ul>
            <ul class="nav-add">
                    <li class="cart">
                        <a href="{{ route('index') }}" class="">
                            <span style="padding: 0px 20px">Home</span>
                        </a>
                    </li>
                    <li class="cart">
                        <a href="{{ route('cart') }}" class="">
                            <span style="padding: 0px 20px">Cart</span>
                        </a>
                    </li>
                    <li class="cart">
                        <a href="{{ route('cart.checkout') }}" class="">
                            <span style="padding: 0px 20px">Checkout</span>
                        </a>
                    </li>

                    @if(Auth::check())
                    <li class="cart">
                        <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button style="background-color: white;" type="submit"> Logout</button>
                        </form>
                    </li>
                    @endif

                </ul>
        </div>

    </div>

</header>


<div class="content-wrapper">

    <div class="container">
        <div class="row pt120">
            <div class="col-lg-8 col-lg-offset-2">
                <div class="heading align-center mb60">
                    <h4 class="h1 heading-title">tutorial</h4>
                    <p class="heading-text">Buy books, and we ship to you.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- End Books products grid -->

    @yield('content')
</div>

<!-- Footer -->

<footer class="footer">
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                </div>
            </div>
        </div>
    </div>
</footer>



<script src="{{asset('app/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('app/js/crum-mega-menu.js')}}"></script>
<script src="{{asset('app/js/swiper.jquery.min.js')}}"></script>
<script src="{{asset('app/js/theme-plugins.js')}}"></script>
<script src="{{asset('app/js/main.js')}}"></script>
<script src="{{asset('app/js/form-actions.js')}}"></script>

<script src="{{asset('app/js/velocity.min.js')}}"></script>
<script src="{{asset('app/js/ScrollMagic.min.js')}}"></script>
<script src="{{asset('app/js/animation.velocity.min.js')}}"></script>

<!-- ...end JS Script -->
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script>
        @if(Session::get('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
        @if(Session::get('info'))
            toastr.info("{{ Session::get('info') }}")
        @endif
    </script>

</body>
</html>