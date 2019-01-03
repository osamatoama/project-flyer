(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/app"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/photos.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/photos.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  /**
   * proprieties that's need to assign to this component
   * @type array
   */
  props: ["id", "canDelete"],
  data: function data() {
    return {
      photos: []
    };
  },
  computed: {
    /**
     * private channel name
     * @return object
     */
    privateChannel: function privateChannel() {
      return window.Echo.private("flyers.".concat(this.id));
    },

    /**
     * retrieve the get photos Url
     * @return string
     */
    photosUrl: function photosUrl() {
      return Helpers.proccesRoute('flyers.get_photos', {
        'flyer': this.id
      });
    }
  },
  methods: {
    /**
     * retrieve the delete photo url
     * @param  int id
     * @return string
     */
    deleteUrl: function deleteUrl(id) {
      return Helpers.proccesRoute('flyers.delete_photo', {
        'photo': id
      });
    },

    /**
     * get all photos associated with the given flyer
     * @return void
     */
    getPhotos: function getPhotos() {
      var _this = this;

      window.axios.get(this.photosUrl).then(function (response) {
        return _this.photos = response.data;
      });
    },

    /**
     * listen when add new photo and update photos collection
     * @return void
     */
    listenForAddingNewPhoto: function listenForAddingNewPhoto() {
      var _this2 = this;

      this.privateChannel.listen(".add.flyer.photo", function (_ref) {
        var photo = _ref.photo;
        return _this2.photos.push(photo);
      });
    },

    /**
     * post request to delete photo
     * @param  int id
     * @return void
     */
    deleteFlyerPhoto: function deleteFlyerPhoto(id) {
      var el = this.$refs["photo-".concat(id)][0];
      $(el).fadeOut(800);
      window.axios.delete(this.deleteUrl(id));
    }
  },

  /**
   * created event hook
   * @return void
   */
  created: function created() {
    this.getPhotos();
    this.listenForAddingNewPhoto();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/photos.vue?vue&type=template&id=330f9be8&":
/*!*********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/photos.vue?vue&type=template&id=330f9be8& ***!
  \*********************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "row mt-4" },
    _vm._l(_vm.photos, function(photo) {
      return _c(
        "div",
        {
          key: photo.id,
          ref: "photo-" + photo.id,
          refInFor: true,
          staticClass: "col-lg-3 col-md-6 position-relative"
        },
        [
          _vm.canDelete == "can"
            ? _c(
                "span",
                {
                  staticClass: "delete-flyer-photo",
                  on: {
                    click: function($event) {
                      _vm.deleteFlyerPhoto(photo.id)
                    }
                  }
                },
                [_vm._v("X")]
              )
            : _vm._e(),
          _vm._v(" "),
          _c("img", {
            staticClass: "img-fluid flyer-photo w-100",
            attrs: { src: photo.path }
          })
        ]
      )
    }),
    0
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_photos_vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/photos.vue */ "./resources/js/components/photos.vue");
__webpack_require__(/*! ./bootstrap */ "./resources/js/bootstrap.js");

window.Vue = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.common.js");

var app = new Vue({
  el: '#app',
  components: {
    Photos: _components_photos_vue__WEBPACK_IMPORTED_MODULE_0__["default"]
  }
});

/***/ }),

/***/ "./resources/js/bootstrap.js":
/*!***********************************!*\
  !*** ./resources/js/bootstrap.js ***!
  \***********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _routes_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./routes.js */ "./resources/js/routes.js");
/* harmony import */ var _helpers_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./helpers.js */ "./resources/js/helpers.js");
/* harmony import */ var laravel_echo__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! laravel-echo */ "./node_modules/laravel-echo/dist/echo.js");
try {
  window.Popper = __webpack_require__(/*! popper.js */ "./node_modules/popper.js/dist/esm/popper.js").default;
  window.$ = window.jQuery = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");

  __webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.js");
} catch (e) {}
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */


window.axios = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");


window.routes = _routes_js__WEBPACK_IMPORTED_MODULE_0__["default"];
window.Helpers = _helpers_js__WEBPACK_IMPORTED_MODULE_1__["default"];
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
var token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}


window.Pusher = __webpack_require__(/*! pusher-js */ "./node_modules/pusher-js/dist/web/pusher.js");
window.Echo = new laravel_echo__WEBPACK_IMPORTED_MODULE_2__["default"]({
  broadcaster: 'pusher',
  key: "18015da122009c14c051",
  cluster: "ap2",
  encrypted: true
});

/***/ }),

/***/ "./resources/js/components/photos.vue":
/*!********************************************!*\
  !*** ./resources/js/components/photos.vue ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _photos_vue_vue_type_template_id_330f9be8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./photos.vue?vue&type=template&id=330f9be8& */ "./resources/js/components/photos.vue?vue&type=template&id=330f9be8&");
/* harmony import */ var _photos_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./photos.vue?vue&type=script&lang=js& */ "./resources/js/components/photos.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _photos_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _photos_vue_vue_type_template_id_330f9be8___WEBPACK_IMPORTED_MODULE_0__["render"],
  _photos_vue_vue_type_template_id_330f9be8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/photos.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/photos.vue?vue&type=script&lang=js&":
/*!*********************************************************************!*\
  !*** ./resources/js/components/photos.vue?vue&type=script&lang=js& ***!
  \*********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_photos_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./photos.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/photos.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_photos_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/photos.vue?vue&type=template&id=330f9be8&":
/*!***************************************************************************!*\
  !*** ./resources/js/components/photos.vue?vue&type=template&id=330f9be8& ***!
  \***************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_photos_vue_vue_type_template_id_330f9be8___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./photos.vue?vue&type=template&id=330f9be8& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/photos.vue?vue&type=template&id=330f9be8&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_photos_vue_vue_type_template_id_330f9be8___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_photos_vue_vue_type_template_id_330f9be8___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/helpers.js":
/*!*********************************!*\
  !*** ./resources/js/helpers.js ***!
  \*********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  proccesRoute: function proccesRoute(name, params) {
    var route = '';

    for (var i in params) {
      route += window.routes[name].replace('{' + i + '}', params[i]);
    }

    return route;
  }
});

/***/ }),

/***/ "./resources/js/routes.js":
/*!********************************!*\
  !*** ./resources/js/routes.js ***!
  \********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var routes = {
  'passport.authorizations.authorize': 'http://projectflyer.test/oauth/authorize',
  'passport.authorizations.approve': 'http://projectflyer.test/oauth/authorize',
  'passport.authorizations.deny': 'http://projectflyer.test/oauth/authorize',
  'passport.token': 'http://projectflyer.test/oauth/token',
  'passport.tokens.index': 'http://projectflyer.test/oauth/tokens',
  'passport.tokens.destroy': 'http://projectflyer.test/oauth/tokens/{token_id}',
  'passport.token.refresh': 'http://projectflyer.test/oauth/token/refresh',
  'passport.clients.index': 'http://projectflyer.test/oauth/clients',
  'passport.clients.store': 'http://projectflyer.test/oauth/clients',
  'passport.clients.update': 'http://projectflyer.test/oauth/clients/{client_id}',
  'passport.clients.destroy': 'http://projectflyer.test/oauth/clients/{client_id}',
  'passport.scopes.index': 'http://projectflyer.test/oauth/scopes',
  'passport.personal.tokens.index': 'http://projectflyer.test/oauth/personal-access-tokens',
  'passport.personal.tokens.store': 'http://projectflyer.test/oauth/personal-access-tokens',
  'passport.personal.tokens.destroy': 'http://projectflyer.test/oauth/personal-access-tokens/{token_id}',
  'flyers.get_photos': 'http://projectflyer.test/api/flyer/photos/{flyer}',
  'flyers.add_photo': 'http://projectflyer.test/api/flyers/{flyer}/photos',
  'flyers.delete_photo': 'http://projectflyer.test/api/flyer/photos/{photo}/delete',
  'flyers.index': 'http://projectflyer.test/flyers',
  'flyers.create': 'http://projectflyer.test/flyers/create',
  'flyers.store': 'http://projectflyer.test/flyers',
  'flyers.edit': 'http://projectflyer.test/flyers/{flyer}/edit',
  'flyers.update': 'http://projectflyer.test/flyers/{flyer}',
  'flyers.destroy': 'http://projectflyer.test/flyers/{flyer}',
  'flyers.show': 'http://projectflyer.test/flyers/{zip}/{street}',
  'login': 'http://projectflyer.test/login',
  'logout': 'http://projectflyer.test/logout',
  'register': 'http://projectflyer.test/register',
  'password.request': 'http://projectflyer.test/password/reset',
  'password.email': 'http://projectflyer.test/password/email',
  'password.reset': 'http://projectflyer.test/password/reset/{token}',
  'password.update': 'http://projectflyer.test/password/reset',
  'home': 'http://projectflyer.test/home'
};
/* harmony default export */ __webpack_exports__["default"] = (routes);

/***/ }),

/***/ "./resources/sass/app.sass":
/*!*********************************!*\
  !*** ./resources/sass/app.sass ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.sass ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\xampp\htdocs\projectFlyer\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\projectFlyer\resources\sass\app.sass */"./resources/sass/app.sass");


/***/ })

},[[0,"/js/manifest","/js/vendor"]]]);