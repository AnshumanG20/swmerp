$( "#passToggle" ).mousedown(function() {
    $("#user_pass").attr("type", "text");
    $("#passToggle").html('<i class="fa fa-eye-slash"></i>');
});
$( "#passToggle" ).mouseup(function() {
    $("#user_pass").attr("type", "password");
    $("#passToggle").html('<i class="fa fa-eye"></i>');
});
function ipAdd(){
   
    $.getJSON("https://json.geoiplookup.io/", function (data) {
        $("#ip_address").val(data.ip);
      
    });
}
ipAdd();
$("#btn_submit").click(function(){
    var process = true;
    if($("#user_name").val()==""){
        $("#user_name").css('border-color', 'red'); process=false;
    }
    if($("#user_pass").val()==""){
        $("#user_pass").css('border-color', 'red'); process=false;
    }
    return process;
});
$("#user_name").keyup(function(){ $(this).css('border-color',''); });
$("#user_pass").keyup(function(){ $(this).css('border-color',''); });