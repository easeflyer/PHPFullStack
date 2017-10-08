/**
 *  本 js 负责详情页 图片的展示 放大图
 *  注意 小图 和 大图的替换部分 图片的路径和命名格式。视频中 首先在非thinkphp 环境做的测试
 *  因此 路径和命名不同。 这部分代码也不同。后来修改成现在的代码。
 *  小图：就是放大前的图，大图就是放大镜效果的图片
 */

$(function () {
    $('.scrollpic ul li').clone().appendTo($('.scrollpic ul'));
    // 左边的小箭头 增加点击事件
    $('.arrow1').click(function () {
        var _left = parseInt($('.scrollpic ul').css('left'));
        _left -= 78;
        $('.scrollpic ul').animate({'left': _left + 'px'}, 100, function () {
            if (_left < -312) {
                $('.scrollpic ul').css('left', 0);
            }
        });
    })
    // 右边的小箭头 增加点击事件
    $('.arrow2').click(function () {
        var _left = parseInt($('.scrollpic ul').css('left'));
        if (_left == 0) {
            _left = -312;
            $('.scrollpic ul').css('left', '-312px');
        }
        _left += 78;
        $('.scrollpic ul').animate({left: _left + 'px'}, 100, function () {
            if (_left >= 0) {
                $(this).css('left', '-312px');
            }
        });
    });
    
    // 图片增加点击事件：1 小图替换 2 大图替换  小图：就是放大前的图，大图就是放大镜效果的图片
    $('.scrollpic li img').click(function () {
        $('.scrollpic li img').css('opacity', 1);
        $(this).css('opacity', 0.6);

        // 小图替换
        $('.mainpic img').attr('src', 'Public/Uploads/' + this.name + 'thumb_350_350_' + this.id);
        // 大图替换
        $('#bigpic img').attr('src', 'Public/Uploads/' + this.name + 'thumb_800_800_' + this.id);
    });
})
// 负责 详情页的放大缩小的功能，在视频中首先用 js 实现，后来修改为 jquery 实现
$(function () {
    var _mask = $('#mask');
    var _bigmask = $("#bigmask");
    var _bigpic = $("#bigpic");
    var _bigimg = _bigpic.find('img');
    
    // 鼠标划过的处理
    _bigmask.mousemove(function (e) {
        var _e = e.originalEvent;
        var _mousex = _e.layerX;
        var _mousey = _e.layerY;
        _mask.css('left', (_mousex - (_mask[0].offsetWidth) / 2) + 'px');
        _mask.css('top', (_mousey - (_mask[0].offsetHeight) / 2) + 'px');
        if (_mask[0].offsetLeft <= 0) {
            _mask.css('left', 0);
        }
        if (_mask[0].offsetTop <= 0) {
            _mask.css('top', 0);
        }
        var _maxleft = this.offsetWidth - _mask[0].offsetWidth;
        if (_mask[0].offsetLeft > _maxleft) {
            _mask.css('left', _maxleft + 'px');
        }
        var _maxtop = this.offsetHeight - _mask[0].offsetHeight;
        if (_mask[0].offsetTop > _maxtop) {
            _mask.css('top', _maxtop + 'px');
        }
        _bigimg.css('left', (-parseInt(_mask.css('left')) * 2) + 'px');
        _bigimg.css('top', (-parseInt(_mask.css('top')) * 2) + 'px');

    })
    
    
    _bigmask.hover(function () {
        _mask.show();
        _bigpic.show();
    }, function () {
        _mask.hide();
        _bigpic.hide();
    })
})
//设定tab选项卡效果
$(function () {
    $('.tabcontent').eq(0).show();
    $('.detail .detail1 ul li img:eq(0)').addClass('current');
    $('.detail .detail1 ul li').click(function () {
        var _index = $('.detail .detail1 ul li').index($(this));
        $('.tabcontent').hide();
        $('.tabcontent').eq(_index).show();

        $('.detail .detail1 ul li img').removeClass('current');
        $(this).find('img').addClass('current');
    })
})