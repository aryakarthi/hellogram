const searchBar = document.getElementById("search-bar");
const searchBtn = document.getElementById("search-btn");
const userList = document.getElementById("user-list");

searchBtn.addEventListener("click", () => {
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBtn.classList.toggle("active");
  searchBar.value = "";
});

searchBar.addEventListener("keyup", () => {
  let searchTerm = searchBar.value;
  if (searchTerm != "") {
    searchBar.classList.add("active");
  } else {
    searchBar.classList.remove("active");
    searchBtn.classList.remove("active");
  }

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let data = xhr.response;
      userList.innerHTML = data;
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
});

setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/users.php", true);
  xhr.onload = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let data = xhr.response;
      if (!searchBar.classList.contains("active")) {
        userList.innerHTML = data;
      }
    }
  };
  xhr.send();
}, 500);
