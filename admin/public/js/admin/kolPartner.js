/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/js/admin/kolPartner.js ***!
  \******************************************/
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
  listPage();
  function listPage() {
    $.ajax({
      url: '/admin/kol/get-list-kol',
      // data: { q: q, status_api: status_api, status_sms: status_sms, qtt: qtt, user_id: user_id, phone: phone },
      dataType: 'json',
      beforeSend: function beforeSend() {
        var html = '<td  colspan="14" class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></td>';
        $('tbody').html(html);
      },
      success: function success(data) {
        // console.log(data);
        var html = '';
        if (!data.error) {
          screen_list(data);
        } else {
          html = '<td  colspan="14" class="text-center text-danger">Không có sự kiện trong dữ liệu</td>';
          $('tbody').html(html);
        }
      },
      error: function error(e) {
        var html = '<td  colspan="14" class="text-center text-danger">Truy vấn sự kiện lỗi!</td>';
        $('tbody').html(html);
      }
    });
  }
  function screen_list(data) {
    // console.log(data.role);
    var html = '';
    $.each(data.data['data'], function (index, kolPartner) {
      html += '<tr>';
      // user
      html += '<td class="text-center"> <a href="kol/user-of-kol/' + kolPartner.id + '" >' + kolPartner.name + ' </a></td>';
      html += '<td class="text-center">' + kolPartner.number_user + '</td>';
      // // Nội dung
      html += '<td class="text-center">' + kolPartner.number_user + '</td>';
      if (kolPartner.token) {
        var urlToken = window.location.href + '?token=' + kolPartner.token;
        var urlTokenSortLink = window.location.href + '?token=' + kolPartner.token.substr(0, 16) + '...  ';
        html += '<td data-toggle="tooltip" data-placement="top" title="' + urlToken + '">' + urlTokenSortLink + ' <button type="button" class="btn-clipboard copy-kol-token" title="" data-bs-original-title="Copy to clipboard" data-token="' + urlToken + '"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035c-.01-.004-.019-.001-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"/><path fill="currentColor" d="M19 2a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-2v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h2V4a2 2 0 0 1 2-2zm-4 6H5v12h10zm-5 7a1 1 0 1 1 0 2H8a1 1 0 1 1 0-2zm9-11H9v2h6a2 2 0 0 1 2 2v8h2zm-7 7a1 1 0 0 1 .117 1.993L12 13H8a1 1 0 0 1-.117-1.993L8 11z"/></g></svg></button></td>';
      } else {
        html += '<td></td>';
      }
      // hành động
      html += '<td class="text-center button-action">';
      html += '<button type="button" class="text-center btn btn-sm btn-primary text-light add-user-to-kol m-1" data-name="' + kolPartner.name + '" data-id="' + kolPartner.id + '" data-user_ids="' + kolPartner.user_ids + '" data-rate="' + kolPartner.rate + '" data-toggle="tooltip" data-placement="top" title="Thêm khách hàng vào kol"><i class="bx bx-user-plus" style="margin-right: -2px;"></i></button>';
      html += '<button type="button" class="text-center editClick btn btn-sm btn-warning text-light edit_event m-1" data-action="edit" data-name="' + kolPartner.name + '" data-id="' + kolPartner.id + '" data-user_ids="' + kolPartner.user_ids + '" data-rate="' + kolPartner.rate + '" data-toggle="tooltip" data-placement="top" data-original-title="Chỉnh sửa"><i class="far fa-edit bx bx-edit" style="margin-right: -2px;"></i></button>';
      html += '<button type="button" class="text-center deleteKolBtn btn btn-sm btn-danger action_event m-1" data-action="delete" data-name="' + kolPartner.name + '" data-id="' + kolPartner.id + '" data-user_ids="' + kolPartner.user_ids + '" data-rate="' + kolPartner.rate + '" data-toggle="tooltip" data-placement="top" data-original-title="Xóa sự kiện"><i class="bx bx-trash" style="margin-right: -2px;"></i></button>';
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
    $('#qttVpsSearch').html("<span class='text-primary'>Tổng cộng: " + total + "</span>");
    var html_page = Pagination(total, per_page, current_page, '');
    $('tfoot').html(html_page);
    $('[data-toggle="tooltip"]').tooltip();
    $('.deleteKolBtn').on('click', function (e) {
      e.preventDefault();
      var kolPartnerId = $(this).attr('data-id');
      var name = $(this).attr('data-name');
      $('#btn-finish-delete').fadeOut();
      $('#btn-submit-delete').fadeIn().attr('disabled', false);
      ;
      $('#modal-delete-kol').modal('show');
      $('#modal-delete-kol .modal-title').text('Xóa kol');
      $('#btn-submit-delete').fadeIn().text('Xác nhận').attr('data-action', 'delete').attr('data-id', kolPartnerId);
      $('#delete-kol').html('<div class="text-center">Bạn có muốn xóa kol <strong class="text-danger">' + name + '</strong> này không?</div>');
    });
  }
  $(document).on('click', '.pagination a', function (event) {
    event.preventDefault();
    var page = $(this).attr('data-page');
    $.ajax({
      url: '/admin/khach-hang/get-list-user',
      data: {
        page: page
      },
      dataType: 'json',
      beforeSend: function beforeSend() {
        var html = '<td  colspan="14" class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></td>';
        $('tbody').html(html);
      },
      success: function success(data) {
        var html = '';
        if (data.data != '') {
          screen_list(data);
        } else {
          html = '<td  colspan="14" class="text-center text-danger">Không có sự kiện trong dữ liệu</td>';
          $('tbody').html(html);
        }
      },
      error: function error(e) {
        var html = '<td  colspan="14" class="text-center text-danger">Truy vấn sự kiện lỗi!</td>';
        $('tbody').html(html);
      }
    });
  });
  $('#btn-finish').fadeOut();
  $(document).on('click', '.editClick', function (e) {
    e.preventDefault();
    $('#btn-finish').fadeOut();
    $('#body-kol-form').removeAttr('hidden');
    $('#temp-form').attr("hidden", true);
    $('#btn-submit-kol').fadeIn().attr('disabled', false);
    var kolPartnerId = $(this).attr('data-id');
    var kolPartnerName = $(this).attr('data-name');
    var kolPartnerRate = $(this).attr('data-rate');
    var kolPartnerUserIds = $(this).attr('data-user_ids');
    if (kolPartnerUserIds) {
      kolPartnerUserIds = JSON.parse("[" + kolPartnerUserIds + "]");
      if (typeof kolPartnerUserIds != "undefined" && kolPartnerUserIds) {
        $("#select-user-ids").val(kolPartnerUserIds).trigger('change');
      }
    }
    $('#kol-id').val(kolPartnerId);
    $('#kol-rate').val(kolPartnerRate);
    $('#kol-name').val(kolPartnerName);
    clearErrorKolName();
    clearErrorKolRate();
    $('#modal-create-kol .modal-title').text('Chỉnh sửa kol');
    $('#modal-create-kol').modal('show');
  });
  $(document).on('click', '.add-user-to-kol', function (e) {
    e.preventDefault();
    var kolPartnerUserIds = $(this).attr('data-user_ids');
    var kolPartnerId = $(this).attr('data-id');
    var kolPartnerName = $(this).attr('data-name');
    if (kolPartnerUserIds) {
      kolPartnerUserIds = JSON.parse("[" + kolPartnerUserIds + "]");
      if (typeof kolPartnerUserIds != "undefined" && kolPartnerUserIds) {
        $("#select-user-id-box-add-user").val(kolPartnerUserIds).trigger('change');
      }
    }
    $('#temp-add-user-form').html('');
    $('#btn-finish-add-user').fadeOut();
    $('#btn-submit-add-user').fadeIn().attr('disabled', false);
    ;
    $('#add-user-to-ko-modal').removeAttr("hidden", true);
    $('#modal-add-user-to-kol').modal('show');
    $('#modal-add-user-to-kol .modal-title').text('Thêm người dùng cho ' + kolPartnerName);
    $('#kol-id-parent').val(kolPartnerId);
  });
  $('#btn-submit-add-user').click(function (e) {
    e.preventDefault();
    var id = $('#kol-id-parent').val();
    var userIds = $("#select-user-id-box-add-user").val();
    $.ajax({
      data: {
        id: id,
        user_ids: userIds
      },
      url: "/admin/kol/create-or-update",
      type: 'post',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      beforeSend: function beforeSend() {
        var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
        $('#add-user-to-ko-modal').attr("hidden", true);
        $('#temp-add-user-form').html(html);
        $('#btn-submit-add-user').attr('disabled', true);
      },
      success: function success(data) {
        $('#btn-submit-add-user').fadeOut();
        if (data.error === 0) {
          $('#temp-add-user-form').html('<div class="text-center text-success">' + data.message + '</div>');
          listPage();
        } else {
          $('#temp-add-user-form').html('<div class="text-center text-danger">' + data.message + '</div>');
        }
        $('#btn-finish-add-user').fadeIn().attr('disabled', false);
      },
      error: function error(data) {
        var message = data.responseJSON.message ? data.responseJSON.message : 'Truy vấn thất bại!';
        $('#temp-add-user-form').html('<div class="text-center"><span class="text-center text-danger">' + message + '</span><div>');
        $('#btn-submit-add-user').fadeOut().attr('disabled', false);
        $('#btn-finish-add-user').fadeIn();
      }
    });
  });
  $(document).on('click', '.copy-kol-token', /*#__PURE__*/function () {
    var _ref = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee(e) {
      var copyText;
      return _regeneratorRuntime().wrap(function _callee$(_context) {
        while (1) switch (_context.prev = _context.next) {
          case 0:
            e.preventDefault();
            copyText = $(this).attr('data-token');
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
  $('#btn-submit-delete').click(function (e) {
    e.preventDefault();
    id = $(this).attr('data-id');
    $.ajax({
      data: $('#kol-form').serialize(),
      url: "/admin/kol/delete/" + id,
      type: 'delete',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      beforeSend: function beforeSend() {
        var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
        $('#delete-kol').html(html);
        $('#btn-submit-delete').attr('disabled', true);
      },
      success: function success(data) {
        $('#btn-submit-delete').fadeOut();
        if (data.error === 0) {
          $('#delete-kol').html('<div class="text-center text-success">' + data.message + '</div>');
          listPage();
        } else {
          $('#delete-kol').html('<div class="text-center text-danger">' + data.message + '</div>');
        }
        $('#btn-finish-delete').fadeIn().attr('disabled', false);
      },
      error: function error(data) {
        var message = data.responseJSON.message ? data.responseJSON.message : 'Truy vấn thất bại!';
        $('#delete-kol').html('<div class="text-center"><span class="text-center text-danger">' + message + '</span><div>');
        $('#btn-submit-delete').fadeOut().attr('disabled', false);
        $('#btn-finish-delete').fadeIn();
      }
    });
  });
  $("#select-user-ids").select2({
    theme: "bootstrap-5",
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
  });
  $("#select-user-id-box-add-user").select2({
    theme: "bootstrap-5",
    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style'
  });
  $('#btn-create-kol').on('click', /*#__PURE__*/_asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee2() {
    return _regeneratorRuntime().wrap(function _callee2$(_context2) {
      while (1) switch (_context2.prev = _context2.next) {
        case 0:
          $('#body-kol-form').removeAttr('hidden');
          $('#temp-form').attr("hidden", true);
          clearErrorKolName();
          clearErrorKolRate();
          $("#select-user-ids").val([]).trigger('change');
          $('#kol-rate').val(null);
          $('#kol-name').val(null);
          $('#btn-finish').fadeOut();
          $('#btn-submit-kol').fadeIn().attr('disabled', false);
          $('#modal-create-kol .modal-title').text('Tạo kol');
          $('#modal-create-kol').modal('show');
        case 11:
        case "end":
          return _context2.stop();
      }
    }, _callee2);
  })));
  function clearErrorKolName() {
    $('#error-kol-name').attr("hidden", true);
    $('#error-kol-name').text('');
    $('#kol-name').removeClass('font-weight-normal border border-danger');
  }
  function clearErrorKolRate() {
    $('#error-kol-rate').attr("hidden", true);
    $('#error-kol-rate').text('');
    $('#kol-rate').removeClass('font-weight-normal border border-danger');
  }
  $('#btn-submit-kol').click(function (e) {
    e.preventDefault();
    var kolRate = $('#kol-rate').val();
    var kolName = $('#kol-name').val();
    var isValidateRate = true;
    var isValidateName = true;
    if (parseInt(kolRate) > 100 || !kolRate) {
      isValidateRate = false;
      $('#error-kol-rate').removeAttr('hidden');
      $('#error-kol-rate').text('Chiết khấu không được bỏ trống và phải nhỏ hớn 100%.');
      $('#kol-rate').addClass('font-weight-normal border border-danger');
    } else {
      isValidateRate = true;
      clearErrorKolRate();
    }
    if (!kolName || kolName.length > 255) {
      isValidateName = false;
      $('#error-kol-name').removeAttr('hidden');
      $('#error-kol-name').text('Tên không được bỏ trống và phải nhỏ hớn 255 kí tự.');
      $('#kol-name').addClass('font-weight-normal border border-danger');
    } else {
      isValidateName = true;
      clearErrorKolName();
    }
    if (isValidateName && isValidateRate) {
      $('#body-kol-form').attr("hidden", true);
      $('#temp-form').removeAttr('hidden');
      $.ajax({
        data: $('#kol-form').serialize(),
        url: "kol/create-or-update",
        type: "POST",
        dataType: 'json',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function beforeSend() {
          $('#temp-form').html('');
          var html = '<div class="text-center"><div class="vong-xoay"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div></div>';
          $('#temp-form').html(html);
          $('#btn-submit-kol').attr('disabled', true);
        },
        success: function success(data) {
          $('#btn-submit-kol').fadeOut();
          if (data.error === 0) {
            $('#temp-form').html('<div class="text-center text-success">' + data.message + '</div>');
            listPage();
          } else {
            $('#temp-form').html('<div class="text-center text-danger">' + data.message + '</div>');
          }
          $('#btn-finish').fadeIn();
        },
        error: function error(data) {
          $('#body-kol-form').attr("hidden", true);
          $('#temp-form').html('<div class="text-center"><span class="text-center text-danger">Truy vấn thất bại!</span><div>');
          $('#btn-submit-kol').fadeOut().attr('disabled', false);
          $('#btn-finish').fadeIn();
        }
      });
    }
  });
});
/******/ })()
;