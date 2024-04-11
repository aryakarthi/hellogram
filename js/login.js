const form = document.querySelector(".login form");

const loginBtn = document.querySelector(".btn input");

const errorMsg = document.querySelector(".err-msg");

form.addEventListener("submit", (e) => {
  e.preventDefault();
});

loginBtn.addEventListener("click", () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/login.php", true);
  xhr.onload = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let data = xhr.responseText;
      console.log(data);
      if (data === "success") {
        location.href = "users.php";
      } else {
        errorMsg.style.display = "block";
        errorMsg.textContent = data;
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
});
