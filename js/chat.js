const form = document.getElementById("typing-area");
const msgInput = document.getElementById("msg-input");
const sendBtn = document.getElementById("send-btn");
const chatBox = document.getElementById("chat-box");

form.addEventListener("submit", (e) => {
  e.preventDefault();
});

sendBtn.addEventListener("click", () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/add_chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      msgInput.value = "";
      scrollToBottom();
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
});

chatBox.onmouseenter = () => {
  chatBox.classList.add("active");
}

chatBox.onmouseleave = () => {
  chatBox.classList.remove("active");
}

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/fetch_chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let data = xhr.response;
      chatBox.innerHTML = data;

      if (!chatBox.classList.contains("active")) {
        scrollToBottom();
      }
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
}, 500);

function scrollToBottom() {
  chatBox.scrollTop = chatBox.scrollHeight;
}
