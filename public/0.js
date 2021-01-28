(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[0],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Producto.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Producto.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************************************************************************************/
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
      editmode: false,
      productos: [],
      categorias: [],
      carrito: [],
      smsdescuento: '',
      form: new Form({
        id: '',
        nombre: '',
        codigo: '',
        descripcion: '',
        descuento: '',
        actides: '',
        precio: '',
        stock: '',
        cant_personas: '',
        estado: '',
        entrada: '',
        sopa: '',
        segundo: '',
        postre: '',
        oferta: '',
        refresco: '',
        especificacion: '',
        foto: '',
        categoria: ''
      })
    };
  },
  computed: {
    generardescuento: function generardescuento() {
      if (this.form.descuento > 100) {
        swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'No puedes poner un valor mayor a 100.'
        });
        this.form.descuento = 0; //this.form.descuento = (this.form.precio * this.form.descuento) /100;
        //this.form.precio = this.form.precio  - this.form.descuento;

        this.smsdescuento = 'Hay un descuento de ' + this.form.precio * this.form.descuento / 100 + ' Bs. Apartir de :';
        return this.smsdescuento;
      } else if (this.form.descuento < 0) {
        swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'No puedes poner un valor menor a 0.'
        });
        this.form.descuento = 0; //this.form.descuento = (this.form.precio * this.form.descuento) /100;
        //this.form.precio = this.form.precio - this.form.descuento;

        this.smsdescuento = '';
        return this.smsdescuento;
      } else if (this.form.descuento > 0) {
        //this.form.descuento = (this.form.precio * this.form.descuento) /100;
        //this.form.precio = this.form.precio - this.form.descuento;
        if (this.form.descuento == 100) {
          this.smsdescuento = 'Este producto tiene el 100% de descuento, por ende es gratis.';
        } else {
          this.smsdescuento = 'Hay un descuento de ' + this.form.precio * this.form.descuento / 100 + ' Bs. Apartir de :';
        }

        return this.smsdescuento;
      } else {
        //this.form.descuento = '';
        //this.form.precio = this.form.precio;
        this.smsdescuento = 'Sin descuento.';
        return this.smsdescuento;
      }
    }
  },
  methods: {
    getFoto: function getFoto(ufoto) {
      var foto = "img/producto/" + ufoto;
      return foto;
    },
    updatePro: function updatePro(id) {
      var _this = this;

      this.$Progress.start();
      this.form.put('api/productos/' + this.form.id).then(function () {
        $('#proModal').modal('hide');
        swal.fire('Actualizado!', 'La información del producto fue actualizada.', 'success');

        _this.$Progress.finish();

        Fire.$emit('AfterCreate');
      })["catch"](function () {
        swal.fire('Oops..!', 'Revisa los errores.', 'error');

        _this.$Progress.fail();
      });
    },
    editModal: function editModal(producto) {
      this.editmode = true;
      this.form.reset();
      $('#proModal').modal('show');
      this.form.fill(producto);
      this.form.categoria = producto.categoria.id;

      if ($(producto.prodetalle).length) {
        this.form.entrada = producto.prodetalle.entrada;
        this.form.sopa = producto.prodetalle.sopa;
        this.form.segundo = producto.prodetalle.segundo;
        this.form.postre = producto.prodetalle.postre;
        this.form.refresco = producto.prodetalle.refresco;
      }
    },
    modalPro: function modalPro() {
      this.editmode = false;
      this.form.reset();
      $('#proModal').modal('show');
    },
    deletePro: function deletePro(id) {
      var _this2 = this;

      swal.fire({
        title: '¿Estás seguro?',
        text: "Lo pondrás en NO DISPONIBLE?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Dar de baja!'
      }).then(function (result) {
        if (result.value) {
          _this2.form["delete"]('api/productos/' + id).then(function () {
            swal.fire('Deleted!', 'El producto fue dado de baja.', 'success');
            Fire.$emit('AfterCreate');
          })["catch"](function () {
            swal.fire('Failed!', 'Revisa algo salió mal.', 'warning');
          });
        }
      });
    },
    activoPro: function activoPro(id) {
      var _this3 = this;

      swal.fire({
        title: '¿Estás seguro?',
        text: "OK. Excelete...Activar!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, activar!'
      }).then(function (result) {
        if (result.value) {
          _this3.form.get('api/productos/' + id).then(function () {
            swal.fire('Excelente!', 'El producto.nombre fue activado.', 'success');
            Fire.$emit('AfterCreate');
          })["catch"](function () {
            swal.fire('Failed!', 'Revisa algo salió mal.', 'warning');
          });
        }
      });
    },
    actiAlmu: function actiAlmu(id) {
      var _this4 = this;

      swal.fire({
        title: '¿Estás seguro?',
        text: "Quieres activar este almuerzo?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, activar!'
      }).then(function (result) {
        if (result.value) {
          _this4.form.get('api/actialmuerzo/' + id).then(function () {
            swal.fire('Excelente!', 'El Almuerzo fue activado.', 'success');
            Fire.$emit('AfterCreate');
          })["catch"](function () {
            swal.fire('Failed!', 'Revisa algo salió mal.', 'warning');
          });
        }
      });
    },
    loadProductos: function loadProductos() {
      var _this5 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var resul, cat;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.next = 2;
                return axios.get('api/productos');

              case 2:
                resul = _context.sent;
                //console.log(resul);
                _this5.productos = resul.data.data; //console.log(this.users);

                _context.next = 6;
                return axios.get('api/categorias');

              case 6:
                cat = _context.sent;
                _this5.categorias = cat.data.data;

              case 8:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    createPro: function createPro() {
      var _this6 = this;

      this.$Progress.start();
      this.form.post('api/productos').then(function () {
        Fire.$emit('AfterCreate');
        $('#proModal').modal('hide');
        swal.fire({
          icon: 'success',
          title: 'Producto creado correctamente',
          showConfirmButton: false,
          timer: 2000
        });

        _this6.form.reset();

        _this6.$Progress.finish();
      })["catch"](function (error) {
        swal.fire('Oops...!', 'Revisa los errores.', 'error');

        _this6.$Progress.fail();

        console.log(error);
      });
    },
    proFoto: function proFoto(e) {
      var _this7 = this;

      //console.log('uploading...');
      var file = e.target.files[0];
      var reader = new FileReader();

      if (file) {
        if (file['size'] < 2111775) {
          reader.onloadend = function (file) {
            //console.log('RESULT', reader.result)
            _this7.form.foto = reader.result;
          };

          reader.readAsDataURL(file);
        } else {
          swal.fire('Oops...!', 'La imagen es demaciado grande!', 'error');
        }
      }
    }
  },
  created: function created() {
    var _this8 = this;

    this.loadProductos();
    Fire.$on('AfterCreate', function () {
      _this8.loadProductos();
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Producto.vue?vue&type=template&id=577b36cb&":
/*!***********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/Producto.vue?vue&type=template&id=577b36cb& ***!
  \***********************************************************************************************************************************************************************************************************/
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
  return _c("div", [
    _c("div", { staticClass: "container" }, [
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-md-12 panel-center" }, [
          _c("div", { staticClass: "card-body" }, [
            _c("div", { staticClass: "card card-nav-tabs shadow" }, [
              _c("div", { staticClass: "header header-rose" }, [
                _c("div", { staticClass: "nav-tabs-navigation" }, [
                  _c("div", { staticClass: "nav-tabs-wrapper" }, [
                    _c(
                      "ul",
                      {
                        staticClass: "nav nav-tabs ulcenter",
                        attrs: { "data-tabs": "tabs" }
                      },
                      [
                        _vm._m(0),
                        _vm._v(" "),
                        _c("li", [
                          _c(
                            "a",
                            {
                              attrs: { "data-toggle": "tab" },
                              on: { click: _vm.modalPro }
                            },
                            [
                              _c("i", { staticClass: "material-icons" }, [
                                _vm._v("add")
                              ]),
                              _vm._v(
                                "\n\t\t\t\t\t\t\t\t\t\t\tNUEVO PRODUCTOS\n\t\t\t\t\t\t\t\t\t\t"
                              )
                            ]
                          )
                        ])
                      ]
                    )
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "card-content" }, [
                _c("div", { staticClass: "tab-content text-center" }, [
                  _c(
                    "div",
                    { staticClass: "tab-pane active", attrs: { id: "lista" } },
                    [
                      _c("div", { staticClass: "table-responsive" }, [
                        _c("table", { staticClass: "table" }, [
                          _vm._m(1),
                          _vm._v(" "),
                          _c(
                            "tbody",
                            _vm._l(_vm.productos, function(producto, index) {
                              return _c("tr", { key: producto.id }, [
                                _c("td", {
                                  domProps: { textContent: _vm._s(producto.id) }
                                }),
                                _vm._v(" "),
                                _c(
                                  "td",
                                  {
                                    staticClass:
                                      "td-usertable col-md-5 col-xs-4"
                                  },
                                  [
                                    _c(
                                      "div",
                                      {
                                        staticClass: "media text-left",
                                        staticStyle: {
                                          display: "flex !important",
                                          "align-items": "center !important"
                                        }
                                      },
                                      [
                                        _c(
                                          "a",
                                          {
                                            staticClass:
                                              "pull-left td-usertable"
                                          },
                                          [
                                            _c(
                                              "div",
                                              { staticClass: "listcategoria" },
                                              [
                                                _vm._l(producto.fotos, function(
                                                  foto
                                                ) {
                                                  return _c(
                                                    "span",
                                                    {
                                                      directives: [
                                                        {
                                                          name: "show",
                                                          rawName: "v-show",
                                                          value:
                                                            producto.fotos
                                                              .length > 0,
                                                          expression:
                                                            "producto.fotos.length>0"
                                                        }
                                                      ],
                                                      key: foto.id
                                                    },
                                                    [
                                                      foto.favorito
                                                        ? _c("img", {
                                                            staticClass:
                                                              "img img-raised ",
                                                            staticStyle: {
                                                              height: "100%"
                                                            },
                                                            attrs: {
                                                              src: _vm.getFoto(
                                                                foto.imagen
                                                              ),
                                                              alt:
                                                                "Producto foto"
                                                            }
                                                          })
                                                        : _vm._e()
                                                    ]
                                                  )
                                                }),
                                                _vm._v(" "),
                                                _c(
                                                  "span",
                                                  {
                                                    directives: [
                                                      {
                                                        name: "show",
                                                        rawName: "v-show",
                                                        value:
                                                          !producto.fotos
                                                            .length > 0,
                                                        expression:
                                                          "!producto.fotos.length>0"
                                                      }
                                                    ],
                                                    staticClass: "listcategoria"
                                                  },
                                                  [
                                                    _c("img", {
                                                      staticClass:
                                                        "img img-raised ",
                                                      staticStyle: {
                                                        height: "100%"
                                                      },
                                                      attrs: {
                                                        src:
                                                          "/img/producto/panal1.png",
                                                        alt: "Producto foto"
                                                      }
                                                    })
                                                  ]
                                                )
                                              ],
                                              2
                                            )
                                          ]
                                        ),
                                        _vm._v(" "),
                                        _c(
                                          "div",
                                          {
                                            staticClass: "media-body",
                                            staticStyle: {
                                              width: "auto !important"
                                            }
                                          },
                                          [
                                            _c(
                                              "h6",
                                              { staticClass: "media-heading" },
                                              [
                                                _vm._v(
                                                  "\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t" +
                                                    _vm._s(producto.nombre) +
                                                    "\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t"
                                                ),
                                                _c("small", [
                                                  _vm._v(" * "),
                                                  _c(
                                                    "span",
                                                    {
                                                      staticClass:
                                                        "media-heading"
                                                    },
                                                    [_vm._v("Código:")]
                                                  ),
                                                  _vm._v(
                                                    "  " +
                                                      _vm._s(producto.codigo)
                                                  )
                                                ])
                                              ]
                                            ),
                                            _vm._v(" "),
                                            _c("p", {
                                              staticClass: "usertable",
                                              domProps: {
                                                textContent: _vm._s(
                                                  producto.descripcion
                                                )
                                              }
                                            }),
                                            _vm._v(" "),
                                            _c(
                                              "h6",
                                              {
                                                staticClass:
                                                  "media-heading productlist"
                                              },
                                              [
                                                _vm._v(
                                                  "\n\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tStock\n\t\t\t\t                                \t\t\t\t"
                                                ),
                                                _c("small", [
                                                  _vm._v(
                                                    ": " +
                                                      _vm._s(producto.stock)
                                                  )
                                                ]),
                                                _vm._v(
                                                  " Unid.\n\t\t\t\t                                \t\t\t\t"
                                                ),
                                                _c(
                                                  "span",
                                                  {
                                                    directives: [
                                                      {
                                                        name: "show",
                                                        rawName: "v-show",
                                                        value:
                                                          producto.cant_personas,
                                                        expression:
                                                          "producto.cant_personas"
                                                      }
                                                    ]
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n\t\t\t\t                                \t\t\t\t\t* Num. Personas:\n\t\t\t\t                                \t\t\t\t\t"
                                                    ),
                                                    _c("small", [
                                                      _vm._v(
                                                        ": " +
                                                          _vm._s(
                                                            producto.cant_personas
                                                          )
                                                      )
                                                    ])
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "button",
                                                  {
                                                    staticClass:
                                                      "btn btn-default btn-xs productcate"
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n\t\t\t\t                                \t\t\t\t\t" +
                                                        _vm._s(
                                                          producto.categoria
                                                            .nombre
                                                        ) +
                                                        "\n\t\t\t\t                                \t\t\t\t"
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "span",
                                                  {
                                                    directives: [
                                                      {
                                                        name: "show",
                                                        rawName: "v-show",
                                                        value:
                                                          producto.prodetalle,
                                                        expression:
                                                          "producto.prodetalle"
                                                      }
                                                    ]
                                                  },
                                                  [
                                                    _c(
                                                      "button",
                                                      {
                                                        staticClass:
                                                          "btn btn-warning btn-xs productcate",
                                                        attrs: {
                                                          type: "button"
                                                        },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            return _vm.actiAlmu(
                                                              producto.id
                                                            )
                                                          }
                                                        }
                                                      },
                                                      [
                                                        _vm._v(
                                                          "\n\t\t\t\t\t                                \t\t\t\t\tactivar\n\t\t\t\t\t                                \t\t\t\t"
                                                        )
                                                      ]
                                                    )
                                                  ]
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            producto.descuento
                                              ? _c(
                                                  "h6",
                                                  {
                                                    staticClass:
                                                      "media-heading productlist"
                                                  },
                                                  [
                                                    _vm._v(
                                                      "\n\t\t\t\t                                \t\t\t\tDescuento: Del\n\t\t\t\t                                \t\t\t\t"
                                                    ),
                                                    _c(
                                                      "button",
                                                      {
                                                        staticClass:
                                                          "btn btn-warning btn-xs productcate"
                                                      },
                                                      [
                                                        _vm._v(
                                                          "\n\t\t\t\t                                \t\t\t\t   " +
                                                            _vm._s(
                                                              producto.descuento
                                                            ) +
                                                            " %\n\t\t\t\t                                \t\t\t\t"
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(
                                                      " A partir de :\n\t\t\t\t                                \t\t\t\t"
                                                    ),
                                                    _c("small", [
                                                      _vm._v(
                                                        " " +
                                                          _vm._s(
                                                            producto.actides
                                                          ) +
                                                          " "
                                                      )
                                                    ]),
                                                    _vm._v(
                                                      " Unids.\n\t\t\t\t                                \t\t\t"
                                                    )
                                                  ]
                                                )
                                              : _vm._e()
                                          ]
                                        )
                                      ]
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "td",
                                  {
                                    staticClass:
                                      "text-center text-default col-md-1 col-xs-1"
                                  },
                                  [
                                    _c(
                                      "h6",
                                      {
                                        staticClass: "media-heading productlist"
                                      },
                                      [
                                        _vm._v(
                                          "\n\t\t\t\t\t\t\t\t\t\t\t\t\t\tBs.\n\t\t                                \t\t\t\t"
                                        ),
                                        _c("small", [
                                          _vm._v(": " + _vm._s(producto.precio))
                                        ]),
                                        _vm._v(
                                          " Unid.\n\t\t                                \t\t\t"
                                        )
                                      ]
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "td",
                                  {
                                    staticClass:
                                      "text-center text-warning col-md-1 col-xs-1"
                                  },
                                  [
                                    _c("b", [
                                      _vm._v(
                                        _vm._s(
                                          producto.estado ? "ACTIVO" : "AGOTADO"
                                        )
                                      )
                                    ]),
                                    _vm._v(" "),
                                    _c(
                                      "router-link",
                                      {
                                        attrs: {
                                          to: {
                                            name: "verpro",
                                            params: { slug: producto.slug }
                                          }
                                        }
                                      },
                                      [
                                        _c(
                                          "button",
                                          {
                                            staticClass:
                                              "btn btn-rose btn-xs btn-round",
                                            attrs: { type: "button" }
                                          },
                                          [_vm._v(" Detalles ")]
                                        )
                                      ]
                                    )
                                  ],
                                  1
                                ),
                                _vm._v(" "),
                                _c(
                                  "td",
                                  {
                                    staticClass:
                                      "card-content text-center col-md-3 col-xs-4",
                                    staticStyle: {
                                      position: "relative !important"
                                    }
                                  },
                                  [
                                    producto.estado
                                      ? _c(
                                          "span",
                                          [
                                            _c("add-producto-btn", {
                                              attrs: {
                                                product: producto,
                                                carri: _vm.carrito
                                              }
                                            })
                                          ],
                                          1
                                        )
                                      : _c(
                                          "span",
                                          { staticClass: "text-center" },
                                          [_vm._m(2, true)]
                                        )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "td",
                                  {
                                    staticClass:
                                      "td-actions text-center col-md-2 col-xs-2"
                                  },
                                  [
                                    _c(
                                      "a",
                                      {
                                        staticClass: "btn btn-success",
                                        attrs: {
                                          href: "#",
                                          rel: "tooltip",
                                          "data-original-title": "",
                                          title: "Editar Usuario"
                                        },
                                        on: {
                                          click: function($event) {
                                            return _vm.editModal(producto)
                                          }
                                        }
                                      },
                                      [
                                        _c(
                                          "i",
                                          { staticClass: "material-icons" },
                                          [_vm._v("edit")]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "a",
                                      {
                                        directives: [
                                          {
                                            name: "show",
                                            rawName: "v-show",
                                            value: producto.estado,
                                            expression: "producto.estado"
                                          }
                                        ],
                                        staticClass: "btn btn-danger",
                                        attrs: {
                                          href: "#",
                                          "data-original-title": "",
                                          title: "Dar de Baja"
                                        },
                                        on: {
                                          click: function($event) {
                                            return _vm.deletePro(producto.id)
                                          }
                                        }
                                      },
                                      [
                                        _c(
                                          "i",
                                          { staticClass: "material-icons" },
                                          [_vm._v("close")]
                                        )
                                      ]
                                    ),
                                    _vm._v(" "),
                                    _c(
                                      "a",
                                      {
                                        directives: [
                                          {
                                            name: "show",
                                            rawName: "v-show",
                                            value: !producto.estado,
                                            expression: "!producto.estado"
                                          }
                                        ],
                                        staticClass: "btn btn-warning",
                                        attrs: {
                                          href: "#",
                                          "data-original-title": "",
                                          title: "Activar producto"
                                        },
                                        on: {
                                          click: function($event) {
                                            return _vm.activoPro(producto.id)
                                          }
                                        }
                                      },
                                      [
                                        _c(
                                          "i",
                                          { staticClass: "material-icons" },
                                          [_vm._v("done")]
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ])
                            }),
                            0
                          )
                        ])
                      ])
                    ]
                  )
                ])
              ])
            ])
          ])
        ])
      ])
    ]),
    _vm._v(" "),
    _c(
      "div",
      {
        staticClass: "modal fade",
        attrs: {
          id: "proModal",
          tabindex: "-1",
          role: "dialog",
          "aria-labelledby": "myModalLabel",
          "aria-hidden": "true"
        }
      },
      [
        _c("div", { staticClass: "modal-dialog modal-lg" }, [
          _c("div", { staticClass: "modal-content" }, [
            _c("div", { staticClass: "modal-header" }, [
              _vm._m(3),
              _vm._v(" "),
              _c(
                "h2",
                {
                  directives: [
                    {
                      name: "show",
                      rawName: "v-show",
                      value: !_vm.editmode,
                      expression: "!editmode"
                    }
                  ],
                  staticClass: "modal-title card-title text-center",
                  attrs: { id: "myModalLabel" }
                },
                [_vm._v("NUEVO PRODUCTO")]
              ),
              _vm._v(" "),
              _c(
                "h2",
                {
                  directives: [
                    {
                      name: "show",
                      rawName: "v-show",
                      value: _vm.editmode,
                      expression: "editmode"
                    }
                  ],
                  staticClass: "modal-title card-title text-center",
                  attrs: { id: "myModalLabel" }
                },
                [_vm._v("EDITAR PRODUCTO")]
              ),
              _vm._v(" "),
              _vm._m(4)
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "modal-body" }, [
              _c("div", { staticClass: "tab-content" }, [
                _c(
                  "form",
                  {
                    on: {
                      submit: function($event) {
                        $event.preventDefault()
                        _vm.editmode ? _vm.updatePro() : _vm.createPro()
                      }
                    }
                  },
                  [
                    _c("div", { staticClass: "row" }, [
                      _c("div", { staticClass: "col-md-8" }, [
                        _c("div", { staticClass: "row" }, [
                          _c("div", { staticClass: "col-md-6" }, [
                            _c(
                              "div",
                              {
                                staticClass: "input-group",
                                class: {
                                  "has-error ": _vm.form.errors.has("categoria")
                                }
                              },
                              [
                                _vm._m(5),
                                _vm._v(" "),
                                _c("div", { staticClass: "form-group" }, [
                                  _c(
                                    "select",
                                    {
                                      directives: [
                                        {
                                          name: "model",
                                          rawName: "v-model",
                                          value: _vm.form.categoria,
                                          expression: "form.categoria"
                                        }
                                      ],
                                      staticClass: "form-control",
                                      attrs: {
                                        "data-style": "btn btn-rose btn-round",
                                        title: "Categoria",
                                        "data-size": "7",
                                        tabindex: "-98"
                                      },
                                      on: {
                                        change: function($event) {
                                          var $$selectedVal = Array.prototype.filter
                                            .call(
                                              $event.target.options,
                                              function(o) {
                                                return o.selected
                                              }
                                            )
                                            .map(function(o) {
                                              var val =
                                                "_value" in o
                                                  ? o._value
                                                  : o.value
                                              return val
                                            })
                                          _vm.$set(
                                            _vm.form,
                                            "categoria",
                                            $event.target.multiple
                                              ? $$selectedVal
                                              : $$selectedVal[0]
                                          )
                                        }
                                      }
                                    },
                                    [
                                      _c(
                                        "option",
                                        {
                                          staticClass: "bs-title-option",
                                          attrs: { value: "" }
                                        },
                                        [_vm._v("Seleccione una categoría")]
                                      ),
                                      _vm._v(" "),
                                      _vm._l(_vm.categorias, function(
                                        categoria
                                      ) {
                                        return _c(
                                          "option",
                                          { domProps: { value: categoria.id } },
                                          [_vm._v(_vm._s(categoria.nombre))]
                                        )
                                      })
                                    ],
                                    2
                                  )
                                ]),
                                _vm._v(" "),
                                _c("has-error", {
                                  attrs: { form: _vm.form, field: "categoria" }
                                })
                              ],
                              1
                            )
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "col-md-6" }, [
                            _c("div", { staticClass: "input-group" }, [
                              _vm._m(6),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "form-group is-empty",
                                  class: {
                                    "has-error is-focused": _vm.form.errors.has(
                                      "nombre"
                                    )
                                  }
                                },
                                [
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model.trim",
                                        value: _vm.form.nombre,
                                        expression: "form.nombre",
                                        modifiers: { trim: true }
                                      }
                                    ],
                                    staticClass: "form-control",
                                    attrs: {
                                      type: "text",
                                      name: "nombre",
                                      placeholder: "Nombre del producto"
                                    },
                                    domProps: { value: _vm.form.nombre },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.form,
                                          "nombre",
                                          $event.target.value.trim()
                                        )
                                      },
                                      blur: function($event) {
                                        return _vm.$forceUpdate()
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c("span", { staticClass: "material-input" }),
                                  _vm._v(" "),
                                  _c("has-error", {
                                    attrs: { form: _vm.form, field: "nombre" }
                                  })
                                ],
                                1
                              )
                            ])
                          ])
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "row" }, [
                          _c("div", { staticClass: "col-md-4" }, [
                            _c("div", { staticClass: "input-group" }, [
                              _vm._m(7),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "form-group is-empty",
                                  class: {
                                    "has-error is-focused": _vm.form.errors.has(
                                      "precio"
                                    )
                                  }
                                },
                                [
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model.number",
                                        value: _vm.form.precio,
                                        expression: "form.precio",
                                        modifiers: { number: true }
                                      }
                                    ],
                                    staticClass: "form-control",
                                    attrs: {
                                      type: "number",
                                      step: "0.01",
                                      name: "precio",
                                      placeholder: "Precio del producto."
                                    },
                                    domProps: { value: _vm.form.precio },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.form,
                                          "precio",
                                          _vm._n($event.target.value)
                                        )
                                      },
                                      blur: function($event) {
                                        return _vm.$forceUpdate()
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c("span", { staticClass: "material-input" }),
                                  _vm._v(" "),
                                  _c("has-error", {
                                    attrs: { form: _vm.form, field: "precio" }
                                  })
                                ],
                                1
                              )
                            ])
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "col-md-4" }, [
                            _c("div", { staticClass: "input-group" }, [
                              _vm._m(8),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "form-group is-empty",
                                  class: {
                                    "has-error is-focused": _vm.form.errors.has(
                                      "stock"
                                    )
                                  }
                                },
                                [
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model.number",
                                        value: _vm.form.stock,
                                        expression: "form.stock",
                                        modifiers: { number: true }
                                      }
                                    ],
                                    staticClass: "form-control",
                                    attrs: {
                                      type: "number",
                                      name: "stock",
                                      placeholder: "Stock del producto."
                                    },
                                    domProps: { value: _vm.form.stock },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.form,
                                          "stock",
                                          _vm._n($event.target.value)
                                        )
                                      },
                                      blur: function($event) {
                                        return _vm.$forceUpdate()
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _c("span", { staticClass: "material-input" }),
                                  _vm._v(" "),
                                  _c("has-error", {
                                    attrs: { form: _vm.form, field: "stock" }
                                  })
                                ],
                                1
                              )
                            ])
                          ]),
                          _vm._v(" "),
                          _c("div", { staticClass: "col-md-4" }, [
                            _c(
                              "div",
                              { staticClass: "input-group" },
                              [
                                _vm._m(9),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model.number",
                                      value: _vm.form.cant_personas,
                                      expression: "form.cant_personas",
                                      modifiers: { number: true }
                                    }
                                  ],
                                  staticClass: "form-control",
                                  attrs: {
                                    type: "number",
                                    name: "cant_personas",
                                    placeholder: "Cant. personas."
                                  },
                                  domProps: { value: _vm.form.cant_personas },
                                  on: {
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.form,
                                        "cant_personas",
                                        _vm._n($event.target.value)
                                      )
                                    },
                                    blur: function($event) {
                                      return _vm.$forceUpdate()
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _c("has-error", {
                                  attrs: {
                                    form: _vm.form,
                                    field: "cant_personas"
                                  }
                                })
                              ],
                              1
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "input-group" }, [
                          _vm._m(10),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "form-group is-empty",
                              class: {
                                "has-error is-focused": _vm.form.errors.has(
                                  "descripcion"
                                )
                              }
                            },
                            [
                              _c("textarea", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model.trim",
                                    value: _vm.form.descripcion,
                                    expression: "form.descripcion",
                                    modifiers: { trim: true }
                                  }
                                ],
                                staticClass: "form-control",
                                attrs: {
                                  placeholder: "Descripción del producto.",
                                  rows: "2",
                                  name: "descripcion"
                                },
                                domProps: { value: _vm.form.descripcion },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.form,
                                      "descripcion",
                                      $event.target.value.trim()
                                    )
                                  },
                                  blur: function($event) {
                                    return _vm.$forceUpdate()
                                  }
                                }
                              }),
                              _vm._v(" "),
                              _c("span", { staticClass: "material-input" }),
                              _vm._v(" "),
                              _c("has-error", {
                                attrs: { form: _vm.form, field: "descripcion" }
                              })
                            ],
                            1
                          ),
                          _vm._v(" "),
                          _vm._m(11),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "form-group is-empty",
                              class: {
                                "has-error is-focused": _vm.form.errors.has(
                                  "oferta"
                                )
                              }
                            },
                            [
                              _c("textarea", {
                                directives: [
                                  {
                                    name: "model",
                                    rawName: "v-model.trim",
                                    value: _vm.form.oferta,
                                    expression: "form.oferta",
                                    modifiers: { trim: true }
                                  }
                                ],
                                staticClass: "form-control",
                                attrs: {
                                  placeholder:
                                    "Oferta del producto. Ejm.: más de 3 platos una soda gratis.",
                                  rows: "2",
                                  name: "oferta"
                                },
                                domProps: { value: _vm.form.oferta },
                                on: {
                                  input: function($event) {
                                    if ($event.target.composing) {
                                      return
                                    }
                                    _vm.$set(
                                      _vm.form,
                                      "oferta",
                                      $event.target.value.trim()
                                    )
                                  },
                                  blur: function($event) {
                                    return _vm.$forceUpdate()
                                  }
                                }
                              }),
                              _vm._v(" "),
                              _c("span", { staticClass: "material-input" }),
                              _vm._v(" "),
                              _c("has-error", {
                                attrs: { form: _vm.form, field: "oferta" }
                              })
                            ],
                            1
                          )
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "row" }, [
                          _c("div", { staticClass: "col-md-4" }, [
                            _c(
                              "div",
                              { staticClass: "input-group" },
                              [
                                _vm._m(12),
                                _vm._v(" "),
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model.number",
                                      value: _vm.form.descuento,
                                      expression: "form.descuento",
                                      modifiers: { number: true }
                                    }
                                  ],
                                  staticClass: "form-control",
                                  attrs: {
                                    type: "number",
                                    step: "any",
                                    min: "0",
                                    max: "100",
                                    value: "0",
                                    name: "descuento",
                                    id: "descuento",
                                    placeholder: "Porcentaje del descuento."
                                  },
                                  domProps: { value: _vm.form.descuento },
                                  on: {
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.form,
                                        "descuento",
                                        _vm._n($event.target.value)
                                      )
                                    },
                                    blur: function($event) {
                                      return _vm.$forceUpdate()
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _c("has-error", {
                                  attrs: { form: _vm.form, field: "descuento" }
                                }),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  {
                                    staticClass: "progress",
                                    staticStyle: {
                                      height: "19px",
                                      "margin-bottom": "2px !important"
                                    }
                                  },
                                  [
                                    _c(
                                      "div",
                                      {
                                        staticClass:
                                          "progress-bar progress-bar-rose ",
                                        style: {
                                          width: _vm.form.descuento + "%"
                                        },
                                        attrs: {
                                          role: "progressbar",
                                          "aria-valuenow": "form.descuento",
                                          "aria-valuemin": "0",
                                          "aria-valuemax": "100"
                                        }
                                      },
                                      [
                                        _vm._v(
                                          "\n\t\t\t\t\t\t\t\t\t\t    " +
                                            _vm._s(_vm.form.descuento) +
                                            "%\n\t\t\t\t\t\t\t\t\t\t  "
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ],
                              1
                            )
                          ]),
                          _vm._v(" "),
                          _c(
                            "div",
                            {
                              staticClass: "col-md-4",
                              staticStyle: { "margin-top": "20px !important" }
                            },
                            [
                              _c("span", { staticClass: "text-rose" }, [
                                _c("b", [_vm._v(_vm._s(_vm.generardescuento))])
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c("div", { staticClass: "col-md-4" }, [
                            _c(
                              "div",
                              { staticClass: "input-group" },
                              [
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model.number",
                                      value: _vm.form.actides,
                                      expression: "form.actides",
                                      modifiers: { number: true }
                                    }
                                  ],
                                  staticClass: "form-control",
                                  attrs: {
                                    type: "number",
                                    step: "any",
                                    min: "0",
                                    max: "100",
                                    value: "0",
                                    name: "actides",
                                    placeholder: "Ej.: 3 "
                                  },
                                  domProps: { value: _vm.form.actides },
                                  on: {
                                    input: function($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.form,
                                        "actides",
                                        _vm._n($event.target.value)
                                      )
                                    },
                                    blur: function($event) {
                                      return _vm.$forceUpdate()
                                    }
                                  }
                                }),
                                _vm._v(" "),
                                _vm._m(13),
                                _vm._v(" "),
                                _c("has-error", {
                                  attrs: { form: _vm.form, field: "actides" }
                                })
                              ],
                              1
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _c("div", { staticClass: "row" }, [
                          _c(
                            "div",
                            { staticClass: "panel panel-default text-center" },
                            [
                              _vm._m(14),
                              _vm._v(" "),
                              _c(
                                "div",
                                {
                                  staticClass: "panel-collapse collapse",
                                  staticStyle: { height: "0px" },
                                  attrs: {
                                    id: "collapseOne",
                                    role: "tabpanel",
                                    "aria-labelledby": "headingOne",
                                    "aria-expanded": "false"
                                  }
                                },
                                [
                                  _c("div", { staticClass: "panel-body" }, [
                                    _c("div", { staticClass: "row" }, [
                                      _c("div", { staticClass: "col-md-4" }, [
                                        _c(
                                          "div",
                                          { staticClass: "input-group" },
                                          [
                                            _vm._m(15),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "form-group is-empty",
                                                class: {
                                                  "has-error is-focused": _vm.form.errors.has(
                                                    "entrada"
                                                  )
                                                }
                                              },
                                              [
                                                _c("input", {
                                                  directives: [
                                                    {
                                                      name: "model",
                                                      rawName: "v-model.trim",
                                                      value: _vm.form.entrada,
                                                      expression:
                                                        "form.entrada",
                                                      modifiers: { trim: true }
                                                    }
                                                  ],
                                                  staticClass: "form-control",
                                                  attrs: {
                                                    type: "text",
                                                    name: "entrada",
                                                    placeholder: "Entrada"
                                                  },
                                                  domProps: {
                                                    value: _vm.form.entrada
                                                  },
                                                  on: {
                                                    input: function($event) {
                                                      if (
                                                        $event.target.composing
                                                      ) {
                                                        return
                                                      }
                                                      _vm.$set(
                                                        _vm.form,
                                                        "entrada",
                                                        $event.target.value.trim()
                                                      )
                                                    },
                                                    blur: function($event) {
                                                      return _vm.$forceUpdate()
                                                    }
                                                  }
                                                }),
                                                _vm._v(" "),
                                                _c("span", {
                                                  staticClass: "material-input"
                                                }),
                                                _vm._v(" "),
                                                _c("has-error", {
                                                  attrs: {
                                                    form: _vm.form,
                                                    field: "entrada"
                                                  }
                                                })
                                              ],
                                              1
                                            )
                                          ]
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("div", { staticClass: "col-md-4" }, [
                                        _c(
                                          "div",
                                          { staticClass: "input-group" },
                                          [
                                            _vm._m(16),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "form-group is-empty",
                                                class: {
                                                  "has-error is-focused": _vm.form.errors.has(
                                                    "sopa"
                                                  )
                                                }
                                              },
                                              [
                                                _c("input", {
                                                  directives: [
                                                    {
                                                      name: "model",
                                                      rawName: "v-model.trim",
                                                      value: _vm.form.sopa,
                                                      expression: "form.sopa",
                                                      modifiers: { trim: true }
                                                    }
                                                  ],
                                                  staticClass: "form-control",
                                                  attrs: {
                                                    type: "text",
                                                    name: "sopa",
                                                    placeholder: "Sopa"
                                                  },
                                                  domProps: {
                                                    value: _vm.form.sopa
                                                  },
                                                  on: {
                                                    input: function($event) {
                                                      if (
                                                        $event.target.composing
                                                      ) {
                                                        return
                                                      }
                                                      _vm.$set(
                                                        _vm.form,
                                                        "sopa",
                                                        $event.target.value.trim()
                                                      )
                                                    },
                                                    blur: function($event) {
                                                      return _vm.$forceUpdate()
                                                    }
                                                  }
                                                }),
                                                _vm._v(" "),
                                                _c("span", {
                                                  staticClass: "material-input"
                                                }),
                                                _vm._v(" "),
                                                _c("has-error", {
                                                  attrs: {
                                                    form: _vm.form,
                                                    field: "sopa"
                                                  }
                                                })
                                              ],
                                              1
                                            )
                                          ]
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("div", { staticClass: "col-md-4" }, [
                                        _c(
                                          "div",
                                          { staticClass: "input-group" },
                                          [
                                            _vm._m(17),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "form-group is-empty",
                                                class: {
                                                  "has-error is-focused": _vm.form.errors.has(
                                                    "segundo"
                                                  )
                                                }
                                              },
                                              [
                                                _c("input", {
                                                  directives: [
                                                    {
                                                      name: "model",
                                                      rawName: "v-model.trim",
                                                      value: _vm.form.segundo,
                                                      expression:
                                                        "form.segundo",
                                                      modifiers: { trim: true }
                                                    }
                                                  ],
                                                  staticClass: "form-control",
                                                  attrs: {
                                                    type: "text",
                                                    name: "segundo",
                                                    placeholder: "Segundo"
                                                  },
                                                  domProps: {
                                                    value: _vm.form.segundo
                                                  },
                                                  on: {
                                                    input: function($event) {
                                                      if (
                                                        $event.target.composing
                                                      ) {
                                                        return
                                                      }
                                                      _vm.$set(
                                                        _vm.form,
                                                        "segundo",
                                                        $event.target.value.trim()
                                                      )
                                                    },
                                                    blur: function($event) {
                                                      return _vm.$forceUpdate()
                                                    }
                                                  }
                                                }),
                                                _vm._v(" "),
                                                _c("span", {
                                                  staticClass: "material-input"
                                                }),
                                                _vm._v(" "),
                                                _c("has-error", {
                                                  attrs: {
                                                    form: _vm.form,
                                                    field: "segundo"
                                                  }
                                                })
                                              ],
                                              1
                                            )
                                          ]
                                        )
                                      ])
                                    ]),
                                    _vm._v(" "),
                                    _c("div", { staticClass: "row" }, [
                                      _c("div", { staticClass: "col-md-4" }, [
                                        _c(
                                          "div",
                                          { staticClass: "input-group" },
                                          [
                                            _vm._m(18),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "form-group is-empty",
                                                class: {
                                                  "has-error is-focused": _vm.form.errors.has(
                                                    "postre"
                                                  )
                                                }
                                              },
                                              [
                                                _c("input", {
                                                  directives: [
                                                    {
                                                      name: "model",
                                                      rawName: "v-model.trim",
                                                      value: _vm.form.postre,
                                                      expression: "form.postre",
                                                      modifiers: { trim: true }
                                                    }
                                                  ],
                                                  staticClass: "form-control",
                                                  attrs: {
                                                    type: "text",
                                                    name: "postre",
                                                    placeholder: "Postre"
                                                  },
                                                  domProps: {
                                                    value: _vm.form.postre
                                                  },
                                                  on: {
                                                    input: function($event) {
                                                      if (
                                                        $event.target.composing
                                                      ) {
                                                        return
                                                      }
                                                      _vm.$set(
                                                        _vm.form,
                                                        "postre",
                                                        $event.target.value.trim()
                                                      )
                                                    },
                                                    blur: function($event) {
                                                      return _vm.$forceUpdate()
                                                    }
                                                  }
                                                }),
                                                _vm._v(" "),
                                                _c("span", {
                                                  staticClass: "material-input"
                                                }),
                                                _vm._v(" "),
                                                _c("has-error", {
                                                  attrs: {
                                                    form: _vm.form,
                                                    field: "postre"
                                                  }
                                                })
                                              ],
                                              1
                                            )
                                          ]
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("div", { staticClass: "col-md-4" }, [
                                        _c(
                                          "div",
                                          { staticClass: "input-group" },
                                          [
                                            _vm._m(19),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "form-group is-empty",
                                                class: {
                                                  "has-error is-focused": _vm.form.errors.has(
                                                    "refresco"
                                                  )
                                                }
                                              },
                                              [
                                                _c("input", {
                                                  directives: [
                                                    {
                                                      name: "model",
                                                      rawName: "v-model.trim",
                                                      value: _vm.form.refresco,
                                                      expression:
                                                        "form.refresco",
                                                      modifiers: { trim: true }
                                                    }
                                                  ],
                                                  staticClass: "form-control",
                                                  attrs: {
                                                    type: "text",
                                                    name: "refresco",
                                                    placeholder: "Refresco"
                                                  },
                                                  domProps: {
                                                    value: _vm.form.refresco
                                                  },
                                                  on: {
                                                    input: function($event) {
                                                      if (
                                                        $event.target.composing
                                                      ) {
                                                        return
                                                      }
                                                      _vm.$set(
                                                        _vm.form,
                                                        "refresco",
                                                        $event.target.value.trim()
                                                      )
                                                    },
                                                    blur: function($event) {
                                                      return _vm.$forceUpdate()
                                                    }
                                                  }
                                                }),
                                                _vm._v(" "),
                                                _c("span", {
                                                  staticClass: "material-input"
                                                }),
                                                _vm._v(" "),
                                                _c("has-error", {
                                                  attrs: {
                                                    form: _vm.form,
                                                    field: "refresco"
                                                  }
                                                })
                                              ],
                                              1
                                            )
                                          ]
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c("div", { staticClass: "col-md-4" })
                                    ])
                                  ])
                                ]
                              )
                            ]
                          )
                        ])
                      ]),
                      _vm._v(" "),
                      _c("div", { staticClass: "col-md-4 text-center" }, [
                        _c(
                          "h4",
                          {
                            directives: [
                              {
                                name: "show",
                                rawName: "v-show",
                                value: !_vm.editmode,
                                expression: "!editmode"
                              }
                            ]
                          },
                          [_c("b", [_vm._v("Imagen del producto")])]
                        ),
                        _vm._v(" "),
                        _c(
                          "h4",
                          {
                            directives: [
                              {
                                name: "show",
                                rawName: "v-show",
                                value: _vm.editmode,
                                expression: "editmode"
                              }
                            ]
                          },
                          [_c("b", [_vm._v("Nueva imagen del producto")])]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass: "fileinput fileinput-new text-center",
                            class: {
                              "has-error is-focused": _vm.form.errors.has(
                                "foto"
                              )
                            },
                            staticStyle: { "margin-bottom": "0px" },
                            attrs: { "data-provides": "fileinput" }
                          },
                          [
                            _c(
                              "div",
                              {
                                staticClass:
                                  "fileinput-new thumbnail img-rounded img-raised "
                              },
                              [
                                _c("img", {
                                  directives: [
                                    {
                                      name: "show",
                                      rawName: "v-show",
                                      value: !_vm.editmode,
                                      expression: "!editmode"
                                    }
                                  ],
                                  staticStyle: { width: "20rem" },
                                  attrs: {
                                    src: "/img/categoria/catedefault.jpg",
                                    alt: "Foto Usuario"
                                  }
                                }),
                                _vm._v(" "),
                                _c("img", {
                                  directives: [
                                    {
                                      name: "show",
                                      rawName: "v-show",
                                      value: _vm.editmode,
                                      expression: "editmode"
                                    }
                                  ],
                                  staticStyle: { width: "20rem" },
                                  attrs: {
                                    src: "/img/secondary/panal2.png",
                                    alt: "Foto Usuario"
                                  }
                                })
                              ]
                            ),
                            _vm._v(" "),
                            _c("div", {
                              staticClass:
                                "fileinput-preview fileinput-exists thumbnail img-rounded img-raised"
                            }),
                            _vm._v(" "),
                            _c("div", [
                              _c(
                                "span",
                                {
                                  staticClass:
                                    "btn btn-raised btn-sm btn-round btn-rose btn-file"
                                },
                                [
                                  _c("span", { staticClass: "fileinput-new" }, [
                                    _vm._v("Añadir Imagen")
                                  ]),
                                  _vm._v(" "),
                                  _c(
                                    "span",
                                    { staticClass: "fileinput-exists" },
                                    [_vm._v("Cambiar")]
                                  ),
                                  _vm._v(" "),
                                  _c("input", {
                                    attrs: { type: "file", name: "foto" },
                                    on: { change: _vm.proFoto }
                                  })
                                ]
                              ),
                              _vm._v(" "),
                              _vm._m(20)
                            ]),
                            _vm._v(" "),
                            _c("has-error", {
                              attrs: { form: _vm.form, field: "foto" }
                            })
                          ],
                          1
                        )
                      ])
                    ]),
                    _vm._v(" "),
                    _c("div", { staticClass: "media-footer text-center" }, [
                      _vm._m(21),
                      _vm._v(" "),
                      _c(
                        "button",
                        {
                          directives: [
                            {
                              name: "show",
                              rawName: "v-show",
                              value: _vm.editmode,
                              expression: "editmode"
                            }
                          ],
                          staticClass: "btn btn-primary btn-round",
                          attrs: { type: "submit" }
                        },
                        [
                          _c("i", { staticClass: "material-icons" }, [
                            _vm._v("edit")
                          ]),
                          _vm._v("\n\t\t\t\t\t\t\t\tACTUALIZAR\n\t\t\t\t\t\t\t")
                        ]
                      ),
                      _vm._v(" "),
                      _c(
                        "button",
                        {
                          directives: [
                            {
                              name: "show",
                              rawName: "v-show",
                              value: !_vm.editmode,
                              expression: "!editmode"
                            }
                          ],
                          staticClass: "btn btn-rose btn-round",
                          attrs: { type: "submit" }
                        },
                        [
                          _c("i", { staticClass: "material-icons" }, [
                            _vm._v("person_pin")
                          ]),
                          _vm._v("\n\t\t\t\t\t\t\t\tGUARDAR\n\t\t\t\t\t\t\t")
                        ]
                      )
                    ])
                  ]
                )
              ])
            ])
          ])
        ])
      ]
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("li", { staticClass: "active" }, [
      _c("a", { attrs: { href: "#lista", "data-toggle": "tab" } }, [
        _c("i", { staticClass: "material-icons" }, [_vm._v("input")]),
        _vm._v(
          "\n\t\t\t\t\t\t\t\t\t\t\tLISTA DE PRODUCTOS\n\t\t\t\t\t\t\t\t\t\t"
        )
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", [
      _c("tr", { staticClass: "almuerzo" }, [
        _c("th", { staticClass: "text-center" }, [_c("b", [_vm._v("#")])]),
        _vm._v(" "),
        _c("th", { staticClass: "text-center" }, [_c("b", [_vm._v("Datos")])]),
        _vm._v(" "),
        _c("th", { staticClass: "text-center" }, [_c("b", [_vm._v("Precio")])]),
        _vm._v(" "),
        _c("th", { staticClass: "text-center" }, [_c("b", [_vm._v("Estado")])]),
        _vm._v(" "),
        _c("th", { staticClass: "text-center" }, [
          _c("b", [_vm._v("Cantidad")])
        ]),
        _vm._v(" "),
        _c("th", { staticClass: "text-center" }, [
          _c("b", [_vm._v("Acciones")])
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("button", { staticClass: "btn btn-round btn-danger btn-xs" }, [
      _c("b", [_vm._v("NO DISPONIBLE")]),
      _vm._v(" "),
      _c("i", { staticClass: "material-icons" }, [_vm._v("do_not_disturb_alt")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "close",
        attrs: {
          type: "button",
          "data-dismiss": "modal",
          "aria-hidden": "true"
        }
      },
      [_c("i", { staticClass: "material-icons" }, [_vm._v("clear")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", { staticClass: "description text-center" }, [
      _vm._v("Los campos de este "),
      _c("span", { staticClass: "text-rose" }, [_c("b", [_vm._v("color")])]),
      _vm._v(" son obligatorios ")
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", { staticClass: "input-group-addon" }, [
      _c("i", { staticClass: "material-icons text-rose" }, [_vm._v("bookmark")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", { staticClass: "input-group-addon" }, [
      _c("i", { staticClass: "material-icons text-rose" }, [
        _vm._v("local_offer")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", { staticClass: "input-group-addon" }, [
      _c("i", { staticClass: "material-icons text-rose" }, [
        _vm._v("attach_money")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", { staticClass: "input-group-addon" }, [
      _c("i", { staticClass: "material-icons text-rose" }, [
        _vm._v("offline_pin")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", { staticClass: "input-group-addon" }, [
      _c("i", { staticClass: "material-icons" }, [_vm._v("people_outline")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", { staticClass: "input-group-addon" }, [
      _c("i", { staticClass: "material-icons text-rose" }, [
        _vm._v("line_weight")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", { staticClass: "input-group-addon" }, [
      _c("i", { staticClass: "material-icons" }, [_vm._v("line_weight")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "input-group-addon" }, [
      _c("span", { staticClass: "input-group-text" }, [
        _c("h4", [_vm._v(" % ")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "input-group-addon" }, [
      _c("span", { staticClass: "input-group-text" }, [_vm._v(" Unids. ")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "panel-heading ",
        attrs: { role: "tab", id: "headingOne" }
      },
      [
        _c(
          "a",
          {
            staticClass: "collapsed btn   btn-round btn-sm",
            attrs: {
              role: "button",
              "data-toggle": "collapse",
              "data-parent": "#accordion",
              href: "#collapseOne",
              "aria-expanded": "false",
              "aria-controls": "collapseOne"
            }
          },
          [
            _c("h4", { staticClass: "panel-title" }, [
              _vm._v(
                "\n\t                                \t\t\t\t¿Menú del Almuerzo?\n\t                               \t\t\t\t\t"
              ),
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
    return _c("span", { staticClass: "input-group-addon" }, [
      _c("i", { staticClass: "material-icons text-rose" }, [
        _vm._v("local_offer")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", { staticClass: "input-group-addon" }, [
      _c("i", { staticClass: "material-icons text-rose" }, [
        _vm._v("local_offer")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", { staticClass: "input-group-addon" }, [
      _c("i", { staticClass: "material-icons text-rose" }, [
        _vm._v("local_offer")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", { staticClass: "input-group-addon" }, [
      _c("i", { staticClass: "material-icons text-rose" }, [
        _vm._v("local_offer")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", { staticClass: "input-group-addon" }, [
      _c("i", { staticClass: "material-icons text-rose" }, [
        _vm._v("local_offer")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      {
        staticClass: "btn btn-sm btn-danger btn-round fileinput-exists",
        attrs: { href: "#pablo", "data-dismiss": "fileinput" }
      },
      [_c("i", { staticClass: "fa fa-times" }), _vm._v(" Eliminar")]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "button",
      {
        staticClass: "btn btn-default btn-round",
        attrs: { type: "botton", "data-dismiss": "modal" }
      },
      [
        _c("i", { staticClass: "material-icons" }, [_vm._v("close")]),
        _vm._v("\n\t\t\t\t\t\t\t\tCANCELAR\n\t\t\t\t\t\t\t")
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/Producto.vue":
/*!**********************************************!*\
  !*** ./resources/js/components/Producto.vue ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Producto_vue_vue_type_template_id_577b36cb___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Producto.vue?vue&type=template&id=577b36cb& */ "./resources/js/components/Producto.vue?vue&type=template&id=577b36cb&");
/* harmony import */ var _Producto_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Producto.vue?vue&type=script&lang=js& */ "./resources/js/components/Producto.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Producto_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Producto_vue_vue_type_template_id_577b36cb___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Producto_vue_vue_type_template_id_577b36cb___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/Producto.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/Producto.vue?vue&type=script&lang=js&":
/*!***********************************************************************!*\
  !*** ./resources/js/components/Producto.vue?vue&type=script&lang=js& ***!
  \***********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Producto_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./Producto.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Producto.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Producto_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/Producto.vue?vue&type=template&id=577b36cb&":
/*!*****************************************************************************!*\
  !*** ./resources/js/components/Producto.vue?vue&type=template&id=577b36cb& ***!
  \*****************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Producto_vue_vue_type_template_id_577b36cb___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./Producto.vue?vue&type=template&id=577b36cb& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/Producto.vue?vue&type=template&id=577b36cb&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Producto_vue_vue_type_template_id_577b36cb___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Producto_vue_vue_type_template_id_577b36cb___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);