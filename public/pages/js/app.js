console.log("__app.js loaded");

// BASE URL dan headers
const baseUrl = window.location.origin;

const apiHeaders = {
    headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
    },
};

// Fungsi untuk registrasi (FIXED)
$("#form-register-btn").on("click", function (e) {
    const form = document.getElementById("form-register");
    form.reportValidity();
    if (!form.checkValidity()) return;

    $("#form-register-error").html("");
    $("#form-register-loading").show();
    $("#form-register").hide();

    let url = baseUrl + "/register"; // Changed to match your api.php
    let jsonData = {
        name: form.elements["name"].value,
        email: form.elements["email"].value,
        password: form.elements["password"].value,
        password_confirmation: form.elements["password_confirmation"].value,
    };

    axios
        .post(url, jsonData, apiHeaders)
        .then(function (response) {
            document.cookie = "ue=" + jsonData.email;
            document.cookie = "ut=" + response.data.token;
            Swal.fire({
                icon: "success",
                title: "Registrasi Berhasil!",
                text: "Akun Vanca Glow kamu sudah aktif.",
                timer: 2000,
            }).then(() => window.location.reload());
        })
        .catch(function (error) {
            let errorMsg =
                error.response?.data?.message ||
                error.response?.data?.errors?.email?.[0] || // For validation errors
                "Gagal registrasi. Cek data lagi!";
            $("#form-register-error").html(errorMsg);
            $("#form-register-loading").hide();
            $("#form-register").show();
        });
});

// Fungsi untuk login (UPDATED to match api.php)
$("#form-login-btn").on("click", function (e) {
    const form = document.getElementById("form-login");
    form.reportValidity();
    if (!form.checkValidity()) return;

    $("#form-login-error").html("");
    $("#form-login-loading").show();
    $("#form-login").hide();

    let url = baseUrl + "/login"; // Changed to match your api.php
    let jsonData = {
        email: form.elements["email"].value,
        password: form.elements["password"].value,
    };

    axios
        .post(url, jsonData, apiHeaders)
        .then(function (response) {
            document.cookie = "ue=" + jsonData.email;
            document.cookie = "ut=" + response.data.token;
            Swal.fire({
                icon: "success",
                title: "Login Berhasil!",
                timer: 1500,
            }).then(() => window.location.reload());
        })
        .catch(function (error) {
            $("#form-login-error").html(
                error.response?.data?.message || "Email/password salah!"
            );
            $("#form-login-loading").hide();
            $("#form-login").show();
        });
});

// Fungsi logout (UPDATED to match api.php)
$("#logout-btn").on("click", function (e) {
    axios
        .post(
            baseUrl + "/logout",
            {},
            {
                headers: {
                    Authorization: "Bearer " + getCookie("ut"),
                    Accept: "application/json",
                },
            }
        )
        .then(() => {
            document.cookie =
                "ue=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            document.cookie =
                "ut=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
            window.location.reload();
        });
});

// Helper functions
function getCookie(name) {
    let value = "; " + document.cookie;
    let parts = value.split("; " + name + "=");
    if (parts.length == 2) return parts.pop().split(";").shift();
}

function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}
$("#profile-btn").on("click", function (e) {
    e.preventDefault();
    axios
        .get(baseUrl + "/api/profile", {
            headers: {
                Authorization: "Bearer " + getCookie("ut"),
            },
        })
        .then((response) => {
            // Tampilkan data di modal/console
            console.log("Profile data:", response.data);
            Swal.fire({
                title: "Profile Info",
                html: `Nama: ${response.data.user.name}<br>Email: ${response.data.user.email}`,
                icon: "info",
            });
        })
        .catch((error) => {
            console.error("Gagal mengambil profil:", error);
        });
});
