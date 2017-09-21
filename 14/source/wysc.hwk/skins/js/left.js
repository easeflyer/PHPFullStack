
/*$(function(){
 $('.cat .item .icon').click(function(){
 var _item=$(this).parent('h4').parent('.item');
 //var _subcat=_item.find('.subcat');
 //console.log(_subcat.css('display'));
 if(_item.hasClass('current')){
 _item.removeClass('current');
 }else{
 _item.addClass('current');
 }
 })
 })*/
/*$(function () {
 $('.cat .item .icon').click(function () {
 var _item = $(this).parent('h4').parent('.item');
 $('.cat .item').removeClass('current');
 _item.addClass('current');
 })
 })*/
$(function () {
    $('.cat .item .icon').toggle(function () {
        var _item = $(this).parent('h4').parent('.item');
        _item.addClass('current');
    }, function () {
        var _item = $(this).parent('h4').parent('.item');
        _item.removeClass('current');
    })
})
 