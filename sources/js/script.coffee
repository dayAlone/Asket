delay = (ms, func) -> setTimeout func, ms

size = ()->
	$('.block.main .content').css
		'min-height': $('.block.main .sidebar').height()
	
	$('.content').css 'minHeight', ()->
		h = $(this).parent().find('.side').height()
		if h > $(this).height()
			return h

getCaptcha = ()->
	$.get '/include/captcha.php', (data)->
		setCaptcha data

setCaptcha = (code)->
	$('input[name=captcha_code]').val(code)
	$('.captcha').attr 'src', "/include/captcha.php?captcha_sid=#{code}"

autoHeight = (el, selector='', height_selector = false, use_padding=false, debug=false)->
	if el.length > 0
		
		el.each ()->
			el = $(this)
			item = el.find(selector)

			if height_selector
				el.find(height_selector).removeAttr 'style'
			else
				el.find(selector).removeAttr 'style'
			
			step = Math.round(el.outerWidth()/item.outerWidth())
			
			count = item.length-1
			loops = Math.ceil(count/step)
			i     = 0
			
			if debug
				console.log count, step, item_padding, padding, el.width(), item.width()

			while i < count
				items = {}
				for x in [0..step-1]
					items[x] = item[i+x] if item[i+x]
				
				heights = []
				$.each items, ()->
					if height_selector
						heights.push($(this).find(height_selector).height())
					else
						heights.push($(this).height())
				
				if debug
					console.log heights

				$.each items, ()->
					if height_selector
						$(this).find(height_selector).height Math.max.apply(Math,heights)
					else
						$(this).height Math.max.apply(Math,heights)

				i += step

$(document).ready ->

	if $('.features').length > 0
		$('.features')
			.on 'fotorama:ready', ()->
				$('.features .fotorama__arr--prev').html("<svg width=\"19px\" height=\"34px\" viewBox=\"0 0 19 34\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"><g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"><path d=\"M5,6 L5,5 L29,5 L29,7 L7,7 L7,29 L5,29 L5,6 Z\" fill=\"#000000\" sketch:type=\"MSShapeGroup\" transform=\"translate(17, 17) rotate(-45) translate(-17, -17)\" class=\"arrow\"></path></g></svg>")
				$('.features .fotorama__arr--next').html("<svg width=\"19px\" height=\"34px\" viewBox=\"0 0 19 34\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"><g stroke=\"none\" stroke-width=\"1\" fill=\"none\" fill-rule=\"evenodd\"><path d=\"M18,17 L18,-6 L16,-6 L16,16 L-6,16 L-6,18 L18,18 L18,17 Z\" fill=\"#000000\" sketch:type=\"MSShapeGroup\" transform=\"translate(17, 17) rotate(-45) translate(-17, -17)\" class=\"arrow\"></path></g></svg>")
			.fotorama()
	$('a.refresh').click (e)->
		console.log 123
		getCaptcha()
		e.preventDefault()

	$('.promo__banner').hoverIntent
		over : ()->
			if !$(this).hasClass 'promo__banner--hover'
				$('.promo__banner.promo__banner--hover').removeClass 'promo__banner--hover'
				$('.promo')
					.addClass 'promo--hover'
				$(this)
					.addClass 'promo__banner--hover'
				elm = $(this).data 'id'
				$('.bg-fade')
					.addClass 'in'
				$('.promo-slide:visible').velocity
						properties: "transition.slideLeftOut"
						options:
							duration: 500
				$(elm).velocity
						properties: "transition.slideLeftIn"
						options:
							duration: 500
			$('.promo').one 'mouseleave', ()->
				$('.promo__banner').removeClass 'promo__banner--hover'
				$('.promo')
					.removeClass 'promo--hover'
				$('.bg-fade')
					.removeClass 'in'
				$('.promo-slide:visible').velocity
						properties: "transition.slideLeftOut"
						options:
							duration: 500
		out : ()->


	arrows_check = (s)->

		s = $(s)

		active = s.find('.item a.active').parents('.item')
					
		next = active.next()
		prev = active.prev()

		if next.length > 0
			s.find('button.slick-next').removeClass 'disabled slick-disabled'
		else
			s.find('button.slick-next').addClass 'disabled'

		if prev.length > 0
			s.find('button.slick-prev').removeClass 'disabled slick-disabled'
		else
			s.find('button.slick-prev').addClass 'disabled'

	slider = $('.gallery .slider').slick
		slidesToShow : 4
		draggable: false
		infinite: false
		onAfterChange : (a,b,c)->
			arrows_check()
		
		onInit: (x)->

			gallery  = x.$slider.parents('.gallery')
			s   = x.$slider
			
			s.find('button').off('click').on 'click', (e)->
				s = $(this).parents '.slider'

				if !$(this).hasClass 'disabled'
					shown = slider.slickGetOption 'slidesToShow'
					active = s.find('.item a.active').parents('.item')
					next = undefined

					if $(this).hasClass 'slick-next'
						next = active.next().find('a')
						if !active.next().hasClass 'slick-active'
							slider.slickNext()
					else
						next = active.prev().find('a')
						if !active.prev().hasClass 'slick-active'
							slider.slickPrev()
					
					s.find('.item a.active').removeClass 'active'
					next.addClass 'active'
					
					gallery.find('.big a').removeClass 'active'
					
					$('#'+next.data('id')).addClass 'active'

					arrows_check(s)

				e.preventDefault()

			s.find('button.slick-disabled').addClass 'disabled'
			s.find('.item:first a').addClass 'active'

			s.find('.item a').click (e)->
				s = $(this).parents '.slider'
				s.find('.item a.active').removeClass 'active'
				$(this).addClass 'active'
				
				gallery.find('.big a').removeClass 'active'
				$('#'+$(this).data('id')).addClass 'active'

				arrows_check(s)
				e.preventDefault()
			
	$('a[rel^="prettyPhoto"]').prettyPhoto
		social_tools: ''
		overlay_gallery: false
		deeplinking: false
		
	$('select')
		.chosen
			disable_search: true
			width: "100%"
		.change ()->
			if $(this).parents('.breadcrumbs').length > 0
				window.location.href = $(this).val()
				
			if $(this).parents('.toolbar').length > 0
				$(this).parents('form').submit()
		.on "chosen:showing_dropdown", ()->
			drop = $(this).parent().find('.chosen-drop')
			drop.velocity
					properties: "transition.slideDownIn"
					options:
						duration: 300
		.on "chosen:hiding_dropdown", ()->
			drop = $(this).parent().find('.chosen-drop')
			drop.velocity
					properties: "transition.slideUpOut"
					options:
						duration: 300

	autoHeight($('.fixed-height'), '.block')
	autoHeight($('.catalog__list'), '.catalog__list-item')
	autoHeight $('.frame'), '.block.faq'
	$('.faq-list_item-trigger').click (e)->
		item = $(this).parents('.faq-list_item')
		text = item.find('.faq-list_item-text ')

		if !item.hasClass 'open'
			item.addClass 'open'
			text.velocity
					properties: "transition.slideDownIn"
					options:
						duration: 300
		else
			item.removeClass 'open'
			text.velocity
					properties: "transition.slideUpOut"
					options:
						duration: 300
			
		e.preventDefault()

	if !$.browser.msie
		$('p, p strong').hyphenate('ru')

	$('.navbar .navbar-item--dropdown').hoverIntent
		sensitivity : 10
		over : ()->
			$('section.dropdown__catalog, section.dropdown__catalog .dropdown__catalog-trigger').show()
			$('section.dropdown__catalog .dropdown__catalog-frame').velocity
				properties: "transition.slideDownIn"
				options:
					duration: 300
			$('section.dropdown__catalog').one 'mouseleave', ()->
				$('.bg-fade')
					.removeClass 'in'
				$('section.dropdown__catalog .dropdown__catalog-trigger').hide()
				$('section.dropdown__catalog .dropdown__catalog-frame').velocity
					properties: "transition.slideUpOut"
					options:
						duration: 300


			$('.bg-fade')
				.addClass 'in'
		out : ()->
	
	$('#leasing-select').chosen().change ()->
		$('.leasing-content').removeClass 'leasing-content--active'
		$($('#leasing-select').val()).addClass 'leasing-content--active'
		#window.location.href = $(this).find('option:selected').data('url')

	$('.tabs .tabs__title .tabs__title-link').click (s)->
		e = $($(this).data('href'))
		if e.length > 0 
			active = $(this).parents('.tabs__title').find('.tabs__title-link--active')
			$(active.data('href')).removeClass 'tabs__content--active'
			active.removeClass 'tabs__title-link--active'
			e.addClass 'tabs__content--active'
			$(this).addClass 'tabs__title-link--active'
			autoHeight($('.catalog__list'), '.catalog__list-item')
			s.preventDefault()
			return false
	$('.sub-tabs_title a').click (e)->
		el = $($(this).attr('href'))
		if el.length > 0 
			active = $(this).parents('.sub-tabs_title').find('.sub-tabs_title__active')
			
			active.removeClass 'sub-tabs_title__active'
			$(this).addClass 'sub-tabs_title__active'

			$(active.attr('href')).removeClass 'sub-tabs_content--active'
			el.addClass 'sub-tabs_content--active'
			autoHeight($('.catalog__list'), '.catalog__list-item')
		e.preventDefault()

	$('.modal').on 'hidden.bs.modal', ()->
		$(this).find('input[type="email"], input[type="text"], textarea').removeClass('parsley-error').removeAttr("value").val("")
		$(this).find('form').trigger('reset').show()
		$(this).find('.success').hide()

	$('.form').submit (e)->
		data = $(this).serialize()
		$.post '/include/send.php', data,
	        (data) ->
	        	data = $.parseJSON(data)
	        	if data.status == "ok"
	        		$('.form').hide()
	        		$('.form').parents('.modal').find('.success').show()
	        	else if data.status == "error"
	        		$('input[name=captcha_word]').addClass('parsley-error')
	        		getCaptcha()
		e.preventDefault()

	delay 300, ()->
		size()

	x = undefined
	$(window).resize ->
		clearTimeout(x)
		x = delay 400, ()->
			size()
   
