$(document).ready(function(){
    
    $(document).on("change","#name",function(){
        var name=$("#name").val();
    
        // alert(name);
        if(name.length<3)
            $("#nameerror").html("Length Should be minimum 3").css({"color":"blue","font-weight":"bold"});
        else
            $("#nameerror").html("");

    })

})