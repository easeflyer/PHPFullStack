// JavaScript Document
$(function () {
    $('.list .gooditem a img').hover(function () {
        $(this).css('opacity', 0.7);
    }, function () {
        $(this).css('opacity', 1);
    });
    /*$('.goodpic').hover(function(){
     $(this).css('opacity',0.7);
     },function(){
     $(this).css('opacity',1);
     });*/
})