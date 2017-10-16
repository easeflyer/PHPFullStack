// JavaScript Document
/*$(function(){
	$('.cat .item  .icon').click(function(){
		var _item=$(this).parent('h4').parent('.item');
		//var _subcat=_item.find('.subcat');
		//console.log(_subcat.css('display'));
		if(_item.hasClass('current')){
			_item.removeClass('current');
		}else{
			_item.addClass('current');
		}
	});
})*/
/*$(function(){
	$('.cat .item  .icon').click(function(){
		var _item=$(this).parent('h4').parent('.item');
		$('.cat .item').removeClass('current');
		_item.addClass('current');
	});
})*/
/* 代码的作用就是给 .cat .item .icon 增加一个触发事件。
 * toggle 参考 jquery 手册,不同版本有差异
 * 给父标签 li.item 增加 current 样式
 * @returns {undefined}
 */

$(function () {
    $('.cat .item  .icon').toggle(function () {
        var _item = $(this).parent('h4').parent('.item');
        _item.addClass('current');
    }, function () {
        var _item = $(this).parent('h4').parent('.item');
        _item.removeClass('current');
    });
})