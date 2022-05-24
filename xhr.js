/**
 * Charles Monaghan 18012390
 * Standard XHR file used to create XHR requests
 */
// file xhr.js
function createRequest() {
  var xhr = false;
  if (window.XMLHttpRequest) {
    xhr = new XMLHttpRequest();
  } else if (window.ActiveXObject) {
    xhr = new ActiveXObject('Microsoft.XMLHTTP');
  }
  return xhr;
} // end function createRequest()
