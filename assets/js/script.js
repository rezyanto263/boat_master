// Navbar Show Up and Hide In
document.addEventListener("scroll", () => {
    const navbar = document.querySelector("nav");

    if (window.scrollY > 160) {
        navbar.classList.remove("hidden");
    }else {
        navbar.classList.add("hidden");
    }
});