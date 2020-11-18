$(function () {

    "use strict";
    $('.btn').click(function () {
        $(this).html('Wait..');
    });
    (function (global, factory) {
        if (typeof define === "function" && define.amd) {
            define(['jquery'], factory);
        } else if (typeof exports !== "undefined") {
            factory(require('jquery'));
        } else {
            var mod = {
                exports: {}
            };
            factory(global.jquery);
            global.metisMenu = mod.exports;
        }
    })(this, function (_jquery) {
        'use strict';

        var _jquery2 = _interopRequireDefault(_jquery);

        function _interopRequireDefault(obj) {
            return obj && obj.__esModule ? obj : {
                default: obj
            };
        }

        var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) {
            return typeof obj;
        } : function (obj) {
            return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
        };

        function _classCallCheck(instance, Constructor) {
            if (!(instance instanceof Constructor)) {
                throw new TypeError("Cannot call a class as a function");
            }
        }

        var Util = function ($) {
            var transition = false;

            var TransitionEndEvent = {
                WebkitTransition: 'webkitTransitionEnd',
                MozTransition: 'transitionend',
                OTransition: 'oTransitionEnd otransitionend',
                transition: 'transitionend'
            };

            function getSpecialTransitionEndEvent() {
                return {
                    bindType: transition.end,
                    delegateType: transition.end,
                    handle: function handle(event) {
                        if ($(event.target).is(this)) {
                            return event.handleObj.handler.apply(this, arguments);
                        }
                        return undefined;
                    }
                };
            }

            function transitionEndTest() {
                if (window.QUnit) {
                    return false;
                }

                var el = document.createElement('mm');

                for (var name in TransitionEndEvent) {
                    if (el.style[name] !== undefined) {
                        return {
                            end: TransitionEndEvent[name]
                        };
                    }
                }

                return false;
            }

            function transitionEndEmulator(duration) {
                var _this2 = this;

                var called = false;

                $(this).one(Util.TRANSITION_END, function () {
                    called = true;
                });

                setTimeout(function () {
                    if (!called) {
                        Util.triggerTransitionEnd(_this2);
                    }
                }, duration);

                return this;
            }

            function setTransitionEndSupport() {
                transition = transitionEndTest();
                $.fn.emulateTransitionEnd = transitionEndEmulator;

                if (Util.supportsTransitionEnd()) {
                    $.event.special[Util.TRANSITION_END] = getSpecialTransitionEndEvent();
                }
            }

            var Util = {
                TRANSITION_END: 'mmTransitionEnd',

                triggerTransitionEnd: function triggerTransitionEnd(element) {
                    $(element).trigger(transition.end);
                },
                supportsTransitionEnd: function supportsTransitionEnd() {
                    return Boolean(transition);
                }
            };

            setTransitionEndSupport();

            return Util;
        }(jQuery);

        var MetisMenu = function ($) {

            var NAME = 'metisMenu';
            var DATA_KEY = 'metisMenu';
            var EVENT_KEY = '.' + DATA_KEY;
            var DATA_API_KEY = '.data-api';
            var JQUERY_NO_CONFLICT = $.fn[NAME];
            var TRANSITION_DURATION = 350;

            var Default = {
                toggle: true,
                preventDefault: true,
                activeClass: 'active',
                collapseClass: 'collapse',
                collapseInClass: 'in',
                collapsingClass: 'collapsing',
                triggerElement: 'a',
                parentTrigger: 'li',
                subMenu: 'ul'
            };

            var Event = {
                SHOW: 'show' + EVENT_KEY,
                SHOWN: 'shown' + EVENT_KEY,
                HIDE: 'hide' + EVENT_KEY,
                HIDDEN: 'hidden' + EVENT_KEY,
                CLICK_DATA_API: 'click' + EVENT_KEY + DATA_API_KEY
            };

            var MetisMenu = function () {
                function MetisMenu(element, config) {
                    _classCallCheck(this, MetisMenu);

                    this._element = element;
                    this._config = this._getConfig(config);
                    this._transitioning = null;

                    this.init();
                }

                MetisMenu.prototype.init = function init() {
                    var self = this;
                    $(this._element).find(this._config.parentTrigger + '.' + this._config.activeClass).has(this._config.subMenu).children(this._config.subMenu).attr('aria-expanded', true).addClass(this._config.collapseClass + ' ' + this._config.collapseInClass);

                    $(this._element).find(this._config.parentTrigger).not('.' + this._config.activeClass).has(this._config.subMenu).children(this._config.subMenu).attr('aria-expanded', false).addClass(this._config.collapseClass);

                    $(this._element).find(this._config.parentTrigger).has(this._config.subMenu).children(this._config.triggerElement).on(Event.CLICK_DATA_API, function (e) {
                        var _this = $(this);
                        var _parent = _this.parent(self._config.parentTrigger);
                        var _siblings = _parent.siblings(self._config.parentTrigger).children(self._config.triggerElement);
                        var _list = _parent.children(self._config.subMenu);
                        if (self._config.preventDefault) {
                            e.preventDefault();
                        }
                        if (_this.attr('aria-disabled') === 'true') {
                            return;
                        }
                        if (_parent.hasClass(self._config.activeClass)) {
                            _this.attr('aria-expanded', false);
                            self._hide(_list);
                        } else {
                            self._show(_list);
                            _this.attr('aria-expanded', true);
                            if (self._config.toggle) {
                                _siblings.attr('aria-expanded', false);
                            }
                        }

                        if (self._config.onTransitionStart) {
                            self._config.onTransitionStart(e);
                        }
                    });
                };

                MetisMenu.prototype._show = function _show(element) {
                    if (this._transitioning || $(element).hasClass(this._config.collapsingClass)) {
                        return;
                    }
                    var _this = this;
                    var _el = $(element);

                    var startEvent = $.Event(Event.SHOW);
                    _el.trigger(startEvent);

                    if (startEvent.isDefaultPrevented()) {
                        return;
                    }

                    _el.parent(this._config.parentTrigger).addClass(this._config.activeClass);

                    if (this._config.toggle) {
                        this._hide(_el.parent(this._config.parentTrigger).siblings().children(this._config.subMenu + '.' + this._config.collapseInClass).attr('aria-expanded', false));
                    }

                    _el.removeClass(this._config.collapseClass).addClass(this._config.collapsingClass).height(0);

                    this.setTransitioning(true);

                    var complete = function complete() {

                        _el.removeClass(_this._config.collapsingClass).addClass(_this._config.collapseClass + ' ' + _this._config.collapseInClass).height('').attr('aria-expanded', true);

                        _this.setTransitioning(false);

                        _el.trigger(Event.SHOWN);
                    };

                    if (!Util.supportsTransitionEnd()) {
                        complete();
                        return;
                    }

                    _el.height(_el[0].scrollHeight).one(Util.TRANSITION_END, complete).emulateTransitionEnd(TRANSITION_DURATION);
                };

                MetisMenu.prototype._hide = function _hide(element) {

                    if (this._transitioning || !$(element).hasClass(this._config.collapseInClass)) {
                        return;
                    }
                    var _this = this;
                    var _el = $(element);

                    var startEvent = $.Event(Event.HIDE);
                    _el.trigger(startEvent);

                    if (startEvent.isDefaultPrevented()) {
                        return;
                    }

                    _el.parent(this._config.parentTrigger).removeClass(this._config.activeClass);
                    _el.height(_el.height())[0].offsetHeight;

                    _el.addClass(this._config.collapsingClass).removeClass(this._config.collapseClass).removeClass(this._config.collapseInClass);

                    this.setTransitioning(true);

                    var complete = function complete() {
                        if (_this._transitioning && _this._config.onTransitionEnd) {
                            _this._config.onTransitionEnd();
                        }

                        _this.setTransitioning(false);
                        _el.trigger(Event.HIDDEN);

                        _el.removeClass(_this._config.collapsingClass).addClass(_this._config.collapseClass).attr('aria-expanded', false);
                    };

                    if (!Util.supportsTransitionEnd()) {
                        complete();
                        return;
                    }

                    _el.height() == 0 || _el.css('display') == 'none' ? complete() : _el.height(0).one(Util.TRANSITION_END, complete).emulateTransitionEnd(TRANSITION_DURATION);
                };

                MetisMenu.prototype.setTransitioning = function setTransitioning(isTransitioning) {
                    this._transitioning = isTransitioning;
                };

                MetisMenu.prototype.dispose = function dispose() {
                    $.removeData(this._element, DATA_KEY);

                    $(this._element).find(this._config.parentTrigger).has(this._config.subMenu).children(this._config.triggerElement).off('click');

                    this._transitioning = null;
                    this._config = null;
                    this._element = null;
                };

                MetisMenu.prototype._getConfig = function _getConfig(config) {
                    config = $.extend({}, Default, config);
                    return config;
                };

                MetisMenu._jQueryInterface = function _jQueryInterface(config) {
                    return this.each(function () {
                        var $this = $(this);
                        var data = $this.data(DATA_KEY);
                        var _config = $.extend({}, Default, $this.data(), (typeof config === 'undefined' ? 'undefined' : _typeof(config)) === 'object' && config);

                        if (!data && /dispose/.test(config)) {
                            this.dispose();
                        }

                        if (!data) {
                            data = new MetisMenu(this, _config);
                            $this.data(DATA_KEY, data);
                        }

                        if (typeof config === 'string') {
                            if (data[config] === undefined) {
                                throw new Error('No method named "' + config + '"');
                            }
                            data[config]();
                        }
                    });
                };

                return MetisMenu;
            }();

            /**
             * ------------------------------------------------------------------------
             * jQuery
             * ------------------------------------------------------------------------
             */

            $.fn[NAME] = MetisMenu._jQueryInterface;
            $.fn[NAME].Constructor = MetisMenu;
            $.fn[NAME].noConflict = function () {
                $.fn[NAME] = JQUERY_NO_CONFLICT;
                return MetisMenu._jQueryInterface;
            };
            return MetisMenu;
        }(jQuery);
    });
});
$(function () {

    "use strict";

    /* ========== Disabling Preloader ========== */


    /* ========== Changes Takes Place On Body Resize Event ========== */

    var set = function () {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        var topOffset = 60;
        if (width < 1170) {
            $("body").addClass("mini-sidebar");
            $('.top-left-part span').hide();
            $(".scroll-sidebar, .slimScrollDiv").css("overflow-x", "visible").parent().css("overflow", "visible");
            $(".sidebartoggler i").addClass("fa fa-bars");
        } else {
            $("body").removeClass("mini-sidebar");
            $('.top-left-part span').show();
            $(".sidebartoggler i").removeClass("fa fa-bars");
        }

        var height = ((window.innerHeight > 0) ? window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $(".page-wrapper").css("min-height", (height) + "px");
        }

    };
    $(window).ready(set);
    $(window).on("resize", set);

    /* ========== Theme Options ========== */

    $(".sidebartoggler").on('click', function () {
        if ($("body").hasClass("mini-sidebar")) {
            $("body").trigger("resize");
            $(".scroll-sidebar, .slimScrollDiv").css("overflow", "hidden").parent().css("overflow", "visible");
            $("body").removeClass("mini-sidebar");
            $('.top-left-part span').show();
            $(".sidebartoggler i").addClass("fa fa-bars");
        } else {
            $("body").trigger("resize");
            $(".scroll-sidebar, .slimScrollDiv").css("overflow-x", "visible").parent().css("overflow", "visible");
            $("body").addClass("mini-sidebar");
            $('.top-left-part span').hide();
            $(".sidebartoggler i").removeClass("fa fa-bars");
        }
    });

    /* ========== this is for close icon when navigation open in mobile view ========== */

    $(".navbar-toggle").on('click', function () {
        $("body").toggleClass("show-sidebar");
        $(".navbar-toggle i").toggleClass("fa-bars");
        $(".navbar-toggle i").addClass("fa-close");
    });
    $(".sidebartoggler").on('click', function () {
        $(".sidebartoggler i").toggleClass("fa fa-bars");
    });

    /* ========== Auto Select Left Navbar ========== */

    $(function () {
        var url = window.location;
        var element = $('ul#side-menu a').filter(function () {
            return this.href == url;
        }).addClass('active').parent().addClass('active');
        while (true) {
            if (element.is('li')) {
                element = element.parent().addClass('in').parent().addClass('active');
            } else {
                break;
            }
        }
    });

    /* ========== Right sidebar options ========== */

    $(".right-side-toggler").on('click', function () {
        $(".right-sidebar").slideDown(50);
        $(".right-sidebar").toggleClass("shw-rside");

        // Fix header

        $(".fxhdr").on('click', function () {
            $("body").toggleClass("fix-header");
        });

        // Fix sidebar

        $(".fxsdr").on('click', function () {
            $("body").toggleClass("fix-sidebar");
        });
    });

    /* ========== Initializing Sidebar Menu ========== */

    $(function () {
        $('#side-menu').metisMenu();
    });

});

/* ========== Collapsible Panels JS ========== */

(function ($, window, document) {
    var panelSelector = '[data-perform="panel-collapse"]',
        panelRemover = '[data-perform="panel-dismiss"]';
    $(panelSelector).each(function () {
        var collapseOpts = {
                toggle: false
            },
            parent = $(this).closest('.panel'),
            wrapper = parent.find('.panel-wrapper'),
            child = $(this).children('i');
        if (!wrapper.length) {
            wrapper = parent.children('.panel-heading').nextAll().wrapAll('<div/>').parent().addClass('panel-wrapper');
            collapseOpts = {};
        }
        wrapper.collapse(collapseOpts).on('hide.bs.collapse', function () {
            child.removeClass('ti-minus').addClass('ti-plus');
        }).on('show.bs.collapse', function () {
            child.removeClass('ti-plus').addClass('ti-minus');
        });
    });

    /* ========== Collapse Panels ========== */

    $(document).on('click', panelSelector, function (e) {
        e.preventDefault();
        var parent = $(this).closest('.panel'),
            wrapper = parent.find('.panel-wrapper');
        wrapper.collapse('toggle');
    });

    /* ========== Remove Panels ========== */

    $(document).on('click', panelRemover, function (e) {
        e.preventDefault();
        var removeParent = $(this).closest('.panel');

        function removeElement() {
            var col = removeParent.parent();
            removeParent.remove();
            col.filter(function () {
                return ($(this).is('[class*="col-"]') && $(this).children('*').length === 0);
            }).remove();
        }

        removeElement();
    });
}(jQuery, window, document));

/* ========== Tooltip Initialization ========== */

$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});

/* ========== Popover Initialization ========== */

$(function () {
    $('[data-toggle="popover"]').popover();
});

/* ========== Login and Recover Password ========== */

$('#to-recover').on("click", function () {
    $("#loginform").slideUp();
    $("#recoverform").fadeIn();
});

// Sidebar

$('.slimscrollright').slimScroll({
    height: '100%',
    position: 'right',
    size: "5px",
    color: '#dcdcdc',
});
$('.scroll-sidebar').slimScroll({
    position: 'right',
    size: "5px",
    height: '100%',
    color: '#dcdcdc',
});
$('.slimscrollsidebar').slimScroll({
    height: '100%',
    position: 'right',
    size: "5px",
    color: '#dcdcdc',
});
$('.chat-list').slimScroll({
    height: '100%',
    position: 'right',
    size: "5px",
    color: '#dcdcdc',
});

// Resize all elements

$(window).on('load', function () {
    $("body").trigger("resize");
});
$("body").trigger("resize");

// visited ul li

$('.visited li a').on('click', function (e) {
    $('.visited li').removeClass('active');
    var $parent = $(this).parent();
    if (!$parent.hasClass('active')) {
        $parent.addClass('active');
    }
    e.preventDefault();
});
