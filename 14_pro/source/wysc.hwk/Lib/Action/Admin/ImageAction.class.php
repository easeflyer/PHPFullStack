<?php

class ImageAction extends Action {

    function thumb() {
        import('ORG.Util.Image');
        Image::thumb("./testimage/small.jpg", 'testimage/thum_350_350_small.jpg', 'jpg', 350, 350);
        Image::thumb("./testimage/small.jpg", 'testimage/thum_64_64_small.jpg', 'jpg', 64, 64);
    }

    function thumb1() {
        import('ORG.Util.Image.ThinkImage');
        $img=new ThinkImage(THINKIMAGE_GD,'./testimage/small.jpg');
        $data=$img->thumb(100,64,2);
        $img->save('./testimage/100_64.jpg','jpg');
    }

}

?>