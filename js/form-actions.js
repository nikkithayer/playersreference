jQuery(function($) {
  $(document).ready(function() {

    $("#submit").click(function(){

      $(".error").hide(); 
       var hasError = false;
       var emailReg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
 
 
         var emailVal = $("#email").val();
 
           if(emailVal == '') {
            $("#email").after('<span class="error">Please enter your email address.</span>');
            hasError = true;
           }
 
         var firstName = $("#firstName").val();
         
         var lastName = $("#lastName").val();
           if(lastName == '') {
            $("#lastName").after('<span class="error">Please enter your last name.</span>');
            hasError = true;
           } 
 
         var university = $("#university").val();
 
          if(hasError == false) {
            $(".submit").hide();
             $.post("form.php",
                { emailFrom: emailVal, firstName: firstName, lastName: lastName, university: university },
                 function(data){
                $("#sendEmail").slideUp("normal", function() {
             
                $("#sendEmail").before('<h1>Success!</h1><h3>Thank you for your interest. We\'ll be in touch.</h3>');
               });
              }
             ); 
          } 
         return false;
   });


  });
});
