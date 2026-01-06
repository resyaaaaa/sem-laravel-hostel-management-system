<!DOCTYPE html>
<html lang="en">

<head>
    <title>Intrend Interior Category Flat Bootstrap Responsive Website Template | Services : W3layouts</title>

    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords"
        content="Intrend Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
    <!--// Meta tag Keywords -->

    <link href="{{ asset('web_home/css_home/slider.css') }}" type="text/css" rel="stylesheet" media="all">

    <!-- css files -->
    <link rel="stylesheet" href="{{ asset('web_home/css_home/bootstrap.css') }}"> <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="{{ asset('web_home/css_home/style.css') }}" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link rel="stylesheet" href="{{ asset('web_home/css_home/fontawesome-all.css') }}"> <!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->

    <!-- testimonials css -->
    <link rel="stylesheet" href="{{ asset('web_home/css_home/flexslider.css') }}" type="text/css" media="screen"
        property="" />
    <!-- flexslider css -->
    <!-- //testimonials css -->

    <!-- web-fonts -->
    <link href="{{ asset('//fonts.googleapis.com/css?family=Poiret+One&amp;subset=cyrillic,latin-ext') }}"
        rel="stylesheet">
    <!-- //web-fonts -->

</head>

<body>

    <!-- banner -->
    <div class="inner-page-banner" id="home">
        <!--Header-->
        <header>
            <div class="container agile-banner_nav">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">

                    <h1><a class="navbar-brand" href="home.php">NITC<span class="display"></span></a></h1>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only"></span></a>
                            </li>

                            <li
                                class="nav-item {{ request()->routeIs('application.index') || request()->routeIs('application.create') || request()->routeIs('application.edit') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('application.index') }}">Hostels</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="message_user.php">Messages</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">Contact</a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link"
                                    data-toggle="dropdown">{{ auth()->user()->name }}
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu agile_short_dropdown">
                                    <li>
                                        <a href="profile.php" class="dropdown-item">My Profile</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </nav>
            </div>
        </header>
        <!--Header-->
    </div>

    @yield('content')

    <!-- about -->

    <!-- why choose us -->
    <!-- team -->


    <!-- Clients -->



    <!-- footer -->
    <footer class="py-5">
        <div class="container py-md-5">
            <div class="footer-logo mb-5 text-center">
                <a class="navbar-brand" href="{{ asset('http://www.nitc.ac.in/') }}" target="_blank">NIT <span
                        class="display">
                        CALICUT</span></a>
            </div>
            <div class="footer-grid">

                <div class="list-footer">
                    <ul class="footer-nav text-center">
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>

                        <li>
                            <a href="{{ route('application.index') }}">Hostels</a>
                        </li>
                        <li>
                            <a href="contact.php">Contact</a>
                        </li>
                        <li>
                            <a href="profile.php">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer -->

    <!-- js-scripts -->

    <!-- js -->
    <script type="text/javascript" src="{{ asset('web_home/js/jquery-2.2.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web_home/js/bootstrap.js') }}"></script>
    <!-- Necessary-JavaScript-File-For-Bootstrap -->
    <!-- //js -->

    <!-- banner js -->
    <script src="{{ asset('web_home/js/snap.svg-min.js') }}"></script>
    <script src="{{ asset('web_home/js/main.js') }}"></script> <!-- Resource jQuery -->
    <!-- //banner js -->

    <!-- flexSlider --><!-- for testimonials -->
    <script defer src="{{ asset('web_home/js/jquery.flexslider.js') }}"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                start: function(slider) {
                    $('body').removeClass('loading');
                }
            });
        });
    </script>
    <!-- //flexSlider --><!-- for testimonials -->

    <!-- start-smoth-scrolling -->
    <script src="{{ asset('web_home/js/SmoothScroll.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web_home/js/move-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web_home/js/easing.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function() {
            /*
            	var defaults = {
            	containerID: 'toTop', // fading element id
            	containerHoverID: 'toTopHover', // fading element hover id
            	scrollSpeed: 1200,
            	easingType: 'linear'
            	};
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <!-- //here ends scrolling icon -->
    <!-- start-smoth-scrolling -->

    <!-- //js-scripts -->

</body>

</html>
