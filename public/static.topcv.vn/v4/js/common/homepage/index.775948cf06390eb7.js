(() => {
    "use strict";
    var e = {
            60896: (e, o, n) => {
                function t(e, o) {
                    for (var n = 0; n < o.length; n++) {
                        var t = o[n];
                        (t.enumerable = t.enumerable || !1),
                            (t.configurable = !0),
                            "value" in t && (t.writable = !0),
                            Object.defineProperty(e, t.key, t);
                    }
                }
                n.r(o), n.d(o, { CheckPageShowModal: () => a });
                var a = (function () {
                    function e(o) {
                        !(function (e, o) {
                            if (!(e instanceof o))
                                throw new TypeError(
                                    "Cannot call a class as a function"
                                );
                        })(this, e),
                            (this.key = o);
                    }
                    var o, n, a;
                    return (
                        (o = e),
                        (n = [
                            {
                                key: "incrementEventPage",
                                value: function () {
                                    return localStorage.setItem(
                                        this.key,
                                        parseInt(this.getPage()) + 1
                                    );
                                },
                            },
                            {
                                key: "getPage",
                                value: function () {
                                    var e;
                                    return null !==
                                        (e = localStorage.getItem(this.key)) &&
                                        void 0 !== e
                                        ? e
                                        : 0;
                                },
                            },
                            {
                                key: "resetPage",
                                value: function () {
                                    localStorage.setItem(this.key, 0);
                                },
                            },
                        ]) && t(o.prototype, n),
                        a && t(o, a),
                        Object.defineProperty(o, "prototype", { writable: !1 }),
                        e
                    );
                })();
            },
            7927: (e, o, n) => {
                n.r(o), n.d(o, { popupBrandCommunication: () => i });
                var t = n(60896);
                function a(e, o) {
                    for (var n = 0; n < o.length; n++) {
                        var t = o[n];
                        (t.enumerable = t.enumerable || !1),
                            (t.configurable = !0),
                            "value" in t && (t.writable = !0),
                            Object.defineProperty(e, t.key, t);
                    }
                }
                var i = (function () {
                    function e() {
                        !(function (e, o) {
                            if (!(e instanceof o))
                                throw new TypeError(
                                    "Cannot call a class as a function"
                                );
                        })(this, e);
                    }
                    var o, n, i;
                    return (
                        (o = e),
                        (i = [
                            {
                                key: "stopVideo",
                                value: function (e) {
                                    var o = e.querySelector("iframe"),
                                        n = e.querySelector("video");
                                    if (o) {
                                        var t = o.src;
                                        o.src = t;
                                    }
                                    n &&
                                        (($(
                                            "#video-brand-communication"
                                        )[0].src = ""),
                                        n.pause());
                                },
                            },
                            {
                                key: "playVideo",
                                value: function (e) {
                                    $("#video-brand-communication")[0].src =
                                        "https://www.youtube.com/embed/5y9EYHhAwPs?autoplay=1&mute=1";
                                },
                            },
                            {
                                key: "showPopup",
                                value: function () {
                                    var e =
                                        arguments.length > 0 &&
                                        void 0 !== arguments[0] &&
                                        arguments[0];
                                    $("#modal-brand-communication").is(
                                        ":visible"
                                    ) ||
                                        (this.playVideo(),
                                        e
                                            ? $(
                                                  "#modal-brand-communication"
                                              ).addClass("show-footer-checkbox")
                                            : $(
                                                  "#modal-brand-communication"
                                              ).removeClass(
                                                  "show-footer-checkbox"
                                              ),
                                        $("#modal-brand-communication").modal({
                                            backdrop: "static",
                                            keyboard: !1,
                                        }));
                                },
                            },
                            {
                                key: "checkAlreadyShowModal",
                                value: function () {
                                    var e,
                                        o,
                                        n =
                                            null !==
                                                (e = localStorage.getItem(
                                                    "show_popup_brand_community_daily"
                                                )) && void 0 !== e
                                                ? e
                                                : 0,
                                        t =
                                            null !==
                                                (o = localStorage.getItem(
                                                    "dont_show_popup_brand_community"
                                                )) && void 0 !== o
                                                ? o
                                                : 0,
                                        a = new Date().toLocaleDateString(
                                            "en-GB"
                                        );
                                    return !(
                                        (void 0 !==
                                            window.CHECK_SHOW_MODAL_REGISTER_PROX &&
                                            window.CHECK_SHOW_MODAL_REGISTER_PROX) ||
                                        (1 != t && n != a)
                                    );
                                },
                            },
                        ]),
                        (n = [
                            {
                                key: "init",
                                value: function () {
                                    (this.checkPageShowModal =
                                        new t.CheckPageShowModal(
                                            "page_show_popup_brand-communication"
                                        )),
                                        this.handleClosePopup(),
                                        this.handleOpenPopup(),
                                        this.handleShowPopupDaily(),
                                        this.handleClickDontShow();
                                },
                            },
                            {
                                key: "handleClosePopup",
                                value: function () {
                                    $("#modal-brand-communication").on(
                                        "hidden.bs.modal",
                                        function () {
                                            e.stopVideo(this);
                                        }
                                    );
                                },
                            },
                            {
                                key: "handleOpenPopup",
                                value: function () {
                                    $("#modal-brand-communication").on(
                                        "shown.bs.modal",
                                        function () {}
                                    );
                                },
                            },
                            {
                                key: "handleClickDontShow",
                                value: function () {
                                    var e = "dont_show_popup_brand_community",
                                        o = document.querySelector(
                                            "#dont-show_popup_brand_community"
                                        );
                                    o &&
                                        o.addEventListener(
                                            "change",
                                            function (o) {
                                                this.checked
                                                    ? localStorage.setItem(e, 1)
                                                    : localStorage.removeItem(
                                                          e
                                                      );
                                            }
                                        );
                                },
                            },
                            {
                                key: "handleShowPopupDaily",
                                value: function () {
                                    var o = this,
                                        n = "show_popup_brand_community_daily";
                                    new Date().toISOString().slice(0, 10) >
                                        "2023-08-30" &&
                                        setTimeout(function () {
                                            var t,
                                                a,
                                                i =
                                                    null !==
                                                        (t =
                                                            localStorage.getItem(
                                                                n
                                                            )) && void 0 !== t
                                                        ? t
                                                        : 0,
                                                r =
                                                    null !==
                                                        (a =
                                                            localStorage.getItem(
                                                                "dont_show_popup_brand_community"
                                                            )) && void 0 !== a
                                                        ? a
                                                        : 0,
                                                c =
                                                    new Date().toLocaleDateString(
                                                        "en-GB"
                                                    );
                                            i != c &&
                                                3 ==
                                                    o.checkPageShowModal.getPage() &&
                                                o.checkPageShowModal.resetPage(),
                                                o.checkPageShowModal.getPage() <
                                                    3 &&
                                                    o.checkPageShowModal.incrementEventPage(),
                                                (void 0 !==
                                                    window.CHECK_SHOW_MODAL_REGISTER_PROX &&
                                                    window.CHECK_SHOW_MODAL_REGISTER_PROX) ||
                                                    0 != r ||
                                                    i == c ||
                                                    2 !=
                                                        o.checkPageShowModal.getPage() ||
                                                    (localStorage.setItem(n, c),
                                                    e.showPopup(!0));
                                        }, 5e3);
                                },
                            },
                        ]) && a(o.prototype, n),
                        i && a(o, i),
                        Object.defineProperty(o, "prototype", { writable: !1 }),
                        e
                    );
                })();
            },
            77661: (e, o, n) => {
                function t(e, o) {
                    for (var n = 0; n < o.length; n++) {
                        var t = o[n];
                        (t.enumerable = t.enumerable || !1),
                            (t.configurable = !0),
                            "value" in t && (t.writable = !0),
                            Object.defineProperty(e, t.key, t);
                    }
                }
                n.r(o), n.d(o, { default: () => a });
                var a = (function () {
                    function e(o, n) {
                        !(function (e, o) {
                            if (!(e instanceof o))
                                throw new TypeError(
                                    "Cannot call a class as a function"
                                );
                        })(this, e),
                            (this.appUrl = o),
                            (this.pathname = n);
                    }
                    var o, n, a;
                    return (
                        (o = e),
                        (n = [
                            {
                                key: "openApp",
                                value: function () {
                                    var e = this;
                                    (window.location.href = "topcvapp:/".concat(
                                        this.pathname
                                    )),
                                        setTimeout(function () {
                                            -1 ===
                                                navigator.userAgent.indexOf(
                                                    "Safari"
                                                ) ||
                                            -1 !==
                                                navigator.userAgent.indexOf(
                                                    "Chrome"
                                                ) ||
                                            document.webkitHidden
                                                ? document.hasFocus() &&
                                                  e.downloadApp()
                                                : e.downloadApp();
                                        }, 1e3);
                                },
                            },
                            {
                                key: "downloadApp",
                                value: function () {
                                    window.location.href = this.appUrl;
                                },
                            },
                        ]) && t(o.prototype, n),
                        a && t(o, a),
                        Object.defineProperty(o, "prototype", { writable: !1 }),
                        e
                    );
                })();
            },
        },
        o = {};
    function n(t) {
        var a = o[t];
        if (void 0 !== a) return a.exports;
        var i = (o[t] = { exports: {} });
        return e[t](i, i.exports, n), i.exports;
    }
    (n.d = (e, o) => {
        for (var t in o)
            n.o(o, t) &&
                !n.o(e, t) &&
                Object.defineProperty(e, t, { enumerable: !0, get: o[t] });
    }),
        (n.o = (e, o) => Object.prototype.hasOwnProperty.call(e, o)),
        (n.r = (e) => {
            "undefined" != typeof Symbol &&
                Symbol.toStringTag &&
                Object.defineProperty(e, Symbol.toStringTag, {
                    value: "Module",
                }),
                Object.defineProperty(e, "__esModule", { value: !0 });
        });
    var t = {};
    (() => {
        n.r(t);
        var e = n(7927),
            o = n(77661);
        $(document).ready(function () {
            $(".btn-show-video").on("click", function () {
                var o;
                e.popupBrandCommunication.showPopup(),
                    window.trackingTopCV.sendClickBrandCommunicationVideoHeaderbanner();
                var n = "show_popup_brand_community_daily",
                    t =
                        null !== (o = localStorage.getItem(n)) && void 0 !== o
                            ? o
                            : 0,
                    a = new Date().toLocaleDateString("en-GB");
                t != a && localStorage.setItem(n, a);
            }),
                $(".banner-open-app").on("click", function () {
                    var e;
                    new o.default(
                        null !== (e = APP_DOWNLOAD_URL) && void 0 !== e
                            ? e
                            : "",
                        document.location.pathname
                    ).openApp();
                }),
                $(".globe .btn-play-video").on("click", function () {
                    e.popupBrandCommunication.showPopup(),
                        window.trackingTopCV.sendClickBrandCommunicationVideoHeaderbanner();
                });
        });
    })();
})();
