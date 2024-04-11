const pwdField = document.querySelector(
  ".form-container input[type='password']"
);

const toggleBtn = document.querySelector(".form-container i");

toggleBtn.addEventListener("click", () => {
  pwdField.type = pwdField.type === "password" ? "text" : "password";
  toggleBtn.className = `fa-solid fa-eye${
    pwdField.type === "password" ? "" : "-slash"
  }`;
});
