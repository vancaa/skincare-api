let id_el_list = "#product-list";

function getData() {
    let url = baseUrl + "/api/product"; // endpoint skincare
    let payload = {
        _limit: 12,
        _page: 1,
    };

    axios
        .get(url, { params: payload }, apiHeaders)
        .then(function (response) {
            let data = response.data;
            let template = "";

            data.forEach((item) => {
                template += `
                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
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
                            <span class="price font-weight-bold">Rp${item.price.toLocaleString(
                                "id-ID"
                            )}</span>
                        </div>
                    </div>
                </div>
                `;
            });

            $(id_el_list).html(template);
        })
        .catch(function (error) {
            console.error(error);
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: error.message,
            });
        });
}

$(function () {
    getData();
});
