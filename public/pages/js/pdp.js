function getProductDetail(id) {
    const url = baseUrl + "/api/product/" + id;

    axios
        .get(url, apiHeaders)
        .then(function (response) {
            const data = response.data;

            // Gambar utama
            $(".product-img-main-src").attr("src", data.image_url);
            $(".product-img-main-href").attr("href", data.image_url);

            // Info dasar
            $("#product-name").text(data.name);
            $("#product-price").text("Rp" + data.price.toLocaleString("id-ID"));
            $("#product-description").html(data.description);

            // Info tambahan (opsional)
            $("#product-author").text(data.brand); // ubah "Author" menjadi "Brand"
            $("#product-publisher").text("Skincare Indonesia"); // hardcode (jika belum ada field)
            $("#product-tags").text("Best Seller, Hydrating"); // hardcode / jika belum ada tag

            // Status stok (simulasi)
            $("#product-status-stock")
                .text("Ready Stock")
                .addClass("text-success");

            // Rating (simulasi)
            $("#product-review-stars").html(
                '<i class="icon-star"></i>'.repeat(4) +
                    '<i class="icon-star-half"></i>'
            );
            $("#product-review-body-count").text("(17 reviews)");
        })
        .catch(function (error) {
            console.error(error);
            Swal.fire({
                icon: "error",
                title: "Produk tidak ditemukan",
                text: error.message,
            });
        });
}

$(function () {
    const productId = window.location.pathname.split("/").pop();
    getProductDetail(productId);
});
