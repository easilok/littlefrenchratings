(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ImageSlideShow.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/ImageSlideShow.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************/
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
  props: {
    slides: {
      type: Array
    },
    slideCounter: {
      type: Boolean
    }
  },
  data: function data() {
    return {
      activeSlide: 0
    };
  },
  computed: {
    hasSlides: function hasSlides() {
      return this.slides.length > 0;
    },
    hasNavigation: function hasNavigation() {
      return this.slides.length > 1;
    }
  },
  methods: {
    imgPath: function imgPath(path) {
      return '/storage/uploads/' + path;
    },
    incrementSlide: function incrementSlide() {
      if (this.activeSlide === this.slides.length - 1) {
        this.activeSlide = 0;
      } else {
        this.activeSlide += 1;
      }
    },
    decrementSlide: function decrementSlide() {
      if (this.activeSlide === 0) {
        this.activeSlide = this.slides.length - 1;
      } else {
        this.activeSlide -= 1;
      }
    }
  },
  mounted: function mounted() {}
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ImageSlideShow.vue?vue&type=template&id=5b69b2de&":
/*!*****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/ImageSlideShow.vue?vue&type=template&id=5b69b2de& ***!
  \*****************************************************************************************************************************************************************************************************************/
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
  return _vm.hasSlides
    ? _c("div", { staticClass: "mx-auto" }, [
        _c(
          "div",
          { staticClass: "mx-auto relative inline-block" },
          [
            _vm._l(_vm.slides, function(slide) {
              return _c("img", {
                directives: [
                  {
                    name: "show",
                    rawName: "v-show",
                    value: _vm.slides[_vm.activeSlide].id === slide.id,
                    expression: "slides[activeSlide].id === slide.id"
                  }
                ],
                key: slide.id,
                staticClass: "max-h-80-screen min-h-350",
                attrs: { src: _vm.imgPath(slide.path) },
                on: { click: _vm.incrementSlide }
              })
            }),
            _vm._v(" "),
            _vm.hasNavigation
              ? _c("div", { staticClass: "absolute inset-0 flex" }, [
                  _c(
                    "div",
                    { staticClass: "flex items-center justify-start w-1/2" },
                    [
                      _c(
                        "button",
                        {
                          staticClass:
                            "bg-teal-100 text-teal-500 hover:text-platform-color font-bold hover:shadow-lg rounded-full w-12 h-12 -ml-6",
                          on: { click: _vm.decrementSlide }
                        },
                        [_vm._v("\n\t\t\t\t\t←\n\t\t\t\t")]
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _vm.hasNavigation
                    ? _c(
                        "div",
                        { staticClass: "flex items-center justify-end w-1/2" },
                        [
                          _c(
                            "button",
                            {
                              staticClass:
                                "bg-teal-100 text-teal-500 hover:text-platform-color font-bold hover:shadow-lg rounded-full w-12 h-12 -mr-6",
                              on: { click: _vm.incrementSlide }
                            },
                            [_vm._v("\n\t\t\t\t\t→\n\t\t\t\t")]
                          )
                        ]
                      )
                    : _vm._e()
                ])
              : _vm._e()
          ],
          2
        ),
        _vm._v(" "),
        _vm.slideCounter && _vm.hasNavigation
          ? _c(
              "div",
              {
                staticClass:
                  "px-4 pt-3 w-full tracking-wider text-center text-gray-700"
              },
              [
                _c("span", {}, [
                  _vm._v(
                    _vm._s(_vm.activeSlide + 1) +
                      " / " +
                      _vm._s(_vm.slides.length)
                  )
                ])
              ]
            )
          : _vm._e()
      ])
    : _vm._e()
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/ImageSlideShow.vue":
/*!****************************************************!*\
  !*** ./resources/js/components/ImageSlideShow.vue ***!
  \****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ImageSlideShow_vue_vue_type_template_id_5b69b2de___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ImageSlideShow.vue?vue&type=template&id=5b69b2de& */ "./resources/js/components/ImageSlideShow.vue?vue&type=template&id=5b69b2de&");
/* harmony import */ var _ImageSlideShow_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./ImageSlideShow.vue?vue&type=script&lang=js& */ "./resources/js/components/ImageSlideShow.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _ImageSlideShow_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _ImageSlideShow_vue_vue_type_template_id_5b69b2de___WEBPACK_IMPORTED_MODULE_0__["render"],
  _ImageSlideShow_vue_vue_type_template_id_5b69b2de___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/ImageSlideShow.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/ImageSlideShow.vue?vue&type=script&lang=js&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/ImageSlideShow.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageSlideShow_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./ImageSlideShow.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ImageSlideShow.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageSlideShow_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/ImageSlideShow.vue?vue&type=template&id=5b69b2de&":
/*!***********************************************************************************!*\
  !*** ./resources/js/components/ImageSlideShow.vue?vue&type=template&id=5b69b2de& ***!
  \***********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageSlideShow_vue_vue_type_template_id_5b69b2de___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./ImageSlideShow.vue?vue&type=template&id=5b69b2de& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/ImageSlideShow.vue?vue&type=template&id=5b69b2de&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageSlideShow_vue_vue_type_template_id_5b69b2de___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_ImageSlideShow_vue_vue_type_template_id_5b69b2de___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);