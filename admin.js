let form = document.getElementById("form");

form.addEventListener("submit", (event) => {
  const date = new Date();
  const time =
    ("0" + date.getHours()).slice(-2) +
    ":" +
    ("0" + date.getMinutes()).slice(-2);

  event.preventDefault();
  const bsearch = document.getElementById("bsearch").value;

  const xhr = createRequest();
  if (xhr) {
    var obj = document.getElementById("response");
    xhr.open("POST", "./getBookings.php");
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    const requestbody = `bsearch=${bsearch}&date=${date.toLocaleDateString()}&time=${time}`;
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        obj.innerHTML = xhr.responseText;
      }
    };
    xhr.send(requestbody);
  }
});
