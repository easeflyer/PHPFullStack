// JavaScript Document

window.onload = function () {
    var bt = document.getElementById("bt");
    bt.onclick = function () {
        var div1 = document.getElementById("div1");
        alert("div1:" + div1.innerHTML);//获取
        alert("div1:" + div1.innerText);//获取
        alert("div1:" + div1.textContent);//获取
        
        div1.innerHTML = "<img src='imgs/1.jpg'>";//设置内容 文本 html代码
    }
}