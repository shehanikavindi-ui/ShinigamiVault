 function changeImage(imageSrc, clickedThumb) {
    document.getElementById("mainProductImage").src = imageSrc;

    document.querySelectorAll(".thumb").forEach((thumb) => {
        thumb.classList.remove("active");
    });

    clickedThumb.classList.add("active");
}

let qty = 1;

function increaseQty() {
    qty++;
    document.getElementById("qtyValue").textContent = qty;
}

function decreaseQty() {
    if (qty > 1) {
        qty--;
        document.getElementById("qtyValue").textContent = qty;
    }
}

document.querySelectorAll(".size-btn").forEach((button) => {
    button.addEventListener("click", function () {
        document.querySelectorAll(".size-btn").forEach((btn) => btn.classList.remove("active"));
        this.classList.add("active");
    });
});