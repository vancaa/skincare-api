axios
    .get("/api/products")
    .then(function (response) {
        let data = response.data.data;
        let html = `
    <div class="single-hero-slider text-center banner-slide">
        <img src="/assets/images/banner/hero-banner.png" alt="Banner" class="img-fluid banner-img" />
        <div class="slider-text mt-4">
            <h2>Selamat Datang di Vanca Glow</h2>
            <p>✨ Temukan perawatan kulit terbaik untukmu ✨</p>
        </div>
    </div>
`;

        data.forEach(function (item) {
            html += `
                <div class="single-hero-slider text-center">
                    <img src="${baseUrl}${item.image_url}" alt="${
                item.name
            }" class="img-fluid" />
                    <div class="slider-text mt-4">
                        <h2>${item.name}</h2>
                        <p>${item.brand}</p>
                        <p class="text-danger">Rp${parseInt(
                            item.price
                        ).toLocaleString("id-ID")}</p>
                        <a href="/product/${
                            item.id
                        }" class="btn btn-dark">Lihat Detail</a>
                    </div>
                </div>
            `;
        });

        $("#product-preview").html(html);

        $("#product-preview").slick({
            dots: true,
            arrows: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
            slidesToShow: 1,
            slidesToScroll: 1,
        });
    })
    .catch(function (error) {
        console.log(error);
    });
