'use strict';

//PLUGINS
/* metismenu - v2.0.2 https://github.com/onokumus/metisMenu - Under MIT License  */
!function (a) { "use strict"; function b() { var a = document.createElement("mm"), b = { WebkitTransition: "webkitTransitionEnd", MozTransition: "transitionend", OTransition: "oTransitionEnd otransitionend", transition: "transitionend" }; for (var c in b) if (void 0 !== a.style[c]) return { end: b[c] }; return !1 } function c(b) { return this.each(function () { var c = a(this), d = c.data("mm"), f = a.extend({}, e.DEFAULTS, c.data(), "object" == typeof b && b); d || c.data("mm", d = new e(this, f)), "string" == typeof b && d[b]() }) } a.fn.emulateTransitionEnd = function (b) { var c = !1, e = this; a(this).one("mmTransitionEnd", function () { c = !0 }); var f = function () { c || a(e).trigger(d.end) }; return setTimeout(f, b), this }; var d = b(); d && (a.event.special.mmTransitionEnd = { bindType: d.end, delegateType: d.end, handle: function (b) { return a(b.target).is(this) ? b.handleObj.handler.apply(this, arguments) : void 0 } }); var e = function (b, c) { this.$element = a(b), this.options = a.extend({}, e.DEFAULTS, c), this.transitioning = null, this.init() }; e.TRANSITION_DURATION = 350, e.DEFAULTS = { toggle: !0, doubleTapToGo: !1, activeClass: "active" }, e.prototype.init = function () { var b = this, c = this.options.activeClass; this.$element.find("li." + c).has("ul").children("ul").addClass("collapse in"), this.$element.find("li").not("." + c).has("ul").children("ul").addClass("collapse"), this.options.doubleTapToGo && this.$element.find("li." + c).has("ul").children("a").addClass("doubleTapToGo"), this.$element.find("li").has("ul").children("a").on("click.metisMenu", function (d) { var e = a(this), f = e.parent("li"), g = f.children("ul"); return d.preventDefault(), f.hasClass(c) ? b.hide(g) : b.show(g), b.options.doubleTapToGo && b.doubleTapToGo(e) && "#" !== e.attr("href") && "" !== e.attr("href") ? (d.stopPropagation(), void (document.location = e.attr("href"))) : void 0 }) }, e.prototype.doubleTapToGo = function (a) { var b = this.$element; return a.hasClass("doubleTapToGo") ? (a.removeClass("doubleTapToGo"), !0) : a.parent().children("ul").length ? (b.find(".doubleTapToGo").removeClass("doubleTapToGo"), a.addClass("doubleTapToGo"), !1) : void 0 }, e.prototype.show = function (b) { var c = this.options.activeClass, f = a(b), g = f.parent("li"); if (!this.transitioning && !f.hasClass("in")) { g.addClass(c), this.options.toggle && this.hide(g.siblings().children("ul.in")), f.removeClass("collapse").addClass("collapsing").height(0), this.transitioning = 1; var h = function () { f.removeClass("collapsing").addClass("collapse in").height(""), this.transitioning = 0 }; return d ? void f.one("mmTransitionEnd", a.proxy(h, this)).emulateTransitionEnd(e.TRANSITION_DURATION).height(function () { try { return f[0].scrollHeight } catch (e) { return 0 } }) : h.call(this) } }, e.prototype.hide = function (b) { var c = this.options.activeClass, f = a(b); if (!this.transitioning && f.hasClass("in")) { f.parent("li").removeClass(c), f.height(f.height())[0].offsetHeight, f.addClass("collapsing").removeClass("collapse").removeClass("in"), this.transitioning = 1; var g = function () { this.transitioning = 0, f.removeClass("collapsing").addClass("collapse") }; return d ? void f.height(0).one("mmTransitionEnd", a.proxy(g, this)).emulateTransitionEnd(e.TRANSITION_DURATION) : g.call(this) } }; var f = a.fn.metisMenu; a.fn.metisMenu = c, a.fn.metisMenu.Constructor = e, a.fn.metisMenu.noConflict = function () { return a.fn.metisMenu = f, this } }(jQuery);

/* JavaScript Cookie v2.0.3 - https://github.com/js-cookie/js-cookie - Released under the MIT license */
(function (n) { if (typeof define == "function" && define.amd) define(n); else if (typeof exports == "object") module.exports = n(); else { var i = window.Cookies, t = window.Cookies = n(); t.noConflict = function () { return window.Cookies = i, t } } })(function () { function n() { for (var n = 0, r = {}, t, i; n < arguments.length; n++) { t = arguments[n]; for (i in t) r[i] = t[i] } return r } function t(i) { function r(t, u, f) { var o, s; if (arguments.length > 1) { f = n({ path: "/" }, r.defaults, f); typeof f.expires == "number" && (s = new Date, s.setMilliseconds(s.getMilliseconds() + f.expires * 864e5), f.expires = s); try { o = JSON.stringify(u); /^[\{\[]/.test(o) && (u = o) } catch (y) { } return u = encodeURIComponent(String(u)), u = u.replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent), t = encodeURIComponent(String(t)), t = t.replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent), t = t.replace(/[\(\)]/g, escape), document.cookie = [t, "=", u, f.expires && "; expires=" + f.expires.toUTCString(), f.path && "; path=" + f.path, f.domain && "; domain=" + f.domain, f.secure ? "; secure" : ""].join("") } t || (o = {}); for (var l = document.cookie ? document.cookie.split("; ") : [], a = /(%[0-9A-Z]{2})+/g, h = 0; h < l.length; h++) { var v = l[h].split("="), c = v[0].replace(a, decodeURIComponent), e = v.slice(1).join("="); e.charAt(0) === '"' && (e = e.slice(1, -1)); try { if (e = i && i(e, c) || e.replace(a, decodeURIComponent), this.json) try { e = JSON.parse(e) } catch (y) { } if (t === c) { o = e; break } t || (o[c] = e) } catch (y) { } } return o } return r.get = r.set = r, r.getJSON = function () { return r.apply({ json: !0 }, [].slice.call(arguments)) }, r.defaults = {}, r.remove = function (t, i) { r(t, "", n(i, { expires: -1 })) }, r.withConverter = t, r } return t() });

//VARAIBLES
var obj;
var device_screen_size = "";
var arrBgImage = [];
var timer;
var index = 0;
var color;
var wh = 1300;
var hh = 768;
var current_url = window.location.href;

//ANIMATIONS
function cssInit(delay, speed) {
    delay += 'ms';
    speed += 'ms';
    return {
        'transition-duration': speed,
        'animation-duration': speed,
        'transition-timing-function': 'ease',
        'transition-delay': delay
    };
}
var animaTimeout = [];
var animaTimeout_2 = [];
var default_anima = "fade-in";
function initAnima(obj) {
    (function ($) {
        var da = $(obj).attr("data-anima");
        var an = $(obj).find(".anima,*[data-anima]");
        var t = $(obj).attr("data-time");
        var ta = $(obj).attr("data-target");
        var tm = $(obj).attr("data-timeline");
        var tmt = $(obj).attr("data-timeline-time");
        var tr = $(obj).attr("data-trigger");
        var len = $(an).length;
        if (da == "default") da = default_anima;
        if (isEmpty(tmt)) tmt = 300;
        if (isEmpty(an)) an = obj;
        $(an).each(function (i) {
            if (!isEmpty($(this).attr("data-anima")) && i == 0) { an = obj; return false; }
        });
        if (!isEmpty(ta)) an = $(ta);
        if (isEmpty(t)) t = 300;
        var time = 0, p = 1;
        if (!isEmpty(tm) && tm == "desc") { time = (len - 1) * tmt; p = -1 };
        var cont = null;
        $(an).each(function (index) {
            var time_now = time;
            if (index == len - 1 && tm == "desc") time_now = 0;
            if (!$(this).hasClass("anima") && an != obj && isEmpty(ta)) {
                cont = this;
            } else {
                if (cont != null && !$.contains(cont, this) || cont == null) {
                    var tobj = this;
                    var pos = $(this).css("position");
                    if (pos != 'absolute' && pos != 'fixed') $(this).css("position", "relative");
                    var aid = Math.random(5) + "";
                    $(tobj).attr("aid", aid);
                    if (animaTimeout.length > 30) {
                        animaTimeout.shift();
                        animaTimeout_2.shift();
                    }
                    animaTimeout.push([aid, setTimeout(function () {
                        $(tobj).css(cssInit(0, 0));
                        var da_ = da;
                        if (!isEmpty($(tobj).attr('class')) && $(tobj).attr('class').indexOf("anima-") != -1) {
                            var arr_a = $(tobj).attr('class').split(" ");
                            for (var i = 0; i < arr_a.length; i++) {
                                if (arr_a[i].indexOf("anima-") != -1) da_ = arr_a[i].replace("anima-", "");
                            }
                        }
                        if (wh < 768 && (isEmpty(tr) || tr == "scroll" || tr == "load")) da_ = "fade-in";
                        animaTimeout_2.push([aid, setTimeout(function () { $(tobj).css(cssInit(0, t)).addClass(da_); $(tobj).css('opacity', '') }, 100)]);
                    }, time_now)]);
                    if (!isEmpty(tm)) time += tmt * p;
                }
            }
        });
    }(jQuery));
}
function outAnima(obj) {
    (function ($) {
        var da = $(obj).attr("data-anima");
        var an = $(obj).find(".anima,*[data-anima]");
        var t = $(obj).attr("data-time");
        var o = $(obj).attr("data-anima-out");
        var ta = $(obj).attr("data-target");
        if (da == "default") da = default_anima;
        if (isEmpty(an)) an = obj;
        if (!isEmpty(ta)) an = $(ta);
        if (isEmpty(t)) t = 300;
        if (isEmpty(o)) o = "back";
        if ((o == "back") || (o == "hide")) {
            var cont = null;
            $(an).each(function () {
                var aid = $(this).attr("aid");
                if (!isEmpty(aid)) {
                    for (var i = 0; i < animaTimeout.length; i++) {
                        if (animaTimeout[i][0] == aid) {
                            clearTimeout(animaTimeout[i][1]);
                        }
                    }
                    for (var i = 0; i < animaTimeout_2.length; i++) {
                        if (animaTimeout_2[i][0] == aid) {
                            clearTimeout(animaTimeout_2[i][1]);
                        }
                    }
                }
                if (!$(this).hasClass("anima") && an != obj) {
                    cont = this;
                } else {
                    if (cont != null && !$.contains(cont, this) || cont == null) {
                        var pos = $(this).css("position");
                        if (pos != 'absolute' && pos != 'fixed') $(this).css("position", "relative");
                        var da_ = da;
                        try {
                            if ($(this).attr('class').indexOf("anima-") != -1) {
                                var arr_a = $(this).attr('class').split(" ");
                                for (var i = 0; i < arr_a.length; i++) {
                                    if (arr_a[i].indexOf("anima-") != -1) da_ = arr_a[i].replace("anima-", "");
                                }
                            }
                        } catch (e) { }
                        $(this).css(cssInit(0, t)).removeClass(da_);
                        var op = parseFloat($(this).css("opacity"));
                        if (op > 0 && op < 1) $(this).css("opacity", 1);
                    }
                }
            });
            if (o == "hide") {
                $(an).css(cssInit(0, t)).css("opacity", 0);
                setTimeout(function () { $(an).css("opacity", 0); }, 400);
            }
        }
    }(jQuery));
}

//OTHERS
window.onload = function () { function a(a, b) { var c = /^(?:file):/, d = new XMLHttpRequest, e = 0; d.onreadystatechange = function () { 4 == d.readyState && (e = d.status), c.test(location.href) && d.responseText && (e = 200), 4 == d.readyState && 200 == e && (a.outerHTML = d.responseText) }; try { d.open("GET", b, !0), d.send() } catch (f) { } } var b, c = document.getElementsByTagName("*"); for (b in c) c[b].hasAttribute && c[b].hasAttribute("data-include") && a(c[b], c[b].getAttribute("data-include")) };

//FUNCTIONS
function openWindow(link, width, height) {
    if (typeof width === 'undefined') width = 550;
    if (typeof height === 'undefined') height = 350;
    var left = (screen.width / 2) - (width / 2);
    var top = (screen.height / 2) - (height / 2);
    window.open(link, 'targetWindow', 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=' + width + ',height=' + height + ', top=' + top + ', left=' + left);
    return false;
}
function changeBG() {
    var objTmp = jQuery(".overlay");
    objTmp.removeClass("fadeOut"); objTmp.css("background-color", color); objTmp.addClass("fadeIn");
    setTimeout(function () {
        if (arrBgImage.length == index) index = 0;
        jQuery("html").css("background-image", "url(" + arrBgImage[index] + ")");
        objTmp.removeClass("fadeIn"); objTmp.addClass("fadeOut");
    }, 1000);
    index = index + 1;
}
function onePageScroll(t) {
    if (!isEmpty(t)) {
        jQuery(t).find('a[href ^= "#"]').on('click', function (e) {
            e.preventDefault();
            var target = this.hash,
            jtarget = jQuery(target);
            if (jtarget.length > 0) {
                if (target.indexOf('collapse') == -1) {
                    try {
                        jQuery('html, body').stop().animate({
                            'scrollTop': (jtarget.offset().top - 150)
                        }, 900, 'swing', function () {
                            window.location.hash = target;
                        });
                    } catch (e) { }
                }
            } else {
                if (target != "#" && target.length > 2 && jQuery(this).closest("header").length) document.location = window.location.protocol + "//" + window.location.host;
            }
        });
    }
}
function getOptionsString(txt, mainArray) {
    var optionsArr = txt.split(",");
    for (var i = 0; i < optionsArr.length; i++) {
        mainArray[optionsArr[i].split(":")[0]] = correctValue(optionsArr[i].split(":")[1]);
    }
    return mainArray;
}
function isEmpty(obj) { if (typeof (obj) !== "undefined" && obj !== null && (obj.length > 0 || typeof (obj) == 'number' || typeof (obj.length) == "undefined") && obj !== "undefined") return false; else return true; }
function correctValue(n) { return typeof n == "number" ? parseFloat(n) : n == "true" ? !0 : n == "false" ? !1 : n }
function isScrollView(t) {
    var tp = jQuery(window).height() * 0.5 + jQuery(window).scrollTop();
    var e = jQuery(t).offset().top;
    if ((e < (tp + 300) || ((jQuery(window).scrollTop() + jQuery(window).height() == jQuery(document).height())))) return true;
    else return false;
}

//MAIN BLOCK
(function ($) {
    var arrFA = [];

    //FUNCTIONS
    $.fn.toggleClick = function (n) { var t = arguments, r = n.guid || $.guid++, i = 0, u = function (r) { var u = ($._data(this, "lastToggle" + n.guid) || 0) % i; return $._data(this, "lastToggle" + n.guid, u + 1), r.preventDefault(), t[u].apply(this, arguments) || !1 }; for (u.guid = r; i < t.length;) t[i++].guid = r; return this.click(u) };
    $.fn.showAnima = function (a, b) {
        var t = this;
        if (a == "default") a = default_anima;
        $(t).removeClass(a);
        if (!isEmpty(b) && b == "complete") { $(t).attr("data-anima", a).attr("data-trigger", "manual"); initAnima(t); }
        else setTimeout(function () { $(t).css(cssInit(0, 300)).addClass(a); $(t).css('opacity', '') }, 100);
    };
    $.fn.titleFullScreen = function (h) {
        if (!isEmpty(this)) {
            var o = $(this).find(".overlaybox");
            $(this).sizeFullScreen(h);
            if (!($("header").css("position") == "absolute") && !($("header").css("position") == "fixed")) {
                $(this).css("height", $(this).height() - $("header").height() + "px");
            }
            if (!isEmpty(o)) $(o).css("margin-top", "-" + $(o).height() / 2 - 10 + "px");
        }
    }
    $.fn.sizeFullScreen = function (h) {
        if (!isEmpty(this)) {
            var h = $(window).outerHeight() - parseInt($(this).css("margin-top").replace("px", ""), 10) - parseInt($(this).css("margin-bottom").replace("px", ""), 10) - ((isEmpty(h)) ? 0 : parseInt(h, 10));
            if (h > $(this).height()) $(this).css("height", h + "px");
        }
    }
    $.fn.setMiddleBox = function (target) {
        if (isEmpty(target)) target = ".box-middle";
        var t = $(this).find(target);
        var a = parseInt($(this).outerHeight(), 10);
        var b = parseInt($(t).outerHeight(true), 10);
        if (b < a) $(t).css("margin-top", (a - b) / 2 + "px");
    }
    $.fn.scrollTo = function () {
        if (!isEmpty(this)) {
            $('html, body').animate({
                scrollTop: $(this).offset().top - 50
            }, 1000);
        }
    }
    $.fn.expandItem = function () {
        var t = this;
        $(t).css("display", "block").css("height", "");
        var h = $(t).height();
        $(t).css("height", 0).css("opacity", 1);
        $(t).animate({
            height: h
        }, 300, function () { $(t).css("height", "") });
    }
    $.fn.collapseItem = function () {
        var t = this;
        $(t).animate({
            height: 0
        }, 300, function () { $(t).css("display", "none") });
    }
    $.fn.setVideoBgSize = function (hh, wh) {
        var obj = this;
        var cH = hh;
        var cW = wh;
        if ($(this).hasClass("section-bg-video") || $(this).hasClass("header-video")) {
            obj = $(this).find("video");
            cH = $(this).height();
            cW = $(this).width();
        }
        if (wh > 992 && $(this).find("iframe").length) $(this).find(".videobox").css("height", "130%");
        var vidH = $(obj).height();
        var vidW = $(obj).width();

        var proportion = cH / vidH;
        var newWidth = vidW * proportion;
        if (newWidth / vidW > 1 && ($(window).width() < newWidth && vidH < $(this).height() || $(window).width() < 769)) {
            $(obj).css("width", Math.ceil(newWidth) + "px");
            $(obj).css("margin-left", "-" + Math.floor(((newWidth - cW) / 2)) + "px");
        }
    }
    $.fn.getHeight = function () {
        if (!isEmpty(this)) return $(this)[0].clientHeight;
        else return 0;
    }
    $(document).ready(function () {
        //DEVICE SIZE
        wh = $(window).width();
        hh = $(window).height();
        if (wh < 993) device_screen_size = "device-xs";
        if (wh > 992 && wh < 1200) device_screen_size = "device-m";
        if (wh > 1200) device_screen_size = "device-l";
        $("body").addClass(device_screen_size);

        //VIDEO BG
        $(".background-page video,.section-bg-video,.header-video").each(function () {
            $(this).setVideoBgSize(hh, wh);
        });

        //SOCIAL
        $("body").on("click", "[data-social]", function () {
            var a = $(this).attr("data-social");
            var link = $(this).attr("data-social-url");
            var purl = link;
            if (isEmpty(link)) purl = window.location.href;

            var url = 'https://www.facebook.com/sharer/sharer.php?u=' + purl;
            if (a == 'share-twitter') {
                url = 'https://twitter.com/intent/tweet?text=' + $('meta[name=description]').attr("content");
                if (!isEmpty(link)) url = 'https://twitter.com/intent/tweet?url=' + link;
            }
            if (a == 'share-google') url = 'https://plus.google.com/share?url=' + purl;
            if (a == 'share-linkedin') url = 'https://www.linkedin.com/shareArticle?url=' + purl;
            openWindow(url);
        });

        //MENU - MOBILE
        $(".navbar-toggle").toggleClick(function () {
            $(this).closest('.navbar').find('.navbar-collapse').expandItem();
        }, function () {
            $(this).closest('.navbar').find('.navbar-collapse').collapseItem();
            $(".subline-bar ul").hide();
        });

        //MENU - FIXED TOP
        setTimeout(function () {
            if (isEmpty($("header").attr("data-menu-eight"))) $("header.fixed-top").css("height", $("header > div").height() + "px");
            else $("header").css("height", $("header").attr("data-menu-eight") + "px");
        }, 150);

        //COMPONENT - FIXED AREA
        $(".fixed-area").each(function (i) {
            $(this).css("width", $(this).width() + "px");
            var top = $(this).attr("data-topscroll");
            if (isEmpty(top)) top = $("header div").outerHeight(true);
            arrFA[i] = [$(this).offset().top, $(this).offset().left, top];
            $(this).closest(".section-item").css("z-index", "4").css("overflow", "visible");
        });

        //ANIMATIONS
        $('*[data-anima]').each(function () {
            var tr = $(this).attr("data-trigger");
            if (isEmpty(tr) || tr == "scroll" || tr == "load") {
                var an = $(this).find(".anima,*[data-anima]");
                if (isEmpty(an)) an = this;
                var cont = null;
                var x = 0;
                $(an).each(function () {
                    if (!$(this).hasClass("anima") && an != this) {
                        cont = this;
                    } else {
                        if (cont != null && !$.contains(cont, this) || cont == null) {
                            $(this).css("opacity", 0);
                            x++;
                        }
                    }
                });
                if (x == 0) $(this).css("opacity", 0);
            }
            if (!isEmpty(tr) && tr == "load") initAnima(this);
        });

        $("body").on("click", '*[data-anima]*[data-trigger="click"]', function () {
            outAnima(this);
            initAnima(this);
        });
        $('*[data-anima]*[data-trigger="hover"]').mouseenter(function () {
            initAnima(this);
        }).mouseleave(function () {
            $(this).stop(true, false);
            outAnima(this);
        });

        //MENU
        $("body").on("click", ".nav > li", function () {
            var n = $(this).closest('.nav');
            $(n).find("li").removeClass("active").removeClass("current-active");
            $(this).addClass("active current-active");
        });

        //MENU ANIMATIONS
        if (device_screen_size != "device-xs") {
            $("[data-menu-anima]").each(function () {
                var a = $(this).closest("[data-menu-anima]").attr("data-menu-anima");
                $(this).find("ul:not(.side-menu):first-child li").hover(function () {
                    $(this).find(" > ul, > .mega-menu").css("opacity", 0).css("transition-duration", "0ms").showAnima(a);
                });
                $(this).find(".side-menu li").hover(function () {
                    $(this).find(".panel").css("opacity", 0).css("transition-duration", "0ms").showAnima(a);
                });
                if ($(this).hasClass("side-menu-lateral")) {
                    $(this).find(".side-menu li").hover(function () {
                        $(this).find("ul").css("opacity", 0).css("transition-duration", "0ms").showAnima(a);
                    });
                }
            });
            $(".nav > li").hover(function (e) {
                $(this).closest(".nav").find("li").removeClass("open");
            });
        }

        //MENU - SIDE
        function hide_mobile_menu(t) {
            var a = $(t).attr("data-menu-anima");
            if (isEmpty(a)) a = "fade-in";
            $(".hamburger-menu,.side-menu-fixed").css("visibility", "hidden").css("opacity", "0").removeClass(a);
            $(t).removeClass("active");
            $("body").css("overflow", "");
        }
        function show_mobile_menu(t) {
            var a = $(t).attr("data-menu-anima");
            if (isEmpty(a)) a = "fade-in";
            $(".hamburger-menu,.side-menu-fixed").css("visibility", "visible").showAnima(a);
            $(t).addClass("active");
            if (device_screen_size == "device-xs") $("body").css("overflow", "hidden");
        }
        if (device_screen_size == "device-xs") {
            $(".side-menu li > ul.collapse").each(function () {
                $(this).css("height", "0px");
            });

            $("body").on("click", ".side-menu > li.panel-item", function (e) {
                if ($(e.target).closest(".collapse").length == 0) $(this).toggleClass("active");
            });

            $("body").on("click", ".side-menu > li", function () {
                var t = this;
                $(".side-menu > li").each(function () {
                    if (t !== this) {
                        $(this).removeClass("active");
                        $(this).find(".collapse").removeClass("in").removeClass("open");
                        $(this).find("> ul.collapse").css("height", "0px");
                    }
                });
                hide_mobile_menu($(".hamburger-button"));
            });
        }
        if ($(".side-menu-fixed").length) {
            var mh = $(window).height() - ($('.side-menu-fixed .top-area').outerHeight(true) + $('.side-menu-fixed .bottom-area').outerHeight(true));
            $('.side-menu-fixed .sidebar').css('height', mh + "px");
            $(".side-menu-fixed .scroll-content").attr("data-height", mh);

            if ($.isFunction($.fn.slimScroll)) {
                $("body").on("click", ".side-menu li", function () {
                    $(".side-menu-fixed .scroll-content").slimScroll();
                });
            }
        }
        $("body").on("click", ".side-menu .panel-item", function () {
            $(this).find(".panel").toggleClass("open");
        });
        $("body").on("click", ".side-menu .panel-item li", function () {
            $(this).closest(".panel").toggleClass("open");
        });
        $(".side-menu").each(function () {
            if ($.isFunction($.fn.metisMenu)) $(this).metisMenu();
        });
        $(".one-page-menu,.navbar-nav.inner,.side-menu").each(function () {
            onePageScroll(this);
        });
        if ($('.side-menu .panel-item').length) {
            var width = $(".side-menu-fixed").css("width");
            $('.side-menu .panel-item .panel').css("left", width);
        }

        //HAMBURGER BUTTON
        $(".hamburger-button").toggleClick(function () {
            show_mobile_menu(this);
        }, function () {
            if ($(this).hasClass("active")) hide_mobile_menu(this);
            else show_mobile_menu(this);
        });

        //OTHERS
        $('a[href="#"]').on('click', function (e) {
            e.preventDefault();
        });

        $("body").on("click", ".img-box .caption", function () {
            $(this).closest(".img-box").find("a.img-box").click();
        });

        $(".grid-list[class^='row-'], .grid-list[class*=' row-'],.maso-list[class^='row-'], .maso-list[class*=' row-']").each(function () {
            var css = $.grep(this.className.split(" "), function (v, i) {
                return v.indexOf('row') === 0;
            }).join();
            $(this).find(".grid-item > *,.grid-item .flexslider li > *").addClass(css);
        });

        $(".header-slider,.header-video,.header-title").setMiddleBox(".container > div");
        $(".full-screen-title .container > div").css("margin-top", "");

        $(".full-screen-size").each(function () {
            var h = $(this).attr("data-sub-height");
            $(this).sizeFullScreen((isEmpty(h) ? null : h));
        });
        $(".full-screen-title").each(function () {
            var h = $(this).attr("data-sub-height");
            $(this).titleFullScreen((isEmpty(h) ? null : h));
        });
        $(".box-middle-container").each(function () {
            $(this).setMiddleBox();
        });
        $(".social-group-button").toggleClick(function () {
            $(this).find(".social-group").css("display", "block");
            $(this).find(".social-group i").showAnima("fade-left");
        }, function () {
            $(this).find(".social-group").css("display", "none");
            $(this).find(".social-group i").css("opacity", "0");
        });
        if (device_screen_size != "device-xs") {
            $(".section-two-blocks .content").each(function () {
                var t = this;
                setTimeout(function () {
                    var tmp = $(t).closest(".section-two-blocks");
                    if (isEmpty($(tmp).attr("data-parallax"))) $(tmp).css("height", $(t).outerHeight());
                    $(tmp).renderLoadedImgs();
                }, 300);
            });
        }

        //WORDPRESS
        if ($("#wpadminbar").length) {
            if ($("header").hasClass("fixed-top")) $("header > .navbar").css("margin-top", "32px");
            if ($("header").hasClass("side-menu-header")) $("header .side-menu-fixed,header .navbar-fixed-top").css("margin-top", "32px");
        }
        $("header a").each(function () {
            if ($(this).attr("href") == current_url) {
                if ($(this).closest(".dropdown-menu").length) $(this).closest(".dropdown").addClass("active");
                else $(this).closest("li").addClass("active");
            }
        });

        //BACKGROUND VIDEO YT
        $("*[data-video-youtube]").each(function () {
            var id = $(this).attr("data-video-youtube");
            if (id.indexOf("http:") != -1 || id.indexOf("www.you") != -1 || id.indexOf("youtu.be") != -1) {
                if (id.indexOf("?v=") != -1) id = id.substring(id.indexOf("v=") + 2);
                if (id.indexOf("youtu.be") != -1) id = id.substring(id.lastIndexOf("/") + 1);
            }
            var vq = $(this).attr("data-video-quality");
            var pars = "";
            if (!isEmpty(vq)) {
                if (vq == "hc-hd") pars += "&amp;vq=hd1080";
            }
            $(this).html('<iframe frameborder="0" allowfullscreen="0" src="https://www.youtube.com/embed/' + id + '?playlist=' + id + '&amp;vq=hd1080&amp;loop=1&amp;start=0&amp;autoplay=1&amp;controls=0&amp;showinfo=0&amp;wmode=transparent&amp;iv_load_policy=3&amp;modestbranding=1&amp;rel=0&amp;enablejsapi=1&amp;volume=0' + pars + '"></iframe>');
        });
        if ($(".background-page iframe").length) {
            $(".background-page iframe").css("height", $(window).height() + 300 + "px").css("width", $(window).width() + 300 + "px").css("margin-left", "-150px");
        }

        //MENU - SEARCH C
        $(".btn-search").toggleClick(function () {
            $(this).closest(".search-box-menu").find(".search-box").css("opacity", 0).css("display", "block").showAnima("fade-bottom");
        },
         function () {
             $(this).closest(".search-box-menu").find(".search-box").css("display", "none");
         });

        //MENU - SUBLINE
        function showSublineMenu(item) {
            var p = $(item).closest("header");
            var t = $(p).find(".subline-bar ul:eq(" + $(item).index() + ")");
            $(p).find(".subline-bar ul").css("display", "none");
            $(t).css("opacity", "0").css("display", "block").animate({ "opacity": 1 }, 300);
        }
        $(".subline-menu > li").mouseover(function () {
            showSublineMenu(this);
        });
        $(".subline-bar").on("mouseleave", function () {
            $(this).find("ul").css("display", "none");
        });
        if ($("header").hasClass("fixed-top")) $(".subline-bar").css("margin-top", $("header").height() + "px");

        //MENU - MINI TOP - SEARCH
        $(".navbar-mini .form-control").focusin(function () {
            $(this).toggleClass("focus");
        });
        $(".navbar-mini .form-control").focusout(function () {
            $(this).toggleClass("focus");
        });

        //SCROLL METHODS
        setTimeout(function () { $(window).scroll(); }, 50);
        $("body").on("click", ".scroll-top", function () {
            $("html, body").stop().animate({ scrollTop: 0 }, '500', 'swing');
        });
        $("body").on("click", ".scroll-to", function () {
            var t = $(this).attr("data-scroll-to");
            if (isEmpty(t)) t = $(this).attr("href");
            try {
                $(t).scrollTo();
            } catch (e) { }
        });

        //LOADER
        $('#preloader').fadeOut(300);

        //PAGE SCROLL
        var cnt_title = $(".header-slider .container,.header-video .container,.header-title .container,.header-animation .container");
        var parallax_title = $(".header-parallax");
        var fixed_area = $(".fixed-area");
        var data_anima = $("*[data-anima]");
        var old_scroll = 0;
        $(window).scroll(function () {
            var po = window.pageYOffset;
            $(cnt_title).css("margin-top", po / 2).css("opacity", (100 / po < 1) ? (100 / po) : 1);

            var scroll = $(window).scrollTop();
            var go = true;
            var dh = $(document).height();

            if ($(parallax_title).length) {
                if (po > $(window).outerHeight()) $(parallax_title).css("visibility", "hidden");
                else $(parallax_title).css("visibility", "visible");
                $(parallax_title).find(".layer-parallax").css("margin-top", -1 * po / 2);
            }

            //COMPONENT - FIXED AREA
            $(fixed_area).each(function (i) {
                if (arrFA.length && scroll > arrFA[i][0]) {
                    $(this).css("top", arrFA[i][2] + "px").css("left", arrFA[i][1] + "px").css("position", "fixed").addClass("active");
                } else $(this).css("top", "").css("position", "").css("left", "").removeClass("active");

                var _bottom = $(this).attr("data-bottom");
                if (!isEmpty(_bottom)) {
                    if (scroll + hh > dh - _bottom) {
                        if (old_scroll < scroll) {
                            $(this).animate({
                                "margin-top": "-" + _bottom
                            }, 200);
                        }
                    } else {
                        if (old_scroll > scroll) {
                            $(this).clearQueue();
                            $(this).css("margin-top", "")
                        }
                    }
                }
            });

            //ON SCROLL FUNCTIONS
            if (scroll > 100 && go) {
                go = false;
                $(".scroll-hide").addClass('hidden');
                $(".scroll-change").addClass("scroll-css");
                $(".scroll-show").addClass('showed');
                $(".menu-transparent").removeClass("bg-transparent");
                if (device_screen_size == "device-xs") $(".scroll-show-mobile").removeClass('hidden');

                if (scroll + hh > (dh - hh)) {
                    $(".footer-parallax").css("opacity", 1);
                } else $(".footer-parallax").css("opacity", 0);
            }
            if (scroll < 100) {
                go = true;
                $(".scroll-hide").removeClass("hidden");
                if (!$(".fp-enabled").length) $(".scroll-change").removeClass("scroll-css");
                $(".scroll-show").removeClass('showed');
                $(".menu-transparent").addClass("bg-transparent");
            }

            //SCROLL INTO VIEWPORT
            $(data_anima).each(function () {
                var tr = $(this).attr("data-trigger");
                if (isEmpty(tr) || tr == "scroll") {
                    if (isScrollView(this)) {
                        if (!isEmpty($(this).attr("data-anima"))) initAnima(this);
                        $(this).attr("data-anima", "");
                    }
                }
            });
            old_scroll = scroll;
        });
    });
}(jQuery));
