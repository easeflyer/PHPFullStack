$(function () {
    $('.scrollpic ul li').clone().appendTo($('.scrollpic ul'));
    $('.arrow1').click(function () {
        var _left = parseInt($('.scrollpic ul').css('left'));
        _left -= 76;
        $('.scrollpic ul').animate({'left': _left + 'px'}, 100, function () {
            if (_left <= -312) {
                $('.scrollpic ul').css('left', 0);
            }
        });
    })
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
        })
    });
    $('.scrollpic li img').click(function () {
        $('.scrollpic li img').css('opacity', 1);
        $(this).css('opacity', 0.6);
        $('.mainpic img').attr('src', 'Public/Uploads/' + this.name + 'thumb_350_350_' + this.id);
        $('#bigpic img').attr('src', 'Public/Uploads/' + this.name + 'thumb_800_800_' + this.id);
    })
})
$(function () {
    var _mask = $('#mask');
    var _bigmask = $('#bigmask');
    var _bigpic = $('#bigpic');
    var _bigimg = _bigpic.find('img');
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