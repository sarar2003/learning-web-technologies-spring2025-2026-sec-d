let unitPrice = 1000;
const qtyInput = document.getElementById("qty");
const totalInput = document.getElementById("total");
const errorMsg = document.getElementById("error");
let alreadyAlerted = false;

qtyInput.addEventListener("input", function () {
  var qty = parseInt(qtyInput.value);

  if (qty < 0) {
    qtyInput.value = 0;
    qty = 0;
    errorMsg.textContent = "Quantity cannot be negative. Reset to 0.";
  } else {
    errorMsg.textContent = "";
  }

  let total = unitPrice * qty;
  totalInput.value = total + " BDT";

  if (total > 1000 && !alreadyAlerted) {
    alert("Congratulations! You are eligible for a gift coupon!");
    alreadyAlerted = true;
  }

  if (total <= 1000) {
    alreadyAlerted = false;
  }
});
