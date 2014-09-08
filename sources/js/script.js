(function() {
  var autoHeight, delay, size;

  delay = function(ms, func) {
    return setTimeout(func, ms);
  };

  size = function() {
    return $('.content').css('minHeight', function() {
      var h;
      h = $(this).parent().find('.side').height();
      console.log(h, $(this).height());
      if (h > $(this).height()) {
        return h;
      }
    });
  };

  autoHeight = function(el) {
    var count, heights, i, item, item_padding, items, loops, padding, step, x, _i, _ref;
    if (el.length > 0) {
      item = el.find('.block');
      console.log(item.width());
      item_padding = item.css('padding-left').split('px')[0] * 2;
      padding = el.css('padding-left').split('px')[0] * 2;
      step = Math.ceil((el.width() - padding * 2) / item.width());
      count = item.length;
      loops = Math.ceil(count / step);
      i = 0;
      el.find('.block').removeAttr('style');
      while (i < count) {
        items = {};
        for (x = _i = 0, _ref = step - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; x = 0 <= _ref ? ++_i : --_i) {
          if (item[i + x]) {
            items[x] = item[i + x];
          }
        }
        console.log(items);
        heights = [];
        $.each(items, function() {
          return heights.push($(this).height());
        });
        $.each(items, function() {
          return $(this).height(Math.max.apply(Math, heights));
        });
        i += step;
      }
      if (el.hasClass('one-row')) {
        return el.height(Math.max.apply(Math, heights));
      }
    }
  };

  $(document).ready(function() {
    var arrows_check, slider, x;
    $('.promo__banner').hoverIntent({
      over: function() {
        var elm;
        if (!$(this).hasClass('promo__banner--hover')) {
          $('.promo__banner.promo__banner--hover').removeClass('promo__banner--hover');
          $(this).addClass('promo__banner--hover');
          elm = $(this).data('id');
          $('.promo-slide:visible').velocity({
            properties: "transition.slideLeftOut",
            options: {
              duration: 300
            }
          });
          $(elm).velocity({
            properties: "transition.slideLeftIn",
            options: {
              duration: 300
            }
          });
        }
        return $('.promo').one('mouseleave', function() {
          $('.promo__banner').removeClass('promo__banner--hover');
          return $('.promo-slide:visible').velocity({
            properties: "transition.slideLeftOut",
            options: {
              duration: 300
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
    autoHeight($('.fixed-height'));
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
    $('p, p strong').hyphenate('ru');
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
    $('.tabs .tabs__title .tabs__title-link').click(function(e) {
      $(this).parents('.tabs__title').find('.tabs__title-link--active').removeClass('tabs__title-link--active');
      $(this).addClass('tabs__title-link--active');
      return e.preventDefault();
    });
    $('.modal').on('hidden.bs.modal', function() {
      $(this).find('input[type="email"], input[type="text"], textarea').removeClass('parsley-error').removeAttr("value").val("");
      $(this).find('form').trigger('reset').show();
      return $(this).find('.success').hide();
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
