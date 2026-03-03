let div = document.getElementById("div");
let btn = document.getElementById("move-btn");
btn.addEventListener("click", () => {
  let count = 0;
  let interval = setInterval(() => {
    if (count > 50) {
      clearInterval(interval);
    } else {
      let current = window.getComputedStyle(div).left;
      if (current == 0) {
        current = "10px";
      } else {
        current = parseInt(current) + 10 + "px";
        div.style.left = current;
      }
    }
    count++;
  }, 100);
});
