$(document).ready(function(){$("#s").click(function(){$(this).animate({width:180},"fast")}),$("#s").focusout(function(){$("#s").animate({width:90},"slow")})}),$(".hxtrigger").click(function(){$(this).find("ul").toggle(),$(this).siblings().find("ul").hide()}),$(document).click(function(i){0===$(i.target).closest(".hxtrigger").length&&$(".hxtrigger").find("ul").hide()});
!function(){var e,t;if(function(){var e=!1;try{var t=Object.defineProperty({},"passive",{get:function(){e=!0}});window.addEventListener("test",null,t)}catch(e){}return e}()){var a=EventTarget.prototype.addEventListener;e=a,t={passive:!0,capture:!1},EventTarget.prototype.addEventListener=function(a,r,n){var i="object"==typeof n,v=i?n.capture:n;(n=i?n:{}).passive=void 0!==n.passive?n.passive:t.passive,n.capture=void 0!==v?v:t.capture,e.call(this,a,r,n)}}}();