function only_number(event)
{
    var x = event.which || event.keyCode;
    console.log(x);
    if ((x >= 48) && (x <= 57) || x == 8 | x == 9 || x == 13)
    {
        return;
    }
    else
    {
        event.preventDefault();
    }
}

function validation()
{
    
    var name = $("#name").val().trim();
    var mobile = $("#mobile").val().trim();
    var email = $("#email").val().trim();
    var address = $("#address").val().trim();
    
    var patten_name = /^[a-zA-Z -]+$/;
    var pattern_mobile = /^[0]?[789]\d{9}$/;
    var pattern_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;

    if(name == "")
    {
        $("#err_name").fadeIn().html("Please enter full name");
        setTimeout(function(){$("#err_name").fadeOut();},2000);
        $("#name").focus();
        return false;
    }
    else if(!patten_name.test(name))
    {
        $("#err_name").fadeIn().html("Enter only alphabets (@,&,*,$,#,! not allowed)");
        setTimeout(function(){$("#err_name").fadeOut();},2000);
        $("#name").focus();
        return false;
    }
    if(mobile == "")
    {
        $("#err_mobile").fadeIn().html("Please enter mobile");
        setTimeout(function(){$("#err_mobile").fadeOut();},2000);
        $("#mobile").focus();
        return false;
    }
    else if(!pattern_mobile.test(mobile))
    {
        $("#err_mobile").fadeIn().html("Please enter valid Mobile no");
        setTimeout(function(){$("#err_mobile").fadeOut();},2000);
        $("#mobile").focus();
        return false;
    }
    if(email == "")
    {
        $("#err_email").fadeIn().html("Please enter email");
        setTimeout(function(){$("#err_email").fadeOut();},2000);
        $("#email").focus();
        return false;
    }
    else if(!pattern_email.test(email))
    {
        $("#err_email").fadeIn().html("Please enter valid email");
        setTimeout(function(){$("#err_email").fadeOut();},2000);
        $("#email").focus();
        return false;
    }
    if(address == "")
    {
        $("#err_address").fadeIn().html("Please enter address");
        setTimeout(function(){$("#err_address").fadeOut();},2000);
        $("#address").focus();
        return false;
    }
}