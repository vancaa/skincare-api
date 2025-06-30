axios
    .get("/api/products")
    .then(function (response) {
        const data = response.data.data;
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
            let imageUrl = item.image_url;

            // Pastikan URL-nya valid
            if (!imageUrl.startsWith("http")) {
                imageUrl = baseUrl + "/" + imageUrl.replace(/^\/?/, "");
            }

            html += `
                <div class="single-hero-slider text-center">
                    <img src="${imageUrl}" alt="${item.name}" 
                         class="img-fluid slider-image" 
                         onerror="this.src='/assets/images/placeholder.jpg'" />
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

        const $slider = $("#product-preview");

        if ($slider.length) {
            $slider.html(html);

            // Hancurkan jika sudah ada slick sebelumnya
            if ($slider.hasClass("slick-initialized")) {
                $slider.slick("unslick");
            }

            // Inisialisasi slick carousel
            $slider.slick({
                dots: true,
                arrows: true,
                infinite: true,
                speed: 800,
                fade: false,
                cssEase: "ease-in-out",
                autoplay: true,
                autoplaySpeed: 2500,
                pauseOnHover: true,
                pauseOnFocus: true,
                adaptiveHeight: true,
                variableWidth: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                prevArrow:
                    '<button type="button" class="slick-prev custom-arrow"></button>',
                nextArrow:
                    '<button type="button" class="slick-next custom-arrow"></button>',
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: true,
                            dots: true,
                        },
                    },
                ],
            });
        }
    })
    .catch(function (error) {
        console.error("Error loading products:", error);

        const $slider = $("#product-preview");
        if ($slider.length) {
            $slider
                .html(
                    `
                <div class="single-hero-slider text-center">
                    <img src="/assets/images/banner/hero-banner.png" alt="Banner" class="img-fluid" />
                    <div class="slider-text mt-4">
                        <h2>Selamat Datang di Vanca Glow</h2>
                        <p>✨ Temukan perawatan kulit terbaik untukmu ✨</p>
                    </div>
                </div>
            `
                )
                .slick({
                    dots: true,
                    arrows: true,
                    infinite: true,
                    autoplay: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                });
        }
    });
