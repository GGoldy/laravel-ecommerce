<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/img/favicon.png') }}">

		<!-- all css here -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/themify-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/pe-icon-7-stroke.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/icofont.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/meanmenu.min.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/easyzoom.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/bundle.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="{{ asset('frontend/assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>

        <link rel="stylesheet" href="{{ asset('frontend/assets/css/custom.css') }}">

        <!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
        @livewireStyles
    </head>
    <body>

        <!-- header start -->
            <header>
                <div class="header-top-furniture wrapper-padding-2 res-header-sm">
                    <div class="container-fluid">
                        <div class="header-bottom-wrapper">
                            <div class="logo-2 furniture-logo ptb-30">
                                <a href="/">
                                    <img height="60" style="transform:scale(1.5);object-fit: cover;" src="{{ asset('frontend/assets/img/logo/logo.png') }}" alt="">
                                </a>
                            </div>
                            <div class="menu-style-2 furniture-menu menu-hover">
                                <nav>
                                    <ul>
                                        <li>
                                            <a href="/">home</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('catalog.index') }}">catalog</a>
                                        </li>
                                        <li><a href="#">Categories</a>
                                            <ul class="single-dropdown">
                                                @foreach($categories_menu as $category_menu)
                                                    <li><a href="{{ route('catalog.index', $category_menu->slug) }}">{{ $category_menu->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div>
                        <div class="row">
                            <div class="mobile-menu-area d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                                <div class="mobile-menu">
                                    <nav id="mobile-menu-active">
                                        <ul class="menu-overflow">
                                            <li>
                                                <a href="#">HOME</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('catalog.index') }}">Catalog</a>
                                            </li>
                                            <li><a href="#">categories</a>
                                                <ul>
                                                @foreach($categories_menu as $category_menu)
                                                    <li><a href="{{ route('catalog.index', $category_menu->slug) }}">{{ $category_menu->name }}</a></li>
                                                @endforeach
                                                </ul>
                                            </li>

                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom-furniture wrapper-padding-2 border-top-3" style="border-bottom: 1px solid #e0e0e0;">
                    <div class="container-fluid">
                        <div class="furniture-bottom-wrapper">
                            <div class="furniture-login">
                                <ul>
                                    @guest
                                        <li>Get Access: <a href="{{ route('login') }}">Login</a></li>
                                        <li><a href="{{ route('register') }}">Register</a></li>
                                    @else
                                        <li>Hello: <a href="">{{ auth()->user()->username }}</a></li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    @endguest
                                </ul>
                            </div>
                            <div class="furniture-search">
                                <form>
                                    <input placeholder="I am Searching for . . ." type="text" name="q" autocomplete="off" id="search">
                                    <button disabled>
                                        <i class="ti-search"></i>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </header>
        <!-- header end -->

        @yield('content')

        <!-- footer -->
        <footer class="footer-area">
            <div class="footer-top-area pt-70 pb-35 wrapper-padding-5">
                <div class="container-fluid">
                    <div class="widget-wrapper">
                        <div class="footer-widget mb-30">
                        <img height="60" style="transform:scale(1.5);object-fit: cover;" src="{{ asset('frontend/assets/img/logo/logo.png') }}" alt="">
                            <div class="footer-about-2">
                                <p>There are many variations of passages of Lorem Ipsum <br>the majority have suffered alteration in some form, by <br> injected humour</p>
                            </div>
                        </div>
                        <div class="footer-widget mb-30">
                            <h3 class="footer-widget-title-5">Contact Info</h3>
                            <div class="footer-info-wrapper-3">
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>Address: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p>Desa Fulan <br>SBY</p>
                                    </div>
                                </div>
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>Phone: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p>+62 xxxxx <br>+62 xxxxxxx</p>
                                    </div>
                                </div>
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>E-mail: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p><a href="#"> email@domain.com</a> <br><a href="#"> domain@mail.info</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </footer>



        @include('sweetalert::alert')
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
        @livewireScripts
		<!-- all js here -->
        <script src="{{ asset('frontend/assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/popper.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/waypoints.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/ajax-mail.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
        <script src="{{ asset('frontend/assets/js/app.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
        <script>
            $(document).ready(function() {
                let bloodhound = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    remote: {
                        url: '{{url("search")}}?productName=%QUERY%', //'/user/find?q=%QUERY%',
                        wildcard: '%QUERY%'
                    },
                });

                $('#search').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 1
                }, {
                    name: 'products',
                    source: bloodhound,
                    limit: 10,
                    display: function(data) {
                        return data.name  //Input value to be set when you select a suggestion.
                    },
                    templates: {
                        empty: [
                            '<div class="list-group-item">There are no matching search results</div>'
                        ],
                        header: [
                            '<div class="list-group search-results-dropdown">'
                        ],
                        suggestion: function(data) {
                            return '<div style="font-weight:normal; width:100%" class="list-group-item"><a href="{{url('product')}}/'+data.slug+'">' + data.name + '</a></div></div>'
                        }
                    }
                });
            });
        </script>
    </body>
</html>
