@extends('layouts.app-public')
@section('title', 'Shop')
@section('content')
<div class="site-wrapper-reveal">
    <!-- Product Area Start -->
    <div class="product-wrapper section-space--ptb_90 border-bottom pb-5 mb-5">
        <div class="container">
            <!-- Sort, Showing, and Search Bar -->
            <div class="row mb-4">
                <div class="col-lg-12 d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <!-- Sort & Showing -->
                    <div class="d-flex align-items-center gap-3 flex-wrap">
                        <select class="_filter form-select form-select-sm w-auto" name="_sort_by" onchange="getData()">
                            <option value="title_asc">Sort by A-Z</option>
                            <option value="title_desc">Sort by Z-A</option>
                            <option value="latest_publication">Sort by latest</option>
                            <option value="latest_added">Sort by time added</option>
                            <option value="price_asc">Sort by price: low to high</option>
                            <option value="price_desc">Sort by price: high to low</option>
                        </select>
                        <p class="result-count mb-0 small text-muted">
                            Showing <span id="products_count_start"></span>–<span id="products_count_end"></span>
                            of <span id="products_count_total"></span>
                        </p>
                    </div>

                    <!-- Search bar -->
                    <div class="header-search-box d-flex">
                        <input class="_filter search-field form-control form-control-sm" name="_search" type="text"
                            onkeypress="getDataOnEnter(event)" placeholder="Search by title or brand...">
                    </div>
                </div>
            </div>

            <!-- Content: Filter kiri & Produk kanan -->
            <div class="row">
                <!-- Kiri: Filter -->
                <div class="col-lg-3 col-md-4">
                    <!-- Brand Filter -->
                    <div class="shop-widget widget-shop-publishers mb-4">
                        <div class="product-filter">
                            <h6 class="mb-20">Brands</h6>
                            <select class="_filter form-select form-select-sm" name="_brand" onchange="getData()">
                                <option value="">All</option>
                                <option value="wardah">Wardah</option>
                                <option value="avoskin">Avoskin</option>
                                <option value="somethinc">Somethinc</option>
                                <option value="skintific">Skintific</option>
                                <option value="the ordinary">The Ordinary</option>
                            </select>
                        </div>
                    </div>

                    <!-- Color Filter -->
                    <div class="shop-widget widget-color mb-4">
                        <div class="product-filter">
                            <h6 class="mb-20">Color</h6>
                            <ul class="widget-nav-list">
                                <li><a href="#"><span class="swatch-color black"></span></a></li>
                                <li><a href="#"><span class="swatch-color green"></span></a></li>
                                <li><a href="#"><span class="swatch-color grey"></span></a></li>
                                <li><a href="#"><span class="swatch-color red"></span></a></li>
                                <li><a href="#"><span class="swatch-color white"></span></a></li>
                                <li><a href="#"><span class="swatch-color yellow"></span></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Price Filter -->
                    <div class="shop-widget mb-4">
                        <div class="product-filter widget-price">
                            <h6 class="mb-20">Price</h6>
                            <ul class="widget-nav-list">
                                <li><a href="#">Under IDR 100K</a></li>
                                <li><a href="#">IDR 100-500K</a></li>
                                <li><a href="#">IDR 501-1000K</a></li>
                                <li><a href="#">Above IDR 1000K</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Tags Filter -->
                    <div class="shop-widget">
                        <div class="product-filter">
                            <h6 class="mb-20">Tags</h6>
                            <div class="blog-tagcloud">
                                <a href="#">Brightening</a>
                                <a href="#">Hydrating</a>
                                <a href="#">Acne</a>
                                <a href="#">Exfoliating</a>
                                <a href="#">Sunscreen</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kanan: Product list -->
                <div class="col-lg-9 col-md-8">
                    <div class="row" id="product-list"></div>

                    <div class="row">
                        <div class="col-12">
                            <ul class="page-pagination text-center mt-40" id="product-list-pagination"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Area End -->
    </div>
</div>
@endsection

@section('addition_css')
@endsection

@section('addition_script')
    <script src="{{ asset('pages/js/plp.js') }}"></script>
@endsection