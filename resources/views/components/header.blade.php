<!-- Di dalam <head> tag -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!-- =============== Header area start =============== -->
<div class="header-area header-area--default bg-white">
    <!-- Header Bottom Wrap Start -->
    <header class="header-area  header-sticky">
        <div class="container-fluid container-fluid--cp-100">
            <div class="row">
                <div class="col-lg-12 d-none d-md-block">
                    <div class="top-logo-area">
                        <div class="logo text-md-center">
                            <a href="{{route('home')}}"><img src="{{asset('assets/images/logo/logo.png')}}" alt="" style="height:60px"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-3 col-6">
                    <div class="header-right-items content__hidden d-none d-md-block">
                        <span class="phone-number font-lg-p" title="Call us for fast delivery"><a href="#cfd"><i class="icon-telephone"></i>&nbsp;&nbsp;<small class="text-color-primary"><b>+(62) 85212345678</b></small></a></span>
                    </div>
                    <div class="logo__hidden text-start">
                        <a href="{{route('home')}}"><img src="{{asset('assets/images/logo/logo.png')}}" alt="" style="height:40px"></a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="header__navigation">
                        <nav class="navigation-menu">
                            <ul class="justify-content-center">
                                <li><a href="{{route('home')}}"><span>Home</span></a></li>
                                <li><a href="{{route('plp')}}"><span>Shop</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="header-right-side text-end">
                        <div class="header-right-items d-none d-md-block">
                            <a href="#wishlist" class="header-cart">
                                <i class="fa-regular fa-heart"></i>
                                <span class="item-counter">3</span>
                            </a>
                        </div>
                        <div class="header-right-items">
                            <a href="#minicart" class="header-cart">
                                <span class="material-symbols-outlined">shopping_cart</span>
                                <span class="item-counter">3</span>
                            </a>
                        </div>
                        <div class="header-right-items d-none d-md-block">
                            @if(isset($_COOKIE['ut']) && isset($_COOKIE['ue']))
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    Hello, {{ ucwords(substr($_COOKIE['ue'], 0, 3)) }}
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="{{ route('profile') }}">My Profile</a></li>
                                    <li><a href="#" id="logout-btn"><span>Logout</span></a></li>
                                </ul>
                            </div>
                            @else
                            <a href="#" data-bs-toggle="modal" data-bs-target="#authModal">
                                <i class="icon-user"></i>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</div>
<!-- =============== End of header area =============== -->

<div class="header-login-register-wrapper modal fade" id="authModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-box-wrapper">
                <div class="helendo-tabs">
                    <ul class="nav" role="tablist">
                        <li class="tab__item nav-item active">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab_list_06" role="tab">Login</a>
                        </li>
                        <li class="tab__item nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab_list_07" role="tab">Our Register</a>
                        </li>
                    </ul>
                    <div class="tab-content content-modal-box">
                        <div class="tab-pane fade show active" id="tab_list_06" role="tabpanel">
                            <form class="account-form-box" id="form-login">
                                <h6 class="mb-3">Login your account</h6>
                                <b id="form-login-error" class="text-red"></b>
                                <div class="single-input">
                                    <input name="email" type="email" placeholder="Email" required>
                                </div>
                                <div class="single-input">
                                    <input name="password" type="password" placeholder="Password" required>
                                </div>
                                <div class="checkbox-wrap mt-10">
                                    <label class="label-for-checkbox inline mt-15">
                                        <input class="input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever">
                                        <span>Remember me</span>
                                    </label>
                                    <a href="#" class="mt-10">Lost your password?</a>
                                </div>
                                <div class="button-box mt-25">
                                    <button type="button" class="btn btn--full btn-black" id="form-login-btn">Log in</button>
                                </div>
                            </form>
                            <div id="form-login-loading" style="text-align:center;display:none">
                                <img src="{{asset('assets/images/bg/loading.gif')}}" style="width: 300px">
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab_list_07" role="tabpanel">
                            <form class="account-form-box" id="form-register">
                                <h6 class="mb-6">Register An Account</h6>
                                <b id="form-register-error" class="text-red"></b>
                                <div class="single-input">
                                    <input name="name" type="text" placeholder="Name" required>
                                </div>
                                <div class="single-input">
                                    <input name="email" type="email" placeholder="Email Address" required>
                                </div>
                                <div class="single-input">
                                    <input name="password" type="password" placeholder="Password" required>
                                </div>
                                <div class="single-input">
                                    <input name="password_confirmation" type="password" placeholder="Confirm Password" required>
                                </div>
                                <p class="mt-15">
                                    Your personal data will be used to support your experience throughout this website,
                                    to manage access to your account, and for other purposes described in our
                                    <a href="#" class="text-color-primary" target="_blank">privacy policy</a>.
                                </p>
                                <div class="button-box mt-25">
                                    <button type="button" class="btn btn-full btn-black" id="form-register-btn">Register</button>
                                </div>
                            </form>
                            <div id="form-register-loading" style="text-align:center;display:none">
                                <img src="{{asset('assets/images/bg/loading.gif')}}" style="width: 300px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- =============== Header area end =============== -->
