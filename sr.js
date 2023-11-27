let info = Array.from(document.querySelectorAll(".info"));
let edit = Array.from(document.querySelectorAll(".edit"));

let inpu = Array.from(document.querySelectorAll(".input"));
let updit = document.getElementById("updit");
let supreme = document.getElementById("supreme");
let dele = document.getElementById("dele");
let x = document.getElementById("x");

let num = document.getElementById("num");
let nu = document.getElementById("nu");
let childre;
let data = [];
edit.forEach((item, index) => {
  item.addEventListener("click", () => {
    data = [];
    let mod = document.querySelectorAll(".mod");
    console.log(mod);
    childre = Array.from(info[index].children);
    mod.forEach((item, index) => {
      item.value = childre[index].textContent;
      console.log("fff");
    });

    updit.style.top = " 0";
    scrolTop();
    num.value = item.value;
  });
});
function scrolTop() {
  scrollTo({
    top: 0,
    left: 0,
    behavior: "smooth",
  });
}
x.addEventListener("click", () => {
  updit.style.top = "-100vh";
});
