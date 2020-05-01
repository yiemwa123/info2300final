$(document).ready(function() {
$("#menu").hover(function(){
    $("#deletephoto").removeClass("hidden");
    $("#image").addClass("opacity");
});
$("#menu").mouseleave(function(){
    $("#deletephoto").addClass("hidden");
    $("#image").removeClass("opacity");
});
$(".tagrow").hover(function(){
    $(".deletehover").removeClass("hidden");
});
$(".tagrow").mouseleave(function(){
    $(".deletehover").addClass("hidden");
});
});
