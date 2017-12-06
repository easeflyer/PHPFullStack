<html>
    <body>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <input type="text" name="t1" /><br /><br />
            <input type="file" name="f1[]" />3<br />
            <input type="file" name="f1[]" />4<br />
            <input type="file" name="f1[]" />5<br />
            <input type="submit" name="提交" />
        </form>
    </body>
</html>