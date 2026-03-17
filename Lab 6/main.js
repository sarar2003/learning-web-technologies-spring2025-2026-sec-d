let unitPrice = 500;
let quantityInput = document.getElementById("quantity");
let totalPriceDisplay = document.getElementById("totalPrice");

quantityInput.addEventListener("input", () => {
  let quantity = quantityInput.value;

  if (quantity < 0) {
    alert("Error: Quantity cannot be below 0!");
    quantity = 0;
    quantityInput.value = 0;
  }

  let total = unitPrice * quantity;
  totalPriceDisplay.value = total;

  if (total > 1000) {
    alert("You are now eligible for a gift coupon!");
  }
});
