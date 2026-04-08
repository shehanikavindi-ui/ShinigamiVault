function searchProducts() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const products = document.querySelectorAll(".product-card");

    products.forEach((product) => {
        const name = product.getAttribute("data-name").toLowerCase();

        if (name.includes(input)) {
            product.style.display = "block";
        } else {
            product.style.display = "none";
        }
    });
}

function toggleDropdown() {
    document.getElementById("filterDropdown").classList.toggle("show");
}

function sortProducts(type) {
    const grid = document.getElementById("productsGrid");
    const cards = Array.from(grid.querySelectorAll(".product-card"));

    cards.sort((a, b) => {
        const priceA = parseFloat(a.getAttribute("data-price"));
        const priceB = parseFloat(b.getAttribute("data-price"));
        const orderA = parseInt(a.getAttribute("data-order"));
        const orderB = parseInt(b.getAttribute("data-order"));

        if (type === "low-high") return priceA - priceB;
        if (type === "high-low") return priceB - priceA;
        if (type === "new-old") return orderB - orderA;
        if (type === "old-new") return orderA - orderB;
        return 0;
    });

    cards.forEach((card) => grid.appendChild(card));
    document.getElementById("filterDropdown").classList.remove("show");
}

window.addEventListener("click", function (e) {
    const dropdown = document.getElementById("filterDropdown");
    const button = document.querySelector(".filter-toggle");

    if (!dropdown.contains(e.target) && !button.contains(e.target)) {
        dropdown.classList.remove("show");
    }
});