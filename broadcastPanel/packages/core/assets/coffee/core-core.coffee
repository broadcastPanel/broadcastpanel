# @author Liam Symonds
# @version 1.0.0
#
# Handles the navigation of the application.

$('.navigation > .header').on 'click', ->
	next = $(this).next()
	header = $(this)

	if ! next.is(':visible')
		$('.box').not(next).slideUp()
		next.hide().slideDown()
	else
		next.slideUp()