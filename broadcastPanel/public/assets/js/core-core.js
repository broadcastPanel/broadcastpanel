(function() {
  $('.navigation > .header').on('click', function() {
    var header, next;
    next = $(this).next();
    header = $(this);
    if (!next.is(':visible')) {
      $('.box').not(next).slideUp();
      return next.hide().slideDown();
    } else {
      return next.slideUp();
    }
  });

}).call(this);
