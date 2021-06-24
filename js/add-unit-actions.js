jQuery(function($) {
  $(document).ready(function() {

    $("#add-unit").hide();
    $("#show-add-unit").click(function(e){
      $("#add-unit").show();
    });

    $("#add-unit-close").click(function(e){
      $("#add-unit").hide();
    });

  });
});