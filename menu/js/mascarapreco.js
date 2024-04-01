function formatPrice() {
    var input = document.getElementById("price");
    var value = input.value.replace(/\D/g, '');
    var formattedValue = (parseFloat(value) / 100).toFixed(2);
    input.value = "R$:" + formattedValue;
}

document.getElementById("price").addEventListener("input", formatPrice);