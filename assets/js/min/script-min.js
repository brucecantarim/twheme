$(document).ready(function(){$("#wpadminbar").hide();var e=function(){window.scroll(0,window.pageYOffset)};window.addEventListener("scroll",e,!1),$(".menuitem").hover(function(){var e=$(this).data("target");$(".submenu").hide(),$(e).toggleClass("wow fadeIn").slideDown("fast").show(),$(e).children().hide(),$(e).children().fadeIn()},function(){var e=$(this).data("target");$(e).mouseenter(function(){$(this).show()}),$(e).mouseleave(function(){$(this).children().fadeOut(),$(this).children().hide(),$(this).toggleClass("wow fadeOut").slideUp("slow").hide(400)})}),$(".arrow-next").click(function(){var e=$(".active-slide"),t=e.next(),i=$(".active-dot"),l=i.next(),s=$(".active-title"),a=s.next();0!==t.length&&0!==l.length&&0!==a.length||(t=$(".slide").first(),l=$(".dot").first(),a=$(".slide-title").first()),e.hide("slide","left",600).removeClass("active-slide"),t.show("fast").addClass("active-slide"),i.removeClass("active-dot"),l.addClass("active-dot"),s.hide().removeClass("active-title"),a.show().addClass("active-title")}),$(".arrow-prev").click(function(){var e=$(".active-slide"),t=e.prev(),i=$(".active-dot"),l=i.prev(),s=$(".active-title"),a=s.prev();0!==t.length&&0!==l.length&&0!==a.length||(t=$(".slide").last(),l=$(".dot").last(),a=$(".slide-title").last()),e.hide("slide","right",600).removeClass("active-slide"),t.show("fast").addClass("active-slide"),i.removeClass("active-dot"),l.addClass("active-dot"),s.hide().removeClass("active-title"),a.show().addClass("active-title")}),$(".slider > .slide:gt(0)").hide(),setInterval(function(){var e=$(".slider").children(),t=$(".active-slide"),i=t.next(),l=$(".active-dot"),s=l.next(),a=$(".active-title"),d=a.next();0!==i.length&&0!==s.length&&0!==d.length||(i=$(".slide").first(),s=$(".dot").first(),d=$(".slide-title").first()),"off"===t.data("toggle")&&e.length<=1||(t.hide("slide","left",1e3).removeClass("active-slide"),i.fadeIn().addClass("active-slide"),l.removeClass("active-dot"),s.addClass("active-dot"),a.hide().removeClass("active-title"),d.show().addClass("active-title"))},5e3),$(function(){var e=$(".active-slide"),t=$(".slider").children();"off"===e.data("toggle")&&t.length<=1&&$(".slider-nav",".product-slider-nav",".slider-control",".product-slider-control").hide()}),$(function(){$("#accordion").accordion()}),$(".accordion-button").click(function(){var e=$(this).children(".chevron");e.hasClass("glyphicon-chevron-down")&&($(".glyphicon-chevron-up").addClass("glyphicon-chevron-down").removeClass("glyphicon-chevron-up"),e.toggleClass("glyphicon-chevron-up"),e.toggleClass("glyphicon-chevron-down"))}),$(".lightbox").click(function(){var e=$(this).attr("title"),t=$(this).children("img").attr("src"),i=$(this).children("img").attr("alt")||"",l=$('<img class="center-block img-responsive" alt="'+i+'" src="'+t+'">');$(".modal-title").html(e),$(".modal-body").html('<i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i>'),$("#lightbox").modal({show:!0}),l.ready(function(){$(".modal-body").html(l)})})});