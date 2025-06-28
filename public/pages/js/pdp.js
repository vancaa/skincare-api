(function () {
    // 1. Configuration
    const baseUrl = window.location.origin;
    const config = {
        enableManualZoom: true,
        zoomBackground: "rgba(0,0,0,0.9)",
        zoomIcon: `${baseUrl}/assets/images/zoom-icon.png`,
    };

    console.debug("[PDP] Initialized with manual zoom control");

    // 2. Initialize Zoom Modal
    function initZoomModal() {
        const modalHTML = `
            <div id="custom-zoom-modal" style="
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: ${config.zoomBackground};
                z-index: 9999;
                text-align: center;
                cursor: zoom-out;
            ">
                <img id="zoomed-product-image" style="
                    max-height: 90vh;
                    max-width: 90vw;
                    position: relative;
                    top: 50%;
                    transform: translateY(-50%);
                ">
                <button id="zoom-close-btn" style="
                    position: absolute;
                    top: 20px;
                    right: 20px;
                    background: none;
                    border: none;
                    color: white;
                    font-size: 30px;
                    cursor: pointer;
                ">&times;</button>
            </div>
        `;
        $("body").append(modalHTML);

        $("#zoom-close-btn").on("click", function () {
            $("#custom-zoom-modal").hide();
            $("body").css("overflow", "auto");
        });

        $("#custom-zoom-modal").on("click", function (e) {
            if (e.target === this) {
                $(this).hide();
                $("body").css("overflow", "auto");
            }
        });
    }

    // 3. Product image handler
    function handleProductImage(productData) {
        const imageUrl = getProductImageUrl(productData);
        console.log("Final Image URL:", imageUrl);

        // Main product image setup
        const $mainImg = $(".product-img-main-src")
            .attr("src", imageUrl)
            .css("cursor", "pointer")
            .on("error", function () {
                $(this).attr(
                    "src",
                    `${baseUrl}/assets/images/placeholder-skincare.png`
                );
            });

        // Thumbnail image setup
        $("#product-thumb")
            .attr("src", imageUrl)
            .on("error", function () {
                $(this).attr(
                    "src",
                    `${baseUrl}/assets/images/placeholder-thumb.png`
                );
            });

        // Set up controlled zoom
        if (config.enableManualZoom) {
            $mainImg.on("click", function (e) {
                e.preventDefault();
                e.stopPropagation();

                $("#zoomed-product-image").attr("src", imageUrl);
                $("#custom-zoom-modal").show();
                $("body").css("overflow", "hidden");
            });
        }

        // Disable default link behavior
        $(".product-img-main-href")
            .attr("href", "javascript:void(0)")
            .off("click");
    }

    // 4. Get product image URL
    function getProductImageUrl(productData) {
        if (productData.image_url) {
            return `${baseUrl}/${productData.image_url.replace(/^\/+/, "")}`;
        }

        const slug = productData.name
            .toLowerCase()
            .replace(/%/g, "percent")
            .replace(/\s+/g, "-")
            .replace(/[^a-z0-9-]/g, "");

        const extensions = [".jpg", ".png", ".webp"];
        for (const ext of extensions) {
            const potentialPath = `/products/${slug}${ext}`;
            return `${baseUrl}${potentialPath}`;
        }
        return `${baseUrl}/assets/images/placeholder-skincare.png`;
    }

    // 5. Main product fetch function
    function getProductDetail(id) {
        console.debug("[PDP] Fetching product ID:", id);

        axios
            .get(`${baseUrl}/api/products/${id}`)
            .then((response) => {
                const data = response.data;
                console.table(data);

                // Handle images with controlled zoom
                handleProductImage(data);

                // Display product info
                $("#product-name").text(data.name || "(Nama tidak tersedia)");

                const price = parseFloat(data.price);
                $("#product-price").text(
                    !isNaN(price)
                        ? `Rp ${price.toLocaleString("id-ID")}`
                        : "Harga tidak tersedia"
                );

                $("#product-description").html(
                    data.description || "<i>Tidak ada deskripsi</i>"
                );
                $("#product-brand").text(data.brand || "Brand tidak tersedia");
                $("#product-category").text(
                    data.category || "Kategori tidak tersedia"
                );

                const stockStatus =
                    parseInt(data.stock) > 0
                        ? { text: "Ready Stock", class: "text-success" }
                        : { text: "Out of Stock", class: "text-danger" };

                $("#product-status-stock")
                    .text(stockStatus.text)
                    .removeClass("text-danger text-success")
                    .addClass(stockStatus.class);
            })
            .catch((error) => {
                console.error("[PDP] Error:", error);
                Swal.fire({
                    icon: "error",
                    title: "Gagal Memuat Produk",
                    html: `
                        <div class="text-start">
                            <p>${
                                error.response?.data?.message || error.message
                            }</p>
                            <small class="text-muted">ID: ${id}</small>
                        </div>
                    `,
                    confirmButtonText: "Coba Lagi",
                    footer: '<a href="/products" style="color: #ff6b6b;">Lihat produk lainnya →</a>',
                });
            });
    }

    // 6. Initialize everything when DOM is ready
    $(function () {
        initZoomModal();

        const productId = window.location.pathname.split("/").pop();

        if (!productId || !/^\d+$/.test(productId)) {
            console.error("[PDP] Invalid product ID");
            Swal.fire({
                icon: "warning",
                title: "URL Tidak Valid",
                text: "Silakan pilih produk dari halaman katalog",
                willClose: () => (window.location.href = "/products"),
            });
            return;
        }

        getProductDetail(productId);
    });
})();
