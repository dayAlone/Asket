(function() {
  var autoHeight, delay, getCaptcha, setCaptcha, size;

  delay = function(ms, func) {
    return setTimeout(func, ms);
  };

  size = function() {
    $('.block.main .content').css({
      'min-height': $('.block.main .sidebar').height()
    });
    return $('.content').css('minHeight', function() {
      var h;
      h = $(this).parent().find('.side').height();
      if (h > $(this).height()) {
        return h;
      }
    });
  };

  getCaptcha = function() {
    return $.get('/include/captcha.php', function(data) {
      return setCaptcha(data);
    });
  };

  setCaptcha = function(code) {
    $('input[name=captcha_code]').val(code);
    return $('.captcha').attr('src', "/include/captcha.php?captcha_sid=" + code);
  };

  autoHeight = function(el, selector, height_selector, use_padding, debug) {
    if (selector == null) {
      selector = '';
    }
    if (height_selector == null) {
      height_selector = false;
    }
    if (use_padding == null) {
      use_padding = false;
    }
    if (debug == null) {
      debug = false;
    }
    if (el.length > 0) {
      return el.each(function() {
        var count, heights, i, item, items, loops, step, x, _i, _ref, _results;
        el = $(this);
        item = el.find(selector);
        if (height_selector) {
          el.find(height_selector).removeAttr('style');
        } else {
          el.find(selector).removeAttr('style');
        }
        step = Math.round(el.outerWidth() / item.outerWidth());
        count = item.length - 1;
        loops = Math.ceil(count / step);
        i = 0;
        if (debug) {
          console.log(count, step, item_padding, padding, el.width(), item.width());
        }
        _results = [];
        while (i < count) {
          items = {};
          for (x = _i = 0, _ref = step - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; x = 0 <= _ref ? ++_i : --_i) {
            if (item[i + x]) {
              items[x] = item[i + x];
            }
          }
          heights = [];
          $.each(items, function() {
            if (height_selector) {
              return heights.push($(this).find(height_selector).height());
            } else {
              return heights.push($(this).height());
            }
          });
          if (debug) {
            console.log(heights);
          }
          $.each(items, function() {
            if (height_selector) {
              return $(this).find(height_selector).height(Math.max.apply(Math, heights));
            } else {
              return $(this).height(Math.max.apply(Math, heights));
            }
          });
          _results.push(i += step);
        }
        return _results;
      });
    }
  };

  $(document).ready(function() {
    var arrows_check, slider, x;
    if ($('.features').length > 0) {
      $('.features').on('fotorama:ready', function() {
        $('.features .fotorama__arr--prev').html("<svg width=\"19px\" height=\"34px\" viewBox=\"0 0 19 34\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"><g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"><path d=\"M5,6 L5,5 L29,5 L29,7 L7,7 L7,29 L5,29 L5,6 Z\" fill=\"#000000\" sketch:type=\"MSShapeGroup\" transform=\"translate(17, 17) rotate(-45) translate(-17, -17)\" class=\"arrow\"></path></g></svg>");
        return $('.features .fotorama__arr--next').html("<svg width=\"19px\" height=\"34px\" viewBox=\"0 0 19 34\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"><g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"><path d=\"M18,17 L18,-6 L16,-6 L16,16 L-6,16 L-6,18 L18,18 L18,17 Z\" fill=\"#000000\" sketch:type=\"MSShapeGroup\" transform=\"translate(17, 17) rotate(-45) translate(-17, -17)\" class=\"arrow\"></path></g></svg>");
      }).fotorama();
    }
    $('a.refresh').click(function(e) {
      console.log(123);
      getCaptcha();
      return e.preventDefault();
    });
    $('.toolbar select').on('change', function(e) {
      return $(this).parents('form').submit();
    });
    $('.promo__banner').hoverIntent({
      over: function() {
        var elm;
        if (!$(this).hasClass('promo__banner--hover')) {
          $('.promo__banner.promo__banner--hover').removeClass('promo__banner--hover');
          $('.promo').addClass('promo--hover');
          $(this).addClass('promo__banner--hover');
          elm = $(this).data('id');
          $('.bg-fade').addClass('in');
          $('.promo-slide:visible').velocity({
            properties: "transition.slideLeftOut",
            options: {
              duration: 500
            }
          });
          $(elm).velocity({
            properties: "transition.slideLeftIn",
            options: {
              duration: 500
            }
          });
        }
        return $('.promo').one('mouseleave', function() {
          $('.promo__banner').removeClass('promo__banner--hover');
          $('.promo').removeClass('promo--hover');
          $('.bg-fade').removeClass('in');
          return $('.promo-slide:visible').velocity({
            properties: "transition.slideLeftOut",
            options: {
              duration: 500
            }
          });
        });
      },
      out: function() {}
    });
    arrows_check = function(s) {
      var active, next, prev;
      s = $(s);
      active = s.find('.item a.active').parents('.item');
      next = active.next();
      prev = active.prev();
      if (next.length > 0) {
        s.find('button.slick-next').removeClass('disabled slick-disabled');
      } else {
        s.find('button.slick-next').addClass('disabled');
      }
      if (prev.length > 0) {
        return s.find('button.slick-prev').removeClass('disabled slick-disabled');
      } else {
        return s.find('button.slick-prev').addClass('disabled');
      }
    };
    slider = $('.gallery .slider').slick({
      slidesToShow: 4,
      draggable: false,
      infinite: false,
      onAfterChange: function(a, b, c) {
        return arrows_check();
      },
      onInit: function(x) {
        var gallery, s;
        gallery = x.$slider.parents('.gallery');
        s = x.$slider;
        s.find('button').off('click').on('click', function(e) {
          var active, next, shown;
          s = $(this).parents('.slider');
          if (!$(this).hasClass('disabled')) {
            shown = slider.slickGetOption('slidesToShow');
            active = s.find('.item a.active').parents('.item');
            next = void 0;
            if ($(this).hasClass('slick-next')) {
              next = active.next().find('a');
              if (!active.next().hasClass('slick-active')) {
                slider.slickNext();
              }
            } else {
              next = active.prev().find('a');
              if (!active.prev().hasClass('slick-active')) {
                slider.slickPrev();
              }
            }
            s.find('.item a.active').removeClass('active');
            next.addClass('active');
            gallery.find('.big a').removeClass('active');
            $('#' + next.data('id')).addClass('active');
            arrows_check(s);
          }
          return e.preventDefault();
        });
        s.find('button.slick-disabled').addClass('disabled');
        s.find('.item:first a').addClass('active');
        return s.find('.item a').click(function(e) {
          s = $(this).parents('.slider');
          s.find('.item a.active').removeClass('active');
          $(this).addClass('active');
          gallery.find('.big a').removeClass('active');
          $('#' + $(this).data('id')).addClass('active');
          arrows_check(s);
          return e.preventDefault();
        });
      }
    });
    $('a[rel^="prettyPhoto"]').prettyPhoto({
      social_tools: '',
      overlay_gallery: false,
      deeplinking: false
    });
    $('.breadcrumbs select').chosen({
      disable_search: true,
      width: "100%"
    }).change(function() {
      return window.location.href = $(this).val();
    }).on("chosen:showing_dropdown", function() {
      var drop;
      drop = $(this).parent().find('.chosen-drop');
      return drop.velocity({
        properties: "transition.slideDownIn",
        options: {
          duration: 300
        }
      });
    }).on("chosen:hiding_dropdown", function() {
      var drop;
      drop = $(this).parent().find('.chosen-drop');
      return drop.velocity({
        properties: "transition.slideUpOut",
        options: {
          duration: 300
        }
      });
    });
    autoHeight($('.fixed-height'), '.block');
    autoHeight($('.catalog__list'), '.catalog__list-item');
    autoHeight($('.frame'), '.block.faq');
    $('.faq-list_item-trigger').click(function(e) {
      var item, text;
      item = $(this).parents('.faq-list_item');
      text = item.find('.faq-list_item-text ');
      if (!item.hasClass('open')) {
        item.addClass('open');
        text.velocity({
          properties: "transition.slideDownIn",
          options: {
            duration: 300
          }
        });
      } else {
        item.removeClass('open');
        text.velocity({
          properties: "transition.slideUpOut",
          options: {
            duration: 300
          }
        });
      }
      return e.preventDefault();
    });
    if (!$.browser.msie) {
      $('p, p strong').hyphenate('ru');
    }
    $('.navbar .navbar-item--dropdown').hoverIntent({
      sensitivity: 10,
      over: function() {
        $('section.dropdown__catalog, section.dropdown__catalog .dropdown__catalog-trigger').show();
        $('section.dropdown__catalog .dropdown__catalog-frame').velocity({
          properties: "transition.slideDownIn",
          options: {
            duration: 300
          }
        });
        $('section.dropdown__catalog').one('mouseleave', function() {
          $('.bg-fade').removeClass('in');
          $('section.dropdown__catalog .dropdown__catalog-trigger').hide();
          return $('section.dropdown__catalog .dropdown__catalog-frame').velocity({
            properties: "transition.slideUpOut",
            options: {
              duration: 300
            }
          });
        });
        return $('.bg-fade').addClass('in');
      },
      out: function() {}
    });
    $('#leasing-select').on('change', function() {
      $('.leasing-content').removeClass('leasing-content--active');
      return $($(this).val()).addClass('leasing-content--active');
    });
    $('.tabs .tabs__title .tabs__title-link').click(function(s) {
      var active, e;
      e = $($(this).data('href'));
      if (e.length > 0) {
        active = $(this).parents('.tabs__title').find('.tabs__title-link--active');
        $(active.data('href')).removeClass('tabs__content--active');
        active.removeClass('tabs__title-link--active');
        e.addClass('tabs__content--active');
        $(this).addClass('tabs__title-link--active');
        autoHeight($('.catalog__list'), '.catalog__list-item');
        s.preventDefault();
        return false;
      }
    });
    $('.sub-tabs_title a').click(function(e) {
      var active, el;
      el = $($(this).attr('href'));
      if (el.length > 0) {
        active = $(this).parents('.sub-tabs_title').find('.sub-tabs_title__active');
        active.removeClass('sub-tabs_title__active');
        $(this).addClass('sub-tabs_title__active');
        $(active.attr('href')).removeClass('sub-tabs_content--active');
        el.addClass('sub-tabs_content--active');
        autoHeight($('.catalog__list'), '.catalog__list-item');
      }
      return e.preventDefault();
    });
    $('.modal').on('hidden.bs.modal', function() {
      $(this).find('input[type="email"], input[type="text"], textarea').removeClass('parsley-error').removeAttr("value").val("");
      $(this).find('form').trigger('reset').show();
      return $(this).find('.success').hide();
    });
    $('.form').submit(function(e) {
      var data;
      data = $(this).serialize();
      $.post('/include/send.php', data, function(data) {
        data = $.parseJSON(data);
        if (data.status === "ok") {
          $('.form').hide();
          return $('.form').parents('.modal').find('.success').show();
        } else if (data.status === "error") {
          $('input[name=captcha_word]').addClass('parsley-error');
          return getCaptcha();
        }
      });
      return e.preventDefault();
    });
    delay(300, function() {
      return size();
    });
    x = void 0;
    return $(window).resize(function() {
      clearTimeout(x);
      return x = delay(400, function() {
        return size();
      });
    });
  });

}).call(this);
