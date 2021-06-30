jQuery(function($) {
  $(document).ready(function() {

    $('a.unit-accordion-control').on('click', function (e) {
      var $href = $(this).attr('href');
      $(this).addClass('active');  
      $('#' + $href).toggleClass("hide");
      e.preventDefault();
    });

    $(".readerGloss").on('click',function(e){
      console.log("readergloss click");
      removeAllModes();
      $(this).parent().closest("div").append("<span id="+$(this).attr("id")+"-gloss' class='readerGlossContent'>"+$(this).attr("aria-reader-gloss")+"</span>");
      e.preventDefault();
    });

    $(".performerGloss").on('click',function(e){
      console.log("performergloss click");
      removeAllModes();
      $(this).parent().closest("div").append("<span id="+$(this).attr("id")+"-gloss' class='performerGlossContent'>"+$(this).attr("aria-performer-gloss")+"</span>");
      e.preventDefault();
    });

    $(".studentNote").on('click',function(e){
      console.log("studentnote click");
      removeAllModes();
      e.preventDefault();
    });

    $(".performerScansion").on('click',function(e){
      console.log("performerscansion click");
      removeAllModes();
      e.preventDefault();
    });

    function removeAllModes(){
      $(".readerGlossContent").remove()
      $(".performerGlossContent").remove();
      $(".performerScansion").each(function(){
        $(this).text($(this).attr("aria-original-text"));
      })
      $(".noteOpen").removeClass().addClass("noteClosed");
    }

  });
});