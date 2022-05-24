/**
 * Charles Monaghan 18012390
 * Gets admin input from admin.html and creates a POST request to getBookings.php
 */
let form = document.getElementById('form');

form.addEventListener('submit', (event) => {
  // gets current date and time
  const date = new Date();
  const time =
    ('0' + date.getHours()).slice(-2) +
    ':' +
    ('0' + date.getMinutes()).slice(-2);

  event.preventDefault();
  let bsearch = document.getElementById('bsearch').value;

  // if the field is empty, it'll send a post request with the string 'empty'.
  if (bsearch === '') {
    bsearch = 'empty';
  }

  // POST request to getBookings.php
  const xhr = createRequest();
  if (xhr) {
    var obj = document.getElementById('response');
    xhr.open('POST', './getBookings.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    const requestbody = `bsearch=${bsearch}&date=${date.toLocaleDateString()}&time=${time}`;
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        obj.innerHTML = xhr.responseText;
      }
    };
    xhr.send(requestbody);
  }
});
