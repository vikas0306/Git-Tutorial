$(document).on('click', '.login', function()
  {
        var email = $.trim($("#email").val());
				var password = $.trim($("#password").val());
       	var pattern_email = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i; 
				var pattern_password = /^.{6,}$/; 

				var baseurl=$("#site_url").val();
        var url="Welcome/login_action";
        
          
              if(email == "")
							{
							    $("#loginError").fadeIn().html("Required").css('color','red');
							    setTimeout(function(){$("#loginError").fadeOut();},4000)
							    $("#email").focus();
							    return false;
							}
						  else if(!pattern_email.test(email))
						  {
						        $("#loginError").fadeIn().html("Invalid").css('color','red');
						        setTimeout(function(){$("#loginError").fadeOut();},4000)
						        $("#email").focus();
						        return false;
						  }
						  if(password == "")
						  {
						        $("#loginError").fadeIn().html("Required").css('color','red');
						        setTimeout(function(){$("#loginError").fadeOut();},4000)
						        $("#password").focus();
						        return false;
						  }	   
              else
              {
              		var shaObj = new jsSHA(password);
  								var hash_orig = shaObj.getHash("SHA-512", "HEX"); //original hash
  								//alert(hash);return false;

  								var salt="123"; //add salt

  								var hash2 = hash_orig+salt; //create hash2
  								//alert(hash2);return false;


  								var shaObj = new jsSHA(hash2);
  								var hash_3 = shaObj.getHash("SHA-512", "HEX"); //again add hash//generate hash3

  								//alert(hash_3);return false;

                  $.ajax({
                      url:baseurl+url,
                      method:"POST",
                      data:{email:email,password:hash_orig,hash2:hash2,hash_3:hash_3},
                      success:function(data)
                      {
                        
                        if(data=='Success')
                        {
                        		//alert(data);
                            window.location.href = baseurl+"Admin_dashboard";
                        }
                        else if(data=='Wrong')
                        {
                          $("#loginError").fadeIn().html("Invalid");
                          setTimeout(function(){$("#loginError").html("&nbsp;");},4000)
                        }          
                      }
                    });  
                 } 
  
            });

setTimeout(function(){$("#FlashError").fadeOut();},4000)


function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


		

