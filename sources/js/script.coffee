delay = (ms, func) -> setTimeout func, ms

size = ()->
	$('.content').css 'minHeight', ()->
		h = $(this).parent().find('.side').height()
		console.log h, $(this).height()
		if h > $(this).height()
			return h

autoHeight = (el)->
	if el.length > 0
		item    = el.find('.block')
		console.log item.width()
		item_padding = item.css('padding-left').split('px')[0]*2
		padding = el.css('padding-left').split('px')[0]*2
		step    = Math.ceil((el.width()-padding*2)/item.width())
		count   = item.length
		loops   = Math.ceil(count/step)
		i       = 0

		el.find('.block').removeAttr 'style'

		while i < count
			items = {}
			for x in [0..step-1]
				items[x] = item[i+x] if item[i+x]
			
			console.log items

			heights = []
			$.each items, ()->
				heights.push($(this).height())
			
			$.each items, ()->
				$(this).height Math.max.apply(Math,heights)
			
			i += step

		if el.hasClass 'one-row'
			el.height Math.max.apply(Math,heights)

$(document).ready ->

	$('.promo__banner').hoverIntent
		over : ()->
			if !$(this).hasClass 'promo__banner--hover'
				$('.promo__banner.promo__banner--hover').removeClass 'promo__banner--hover'
				$(this)
					.addClass 'promo__banner--hover'
				elm = $(this).data 'id'
				$('.promo-slide:visible').velocity
						properties: "transition.slideLeftOut"
						options:
							duration: 300
				$(elm).velocity
						properties: "transition.slideLeftIn"
						options:
							duration: 300
			$('.promo').one 'mouseleave', ()->
				$('.promo__banner').removeClass 'promo__banner--hover'
				$('.promo-slide:visible').velocity
						properties: "transition.slideLeftOut"
						options:
							duration: 300
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
		
	$('.breadcrumbs select')
		.chosen
			disable_search: true
			width: "100%"
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

	autoHeight($('.fixed-height'))

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
	$('.tabs .tabs__title .tabs__title-link').click (e)->

		$(this).parents('.tabs__title').find('.tabs__title-link--active').removeClass 'tabs__title-link--active'
		$(this).addClass 'tabs__title-link--active'

		e.preventDefault()

	$('.modal').on 'hidden.bs.modal', ()->
		$(this).find('input[type="email"], input[type="text"], textarea').removeClass('parsley-error').removeAttr("value").val("")
		$(this).find('form').trigger('reset').show()
		$(this).find('.success').hide()

	delay 300, ()->
		size()

	x = undefined
	$(window).resize ->
		clearTimeout(x)
		x = delay 400, ()->
			size()
   
