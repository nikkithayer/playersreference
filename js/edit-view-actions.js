jQuery(function($) {
  $(document).ready(function() {

    $('a.unit-accordion-control').on('click', function (e) {
      var $href = $(this).attr('href');
      $(this).addClass('active');  
      $('#' + $href).toggleClass("hide");
      e.preventDefault();
    });

    $(".readerGloss").on('click',function(e){
      removeAllModes();
      $(this).parent().closest("div").append("<span id="+$(this).attr("id")+"-gloss' class='readerGlossContent'>"+$(this).attr("aria-reader-gloss")+"</span>");
      e.preventDefault();
    });

    $(".performerGloss").on('click',function(e){
      removeAllModes();
      $(this).parent().closest("div").append("<span id="+$(this).attr("id")+"-gloss' class='performerGlossContent'>"+$(this).attr("aria-performer-gloss")+"</span>");
      e.preventDefault();
    });

    $(".studentNote").on('click',function(e){
      removeAllModes();
      var noteID = "#open-"+$(this).attr("id");
      $(noteID).removeClass("noteClosed").addClass("noteOpen");
      e.preventDefault();
    });

    $(".performerScansion").on('click',function(e){
      removeAllModes();
      $(this).parent().closest("div").append("<span id="+$(this).attr("id")+"-scansion class='performerScansionContent'>"+$(this).attr("aria-scansion")+"</span>");
      e.preventDefault();
    });

    function removeAllModes(){
      $(".readerGlossContent").remove()
      $(".performerGlossContent").remove();
      $(".performerScansionContent").remove();
      $(".noteOpen").removeClass().addClass("noteClosed");
    }

  });
});