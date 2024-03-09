/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/admin/global.js ***!
  \**************************************/
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return e; }; var t, e = {}, r = Object.prototype, n = r.hasOwnProperty, o = Object.defineProperty || function (t, e, r) { t[e] = r.value; }, i = "function" == typeof Symbol ? Symbol : {}, a = i.iterator || "@@iterator", c = i.asyncIterator || "@@asyncIterator", u = i.toStringTag || "@@toStringTag"; function define(t, e, r) { return Object.defineProperty(t, e, { value: r, enumerable: !0, configurable: !0, writable: !0 }), t[e]; } try { define({}, ""); } catch (t) { define = function define(t, e, r) { return t[e] = r; }; } function wrap(t, e, r, n) { var i = e && e.prototype instanceof Generator ? e : Generator, a = Object.create(i.prototype), c = new Context(n || []); return o(a, "_invoke", { value: makeInvokeMethod(t, r, c) }), a; } function tryCatch(t, e, r) { try { return { type: "normal", arg: t.call(e, r) }; } catch (t) { return { type: "throw", arg: t }; } } e.wrap = wrap; var h = "suspendedStart", l = "suspendedYield", f = "executing", s = "completed", y = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var p = {}; define(p, a, function () { return this; }); var d = Object.getPrototypeOf, v = d && d(d(values([]))); v && v !== r && n.call(v, a) && (p = v); var g = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(p); function defineIteratorMethods(t) { ["next", "throw", "return"].forEach(function (e) { define(t, e, function (t) { return this._invoke(e, t); }); }); } function AsyncIterator(t, e) { function invoke(r, o, i, a) { var c = tryCatch(t[r], t, o); if ("throw" !== c.type) { var u = c.arg, h = u.value; return h && "object" == _typeof(h) && n.call(h, "__await") ? e.resolve(h.__await).then(function (t) { invoke("next", t, i, a); }, function (t) { invoke("throw", t, i, a); }) : e.resolve(h).then(function (t) { u.value = t, i(u); }, function (t) { return invoke("throw", t, i, a); }); } a(c.arg); } var r; o(this, "_invoke", { value: function value(t, n) { function callInvokeWithMethodAndArg() { return new e(function (e, r) { invoke(t, n, e, r); }); } return r = r ? r.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(e, r, n) { var o = h; return function (i, a) { if (o === f) throw new Error("Generator is already running"); if (o === s) { if ("throw" === i) throw a; return { value: t, done: !0 }; } for (n.method = i, n.arg = a;;) { var c = n.delegate; if (c) { var u = maybeInvokeDelegate(c, n); if (u) { if (u === y) continue; return u; } } if ("next" === n.method) n.sent = n._sent = n.arg;else if ("throw" === n.method) { if (o === h) throw o = s, n.arg; n.dispatchException(n.arg); } else "return" === n.method && n.abrupt("return", n.arg); o = f; var p = tryCatch(e, r, n); if ("normal" === p.type) { if (o = n.done ? s : l, p.arg === y) continue; return { value: p.arg, done: n.done }; } "throw" === p.type && (o = s, n.method = "throw", n.arg = p.arg); } }; } function maybeInvokeDelegate(e, r) { var n = r.method, o = e.iterator[n]; if (o === t) return r.delegate = null, "throw" === n && e.iterator["return"] && (r.method = "return", r.arg = t, maybeInvokeDelegate(e, r), "throw" === r.method) || "return" !== n && (r.method = "throw", r.arg = new TypeError("The iterator does not provide a '" + n + "' method")), y; var i = tryCatch(o, e.iterator, r.arg); if ("throw" === i.type) return r.method = "throw", r.arg = i.arg, r.delegate = null, y; var a = i.arg; return a ? a.done ? (r[e.resultName] = a.value, r.next = e.nextLoc, "return" !== r.method && (r.method = "next", r.arg = t), r.delegate = null, y) : a : (r.method = "throw", r.arg = new TypeError("iterator result is not an object"), r.delegate = null, y); } function pushTryEntry(t) { var e = { tryLoc: t[0] }; 1 in t && (e.catchLoc = t[1]), 2 in t && (e.finallyLoc = t[2], e.afterLoc = t[3]), this.tryEntries.push(e); } function resetTryEntry(t) { var e = t.completion || {}; e.type = "normal", delete e.arg, t.completion = e; } function Context(t) { this.tryEntries = [{ tryLoc: "root" }], t.forEach(pushTryEntry, this), this.reset(!0); } function values(e) { if (e || "" === e) { var r = e[a]; if (r) return r.call(e); if ("function" == typeof e.next) return e; if (!isNaN(e.length)) { var o = -1, i = function next() { for (; ++o < e.length;) if (n.call(e, o)) return next.value = e[o], next.done = !1, next; return next.value = t, next.done = !0, next; }; return i.next = i; } } throw new TypeError(_typeof(e) + " is not iterable"); } return GeneratorFunction.prototype = GeneratorFunctionPrototype, o(g, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), o(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, u, "GeneratorFunction"), e.isGeneratorFunction = function (t) { var e = "function" == typeof t && t.constructor; return !!e && (e === GeneratorFunction || "GeneratorFunction" === (e.displayName || e.name)); }, e.mark = function (t) { return Object.setPrototypeOf ? Object.setPrototypeOf(t, GeneratorFunctionPrototype) : (t.__proto__ = GeneratorFunctionPrototype, define(t, u, "GeneratorFunction")), t.prototype = Object.create(g), t; }, e.awrap = function (t) { return { __await: t }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, c, function () { return this; }), e.AsyncIterator = AsyncIterator, e.async = function (t, r, n, o, i) { void 0 === i && (i = Promise); var a = new AsyncIterator(wrap(t, r, n, o), i); return e.isGeneratorFunction(r) ? a : a.next().then(function (t) { return t.done ? t.value : a.next(); }); }, defineIteratorMethods(g), define(g, u, "Generator"), define(g, a, function () { return this; }), define(g, "toString", function () { return "[object Generator]"; }), e.keys = function (t) { var e = Object(t), r = []; for (var n in e) r.push(n); return r.reverse(), function next() { for (; r.length;) { var t = r.pop(); if (t in e) return next.value = t, next.done = !1, next; } return next.done = !0, next; }; }, e.values = values, Context.prototype = { constructor: Context, reset: function reset(e) { if (this.prev = 0, this.next = 0, this.sent = this._sent = t, this.done = !1, this.delegate = null, this.method = "next", this.arg = t, this.tryEntries.forEach(resetTryEntry), !e) for (var r in this) "t" === r.charAt(0) && n.call(this, r) && !isNaN(+r.slice(1)) && (this[r] = t); }, stop: function stop() { this.done = !0; var t = this.tryEntries[0].completion; if ("throw" === t.type) throw t.arg; return this.rval; }, dispatchException: function dispatchException(e) { if (this.done) throw e; var r = this; function handle(n, o) { return a.type = "throw", a.arg = e, r.next = n, o && (r.method = "next", r.arg = t), !!o; } for (var o = this.tryEntries.length - 1; o >= 0; --o) { var i = this.tryEntries[o], a = i.completion; if ("root" === i.tryLoc) return handle("end"); if (i.tryLoc <= this.prev) { var c = n.call(i, "catchLoc"), u = n.call(i, "finallyLoc"); if (c && u) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } else if (c) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); } else { if (!u) throw new Error("try statement without catch or finally"); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } } } }, abrupt: function abrupt(t, e) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var o = this.tryEntries[r]; if (o.tryLoc <= this.prev && n.call(o, "finallyLoc") && this.prev < o.finallyLoc) { var i = o; break; } } i && ("break" === t || "continue" === t) && i.tryLoc <= e && e <= i.finallyLoc && (i = null); var a = i ? i.completion : {}; return a.type = t, a.arg = e, i ? (this.method = "next", this.next = i.finallyLoc, y) : this.complete(a); }, complete: function complete(t, e) { if ("throw" === t.type) throw t.arg; return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && e && (this.next = e), y; }, finish: function finish(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.finallyLoc === t) return this.complete(r.completion, r.afterLoc), resetTryEntry(r), y; } }, "catch": function _catch(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.tryLoc === t) { var n = r.completion; if ("throw" === n.type) { var o = n.arg; resetTryEntry(r); } return o; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(e, r, n) { return this.delegate = { iterator: values(e), resultName: r, nextLoc: n }, "next" === this.method && (this.arg = t), y; } }, e; }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }
$(document).ready(function () {
  $(document).on('click', '.btn-open-library', /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
    return _regeneratorRuntime().wrap(function _callee$(_context) {
      while (1) switch (_context.prev = _context.next) {
        case 0:
          $('#modal-library').modal('show');
          _context.next = 3;
          return loadModalContentImageType1();
        case 3:
          _context.next = 5;
          return loadLibrary();
        case 5:
        case "end":
          return _context.stop();
      }
    }, _callee);
  })));

  // chọn và chỉnh sửa ảnh loại 1
  function loadModalContentImageType1(type) {
    var html = '';
    html += "\n            <ul id=\"custom-tabs-image\" role=\"tablist\" class=\"nav nav-tabs\">\n                <li class=\"nav-item\" role=\"presentation\">\n                    <a class=\"nav-link\" data-bs-toggle=\"tab\" href=\"#upload\" role=\"tab\" aria-selected=\"true\" id=\"menu-item-upload\">\n                        <div class=\"d-flex align-items-center\">\n                            <div class=\"tab-icon\"><i class=\"bx bx-upload font-18 me-1\"></i></div>\n                            <div class=\"tab-title\">T\u1EA3i t\u1EADp tin l\xEAn</div>\n                        </div>\n                    </a>\n                </li>\n                <li class=\"nav-item\" role=\"presentation\">\n                    <a class=\"nav-link active\" data-bs-toggle=\"tab\" href=\"#folder\" role=\"tab\" aria-selected=\"false\" tabindex=\"-1\" id=\"menu-item-folder\">\n                        <div class=\"d-flex align-items-center\">\n                            <div class=\"tab-icon\"><i class=\"bx bx-folder font-18 me-1\"></i></div>\n                            <div class=\"tab-title\">Th\u01B0 vi\u1EC7n</div>\n                        </div>\n                    </a>\n                </li>\n                <!--<li class=\"nav-item\" role=\"presentation\">\n                    <a class=\"nav-link\" data-bs-toggle=\"tab\" href=\"#link\" role=\"tab\" aria-selected=\"false\" tabindex=\"-1\">\n                        <div class=\"d-flex align-items-center\">\n                            <div class=\"tab-icon\"><i class=\"bx bx-credit-card-front font-18 me-1\"></i></div>\n                            <div class=\"tab-title\">\u0110\u01B0\u1EDDng d\u1EABn</div>\n                        </div>\n                    </a>\n                </li>-->\n            </ul>\n            <div class=\"media-frame-content tab-content row\" id=\"custom-tabs-two-tabContent\">\n                <div class=\"col-md-12 tab-pane fade\" role=\"tabpanel\" aria-labelledby=\"menu-item-upload\" id=\"upload\" style=\"min-height: 350px;\">\n                    <div class=\"uploader-inline tab-content\">\n                        <div class=\"uploader-inline-content no-upload-message\">\n                            <div class=\"upload-ui\">\n                                <h2 class=\"upload-instructions drop-instructions\">Th\u1EA3 c\xE1c t\u1EADp tin \u0111\u1EC3 t\u1EA3i l\xEAn</h2>\n                                <p class=\"upload-instructions drop-instructions\">ho\u1EB7c</p>\n                                <div class=\"btnSelectFile\">\n                                    <button type=\"button\" class=\"browser button button-hero\" style=\"display: inline-block; position: relative; z-index: 1;\" >Ch\u1ECDn t\u1EADp tin</button>\n                                    <input type=\"file\" id=\"items\" name=\"items[]\" accept=\"image/*\" ref=\"file\" required multiple />\n                                </div>\n                            </div>\n                            <div class=\"upload-inline-status\">\n                            </div>\n                            <div class=\"post-upload-ui\">\n                                <p class=\"max-upload-size\">\n                                    K\xEDch th\u01B0\u1EDBc t\u1EADp tin t\u1EA3i l\xEAn t\u1ED1i \u0111a: 64 MB\n                                    <br />\n                                </p>\n                            </div>\n                        </div>\n                    </div>\n                </div>\n                <div class=\"col-md-12 tab-pane fade show active\" role=\"tabpanel\" aria-labelledby=\"menu-item-folder\" id=\"folder\" style=\"min-height: 350px;\">\n                    <p class=\"pt-3 pb-2 mb-0\" id=\"libary-title\"></p>\n                    <div id=\"list-library\">\n                        <div class=\"list-libraries col-md-12\">\n                        </div>\n                    </div>\n                </div>\n                <!--<div class=\"col-md-12 tab-pane p-4 fade\" role=\"tabpanel\" aria-labelledby=\"menu-item-link\" id=\"link\" style=\"min-height: 350px;\">\n                    <p class=\"pt-3 pb-2 mb-0 text-left\"><b>Th\xEAm \u0111\u01B0\u1EDDng d\u1EABn</b></p>\n                    <div class=\"update-link\">\n                        <div class=\"addLink mt-1\">\n                            <div class=\"input-group\">\n                                <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Th\xEAm \u0111\u01B0\u1EDDng d\u1EABn\" id=\"search-link\">\n                                <div class=\"input-group-append\">\n                                    <button class=\"btn btn-danger\" id=\"checkLink\">Ki\u1EC3m tra</button>\n                                </div>\n                            </div>\n                        </div>\n                        <div class=\"link-image mt-3 text-center\">\n\n                        </div>\n                    </div>\n                </div>-->\n            </div>\n        ";
    $('#notication-popup').html(html);
  }
  function loadLibrary() {
    $('#btn-confirm').attr("disabled", false);
    $.ajax({
      url: '/admin/library/load-library',
      dataType: 'json',
      beforeSend: function beforeSend() {
        var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
        $('.list-libraries').html(html);
      },
      success: function success(data) {
        if (!data.error) {
          $('#uploadFile').val(0);
          loadFile(data.data);
          $('[data-toggle="tooltip"]').tooltip();
        } else {
          $('.list-libraries').html('<div class="text-center text-danger">' + data.message + '</div>');
        }
      },
      error: function error(e) {
        console.log(e);
        $('.list-libraries').html('<div class="text-center text-danger">Lỗi truy vấn dữ liệu</div>');
      }
    });
  }
  function loadFile(data) {
    var isContent = $('#isContent').val();
    var id = $('.type1-image').attr('data-img');
    var html = '<div class="row">';
    $.each(data, function (index, file) {
      html += '<div class="col-6 col-sm-4 col-lg-3 col-xl-2 pb-3 list-image">';
      if (isContent != 0 && typeof id != 'undefined' && id != 0) {
        if (file.id === id) {
          html += '<div class="gallery chooseImage" data-id="' + file.id + '" data-link="' + file.link + '" data-title="' + file.title + '" data-alt="' + file.alt + '">';
        } else {
          html += '<div class="gallery" data-id="' + file.id + '" data-link="' + file.link + '" data-title="' + file.title + '" data-alt="' + file.alt + '">';
        }
      } else {
        html += '<div class="gallery" data-id="' + file.id + '" data-link="' + file.link + '" data-title="' + file.title + '" data-alt="' + file.alt + '">';
      }
      html += '<div class="image-cover">';
      html += '<div class="box-image">';
      // style="height: 450px;"
      html += '<img src="' + file.link + '" alt="' + file.alt + '">';
      html += '</div>';
      html += '</div>';
      html += '</div>';
      html += '</div>';
    });
    html += '</div>';
    $('.list-libraries').html(html);
  }
  $(document).on('click', '.button-hero', function () {
    $('#items').click();
  });
  $(document).on('change', '#items', function (event) {
    var files = event.target.files || event.dataTransfer.files;
    for (var index = 0; index < files.length; index++) {
      var fileSize = event.target.files[index].size;
      // console.log(fileSize > 67000000);
      if (fileSize < 67000000) {
        var formData = new FormData();
        var file = event.target.files[index];
        formData.append('file', event.target.files[index], event.target.files[index].name);
        formData.append('type', file.type);
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        $.ajax({
          url: '/admin/library/upload-load-file',
          // dataType: 'json',
          data: formData,
          type: 'post',
          processData: false,
          // tell jQuery not to process the data
          contentType: false,
          // tell jQuery not to set contentType
          beforeSend: function beforeSend() {
            var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
            $('.upload-inline-status').html(html);
          },
          success: function success(data) {
            if (!data.error) {
              $('.upload-inline-status').html('<div class="text-center text-success">' + data.message + '</div>');
              $('#uploadFile').val(1);
            } else {
              $('.upload-inline-status').html('<div class="text-center text-danger">' + data.message + '</div>');
            }
          },
          error: function error(e) {
            console.log(e);
            $('.upload-inline-status').html('<div class="text-center text-danger">Lỗi truy vấn dữ liệu</div>');
          }
        });
      } else {
        $('.upload-inline-status').html('<div class="text-center text-danger">Kích thước của file lớn hơn 64MB. Quý khách vui lòng kiểm tra lại.</div>');
      }
    }
  });
  $(document).on('click', '#menu-item-folder', function () {
    $('#btn-confirm').attr("disabled", false);
    if ($('#uploadFile').val() != 0) {
      loadLibrary();
    }
  });
  $(document).on('click', '.gallery', function () {
    $('.gallery').removeClass('chooseImage');
    $(this).addClass('chooseImage');
    $('#typeChoosseImage').val(1);
    $('#libraryImage').val($(this).attr('data-id')).attr('data-link', $(this).attr('data-link'));
  });
  $(document).on('click', '#menu-item-upload', function () {
    $('#btn-confirm').attr("disabled", true);
  });
  if ($('#ckeditor-content').length > 0) {
    CKEDITOR.replace('ckeditor-content', {
      height: "450px"
    });
    CKEDITOR.on('dialogDefinition', function (event) {
      var dialogName = event.data.name;
      var dialogDefinition = event.data.definition;
      if (dialogName === 'image') {
        // Gắn sự kiện vào hộp thoại mỗi khi nó được mở
        dialogDefinition.onShow = /*#__PURE__*/function () {
          var _ref2 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee2(ev) {
            return _regeneratorRuntime().wrap(function _callee2$(_context2) {
              while (1) switch (_context2.prev = _context2.next) {
                case 0:
                  // Đóng hộp thoại
                  this.hide();
                  $('#modal-library').modal('show');
                  $('#btn-confirm').text('Chọn ảnh');
                  $('#btn-confirm').attr('data-type', 'ckeditor-img');
                  _context2.next = 6;
                  return loadModalContentImageType1();
                case 6:
                  _context2.next = 8;
                  return loadLibrary();
                case 8:
                case "end":
                  return _context2.stop();
              }
            }, _callee2, this);
          }));
          return function (_x) {
            return _ref2.apply(this, arguments);
          };
        }();
        dialogDefinition.onFocus = function (ev) {
          // Đóng hộp thoại
          // ev.cancel = false;

          // Đóng hộp thoại
          this.hide();
        };
        dialogDefinition.onLoad = function (ev) {
          // Đặt thuộc tính 'cancel' thành 'false' để ngăn người dùng đóng hộp thoại
          // ev.cancel = false;

          // Đóng hộp thoại
          this.hide();

          // $('#modal-library').modal('show');
          // $('#btn-confirm').text('Chọn ảnh');
          // $('#btn-confirm').attr('data-type', 'ckeditor-img');
          //
          // await loadModalContentImageType1();
          // await loadLibrary();
        };
      }
    });
    $('#btn-confirm').on('click', function () {
      var type = $(this).attr('data-type');
      if (typeof type === 'undefined') return false;
      if (type === 'ckeditor-img') {
        var editor = CKEDITOR.instances['ckeditor-content'];
        var link = $('#libraryImage').attr('data-link');
        // Kiểm tra xem editor có tồn tại không
        if (editor) {
          // Thêm hình ảnh vào vị trí con trỏ
          editor.insertHtml('<img src="' + link + '" />');
          $('#modal-library').modal('hide');
        }
      }
    });
  }
});
/******/ })()
;