jQuery(function($) {
  $(document).ready(function() {

    var currentMode;
    changeMode("practice");

    $("#modes a").click(function(e){
      changeMode($(this).attr("id"))
      e.preventDefault();  
    });
  
    function changeMode(mode){
      if(!(mode === currentMode)){
        $("ul#modes li").removeClass("selected");
        $("ul#modes li a#"+mode).parent().addClass("selected");
        $("div#text").removeClass().addClass(mode);
        $("a#toggle").removeClass().addClass(mode);

        removeAllModes();
        if(mode === "reader"){
          $(".readerGloss").each(function(){
            var RGdistance = $(this).position().left;
            var RGdistanceString = "style='transform:translate("+RGdistance+"px,-8px)'";
            $(this).parent().closest("div").append("<span id="+$(this).attr("id")+"-gloss' "+RGdistanceString+" class='readerGlossContent'>"+$(this).attr("aria-reader-gloss")+"</span>");
          });
        }

        if(mode === "performer"){
          $(".performerGloss").each(function(){
            var PGdistance = $(this).position().left;
            var PGdistanceString = "style='transform:translate("+PGdistance+"px,-8px)'";
            $(this).parent().closest("div").append("<span id="+$(this).attr("id")+"-gloss' "+PGdistanceString+" class='performerGlossContent'>"+$(this).attr("aria-performer-gloss")+"</span>");
          });

          $(".performerScansion").each(function(){
            $(this).attr("aria-original-text",$(this).text());
            $(this).text($(this).attr("aria-scansion"));
          });
        }

      currentMode = mode;
      }
    }    

    function removeAllModes(){
      $(".readerGlossContent").remove()
      $(".performerGlossContent").remove();
      $(".performerScansion").each(function(){
        $(this).text($(this).attr("aria-original-text"));
      })
      $(".noteOpen").removeClass().addClass("noteClosed");
    }

    $(".studentNote").click(function(e){
      if(currentMode === "student"){
        showNotes($(this));
      }
        e.preventDefault();
    });

    function showNotes(el){
      noteID = "#open-"+el.attr("id");
      $(noteID).removeClass().addClass("noteOpen");
    }

  });
});