(function() {
  $('.navigation > .header').on('click', function() {
    var next;
    console.log($(this).next());
    next = $(this).next();
    if (!next.is(':visible')) {
      $('.box').not(next).slideUp();
      return next.hide().slideDown();
    } else {
      return next.slideUp();
    }
  });

}).call(this);
