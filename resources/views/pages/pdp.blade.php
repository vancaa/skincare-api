@extends('layouts.app-public')
@section('title', 'Product Detail')

@section('content')
<div class="site-wrapper-reveal">
    <div class="single-product-wrap section-space--pt_90 border-bottom pb-5 mb-5">
        <div class="container">
            <div class="row">

                <!-- Gambar -->
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-left">
                        <div class="product-details-images-2 slider-lg-image-2">
                            <div class="easyzoom-style">
                                <div class="easyzoom easyzoom--overlay">
                                    <a href="#" class="poppu-img product-img-main-href">
                                        <img src="#" alt="Main Image" class="img-fluid product-img-main-src">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="product-details-thumbs-2 slider-thumbs-2 mt-2">
                            <div class="sm-image">
                                <img src="#" alt="product image thumb" id="product-thumb">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deskripsi -->
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-content">
                        <h5 id="product-name" class="mb-2"></h5>

                        <!-- ⬇️ Tambahan sesuai permintaan -->
                        <h1 id="product-name-dummy" style="display: none;"></h1>
                        <span id="product-price-dummy" style="display: none;"></span>
                        <p id="product-brand-dummy" style="display: none;"></p>
                        <p id="product-category-dummy" style="display: none;"></p>
                        <img class="product-img-main-src-dummy" style="display: none;" />
                        <img id="product-thumb-dummy" style="display: none;" />
                        <!-- ✅ Tambahan selesai -->

                        <div class="quickview-ratting-review mb-2">
                            <div class="quickview-ratting-wrap">
                                <div id="product-review-stars" class="quickview-ratting"></div>
                                <a href="#" id="product-review-body-count"></a>
                            </div>
                        </div>

                        <h3 id="product-price" class="price mb-2"></h3>
                        <div id="product-status-stock" class="stock mb-2"></div>
                        <p id="product-description" class="mb-3"></p>

                        <div class="product_meta mb-3">
                            <div><strong>Brand:</strong> <span id="product-brand"></span></div>
                            <div><strong>Kategori:</strong> <span id="product-category"></span></div>
                        </div>

                        <div class="quickview-action-wrap">
                            <div class="quickview-cart-box mb-2">
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                </div>
                            </div>
                            <div class="quickview-button d-flex gap-2">
                                <button class="btn btn-dark">Add to cart</button>
                                <a href="#" class="btn btn-outline-secondary"><i class="icon-heart"></i></a>
                            </div>
                        </div>

                        <div class="product_socials mt-4">
                            <span>Bagikan produk ini: </span>
                            <ul class="helendo-social-share d-inline-flex gap-2">
                                <li><a href="#"><i class="social_facebook"></i></a></li>
                                <li><a href="#"><i class="social_twitter"></i></a></li>
                                <li><a href="#"><i class="social_instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Deskripsi -->

            </div>
        </div>
    </div>
</div>
@endsection

@section('addition_script')
<script src="{{ asset('pages/js/pdp.js') }}"></script>
@endsection
