window.onload = function () {
  const date = new Date();
  document.getElementById("date").valueAsDate = date;
  document.getElementById("time").value =
    ("0" + date.getHours()).slice(-2) +
    ":" +
    ("0" + date.getMinutes()).slice(-2);
};
