jQuery(document).ready(function(){jQuery("html").removeClass("no-js");Admin.add_pretty_errors(document);Admin.add_collapsed_toggle();Admin.add_filters(document);Admin.set_object_field_value(document);Admin.setup_collection_buttons(document)});var Admin={log:function(){var a="[Sonata.Admin] "+Array.prototype.join.call(arguments,", ");if(window.console&&window.console.log){window.console.log(a)}else{if(window.opera&&window.opera.postError){window.opera.postError(a)}}},add_pretty_errors:function(a){jQuery("div.sonata-ba-field-error",a).each(function(c,d){var b=jQuery("input, textarea, select",d);var e=jQuery("div.sonata-ba-field-error-messages",d).html();jQuery("div.sonata-ba-field-error-messages",d).html("");if(!e){e=""}if(e.length==0){return}var f;if(jQuery(b).is("select")){jQuery(d).prepend("<span></span>");f=jQuery("span",d);jQuery(b).appendTo(f)}else{f=b}f.qtip({content:e,show:"focusin",hide:"focusout",position:{corner:{target:"rightMiddle",tooltip:"leftMiddle"}},style:{name:"red",border:{radius:2},tip:"leftMiddle"}})})},add_collapsed_toggle:function(a){jQuery("fieldset.sonata-ba-fielset-collapsed").has(".error").addClass("sonata-ba-collapsed-fields-close");jQuery("fieldset.sonata-ba-fielset-collapsed div.sonata-ba-collapsed-fields").not(":has(.error)").hide();jQuery("fieldset legend a.sonata-ba-collapsed",a).live("click",function(c){c.preventDefault();var b=jQuery(this).closest("fieldset");jQuery("div.sonata-ba-collapsed-fields",b).slideToggle();b.toggleClass("sonata-ba-collapsed-fields-close")})},stopEvent:function(a){if(a.preventDefault){a.preventDefault()}else{a.returnValue=false}if(typeof a.target!="undefined"){targetElement=a.target}else{targetElement=a.srcElement}return targetElement},add_filters:function(a){jQuery("div.filter_container.inactive",a).hide();jQuery("fieldset.filter_legend",a).click(function(b){jQuery("div.filter_container",jQuery(b.target).parent()).toggle()})},set_object_field_value:function(a){this.log(jQuery("a.sonata-ba-edit-inline",a));jQuery("a.sonata-ba-edit-inline",a).click(function(c){Admin.stopEvent(c);var b=jQuery(this);jQuery.ajax({url:b.attr("href"),type:"POST",success:function(d){if(d.status==="OK"){var e=jQuery(b).parent();e.children().remove();e.html(jQuery(d.content.replace(/<!--[\s\S]*?-->/g,"")).html());e.effect("highlight",{color:"#57A957"},2000);Admin.set_object_field_value(e)}else{jQuery(b).parent().effect("highlight",{color:"#C43C35"},2000)}}})})},setup_collection_buttons:function(a){jQuery(a).on("click",".sonata-collection-add",function(e){Admin.stopEvent(e);var b=jQuery(this).closest("[data-prototype]");var d=b.attr("data-prototype");var c=new RegExp(b.attr("id")+"___name__","g");d=d.replace(c,b.attr("id")+"_"+b.children().length);var f=b.attr("id").split("_");var g=new RegExp(f[f.length-1]+"\\]\\[__name__","g");d=d.replace(g,f[f.length-1]+"]["+b.children().length);jQuery(d).insertBefore(jQuery(this).parent());jQuery(this).trigger("sonata-collection-item-added")});jQuery(a).on("click",".sonata-collection-delete",function(b){Admin.stopEvent(b);jQuery(this).closest(".sonata-collection-row").remove();jQuery(this).trigger("sonata-collection-item-deleted")})}};