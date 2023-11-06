!function(e,t){"object"==typeof exports&&"undefined"!=typeof module?module.exports=t():"function"==typeof define&&define.amd?define(t):e.Popper=t()}(this,function(){"use strict";for(var e=["native code","[object MutationObserverConstructor]"],t="undefined"!=typeof window,n=["Edge","Trident","Firefox"],o=0,r=0;r<n.length;r+=1)if(t&&0<=navigator.userAgent.indexOf(n[r])){o=1;break}var i,a=t&&(i=window.MutationObserver,e.some(function(e){return-1<(i||"").toString().indexOf(e)}))?function(e){var t=!1,n=0,o=document.createElement("span");return new MutationObserver(function(){e(),t=!1}).observe(o,{attributes:!0}),function(){t||(t=!0,o.setAttribute("x-index",n),n+=1)}}:function(e){var t=!1;return function(){t||(t=!0,setTimeout(function(){t=!1,e()},o))}};function s(e){return e&&"[object Function]"==={}.toString.call(e)}function b(e,t){if(1!==e.nodeType)return[];var n=window.getComputedStyle(e,null);return t?n[t]:n}function w(e){return"HTML"===e.nodeName?e:e.parentNode||e.host}function y(e){if(!e||-1!==["HTML","BODY","#document"].indexOf(e.nodeName))return window.document.body;var t=b(e),n=t.overflow,o=t.overflowX,r=t.overflowY;return/(auto|scroll)/.test(n+r+o)?e:y(w(e))}function x(e){var t=e&&e.offsetParent,n=t&&t.nodeName;return n&&"BODY"!==n&&"HTML"!==n?-1!==["TD","TABLE"].indexOf(t.nodeName)&&"static"===b(t,"position")?x(t):t:window.document.documentElement}function l(e){return null!==e.parentNode?l(e.parentNode):e}function O(e,t){if(!(e&&e.nodeType&&t&&t.nodeType))return window.document.documentElement;var n=e.compareDocumentPosition(t)&Node.DOCUMENT_POSITION_FOLLOWING,o=n?e:t,r=n?t:e,i=document.createRange();i.setStart(o,0),i.setEnd(r,0);var a,s,f=i.commonAncestorContainer;if(e!==f&&t!==f||o.contains(r))return"BODY"===(s=(a=f).nodeName)||"HTML"!==s&&x(a.firstElementChild)!==a?x(f):f;var p=l(e);return p.host?O(p.host,t):O(e,l(t).host)}function E(e){var t="top"===(1<arguments.length&&void 0!==arguments[1]?arguments[1]:"top")?"scrollTop":"scrollLeft",n=e.nodeName;if("BODY"!==n&&"HTML"!==n)return e[t];var o=window.document.documentElement;return(window.document.scrollingElement||o)[t]}function d(e,t){var n="x"===t?"Left":"Top",o="Left"===n?"Right":"Bottom";return+e["border"+n+"Width"].split("px")[0]+ +e["border"+o+"Width"].split("px")[0]}var f=void 0,c=function(){return void 0===f&&(f=-1!==navigator.appVersion.indexOf("MSIE 10")),f};function p(e,t,n,o){return Math.max(t["offset"+e],t["scroll"+e],n["client"+e],n["offset"+e],n["scroll"+e],c()?n["offset"+e]+o["margin"+("Height"===e?"Top":"Left")]+o["margin"+("Height"===e?"Bottom":"Right")]:0)}function L(){var e=window.document.body,t=window.document.documentElement,n=c()&&window.getComputedStyle(t);return{height:p("Height",e,t,n),width:p("Width",e,t,n)}}var u=function(){function o(e,t){for(var n=0;n<t.length;n++){var o=t[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,o.key,o)}}return function(e,t,n){return t&&o(e.prototype,t),n&&o(e,n),e}}(),h=function(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e},T=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var n=arguments[t];for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(e[o]=n[o])}return e};function M(e){return T({},e,{right:e.left+e.width,bottom:e.top+e.height})}function N(e){var t={};if(c())try{t=e.getBoundingClientRect();var n=E(e,"top"),o=E(e,"left");t.top+=n,t.left+=o,t.bottom+=n,t.right+=o}catch(e){}else t=e.getBoundingClientRect();var r={left:t.left,top:t.top,width:t.right-t.left,height:t.bottom-t.top},i="HTML"===e.nodeName?L():{},a=i.width||e.clientWidth||r.right-r.left,s=i.height||e.clientHeight||r.bottom-r.top,f=e.offsetWidth-a,p=e.offsetHeight-s;if(f||p){var l=b(e);f-=d(l,"x"),p-=d(l,"y"),r.width-=f,r.height-=p}return M(r)}function k(e,t){var n=c(),o="HTML"===t.nodeName,r=N(e),i=N(t),a=y(e),s=b(t),f=+s.borderTopWidth.split("px")[0],p=+s.borderLeftWidth.split("px")[0],l=M({top:r.top-i.top-f,left:r.left-i.left-p,width:r.width,height:r.height});if(l.marginTop=0,l.marginLeft=0,!n&&o){var d=+s.marginTop.split("px")[0],u=+s.marginLeft.split("px")[0];l.top-=f-d,l.bottom-=f-d,l.left-=p-u,l.right-=p-u,l.marginTop=d,l.marginLeft=u}return(n?t.contains(a):t===a&&"BODY"!==a.nodeName)&&(l=function(e,t){var n=2<arguments.length&&void 0!==arguments[2]&&arguments[2],o=E(t,"top"),r=E(t,"left"),i=n?-1:1;return e.top+=o*i,e.bottom+=o*i,e.left+=r*i,e.right+=r*i,e}(l,t)),l}function A(e,t,n,o){var r,i,a,s,f,p,l,d={top:0,left:0},u=O(e,t);if("viewport"===o)r=u,i=window.document.documentElement,a=k(r,i),s=Math.max(i.clientWidth,window.innerWidth||0),f=Math.max(i.clientHeight,window.innerHeight||0),p=E(i),l=E(i,"left"),d=M({top:p-a.top+a.marginTop,left:l-a.left+a.marginLeft,width:s,height:f});else{var c=void 0;"scrollParent"===o?"BODY"===(c=y(w(e))).nodeName&&(c=window.document.documentElement):c="window"===o?window.document.documentElement:o;var h=k(c,u);if("HTML"!==c.nodeName||function e(t){var n=t.nodeName;return"BODY"!==n&&"HTML"!==n&&("fixed"===b(t,"position")||e(w(t)))}(u))d=h;else{var m=L(),v=m.height,g=m.width;d.top+=h.top-h.marginTop,d.bottom=v+h.top,d.left+=h.left-h.marginLeft,d.right=g+h.left}}return d.left+=n,d.top+=n,d.right-=n,d.bottom-=n,d}function m(e,t,o,n,r){var i=5<arguments.length&&void 0!==arguments[5]?arguments[5]:0;if(-1===e.indexOf("auto"))return e;var a=A(o,n,i,r),s={top:{width:a.width,height:t.top-a.top},right:{width:a.right-t.right,height:a.height},bottom:{width:a.width,height:a.bottom-t.bottom},left:{width:t.left-a.left,height:a.height}},f=Object.keys(s).map(function(e){return T({key:e},s[e],{area:(t=s[e],t.width*t.height)});var t}).sort(function(e,t){return t.area-e.area}),p=f.filter(function(e){var t=e.width,n=e.height;return t>=o.clientWidth&&n>=o.clientHeight}),l=0<p.length?p[0].key:f[0].key,d=e.split("-")[1];return l+(d?"-"+d:"")}function v(e,t,n){return k(n,O(t,n))}function g(e){var t=window.getComputedStyle(e),n=parseFloat(t.marginTop)+parseFloat(t.marginBottom),o=parseFloat(t.marginLeft)+parseFloat(t.marginRight);return{width:e.offsetWidth+o,height:e.offsetHeight+n}}function B(e){var t={left:"right",right:"left",bottom:"top",top:"bottom"};return e.replace(/left|right|bottom|top/g,function(e){return t[e]})}function C(e,t,n){n=n.split("-")[0];var o=g(e),r={width:o.width,height:o.height},i=-1!==["right","left"].indexOf(n),a=i?"top":"left",s=i?"left":"top",f=i?"height":"width",p=i?"width":"height";return r[a]=t[a]+t[f]/2-o[f]/2,r[s]=n===s?t[s]-o[p]:t[B(s)],r}function D(e,t){return Array.prototype.find?e.find(t):e.filter(t)[0]}function H(e,n,t){return(void 0===t?e:e.slice(0,function(e,t,n){if(Array.prototype.findIndex)return e.findIndex(function(e){return e[t]===n});var o=D(e,function(e){return e[t]===n});return e.indexOf(o)}(e,"name",t))).forEach(function(e){e.function&&console.warn("`modifier.function` is deprecated, use `modifier.fn`!");var t=e.function||e.fn;e.enabled&&s(t)&&(n.offsets.popper=M(n.offsets.popper),n.offsets.reference=M(n.offsets.reference),n=t(n,e))}),n}function S(e,n){return e.some(function(e){var t=e.name;return e.enabled&&t===n})}function W(e){for(var t=[!1,"ms","Webkit","Moz","O"],n=e.charAt(0).toUpperCase()+e.slice(1),o=0;o<t.length-1;o++){var r=t[o],i=r?""+r+n:e;if(void 0!==window.document.body.style[i])return i}return null}function P(e,t,n,o){n.updateBound=o,window.addEventListener("resize",n.updateBound,{passive:!0});var r=y(e);return function e(t,n,o,r){var i="BODY"===t.nodeName,a=i?window:t;a.addEventListener(n,o,{passive:!0}),i||e(y(a.parentNode),n,o,r),r.push(a)}(r,"scroll",n.updateBound,n.scrollParents),n.scrollElement=r,n.eventsEnabled=!0,n}function j(){var t;this.state.eventsEnabled&&(window.cancelAnimationFrame(this.scheduleUpdate),this.state=(this.reference,t=this.state,window.removeEventListener("resize",t.updateBound),t.scrollParents.forEach(function(e){e.removeEventListener("scroll",t.updateBound)}),t.updateBound=null,t.scrollParents=[],t.scrollElement=null,t.eventsEnabled=!1,t))}function F(e){return""!==e&&!isNaN(parseFloat(e))&&isFinite(e)}function R(n,o){Object.keys(o).forEach(function(e){var t="";-1!==["width","height","top","right","bottom","left"].indexOf(e)&&F(o[e])&&(t="px"),n.style[e]=o[e]+t})}function U(e,t,n){var o=D(e,function(e){return e.name===t}),r=!!o&&e.some(function(e){return e.name===n&&e.enabled&&e.order<o.order});if(!r){var i="`"+t+"`",a="`"+n+"`";console.warn(a+" modifier is required by "+i+" modifier in order to work, be sure to include it before "+i+"!")}return r}var Y=["auto-start","auto","auto-end","top-start","top","top-end","right-start","right","right-end","bottom-end","bottom","bottom-start","left-end","left","left-start"],I=Y.slice(3);function q(e){var t=1<arguments.length&&void 0!==arguments[1]&&arguments[1],n=I.indexOf(e),o=I.slice(n+1).concat(I.slice(0,n));return t?o.reverse():o}var z="flip",G="clockwise",V="counterclockwise";function _(e,r,i,t){var a=[0,0],s=-1!==["right","left"].indexOf(t),n=e.split(/(\+|\-)/).map(function(e){return e.trim()}),o=n.indexOf(D(n,function(e){return-1!==e.search(/,|\s/)}));n[o]&&-1===n[o].indexOf(",")&&console.warn("Offsets separated by white space(s) are deprecated, use a comma (,) instead.");var f=/\s*,\s*|\s+/,p=-1!==o?[n.slice(0,o).concat([n[o].split(f)[0]]),[n[o].split(f)[1]].concat(n.slice(o+1))]:[n];return(p=p.map(function(e,t){var n=(1===t?!s:s)?"height":"width",o=!1;return e.reduce(function(e,t){return""===e[e.length-1]&&-1!==["+","-"].indexOf(t)?(e[e.length-1]=t,o=!0,e):o?(e[e.length-1]+=t,o=!1,e):e.concat(t)},[]).map(function(e){return function(e,t,n,o){var r=e.match(/((?:\-|\+)?\d*\.?\d*)(.*)/),i=+r[1],a=r[2];if(!i)return e;if(0!==a.indexOf("%"))return"vh"!==a&&"vw"!==a?i:("vh"===a?Math.max(document.documentElement.clientHeight,window.innerHeight||0):Math.max(document.documentElement.clientWidth,window.innerWidth||0))/100*i;var s=void 0;switch(a){case"%p":s=n;break;case"%":case"%r":default:s=o}return M(s)[t]/100*i}(e,n,r,i)})})).forEach(function(n,o){n.forEach(function(e,t){F(e)&&(a[o]+=e*("-"===n[t-1]?-1:1))})}),a}var X={placement:"bottom",eventsEnabled:!0,removeOnDestroy:!1,onCreate:function(){},onUpdate:function(){},modifiers:{shift:{order:100,enabled:!0,fn:function(e){var t=e.placement,n=t.split("-")[0],o=t.split("-")[1];if(o){var r=e.offsets,i=r.reference,a=r.popper,s=-1!==["bottom","top"].indexOf(n),f=s?"left":"top",p=s?"width":"height",l={start:h({},f,i[f]),end:h({},f,i[f]+i[p]-a[p])};e.offsets.popper=T({},a,l[o])}return e}},offset:{order:200,enabled:!0,fn:function(e,t){var n=t.offset,o=e.placement,r=e.offsets,i=r.popper,a=r.reference,s=o.split("-")[0],f=void 0;return f=F(+n)?[+n,0]:_(n,i,a,s),"left"===s?(i.top+=f[0],i.left-=f[1]):"right"===s?(i.top+=f[0],i.left+=f[1]):"top"===s?(i.left+=f[0],i.top-=f[1]):"bottom"===s&&(i.left+=f[0],i.top+=f[1]),e.popper=i,e},offset:0},preventOverflow:{order:300,enabled:!0,fn:function(e,o){var t=o.boundariesElement||x(e.instance.popper);e.instance.reference===t&&(t=x(t));var r=A(e.instance.popper,e.instance.reference,o.padding,t);o.boundaries=r;var n=o.priority,i=e.offsets.popper,a={primary:function(e){var t=i[e];return i[e]<r[e]&&!o.escapeWithReference&&(t=Math.max(i[e],r[e])),h({},e,t)},secondary:function(e){var t="right"===e?"left":"top",n=i[t];return i[e]>r[e]&&!o.escapeWithReference&&(n=Math.min(i[t],r[e]-("right"===e?i.width:i.height))),h({},t,n)}};return n.forEach(function(e){var t=-1!==["left","top"].indexOf(e)?"primary":"secondary";i=T({},i,a[t](e))}),e.offsets.popper=i,e},priority:["left","right","top","bottom"],padding:5,boundariesElement:"scrollParent"},keepTogether:{order:400,enabled:!0,fn:function(e){var t=e.offsets,n=t.popper,o=t.reference,r=e.placement.split("-")[0],i=Math.floor,a=-1!==["top","bottom"].indexOf(r),s=a?"right":"bottom",f=a?"left":"top",p=a?"width":"height";return n[s]<i(o[f])&&(e.offsets.popper[f]=i(o[f])-n[p]),n[f]>i(o[s])&&(e.offsets.popper[f]=i(o[s])),e}},arrow:{order:500,enabled:!0,fn:function(e,t){if(!U(e.instance.modifiers,"arrow","keepTogether"))return e;var n=t.element;if("string"==typeof n){if(!(n=e.instance.popper.querySelector(n)))return e}else if(!e.instance.popper.contains(n))return console.warn("WARNING: `arrow.element` must be child of its popper element!"),e;var o=e.placement.split("-")[0],r=e.offsets,i=r.popper,a=r.reference,s=-1!==["left","right"].indexOf(o),f=s?"height":"width",p=s?"Top":"Left",l=p.toLowerCase(),d=s?"left":"top",u=s?"bottom":"right",c=g(n)[f];a[u]-c<i[l]&&(e.offsets.popper[l]-=i[l]-(a[u]-c)),a[l]+c>i[u]&&(e.offsets.popper[l]+=a[l]+c-i[u]);var h=a[l]+a[f]/2-c/2,m=b(e.instance.popper,"margin"+p).replace("px",""),v=h-M(e.offsets.popper)[l]-m;return v=Math.max(Math.min(i[f]-c,v),0),e.arrowElement=n,e.offsets.arrow={},e.offsets.arrow[l]=Math.round(v),e.offsets.arrow[d]="",e},element:"[x-arrow]"},flip:{order:600,enabled:!0,fn:function(h,m){if(S(h.instance.modifiers,"inner"))return h;if(h.flipped&&h.placement===h.originalPlacement)return h;var v=A(h.instance.popper,h.instance.reference,m.padding,m.boundariesElement),g=h.placement.split("-")[0],b=B(g),w=h.placement.split("-")[1]||"",y=[];switch(m.behavior){case z:y=[g,b];break;case G:y=q(g);break;case V:y=q(g,!0);break;default:y=m.behavior}return y.forEach(function(e,t){if(g!==e||y.length===t+1)return h;g=h.placement.split("-")[0],b=B(g);var n,o=h.offsets.popper,r=h.offsets.reference,i=Math.floor,a="left"===g&&i(o.right)>i(r.left)||"right"===g&&i(o.left)<i(r.right)||"top"===g&&i(o.bottom)>i(r.top)||"bottom"===g&&i(o.top)<i(r.bottom),s=i(o.left)<i(v.left),f=i(o.right)>i(v.right),p=i(o.top)<i(v.top),l=i(o.bottom)>i(v.bottom),d="left"===g&&s||"right"===g&&f||"top"===g&&p||"bottom"===g&&l,u=-1!==["top","bottom"].indexOf(g),c=!!m.flipVariations&&(u&&"start"===w&&s||u&&"end"===w&&f||!u&&"start"===w&&p||!u&&"end"===w&&l);(a||d||c)&&(h.flipped=!0,(a||d)&&(g=y[t+1]),c&&(w="end"===(n=w)?"start":"start"===n?"end":n),h.placement=g+(w?"-"+w:""),h.offsets.popper=T({},h.offsets.popper,C(h.instance.popper,h.offsets.reference,h.placement)),h=H(h.instance.modifiers,h,"flip"))}),h},behavior:"flip",padding:5,boundariesElement:"viewport"},inner:{order:700,enabled:!1,fn:function(e){var t=e.placement,n=t.split("-")[0],o=e.offsets,r=o.popper,i=o.reference,a=-1!==["left","right"].indexOf(n),s=-1===["top","left"].indexOf(n);return r[a?"left":"top"]=i[n]-(s?r[a?"width":"height"]:0),e.placement=B(t),e.offsets.popper=M(r),e}},hide:{order:800,enabled:!0,fn:function(e){if(!U(e.instance.modifiers,"hide","preventOverflow"))return e;var t=e.offsets.reference,n=D(e.instance.modifiers,function(e){return"preventOverflow"===e.name}).boundaries;if(t.bottom<n.top||t.left>n.right||t.top>n.bottom||t.right<n.left){if(!0===e.hide)return e;e.hide=!0,e.attributes["x-out-of-boundaries"]=""}else{if(!1===e.hide)return e;e.hide=!1,e.attributes["x-out-of-boundaries"]=!1}return e}},computeStyle:{order:850,enabled:!0,fn:function(e,t){var n=t.x,o=t.y,r=e.offsets.popper,i=D(e.instance.modifiers,function(e){return"applyStyle"===e.name}).gpuAcceleration;void 0!==i&&console.warn("WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!");var a=void 0!==i?i:t.gpuAcceleration,s=N(x(e.instance.popper)),f={position:r.position},p={left:Math.floor(r.left),top:Math.floor(r.top),bottom:Math.floor(r.bottom),right:Math.floor(r.right)},l="bottom"===n?"top":"bottom",d="right"===o?"left":"right",u=W("transform"),c=void 0,h=void 0;if(h="bottom"===l?-s.height+p.bottom:p.top,c="right"===d?-s.width+p.right:p.left,a&&u)f[u]="translate3d("+c+"px, "+h+"px, 0)",f[l]=0,f[d]=0,f.willChange="transform";else{var m="bottom"===l?-1:1,v="right"===d?-1:1;f[l]=h*m,f[d]=c*v,f.willChange=l+", "+d}var g={"x-placement":e.placement};return e.attributes=T({},g,e.attributes),e.styles=T({},f,e.styles),e.arrowStyles=T({},e.offsets.arrow,e.arrowStyles),e},gpuAcceleration:!0,x:"bottom",y:"right"},applyStyle:{order:900,enabled:!0,fn:function(e){var t,n;return R(e.instance.popper,e.styles),t=e.instance.popper,n=e.attributes,Object.keys(n).forEach(function(e){!1!==n[e]?t.setAttribute(e,n[e]):t.removeAttribute(e)}),e.arrowElement&&Object.keys(e.arrowStyles).length&&R(e.arrowElement,e.arrowStyles),e},onLoad:function(e,t,n,o,r){var i=v(0,t,e),a=m(n.placement,i,t,e,n.modifiers.flip.boundariesElement,n.modifiers.flip.padding);return t.setAttribute("x-placement",a),R(t,{position:"absolute"}),n},gpuAcceleration:void 0}}},J=function(){function i(e,t){var n=this,o=2<arguments.length&&void 0!==arguments[2]?arguments[2]:{};!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,i),this.scheduleUpdate=function(){return requestAnimationFrame(n.update)},this.update=a(this.update.bind(this)),this.options=T({},i.Defaults,o),this.state={isDestroyed:!1,isCreated:!1,scrollParents:[]},this.reference=e.jquery?e[0]:e,this.popper=t.jquery?t[0]:t,this.options.modifiers={},Object.keys(T({},i.Defaults.modifiers,o.modifiers)).forEach(function(e){n.options.modifiers[e]=T({},i.Defaults.modifiers[e]||{},o.modifiers?o.modifiers[e]:{})}),this.modifiers=Object.keys(this.options.modifiers).map(function(e){return T({name:e},n.options.modifiers[e])}).sort(function(e,t){return e.order-t.order}),this.modifiers.forEach(function(e){e.enabled&&s(e.onLoad)&&e.onLoad(n.reference,n.popper,n.options,e,n.state)}),this.update();var r=this.options.eventsEnabled;r&&this.enableEventListeners(),this.state.eventsEnabled=r}return u(i,[{key:"update",value:function(){return function(){if(!this.state.isDestroyed){var e={instance:this,styles:{},arrowStyles:{},attributes:{},flipped:!1,offsets:{}};e.offsets.reference=v(this.state,this.popper,this.reference),e.placement=m(this.options.placement,e.offsets.reference,this.popper,this.reference,this.options.modifiers.flip.boundariesElement,this.options.modifiers.flip.padding),e.originalPlacement=e.placement,e.offsets.popper=C(this.popper,e.offsets.reference,e.placement),e.offsets.popper.position="absolute",e=H(this.modifiers,e),this.state.isCreated?this.options.onUpdate(e):(this.state.isCreated=!0,this.options.onCreate(e))}}.call(this)}},{key:"destroy",value:function(){return function(){return this.state.isDestroyed=!0,S(this.modifiers,"applyStyle")&&(this.popper.removeAttribute("x-placement"),this.popper.style.left="",this.popper.style.position="",this.popper.style.top="",this.popper.style[W("transform")]=""),this.disableEventListeners(),this.options.removeOnDestroy&&this.popper.parentNode.removeChild(this.popper),this}.call(this)}},{key:"enableEventListeners",value:function(){return function(){this.state.eventsEnabled||(this.state=P(this.reference,this.options,this.state,this.scheduleUpdate))}.call(this)}},{key:"disableEventListeners",value:function(){return j.call(this)}}]),i}();return J.Utils=("undefined"!=typeof window?window:global).PopperUtils,J.placements=Y,J.Defaults=X,J});