// navigation-float.js
// Script to show/hide navbar on mouse hover to top

document.addEventListener("DOMContentLoaded", function () {
    const navbar = document.getElementById("mainNavbar");
    const mainBody = document.getElementById("mainBody");
    let navbarTimeout;
    navbar.style.top = "-80px"; // Navbar disembunyikan saat halaman dimuat

    function showNavbar() {
        navbar.style.top = "0";
        if (mainBody) mainBody.style.paddingTop = "80px";
        clearTimeout(navbarTimeout);
    }
    function hideNavbar() {
        navbarTimeout = setTimeout(() => {
            navbar.style.top = "-80px";
            if (mainBody) mainBody.style.paddingTop = "0";
        }, 300);
    }

    navbar.addEventListener("mouseenter", showNavbar);
    navbar.addEventListener("mouseleave", hideNavbar);
    window.addEventListener("mousemove", function (e) {
        if (e.clientY <= 10) {
            showNavbar();
        }
    });
});
