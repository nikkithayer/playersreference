jQuery(function($) {
  $(document).ready(function() {

    $('a.unit-accordion-control').on('click', function (e) {
      e.preventDefault();
      var $href = $(this).attr('href');
      $(this).addClass('active');
  
      $('#' + $href).toggleClass("hide");
    });

  });
});