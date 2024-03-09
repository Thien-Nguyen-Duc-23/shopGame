/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!**************************************!*\
  !*** ./resources/js/admin/slider.js ***!
  \**************************************/
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return e; }; var t, e = {}, r = Object.prototype, n = r.hasOwnProperty, o = Object.defineProperty || function (t, e, r) { t[e] = r.value; }, i = "function" == typeof Symbol ? Symbol : {}, a = i.iterator || "@@iterator", c = i.asyncIterator || "@@asyncIterator", u = i.toStringTag || "@@toStringTag"; function define(t, e, r) { return Object.defineProperty(t, e, { value: r, enumerable: !0, configurable: !0, writable: !0 }), t[e]; } try { define({}, ""); } catch (t) { define = function define(t, e, r) { return t[e] = r; }; } function wrap(t, e, r, n) { var i = e && e.prototype instanceof Generator ? e : Generator, a = Object.create(i.prototype), c = new Context(n || []); return o(a, "_invoke", { value: makeInvokeMethod(t, r, c) }), a; } function tryCatch(t, e, r) { try { return { type: "normal", arg: t.call(e, r) }; } catch (t) { return { type: "throw", arg: t }; } } e.wrap = wrap; var h = "suspendedStart", l = "suspendedYield", f = "executing", s = "completed", y = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var p = {}; define(p, a, function () { return this; }); var d = Object.getPrototypeOf, v = d && d(d(values([]))); v && v !== r && n.call(v, a) && (p = v); var g = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(p); function defineIteratorMethods(t) { ["next", "throw", "return"].forEach(function (e) { define(t, e, function (t) { return this._invoke(e, t); }); }); } function AsyncIterator(t, e) { function invoke(r, o, i, a) { var c = tryCatch(t[r], t, o); if ("throw" !== c.type) { var u = c.arg, h = u.value; return h && "object" == _typeof(h) && n.call(h, "__await") ? e.resolve(h.__await).then(function (t) { invoke("next", t, i, a); }, function (t) { invoke("throw", t, i, a); }) : e.resolve(h).then(function (t) { u.value = t, i(u); }, function (t) { return invoke("throw", t, i, a); }); } a(c.arg); } var r; o(this, "_invoke", { value: function value(t, n) { function callInvokeWithMethodAndArg() { return new e(function (e, r) { invoke(t, n, e, r); }); } return r = r ? r.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(e, r, n) { var o = h; return function (i, a) { if (o === f) throw new Error("Generator is already running"); if (o === s) { if ("throw" === i) throw a; return { value: t, done: !0 }; } for (n.method = i, n.arg = a;;) { var c = n.delegate; if (c) { var u = maybeInvokeDelegate(c, n); if (u) { if (u === y) continue; return u; } } if ("next" === n.method) n.sent = n._sent = n.arg;else if ("throw" === n.method) { if (o === h) throw o = s, n.arg; n.dispatchException(n.arg); } else "return" === n.method && n.abrupt("return", n.arg); o = f; var p = tryCatch(e, r, n); if ("normal" === p.type) { if (o = n.done ? s : l, p.arg === y) continue; return { value: p.arg, done: n.done }; } "throw" === p.type && (o = s, n.method = "throw", n.arg = p.arg); } }; } function maybeInvokeDelegate(e, r) { var n = r.method, o = e.iterator[n]; if (o === t) return r.delegate = null, "throw" === n && e.iterator["return"] && (r.method = "return", r.arg = t, maybeInvokeDelegate(e, r), "throw" === r.method) || "return" !== n && (r.method = "throw", r.arg = new TypeError("The iterator does not provide a '" + n + "' method")), y; var i = tryCatch(o, e.iterator, r.arg); if ("throw" === i.type) return r.method = "throw", r.arg = i.arg, r.delegate = null, y; var a = i.arg; return a ? a.done ? (r[e.resultName] = a.value, r.next = e.nextLoc, "return" !== r.method && (r.method = "next", r.arg = t), r.delegate = null, y) : a : (r.method = "throw", r.arg = new TypeError("iterator result is not an object"), r.delegate = null, y); } function pushTryEntry(t) { var e = { tryLoc: t[0] }; 1 in t && (e.catchLoc = t[1]), 2 in t && (e.finallyLoc = t[2], e.afterLoc = t[3]), this.tryEntries.push(e); } function resetTryEntry(t) { var e = t.completion || {}; e.type = "normal", delete e.arg, t.completion = e; } function Context(t) { this.tryEntries = [{ tryLoc: "root" }], t.forEach(pushTryEntry, this), this.reset(!0); } function values(e) { if (e || "" === e) { var r = e[a]; if (r) return r.call(e); if ("function" == typeof e.next) return e; if (!isNaN(e.length)) { var o = -1, i = function next() { for (; ++o < e.length;) if (n.call(e, o)) return next.value = e[o], next.done = !1, next; return next.value = t, next.done = !0, next; }; return i.next = i; } } throw new TypeError(_typeof(e) + " is not iterable"); } return GeneratorFunction.prototype = GeneratorFunctionPrototype, o(g, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), o(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, u, "GeneratorFunction"), e.isGeneratorFunction = function (t) { var e = "function" == typeof t && t.constructor; return !!e && (e === GeneratorFunction || "GeneratorFunction" === (e.displayName || e.name)); }, e.mark = function (t) { return Object.setPrototypeOf ? Object.setPrototypeOf(t, GeneratorFunctionPrototype) : (t.__proto__ = GeneratorFunctionPrototype, define(t, u, "GeneratorFunction")), t.prototype = Object.create(g), t; }, e.awrap = function (t) { return { __await: t }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, c, function () { return this; }), e.AsyncIterator = AsyncIterator, e.async = function (t, r, n, o, i) { void 0 === i && (i = Promise); var a = new AsyncIterator(wrap(t, r, n, o), i); return e.isGeneratorFunction(r) ? a : a.next().then(function (t) { return t.done ? t.value : a.next(); }); }, defineIteratorMethods(g), define(g, u, "Generator"), define(g, a, function () { return this; }), define(g, "toString", function () { return "[object Generator]"; }), e.keys = function (t) { var e = Object(t), r = []; for (var n in e) r.push(n); return r.reverse(), function next() { for (; r.length;) { var t = r.pop(); if (t in e) return next.value = t, next.done = !1, next; } return next.done = !0, next; }; }, e.values = values, Context.prototype = { constructor: Context, reset: function reset(e) { if (this.prev = 0, this.next = 0, this.sent = this._sent = t, this.done = !1, this.delegate = null, this.method = "next", this.arg = t, this.tryEntries.forEach(resetTryEntry), !e) for (var r in this) "t" === r.charAt(0) && n.call(this, r) && !isNaN(+r.slice(1)) && (this[r] = t); }, stop: function stop() { this.done = !0; var t = this.tryEntries[0].completion; if ("throw" === t.type) throw t.arg; return this.rval; }, dispatchException: function dispatchException(e) { if (this.done) throw e; var r = this; function handle(n, o) { return a.type = "throw", a.arg = e, r.next = n, o && (r.method = "next", r.arg = t), !!o; } for (var o = this.tryEntries.length - 1; o >= 0; --o) { var i = this.tryEntries[o], a = i.completion; if ("root" === i.tryLoc) return handle("end"); if (i.tryLoc <= this.prev) { var c = n.call(i, "catchLoc"), u = n.call(i, "finallyLoc"); if (c && u) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } else if (c) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); } else { if (!u) throw new Error("try statement without catch or finally"); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } } } }, abrupt: function abrupt(t, e) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var o = this.tryEntries[r]; if (o.tryLoc <= this.prev && n.call(o, "finallyLoc") && this.prev < o.finallyLoc) { var i = o; break; } } i && ("break" === t || "continue" === t) && i.tryLoc <= e && e <= i.finallyLoc && (i = null); var a = i ? i.completion : {}; return a.type = t, a.arg = e, i ? (this.method = "next", this.next = i.finallyLoc, y) : this.complete(a); }, complete: function complete(t, e) { if ("throw" === t.type) throw t.arg; return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && e && (this.next = e), y; }, finish: function finish(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.finallyLoc === t) return this.complete(r.completion, r.afterLoc), resetTryEntry(r), y; } }, "catch": function _catch(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.tryLoc === t) { var n = r.completion; if ("throw" === n.type) { var o = n.arg; resetTryEntry(r); } return o; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(e, r, n) { return this.delegate = { iterator: values(e), resultName: r, nextLoc: n }, "next" === this.method && (this.arg = t), y; } }, e; }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }
$(document).ready(function () {
  function Pagination(total, per_page, current_page, addClass) {
    // console.log(total, per_page, current_page, addClass);
    total = parseInt(total);
    per_page = parseInt(per_page);
    current_page = parseInt(current_page);
    var html_page = '';
    var page = 0;
    if (total > per_page) {
      if (total % per_page) {
        page = parseInt(total / per_page) + 1;
      } else {
        page = parseInt(total / per_page);
      }
      // console.log('====================================');
      // console.log(total % per_page, total, per_page, total/per_page, page);
      // console.log('====================================');
      if (page > 11) {
        html_page += '<tr>';
        html_page += '<td colspan="15" class="text-center link-right">';
        html_page += '<nav>';
        html_page += '<ul class="pagination ' + addClass + ' ">';
        // prev
        if (current_page != 1) {
          html_page += '<li class="page-item"><a href="javascript:void(0)" data-page="' + (current_page - 1) + '" class="page-link">&laquo</a></li>';
        } else {
          html_page += '<li class="page-item disabled"><a href="javascript:void(0)" class="page-link">&laquo</a></li>';
        }
        // số trang
        if (current_page < 7) {
          for (var i = 1; i < 9; i++) {
            var active = '';
            if (i == current_page) {
              active = 'active';
            }
            if (active == 'active') {
              html_page += '<li class="page-item active disabled"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
            } else {
              html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
            }
          }
          html_page += '<li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>';
          for (var i = page - 1; i <= page; i++) {
            html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
          }
        } else if (current_page >= page - 5) {
          html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="1" >1</a></li>';
          html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="2" >2</a></li>';
          html_page += '<li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>';
          for (var i = page - 5; i <= page; i++) {
            var active = '';
            if (i == current_page) {
              active = 'active';
            }
            if (active == 'active') {
              html_page += '<li class="page-item active disabled"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
            } else {
              html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
            }
          }
        } else {
          html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="1" >1</a></li>';
          html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="2" >2</a></li>';
          html_page += '<li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>';
          for (var i = current_page - 3; i <= current_page + 3; i++) {
            var active = '';
            if (i == current_page) {
              active = 'active';
            }
            if (active == 'active') {
              html_page += '<li class="page-item active disabled"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
            } else {
              html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
            }
          }
          html_page += '<li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>';
          for (var i = page - 1; i <= page; i++) {
            html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
          }
        }
        // next
        if (current_page != page) {
          html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="' + current_page + '">&raquo;</a></li>';
        } else {
          html_page += '<li  class="page-item disabled"><a href="javascript:void(0)" class="page-link">&raquo;</a></li>';
        }
        html_page += '</ul>';
        html_page += '</nav>';
        html_page += '</td>';
        html_page += '</tr>';
      } else {
        html_page += '<tr>';
        html_page += '<td colspan="15" class="text-center link-right">';
        html_page += '<nav>';
        html_page += '<ul class="pagination ' + addClass + '">';
        if (current_page != 1) {
          html_page += '<li class="page-item"><a href="javascript:void(0)" data-page="' + (current_page - 1) + '" class="page-link">&laquo</a></li>';
        } else {
          html_page += '<li class="page-item disabled"><a href="javascript:void(0)" class="page-link">&laquo</a></li>';
        }
        for (var i = 1; i <= page; i++) {
          var active = '';
          if (i == current_page) {
            active = 'active';
          }
          if (active == 'active') {
            html_page += '<li class="page-item active disabled"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
          } else {
            html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="' + i + '" >' + i + '</a></li>';
          }
        }
        if (current_page != page) {
          html_page += '<li class="page-item"><a href="javascript:void(0)" class="page-link" data-page="' + current_page + '">&raquo;</a></li>';
        } else {
          html_page += '<li  class="page-item disabled"><a href="javascript:void(0)" class="page-link">&raquo;</a></li>';
        }
        html_page += '</ul>';
        html_page += '</nav>';
        html_page += '</td>';
        html_page += '</tr>';
      }
    }
    return html_page;
  }
  ;
  listCategory();
  function listCategory() {
    var q = $('#q').val();
    var sl = $('#sl').val();
    $.ajax({
      url: '/admin/slider-search',
      data: {
        q: q,
        sl: sl
      },
      dataType: 'json',
      beforeSend: function beforeSend() {
        var html = '<td  colspan="15" class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></td>';
        $('tbody').html(html);
      },
      success: function success(data) {
        if (data.error === 0) {
          if (data.data.length) {
            screen_list(data);
          } else {
            $('tbody').html('<td colspan="15" class="text-center text-danger">Không có slider trong dữ liệu</td>');
          }
        } else {
          $('tbody').html('<td colspan="15" class="text-center text-danger">' + data.message + '</td>');
        }
      },
      error: function error(e) {
        $('tbody').html('<td colspan="15" class="text-center text-danger">Truy vấn thất bại!</td>');
      }
    });
  }
  function screen_list(data) {
    var html = '';
    $.each(data.data, function (index, slider) {
      html += '<tr>';
      // avatar
      html += '<td>';
      if (slider.is_avatar) {
        html += '<img src="' + slider.avatar + '" alt="' + slider.name + '" class="table-img" data-bs-toggle="tooltip" data-bs-placement="top" title="Hình nền">';
      }
      html += '</td>';
      html += '<td>' + slider.name + '</td>';
      html += '<td>';
      if (parseInt(slider.is_preview) == 1) {
        html += '<button type="button" class="btn btn-sm btn-info text-light me-1 mb-1 action-preview-slider" data-bs-toggle="tooltip" data-bs-placement="top" title="Xem trước"><i class="fadeIn animated bx bx-slideshow" style="margin-left: 5px;"></i></button>';
      }
      html += '</td>';
      html += '<td class="td-status">';
      if (parseInt(slider.status) == 1) {
        html += '<div class="text-center form-check form-switch"><input class="form-check-input tbody-slider-status" type="checkbox" role="switch" data-id="' + slider.id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Tắt slider" checked></div>';
      } else {
        html += '<div class="text-center form-check form-switch"><input class="form-check-input tbody-slider-status" type="checkbox" role="switch" data-id="' + slider.id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật slider"></div>';
      }
      html += '</td>';
      // // hành động
      html += '<td class="button-action">';
      html += '<button type="button" class="btn btn-sm btn-warning text-light action_event me-1 mb-1" data-action="edit" data-id="' + slider.id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Chỉnh sửa"><i class="bx bx-edit-alt me-0"></i></button>';
      html += '<button type="button" class="btn btn-sm btn-danger action_event me-1 mb-1" data-action="delete" data-name="' + slider.name + '" data-id="' + slider.id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Xóa chuyên mục"><i class="bx bx-trash-alt me-0"></i></button>';
      html += '</td>';
      html += '</tr>';
    });
    $('tbody').html(html);
    // phân trang cho vps
    $('.first-item').text(data.firstItem);
    $('.last-item').text(data.lastItem);
    $('.total-item').text(data.total);
    var total = data.total;
    var per_page = data.perPage;
    var current_page = data.current_page;
    var html_page = Pagination(total, per_page, current_page, '');
    $('tfoot').html(html_page);
    $('[data-bs-toggle="tooltip"]').tooltip();
  }
  $(document).on('click', '.action-preview-slider', function (e) {
    e.preventDefault();
    location.href = 'slider/preview';
  });
  $('#createSlider').on('click', function () {
    $('#modal-page').modal('show');
    $('#modal-page .modal-title').text('Thêm slider');
    $('#btn-submit').fadeIn().text('Tạo slider').attr('data-action', 'create');
    $('#btn-finish').fadeOut();
    var html = "\n            <div class=\"message-error\"></div>\n            <div class=\"form-group\">\n                <label class=\"col-form-label\" for=\"slider-name\">Ti\xEAu \u0111\u1EC1<span class=\"text-danger\">*</span></label>\n                <input type=\"text\" class=\"form-control\" id=\"slider-name\" value=\"\" placeholder=\"Ti\xEAu \u0111\u1EC1 slider\">\n            </div>\n            <div class=\"form-group\">\n                <label class=\"col-form-label\" for=\"slider-description\">N\u1ED9i dung<span class=\"text-danger\">*</span></label>\n                <textarea class=\"form-control\" id=\"slider-description\" placeholder=\"N\u1ED9i dung slider\" rows=\"7\"></textarea>\n            </div>\n\n            <div class=\"form-group\">\n                <label class=\"col-form-label\" for=\"slider-description\">S\u1ED1 th\u1EE9 t\u1EF1</label>\n                <input type=\"number\" min=0 class=\"form-control\" id=\"slider-sort-number\" placeholder=\"S\u1ED1 th\u1EE9 t\u1EF1\" value=\"\"></input>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"col-form-label\" for=\"slider-description\">V\u1ECB tr\xED</label>\n                <select class=\"form-select\" id=\"slider-select-position\" data-placeholder=\"Vui l\xF2ng ch\u1ECDn ng\u01B0\u1EDDi d\xF9ng\" name=\"user_ids\">\n                    <option value=\"\" selected> Vui l\xF2ng ch\u1ECDn v\u1ECB tr\xED </option>\n                    <option value=\"1\"> Tr\xE1i </option>\n                    <option value=\"2\"> Ph\u1EA3i </option>\n                    <option value=\"3\"> Gi\u1EEFa </option>\n                </select>\n            </div>\n            <div class=\"form-group\">\n                <label class=\"col-form-label\" for=\"slider-name\">URL</label>\n                <input type=\"text\" class=\"form-control\" name=\"url\" id=\"slider-url\" value=\"\" placeholder=\"URL\">\n            </div>\n            <div class=\"form-group form-check\">\n                <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"slider-is-preview\">\n                <label class=\"form-check-label\" for=\"flexCheckDefault\">\n                    Xem tr\u01B0\u1EDBc\n                </label>\n            </div>\n            <div class=\"form-group form-check form-switch\">\n                <label class=\"form-check-label\" for=\"flexSwitchCheckDefault1\">Tr\u1EA1ng th\xE1i</label>\n                <input \n                    class=\"form-check-input\" \n                    type=\"checkbox\" \n                    role=\"switch\" \n                    id=\"slider-status\"\n                    name=\"status\" \n                >\n            </div>\n            <div class=\"form-group\">\n                <label class=\"col-form-label\" for=\"slider-avatar\">\u1EA2nh \u0111\u1EA1i di\u1EC7n<span class=\"text-danger\">*</span></label>\n                <div class=\"slider-avatar-img mb-2\"></div>\n                <input type=\"hidden\" id=\"slider-avatar\" class=\"form-control\" value=\"\">\n                <button type=\"button\" class=\"btn btn-outline-dark btn-sm btn-open-library btn-slider-avatar\">\n                    <i class=\"bx bx-cloud-upload mr-1\"></i> Ch\u1ECDn \u1EA3nh \u0111\u1EA1i di\u1EC7n\n                </button>\n            </div>\n        ";
    $('#notication').html(html);
  });
  $(document).on('click', '.action_event', function () {
    var action = $(this).attr('data-action');
    switch (action) {
      case 'edit':
        var id = $(this).attr('data-id');
        $('#modal-page').modal('show');
        $('#modal-page .modal-title').text('Chỉnh sửa slider');
        $('#btn-submit').fadeIn().text('Cập nhật').attr('data-action', 'edit').attr('data-id', id);
        $('#btn-finish').fadeOut();
        $.ajax({
          url: '/admin/slider/detail',
          data: {
            id: id
          },
          dataType: 'json',
          beforeSend: function beforeSend() {
            var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
            $('#btn-submit').attr('disabled', true);
            $('#notication').html(html);
          },
          success: function success(data) {
            if (data.error === 0) {
              var _data$slider$sort_num;
              var html = "\n                                <div class=\"message-error\"></div>\n                                <div class=\"form-group\">\n                                    <label class=\"col-form-label\" for=\"slider-name\">Ti\xEAu \u0111\u1EC1<span class=\"text-danger\">*</span></label>\n                                    <input type=\"text\" class=\"form-control\" id=\"slider-name\" value=\"".concat(data.slider.name, "\" placeholder=\"Ti\xEAu \u0111\u1EC1 slider\" />\n                                </div>\n                                <div class=\"form-group\">\n                                    <label class=\"col-form-label\" for=\"slider-description\">N\u1ED9i dung<span class=\"text-danger\">*</span></label>\n                                    <textarea class=\"form-control\" id=\"slider-description\" placeholder=\"N\u1ED9i dung\" rows=\"7\">").concat(data.slider.description, "</textarea>\n                                </div>\n                                <div class=\"form-group\">\n                                    <label class=\"col-form-label\" for=\"slider-description\">S\u1ED1 th\u1EE9 t\u1EF1</label>\n                                    <input type=\"number\" min=0 class=\"form-control\" id=\"slider-sort-number\" placeholder=\"S\u1ED1 th\u1EE9 t\u1EF1\" value=\"").concat((_data$slider$sort_num = data.slider.sort_number) !== null && _data$slider$sort_num !== void 0 ? _data$slider$sort_num : null, "\"></input>\n                                </div>\n                                <div class=\"form-group\">\n                                    <label class=\"col-form-label\" for=\"slider-description\">V\u1ECB tr\xED</label>\n                                    <select class=\"form-select\" id=\"slider-select-position\" data-placeholder=\"Vui l\xF2ng ch\u1ECDn ng\u01B0\u1EDDi d\xF9ng\" name=\"user_ids\">\n                                        <option value=\"\" ").concat(!data.slider.position ? "selected" : "", "> Vui l\xF2ng ch\u1ECDn v\u1ECB tr\xED </option>\n                                        <option value=\"1\" ").concat(data.slider.position == 1 ? "selected" : "", "> Tr\xE1i </option>\n                                        <option value=\"2\" ").concat(data.slider.position == 2 ? "selected" : "", "> Ph\u1EA3i </option>\n                                        <option value=\"3\" ").concat(data.slider.position == 3 ? "selected" : "", "> Gi\u1EEFa </option>\n                                    </select>\n                                </div>\n                                <div class=\"form-group\">\n                                    <label class=\"col-form-label\" for=\"slider-name\">URL</label>\n                                    <input type=\"text\" class=\"form-control\" id=\"slider-url\" value=\"").concat(data.slider.url, "\" placeholder=\"URL\" />\n                                </div>\n                                <div class=\"form-group form-check\">\n                                    <input class=\"form-check-input\" type=\"checkbox\" value=\"\" id=\"slider-is-preview\" \n                                    ").concat(data.slider.is_preview == 1 ? 'checked' : '', " >\n                                    <label class=\"form-check-label\" for=\"flexCheckDefault\">\n                                        Xem tr\u01B0\u1EDBc\n                                    </label>\n                                </div>\n                                <div class=\"form-group form-check form-switch\">\n                                    <label class=\"form-check-label\" for=\"flexSwitchCheckDefault1\">Tr\u1EA1ng th\xE1i</label>\n                                    <input \n                                        class=\"form-check-input\" \n                                        type=\"checkbox\" \n                                        role=\"switch\" \n                                        id=\"slider-status\"\n                                        name=\"status\" \n                                        ").concat(data.slider.status == 1 ? 'checked' : '', "\n                                    >\n                                </div>\n                                <div class=\"form-group\">\n                                    <label class=\"col-form-label\" for=\"slider-avatar\">\u1EA2nh \u0111\u1EA1i di\u1EC7n<span class=\"text-danger\">*</span></label>\n                                    <div class=\"slider-avatar-img mb-2\">\n                                       ").concat(data.slider.is_avatar ? '<img class="config-image" src="' + data.slider.avatar + '" alt="Logo" width="160" height="160">' : "", "\n                                    </div>\n                                    <input type=\"hidden\" id=\"slider-avatar\" class=\"form-control\" value=\"").concat(data.slider.library_id, "\">\n                                    <button type=\"button\" class=\"btn btn-outline-dark btn-sm btn-open-library btn-slider-avatar\">\n                                        <i class=\"bx bx-cloud-upload mr-1\"></i> Ch\u1ECDn \u1EA3nh \u0111\u1EA1i di\u1EC7n\n                                    </button>\n                                </div>\n                            ");
              $('#notication').html(html);
            } else {
              $('#notication').html('<div class="text-center text-danger">' + data.message + '</div>');
              $('#btn-submit').fadeOut().attr('disabled', false);
              $('#btn-finish').fadeIn();
            }
            $('#btn-submit').attr('disabled', false);
          },
          error: function error(e) {
            $('#notication-send-mail').html('');
            $('#notication').html('<span class="text-center text-danger">Truy vấn thất bại!</span>');
            $('#btn-submit').fadeOut().attr('disabled', false);
            $('#btn-finish').fadeIn();
          }
        });
        break;
      case 'delete':
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');
        $('#modal-page').modal('show');
        $('#modal-page .modal-title').text('Xóa slider');
        $('#btn-submit').fadeIn().text('Xác nhận').attr('data-action', 'delete').attr('data-id', id);
        $('#btn-finish').fadeOut();
        $('#notication').html('<div class="text-center">Bạn có muốn xóa slider <strong class="text-danger">' + name + '</strong> này không?</div>');
        break;
      default:
        alert("Hành động không có trong dữ liệu");
        break;
    }
  });
  $(".slider-select-position").select2({
    theme: "bootstrap-5",
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
  });
  $(document).on('click', '.btn-slider-avatar', function () {
    $('#modal-library .modal-title').text('Chọn ảnh đại diện cho nhóm sản phẩm');
  });
  $('#btn-confirm').on('click', function () {
    var link = $('#libraryImage').attr('data-link');
    var id = $('#libraryImage').val();
    $('#slider-avatar').val(id);
    $('.slider-avatar-img').html('<img class="config-image" src="' + link + '" alt="Logo" width="160" height="160">');
    $('#modal-library').modal('hide');
  });
  $('#btn-submit').on('click', function () {
    var title = $('#slider-name').val();
    var description = $('#slider-description').val();
    var sortNumber = $('#slider-sort-number').val();
    var position = $('#slider-select-position').val();
    var avatar = $('#slider-avatar').val();
    var action = $(this).attr('data-action');
    var status = 0;
    if ($('#slider-status').is(':checked')) {
      status = 1;
    }
    var isPreview = 0;
    if ($('#slider-is-preview').is(':checked')) {
      isPreview = 1;
    }
    var url = $('#slider-url').val();
    var id = 0;
    if (action === 'delete' || action === 'edit') id = $(this).attr('data-id');
    var _token = $('meta[name="csrf-token"]').attr('content');
    if (action === 'create' || action === 'edit') {
      if (!validate()) {
        return false;
      }
    }
    $.ajax({
      url: '/admin/slider/action',
      type: 'post',
      data: {
        id: id,
        name: title,
        description: description,
        library_id: avatar,
        status: status,
        url: url,
        sort_number: sortNumber,
        position: position,
        is_preview: isPreview,
        action: action,
        _token: _token
      },
      dataType: 'json',
      beforeSend: function beforeSend() {
        var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
        $('#btn-submit').attr('disabled', true);
        $('#notication').html(html);
      },
      success: function success(data) {
        if (data.error === 0) {
          $('#notication').html('<div class="text-center text-success">' + data.message + '</div>');
          listCategory();
        } else {
          $('#notication').html('<div class="text-center text-danger">' + data.message + '</div>');
        }
        $('#btn-submit').fadeOut();
        $('#btn-submit').attr('disabled', false);
        $('#btn-finish').fadeIn();
      },
      error: function error(e) {
        $('#notication-send-mail').html('');
        $('#notication').html('<span class="text-center text-danger">Truy vấn thất bại!</span>');
        $('#btn-submit').fadeOut();
        $('#btn-submit').attr('disabled', false);
        $('#btn-finish').fadeIn();
      }
    });
  });
  function validate() {
    var title = $('#slider-name').val();
    var description = $('#slider-description').val();
    var avatar = $('#slider-avatar').val();
    if (!title.length) {
      $('.message-error').html('<span class="text-danger">Tiêu đề slider không được để trống</span>');
      return false;
    } else if (title.length < 2 || title.length > 255) {
      $('.message-error').html('<span class="text-danger">Tiêu đề slider không được nhỏ hơn 2 ký tự hoặc lớn hơn 255 ký tự</span>');
      return false;
    }
    if (!description.length) {
      $('.message-error').html('<span class="text-danger">Nội dung slider phẩm không được để trống</span>');
      return false;
    }
    if (!avatar.length) {
      $('.message-error').html('<span class="text-danger">Ảnh đại diện slider không được để trống</span>');
      return false;
    }
    return true;
  }
  $(document).on('change', '.tbody-slider-status', function () {
    var id = $(this).attr('data-id');
    var type = 0;
    if (this.checked) {
      type = 1;
    }
    var action = 'change-status';
    var _token = $('meta[name="csrf-token"]').attr('content');
    $(this).closest('tr').addClass('change-status');
    $.ajax({
      url: '/admin/slider/update-status',
      type: 'post',
      data: {
        id: id,
        status: type,
        action: action,
        _token: _token
      },
      dataType: 'json',
      success: function success(data) {
        if (data.error === 0) {
          alertifyNote(0, data.message);
        } else {
          alertifyNote(1, data.message);
          if (type) {
            $('.change-status .td-status').html('<div class="form-check form-switch"><input class="form-check-input tbody-category-status" type="checkbox" role="switch" data-id="' + id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Tắt slider" /></div>');
          } else {
            $('.change-status .td-status').html('<div class="form-check form-switch"><input class="form-check-input tbody-category-status" type="checkbox" role="switch" data-id="' + id + '" data-bs-toggle="tooltip" data-bs-placement="top" title="Bật slider" checked /></div>');
          }
        }
        $('tr').removeClass('change-status');
      },
      error: function error(e) {
        alertifyNote(1, 'Truy vấn đến máy chủ thất bại');
      }
    });
  });
  $(document).on('click', '.copy-slider-url', /*#__PURE__*/function () {
    var _ref = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee(e) {
      var copyText;
      return _regeneratorRuntime().wrap(function _callee$(_context) {
        while (1) switch (_context.prev = _context.next) {
          case 0:
            e.preventDefault();
            copyText = $(this).attr('data-slider-url');
            _context.next = 4;
            return parent.navigator.clipboard.writeText(copyText);
          case 4:
            alertifyNote(0, "Sao chép thành công");
          case 5:
          case "end":
            return _context.stop();
        }
      }, _callee, this);
    }));
    return function (_x) {
      return _ref.apply(this, arguments);
    };
  }());
  $('.carousel').slick({
    arrows: true,
    dots: true,
    centerMode: true,
    autoplay: true,
    autoplaySpeed: 1000,
    infinite: true,
    speed: 500,
    fade: true,
    cssEase: 'linear'
  });
});
/******/ })()
;