@extends('layouts.app-public')
@section('title', 'Home')
@section('content')

<div class="site-wrapper-reveal">
    <div class="hero-box-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Hero Slider Area Start -->
                    <div class="hero-area" id="product-preview">
                       
                    </div>
                    <!-- Hero Slider Area End -->
                </div>
            </div>
        </div>
    </div>

    <div class="about-us-area section-space--ptb_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-us-content_6 text-center">
                        <h2>Vanca Glow</h2>
<p>
    <small>
        Temukan rangkaian skincare terbaik untuk semua jenis kulit — dari hydrating toner, serum anti-aging, hingga sunscreen dengan perlindungan maksimal. Produk kami diformulasikan untuk membantu kulitmu tampil sehat, cerah, dan glowing setiap hari. ✨ Yuk mulai rutinitas perawatan kulitmu sekarang!
    </small>
</p>
<p class="mt-5">
    Bersinar dengan percaya diri. Mulai perjalanan kulit sehatmu di sini!
</p>

                        <p class="mt-5">Find your window to the world! Or, even,
                            <span class="text-color-primary">unlock hidden worlds, one page at a time!</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Banner Video Area Start -->
    <div class="banner-video-area overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-video-box">
                        <img src="https://img.youtube.com/vi/otej7WLdPh0/maxresdefault.jpg" alt="thumbnail" class="img-fluid" style="width:100%; height:auto; object-fit:cover;">
                        <div class="video-icon">
                            <a href="https://youtu.be/otej7WLdPh0" class="popup-youtube">
                                <i class="linear-ic-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Video Area End -->



    <!-- Our Brand Area Start -->
    <div class="our-brand-area section-space--pb_90">
        <div class="container">
            <div class="brand-slider-active">
                <div class="col-lg-12">
                    <div class="single-brand-item">
                        <a href="#"><img src="assets/images/products/toner-lightening.png" class="img-fluid" alt="Brand Images"></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="single-brand-item">
                        <a href="#"><img src="assets/images/products/vitamin-c-serum.png" class="img-fluid" alt="Brand Images"></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="single-brand-item">
                        <a href="#"><img src="assets/images/products/cleansing-gel.png" class="img-fluid" alt="Brand Images"></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="single-brand-item">
                        <a href="#"><img src="assets/images/products/exfoliating-toner.png" class="img-fluid" alt="Brand Images"></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="single-brand-item">
                        <a href="#"><img src="assets/images/products/bright-serum.png" class="img-fluid" alt="Brand Images"></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="single-brand-item">
                        <a href="#"><img src="assets/images/products/sunscreen-50.png" class="img-fluid" alt="Brand Images"></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="single-brand-item">
                        <a href="#"><img src="assets/images/products/toner-glow.png" class="img-fluid" alt="Brand Images"></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="single-brand-item">
                        <a href="#"><img src="assets/images/products/night-cream-repair.png" class="img-fluid" alt="Brand Images"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Brand Area End -->

   


    <!-- Our Member Area Start -->
    <div class="our-member-area section-space--pb_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="member-box">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-4">
                                <div class="section-title small-mb__40 tablet-mb__40">
                                    <h4 class="section-title">Join the community!</h4>
                                    <p>Become one of the member and get discount 50% off</p>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-8">
                                <div class="member-wrap">
                                    <form action="#" class="member--two">
                                        <input class="input-box" type="text" placeholder="Your email address">
                                        <button class="submit-btn"><i class="icon-arrow-right"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Member Area End -->
</div>
@endsection

@section('addition_css')
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <style>
     .slick-prev,
.slick-next {
    width: 40px;
    height: 40px;
    background-color: #fff;
    border-radius: 50%;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    border: none;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 99;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0; /* ⛔ hilangkan teks 'Next' dan 'Previous' */
    text-indent: -9999px; /* tambahan kalau masih bocor */
    overflow: hidden;
}

/* Posisi tombol panah */
.slick-prev {
    left: 15px;
}
.slick-next {
    right: 15px;
}

/* Icon panahnya */
.slick-prev::before,
.slick-next::before {
    content: '';
    font-family: "slick";
    font-size: 24px;
    color: #333;
    text-indent: 0;
    display: inline-block;
}

.slick-prev::before {
    content: '←'; /* bisa ganti pake \2190 atau unicode */
}
.slick-next::before {
    content: '→';
}
   .slick-dots {
        display: flex !important;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin-top: 20px;
         position: absolute;
         top: 810px;
    }

    .slick-dots li {
        margin: 0 5px;
    }

    .slick-dots li button {
        font-size: 0;
        width: 12px;
        height: 12px;
        border-radius: 100%;
        background-color: #ccc;
        border: none;
    }

    .slick-dots li.slick-active button {
        background-color: #000;
    }
    .banner-img {
        max-height: 500px;
        width: auto;
        object-fit: cover;
        margin-left: auto;
        margin-right: auto;
    }

    .banner-slide .slider-text {
        margin-top: 30px;
    }

    .banner-slide h2 {
        font-size: 32px;
        font-weight: 600;
    }
       .brand-slider-active .single-brand-item img {
        width: 250px; 
        max-width: none; 
        height: 150px;
        margin: 0 auto;
        display: block;
    }

    .brand-slider-active .single-brand-item {
        max-width: none;
        text-align: center;
        padding: 10px;
    }
</style>
@endsection

@section('addition_script')
    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script>
        const baseUrl = "{{ url('') }}";
    </script>
    <script src="{{ asset('pages/js/app.js') }}"></script>
    <script src="{{ asset('pages/js/home.js') }}"></script>
@endsection

