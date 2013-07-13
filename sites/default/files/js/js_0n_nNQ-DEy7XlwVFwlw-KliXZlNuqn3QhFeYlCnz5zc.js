// $Id: fancy_login.js,v 1.19 2011/01/26 15:31:23 hakulicious Exp $
(function($)
{
	var popupVisible = false;
	var ctrlPressed = false;

	function showLogin()
	{
		var settings = Drupal.settings.fancyLogin;
		var loginBox = $("#fancy_login_login_box");
		if(!popupVisible) {
			popupVisible = true;
			if(settings.hideObjects) {
				$("object, embed").css("visibility", "hidden");
			}
			$("#fancy_login_dim_screen").css({"position" : "fixed", "top" : "0", "left" : "0", "height" : "100%", "width" : "100%", "display" : "block", "background-color" : settings.screenFadeColor, "z-index" : settings.screenFadeZIndex, "opacity" : "0"}).fadeTo(settings.dimFadeSpeed, 0.8, function()
			{
				loginBox.css({"position" : "fixed", "width" : settings.loginBoxWidth, "height" : settings.loginBoxHeight});
				var wHeight = window.innerHeight ? window.innerHeight : $(window).height();
				var wWidth = $(window).width();
				var eHeight = loginBox.height();
				var eWidth = loginBox.width();
				var eTop = (wHeight - eHeight) / 2;
				var eLeft = (wWidth - eWidth) / 2;
				if($("#fancy_login_close_button").css("display") === "none") {
					$("#fancy_login_close_button").css("display", "inline");
				}
				loginBox.css({"top" : eTop, "left" : eLeft, "color" : settings.loginBoxTextColor, "background-color" : settings.loginBoxBackgroundColor, "border-style" : settings.loginBoxBorderStyle, "border-color" : settings.loginBoxBorderColor, "border-width" : settings.loginBoxBorderWidth, "z-index" : (settings.screenFadeZIndex + 1), "display" : "none", "padding-left" : "15px", "padding-right" : "15px"})
				.fadeIn(settings.boxFadeSpeed);
				loginBox.find(".form-text:first").focus().select();
				setCloseListener();
			});
		}
	}

	function setCloseListener()
	{
		$("#fancy_login_dim_screen, #fancy_login_close_button").click(function()
		{
			hideLogin();
			return false;
		});
		$("#fancy_login_login_box form").submit(function()
		{
			submitted();
		});
		$("#fancy_login_login_box a:not('#fancy_login_close_button')").click(function()
		{
			submitted();
		});
		$(document).keyup(function(event)
		{
		    if(event.keyCode === 27) {
		        hideLogin();
		    }
		});
	}

	function hideLogin()
	{
		var settings = Drupal.settings.fancyLogin;
		if(popupVisible) {
			popupVisible = false;
			$("#fancy_login_login_box").fadeOut(settings.boxFadeSpeed, function()
			{
				$(this).css({"position" : "static", "height" : "auto", "width" : "auto",  "background-color" : "transparent", "border" : "none" });
				$("#fancy_login_dim_screen").fadeOut(settings.dimFadeSpeed, function()
				{
					if(settings.hideObjects) {
						$("object, embed").css("visibility", "visible");
					}
				});
				$(window).focus();
			});
		}
	}

	function submitted(requestPassword)
	{
		var formContents = $("#fancy_login_form_contents");
		var ajaxLoader = $("#fancy_login_ajax_loader");
		var wHeight = formContents.height();
		var wWidth = formContents.width();
		ajaxLoader.css({"height" : wHeight, "width" : wWidth});
		formContents.fadeOut(300, function()
		{
			ajaxLoader.fadeIn(300);
			var img = ajaxLoader.children("img:first");
			var imgHeight = img.height();
			var imgWidth = img.width();
			var eMarginTop = (wHeight - imgHeight) / 2;
			var eMarginLeft = (wWidth - imgWidth) / 2;
			img.css({"margin-left" : eMarginLeft, "margin-top" : eMarginTop});
			if(requestPassword) {
				getRequestPassword();
			}
		});
	}

	function getRequestPassword()
	{
		var settings = Drupal.settings;
		var passwordPath = settings.fancyLogin.loginPath.replace(/login/, "password");
		$.ajax(
		{
			url:settings.basePath + passwordPath,
			dataFilter:function(data)
			{
				return $(data).find("#user-pass");
			},
			success:function(data)
			{
				var formContents = $("#fancy_login_form_contents");
				formContents.children("form").css("display", "none");
				var itemList = formContents.find(".item-list");
				itemList.before(data);
				$("#fancy_login_ajax_loader").fadeOut(300, function()
				{
					toggle = $("<li><a id=\"toggle_link\" href=\"#\">" + Drupal.t("Login") + "</a></li>");
					toggle.click(function()
					{
						toggleForm();
					});
					itemList.children("ul").append(toggle);
					$("#user-pass").attr("action", $("#user-pass").attr("action") + settings.fancyLogin.requestDestination);
					formContents.fadeIn(300);
				});
			}
		});
	}

	function toggleForm()
	{
		currentForm = ($("#fancy_login_form_contents #user-login").css("display") === "none") ? "#user-pass" : "#user-login";
		targetForm = (currentForm === "#user-login") ? "#user-pass" : "#user-login";
		linkText = (currentForm === "#user-login") ? Drupal.t("Login") : Drupal.t("Request new password");
		$(currentForm).fadeOut(300, function()
		{
			$(targetForm).fadeIn(300);
		});
		$("#fancy_login_form_contents .item-list").fadeOut(300, function()
		{
			$("#toggle_link").text(linkText);
			$("#fancy_login_form_contents .item-list").fadeIn(300);
		});
	}

	Drupal.behaviors.fancyLogin = 
	{
		attach:function()
		{
			var settings = Drupal.settings.fancyLogin;
			if(!$.browser.msie || $.browser.version > 6 || window.XMLHttpRequest) {
				$("a[href*='" + settings.loginPath + "']").each(function()
				{
					if(settings.destination) {
						var targetHREF = $(this).attr("href");
						if(targetHREF.search(/destination=/i) === -1) {
							targetHREF += settings.destination;
							$(this).attr("href", targetHREF);
						}
					}
					$(this).click(function()
					{
						var action = $(this).attr("href");
						if(settings.httpsRoot) {
							action = settings.httpsRoot + action;
						}
						$("#fancy_login_login_box form").attr("action", action);
						showLogin();
						return false;
					});
				});
				$(document).keyup(function(e)
				{
					if(e.keyCode === 17) {
						ctrlPressed = false;
					}
				});
				$(document).keydown(function(e)
				{
					if(e.keyCode === 17) {
						ctrlPressed = true;
					}
					if(ctrlPressed === true && e.keyCode === 190) {
						ctrlPressed = false;
						if(popupVisible) {
							hideLogin();
						} else {
							showLogin();
						}
					}
				});
				$("#fancy_login_login_box a[href*='" + settings.loginPath.replace(/login/, "password") + "']").click(function()
				{
					$(this).parent().fadeOut(200);
					submitted(true);
					return false;
				});
			}
		}
	};
}(jQuery));;
(function($) {
  Drupal.behaviors.custom_search = {
    attach: function(context) {

      if (!Drupal.settings.custom_search.solr) {
        // Check if the search box is not empty on submit
        $('form.search-form', context).submit(function(){
          var box = $(this).find('input.custom-search-box');
          if (box.val() != undefined && box.val() == '') {
            $(this).find('input.custom-search-box').addClass('error');
            return false;
          }
          // If basic search is hidden, copy or value to the keys
          if ($(this).find('#edit-keys').parents('div.element-invisible').attr('class') == 'element-invisible') {
            $(this).find('#edit-keys').val($(this).find('#edit-or').val());
            $(this).find('#edit-or').val('');
          }
          return true;
        });
      }

      // Search from target
      $('form.search-form').attr('target', Drupal.settings.custom_search.form_target);

      // Displays Popup.
      $('form.search-form input.custom-search-box', context).bind('click focus', function(e){
        $this = $(this);
        $parentForm = $this.parents('form');
        // check if there's something in the popup and displays it
        var popup = $parentForm.find('fieldset.custom_search-popup');
        if (popup.find('input,select').length && !popup.hasClass('opened')) popup.fadeIn().addClass('opened');
        e.stopPropagation();
      });
      $(document).bind('click focus', function(){
        $('fieldset.custom_search-popup').hide().removeClass('opened');
      });

      // Handle checkboxes
      $('.custom-search-selector input:checkbox', context).each(function(){
        var el = $(this);
        if (el.val() == 'c-all') {
          el.change(function(){
            $(this).parents('.custom-search-selector').find('input:checkbox[value!=c-all]').attr('checked', false);
          });
        }
        else {
          if (el.val().substr(0,2) == 'c-') {
            el.change(function(){
              $('.custom-search-selector input:checkbox').each(function(){
                if ($(this).val().substr(0,2) == 'o-') $(this).attr('checked', false);
              });
              $(this).parents('.custom-search-selector').find('input:checkbox[value=c-all]').attr('checked', false);
            });
          } else {
            el.change(function(){
              $(this).parents('.custom-search-selector').find('input:checkbox[value!='+el.val()+']').attr('checked', false);
            });
          }
        }
      });

      // Reselect types and terms in advanced search
      var edit_keys = $('#edit-keys').val();
      if(edit_keys) {
        // types
        var pos = edit_keys.indexOf('type:');
        if (pos) {
          var pos2 = edit_keys.indexOf(' ',pos);
          if (pos2==-1) pos2 = edit_keys.length;
          var types = edit_keys.substring(pos+5,pos2);
          types = types.split(',');
          for (var i=0; i<types.length; i++) {
            $('.search-form input:checkbox[value='+types[i]+']').attr('checked', true);
          }
        }
        // terms
        var pos = edit_keys.indexOf('term:');
        if (pos) {
          var pos2 = edit_keys.indexOf(' ',pos);
          if (pos2==-1) pos2 = edit_keys.length;
          var terms = edit_keys.substring(pos+5,pos2);
          terms = terms.split(',');
          for (var i=0; i<terms.length; i++) {
            $('#edit-term option[value='+terms[i]+']').attr('selected', true);
          }
        }
        // languages
        var pos = edit_keys.indexOf('language:');
        if (pos) {
          var pos2 = edit_keys.indexOf(' ',pos);
          if (pos2==-1) pos2 = edit_keys.length;
          var languages = edit_keys.substring(pos+9,pos2);
          languages = languages.split(',');
          for (var i=0; i<languages.length; i++) {
            $('.search-advanced #edit-language-'+languages[i]).attr('checked', true);
          }
        }
      }

      var popup = $('fieldset.custom_search-popup:not(.custom_search-processed)', context).addClass("custom_search-processed");
      popup.click(function(e){
        e.stopPropagation();
      })
      popup.append('<a class="custom_search-popup-close" href="#">' + Drupal.t('Close') + '</a>');
      $('a.custom_search-popup-close').click(function(e){
        $('fieldset.custom_search-popup.opened').hide().removeClass('opened');
        e.preventDefault();
      });

    }
  }
})(jQuery);;
