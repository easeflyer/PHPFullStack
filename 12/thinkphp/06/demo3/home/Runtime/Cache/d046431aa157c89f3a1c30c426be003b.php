<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>无标题文档</title><script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script></head><script type="text/javascript">        $(function () {
            $("#btn").click(function () {
                $.ajax({
                    type: "get",
                    dataType: "html",  //也可以是json 回调函数则可以处理json数据见jQuery
                    url: "__URL__/retData/random/" + Math.random(), //路径写的 是动作的访问形式
                    success: function (data) {
                        $("#dv1").html(data);
                    }
                })
            })
        })
    </script><body><input type="button" id="btn" value="点击获取ajax值"><div id="dv1">测试内容</div></body></html>