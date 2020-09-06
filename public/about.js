(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["about"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Viewpro.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Viewpro.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

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
  data: function data() {
    return {
      producto: Object,
      fotos: [],
      url: '',
      message: 'Añadir al carrito',
      carrito: [],
      cantidad: 1
    };
  },
  methods: {
    getFotopro: function getFotopro(profo) {
      var foto = "/img/producto/" + profo; //console.log(foto);

      return foto;
    },
    mosFoto: function mosFoto(idfo) {
      var imagen = '';
      this.fotos.map(function (data) {
        if (data.id == idfo) {
          imagen = data.imagen;
        }
      });
      this.url = this.getFotopro(imagen);
      return this.getFotopro(imagen);
    },
    getFotocate: function getFotocate() {
      var foto = '';

      if (!this.url) {
        this.fotos.map(function (data) {
          if (data.favorito == true) {
            foto = data.imagen;
          }
        });
        return this.getFotopro(foto);
      } else {
        foto = this.url;
        return foto;
      }
    },
    loadPro: function loadPro() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var resul;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.next = 2;
                return axios.get("/api/viewpro/".concat(_this.$route.params.slug));

              case 2:
                resul = _context.sent;
                //console.log(resul);
                _this.producto = resul.data.data;
                _this.fotos = _this.producto.fotos;

              case 5:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    addToCart: function addToCart(producto) {
      var _this2 = this;

      axios({
        method: 'POST',
        url: '/producto_detalles',
        data: {
          producto_id: this.producto.id,
          cantidad: this.cantidad
        },
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json'
        }
      }).then(function () {
        _this2.carrito.push(producto);

        swal.fire('Producto agregado!', 'Puede verlo en el carrito de compras.', 'success');
        window.store.commit("increment");
      });
    },
    estaEnCarrito: function estaEnCarrito(producto) {
      var item = this.carrito.find(function (item) {
        return item.id === producto.id;
      });

      if (item) {
        return true;
      }

      return false;
    },
    goBack: function goBack() {
      window.history.length > 1 ? this.$router.go(-1) : this.$router.push('/');
    }
  },
  created: function created() {
    var _this3 = this;

    this.loadPro();
    Fire.$on('AfterCreate', function () {
      _this3.loadPro();
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Viewpro.vue?vue&type=template&id=61392f4d&":
/*!**********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Viewpro.vue?vue&type=template&id=61392f4d& ***!
  \**********************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "product-page" }, [
    _c("div", { staticClass: "container" }, [
      _c(
        "div",
        {
          staticClass: "main main-raised main-product",
          staticStyle: { margin: "-10vh 0px 0px" }
        },
        [
          _c("div", { staticClass: "row" }, [
            _c("div", { staticClass: "col-md-6 col-sm-6" }, [
              _c("div", { staticClass: "tab-content" }, [
                _c("img", {
                  staticClass: " img-rounded",
                  staticStyle: { "background-color": "#fff" },
                  attrs: { src: _vm.getFotocate(), alt: "Foto Usuario" }
                })
              ]),
              _vm._v(" "),
              _c(
                "ul",
                {
                  staticClass: "navbar flexi-nav list-inline",
                  staticStyle: {
                    "box-shadow": "none",
                    "background-color": "rgba(233, 32, 99, 0.46)",
                    "border-radius": "30px"
                  },
                  attrs: { role: "tablist", id: "flexiselDemo1" }
                },
                _vm._l(_vm.fotos, function(foto, index) {
                  return _c("li", { key: foto.id }, [
                    _c(
                      "a",
                      {
                        staticStyle: { "border-color": "none" },
                        attrs: {
                          role: "tab",
                          "data-toggle": "tab",
                          "aria-expanded": "false"
                        }
                      },
                      [
                        _c("img", {
                          staticStyle: { "max-width": "70px" },
                          attrs: {
                            src: _vm.getFotopro(foto.imagen),
                            alt: "Producto foto"
                          },
                          on: {
                            click: function($event) {
                              $event.preventDefault()
                              return _vm.mosFoto(foto.id)
                            }
                          }
                        })
                      ]
                    )
                  ])
                }),
                0
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-md-6 col-sm-6" }, [
              _c("h2", { staticClass: "title text-center" }, [
                _vm._v(" " + _vm._s(_vm.producto.nombre) + " ")
              ]),
              _vm._v(" "),
              _c(
                "h3",
                {
                  staticClass: "main-price",
                  staticStyle: { "margin-bottom": "5px" }
                },
                [
                  _c("b", [_vm._v("Precio:")]),
                  _vm._v(" "),
                  _c("span", { staticClass: "text-rose" }, [
                    _vm._v(_vm._s(_vm.producto.precio))
                  ]),
                  _vm._v(" "),
                  _c("b", [_vm._v("Bs.")])
                ]
              ),
              _vm._v(" "),
              _c("small", { staticClass: "text-muted" }, [
                _c("b", [_vm._v("Código:")]),
                _vm._v(" " + _vm._s(_vm.producto.codigo))
              ]),
              _vm._v(" "),
              _c("div", { attrs: { id: "acordeon" } }, [
                _c(
                  "div",
                  { staticClass: "panel-group", attrs: { id: "accordion" } },
                  [
                    _c(
                      "div",
                      { staticClass: "panel panel-border panel-rose" },
                      [
                        _vm._m(0),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "panel-collapse collapse in",
                            attrs: { id: "collapseOne" }
                          },
                          [
                            _c(
                              "div",
                              { staticClass: "panel-body text-justify" },
                              [
                                _c("b", [
                                  _vm._v(_vm._s(_vm.producto.descripcion))
                                ])
                              ]
                            )
                          ]
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _vm.producto.prodetalle
                      ? _c(
                          "div",
                          { staticClass: "panel panel-border panel-default" },
                          [
                            _vm._m(1),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                staticClass: "panel-collapse collapse",
                                attrs: { id: "collapseTwo" }
                              },
                              [
                                _c(
                                  "div",
                                  {
                                    staticClass: "panel-body",
                                    staticStyle: { "padding-left": "30px" }
                                  },
                                  [
                                    _c(
                                      "h6",
                                      {
                                        directives: [
                                          {
                                            name: "show",
                                            rawName: "v-show",
                                            value:
                                              _vm.producto.prodetalle.entrada,
                                            expression:
                                              "producto.prodetalle.entrada"
                                          }
                                        ]
                                      },
                                      [
                                        _c("b", [_vm._v("Entrada:")]),
                                        _vm._v(
                                          " " +
                                            _vm._s(
                                              _vm.producto.prodetalle.entrada
                                            )
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "h6",
                                      {
                                        directives: [
                                          {
                                            name: "show",
                                            rawName: "v-show",
                                            value: _vm.producto.prodetalle.sopa,
                                            expression:
                                              "producto.prodetalle.sopa"
                                          }
                                        ]
                                      },
                                      [
                                        _c("b", [_vm._v("Sopa:")]),
                                        _vm._v(
                                          " " +
                                            _vm._s(_vm.producto.prodetalle.sopa)
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "h6",
                                      {
                                        directives: [
                                          {
                                            name: "show",
                                            rawName: "v-show",
                                            value:
                                              _vm.producto.prodetalle.segundo,
                                            expression:
                                              "producto.prodetalle.segundo"
                                          }
                                        ]
                                      },
                                      [
                                        _c("b", [_vm._v("Segundo:")]),
                                        _vm._v(
                                          " " +
                                            _vm._s(
                                              _vm.producto.prodetalle.segundo
                                            )
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "h6",
                                      {
                                        directives: [
                                          {
                                            name: "show",
                                            rawName: "v-show",
                                            value:
                                              _vm.producto.prodetalle.refresco,
                                            expression:
                                              "producto.prodetalle.refresco"
                                          }
                                        ]
                                      },
                                      [
                                        _c("b", [_vm._v("Refresco:")]),
                                        _vm._v(
                                          " " +
                                            _vm._s(
                                              _vm.producto.prodetalle.refresco
                                            )
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "h6",
                                      {
                                        directives: [
                                          {
                                            name: "show",
                                            rawName: "v-show",
                                            value:
                                              _vm.producto.prodetalle.postre,
                                            expression:
                                              "producto.prodetalle.postre"
                                          }
                                        ]
                                      },
                                      [
                                        _c("b", [_vm._v("Postre:")]),
                                        _vm._v(
                                          " " +
                                            _vm._s(
                                              _vm.producto.prodetalle.postre
                                            )
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ]
                            )
                          ]
                        )
                      : _vm._e(),
                    _vm._v(" "),
                    _vm.producto.descuento
                      ? _c(
                          "div",
                          { staticClass: "panel panel-border panel-default" },
                          [
                            _vm._m(2),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                staticClass: "panel-collapse collapse",
                                attrs: { id: "collapseTwoo" }
                              },
                              [
                                _c(
                                  "div",
                                  { staticClass: "panel-body text-justify" },
                                  [
                                    _c("b", [
                                      _vm._v("Este producto tiene un "),
                                      _c("span", { staticClass: "text-rose" }, [
                                        _vm._v(
                                          " " +
                                            _vm._s(_vm.producto.descuento) +
                                            "% "
                                        )
                                      ]),
                                      _vm._v(
                                        " de descuendo, a partir de una cantidad mayor a " +
                                          _vm._s(_vm.producto.actides) +
                                          " productos."
                                      )
                                    ])
                                  ]
                                )
                              ]
                            )
                          ]
                        )
                      : _vm._e(),
                    _vm._v(" "),
                    _vm.producto.oferta
                      ? _c(
                          "div",
                          { staticClass: "panel panel-border panel-default" },
                          [
                            _vm._m(3),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                staticClass: "panel-collapse collapse",
                                attrs: { id: "collapseThree" }
                              },
                              [
                                _c(
                                  "div",
                                  { staticClass: "panel-body text-justify" },
                                  [
                                    _c("b", [
                                      _vm._v(_vm._s(_vm.producto.oferta))
                                    ])
                                  ]
                                )
                              ]
                            )
                          ]
                        )
                      : _vm._e()
                  ]
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "row pick-size" }, [
                _c("div", { staticClass: "col-md-6 col-sm-6" }, [
                  _c("b", [
                    _c("span", { staticClass: "text-rose" }, [
                      _vm._v("Stock: ")
                    ]),
                    _vm._v(_vm._s(_vm.producto.stock) + " ")
                  ])
                ]),
                _vm._v(" "),
                _vm.producto.cant_personas
                  ? _c("div", { staticClass: "col-md-6 col-sm-6" }, [
                      _c("b", [
                        _c("span", { staticClass: "text-rose" }, [
                          _vm._v("Cantidad-Personas: ")
                        ]),
                        _vm._v(_vm._s(_vm.producto.cant_personas) + " ")
                      ])
                    ])
                  : _vm._e()
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "row text-center" }, [
                _c("div", { staticClass: "form-group" }, [
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-default  btn-round",
                      attrs: { type: "button" },
                      on: {
                        click: function($event) {
                          return _vm.goBack()
                        }
                      }
                    },
                    [
                      _vm._v(
                        "\n\t\t\t            \t\tAtrás\n\t\t\t            \t"
                      )
                    ]
                  ),
                  _vm._v(" "),
                  _vm.producto.estado
                    ? _c("span", [
                        _c(
                          "button",
                          {
                            staticClass: "btn btn-round btn-rose ",
                            attrs: {
                              disabled: _vm.estaEnCarrito(_vm.producto)
                            },
                            on: {
                              click: function($event) {
                                return _vm.addToCart(_vm.producto)
                              }
                            }
                          },
                          [
                            !_vm.estaEnCarrito(_vm.producto)
                              ? _c("strong", [
                                  _vm._v(" " + _vm._s(_vm.message) + " ")
                                ])
                              : _c("strong", [_vm._v("Agregado")]),
                            _vm._v(" "),
                            _c("i", { staticClass: "material-icons" }, [
                              _vm._v("add_shopping_cart")
                            ])
                          ]
                        )
                      ])
                    : _c("span", [_vm._m(4)])
                ])
              ])
            ])
          ])
        ]
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "panel-heading",
        attrs: { role: "tab", id: "headingOne" }
      },
      [
        _c(
          "a",
          {
            attrs: {
              role: "button",
              "data-toggle": "collapse",
              "data-parent": "#accordion",
              href: "#collapseOne",
              "aria-expanded": "true",
              "aria-controls": "collapseOne"
            }
          },
          [
            _c("h4", { staticClass: "panel-title" }, [
              _c("span", { staticClass: "text-rose" }, [
                _c("b", [_vm._v(" Descripción ")])
              ]),
              _vm._v(" "),
              _c("i", { staticClass: "material-icons" }, [
                _vm._v("keyboard_arrow_down")
              ])
            ])
          ]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "panel-heading",
        attrs: { role: "tab", id: "headingOne" }
      },
      [
        _c(
          "a",
          {
            attrs: {
              role: "button",
              "data-toggle": "collapse",
              "data-parent": "#accordion",
              href: "#collapseTwo",
              "aria-controls": "collapseOne"
            }
          },
          [
            _c("h4", { staticClass: "panel-title" }, [
              _c("span", { staticClass: "text-rose" }, [
                _c("b", [_vm._v(" Menú ")])
              ]),
              _vm._v(" "),
              _c("i", { staticClass: "material-icons" }, [
                _vm._v("keyboard_arrow_down")
              ])
            ])
          ]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "panel-heading",
        attrs: { role: "tab", id: "headingOne" }
      },
      [
        _c(
          "a",
          {
            attrs: {
              role: "button",
              "data-toggle": "collapse",
              "data-parent": "#accordion",
              href: "#collapseTwoo",
              "aria-controls": "collapseOne"
            }
          },
          [
            _c("h4", { staticClass: "panel-title" }, [
              _c("span", { staticClass: "text-rose" }, [
                _c("b", [_vm._v(" Descuento ")])
              ]),
              _vm._v(" "),
              _c("i", { staticClass: "material-icons" }, [
                _vm._v("keyboard_arrow_down")
              ])
            ])
          ]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "panel-heading",
        attrs: { role: "tab", id: "headingOne" }
      },
      [
        _c(
          "a",
          {
            attrs: {
              role: "button",
              "data-toggle": "collapse",
              "data-parent": "#accordion",
              href: "#collapseThree",
              "aria-controls": "collapseOne"
            }
          },
          [
            _c("h4", { staticClass: "panel-title" }, [
              _c("span", { staticClass: "text-rose" }, [
                _c("b", [_vm._v(" Oferta ")])
              ]),
              _vm._v(" "),
              _c("i", { staticClass: "material-icons" }, [
                _vm._v("keyboard_arrow_down")
              ])
            ])
          ]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      { staticClass: "btn btn-round btn-rose ", attrs: { type: "button" } },
      [
        _c("b", [_vm._v("NO DISPONIBLE")]),
        _vm._v(" "),
        _c("i", { staticClass: "material-icons" }, [_vm._v("cancel")])
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/Viewpro.vue":
/*!*********************************************!*\
  !*** ./resources/js/components/Viewpro.vue ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Viewpro_vue_vue_type_template_id_61392f4d___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Viewpro.vue?vue&type=template&id=61392f4d& */ "./resources/js/components/Viewpro.vue?vue&type=template&id=61392f4d&");
/* harmony import */ var _Viewpro_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Viewpro.vue?vue&type=script&lang=js& */ "./resources/js/components/Viewpro.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Viewpro_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Viewpro_vue_vue_type_template_id_61392f4d___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Viewpro_vue_vue_type_template_id_61392f4d___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Viewpro.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Viewpro.vue?vue&type=script&lang=js&":
/*!**********************************************************************!*\
  !*** ./resources/js/components/Viewpro.vue?vue&type=script&lang=js& ***!
  \**********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Viewpro_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Viewpro.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Viewpro.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Viewpro_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Viewpro.vue?vue&type=template&id=61392f4d&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/Viewpro.vue?vue&type=template&id=61392f4d& ***!
  \****************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Viewpro_vue_vue_type_template_id_61392f4d___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Viewpro.vue?vue&type=template&id=61392f4d& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Viewpro.vue?vue&type=template&id=61392f4d&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Viewpro_vue_vue_type_template_id_61392f4d___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Viewpro_vue_vue_type_template_id_61392f4d___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);