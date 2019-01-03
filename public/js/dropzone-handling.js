(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/dropzone-handling"],{

/***/ "./resources/js/dropzone-handling.js":
/*!*******************************************!*\
  !*** ./resources/js/dropzone-handling.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

Dropzone.autoDiscover = false;
var token = document.head.querySelector('meta[name="csrf-token"]');
var addPhotoForm = new Dropzone(".dropzone", {
  paramName: 'photo',
  headers: {
    'X-CSRF-TOKEN': token.content,
    'X-Requested-With': 'XMLHttpRequest'
  },
  maxFileSize: 3,
  acceptedFiles: '.jpg,.png,.jpeg,.gif,.JPG',
  error: function error(e) {
    var message = '';

    if (e.xhr && e.accepted == true) {
      // the message is sent to the server and not accepted or there is an error
      message = e.xhr.response;
    } else if (e.accepted == false) {
      // the message is not accepted or rejected by client side
      message = ' the file type is not supported';
    }

    swal({
      title: "Error",
      text: message,
      icon: "error",
      timer: 2500,
      button: false
    });
  }
});

/***/ }),

/***/ 1:
/*!*************************************************!*\
  !*** multi ./resources/js/dropzone-handling.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\projectFlyer\resources\js\dropzone-handling.js */"./resources/js/dropzone-handling.js");


/***/ })

},[[1,"/js/manifest"]]]);