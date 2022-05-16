// get current date and time
window.onload = function () {
  const date = new Date();
  document.getElementById("date").valueAsDate = date;
  document.getElementById("time").value =
    ("0" + date.getHours()).slice(-2) +
    ":" +
    ("0" + date.getMinutes()).slice(-2);
};

function getData() {
  const cname = document.getElementById("cname").value;
  const phone = document.getElementById("phone").value;
  const unumber = document.getElementById("unumber").value;
  const snumber = document.getElementById("snumber").value;
  const stname = document.getElementById("stname").value;
  const sbname = document.getElementById("sbname").value;
  const dsbname = document.getElementById("dsbname").value;
  const date = document.getElementById("date").value;
  const time = document.getElementById("time").value;

  const xhr = createRequest();
  if (xhr) {
    var obj = document.getElementById("test");
    const requestbody = `cname=${cname}&phone=${phone}&unumber=${unumber}&snumber=${snumber}&stname=${stname}&sbname=${sbname}&dsbname=${dsbname}&date=${date}&time=${time}`;
    xhr.open("POST", "./bookTaxi.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        obj.innerHTML = xhr.responseText;
      } // end if
    }; // end anonymous call-back function
    xhr.send(requestbody);
  } // end if
} // end function getData()
