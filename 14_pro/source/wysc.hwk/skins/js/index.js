$(function () {
                //---------------图片轮换初始化，将第一张图片的透明度置为1，其余置为0------------
                $('.pic img').css('opacity', 0);
                $('.pic img:first').css('opacity', 1);
                var _nowpic = 0;
                /*$('.imagenav li').mouseover(function(){
                 $(this).css('opacity',1);
                 }).mouseout(function(){
                 $(this).css('opacity',0.6);
                 })*/
                //--------------hover是jq当中的组合事件它包括onmousover , onmouseout------------------
                $('.imagenav li').hover(function () {
                    $(this).css('opacity', 1);
                    _index = $('.imagenav li').index($(this));
                    if (_index == _nowpic)
                        return false;
                    //console.log(_index);
                    //$('.pic img:eq('+_nowpic+')').css('opacity',0);
                    /*$('.pic img:eq('+_nowpic+')').animate({opacity:0},300,function(){
                     $('.pic img:eq('+_index+')').css('opacity',1);
                     });*/
                    $('.pic img:eq(' + _index + ')').css('opacity', 1);
                    if (_index > _nowpic) {
                        $('.pic img:eq(' + _index + ')').css('left', "590px");
                        $('.pic img:eq(' + _nowpic + ')').animate({left: "-590px"}, 300);
                    } else {
                        $('.pic img:eq(' + _index + ')').css('left', "-590px");
                        $('.pic img:eq(' + _nowpic + ')').animate({left: "590px"}, 300);
                    }
                    ;
                    $('.pic img:eq(' + _index + ')').animate({left: "0px"}, 300);

                    _nowpic = _index;
                }, function () {
                    $(this).css('opacity', 0.6);
                });
            });
            //---------------不间断滚动------------------
            $(function () {
                $('.piclist li').clone().appendTo($('.piclist'));
                var _timer = setInterval(scrollpic, 50);
                function scrollpic() {
                    var _left = $('.scrollpic').scrollLeft();
                    _left++;
                    if (_left >= 516)
                        _left = 0;
                    $('.scrollpic').scrollLeft(_left);
                }
                $('.scrollpic').hover(function () {
                    clearInterval(_timer)
                }, function () {
                    _timer = setInterval(scrollpic, 50);
                })
                $('.btn-left').hover(function () {
                    clearInterval(_timer)
                }, function () {
                    _timer = setInterval(scrollpic, 50);
                })
                $('.btn-right').hover(function () {
                    clearInterval(_timer)
                }, function () {
                    _timer = setInterval(scrollpic, 50);
                })

            })
            //---------------点击滚动------------------
            $(function () {
                $('.piclist li').clone().appendTo($('.piclist'));
                //$('.piclist').css('left',400);
                $('.btn-left').click(function () {
                    var _left = parseInt($('.piclist').css('left'));
                    _left -= 129;
                    $('.piclist').animate({left: _left + 'px'}, 100, function () {
                        if (_left <= -516) {
                            $(this).css('left', 0);
                        }
                    })
                })
                $('.btn-right').click(function () {
                    var _left = parseInt($('.piclist').css('left'));
                    if (_left == 0) {
                        _left = -516;
                        $('.piclist').css('left', '-516px');
                    }
                    _left += 129;
                    $('.piclist').animate({left: _left + 'px'}, 100, function () {
                        if (_left >= 0) {
                            $(this).css('left', '-516px');
                        }
                    })
                })
            })