let id_el_list = "#product-list";
let currentPage = 1;
let isLoading = false;
let hasMore = true;

function getData(append = false) {
    if (isLoading || !hasMore) return;

    const url = `${baseUrl}/api/products`;
    const payload = {
        _limit: 24,
        _page: currentPage,
    };

    isLoading = true;

    axios
        .get(url, { params: payload })
        .then((response) => {
            const data = response.data.data;

            if (!Array.isArray(data) || data.length === 0) {
                hasMore = false;
                return;
            }

            let template = "";

            data.forEach((item) => {
                template += `
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="product-item">
                            <div class="product-thumb">
                                <a href="${baseUrl}/product/${item.id}">
                                    <img src="${item.image_url}" alt="${
                    item.name
                }" class="img-fluid">
                                </a>
                            </div>
                            <div class="product-info text-center">
                                <h5 class="product-title">
                                    <a href="${baseUrl}/product/${item.id}">${
                    item.name
                }</a>
                                </h5>
                                <span class="brand d-block text-muted">${
                                    item.brand
                                }</span>
                                <span class="price font-weight-bold">Rp${parseInt(
                                    item.price
                                ).toLocaleString("id-ID")}</span>
                            </div>
                        </div>
                    </div>
                `;
            });

            if (append) {
                $(id_el_list).append(template);
            } else {
                $(id_el_list).html(template);
            }

            currentPage++; // next page
        })
        .catch((error) => {
            console.error(error);
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text:
                    error.message || "Terjadi kesalahan saat mengambil produk.",
            });
        })
        .finally(() => {
            isLoading = false;
        });
}

// Scroll handler
$(window).on("scroll", function () {
    if (
        $(window).scrollTop() + $(window).height() >=
        $(document).height() - 200
    ) {
        getData(true); // append products
    }
});

$(function () {
    getData(); // initial load
});
