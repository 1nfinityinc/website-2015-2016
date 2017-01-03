function setModalMaxHeight(element) {
  this.$element     = $(element);
  var dialogMargin  = $(window).width() > 767 ? 62 : 22;
  var contentHeight = $(window).height() - dialogMargin;
  var headerHeight  = this.$element.find('.modal-header').outerHeight() || 2;
  var footerHeight  = this.$element.find('.modal-footer').outerHeight() || 2;
  var maxHeight     = contentHeight - (headerHeight + footerHeight);

  this.$element
    .find('.modal-content').css({
      'overflow': 'hidden'
  });
  
  this.$element
    .find('.modal-body').css({
      'max-height': maxHeight,
      'overflow-y': 'auto'
    });
}

$('.modal').on('show.bs.modal', function() {
  $(this).show(); 
  setModalMaxHeight(this);
});

$(window).resize(function() {
  if ($('.modal.in').length == 1) {
    setModalMaxHeight($('.modal.in'));
  }
});