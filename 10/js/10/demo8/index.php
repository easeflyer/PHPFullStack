<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
    </head>
    <body>

        <script>
            function wt(str) {
                document.write("<br />" + str + "<br />");
            }
            /**
             *  输出浏览器相关的一些信息，根据这些信息，可以进行和平台适配的某些特殊需求和功能。
             *  使得后台程序。能够针对平台和操作系统，返回特定的相应信息。
             *  
             */

            wt("navigator.appName:"+navigator.appName);   // 一般都显示 Netscape 因为这个对象最早就是针对火狐浏览器。
            wt("navigator.appVersion:"+navigator.appVersion);
            wt("navigator.browserLanguage:"+navigator.browserLanguage);
            wt("navigator.userAgent:"+navigator.userAgent);
        </script>

    </body>
</html>