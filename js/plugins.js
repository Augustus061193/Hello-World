// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

// Place any jQuery/helper plugins in here.


/*!
 * jQuery Cookie Plugin v1.3.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function (factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as anonymous module.
    define(['jquery'], factory);
  } else {
    // Browser globals.
    factory(jQuery);
  }
}(function ($) {

  var pluses = /\+/g;

  function raw(s) {
    return s;
  }

  function decoded(s) {
    return decodeURIComponent(s.replace(pluses, ' '));
  }

  function converted(s) {
    if (s.indexOf('"') === 0) {
      // This is a quoted cookie as according to RFC2068, unescape
      s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
    }
    try {
      return config.json ? JSON.parse(s) : s;
    } catch(er) {}
  }

  var config = $.cookie = function (key, value, options) {

    // write
    if (value !== undefined) {
      options = $.extend({}, config.defaults, options);

      if (typeof options.expires === 'number') {
        var days = options.expires, t = options.expires = new Date();
        t.setDate(t.getDate() + days);
      }

      value = config.json ? JSON.stringify(value) : String(value);

      return (document.cookie = [
        config.raw ? key : encodeURIComponent(key),
        '=',
        config.raw ? value : encodeURIComponent(value),
        options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
        options.path    ? '; path=' + options.path : '',
        options.domain  ? '; domain=' + options.domain : '',
        options.secure  ? '; secure' : ''
      ].join(''));
    }

    // read
    var decode = config.raw ? raw : decoded;
    var cookies = document.cookie.split('; ');
    var result = key ? undefined : {};
    for (var i = 0, l = cookies.length; i < l; i++) {
      var parts = cookies[i].split('=');
      var name = decode(parts.shift());
      var cookie = decode(parts.join('='));

      if (key && key === name) {
        result = converted(cookie);
        break;
      }

      if (!key) {
        result[name] = converted(cookie);
      }
    }

    return result;
  };

  config.defaults = {};

  $.removeCookie = function (key, options) {
    if ($.cookie(key) !== undefined) {
      // Must not alter options, thus extending a fresh object...
      $.cookie(key, '', $.extend({}, options, { expires: -1 }));
      return true;
    }
    return false;
  };

}));



/* ===================================================
 * bootstrap-transition.js v2.3.0
 * http://twitter.github.com/bootstrap/javascript.html#transitions
 * ===================================================
 * Copyright 2012 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================== */


!function ($) {

  "use strict"; // jshint ;_;


  /* CSS TRANSITION SUPPORT (http://www.modernizr.com/)
   * ======================================================= */

  $(function () {

    $.support.transition = (function () {

      var transitionEnd = (function () {

        var el = document.createElement('bootstrap')
          , transEndEventNames = {
               'WebkitTransition' : 'webkitTransitionEnd'
            ,  'MozTransition'    : 'transitionend'
            ,  'OTransition'      : 'oTransitionEnd otransitionend'
            ,  'transition'       : 'transitionend'
            }
          , name

        for (name in transEndEventNames){
          if (el.style[name] !== undefined) {
            return transEndEventNames[name]
          }
        }

      }())

      return transitionEnd && {
        end: transitionEnd
      }

    })()

  })

}(window.jQuery);
/* =========================================================
 * bootstrap-modal.js v2.3.0
 * http://twitter.github.com/bootstrap/javascript.html#modals
 * =========================================================
 * Copyright 2012 Twitter, Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * ========================================================= */


!function ($) {

  "use strict"; // jshint ;_;


 /* MODAL CLASS DEFINITION
  * ====================== */

  var Modal = function (element, options) {
    this.options = options
    this.$element = $(element)
      .delegate('[data-dismiss="modal"]', 'click.dismiss.modal', $.proxy(this.hide, this))
    this.options.remote && this.$element.find('.modal-body').load(this.options.remote)
  }

  Modal.prototype = {

      constructor: Modal

    , toggle: function () {
        return this[!this.isShown ? 'show' : 'hide']()
      }

    , show: function () {
        var that = this
          , e = $.Event('show')

        this.$element.trigger(e)

        if (this.isShown || e.isDefaultPrevented()) return

        this.isShown = true

        this.escape()

        this.backdrop(function () {
          var transition = $.support.transition && that.$element.hasClass('fade')

          if (!that.$element.parent().length) {
            that.$element.appendTo(document.body) //don't move modals dom position
          }

          that.$element.show()

          if (transition) {
            that.$element[0].offsetWidth // force reflow
          }

          that.$element
            .addClass('in')
            .attr('aria-hidden', false)

          that.enforceFocus()

          transition ?
            that.$element.one($.support.transition.end, function () { that.$element.focus().trigger('shown') }) :
            that.$element.focus().trigger('shown')

        })
      }

    , hide: function (e) {
        e && e.preventDefault()

        var that = this

        e = $.Event('hide')

        this.$element.trigger(e)

        if (!this.isShown || e.isDefaultPrevented()) return

        this.isShown = false

        this.escape()

        $(document).off('focusin.modal')

        this.$element
          .removeClass('in')
          .attr('aria-hidden', true)

        $.support.transition && this.$element.hasClass('fade') ?
          this.hideWithTransition() :
          this.hideModal()
      }

    , enforceFocus: function () {
        var that = this
        $(document).on('focusin.modal', function (e) {
          if (that.$element[0] !== e.target && !that.$element.has(e.target).length) {
            that.$element.focus()
          }
        })
      }

    , escape: function () {
        var that = this
        if (this.isShown && this.options.keyboard) {
          this.$element.on('keyup.dismiss.modal', function ( e ) {
            e.which == 27 && that.hide()
          })
        } else if (!this.isShown) {
          this.$element.off('keyup.dismiss.modal')
        }
      }

    , hideWithTransition: function () {
        var that = this
          , timeout = setTimeout(function () {
              that.$element.off($.support.transition.end)
              that.hideModal()
            }, 500)

        this.$element.one($.support.transition.end, function () {
          clearTimeout(timeout)
          that.hideModal()
        })
      }

    , hideModal: function () {
        var that = this
        this.$element.hide()
        this.backdrop(function () {
          that.removeBackdrop()
          that.$element.trigger('hidden')
        })
      }

    , removeBackdrop: function () {
        this.$backdrop.remove()
        this.$backdrop = null
      }

    , backdrop: function (callback) {
        var that = this
          , animate = this.$element.hasClass('fade') ? 'fade' : ''

        if (this.isShown && this.options.backdrop) {
          var doAnimate = $.support.transition && animate

          this.$backdrop = $('<div class="modal-backdrop ' + animate + '" />')
            .appendTo(document.body)

          this.$backdrop.click(
            this.options.backdrop == 'static' ?
              $.proxy(this.$element[0].focus, this.$element[0])
            : $.proxy(this.hide, this)
          )

          if (doAnimate) this.$backdrop[0].offsetWidth // force reflow

          this.$backdrop.addClass('in')

          if (!callback) return

          doAnimate ?
            this.$backdrop.one($.support.transition.end, callback) :
            callback()

        } else if (!this.isShown && this.$backdrop) {
          this.$backdrop.removeClass('in')

          $.support.transition && this.$element.hasClass('fade')?
            this.$backdrop.one($.support.transition.end, callback) :
            callback()

        } else if (callback) {
          callback()
        }
      }
  }


 /* MODAL PLUGIN DEFINITION
  * ======================= */

  var old = $.fn.modal

  $.fn.modal = function (option) {
    return this.each(function () {
      var $this = $(this)
        , data = $this.data('modal')
        , options = $.extend({}, $.fn.modal.defaults, $this.data(), typeof option == 'object' && option)
      if (!data) $this.data('modal', (data = new Modal(this, options)))
      if (typeof option == 'string') data[option]()
      else if (options.show) data.show()
    })
  }

  $.fn.modal.defaults = {
      backdrop: true
    , keyboard: true
    , show: true
  }

  $.fn.modal.Constructor = Modal


 /* MODAL NO CONFLICT
  * ================= */

  $.fn.modal.noConflict = function () {
    $.fn.modal = old
    return this
  }


 /* MODAL DATA-API
  * ============== */

  $(document).on('click.modal.data-api', '[data-toggle="modal"]', function (e) {
    var $this = $(this)
      , href = $this.attr('href')
      , $target = $($this.attr('data-target') || (href && href.replace(/.*(?=#[^\s]+$)/, ''))) //strip for ie7
      , option = $target.data('modal') ? 'toggle' : $.extend({ remote:!/#/.test(href) && href }, $target.data(), $this.data())

    e.preventDefault()

    $target
      .modal(option)
      .one('hide', function () {
        $this.focus()
      })
  })

}(window.jQuery);










/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 * 
 * Open source under the BSD License. 
 * 
 * Copyright å© 2008 George McGinley Smith
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
*/

jQuery.easing.jswing=jQuery.easing.swing;jQuery.extend(jQuery.easing,{def:"easeOutQuad",swing:function(e,f,a,h,g){return jQuery.easing[jQuery.easing.def](e,f,a,h,g)},easeInQuad:function(e,f,a,h,g){return h*(f/=g)*f+a},easeOutQuad:function(e,f,a,h,g){return -h*(f/=g)*(f-2)+a},easeInOutQuad:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f+a}return -h/2*((--f)*(f-2)-1)+a},easeInCubic:function(e,f,a,h,g){return h*(f/=g)*f*f+a},easeOutCubic:function(e,f,a,h,g){return h*((f=f/g-1)*f*f+1)+a},easeInOutCubic:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f+a}return h/2*((f-=2)*f*f+2)+a},easeInQuart:function(e,f,a,h,g){return h*(f/=g)*f*f*f+a},easeOutQuart:function(e,f,a,h,g){return -h*((f=f/g-1)*f*f*f-1)+a},easeInOutQuart:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f*f+a}return -h/2*((f-=2)*f*f*f-2)+a},easeInQuint:function(e,f,a,h,g){return h*(f/=g)*f*f*f*f+a},easeOutQuint:function(e,f,a,h,g){return h*((f=f/g-1)*f*f*f*f+1)+a},easeInOutQuint:function(e,f,a,h,g){if((f/=g/2)<1){return h/2*f*f*f*f*f+a}return h/2*((f-=2)*f*f*f*f+2)+a},easeInSine:function(e,f,a,h,g){return -h*Math.cos(f/g*(Math.PI/2))+h+a},easeOutSine:function(e,f,a,h,g){return h*Math.sin(f/g*(Math.PI/2))+a},easeInOutSine:function(e,f,a,h,g){return -h/2*(Math.cos(Math.PI*f/g)-1)+a},easeInExpo:function(e,f,a,h,g){return(f==0)?a:h*Math.pow(2,10*(f/g-1))+a},easeOutExpo:function(e,f,a,h,g){return(f==g)?a+h:h*(-Math.pow(2,-10*f/g)+1)+a},easeInOutExpo:function(e,f,a,h,g){if(f==0){return a}if(f==g){return a+h}if((f/=g/2)<1){return h/2*Math.pow(2,10*(f-1))+a}return h/2*(-Math.pow(2,-10*--f)+2)+a},easeInCirc:function(e,f,a,h,g){return -h*(Math.sqrt(1-(f/=g)*f)-1)+a},easeOutCirc:function(e,f,a,h,g){return h*Math.sqrt(1-(f=f/g-1)*f)+a},easeInOutCirc:function(e,f,a,h,g){if((f/=g/2)<1){return -h/2*(Math.sqrt(1-f*f)-1)+a}return h/2*(Math.sqrt(1-(f-=2)*f)+1)+a},easeInElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k)==1){return e+l}if(!j){j=k*0.3}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}return -(g*Math.pow(2,10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j))+e},easeOutElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k)==1){return e+l}if(!j){j=k*0.3}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}return g*Math.pow(2,-10*h)*Math.sin((h*k-i)*(2*Math.PI)/j)+l+e},easeInOutElastic:function(f,h,e,l,k){var i=1.70158;var j=0;var g=l;if(h==0){return e}if((h/=k/2)==2){return e+l}if(!j){j=k*(0.3*1.5)}if(g<Math.abs(l)){g=l;var i=j/4}else{var i=j/(2*Math.PI)*Math.asin(l/g)}if(h<1){return -0.5*(g*Math.pow(2,10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j))+e}return g*Math.pow(2,-10*(h-=1))*Math.sin((h*k-i)*(2*Math.PI)/j)*0.5+l+e},easeInBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}return i*(f/=h)*f*((g+1)*f-g)+a},easeOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}return i*((f=f/h-1)*f*((g+1)*f+g)+1)+a},easeInOutBack:function(e,f,a,i,h,g){if(g==undefined){g=1.70158}if((f/=h/2)<1){return i/2*(f*f*(((g*=(1.525))+1)*f-g))+a}return i/2*((f-=2)*f*(((g*=(1.525))+1)*f+g)+2)+a},easeInBounce:function(e,f,a,h,g){return h-jQuery.easing.easeOutBounce(e,g-f,0,h,g)+a},easeOutBounce:function(e,f,a,h,g){if((f/=g)<(1/2.75)){return h*(7.5625*f*f)+a}else{if(f<(2/2.75)){return h*(7.5625*(f-=(1.5/2.75))*f+0.75)+a}else{if(f<(2.5/2.75)){return h*(7.5625*(f-=(2.25/2.75))*f+0.9375)+a}else{return h*(7.5625*(f-=(2.625/2.75))*f+0.984375)+a}}}},easeInOutBounce:function(e,f,a,h,g){if(f<g/2){return jQuery.easing.easeInBounce(e,f*2,0,h,g)*0.5+a}return jQuery.easing.easeOutBounce(e,f*2-g,0,h,g)*0.5+h*0.5+a}});

/*
 *
 * TERMS OF USE - EASING EQUATIONS
 * 
 * Open source under the BSD License. 
 * 
 * Copyright å© 2001 Robert Penner
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, 
 * are permitted provided that the following conditions are met:
 * 
 * Redistributions of source code must retain the above copyright notice, this list of 
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list 
 * of conditions and the following disclaimer in the documentation and/or other materials 
 * provided with the distribution.
 * 
 * Neither the name of the author nor the names of contributors may be used to endorse 
 * or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY 
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED 
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED 
 * OF THE POSSIBILITY OF SUCH DAMAGE. 
 *
 */



// Camera slideshow v1.3.4 - a jQuery slideshow with many effects, transitions, easy to customize, using canvas and mobile ready, based on jQuery 1.4+
// Copyright (c) 2012 by Manuel Masia - www.pixedelic.com
// Licensed under the MIT license: http://www.opensource.org/licenses/mit-license.php
;(function(a){a.fn.camera=function(b,c){function e(){if(navigator.userAgent.match(/Android/i)||navigator.userAgent.match(/webOS/i)||navigator.userAgent.match(/iPad/i)||navigator.userAgent.match(/iPhone/i)||navigator.userAgent.match(/iPod/i)){return true}}function H(){var b=a(s).width();a("li",s).removeClass("camera_visThumb");a("li",s).each(function(){var c=a(this).position(),d=a("ul",s).outerWidth(),e=a("ul",s).offset().left,f=a("> div",s).offset().left,g=f-e;if(g>0){a(".camera_prevThumbs",V).removeClass("hideNav")}else{a(".camera_prevThumbs",V).addClass("hideNav")}if(d-g>b){a(".camera_nextThumbs",V).removeClass("hideNav")}else{a(".camera_nextThumbs",V).addClass("hideNav")}var h=c.left,i=c.left+a(this).width();if(i-g<=b&&h-g>=0){a(this).addClass("camera_visThumb")}})}function K(){function d(){t=f.width();if(b.height.indexOf("%")!=-1){var c=Math.round(t/(100/parseFloat(b.height)));if(b.minHeight!=""&&c<parseFloat(b.minHeight)){u=parseFloat(b.minHeight)}else{u=c}f.css({height:u})}else if(b.height=="auto"){u=f.height()}else{u=parseFloat(b.height);f.css({height:u})}a(".camerarelative",k).css({width:t,height:u});a(".imgLoaded",k).each(function(){var c=a(this),d=c.attr("width"),e=c.attr("height"),f=c.index(),g,h,i=c.attr("data-alignment"),j=c.attr("data-portrait");if(typeof i==="undefined"||i===false||i===""){i=b.alignment}if(typeof j==="undefined"||j===false||j===""){j=b.portrait}if(j==false||j=="false"){if(d/e<t/u){var k=t/d;var l=Math.abs(u-e*k)*.5;switch(i){case"topLeft":g=0;break;case"topCenter":g=0;break;case"topRight":g=0;break;case"centerLeft":g="-"+l+"px";break;case"center":g="-"+l+"px";break;case"centerRight":g="-"+l+"px";break;case"bottomLeft":g="-"+l*2+"px";break;case"bottomCenter":g="-"+l*2+"px";break;case"bottomRight":g="-"+l*2+"px";break}c.css({height:e*k,"margin-left":0,"margin-right":0,"margin-top":g,position:"absolute",visibility:"visible",width:t})}else{var k=u/e;var l=Math.abs(t-d*k)*.5;switch(i){case"topLeft":h=0;break;case"topCenter":h="-"+l+"px";break;case"topRight":h="-"+l*2+"px";break;case"centerLeft":h=0;break;case"center":h="-"+l+"px";break;case"centerRight":h="-"+l*2+"px";break;case"bottomLeft":h=0;break;case"bottomCenter":h="-"+l+"px";break;case"bottomRight":h="-"+l*2+"px";break}c.css({height:u,"margin-left":h,"margin-right":h,"margin-top":0,position:"absolute",visibility:"visible",width:d*k})}}else{if(d/e<t/u){var k=u/e;var l=Math.abs(t-d*k)*.5;switch(i){case"topLeft":h=0;break;case"topCenter":h=l+"px";break;case"topRight":h=l*2+"px";break;case"centerLeft":h=0;break;case"center":h=l+"px";break;case"centerRight":h=l*2+"px";break;case"bottomLeft":h=0;break;case"bottomCenter":h=l+"px";break;case"bottomRight":h=l*2+"px";break}c.css({height:u,"margin-left":h,"margin-right":h,"margin-top":0,position:"absolute",visibility:"visible",width:d*k})}else{var k=t/d;var l=Math.abs(u-e*k)*.5;switch(i){case"topLeft":g=0;break;case"topCenter":g=0;break;case"topRight":g=0;break;case"centerLeft":g=l+"px";break;case"center":g=l+"px";break;case"centerRight":g=l+"px";break;case"bottomLeft":g=l*2+"px";break;case"bottomCenter":g=l*2+"px";break;case"bottomRight":g=l*2+"px";break}c.css({height:e*k,"margin-left":0,"margin-right":0,"margin-top":g,position:"absolute",visibility:"visible",width:t})}}})}var c;if(I==true){clearTimeout(c);c=setTimeout(d,200)}else{d()}I=true}function X(a){for(var b,c,d=a.length;d;b=parseInt(Math.random()*d),c=a[--d],a[d]=a[b],a[b]=c);return a}function Y(a){return Math.ceil(a)==Math.floor(a)}function hb(){if(a(s).length&&!a(r).length){var b=a(s).outerWidth(),c=a("ul > li",s).outerWidth(),d=a("li.cameracurrent",s).length?a("li.cameracurrent",s).position():"",e=a("ul > li",s).length*a("ul > li",s).outerWidth(),g=a("ul",s).offset().left,h=a("> div",s).offset().left,i;if(g<0){i="-"+(h-g)}else{i=h-g}if(gb==true){a("ul",s).width(a("ul > li",s).length*a("ul > li",s).outerWidth());if(a(s).length&&!a(r).lenght){f.css({marginBottom:a(s).outerHeight()})}H();a("ul",s).width(a("ul > li",s).length*a("ul > li",s).outerWidth());if(a(s).length&&!a(r).lenght){f.css({marginBottom:a(s).outerHeight()})}}gb=false;var j=a("li.cameracurrent",s).length?d.left:"",k=a("li.cameracurrent",s).length?d.left+a("li.cameracurrent",s).outerWidth():"";if(j<a("li.cameracurrent",s).outerWidth()){j=0}if(k-i>b){if(j+b<e){a("ul",s).animate({"margin-left":"-"+j+"px"},500,H)}else{a("ul",s).animate({"margin-left":"-"+(a("ul",s).outerWidth()-b)+"px"},500,H)}}else if(j-i<0){a("ul",s).animate({"margin-left":"-"+j+"px"},500,H)}else{a("ul",s).css({"margin-left":"auto","margin-right":"auto"});setTimeout(H,100)}}}function ib(){bb=0;var c=a(".camera_bar_cont",V).width(),d=a(".camera_bar_cont",V).height();if(h!="pie"){switch(U){case"leftToRight":a("#"+i).css({right:c});break;case"rightToLeft":a("#"+i).css({left:c});break;case"topToBottom":a("#"+i).css({bottom:d});break;case"bottomToTop":a("#"+i).css({top:d});break}}else{db.clearRect(0,0,b.pieDiameter,b.pieDiameter)}}function jb(c){j.addClass("camerasliding");R=false;var d=parseFloat(a("div.cameraSlide.cameracurrent",k).index());if(c>0){var l=c-1}else if(d==B-1){var l=0}else{var l=d+1}var m=a(".cameraSlide:eq("+l+")",k);var n=a(".cameraSlide:eq("+(l+1)+")",k).addClass("cameranext");if(d!=l+1){n.hide()}a(".cameraContent",g).fadeOut(600);a(".camera_caption",g).show();a(".camerarelative",m).append(a("> div ",j).eq(l).find("> div.camera_effected"));a(".camera_target_content .cameraContent:eq("+l+")",f).append(a("> div ",j).eq(l).find("> div"));if(!a(".imgLoaded",m).length){var o=v[l];var p=new Image;p.src=o+"?"+(new Date).getTime();m.css("visibility","hidden");m.prepend(a(p).attr("class","imgLoaded").css("visibility","hidden"));var q,w;if(!a(p).get(0).complete||q=="0"||w=="0"||typeof q==="undefined"||q===false||typeof w==="undefined"||w===false){a(".camera_loader",f).delay(500).fadeIn(400);p.onload=function(){q=p.naturalWidth;w=p.naturalHeight;a(p).attr("data-alignment",z[l]).attr("data-portrait",y[l]);a(p).attr("width",q);a(p).attr("height",w);k.find(".cameraSlide_"+l).hide().css("visibility","visible");K();jb(l+1)}}}else{if(v.length>l+1&&!a(".imgLoaded",n).length){var x=v[l+1];var A=new Image;A.src=x+"?"+(new Date).getTime();n.prepend(a(A).attr("class","imgLoaded").css("visibility","hidden"));A.onload=function(){q=A.naturalWidth;w=A.naturalHeight;a(A).attr("data-alignment",z[l+1]).attr("data-portrait",y[l+1]);a(A).attr("width",q);a(A).attr("height",w);K()}}b.onLoaded.call(this);if(a(".camera_loader",f).is(":visible")){a(".camera_loader",f).fadeOut(400)}else{a(".camera_loader",f).css({visibility:"hidden"});a(".camera_loader",f).fadeOut(400,function(){a(".camera_loader",f).css({visibility:"visible"})})}var C=b.rows,D=b.cols,F=1,G=0,H,I,J,N,O,P=new Array("simpleFade","curtainTopLeft","curtainTopRight","curtainBottomLeft","curtainBottomRight","curtainSliceLeft","curtainSliceRight","blindCurtainTopLeft","blindCurtainTopRight","blindCurtainBottomLeft","blindCurtainBottomRight","blindCurtainSliceBottom","blindCurtainSliceTop","stampede","mosaic","mosaicReverse","mosaicRandom","mosaicSpiral","mosaicSpiralReverse","topLeftBottomRight","bottomRightTopLeft","bottomLeftTopRight","topRightBottomLeft","scrollLeft","scrollRight","scrollTop","scrollBottom","scrollHorz");marginLeft=0,marginTop=0,opacityOnGrid=0;if(b.opacityOnGrid==true){opacityOnGrid=0}else{opacityOnGrid=1}var Q=a(" > div",j).eq(l).attr("data-fx");if(e()&&b.mobileFx!=""&&b.mobileFx!="default"){N=b.mobileFx}else{if(typeof Q!=="undefined"&&Q!==false&&Q!=="default"){N=Q}else{N=b.fx}}if(N=="random"){N=X(P);N=N[0]}else{N=N;if(N.indexOf(",")>0){N=N.replace(/ /g,"");N=N.split(",");N=X(N);N=N[0]}}dataEasing=a(" > div",j).eq(l).attr("data-easing");mobileEasing=a(" > div",j).eq(l).attr("data-mobileEasing");if(e()&&b.mobileEasing!=""&&b.mobileEasing!="default"){if(typeof mobileEasing!=="undefined"&&mobileEasing!==false&&mobileEasing!=="default"){O=mobileEasing}else{O=b.mobileEasing}}else{if(typeof dataEasing!=="undefined"&&dataEasing!==false&&dataEasing!=="default"){O=dataEasing}else{O=b.easing}}H=a(" > div",j).eq(l).attr("data-slideOn");if(typeof H!=="undefined"&&H!==false){T=H}else{if(b.slideOn=="random"){var T=new Array("next","prev");T=X(T);T=T[0]}else{T=b.slideOn}}var Y=a(" > div",j).eq(l).attr("data-time");if(typeof Y!=="undefined"&&Y!==false&&Y!==""){I=parseFloat(Y)}else{I=b.time}var Z=a(" > div",j).eq(l).attr("data-transPeriod");if(typeof Z!=="undefined"&&Z!==false&&Z!==""){J=parseFloat(Z)}else{J=b.transPeriod}if(!a(j).hasClass("camerastarted")){N="simpleFade";T="next";O="";J=400;a(j).addClass("camerastarted")}switch(N){case"simpleFade":D=1;C=1;break;case"curtainTopLeft":if(b.slicedCols==0){D=b.cols}else{D=b.slicedCols}C=1;break;case"curtainTopRight":if(b.slicedCols==0){D=b.cols}else{D=b.slicedCols}C=1;break;case"curtainBottomLeft":if(b.slicedCols==0){D=b.cols}else{D=b.slicedCols}C=1;break;case"curtainBottomRight":if(b.slicedCols==0){D=b.cols}else{D=b.slicedCols}C=1;break;case"curtainSliceLeft":if(b.slicedCols==0){D=b.cols}else{D=b.slicedCols}C=1;break;case"curtainSliceRight":if(b.slicedCols==0){D=b.cols}else{D=b.slicedCols}C=1;break;case"blindCurtainTopLeft":if(b.slicedRows==0){C=b.rows}else{C=b.slicedRows}D=1;break;case"blindCurtainTopRight":if(b.slicedRows==0){C=b.rows}else{C=b.slicedRows}D=1;break;case"blindCurtainBottomLeft":if(b.slicedRows==0){C=b.rows}else{C=b.slicedRows}D=1;break;case"blindCurtainBottomRight":if(b.slicedRows==0){C=b.rows}else{C=b.slicedRows}D=1;break;case"blindCurtainSliceTop":if(b.slicedRows==0){C=b.rows}else{C=b.slicedRows}D=1;break;case"blindCurtainSliceBottom":if(b.slicedRows==0){C=b.rows}else{C=b.slicedRows}D=1;break;case"stampede":G="-"+J;break;case"mosaic":G=b.gridDifference;break;case"mosaicReverse":G=b.gridDifference;break;case"mosaicRandom":break;case"mosaicSpiral":G=b.gridDifference;F=1.7;break;case"mosaicSpiralReverse":G=b.gridDifference;F=1.7;break;case"topLeftBottomRight":G=b.gridDifference;F=6;break;case"bottomRightTopLeft":G=b.gridDifference;F=6;break;case"bottomLeftTopRight":G=b.gridDifference;F=6;break;case"topRightBottomLeft":G=b.gridDifference;F=6;break;case"scrollLeft":D=1;C=1;break;case"scrollRight":D=1;C=1;break;case"scrollTop":D=1;C=1;break;case"scrollBottom":D=1;C=1;break;case"scrollHorz":D=1;C=1;break}var _=0;var ab=C*D;var eb=t-Math.floor(t/D)*D;var fb=u-Math.floor(u/C)*C;var gb;var kb;var lb=0;var mb=0;var nb=new Array;var ob=new Array;var pb=new Array;while(_<ab){nb.push(_);ob.push(_);E.append('<div class="cameraappended" style="display:none; overflow:hidden; position:absolute; z-index:1000" />');var qb=a(".cameraappended:eq("+_+")",k);if(N=="scrollLeft"||N=="scrollRight"||N=="scrollTop"||N=="scrollBottom"||N=="scrollHorz"){S.eq(l).clone().show().appendTo(qb)}else{if(T=="next"){S.eq(l).clone().show().appendTo(qb)}else{S.eq(d).clone().show().appendTo(qb)}}if(_%D<eb){gb=1}else{gb=0}if(_%D==0){lb=0}if(Math.floor(_/D)<fb){kb=1}else{kb=0}qb.css({height:Math.floor(u/C+kb+1),left:lb,top:mb,width:Math.floor(t/D+gb+1)});a("> .cameraSlide",qb).css({height:u,"margin-left":"-"+lb+"px","margin-top":"-"+mb+"px",width:t});lb=lb+qb.width()-1;if(_%D==D-1){mb=mb+qb.height()-1}_++}switch(N){case"curtainTopLeft":break;case"curtainBottomLeft":break;case"curtainSliceLeft":break;case"curtainTopRight":nb=nb.reverse();break;case"curtainBottomRight":nb=nb.reverse();break;case"curtainSliceRight":nb=nb.reverse();break;case"blindCurtainTopLeft":break;case"blindCurtainBottomLeft":nb=nb.reverse();break;case"blindCurtainSliceTop":break;case"blindCurtainTopRight":break;case"blindCurtainBottomRight":nb=nb.reverse();break;case"blindCurtainSliceBottom":nb=nb.reverse();break;case"stampede":nb=X(nb);break;case"mosaic":break;case"mosaicReverse":nb=nb.reverse();break;case"mosaicRandom":nb=X(nb);break;case"mosaicSpiral":var rb=C/2,sb,tb,ub,vb=0;for(ub=0;ub<rb;ub++){tb=ub;for(sb=ub;sb<D-ub-1;sb++){pb[vb++]=tb*D+sb}sb=D-ub-1;for(tb=ub;tb<C-ub-1;tb++){pb[vb++]=tb*D+sb}tb=C-ub-1;for(sb=D-ub-1;sb>ub;sb--){pb[vb++]=tb*D+sb}sb=ub;for(tb=C-ub-1;tb>ub;tb--){pb[vb++]=tb*D+sb}}nb=pb;break;case"mosaicSpiralReverse":var rb=C/2,sb,tb,ub,vb=ab-1;for(ub=0;ub<rb;ub++){tb=ub;for(sb=ub;sb<D-ub-1;sb++){pb[vb--]=tb*D+sb}sb=D-ub-1;for(tb=ub;tb<C-ub-1;tb++){pb[vb--]=tb*D+sb}tb=C-ub-1;for(sb=D-ub-1;sb>ub;sb--){pb[vb--]=tb*D+sb}sb=ub;for(tb=C-ub-1;tb>ub;tb--){pb[vb--]=tb*D+sb}}nb=pb;break;case"topLeftBottomRight":for(var tb=0;tb<C;tb++)for(var sb=0;sb<D;sb++){pb.push(sb+tb)}ob=pb;break;case"bottomRightTopLeft":for(var tb=0;tb<C;tb++)for(var sb=0;sb<D;sb++){pb.push(sb+tb)}ob=pb.reverse();break;case"bottomLeftTopRight":for(var tb=C;tb>0;tb--)for(var sb=0;sb<D;sb++){pb.push(sb+tb)}ob=pb;break;case"topRightBottomLeft":for(var tb=0;tb<C;tb++)for(var sb=D;sb>0;sb--){pb.push(sb+tb)}ob=pb;break}a.each(nb,function(c,e){function o(){a(this).addClass("cameraeased");if(a(".cameraeased",k).length>=0){a(s).css({visibility:"visible"})}if(a(".cameraeased",k).length==ab){hb();a(".moveFromLeft, .moveFromRight, .moveFromTop, .moveFromBottom, .fadeIn, .fadeFromLeft, .fadeFromRight, .fadeFromTop, .fadeFromBottom",g).each(function(){a(this).css("visibility","hidden")});S.eq(l).show().css("z-index","999").removeClass("cameranext").addClass("cameracurrent");S.eq(d).css("z-index","1").removeClass("cameracurrent");a(".cameraContent",g).eq(l).addClass("cameracurrent");if(d>=0){a(".cameraContent",g).eq(d).removeClass("cameracurrent")}b.onEndTransition.call(this);if(a("> div",j).eq(l).attr("data-video")!="hide"&&a(".cameraContent.cameracurrent .imgFake",g).length){a(".cameraContent.cameracurrent .imgFake",g).click()}var c=S.eq(l).find(".fadeIn").length;var e=a(".cameraContent",g).eq(l).find(".moveFromLeft, .moveFromRight, .moveFromTop, .moveFromBottom, .fadeIn, .fadeFromLeft, .fadeFromRight, .fadeFromTop, .fadeFromBottom").length;if(c!=0){a(".cameraSlide.cameracurrent .fadeIn",g).each(function(){if(a(this).attr("data-easing")!=""){var b=a(this).attr("data-easing")}else{var b=O}var d=a(this);if(typeof d.attr("data-outerWidth")==="undefined"||d.attr("data-outerWidth")===false||d.attr("data-outerWidth")===""){var e=d.outerWidth();d.attr("data-outerWidth",e)}else{var e=d.attr("data-outerWidth")}if(typeof d.attr("data-outerHeight")==="undefined"||d.attr("data-outerHeight")===false||d.attr("data-outerHeight")===""){var f=d.outerHeight();d.attr("data-outerHeight",f)}else{var f=d.attr("data-outerHeight")}var g=d.position();var h=g.left;var i=g.top;var j=d.attr("class");var k=d.index();var l=d.parents(".camerarelative").outerHeight();var m=d.parents(".camerarelative").outerWidth();if(j.indexOf("fadeIn")!=-1){d.animate({opacity:0},0).css("visibility","visible").delay(I/c*.1*(k-1)).animate({opacity:1},I/c*.15,b)}else{d.css("visibility","visible")}})}a(".cameraContent.cameracurrent",g).show();if(e!=0){a(".cameraContent.cameracurrent .moveFromLeft, .cameraContent.cameracurrent .moveFromRight, .cameraContent.cameracurrent .moveFromTop, .cameraContent.cameracurrent .moveFromBottom, .cameraContent.cameracurrent .fadeIn, .cameraContent.cameracurrent .fadeFromLeft, .cameraContent.cameracurrent .fadeFromRight, .cameraContent.cameracurrent .fadeFromTop, .cameraContent.cameracurrent .fadeFromBottom",g).each(function(){if(a(this).attr("data-easing")!=""){var b=a(this).attr("data-easing")}else{var b=O}var c=a(this);var d=c.position();var f=d.left;var g=d.top;var h=c.attr("class");var i=c.index();var j=c.outerHeight();if(h.indexOf("moveFromLeft")!=-1){c.css({left:"-"+t+"px",right:"auto"});c.css("visibility","visible").delay(I/e*.1*(i-1)).animate({left:d.left},I/e*.15,b)}else if(h.indexOf("moveFromRight")!=-1){c.css({left:t+"px",right:"auto"});c.css("visibility","visible").delay(I/e*.1*(i-1)).animate({left:d.left},I/e*.15,b)}else if(h.indexOf("moveFromTop")!=-1){c.css({top:"-"+u+"px",bottom:"auto"});c.css("visibility","visible").delay(I/e*.1*(i-1)).animate({top:d.top},I/e*.15,b,function(){c.css({top:"auto",bottom:0})})}else if(h.indexOf("moveFromBottom")!=-1){c.css({top:u+"px",bottom:"auto"});c.css("visibility","visible").delay(I/e*.1*(i-1)).animate({top:d.top},I/e*.15,b)}else if(h.indexOf("fadeFromLeft")!=-1){c.animate({opacity:0},0).css({left:"-"+t+"px",right:"auto"});c.css("visibility","visible").delay(I/e*.1*(i-1)).animate({left:d.left,opacity:1},I/e*.15,b)}else if(h.indexOf("fadeFromRight")!=-1){c.animate({opacity:0},0).css({left:t+"px",right:"auto"});c.css("visibility","visible").delay(I/e*.1*(i-1)).animate({left:d.left,opacity:1},I/e*.15,b)}else if(h.indexOf("fadeFromTop")!=-1){c.animate({opacity:0},0).css({top:"-"+u+"px",bottom:"auto"});c.css("visibility","visible").delay(I/e*.1*(i-1)).animate({top:d.top,opacity:1},I/e*.15,b,function(){c.css({top:"auto",bottom:0})})}else if(h.indexOf("fadeFromBottom")!=-1){c.animate({opacity:0},0).css({bottom:"-"+j+"px"});c.css("visibility","visible").delay(I/e*.1*(i-1)).animate({bottom:"0",opacity:1},I/e*.15,b)}else if(h.indexOf("fadeIn")!=-1){c.animate({opacity:0},0).css("visibility","visible").delay(I/e*.1*(i-1)).animate({opacity:1},I/e*.15,b)}else{c.css("visibility","visible")}})}a(".cameraappended",k).remove();j.removeClass("camerasliding");S.eq(d).hide();var f=a(".camera_bar_cont",V).width(),m=a(".camera_bar_cont",V).height(),o;if(h!="pie"){o=.05}else{o=.005}a("#"+i).animate({opacity:b.loaderOpacity},200);L=setInterval(function(){if(j.hasClass("stopped")){clearInterval(L)}if(h!="pie"){if(bb<=1.002&&!j.hasClass("stopped")&&!j.hasClass("paused")&&!j.hasClass("hovered")){bb=bb+o}else if(bb<=1&&(j.hasClass("stopped")||j.hasClass("paused")||j.hasClass("stopped")||j.hasClass("hovered"))){bb=bb}else{if(!j.hasClass("stopped")&&!j.hasClass("paused")&&!j.hasClass("hovered")){clearInterval(L);W();a("#"+i).animate({opacity:0},200,function(){clearTimeout(M);M=setTimeout(ib,n);jb();b.onStartLoading.call(this)})}}switch(U){case"leftToRight":a("#"+i).animate({right:f-f*bb},I*o,"linear");break;case"rightToLeft":a("#"+i).animate({left:f-f*bb},I*o,"linear");break;case"topToBottom":a("#"+i).animate({bottom:m-m*bb},I*o,"linear");break;case"bottomToTop":a("#"+i).animate({bottom:m-m*bb},I*o,"linear");break}}else{cb=bb;db.clearRect(0,0,b.pieDiameter,b.pieDiameter);db.globalCompositeOperation="destination-over";db.beginPath();db.arc(b.pieDiameter/2,b.pieDiameter/2,b.pieDiameter/2-b.loaderStroke,0,Math.PI*2,false);db.lineWidth=b.loaderStroke;db.strokeStyle=b.loaderBgColor;db.stroke();db.closePath();db.globalCompositeOperation="source-over";db.beginPath();db.arc(b.pieDiameter/2,b.pieDiameter/2,b.pieDiameter/2-b.loaderStroke,0,Math.PI*2*cb,false);db.lineWidth=b.loaderStroke-b.loaderPadding*2;db.strokeStyle=b.loaderColor;db.stroke();db.closePath();if(bb<=1.002&&!j.hasClass("stopped")&&!j.hasClass("paused")&&!j.hasClass("hovered")){bb=bb+o}else if(bb<=1&&(j.hasClass("stopped")||j.hasClass("paused")||j.hasClass("hovered"))){bb=bb}else{if(!j.hasClass("stopped")&&!j.hasClass("paused")&&!j.hasClass("hovered")){clearInterval(L);W();a("#"+i+", .camera_canvas_wrap",V).animate({opacity:0},200,function(){clearTimeout(M);M=setTimeout(ib,n);jb();b.onStartLoading.call(this)})}}}},I*o)}}if(e%D<eb){gb=1}else{gb=0}if(e%D==0){lb=0}if(Math.floor(e/D)<fb){kb=1}else{kb=0}switch(N){case"simpleFade":height=u;width=t;opacityOnGrid=0;break;case"curtainTopLeft":height=0,width=Math.floor(t/D+gb+1),marginTop="-"+Math.floor(u/C+kb+1)+"px";break;case"curtainTopRight":height=0,width=Math.floor(t/D+gb+1),marginTop="-"+Math.floor(u/C+kb+1)+"px";break;case"curtainBottomLeft":height=0,width=Math.floor(t/D+gb+1),marginTop=Math.floor(u/C+kb+1)+"px";break;case"curtainBottomRight":height=0,width=Math.floor(t/D+gb+1),marginTop=Math.floor(u/C+kb+1)+"px";break;case"curtainSliceLeft":height=0,width=Math.floor(t/D+gb+1);if(e%2==0){marginTop=Math.floor(u/C+kb+1)+"px"}else{marginTop="-"+Math.floor(u/C+kb+1)+"px"}break;case"curtainSliceRight":height=0,width=Math.floor(t/D+gb+1);if(e%2==0){marginTop=Math.floor(u/C+kb+1)+"px"}else{marginTop="-"+Math.floor(u/C+kb+1)+"px"}break;case"blindCurtainTopLeft":height=Math.floor(u/C+kb+1),width=0,marginLeft="-"+Math.floor(t/D+gb+1)+"px";break;case"blindCurtainTopRight":height=Math.floor(u/C+kb+1),width=0,marginLeft=Math.floor(t/D+gb+1)+"px";break;case"blindCurtainBottomLeft":height=Math.floor(u/C+kb+1),width=0,marginLeft="-"+Math.floor(t/D+gb+1)+"px";break;case"blindCurtainBottomRight":height=Math.floor(u/C+kb+1),width=0,marginLeft=Math.floor(t/D+gb+1)+"px";break;case"blindCurtainSliceBottom":height=Math.floor(u/C+kb+1),width=0;if(e%2==0){marginLeft="-"+Math.floor(t/D+gb+1)+"px"}else{marginLeft=Math.floor(t/D+gb+1)+"px"}break;case"blindCurtainSliceTop":height=Math.floor(u/C+kb+1),width=0;if(e%2==0){marginLeft="-"+Math.floor(t/D+gb+1)+"px"}else{marginLeft=Math.floor(t/D+gb+1)+"px"}break;case"stampede":height=0;width=0;marginLeft=t*.2*(c%D-(D-Math.floor(D/2)))+"px";marginTop=u*.2*(Math.floor(c/D)+1-(C-Math.floor(C/2)))+"px";break;case"mosaic":height=0;width=0;break;case"mosaicReverse":height=0;width=0;marginLeft=Math.floor(t/D+gb+1)+"px";marginTop=Math.floor(u/C+kb+1)+"px";break;case"mosaicRandom":height=0;width=0;marginLeft=Math.floor(t/D+gb+1)*.5+"px";marginTop=Math.floor(u/C+kb+1)*.5+"px";break;case"mosaicSpiral":height=0;width=0;marginLeft=Math.floor(t/D+gb+1)*.5+"px";marginTop=Math.floor(u/C+kb+1)*.5+"px";break;case"mosaicSpiralReverse":height=0;width=0;marginLeft=Math.floor(t/D+gb+1)*.5+"px";marginTop=Math.floor(u/C+kb+1)*.5+"px";break;case"topLeftBottomRight":height=0;width=0;break;case"bottomRightTopLeft":height=0;width=0;marginLeft=Math.floor(t/D+gb+1)+"px";marginTop=Math.floor(u/C+kb+1)+"px";break;case"bottomLeftTopRight":height=0;width=0;marginLeft=0;marginTop=Math.floor(u/C+kb+1)+"px";break;case"topRightBottomLeft":height=0;width=0;marginLeft=Math.floor(t/D+gb+1)+"px";marginTop=0;break;case"scrollRight":height=u;width=t;marginLeft=-t;break;case"scrollLeft":height=u;width=t;marginLeft=t;break;case"scrollTop":height=u;width=t;marginTop=u;break;case"scrollBottom":height=u;width=t;marginTop=-u;break;case"scrollHorz":height=u;width=t;if(d==0&&l==B-1){marginLeft=-t}else if(d<l||d==B-1&&l==0){marginLeft=t}else{marginLeft=-t}break}var m=a(".cameraappended:eq("+e+")",k);if(typeof L!=="undefined"){clearInterval(L);clearTimeout(M);M=setTimeout(ib,J+G)}if(a(r).length){a(".camera_pag li",f).removeClass("cameracurrent");a(".camera_pag li",f).eq(l).addClass("cameracurrent")}if(a(s).length){a("li",s).removeClass("cameracurrent");a("li",s).eq(l).addClass("cameracurrent");a("li",s).not(".cameracurrent").find("img").animate({opacity:.5},0);a("li.cameracurrent img",s).animate({opacity:1},0);a("li",s).hover(function(){a("img",this).stop(true,false).animate({opacity:1},150)},function(){if(!a(this).hasClass("cameracurrent")){a("img",this).stop(true,false).animate({opacity:.5},150)}})}var n=parseFloat(J)+parseFloat(G);if(N=="scrollLeft"||N=="scrollRight"||N=="scrollTop"||N=="scrollBottom"||N=="scrollHorz"){b.onStartTransition.call(this);n=0;m.delay((J+G)/ab*ob[c]*F*.5).css({display:"block",height:height,"margin-left":marginLeft,"margin-top":marginTop,width:width}).animate({height:Math.floor(u/C+kb+1),"margin-top":0,"margin-left":0,width:Math.floor(t/D+gb+1)},J-G,O,o);S.eq(d).delay((J+G)/ab*ob[c]*F*.5).animate({"margin-left":marginLeft*-1,"margin-top":marginTop*-1},J-G,O,function(){a(this).css({"margin-top":0,"margin-left":0})})}else{b.onStartTransition.call(this);n=parseFloat(J)+parseFloat(G);if(T=="next"){m.delay((J+G)/ab*ob[c]*F*.5).css({display:"block",height:height,"margin-left":marginLeft,"margin-top":marginTop,width:width,opacity:opacityOnGrid}).animate({height:Math.floor(u/C+kb+1),"margin-top":0,"margin-left":0,opacity:1,width:Math.floor(t/D+gb+1)},J-G,O,o)}else{S.eq(l).show().css("z-index","999").addClass("cameracurrent");S.eq(d).css("z-index","1").removeClass("cameracurrent");a(".cameraContent",g).eq(l).addClass("cameracurrent");a(".cameraContent",g).eq(d).removeClass("cameracurrent");m.delay((J+G)/ab*ob[c]*F*.5).css({display:"block",height:Math.floor(u/C+kb+1),"margin-top":0,"margin-left":0,opacity:1,width:Math.floor(t/D+gb+1)}).animate({height:height,"margin-left":marginLeft,"margin-top":marginTop,width:width,opacity:opacityOnGrid},J-G,O,o)}}})}}var d={alignment:"center",autoAdvance:true,mobileAutoAdvance:true,barDirection:"leftToRight",barPosition:"bottom",cols:6,easing:"easeInOutExpo",mobileEasing:"",fx:"random",mobileFx:"",gridDifference:250,height:"50%",imagePath:"images/",hover:true,loader:"pie",loaderColor:"#eeeeee",loaderBgColor:"#222222",loaderOpacity:.8,loaderPadding:2,loaderStroke:7,minHeight:"200px",navigation:true,navigationHover:true,mobileNavHover:true,opacityOnGrid:false,overlayer:true,pagination:true,playPause:true,pauseOnClick:true,pieDiameter:38,piePosition:"rightTop",portrait:false,rows:4,slicedCols:12,slicedRows:8,slideOn:"random",thumbnails:false,time:7e3,transPeriod:1500,onEndTransition:function(){},onLoaded:function(){},onStartLoading:function(){},onStartTransition:function(){}};var b=a.extend({},d,b);var f=a(this).addClass("camera_wrap");f.wrapInner('<div class="camera_src" />').wrapInner('<div class="camera_fakehover" />');var g=a(".camera_fakehover",f);g.append('<div class="camera_target"></div>');if(b.overlayer==true){g.append('<div class="camera_overlayer"></div>')}g.append('<div class="camera_target_content"></div>');var h;if(b.loader=="pie"&&a.browser.msie&&a.browser.version<9){h="bar"}else{h=b.loader}if(h=="pie"){g.append('<div class="camera_pie"></div>')}else if(h=="bar"){g.append('<div class="camera_bar"></div>')}else{g.append('<div class="camera_bar" style="display:none"></div>')}if(b.playPause==true){g.append('<div class="camera_commands"></div>')}if(b.navigation==true){g.append('<div class="camera_prev"><span></span></div>').append('<div class="camera_next"><span></span></div>')}if(b.thumbnails==true){f.append('<div class="camera_thumbs_cont" />')}if(b.thumbnails==true&&b.pagination!=true){a(".camera_thumbs_cont",f).wrap("<div />").wrap('<div class="camera_thumbs" />').wrap("<div />").wrap('<div class="camera_command_wrap" />')}if(b.pagination==true){f.append('<div class="camera_pag"></div>')}f.append('<div class="camera_loader"></div>');a(".camera_caption",f).each(function(){a(this).wrapInner("<div />")});var i="pie_"+f.index(),j=a(".camera_src",f),k=a(".camera_target",f),l=a(".camera_target_content",f),m=a(".camera_pie",f),n=a(".camera_bar",f),o=a(".camera_prev",f),p=a(".camera_next",f),q=a(".camera_commands",f),r=a(".camera_pag",f),s=a(".camera_thumbs_cont",f);var t,u;var v=new Array;a("> div",j).each(function(){v.push(a(this).attr("data-src"))});var w=new Array;a("> div",j).each(function(){if(a(this).attr("data-link")){w.push(a(this).attr("data-link"))}else{w.push("")}});var x=new Array;a("> div",j).each(function(){if(a(this).attr("data-target")){x.push(a(this).attr("data-target"))}else{x.push("")}});var y=new Array;a("> div",j).each(function(){if(a(this).attr("data-portrait")){y.push(a(this).attr("data-portrait"))}else{y.push("")}});var z=new Array;a("> div",j).each(function(){if(a(this).attr("data-alignment")){z.push(a(this).attr("data-alignment"))}else{z.push("")}});var A=new Array;a("> div",j).each(function(){if(a(this).attr("data-thumb")){A.push(a(this).attr("data-thumb"))}else{A.push("")}});var B=v.length;a(l).append('<div class="cameraContents" />');var C;for(C=0;C<B;C++){a(".cameraContents",l).append('<div class="cameraContent" />');if(w[C]!=""){var D=a("> div ",j).eq(C).attr("data-box");if(typeof D!=="undefined"&&D!==false&&D!=""){D='data-box="'+a("> div ",j).eq(C).attr("data-box")+'"'}else{D=""}a(".camera_target_content .cameraContent:eq("+C+")",f).append('<a class="camera_link" href="'+w[C]+'" '+D+' target="'+x[C]+'"></a>')}}a(".camera_caption",f).each(function(){var b=a(this).parent().index(),c=f.find(".cameraContent").eq(b);a(this).appendTo(c)});k.append('<div class="cameraCont" />');var E=a(".cameraCont",f);var F;for(F=0;F<B;F++){E.append('<div class="cameraSlide cameraSlide_'+F+'" />');var G=a("> div:eq("+F+")",j);k.find(".cameraSlide_"+F).clone(G)}a(window).bind("load resize pageshow",function(){hb();H()});E.append('<div class="cameraSlide cameraSlide_'+F+'" />');var I;f.show();var t=k.width();var u=k.height();var J;a(window).bind("resize pageshow",function(){if(I==true){K()}a("ul",s).animate({"margin-top":0},0,hb);if(!j.hasClass("paused")){j.addClass("paused");if(a(".camera_stop",V).length){a(".camera_stop",V).hide();a(".camera_play",V).show();if(h!="none"){a("#"+i).hide()}}else{if(h!="none"){a("#"+i).hide()}}clearTimeout(J);J=setTimeout(function(){j.removeClass("paused");if(a(".camera_play",V).length){a(".camera_play",V).hide();a(".camera_stop",V).show();if(h!="none"){a("#"+i).fadeIn()}}else{if(h!="none"){a("#"+i).fadeIn()}}},1500)}});var L,M;var N,O,P,q,r;var Q,R;if(e()&&b.mobileAutoAdvance!=""){O=b.mobileAutoAdvance}else{O=b.autoAdvance}if(O==false){j.addClass("paused")}if(e()&&b.mobileNavHover!=""){P=b.mobileNavHover}else{P=b.navigationHover}if(j.length!=0){var S=a(".cameraSlide",k);S.wrapInner('<div class="camerarelative" />');var T;var U=b.barDirection;var V=f;a("iframe",g).each(function(){var b=a(this);var c=b.attr("src");b.attr("data-src",c);var d=b.parent().index(".camera_src > div");a(".camera_target_content .cameraContent:eq("+d+")",f).append(b)});function W(){a("iframe",g).each(function(){a(".camera_caption",g).show();var c=a(this);var d=c.attr("data-src");c.attr("src",d);var e=b.imagePath+"blank.gif";var h=new Image;h.src=e;if(b.height.indexOf("%")!=-1){var i=Math.round(t/(100/parseFloat(b.height)));if(b.minHeight!=""&&i<parseFloat(b.minHeight)){u=parseFloat(b.minHeight)}else{u=i}}else if(b.height=="auto"){u=f.height()}else{u=parseFloat(b.height)}c.after(a(h).attr({"class":"imgFake",width:t,height:u}));var j=c.clone();c.remove();a(h).bind("click",function(){if(a(this).css("position")=="absolute"){a(this).remove();if(d.indexOf("vimeo")!=-1||d.indexOf("youtube")!=-1){if(d.indexOf("?")!=-1){autoplay="&autoplay=1"}else{autoplay="?autoplay=1"}}else if(d.indexOf("dailymotion")!=-1){if(d.indexOf("?")!=-1){autoplay="&autoPlay=1"}else{autoplay="?autoPlay=1"}}j.attr("src",d+autoplay);R=true}else{a(this).css({position:"absolute",top:0,left:0,zIndex:10}).after(j);j.css({position:"absolute",top:0,left:0,zIndex:9})}})})}W();if(b.hover==true){if(!e()){g.hover(function(){j.addClass("hovered")},function(){j.removeClass("hovered")})}}if(P==true){a(o,f).animate({opacity:0},0);a(p,f).animate({opacity:0},0);a(q,f).animate({opacity:0},0);if(e()){g.live("vmouseover",function(){a(o,f).animate({opacity:1},200);a(p,f).animate({opacity:1},200);a(q,f).animate({opacity:1},200)});g.live("vmouseout",function(){a(o,f).delay(500).animate({opacity:0},200);a(p,f).delay(500).animate({opacity:0},200);a(q,f).delay(500).animate({opacity:0},200)})}else{g.hover(function(){a(o,f).animate({opacity:1},200);a(p,f).animate({opacity:1},200);a(q,f).animate({opacity:1},200)},function(){a(o,f).animate({opacity:0},200);a(p,f).animate({opacity:0},200);a(q,f).animate({opacity:0},200)})}}a(".camera_stop",V).live("click",function(){O=false;j.addClass("paused");if(a(".camera_stop",V).length){a(".camera_stop",V).hide();a(".camera_play",V).show();if(h!="none"){a("#"+i).hide()}}else{if(h!="none"){a("#"+i).hide()}}});a(".camera_play",V).live("click",function(){O=true;j.removeClass("paused");if(a(".camera_play",V).length){a(".camera_play",V).hide();a(".camera_stop",V).show();if(h!="none"){a("#"+i).show()}}else{if(h!="none"){a("#"+i).show()}}});if(b.pauseOnClick==true){a(".camera_target_content",g).mouseup(function(){O=false;j.addClass("paused");a(".camera_stop",V).hide();a(".camera_play",V).show();a("#"+i).hide()})}a(".cameraContent, .imgFake",g).hover(function(){Q=true},function(){Q=false});a(".cameraContent, .imgFake",g).bind("click",function(){if(R==true&&Q==true){O=false;a(".camera_caption",g).hide();j.addClass("paused");a(".camera_stop",V).hide();a(".camera_play",V).show();a("#"+i).hide()}})}if(h!="pie"){n.append('<span class="camera_bar_cont" />');a(".camera_bar_cont",n).animate({opacity:b.loaderOpacity},0).css({position:"absolute",left:0,right:0,top:0,bottom:0,"background-color":b.loaderBgColor}).append('<span id="'+i+'" />');a("#"+i).animate({opacity:0},0);var Z=a("#"+i);Z.css({position:"absolute","background-color":b.loaderColor});switch(b.barPosition){case"left":n.css({right:"auto",width:b.loaderStroke});break;case"right":n.css({left:"auto",width:b.loaderStroke});break;case"top":n.css({bottom:"auto",height:b.loaderStroke});break;case"bottom":n.css({top:"auto",height:b.loaderStroke});break}switch(U){case"leftToRight":Z.css({left:0,right:0,top:b.loaderPadding,bottom:b.loaderPadding});break;case"rightToLeft":Z.css({left:0,right:0,top:b.loaderPadding,bottom:b.loaderPadding});break;case"topToBottom":Z.css({left:b.loaderPadding,right:b.loaderPadding,top:0,bottom:0});break;case"bottomToTop":Z.css({left:b.loaderPadding,right:b.loaderPadding,top:0,bottom:0});break}}else{m.append('<canvas id="'+i+'"></canvas>');var _;var Z=document.getElementById(i);Z.setAttribute("width",b.pieDiameter);Z.setAttribute("height",b.pieDiameter);var ab;switch(b.piePosition){case"leftTop":ab="left:0; top:0;";break;case"rightTop":ab="right:0; top:0;";break;case"leftBottom":ab="left:0; bottom:0;";break;case"rightBottom":ab="right:0; bottom:0;";break}Z.setAttribute("style","position:absolute; z-index:1002; "+ab);var bb;var cb;if(Z&&Z.getContext){var db=Z.getContext("2d");db.rotate(Math.PI*(3/2));db.translate(-b.pieDiameter,0)}}if(h=="none"||O==false){a("#"+i).hide();a(".camera_canvas_wrap",V).hide()}if(a(r).length){a(r).append('<ul class="camera_pag_ul" />');var eb;for(eb=0;eb<B;eb++){a(".camera_pag_ul",f).append('<li class="pag_nav_'+eb+'" style="position:relative; z-index:1002"><span><span>'+eb+"</span></span></li>")}a(".camera_pag_ul li",f).hover(function(){a(this).addClass("camera_hover");if(a(".camera_thumb",this).length){var b=a(".camera_thumb",this).outerWidth(),c=a(".camera_thumb",this).outerHeight(),d=a(this).outerWidth();a(".camera_thumb",this).show().css({top:"-"+c+"px",left:"-"+(b-d)/2+"px"}).animate({opacity:1,"margin-top":"-3px"},200);a(".thumb_arrow",this).show().animate({opacity:1,"margin-top":"-3px"},200)}},function(){a(this).removeClass("camera_hover");a(".camera_thumb",this).animate({"margin-top":"-20px",opacity:0},200,function(){a(this).css({marginTop:"5px"}).hide()});a(".thumb_arrow",this).animate({"margin-top":"-20px",opacity:0},200,function(){a(this).css({marginTop:"5px"}).hide()})})}if(a(s).length){var fb;if(!a(r).length){a(s).append("<div />");a(s).before('<div class="camera_prevThumbs hideNav"><div></div></div>').before('<div class="camera_nextThumbs hideNav"><div></div></div>');a("> div",s).append("<ul />");a.each(A,function(b,c){if(a("> div",j).eq(b).attr("data-thumb")!=""){var d=a("> div",j).eq(b).attr("data-thumb"),e=new Image;e.src=d;a("ul",s).append('<li class="pix_thumb pix_thumb_'+b+'" />');a("li.pix_thumb_"+b,s).append(a(e).attr("class","camera_thumb"))}})}else{a.each(A,function(b,c){if(a("> div",j).eq(b).attr("data-thumb")!=""){var d=a("> div",j).eq(b).attr("data-thumb"),e=new Image;e.src=d;a("li.pag_nav_"+b,r).append(a(e).attr("class","camera_thumb").css({position:"absolute"}).animate({opacity:0},0));a("li.pag_nav_"+b+" > img",r).after('<div class="thumb_arrow" />');a("li.pag_nav_"+b+" > .thumb_arrow",r).animate({opacity:0},0)}});f.css({marginBottom:a(r).outerHeight()})}}else if(!a(s).length&&a(r).length){f.css({marginBottom:a(r).outerHeight()})}var gb=true;if(a(q).length){a(q).append('<div class="camera_play"></div>').append('<div class="camera_stop"></div>');if(O==true){a(".camera_play",V).hide();a(".camera_stop",V).show()}else{a(".camera_stop",V).hide();a(".camera_play",V).show()}}ib();a(".moveFromLeft, .moveFromRight, .moveFromTop, .moveFromBottom, .fadeIn, .fadeFromLeft, .fadeFromRight, .fadeFromTop, .fadeFromBottom",g).each(function(){a(this).css("visibility","hidden")});b.onStartLoading.call(this);jb();if(a(o).length){a(o).click(function(){if(!j.hasClass("camerasliding")){var c=parseFloat(a(".cameraSlide.cameracurrent",k).index());clearInterval(L);W();a("#"+i+", .camera_canvas_wrap",f).animate({opacity:0},0);ib();if(c!=0){jb(c)}else{jb(B)}b.onStartLoading.call(this)}})}if(a(p).length){a(p).click(function(){if(!j.hasClass("camerasliding")){var c=parseFloat(a(".cameraSlide.cameracurrent",k).index());clearInterval(L);W();a("#"+i+", .camera_canvas_wrap",V).animate({opacity:0},0);ib();if(c==B-1){jb(1)}else{jb(c+2)}b.onStartLoading.call(this)}})}if(e()){g.bind("swipeleft",function(c){if(!j.hasClass("camerasliding")){var d=parseFloat(a(".cameraSlide.cameracurrent",k).index());clearInterval(L);W();a("#"+i+", .camera_canvas_wrap",V).animate({opacity:0},0);ib();if(d==B-1){jb(1)}else{jb(d+2)}b.onStartLoading.call(this)}});g.bind("swiperight",function(c){if(!j.hasClass("camerasliding")){var d=parseFloat(a(".cameraSlide.cameracurrent",k).index());clearInterval(L);W();a("#"+i+", .camera_canvas_wrap",V).animate({opacity:0},0);ib();if(d!=0){jb(d)}else{jb(B)}b.onStartLoading.call(this)}})}if(a(r).length){a(".camera_pag li",f).click(function(){if(!j.hasClass("camerasliding")){var c=parseFloat(a(this).index());var d=parseFloat(a(".cameraSlide.cameracurrent",k).index());if(c!=d){clearInterval(L);W();a("#"+i+", .camera_canvas_wrap",V).animate({opacity:0},0);ib();jb(c+1);b.onStartLoading.call(this)}}})}if(a(s).length){a(".pix_thumb img",s).click(function(){if(!j.hasClass("camerasliding")){var c=parseFloat(a(this).parents("li").index());var d=parseFloat(a(".cameracurrent",k).index());if(c!=d){clearInterval(L);W();a("#"+i+", .camera_canvas_wrap",V).animate({opacity:0},0);a(".pix_thumb",s).removeClass("cameracurrent");a(this).parents("li").addClass("cameracurrent");ib();jb(c+1);hb();b.onStartLoading.call(this)}}});a(".camera_thumbs_cont .camera_prevThumbs",V).hover(function(){a(this).stop(true,false).animate({opacity:1},250)},function(){a(this).stop(true,false).animate({opacity:.7},250)});a(".camera_prevThumbs",V).click(function(){var b=0,c=a(s).outerWidth(),d=a("ul",s).offset().left,e=a("> div",s).offset().left,f=e-d;a(".camera_visThumb",s).each(function(){var c=a(this).outerWidth();b=b+c});if(f-b>0){a("ul",s).animate({"margin-left":"-"+(f-b)+"px"},500,H)}else{a("ul",s).animate({"margin-left":0},500,H)}});a(".camera_thumbs_cont .camera_nextThumbs",V).hover(function(){a(this).stop(true,false).animate({opacity:1},250)},function(){a(this).stop(true,false).animate({opacity:.7},250)});a(".camera_nextThumbs",V).click(function(){var b=0,c=a(s).outerWidth(),d=a("ul",s).outerWidth(),e=a("ul",s).offset().left,f=a("> div",s).offset().left,g=f-e;a(".camera_visThumb",s).each(function(){var c=a(this).outerWidth();b=b+c});if(g+b+b<d){a("ul",s).animate({"margin-left":"-"+(g+b)+"px"},500,H)}else{a("ul",s).animate({"margin-left":"-"+(d-c)+"px"},500,H)}})}}})(jQuery);(function(a){a.fn.cameraStop=function(){var b=a(this),c=a(".camera_src",b),d="pie_"+b.index();c.addClass("stopped");if(a(".camera_showcommands").length){var e=a(".camera_thumbs_wrap",b)}else{var e=b}}})(jQuery);(function(a){a.fn.cameraPause=function(){var b=a(this);var c=a(".camera_src",b);c.addClass("paused")}})(jQuery);(function(a){a.fn.cameraResume=function(){var b=a(this);var c=a(".camera_src",b);if(typeof autoAdv==="undefined"||autoAdv!==true){c.removeClass("paused")}}})(jQuery);



/**
 * Copyright (c) 2007-2012 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * @author Ariel Flesler
 * @version 1.4.3.1
 */
;(function($){var h=$.scrollTo=function(a,b,c){$(window).scrollTo(a,b,c)};h.defaults={axis:'xy',duration:parseFloat($.fn.jquery)>=1.3?0:1,limit:true};h.window=function(a){return $(window)._scrollable()};$.fn._scrollable=function(){return this.map(function(){var a=this,isWin=!a.nodeName||$.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!isWin)return a;var b=(a.contentWindow||a).document||a.ownerDocument||a;return/webkit/i.test(navigator.userAgent)||b.compatMode=='BackCompat'?b.body:b.documentElement})};$.fn.scrollTo=function(e,f,g){if(typeof f=='object'){g=f;f=0}if(typeof g=='function')g={onAfter:g};if(e=='max')e=9e9;g=$.extend({},h.defaults,g);f=f||g.duration;g.queue=g.queue&&g.axis.length>1;if(g.queue)f/=2;g.offset=both(g.offset);g.over=both(g.over);return this._scrollable().each(function(){if(e==null)return;var d=this,$elem=$(d),targ=e,toff,attr={},win=$elem.is('html,body');switch(typeof targ){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(targ)){targ=both(targ);break}targ=$(targ,this);if(!targ.length)return;case'object':if(targ.is||targ.style)toff=(targ=$(targ)).offset()}$.each(g.axis.split(''),function(i,a){var b=a=='x'?'Left':'Top',pos=b.toLowerCase(),key='scroll'+b,old=d[key],max=h.max(d,a);if(toff){attr[key]=toff[pos]+(win?0:old-$elem.offset()[pos]);if(g.margin){attr[key]-=parseInt(targ.css('margin'+b))||0;attr[key]-=parseInt(targ.css('border'+b+'Width'))||0}attr[key]+=g.offset[pos]||0;if(g.over[pos])attr[key]+=targ[a=='x'?'width':'height']()*g.over[pos]}else{var c=targ[pos];attr[key]=c.slice&&c.slice(-1)=='%'?parseFloat(c)/100*max:c}if(g.limit&&/^\d+$/.test(attr[key]))attr[key]=attr[key]<=0?0:Math.min(attr[key],max);if(!i&&g.queue){if(old!=attr[key])animate(g.onAfterFirst);delete attr[key]}});animate(g.onAfter);function animate(a){$elem.animate(attr,f,g.easing,a&&function(){a.call(this,e,g)})}}).end()};h.max=function(a,b){var c=b=='x'?'Width':'Height',scroll='scroll'+c;if(!$(a).is('html,body'))return a[scroll]-$(a)[c.toLowerCase()]();var d='client'+c,html=a.ownerDocument.documentElement,body=a.ownerDocument.body;return Math.max(html[scroll],body[scroll])-Math.min(html[d],body[d])};function both(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);


// Generated by CoffeeScript 1.4.0
/*
jQuery Waypoints - v2.0.1
Copyright (c) 2011-2013 Caleb Troughton
Dual licensed under the MIT license and GPL license.
https://github.com/imakewebthings/jquery-waypoints/blob/master/licenses.txt
*/
(function(){var t,e,n,r,i,o,l,s,f,u,a,c,h,d,p,w,y=[].indexOf||function(t){for(var e=0,n=this.length;e<n;e++){if(e in this&&this[e]===t)return e}return-1},v=[].slice;t=window.jQuery;e=t(window);i={horizontal:{},vertical:{}};o=1;s={};l="waypoints-context-id";a="resize.waypoints";c="scroll.waypoints";h=1;d="waypoints-waypoint-ids";p="waypoint";w="waypoints";n=function(){function e(e){var n=this;this.$element=e;this.element=e[0];this.didResize=false;this.didScroll=false;this.id="context"+o++;this.oldScroll={x:e.scrollLeft(),y:e.scrollTop()};this.waypoints={horizontal:{},vertical:{}};e.data(l,this.id);s[this.id]=this;e.bind(c,function(){var e;if(!n.didScroll){n.didScroll=true;e=function(){n.doScroll();return n.didScroll=false};return window.setTimeout(e,t[w].settings.scrollThrottle)}});e.bind(a,function(){var e;if(!n.didResize){n.didResize=true;e=function(){t[w]("refresh");return n.didResize=false};return window.setTimeout(e,t[w].settings.resizeThrottle)}})}e.prototype.doScroll=function(){var e,n=this;e={horizontal:{newScroll:this.$element.scrollLeft(),oldScroll:this.oldScroll.x,forward:"right",backward:"left"},vertical:{newScroll:this.$element.scrollTop(),oldScroll:this.oldScroll.y,forward:"down",backward:"up"}};if(y.call(window,"ontouchstart")>=0&&(!e.vertical.oldScroll||!e.vertical.newScroll)){t[w]("refresh")}t.each(e,function(e,r){var i,o,l;l=[];o=r.newScroll>r.oldScroll;i=o?r.forward:r.backward;t.each(n.waypoints[e],function(t,e){var n,i;if(r.oldScroll<(n=e.offset)&&n<=r.newScroll){return l.push(e)}else if(r.newScroll<(i=e.offset)&&i<=r.oldScroll){return l.push(e)}});l.sort(function(t,e){return t.offset-e.offset});if(!o){l.reverse()}return t.each(l,function(t,e){if(e.options.continuous||t===l.length-1){return e.trigger([i])}})});return this.oldScroll={x:e.horizontal.newScroll,y:e.vertical.newScroll}};e.prototype.refresh=function(){var e,n,r,i=this;r=t.isWindow(this.element);n=this.$element.offset();this.doScroll();e={horizontal:{contextOffset:r?0:n.left,contextScroll:r?0:this.oldScroll.x,contextDimension:this.$element.width(),oldScroll:this.oldScroll.x,forward:"right",backward:"left",offsetProp:"left"},vertical:{contextOffset:r?0:n.top,contextScroll:r?0:this.oldScroll.y,contextDimension:r?t[w]("viewportHeight"):this.$element.height(),oldScroll:this.oldScroll.y,forward:"down",backward:"up",offsetProp:"top"}};return t.each(e,function(e,n){return t.each(i.waypoints[e],function(e,r){var i,o,l,s,f;i=r.options.offset;l=r.offset;o=t.isWindow(r.element)?0:r.$element.offset()[n.offsetProp];if(t.isFunction(i)){i=i.apply(r.element)}else if(typeof i==="string"){i=parseFloat(i);if(r.options.offset.indexOf("%")>-1){i=Math.ceil(n.contextDimension*i/100)}}r.offset=o-n.contextOffset+n.contextScroll-i;if(r.options.onlyOnScroll&&l!=null||!r.enabled){return}if(l!==null&&l<(s=n.oldScroll)&&s<=r.offset){return r.trigger([n.backward])}else if(l!==null&&l>(f=n.oldScroll)&&f>=r.offset){return r.trigger([n.forward])}else if(l===null&&n.oldScroll>=r.offset){return r.trigger([n.forward])}})})};e.prototype.checkEmpty=function(){if(t.isEmptyObject(this.waypoints.horizontal)&&t.isEmptyObject(this.waypoints.vertical)){this.$element.unbind([a,c].join(" "));return delete s[this.id]}};return e}();r=function(){function e(e,n,r){var o,l;r=t.extend({},t.fn[p].defaults,r);if(r.offset==="bottom-in-view"){r.offset=function(){var e;e=t[w]("viewportHeight");if(!t.isWindow(n.element)){e=n.$element.height()}return e-t(this).outerHeight()}}this.$element=e;this.element=e[0];this.axis=r.horizontal?"horizontal":"vertical";this.callback=r.handler;this.context=n;this.enabled=r.enabled;this.id="waypoints"+h++;this.offset=null;this.options=r;n.waypoints[this.axis][this.id]=this;i[this.axis][this.id]=this;o=(l=e.data(d))!=null?l:[];o.push(this.id);e.data(d,o)}e.prototype.trigger=function(t){if(!this.enabled){return}if(this.callback!=null){this.callback.apply(this.element,t)}if(this.options.triggerOnce){return this.destroy()}};e.prototype.disable=function(){return this.enabled=false};e.prototype.enable=function(){this.context.refresh();return this.enabled=true};e.prototype.destroy=function(){delete i[this.axis][this.id];delete this.context.waypoints[this.axis][this.id];return this.context.checkEmpty()};e.getWaypointsByElement=function(e){var n,r;r=t(e).data(d);if(!r){return[]}n=t.extend({},i.horizontal,i.vertical);return t.map(r,function(t){return n[t]})};return e}();u={init:function(e,i){var o;if(i==null){i={}}if((o=i.handler)==null){i.handler=e}this.each(function(){var e,o,f,u;e=t(this);f=(u=i.context)!=null?u:t.fn[p].defaults.context;if(!t.isWindow(f)){f=e.closest(f)}f=t(f);o=s[f.data(l)];if(!o){o=new n(f)}return new r(e,o,i)});t[w]("refresh");return this},disable:function(){return u._invoke(this,"disable")},enable:function(){return u._invoke(this,"enable")},destroy:function(){return u._invoke(this,"destroy")},prev:function(t,e){return u._traverse.call(this,t,e,function(t,e,n){if(e>0){return t.push(n[e-1])}})},next:function(t,e){return u._traverse.call(this,t,e,function(t,e,n){if(e<n.length-1){return t.push(n[e+1])}})},_traverse:function(e,n,r){var i,o;if(e==null){e="vertical"}if(n==null){n=window}o=f.aggregate(n);i=[];this.each(function(){var n;n=t.inArray(this,o[e]);return r(i,n,o[e])});return this.pushStack(i)},_invoke:function(e,n){e.each(function(){var e;e=r.getWaypointsByElement(this);return t.each(e,function(t,e){e[n]();return true})});return this}};t.fn[p]=function(){var e,n;n=arguments[0],e=2<=arguments.length?v.call(arguments,1):[];if(u[n]){return u[n].apply(this,e)}else if(t.isFunction(n)){return u.init.apply(this,arguments)}else if(t.isPlainObject(n)){return u.init.apply(this,[null,n])}else if(!n){return t.error("jQuery Waypoints needs a callback function or handler option.")}else{return t.error("The "+n+" method does not exist in jQuery Waypoints.")}};t.fn[p].defaults={context:window,continuous:true,enabled:true,horizontal:false,offset:0,triggerOnce:false};f={refresh:function(){return t.each(s,function(t,e){return e.refresh()})},viewportHeight:function(){var t;return(t=window.innerHeight)!=null?t:e.height()},aggregate:function(e){var n,r,o;n=i;if(e){n=(o=s[t(e).data(l)])!=null?o.waypoints:void 0}if(!n){return[]}r={horizontal:[],vertical:[]};t.each(r,function(e,i){t.each(n[e],function(t,e){return i.push(e)});i.sort(function(t,e){return t.offset-e.offset});r[e]=t.map(i,function(t){return t.element});return r[e]=t.unique(r[e])});return r},above:function(t){if(t==null){t=window}return f._filter(t,"vertical",function(t,e){return e.offset<=t.oldScroll.y})},below:function(t){if(t==null){t=window}return f._filter(t,"vertical",function(t,e){return e.offset>t.oldScroll.y})},left:function(t){if(t==null){t=window}return f._filter(t,"horizontal",function(t,e){return e.offset<=t.oldScroll.x})},right:function(t){if(t==null){t=window}return f._filter(t,"horizontal",function(t,e){return e.offset>t.oldScroll.x})},enable:function(){return f._invoke("enable")},disable:function(){return f._invoke("disable")},destroy:function(){return f._invoke("destroy")},extendFn:function(t,e){return u[t]=e},_invoke:function(e){var n;n=t.extend({},i.vertical,i.horizontal);return t.each(n,function(t,n){n[e]();return true})},_filter:function(e,n,r){var i,o;i=s[t(e).data(l)];if(!i){return[]}o=[];t.each(i.waypoints[n],function(t,e){if(r(i,e)){return o.push(e)}});o.sort(function(t,e){return t.offset-e.offset});return t.map(o,function(t){return t.element})}};t[w]=function(){var t,e;e=arguments[0],t=2<=arguments.length?v.call(arguments,1):[];if(f[e]){return f[e].apply(null,t)}else{return f.aggregate.call(null,e)}};t[w].settings={resizeThrottle:100,scrollThrottle:30};e.load(function(){return t[w]("refresh")})}).call(this);


/*
    Breakpoints.js
    version 1.0
    
    Creates handy events for your responsive design breakpoints
    
    Copyright 2011 XOXCO, Inc
    http://xoxco.com/

    Documentation for this plugin lives here:
    http://xoxco.com/projects/code/breakpoints
    
    Licensed under the MIT license:
    http://www.opensource.org/licenses/mit-license.php

*/
(function($) {

    var lastSize = 0;
    var interval = null;

    $.fn.resetBreakpoints = function() {
        $(window).unbind('resize');
        if (interval) {
            clearInterval(interval);
        }
        lastSize = 0;
    };
    
    $.fn.setBreakpoints = function(settings) {
        var options = jQuery.extend({
                            distinct: true,
                            breakpoints: new Array(320,480,768,1024)
                        },settings);


        interval = setInterval(function() {
    
            var w = $(window).width();
            var done = false;
            
            for (var bp in options.breakpoints.sort(function(a,b) { return (b-a) })) {
            
                // fire onEnter when a browser expands into a new breakpoint
                // if in distinct mode, remove all other breakpoints first.
                if (!done && w >= options.breakpoints[bp] && lastSize < options.breakpoints[bp]) {
                    if (options.distinct) {
                        for (var x in options.breakpoints.sort(function(a,b) { return (b-a) })) {
                            if ($('body').hasClass('breakpoint-' + options.breakpoints[x])) {
                                $('body').removeClass('breakpoint-' + options.breakpoints[x]);
                                $(window).trigger('exitBreakpoint' + options.breakpoints[x]);
                            }
                        }
                        done = true;
                    }
                    $('body').addClass('breakpoint-' + options.breakpoints[bp]);
                    $(window).trigger('enterBreakpoint' + options.breakpoints[bp]);

                }               

                // fire onExit when browser contracts out of a larger breakpoint
                if (w < options.breakpoints[bp] && lastSize >= options.breakpoints[bp]) {
                    $('body').removeClass('breakpoint-' + options.breakpoints[bp]);
                    $(window).trigger('exitBreakpoint' + options.breakpoints[bp]);

                }
                
                // if in distinct mode, fire onEnter when browser contracts into a smaller breakpoint
                if (
                    options.distinct && // only one breakpoint at a time
                    w >= options.breakpoints[bp] && // and we are in this one
                    w < options.breakpoints[bp-1] && // and smaller than the bigger one
                    lastSize > w && // and we contracted
                    lastSize >0 &&  // and this is not the first time
                    !$('body').hasClass('breakpoint-' + options.breakpoints[bp]) // and we aren't already in this breakpoint
                    ) {                 
                    $('body').addClass('breakpoint-' + options.breakpoints[bp]);
                    $(window).trigger('enterBreakpoint' + options.breakpoints[bp]);

                }                       
            }
            
            // set up for next call
            if (lastSize != w) {
                lastSize = w;
            }
        },250);
    };
    
})(jQuery);




/* ****************************************************************************

    CJ Object Scaler jQuery Plug-In v3.0.0

    Copyright (c) 2011, Doug Jones. All rights reserved.
    
    Redistribution and use in source and binary forms, with or without
    modification, are permitted provided that the following conditions are met:
    
    Redistributions of source code must retain the above copyright notice, this
    list of conditions and the following disclaimer. Redistributions in binary
    form must reproduce the above copyright notice, this list of conditions and
    the following disclaimer in the documentation and/or other materials
    provided with the distribution. Neither the name BernieCode nor
    the names of its contributors may be used to endorse or promote products
    derived from this software without specific prior written permission. 
    
    THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
    AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
    IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
    ARE DISCLAIMED. IN NO EVENT SHALL THE REGENTS OR CONTRIBUTORS BE LIABLE FOR
    ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
    DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
    SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
    CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
    LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY
    OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH
    DAMAGE.
    
    For more information please visit www.cjboco.com.

**************************************************************************** */

/*
 mit license. paul irish. 2010. (https://gist.github.com/268257)
*/
(function($){$.fn.imagesLoaded=function(b){var c=this.filter('img'),len=c.length;c.bind('load',function(){if(--len<=0){b.call(c,this)}}).each(function(){if(this.complete||this.complete===undefined){var a=this.src;this.src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";this.src=a}});return this}}(jQuery));

/*
 CJ Object Scaler
*/
(function($){$.fn.extend({cjObjectScaler:function(c,d){var e={scaleObj:function(a){var b=a.data('cj'),o=b.options,destW=$(o.destElem).width(),destH=$(o.destElem).height(),ratioX,ratioY,scale,newWidth,newHeight,borderW=parseInt(a.css("borderLeftWidth"),10)+parseInt(a.css("borderRightWidth"),10),borderH=parseInt(a.css("borderTopWidth"),10)+parseInt(a.css("borderBottomWidth"),10);borderW=isNaN(borderW)?0:borderW;borderH=isNaN(borderH)?0:borderH;ratioX=destW/a.width();ratioY=destH/a.height();if(!a.hasClass("cf_image_scaler_fill")&&(a.hasClass("cf_image_scaler_fit")||o.method==="fit")){scale=ratioX<ratioY?ratioX:ratioY}else if(!a.hasClass("cf_image_scaler_fit")&&(a.hasClass("cf_image_scaler_fill")||o.method==="fill")){scale=ratioX>ratioY?ratioX:ratioY}newWidth=parseInt(a.width()*scale,10)-borderW;newHeight=parseInt(a.height()*scale,10)-borderH;a.css({"width":newWidth+"px","height":newHeight+"px","position":"absolute","top":(parseInt((destH-newHeight)/2,10)-parseInt(borderH/2,10))+"px","left":(parseInt((destW-newWidth)/2,10)-parseInt(borderW/2,10))+"px"}).attr({"width":newWidth,"height":newHeight});if(o.fade>0){a.fadeIn(o.fade)}if(typeof d==="function"){d()}}};if(typeof c==="object"||!c){return this.each(function(){var a=$(this),data=a.data('cj'),o;if(!data){a.data('cj',{options:{method:"fill",destElem:null,fade:0}});data=a.data('cj')}if(c){data.options=$.extend(data.options,c)}o=data.options;if(o.destElem===null){o.destElem=a.parent()}if($(o.destElem).css("position")==="static"){$(o.destElem).css({"position":"relative"})}if(typeof a==="object"&&typeof o.destElem==="object"&&typeof o.method==="string"){if(o.fade>0){a.hide()}if(a.get(0).nodeName==="IMG"){a.width("auto");a.height("auto");a.imagesLoaded(function(){e.scaleObj(a)})}else{e.scaleObj(a)}}else{$.error("CJ Object Scaler could not initialize. Bad parameters.")}})}else{$.error('Method/Option '+c+' does not exist.')}}})}(jQuery));



/*
Plugin: jQuery Parallax
Version 1.1.3
Author: Ian Lunn
Twitter: @IanLunn
Author URL: http://www.ianlunn.co.uk/
Plugin URL: http://www.ianlunn.co.uk/plugins/jquery-parallax/

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html
*/

(function( $ ){
    var $window = $(window);
    var windowHeight = $window.height();

    $window.resize(function () {
        windowHeight = $window.height();
    });

    $.fn.parallax = function(xpos, speedFactor, outerHeight) {
        var $this = $(this);
        var getHeight;
        var firstTop;
        var paddingTop = 0;
        
        //get the starting position of each element to have parallax applied to it      
        $this.each(function(){
            firstTop = $this.offset().top;
        });

        if (outerHeight) {
            getHeight = function(jqo) {
                return jqo.outerHeight(true);
            };
        } else {
            getHeight = function(jqo) {
                return jqo.height();
            };
        }
            
        // setup defaults if arguments aren't specified
        if (arguments.length < 1 || xpos === null) xpos = "50%";
        if (arguments.length < 2 || speedFactor === null) speedFactor = 0.1;
        if (arguments.length < 3 || outerHeight === null) outerHeight = true;
        
        // function to be called whenever the window is scrolled or resized
        function update(){
            var pos = $window.scrollTop();              

            $this.each(function(){
                var $element = $(this);
                var top = $element.offset().top;
                var height = getHeight($element);

                // Check if totally above or totally below viewport
                if (top + height < pos || top > pos + windowHeight) {
                    return;
                }

                $this.css('backgroundPosition', xpos + " " + Math.round((firstTop - pos) * speedFactor) + "px");
            });
        }       

        $window.bind('scroll', update).resize(update);
        update();
    };
})(jQuery);


/*! Copyright (c) 2011 Brandon Aaron (http://brandonaaron.net)
 * Licensed under the MIT License (LICENSE.txt).
 *
 * Thanks to: http://adomas.org/javascript-mouse-wheel/ for some pointers.
 * Thanks to: Mathias Bank(http://www.mathias-bank.de) for a scope bug fix.
 * Thanks to: Seamus Leahy for adding deltaX and deltaY
 *
 * Version: 3.0.6
 * 
 * Requires: 1.2.2+
 */
(function(d){function e(a){var b=a||window.event,c=[].slice.call(arguments,1),f=0,e=0,g=0,a=d.event.fix(b);a.type="mousewheel";b.wheelDelta&&(f=b.wheelDelta/120);b.detail&&(f=-b.detail/3);g=f;b.axis!==void 0&&b.axis===b.HORIZONTAL_AXIS&&(g=0,e=-1*f);b.wheelDeltaY!==void 0&&(g=b.wheelDeltaY/120);b.wheelDeltaX!==void 0&&(e=-1*b.wheelDeltaX/120);c.unshift(a,f,e,g);return(d.event.dispatch||d.event.handle).apply(this,c)}var c=["DOMMouseScroll","mousewheel"];if(d.event.fixHooks)for(var h=c.length;h;)d.event.fixHooks[c[--h]]=
d.event.mouseHooks;d.event.special.mousewheel={setup:function(){if(this.addEventListener)for(var a=c.length;a;)this.addEventListener(c[--a],e,false);else this.onmousewheel=e},teardown:function(){if(this.removeEventListener)for(var a=c.length;a;)this.removeEventListener(c[--a],e,false);else this.onmousewheel=null}};d.fn.extend({mousewheel:function(a){return a?this.bind("mousewheel",a):this.trigger("mousewheel")},unmousewheel:function(a){return this.unbind("mousewheel",a)}})})(jQuery);




/*
 * Marquee jQuery Plug-in
 *
 * Copyright 2009 Giva, Inc. (http://www.givainc.com/labs/) 
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *  http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * Date: 2009-05-20
 * Rev:  1.0.01
 */
(function(A){A.marquee={version:"1.0.01"};A.fn.marquee=function(E){var F=typeof arguments[0]=="string"&&arguments[0];var D=F&&Array.prototype.slice.call(arguments,1)||arguments;var C=(this.length==0)?null:A.data(this[0],"marquee");if(C&&F&&this.length){if(F.toLowerCase()=="object"){return C}else{if(C[F]){var B;this.each(function(G){var H=A.data(this,"marquee")[F].apply(C,D);if(G==0&&H){if(!!H.jquery){B=A([]).add(H)}else{B=H;return false}}else{if(!!H&&!!H.jquery){B=B.add(H)}}});return B||this}else{return this}}}else{return this.each(function(){new A.Marquee(this,E)})}};A.Marquee=function(E,Q){Q=A.extend({},A.Marquee.defaults,Q);var O=this,M=A(E),F=M.find("> li"),H=-1,G=false,L=false,N=0;A.data(M[0],"marquee",O);this.pause=function(){G=true;P()};this.resume=function(){G=false;D()};this.update=function(){var R=F.length;F=M.find("> li");if(R<=1){D()}};function K(R){if(F.filter("."+Q.cssShowing).length>0){return false}var T=F.eq(R);if(A.isFunction(Q.beforeshow)){Q.beforeshow.apply(O,[M,T])}var S={top:(Q.yScroll=="top"?"-":"+")+T.outerHeight()+"px",left:0};M.data("marquee.showing",true);T.addClass(Q.cssShowing);T.css(S).animate({top:"0px"},Q.showSpeed,Q.fxEasingShow,function(){if(A.isFunction(Q.show)){Q.show.apply(O,[M,T])}M.data("marquee.showing",false);J(T)})}function J(S,R){if(L==true){return false}R=R||Q.pauseSpeed;if(C(S)){setTimeout(function(){if(L==true){return false}var V=S.outerWidth(),T=V*-1,U=parseInt(S.css("left"),10);S.animate({left:T+"px"},((V+U)*Q.scrollSpeed),Q.fxEasingScroll,function(){I(S)})},R)}else{if(F.length>1){setTimeout(function(){if(L==true){return false}S.animate({top:(Q.yScroll=="top"?"+":"-")+M.innerHeight()+"px"},Q.showSpeed,Q.fxEasingScroll);I(S)},R)}}}function I(R){if(A.isFunction(Q.aftershow)){Q.aftershow.apply(O,[M,R])}R.removeClass(Q.cssShowing);B()}function P(){L=true;if(M.data("marquee.showing")!=true){F.filter("."+Q.cssShowing).dequeue().stop()}}function D(){L=false;if(M.data("marquee.showing")!=true){J(F.filter("."+Q.cssShowing),1)}}if(Q.pauseOnHover){M.hover(function(){if(G){return false}P()},function(){if(G){return false}D()})}function C(R){return(R.outerWidth()>M.innerWidth())}function B(){H++;if(H>=F.length){if(!isNaN(Q.loop)&&Q.loop>0&&(++N>=Q.loop)){return false}H=0}K(H)}if(A.isFunction(Q.init)){Q.init.apply(O,[M,Q])}B()};A.Marquee.defaults={yScroll:"top",showSpeed:850,scrollSpeed:12,pauseSpeed:5000,pauseOnHover:true,loop:-1,fxEasingShow:"swing",fxEasingScroll:"linear",cssShowing:"marquee-showing",init:null,beforeshow:null,show:null,aftershow:null}})(jQuery);

/**
 *  jQuery Avgrund Popin Plugin
 *  http://github.com/voronianski/jquery.avgrund.js/
 *
 *  MIT licensed, (c) 2012 http://pixelhunter.me/
 */

(function($) {
  $.fn.avgrund = function(options) {
    var defaults = {
      width: 380, // max = 640
      height: 280, // max = 350
      showClose: false,
      showCloseText: '',
      closeByEscape: true,
      closeByDocument: true,
      holderClass: '',
      overlayClass: '',
      enableStackAnimation: false,
      onBlurContainer: '',
      openOnEvent: true,
      setEvent: 'click',
      onLoad: function() {},
      onUnload: function() {},
      template: '<p>This is test popin content!</p>'
    };

    options = $.extend(defaults, options);

    return this.each(function() {
      var self = $(this),
        body = $('body'),
        maxWidth = options.width > 640 ? 640 : options.width,
        maxHeight = options.height > 350 ? 350 : options.height,
        template = typeof options.template === 'function' ? options.template(self) : options.template;

      body.addClass('avgrund-ready');

      if (options.onBlurContainer !== '') {
        $(options.onBlurContainer).addClass('avgrund-blur');
      }

      // close popup by clicking Esc button
      function onDocumentKeyup(e) {
        if (options.closeByEscape) {
          if (e.keyCode === 27) {
            deactivate();
          }
        }
      }

      // close popup by clicking outside it
      function onDocumentClick(e) {
        e.preventDefault();

        if (options.closeByDocument) {
          if ($(e.target).is('.avgrund-overlay, .avgrund-close')) {
            deactivate();
          }
        } else {
          if ($(e.target).is('.avgrund-close')) {
            deactivate();
          }
        }
      }

      // show popup
      function activate() {
        // check if onLoad is a function and call it before popin is active
        if (typeof options.onLoad === 'function') {
          options.onLoad.call(self);
        }

        setTimeout(function() {
          body.addClass('avgrund-active');
        }, 100);

        body.append('<div class="avgrund-overlay ' + options.overlayClass + '"></div>');
        body.append('<div class="avgrund-popin ' + options.holderClass + '">' + template + '</div>');

        $('.avgrund-popin').css({
          'width': maxWidth + 'px',
          'height': maxHeight + 'px',
          'margin-left': '-' + (maxWidth / 2 + 10) + 'px',
          'margin-top': '-' + (maxHeight / 2 + 10) + 'px'
        });

        if (options.showClose) {
          $('.avgrund-popin').append('<a href="#" class="avgrund-close">' + options.showCloseText + '</a>');
        }

        if (options.enableStackAnimation) {
          $('.avgrund-popin').addClass('stack');
        }

        // fixing -webkit overlay 'transform/position:fixed/overflow' issue
        body.wrapInner('<div class="avgrund-wrap-inner" />');

        body.bind('keyup', onDocumentKeyup);
        body.bind('click', onDocumentClick);
      }

      // hide popup
      function deactivate() {
        body.unbind('keyup', onDocumentKeyup);
        body.unbind('click', onDocumentClick);

        body.removeClass('avgrund-active');

        // prevent multiple overlays
        $('.avgrund-overlay').remove();

        // remove after small pause to apply special avgrund effect
        setTimeout(function() {
          $('.avgrund-popin').remove();
          $('.avgrund-wrap-inner > *').unwrap();
        }, 500);

        // check if onUnload is a function and call it after popin is closed
        if (typeof options.onUnload === 'function') {
          options.onUnload.call(self);
        }
      }

      // init on click or custom event
      if (options.openOnEvent) {
        self.bind(options.setEvent, function(e) {
          e.stopPropagation();

          // prevent redirect for href url
          if ($(e.target).is('a')) {
            e.preventDefault();
          }

          activate();
        });
      } else {
        activate();
      }
    });

  };
})(jQuery);











