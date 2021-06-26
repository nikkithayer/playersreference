jQuery(function($) {
  $(document).ready(function() {

    var textTypes = ["line","speech-header","caption","split-line-end","stage-direction","stage-direction-exit"];

    $(".line-type").click(function(e){
      cycleClass($(this));
      e.preventDefault();
    });

    $("#save-text-changes").click(function(e){
      saveChanges();
      e.preventDefault();
    });

    $("button.add-note-button").click(function(e){
      var lineID = parseInt(($(this).attr("id")).replace("button-",""));
      $("#note-"+lineID).addClass("open");
      e.preventDefault();
    });

    function saveChanges(){
      var saveLineID = [];
      var saveLineType = []
      $('div[aria-label="edited"]').each(function() {
          var lineID = parseInt(($(this).attr("id")).replace("line-",""));
          var lineType = $(this).attr("class");
          saveLineID.push(lineID);
          saveLineType.push(lineType);
      });

      $.post( "../application/actions/update-play-list.php", { 'lineID[]': saveLineID, 'lineType[]': saveLineType, 'playUnits':playUnits, 'playContents':playContents, 'playName':playName})
        .done(function( data ) {
          alert( "Data Loaded: " + data );
      });                
    }

    function cycleClass(el){
      var elControl = el;
      var elTarget = el.next()
      var currentClass = elTarget.attr("class");
      var nextClass = textTypes.indexOf(currentClass)+1;
      elTarget.removeClass();
      elTarget.addClass(textTypes[nextClass]).attr("aria-label","edited");
      $('#text-change-alert').text("Line "+elTarget.attr("id").replace("line-","")+" type set to "+textTypes[nextClass]+".");
      $(elControl).text(textTypes[nextClass]);
    }

  });
});