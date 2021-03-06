<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="format-detection" content="telephone=09182180519"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="{{ asset('market/image/favicon.png') }}" rel="icon"/>
    <title>هایپرآنلاین</title>
    <meta name="description" content="سامانه فروش محصولات آنلاین">
    <!-- CSS Part Start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('market/js/bootstrap/css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('market/js/bootstrap/css/bootstrap-rtl.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('market/css/font-awesome/css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('market/css/stylesheet.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('market/css/owl.carousel.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('market/css/owl.transitions.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('market/css/responsive.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('market/css/stylesheet-rtl.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('market/css/responsive-rtl.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('market/css/webfont/stylesheet.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('market/css/mine.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('market/css/iransans.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/sweetalert2/dist/sweetalert2.css') }}">
    @yield('style')
    <!-- CSS Part End-->
</head>
<body>
<div class="wrapper-wide">
    <div id="header">
        <!-- Top Bar Start-->
        <nav id="top" class="htop">
            <div class="container">
                <div class="row"><span class="drop-icon visible-sm visible-xs"><i
                                class="fa fa-align-justify"></i></span>
                    <div class="pull-left flip left-top">
                        <div class="links">
                            <ul>
                                <li class="mobile" style="font-size: medium">081-34266311</li>
                                <li class="email" style="font-size: medium"><a href="mailto:hyperonlineir@gmail.com"><i
                                                class="fa fa-envelope"></i>hyperonlineir@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div id="top-links" class="nav pull-right flip">
                        <ul>
                            @if(Auth::check())
                                @if($admin)
                                    <li>
                                        <a href="{{ url('admin') }}" target="_blank">پنل
                                            ادمین</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       >خروج</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="post"
                                      style="display: none">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            @else
                                <li><a href="{{ url('login') }}">ورود</a></li>
                                <li><a href="{{ url('register') }}">ثبت نام</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Top Bar End-->
        <!-- Header Start-->
        <header class="header-row">
            <div class="container">
                <div class="table-container">
                    <!-- Logo Start -->
                    <div class="col-table-cell col-lg-6 col-md-6 col-sm-12 col-xs-12 inner">
                        <div id="logo">
                            <a href="{{ url('home') }}">
                                <img class="img-responsive"
                                     src="{{ asset('market/image/logo.png') }}"
                                     alt="MarketShop"/>
                            </a>
                        </div>
                    </div>
                    <!-- Logo End -->
                    <!-- Mini Cart Start-->
                    <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div id="cart">
                            <button type="button" data-toggle="dropdown" data-loading-text="Loading..."
                                    class="heading dropdown-toggle">
                                <a href="{{ url('checkout') }}" class="btn btn-primary"
                                   style="font-size: 16px; background-color: #00A000">تکمیل خرید&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span id="cart-total">{{ $cart['count'].' کالا - '.$cart['total'].' تومان' }}</span>
                                </a>
                            </button>
                            <div id="banner" class="mobile_download">
                                <div id="banner-content">
                                    <p id="download_content">
                                        <a href="https://cafebazaar.ir/app/ir.hatamiarash.hyperonline" target="_blank">دانلود نسخه موبایل</a>
                                    </p>
                                </div>
                            </div>
                            <ul class="dropdown-menu">
                                <li>
                                    <table class="table">
                                        <tbody>
                                        @foreach($cart['items'] as $item)
                                            <input type="hidden" id="{{ $item->rowId }}" value="{{ $item->rowId }}">
                                            <tr>
                                                <td class="text-center">
                                                    <a href="product.html">
                                                        @if($item->options['image'])
                                                            <img class="img-thumbnail"
                                                                 src="{{ asset('images').'/' . $item->options['image'] }}"
                                                                 width="50" height="50">
                                                        @else
                                                            <img class="img-thumbnail"
                                                                 src="{{ asset('market/image/no_image.jpg') }}"
                                                                 width="50" height="50">
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="text-left"><a href="product.html">{{ $item->name }}</a></td>
                                                <td class="text-right">{{ $item->qty . ' عدد' }}</td>
                                                <td class="text-right">{{ number_format($item->subtotal) . ' تومان' }}</td>
                                                <td class="text-center">
                                                    <a href="javascript:void(0);"
                                                       onClick="removeCart(document.getElementById('{{ $item->rowId }}').value)">
                                                        <button class="btn btn-danger btn-xs remove" title="حذف"
                                                                onClick=""
                                                                type="button"><i class="fa fa-times"></i></button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </li>
                                <li>
                                    <div>
                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <td class="text-right"><strong>جمع کل</strong></td>
                                                <td class="text-right">{{ $cart['subtotal'] . ' تومان' }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>ارسال / بسته بندی</strong></td>
                                                <td class="text-right">
                                                    @if($cart['tax']!=0)
                                                        {{ $cart['tax'] . ' تومان' }}
                                                    @else
                                                        رایگان
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>قابل پرداخت</strong></td>
                                                <td class="text-right">{{ $cart['total'] . ' تومان' }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <p>
                                            <span><a class="fa fa-warning"></a> </span>
                                            @if($cart['free-ship'])
                                                سفارش شما رایگان ارسال خواهد شد.
                                            @else
                                                سبد های کمتر از ۳۰ هزار تومان با هزینه ارسال خواهند شد.
                                            @endif
                                        </p>
                                        <p class="checkout">
                                            <a href="{{ url('checkout') }}" class="btn btn-primary">تسویه حساب</a>
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Mini Cart End-->
                    <!-- جستجو Start-->
                    <div class="col-table-cell col-lg-3 col-md-3 col-sm-6 col-xs-12 inner">
                        <div id="search" class="input-group">
                            <input id="filter_name" type="text" name="search" value="" placeholder="جستجو"
                                   class="form-control input-lg"/>
                            <button type="button" class="button-search"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <!-- جستجو End-->
                </div>
            </div>
        </header>
        <!-- Header End-->
        <!-- Main Start-->
        <div class="container">
            <nav id="menu" class="navbar">
                <div class="navbar-header"><span class="visible-xs visible-sm"> منو <b></b></span></div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav">
                        <li><a title="خانه" href="{{ url('home') }}"><span>خانه</span></a></li>
                        <li><a disabled><span>/</span></a></li>
                        <li class="mega-menu dropdown"><a>دسته بندی ها</a>
                            <div class="dropdown-menu">
                                @foreach($categories as $c1)
                                    @if($c1['level']==1)
                                        <div class="column col-lg-2 col-md-3"><a
                                                    href="{{ url('category/1/'. $c1['unique_id']) }}">{{ $c1['name'] }}</a>
                                            <div>
                                                <ul>
                                                    @foreach($categories as $c2)
                                                        @if($c2['level']==2 && $c2['parent_id']==$c1['unique_id'])
                                                            <li>
                                                                <a href="{{ url('category/2/'. $c2['unique_id']) }}">{{ $c2['name'] }}
                                                                    <span>&rsaquo;</span></a>
                                                                <div class="dropdown-menu">
                                                                    <ul>
                                                                        @foreach($categories as $c3)
                                                                            @if($c3['level']==3 && $c3['parent_id']==$c2['unique_id'])
                                                                                <li>
                                                                                    <a href="{{ url('category/3/'. $c3['unique_id']) }}">{{ $c3['name'] }}</a>
                                                                                </li>
                                                                            @endif
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                            {{--@else
                                                                <li><a href="{{ url('category/'. $c2['unique_id']) }}">{{ $c2['name'] }}</a></li>--}}
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </li>

                        <li class="custom-link-right"><a href="{{ url('off') }}" target="_blank">تخفیف خورده ها !!</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div id="container">
        <input type="hidden" id="logged" value="@if(Auth::check()) 1 @else 0 @endif">
        {{--@yield('feature-box')--}}
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a href="https://cafebazaar.ir/app/ir.hatamiarash.hyperonline" target="_blank">
                        <img class="img-responsive markets" style="margin: 4px"
                             src="{{ asset('market/image/markets/bazaar.png') }}" alt="کافه بازار">
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="http://iranapps.ir/app/ir.hatamiarash.hyperonline" target="_blank">
                        <img class="img-responsive markets" style="margin: 4px"
                             src="{{ asset('market/image/markets/iran_apps.png') }}" alt="ایران اپس">
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="http://myket.ir/app/ir.hatamiarash.hyperonline" target="_blank">
                        <img class="img-responsive markets" style="margin: 4px"
                             src="{{ asset('market/image/markets/myket.png') }}" alt="مایکت">
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="http://parshub.com/push/APP/930533830" target="_blank">
                        <img class="img-responsive markets" style="margin: 4px"
                             src="{{ asset('market/image/markets/parshub.png') }}" alt="پارس هاب">
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                @yield('right-panel')
                @yield('content')
            </div>
        </div>
    </div>
    <!--Footer Start-->
    <footer id="footer">
        <div class="fpart-first">
            <div class="container">
                <div class="row font_sans">
                    <div class="contact col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <h5>اطلاعات تماس</h5>
                        <ul>
                            <li class="address"><i class="fa fa-map-marker"></i>همدان / خیابان مهدیه</li>
                            <li class="mobile"><i class="fa fa-phone"></i>081−34266311</li>
                            <li class="email"><i class="fa fa-envelope"></i>برقراری ارتباط از طریق <a
                                        href="{{ url('/contact_us') }}">تماس با ما</a>
                        </ul>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>اطلاعات</h5>
                        <ul>
                            <li><a href="{{ url('/about') }}">درباره ما</a></li>
                            {{--<li><a href="{{ url('/privacy') }}">حریم خصوصی</a></li>--}}
                            <li><a href="{{ url('/terms') }}">شرایط و قوانین</a></li>
                        </ul>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>خدمات مشتریان</h5>
                        <ul>
                            <li><a href="{{ url('/contact_us') }}">تماس با ما</a></li>
                            <li><a href="{{ url('/comment') }}">ثبت شکایات</a></li>
                        </ul>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>امکانات جانبی</h5>
                        <ul>
                            <li><a href="{{ url('/off') }}">تخفیف خورده ها</a></li>
                        </ul>
                    </div>
                    <div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h5>حساب من</h5>
                        <ul>
                            <li><a href="{{ url('/profile') }}">حساب کاربری</a></li>
                            <li><a href="{{ url('/orders') }}">تاریخچه سفارشات</a></li>
                            <li><a href="{{ url('/feed') }}">خبرنامه</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="fpart-second">
            <div class="container">
                <div id="powered" class="clearfix">
                    <div class="powered_text pull-left flip">
                        <p class="font_sans">کپی رایت © {{ date("Y") }} − کلیه ی حقوق مادی و معنوی این سایت مربوط به
                            هایپرآنلاین می
                            باشد</p>
                    </div>
                    <div class="social pull-right flip">
                        <a href="{{ $social['instagram'] }}" target="_blank">
                            <img data-toggle="tooltip" style="width: 32px; height: 32px;"
                                 src="{{ asset('market/image/socialicons/instagram.png') }}"
                                 alt="Instagram" title="Instagram">
                        </a>
                        <a href="{{ $social['telegram'] }}" target="_blank">
                            <img data-toggle="tooltip" style="width: 32px; height: 32px;"
                                 src="{{ asset('market/image/socialicons/telegram.png') }}"
                                 alt="Telegram" title="Telegram">
                        </a>
                    </div>
                    <br>
                </div>

                <div class="container" style="text-align: center;">
                    <div style="display: inline-block">
                        <div style="float: left;" class="logo">
                            <img class="img-responsive" style='cursor:pointer; margin:0 auto;'
                                 alt="asnaf"
                                 src="{{ asset('/market/image/asnaf.png') }}"/>
                        </div>
                        <div style="float:left;" class="logo">
                            <img class="img-responsive"
                                 src="https://trustseal.enamad.ir/logo.aspx?id=71394&amp;p=QHelLvhqUOh0EElo"
                                 alt="logo-enamad"
                                 onclick="window.open(&quot;https://trustseal.enamad.ir/Verify.aspx?id=71394&amp;p=QHelLvhqUOh0EElo&quot;, &quot;Popup&quot;,&quot;toolbar=no, location=no, statusbar=no, menubar=no, scrollbars=1, resizable=0, width=580, height=600, top=30&quot;)"
                                 style="cursor:pointer; margin: 0 auto;" id="QHelLvhqUOh0EElo">
                        </div>
                        <div style="float:left;" class="logo">
                            <img class="img-responsive" id='sizpnbqesizpesgtfukz' style='cursor:pointer; margin:0 auto;'
                                 onclick='window.open("https://logo.samandehi.ir/Verify.aspx?id=92906&p=pfvluiwkpfvlobpdgvka", "Popup","toolbar=no, scrollbars=no, location=no, statusbar=no, menubar=no, resizable=0, width=450, height=630, top=30")'
                                 alt="logo-samandehi"
                                 src='https://logo.samandehi.ir/logo.aspx?id=92906&p=bsiyodrfbsiylymawlbq'/>
                        </div>
                        <div style="float: left;" class="logo">
                            <img class="img-responsive" style='cursor:pointer; margin:0 auto;'
                                 alt="aparat"
                                 src="https://www.aparat.com/public/public/images/logo/v2/aparat_logo_fa_color_black_275x100.png"/>
                        </div>
                    </div>
                </div>
                <br>
                <div class="bottom-row">
                    <div class="custom-text text-center">
                        <p style="font-size: xx-small; font-family: 'Courier New', Courier, mono;">Designed & Developed
                            By</p>
                        <br>
                        <a class="web_font" style="font-size: xx-large" href="http://arash-hatami.ir" target="_blank">A.Hatami</a>
                    </div>
                </div>
            </div>
            <div id="back-top">
                <a data-toggle="tooltip" title="بازگشت به بالا" href="javascript:void(0)" class="backtotop">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
    </footer>
    <!--Footer End-->
</div>
<!-- JS Part Start-->
<script type="text/javascript" src="{{ asset('market/js/jquery-2.1.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('market/js/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('market/js/jquery.easing-1.3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('market/js/jquery.dcjqaccordion.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('market/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('market/js/custom.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/mine.js') }}"></script>
<script src="{{ asset('bower_components/sweetalert2/dist/sweetalert2.min.js') }}"></script>
<script src="{{ asset('market/js/jquery.fittext.js') }}"></script>
<script>
    jQuery("#download_content").fitText();
</script>
@yield('script')
<!-- JS Part End-->
</body>
</html>
