jQuery(function($) {
  $(document).ready(function() {

    $("[aria-label='editable-text']").click(function(e){
      cycleClass($(this));
      e.preventDefault();
    });

    var textTypes = ["line","character","caption","split-line-end","stage-direction","stage-direction-exit"];

    function cycleClass(el){
      var currentClass = el.attr("class");
      var nextClass = textTypes.indexOf(currentClass)+1;
      el.removeClass();
      el.addClass(textTypes[nextClass]).attr("aria-label","edited");
      $('#text-change-alert').text("Line "+el.attr("id").replace("line-","")+" type set to "+textTypes[nextClass]+".");
    }

    $("#save-text-changes").click(function(e){
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

      e.preventDefault();
    });

  });
});