// JavaScript Document
/*
 * 这里 ajax 被定义成了一个函数，接收一个 json 格式的参数。 其中包含回调函数。
 * @param {type} json
 * @returns {undefined}
 */
function ajax(json) { //  [name:"zhangsan",url:"a.php",success:function(){}]  json.name  json.url
    
    /*
     * 首先把 外部传递进来的ajax参数 json 进行赋值。
     */
    var type = json.type;  // type属性：定义ajax 请求类型：get，post
    var url = json.url;    // url属性：定义请求的url。
    var success = json.success;  //success 回调函数函数  json.success()  <==> success()
    //
    //创建ajax对象
    var oAjax;
    if (window.XMLHttpRequest) {  //ff ie9
        var oAjax = new XMLHttpRequest();
    } else {
        var oAjax = new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    oAjax.open(type, url, true);
    oAjax.send();
    // 处理 readyStateChange 事件，最后调用 success 回调函数。
    oAjax.onreadystatechange = function () {
        if (oAjax.readyState == 4) {
            if (oAjax.status == 200) {
                var data = oAjax.responseText;
                success(data);  // 用传递进来的 json 参数的 success 方法 处理 返回数据。
            }
        }
    }
}

