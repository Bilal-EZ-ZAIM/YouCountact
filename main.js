
let inputs = Array.from(document.querySelectorAll(".valid"));
let parg = document.querySelectorAll(".pp");
let submit = inputs[inputs.length - 1];
let valid = /^\w+@\w+\.(com|net|ma)$/;
let submit_data = 0;
console.log(inputs);
inputs.forEach((item, index) => {
  item.addEventListener("input", (e) => {
    if (item.type === "tel") {
      item.style.border = "3px solid green";
      parg[index].style.display = "none";
      submit_data = 1;
      console.log("hjjh");
      return 0;
    } else {
      item.style.border = "2px solid red";
      parg[index].style.display = "flex";
      submit_data = 0;
    }
    if (
      item.type === "email" &&
      typeof item.value === "string" &&
      valid.test(item.value)
    ) {
      item.style.border = "3px solid green";
      parg[index].style.display = "none";
      submit_data = 1;
      return 0;
    } else {
      item.style.border = "2px solid red";
      parg[index].style.display = "flex";
      submit_data = 0;
    }
    if (
      item.type === "password" &&
      typeof item.value === "string" &&
      item.value.length > 7
    ) {
      item.style.border = "3px solid green";
      parg[index].style.display = "none";
      submit_data = 1;
      return 0;
    } else {
      item.style.border = "2px solid red";
      parg[index].style.display = "flex";
      submit_data = 0;
    }

    if (
      item.type === "password" &&
      typeof item.value === "string" &&
      item.value.length > 7 &&
      item.name !== "dpassword"
    ) {
      item.style.border = "3px solid green";
      parg[index].style.display = "none";
      submit_data = 1;
      return 0;
    } else {
      item.style.border = "2px solid red";
      parg[index].style.display = "flex";
      submit_data = 0;
    }
    if (item.name === "dpassword" && inputs[index - 1].value === item.value) {
      item.style.border = "3px solid green";
      parg[index].style.display = "none";
      submit_data = 1;
      return 0;
    } else {
      item.style.border = "2px solid red";
      parg[index].style.display = "flex";
      submit_data = 0;
    }

    if (
      item.type === "text" &&
      typeof item.value === "string" &&
      item.value.length > 2
    ) {
      item.style.border = "3px solid green";
      parg[index].style.display = "none";
      submit_data = 1;
      return 0;
    } else {
      item.style.border = "2px solid red";
      parg[index].style.display = "flex";
      submit_data = 0;
    }
  });
});

submit.addEventListener("click", (e) => {
  if (submit_data === 0) {
    e.preventDefault();
  }
});

function validitEmail() {
  if (valid.test(email.value)) {
    email.style.border = "2px solid green";
    return 1;
  } else {
    console.log("nice");
    email.style.border = "2px solid red";
  }
}

let info = Array.from(document.querySelectorAll(".info"));
let edit = Array.from(document.querySelectorAll(".edit"));
let inpu = Array.from(document.querySelectorAll(".input"));
let updit = document.getElementById("updit");
let supreme = document.getElementById("supreme");
let dele = document.getElementById("dele");
let x = document.getElementById("x");
let mod = document.querySelectorAll(".mod");
let num = document.getElementById("num");
let nu = document.getElementById("nu");
let childre;
let data = [];
edit.forEach((item, index) => {
  item.addEventListener("click", () => {
    data = [];
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
inpu.forEach((item, index) => {
  item.addEventListener("click", () => {
    console.log(item.value);
    supreme.style.display = "flex";
    nu.value = item.value;
  });
});
document.getElementById("pas").addEventListener("click", () => {
  supreme.style.display = "none";
});
dele.addEventListener("click", () => {
  supreme.style.display = "none";
});
