/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/AdminLTE.js":
/*!**********************************!*\
  !*** ./resources/js/AdminLTE.js ***!
  \**********************************/
/*! exports provided: ControlSidebar, Layout, PushMenu, Treeview, Widget */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ControlSidebar__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ControlSidebar */ "./resources/js/ControlSidebar.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "ControlSidebar", function() { return _ControlSidebar__WEBPACK_IMPORTED_MODULE_0__["default"]; });

/* harmony import */ var _Layout__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Layout */ "./resources/js/Layout.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "Layout", function() { return _Layout__WEBPACK_IMPORTED_MODULE_1__["default"]; });

/* harmony import */ var _PushMenu__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./PushMenu */ "./resources/js/PushMenu.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "PushMenu", function() { return _PushMenu__WEBPACK_IMPORTED_MODULE_2__["default"]; });

/* harmony import */ var _Treeview__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./Treeview */ "./resources/js/Treeview.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "Treeview", function() { return _Treeview__WEBPACK_IMPORTED_MODULE_3__["default"]; });

/* harmony import */ var _Widget__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./Widget */ "./resources/js/Widget.js");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "Widget", function() { return _Widget__WEBPACK_IMPORTED_MODULE_4__["default"]; });








/***/ }),

/***/ "./resources/js/ControlSidebar.js":
/*!****************************************!*\
  !*** ./resources/js/ControlSidebar.js ***!
  \****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * --------------------------------------------
 * AdminLTE ControlSidebar.js
 * License MIT
 * --------------------------------------------
 */
var ControlSidebar = function ($) {
  /**
   * Constants
   * ====================================================
   */
  var NAME = 'ControlSidebar';
  var DATA_KEY = 'lte.control.sidebar';
  var EVENT_KEY = ".".concat(DATA_KEY);
  var JQUERY_NO_CONFLICT = $.fn[NAME];
  var DATA_API_KEY = '.data-api';
  var Event = {
    CLICK_DATA_API: "click".concat(EVENT_KEY).concat(DATA_API_KEY)
  };
  var Selector = {
    CONTROL_SIDEBAR: '.control-sidebar',
    DATA_TOGGLE: '[data-widget="control-sidebar"]',
    MAIN_HEADER: '.main-header'
  };
  var ClassName = {
    CONTROL_SIDEBAR_OPEN: 'control-sidebar-open',
    CONTROL_SIDEBAR_SLIDE: 'control-sidebar-slide-open'
  };
  var Default = {
    slide: true
    /**
     * Class Definition
     * ====================================================
     */

  };

  var ControlSidebar =
  /*#__PURE__*/
  function () {
    function ControlSidebar(element, config) {
      _classCallCheck(this, ControlSidebar);

      this._element = element;
      this._config = this._getConfig(config);
    } // Public


    _createClass(ControlSidebar, [{
      key: "show",
      value: function show() {
        // Show the control sidebar
        if (this._config.slide) {
          $('body').removeClass(ClassName.CONTROL_SIDEBAR_SLIDE);
        } else {
          $('body').removeClass(ClassName.CONTROL_SIDEBAR_OPEN);
        }
      }
    }, {
      key: "collapse",
      value: function collapse() {
        // Collapse the control sidebar
        if (this._config.slide) {
          $('body').addClass(ClassName.CONTROL_SIDEBAR_SLIDE);
        } else {
          $('body').addClass(ClassName.CONTROL_SIDEBAR_OPEN);
        }
      }
    }, {
      key: "toggle",
      value: function toggle() {
        this._setMargin();

        var shouldOpen = $('body').hasClass(ClassName.CONTROL_SIDEBAR_OPEN) || $('body').hasClass(ClassName.CONTROL_SIDEBAR_SLIDE);

        if (shouldOpen) {
          // Open the control sidebar
          this.show();
        } else {
          // Close the control sidebar
          this.collapse();
        }
      } // Private

    }, {
      key: "_getConfig",
      value: function _getConfig(config) {
        return $.extend({}, Default, config);
      }
    }, {
      key: "_setMargin",
      value: function _setMargin() {
        $(Selector.CONTROL_SIDEBAR).css({
          top: $(Selector.MAIN_HEADER).innerHeight()
        });
      } // Static

    }], [{
      key: "_jQueryInterface",
      value: function _jQueryInterface(operation) {
        return this.each(function () {
          var data = $(this).data(DATA_KEY);

          if (!data) {
            data = new ControlSidebar(this, $(this).data());
            $(this).data(DATA_KEY, data);
          }

          if (data[operation] === 'undefined') {
            throw new Error("".concat(operation, " is not a function"));
          }

          data[operation]();
        });
      }
    }]);

    return ControlSidebar;
  }();
  /**
   *
   * Data Api implementation
   * ====================================================
   */


  $(document).on('click', Selector.DATA_TOGGLE, function (event) {
    event.preventDefault();

    ControlSidebar._jQueryInterface.call($(this), 'toggle');
  });
  /**
   * jQuery API
   * ====================================================
   */

  $.fn[NAME] = ControlSidebar._jQueryInterface;
  $.fn[NAME].Constructor = ControlSidebar;

  $.fn[NAME].noConflict = function () {
    $.fn[NAME] = JQUERY_NO_CONFLICT;
    return ControlSidebar._jQueryInterface;
  };

  return ControlSidebar;
}(jQuery);

/* harmony default export */ __webpack_exports__["default"] = (ControlSidebar);

/***/ }),

/***/ "./resources/js/Layout.js":
/*!********************************!*\
  !*** ./resources/js/Layout.js ***!
  \********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * --------------------------------------------
 * AdminLTE Layout.js
 * License MIT
 * --------------------------------------------
 */
var Layout = function ($) {
  /**
   * Constants
   * ====================================================
   */
  var NAME = 'Layout';
  var DATA_KEY = 'lte.layout';
  var EVENT_KEY = ".".concat(DATA_KEY);
  var JQUERY_NO_CONFLICT = $.fn[NAME];
  var Event = {
    SIDEBAR: 'sidebar'
  };
  var Selector = {
    HEADER: '.main-header',
    SIDEBAR: '.main-sidebar .sidebar',
    CONTENT: '.content-wrapper',
    BRAND: '.brand-link',
    CONTENT_HEADER: '.content-header',
    WRAPPER: '.wrapper',
    CONTROL_SIDEBAR: '.control-sidebar',
    LAYOUT_FIXED: '.layout-fixed',
    FOOTER: '.main-footer'
  };
  var ClassName = {
    HOLD: 'hold-transition',
    SIDEBAR: 'main-sidebar',
    CONTENT_FIXED: 'content-fixed',
    LAYOUT_FIXED: 'layout-fixed',
    NAVBAR_FIXED: 'layout-navbar-fixed',
    FOOTER_FIXED: 'layout-footer-fixed'
  };
  var Default = {
    scrollbarTheme: 'os-theme-light',
    scrollbarAutoHide: 'l'
    /**
     * Class Definition
     * ====================================================
     */

  };

  var Layout =
  /*#__PURE__*/
  function () {
    function Layout(element, config) {
      _classCallCheck(this, Layout);

      this._config = config;
      this._element = element;

      this._init();
    } // Public


    _createClass(Layout, [{
      key: "fixLayoutHeight",
      value: function fixLayoutHeight() {
        var heights = {
          window: $(window).height(),
          header: $(Selector.HEADER).outerHeight(),
          footer: $(Selector.FOOTER).outerHeight(),
          sidebar: $(Selector.SIDEBAR).height()
        };

        var max = this._max(heights);

        if ($('body').hasClass(ClassName.LAYOUT_FIXED)) {
          $(Selector.CONTENT).css('min-height', max - heights.header - heights.footer); // $(Selector.SIDEBAR).css('min-height', max - heights.header)

          $(Selector.CONTROL_SIDEBAR + ' .control-sidebar-content').css('height', max - heights.header);

          if (typeof $.fn.overlayScrollbars !== 'undefined') {
            $(Selector.SIDEBAR).overlayScrollbars({
              className: this._config.scrollbarTheme,
              sizeAutoCapable: true,
              scrollbars: {
                autoHide: this._config.scrollbarAutoHide,
                clickScrolling: true
              }
            });
            $(Selector.CONTROL_SIDEBAR + ' .control-sidebar-content').overlayScrollbars({
              className: this._config.scrollbarTheme,
              sizeAutoCapable: true,
              scrollbars: {
                autoHide: this._config.scrollbarAutoHide,
                clickScrolling: true
              }
            });
          }
        } else {
          if (heights.window > heights.sidebar) {
            $(Selector.CONTENT).css('min-height', heights.window - heights.header - heights.footer);
          } else {
            $(Selector.CONTENT).css('min-height', heights.sidebar - heights.header);
          }
        }

        if ($('body').hasClass(ClassName.NAVBAR_FIXED)) {
          $(Selector.BRAND).css('height', heights.header);
          $(Selector.SIDEBAR).css('margin-top', heights.header);
          $(Selector.SIDEBAR).css('margin-top', heights.header);
        }

        if ($('body').hasClass(ClassName.FOOTER_FIXED)) {
          $(Selector.CONTENT).css('margin-bottom', heights.footer);
        }

        if ($('body').hasClass(ClassName.CONTENT_FIXED)) {
          $(Selector.CONTENT).css('height', $(Selector.CONTENT).css('min-height'));
        }
      } // Private

    }, {
      key: "_init",
      value: function _init() {
        var _this = this;

        // Enable transitions
        $('body').removeClass(ClassName.HOLD); // Activate layout height watcher

        this.fixLayoutHeight();
        $(Selector.SIDEBAR).on('collapsed.lte.treeview expanded.lte.treeview collapsed.lte.pushmenu expanded.lte.pushmenu', function () {
          _this.fixLayoutHeight();
        });
        $(window).resize(function () {
          _this.fixLayoutHeight();
        });
        $('body, html').css('height', 'auto');
      }
    }, {
      key: "_max",
      value: function _max(numbers) {
        // Calculate the maximum number in a list
        var max = 0;
        Object.keys(numbers).forEach(function (key) {
          if (numbers[key] > max) {
            max = numbers[key];
          }
        });
        return max;
      } // Static

    }], [{
      key: "_jQueryInterface",
      value: function _jQueryInterface(config) {
        return this.each(function () {
          var data = $(this).data(DATA_KEY);

          var _config = $.extend({}, Default, $(this).data());

          if (!data) {
            data = new Layout($(this), _config);
            $(this).data(DATA_KEY, data);
          }

          if (config === 'init') {
            data[config]();
          }
        });
      }
    }]);

    return Layout;
  }();
  /**
   * Data API
   * ====================================================
   */


  $(window).on('load', function () {
    Layout._jQueryInterface.call($('body'));
  });
  /**
   * jQuery API
   * ====================================================
   */

  $.fn[NAME] = Layout._jQueryInterface;
  $.fn[NAME].Constructor = Layout;

  $.fn[NAME].noConflict = function () {
    $.fn[NAME] = JQUERY_NO_CONFLICT;
    return Layout._jQueryInterface;
  };

  return Layout;
}(jQuery);

/* harmony default export */ __webpack_exports__["default"] = (Layout);

/***/ }),

/***/ "./resources/js/PushMenu.js":
/*!**********************************!*\
  !*** ./resources/js/PushMenu.js ***!
  \**********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * --------------------------------------------
 * AdminLTE PushMenu.js
 * License MIT
 * --------------------------------------------
 */
var PushMenu = function ($) {
  /**
   * Constants
   * ====================================================
   */
  var NAME = 'PushMenu';
  var DATA_KEY = 'lte.pushmenu';
  var EVENT_KEY = ".".concat(DATA_KEY);
  var JQUERY_NO_CONFLICT = $.fn[NAME];
  var Event = {
    COLLAPSED: "collapsed".concat(EVENT_KEY),
    SHOWN: "shown".concat(EVENT_KEY)
  };
  var Default = {
    autoCollapseSize: false,
    screenCollapseSize: 768
  };
  var Selector = {
    TOGGLE_BUTTON: '[data-widget="pushmenu"]',
    SIDEBAR_MINI: '.sidebar-mini',
    SIDEBAR_COLLAPSED: '.sidebar-collapse',
    BODY: 'body',
    OVERLAY: '#sidebar-overlay',
    WRAPPER: '.wrapper'
  };
  var ClassName = {
    SIDEBAR_OPEN: 'sidebar-open',
    COLLAPSED: 'sidebar-collapse',
    OPEN: 'sidebar-open',
    SIDEBAR_MINI: 'sidebar-mini'
    /**
     * Class Definition
     * ====================================================
     */

  };

  var PushMenu =
  /*#__PURE__*/
  function () {
    function PushMenu(element, options) {
      _classCallCheck(this, PushMenu);

      this._element = element;
      this._options = $.extend({}, Default, options);

      this._init();

      if (!$(Selector.OVERLAY).length) {
        this._addOverlay();
      }
    } // Public


    _createClass(PushMenu, [{
      key: "show",
      value: function show() {
        $(Selector.BODY).addClass(ClassName.OPEN).removeClass(ClassName.COLLAPSED);
        var shownEvent = $.Event(Event.SHOWN);
        $(this._element).trigger(shownEvent);
      }
    }, {
      key: "collapse",
      value: function collapse() {
        $(Selector.BODY).removeClass(ClassName.OPEN).addClass(ClassName.COLLAPSED);
        var collapsedEvent = $.Event(Event.COLLAPSED);
        $(this._element).trigger(collapsedEvent);
      }
    }, {
      key: "isShown",
      value: function isShown() {
        if ($(window).width() >= this._options.screenCollapseSize) {
          return !$(Selector.BODY).hasClass(ClassName.COLLAPSED);
        } else {
          return $(Selector.BODY).hasClass(ClassName.OPEN);
        }
      }
    }, {
      key: "toggle",
      value: function toggle() {
        if (this.isShown()) {
          this.collapse();
        } else {
          this.show();
        }
      }
    }, {
      key: "autoCollapse",
      value: function autoCollapse() {
        if (this._options.autoCollapseSize) {
          if ($(window).width() <= this._options.autoCollapseSize) {
            if (this.isShown()) {
              this.toggle();
            }
          } else {
            if (!this.isShown()) {
              this.toggle();
            }
          }
        }
      } // Private

    }, {
      key: "_init",
      value: function _init() {
        var _this = this;

        this.autoCollapse();
        $(window).resize(function () {
          _this.autoCollapse();
        });
      }
    }, {
      key: "_addOverlay",
      value: function _addOverlay() {
        var _this2 = this;

        var overlay = $('<div />', {
          id: 'sidebar-overlay'
        });
        overlay.on('click', function () {
          _this2.collapse();
        });
        $(Selector.WRAPPER).append(overlay);
      } // Static

    }], [{
      key: "_jQueryInterface",
      value: function _jQueryInterface(operation) {
        return this.each(function () {
          var data = $(this).data(DATA_KEY);

          var _options = $.extend({}, Default, $(this).data());

          if (!data) {
            data = new PushMenu(this, _options);
            $(this).data(DATA_KEY, data);
          }

          if (operation === 'toggle') {
            data[operation]();
          }
        });
      }
    }]);

    return PushMenu;
  }();
  /**
   * Data API
   * ====================================================
   */


  $(document).on('click', Selector.TOGGLE_BUTTON, function (event) {
    event.preventDefault();
    var button = event.currentTarget;

    if ($(button).data('widget') !== 'pushmenu') {
      button = $(button).closest(Selector.TOGGLE_BUTTON);
    }

    PushMenu._jQueryInterface.call($(button), 'toggle');
  });
  $(window).on('load', function () {
    PushMenu._jQueryInterface.call($(Selector.TOGGLE_BUTTON));
  });
  /**
   * jQuery API
   * ====================================================
   */

  $.fn[NAME] = PushMenu._jQueryInterface;
  $.fn[NAME].Constructor = PushMenu;

  $.fn[NAME].noConflict = function () {
    $.fn[NAME] = JQUERY_NO_CONFLICT;
    return PushMenu._jQueryInterface;
  };

  return PushMenu;
}(jQuery);

/* harmony default export */ __webpack_exports__["default"] = (PushMenu);

/***/ }),

/***/ "./resources/js/Treeview.js":
/*!**********************************!*\
  !*** ./resources/js/Treeview.js ***!
  \**********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * --------------------------------------------
 * AdminLTE Treeview.js
 * License MIT
 * --------------------------------------------
 */
var Treeview = function ($) {
  /**
   * Constants
   * ====================================================
   */
  var NAME = 'Treeview';
  var DATA_KEY = 'lte.treeview';
  var EVENT_KEY = ".".concat(DATA_KEY);
  var JQUERY_NO_CONFLICT = $.fn[NAME];
  var Event = {
    SELECTED: "selected".concat(EVENT_KEY),
    EXPANDED: "expanded".concat(EVENT_KEY),
    COLLAPSED: "collapsed".concat(EVENT_KEY),
    LOAD_DATA_API: "load".concat(EVENT_KEY)
  };
  var Selector = {
    LI: '.nav-item',
    LINK: '.nav-link',
    TREEVIEW_MENU: '.nav-treeview',
    OPEN: '.menu-open',
    DATA_WIDGET: '[data-widget="treeview"]'
  };
  var ClassName = {
    LI: 'nav-item',
    LINK: 'nav-link',
    TREEVIEW_MENU: 'nav-treeview',
    OPEN: 'menu-open'
  };
  var Default = {
    trigger: "".concat(Selector.DATA_WIDGET, " ").concat(Selector.LINK),
    animationSpeed: 300,
    accordion: true
    /**
     * Class Definition
     * ====================================================
     */

  };

  var Treeview =
  /*#__PURE__*/
  function () {
    function Treeview(element, config) {
      _classCallCheck(this, Treeview);

      this._config = config;
      this._element = element;
    } // Public


    _createClass(Treeview, [{
      key: "init",
      value: function init() {
        this._setupListeners();
      }
    }, {
      key: "expand",
      value: function expand(treeviewMenu, parentLi) {
        var _this = this;

        var expandedEvent = $.Event(Event.EXPANDED);

        if (this._config.accordion) {
          var openMenuLi = parentLi.siblings(Selector.OPEN).first();
          var openTreeview = openMenuLi.find(Selector.TREEVIEW_MENU).first();
          this.collapse(openTreeview, openMenuLi);
        }

        treeviewMenu.slideDown(this._config.animationSpeed, function () {
          parentLi.addClass(ClassName.OPEN);
          $(_this._element).trigger(expandedEvent);
        });
      }
    }, {
      key: "collapse",
      value: function collapse(treeviewMenu, parentLi) {
        var _this2 = this;

        var collapsedEvent = $.Event(Event.COLLAPSED);
        treeviewMenu.slideUp(this._config.animationSpeed, function () {
          parentLi.removeClass(ClassName.OPEN);
          $(_this2._element).trigger(collapsedEvent);
          treeviewMenu.find("".concat(Selector.OPEN, " > ").concat(Selector.TREEVIEW_MENU)).slideUp();
          treeviewMenu.find(Selector.OPEN).removeClass(ClassName.OPEN);
        });
      }
    }, {
      key: "toggle",
      value: function toggle(event) {
        var $relativeTarget = $(event.currentTarget);
        var treeviewMenu = $relativeTarget.next();

        if (!treeviewMenu.is(Selector.TREEVIEW_MENU)) {
          return;
        }

        event.preventDefault();
        var parentLi = $relativeTarget.parents(Selector.LI).first();
        var isOpen = parentLi.hasClass(ClassName.OPEN);

        if (isOpen) {
          this.collapse($(treeviewMenu), parentLi);
        } else {
          this.expand($(treeviewMenu), parentLi);
        }
      } // Private

    }, {
      key: "_setupListeners",
      value: function _setupListeners() {
        var _this3 = this;

        $(document).on('click', this._config.trigger, function (event) {
          _this3.toggle(event);
        });
      } // Static

    }], [{
      key: "_jQueryInterface",
      value: function _jQueryInterface(config) {
        return this.each(function () {
          var data = $(this).data(DATA_KEY);

          var _config = $.extend({}, Default, $(this).data());

          if (!data) {
            data = new Treeview($(this), _config);
            $(this).data(DATA_KEY, data);
          }

          if (config === 'init') {
            data[config]();
          }
        });
      }
    }]);

    return Treeview;
  }();
  /**
   * Data API
   * ====================================================
   */


  $(window).on(Event.LOAD_DATA_API, function () {
    $(Selector.DATA_WIDGET).each(function () {
      Treeview._jQueryInterface.call($(this), 'init');
    });
  });
  /**
   * jQuery API
   * ====================================================
   */

  $.fn[NAME] = Treeview._jQueryInterface;
  $.fn[NAME].Constructor = Treeview;

  $.fn[NAME].noConflict = function () {
    $.fn[NAME] = JQUERY_NO_CONFLICT;
    return Treeview._jQueryInterface;
  };

  return Treeview;
}(jQuery);

/* harmony default export */ __webpack_exports__["default"] = (Treeview);

/***/ }),

/***/ "./resources/js/Widget.js":
/*!********************************!*\
  !*** ./resources/js/Widget.js ***!
  \********************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * --------------------------------------------
 * AdminLTE Widget.js
 * License MIT
 * --------------------------------------------
 */
var Widget = function ($) {
  /**
   * Constants
   * ====================================================
   */
  var NAME = 'Widget';
  var DATA_KEY = 'lte.widget';
  var EVENT_KEY = ".".concat(DATA_KEY);
  var JQUERY_NO_CONFLICT = $.fn[NAME];
  var Event = {
    EXPANDED: "expanded".concat(EVENT_KEY),
    COLLAPSED: "collapsed".concat(EVENT_KEY),
    MAXIMIZED: "maximized".concat(EVENT_KEY),
    MINIMIZED: "minimized".concat(EVENT_KEY),
    REMOVED: "removed".concat(EVENT_KEY)
  };
  var Selector = {
    DATA_REMOVE: '[data-widget="remove"]',
    DATA_COLLAPSE: '[data-widget="collapse"]',
    DATA_MAXIMIZE: '[data-widget="maximize"]',
    CARD: '.card',
    CARD_HEADER: '.card-header',
    CARD_BODY: '.card-body',
    CARD_FOOTER: '.card-footer',
    COLLAPSED: '.collapsed-card',
    COLLAPSE_ICON: '.fa-minus',
    EXPAND_ICON: '.fa-plus'
  };
  var ClassName = {
    COLLAPSED: 'collapsed-card',
    WAS_COLLAPSED: 'was-collapsed',
    MAXIMIZED: 'maximized-card',
    COLLAPSE_ICON: 'fa-minus',
    EXPAND_ICON: 'fa-plus',
    MAXIMIZE_ICON: 'fa-expand',
    MINIMIZE_ICON: 'fa-compress'
  };
  var Default = {
    animationSpeed: 'normal',
    collapseTrigger: Selector.DATA_COLLAPSE,
    removeTrigger: Selector.DATA_REMOVE
  };

  var Widget =
  /*#__PURE__*/
  function () {
    function Widget(element, settings) {
      _classCallCheck(this, Widget);

      this._element = element;
      this._parent = element.parents(Selector.CARD).first();
      this._settings = $.extend({}, Default, settings);
    }

    _createClass(Widget, [{
      key: "collapse",
      value: function collapse() {
        var _this = this;

        this._parent.children("".concat(Selector.CARD_BODY, ", ").concat(Selector.CARD_FOOTER)).slideUp(this._settings.animationSpeed, function () {
          _this._parent.addClass(ClassName.COLLAPSED);
        });

        this._element.children(Selector.COLLAPSE_ICON).addClass(ClassName.EXPAND_ICON).removeClass(ClassName.COLLAPSE_ICON);

        var collapsed = $.Event(Event.COLLAPSED);

        this._element.trigger(collapsed, this._parent);
      }
    }, {
      key: "expand",
      value: function expand() {
        var _this2 = this;

        this._parent.children("".concat(Selector.CARD_BODY, ", ").concat(Selector.CARD_FOOTER)).slideDown(this._settings.animationSpeed, function () {
          _this2._parent.removeClass(ClassName.COLLAPSED);
        });

        this._element.children(Selector.EXPAND_ICON).addClass(ClassName.COLLAPSE_ICON).removeClass(ClassName.EXPAND_ICON);

        var expanded = $.Event(Event.EXPANDED);

        this._element.trigger(expanded, this._parent);
      }
    }, {
      key: "remove",
      value: function remove() {
        this._parent.slideUp();

        var removed = $.Event(Event.REMOVED);

        this._element.trigger(removed, this._parent);
      }
    }, {
      key: "toggle",
      value: function toggle() {
        if (this._parent.hasClass(ClassName.COLLAPSED)) {
          this.expand();
          return;
        }

        this.collapse();
      }
    }, {
      key: "toggleMaximize",
      value: function toggleMaximize() {
        var button = this._element.find('i');

        if (this._parent.hasClass(ClassName.MAXIMIZED)) {
          button.addClass(ClassName.MAXIMIZE_ICON).removeClass(ClassName.MINIMIZE_ICON);

          this._parent.css('cssText', 'height:' + this._parent[0].style.height + ' !important;' + 'width:' + this._parent[0].style.width + ' !important; transition: all .15s;').delay(100).queue(function () {
            $(this).removeClass(ClassName.MAXIMIZED);
            $('html').removeClass(ClassName.MAXIMIZED);
            $(this).trigger(Event.MINIMIZED);
            $(this).css({
              'height': 'inherit',
              'width': 'inherit'
            });

            if ($(this).hasClass(ClassName.WAS_COLLAPSED)) {
              $(this).removeClass(ClassName.WAS_COLLAPSED);
            }

            $(this).dequeue();
          });
        } else {
          button.addClass(ClassName.MINIMIZE_ICON).removeClass(ClassName.MAXIMIZE_ICON);

          this._parent.css({
            'height': this._parent.height(),
            'width': this._parent.width(),
            'transition': 'all .15s'
          }).delay(150).queue(function () {
            $(this).addClass(ClassName.MAXIMIZED);
            $('html').addClass(ClassName.MAXIMIZED);
            $(this).trigger(Event.MAXIMIZED);

            if ($(this).hasClass(ClassName.COLLAPSED)) {
              $(this).addClass(ClassName.WAS_COLLAPSED);
            }

            $(this).dequeue();
          });
        }
      } // Private

    }, {
      key: "_init",
      value: function _init(card) {
        var _this3 = this;

        this._parent = card;
        $(this).find(this._settings.collapseTrigger).click(function () {
          _this3.toggle();
        });
        $(this).find(this._settings.removeTrigger).click(function () {
          _this3.remove();
        });
      } // Static

    }], [{
      key: "_jQueryInterface",
      value: function _jQueryInterface(config) {
        return this.each(function () {
          var data = $(this).data(DATA_KEY);

          if (!data) {
            data = new Widget($(this), data);
            $(this).data(DATA_KEY, typeof config === 'string' ? data : config);
          }

          if (typeof config === 'string' && config.match(/remove|toggle/)) {
            data[config]();
          } else if (_typeof(config) === 'object') {
            data._init($(this));
          }
        });
      }
    }]);

    return Widget;
  }();
  /**
   * Data API
   * ====================================================
   */


  $(document).on('click', Selector.DATA_COLLAPSE, function (event) {
    if (event) {
      event.preventDefault();
    }

    Widget._jQueryInterface.call($(this), 'toggle');
  });
  $(document).on('click', Selector.DATA_REMOVE, function (event) {
    if (event) {
      event.preventDefault();
    }

    Widget._jQueryInterface.call($(this), 'remove');
  });
  $(document).on('click', Selector.DATA_MAXIMIZE, function (event) {
    if (event) {
      event.preventDefault();
    }

    Widget._jQueryInterface.call($(this), 'toggleMaximize');
  });
  /**
   * jQuery API
   * ====================================================
   */

  $.fn[NAME] = Widget._jQueryInterface;
  $.fn[NAME].Constructor = Widget;

  $.fn[NAME].noConflict = function () {
    $.fn[NAME] = JQUERY_NO_CONFLICT;
    return Widget._jQueryInterface;
  };

  return Widget;
}(jQuery);

/* harmony default export */ __webpack_exports__["default"] = (Widget);

/***/ }),

/***/ "./resources/sass/AdminLTE.scss":
/*!**************************************!*\
  !*** ./resources/sass/AdminLTE.scss ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!***********************************************************************!*\
  !*** multi ./resources/js/AdminLTE.js ./resources/sass/AdminLTE.scss ***!
  \***********************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! D:\Users\Néstor Pérez\Desktop\Montessori Exams Console\resources\js\AdminLTE.js */"./resources/js/AdminLTE.js");
module.exports = __webpack_require__(/*! D:\Users\Néstor Pérez\Desktop\Montessori Exams Console\resources\sass\AdminLTE.scss */"./resources/sass/AdminLTE.scss");


/***/ })

/******/ });