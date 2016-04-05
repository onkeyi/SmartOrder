<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <link rel="apple-touch-icon" href="/assets/<?= $theme ?>/images/apple-touch-icon.png"/>
    <link rel="apple-touch-startup-image" href="/assets/<?= $theme ?>/images/apple-touch-startup-image-320x460.png"/>
    <meta name="author" content="FamousThemes"/>
    <meta name="description" content="Smart Order"/>
    <meta name="keywords"
          content="SmartOrder"/>
    <title>SMART ORDER</title>
    <link type="text/css" rel="stylesheet" href="/assets/<?= $theme ?>/css/style.css"/>
    <link type="text/css" rel="stylesheet" href="/assets/<?= $theme ?>/colors/beauty/beauty.css"/>
    <link type="text/css" rel="stylesheet" href="/assets/<?= $theme ?>/css/swipebox.css"/>
    <link href='http://fonts.googleapis.com/css?family=Courgette' rel='stylesheet' type='text/css'/>

    <script type="text/javascript" src="/assets/<?= $theme ?>/js/jquery-1.11.3.min.js"></script>
    <script src="/assets/<?= $theme ?>/js/jquery.validate.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/assets/<?= $theme ?>/js/jquery.swipebox.js"></script>
    <script src="/assets/<?= $theme ?>/js/code.js"></script>
</head>
<body onload="checkWIFI();">

</div>
<div id="wrapper">

    <div class="sliderbg" style="height:90%">
        <div class="pages_container">
            <h4 class="page_title">スマートフォン注文システム</h4>

            <h5 class="page_title">テーブル：<?php echo $area_id . '<br />'; ?></h5>
            <ul class="listing">
                <li>メニューから選んで + ,- でカゴに入れる</li>
                <li>カゴから注文確定する。</li>
                <li>料理出す</li>
            </ul>
            <div>
                <a class="button_14 red radius8" href="javascript:void(0);"
                   onclick="setUserCount(2);">2人</a>
                <a class="button_14 red radius8" href="javascript:void(0);"
                   onclick="setUserCount(3);">３人</a>
                <a class="button_14 red radius8" href="javascript:void(0);"
                   onclick="setUserCount(4);">4人</a>
                <a class="button_14 red radius8" href="javascript:void(0);"
                   onclick="setUserCount(5);">5人</a>
                <a class="button_14 red radius8" href="javascript:void(0);"
                   onclick="setUserCount(6);">6人</a>
                <a class="button_14 red radius8" href="javascript:void(0);"
                   onclick="setUserCount(7);">7人</a>
                <a class="button_14 red radius8" href="javascript:void(0);"
                   onclick="setUserCount(8);">8人</a>
                <a class="button_14 red radius8" href="javascript:void(0);"
                   onclick="setUserCount(9);">9人</a>

                <div>

                    <a href="/welcome/main" class="button_11 blue">モバイル注文開始</a>
                    <!--            <div id="connectionCheck" style="display: block">-->
                    <!--                --><?php //echo $this->benchmark->elapsed_time();?>
                    <div class="clearfix"></div>

                </div>
                <!--End of page container-->
                <div id="connectionCheck"></div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/assets/<?= $theme ?>/js/jquery.tabify.js"></script>
    <script type="text/javascript" src="/assets/<?= $theme ?>/js/jquery.fitvids.js"></script>
    <script type="text/javascript" src="/assets/<?= $theme ?>/js/twitter/jquery.tweet.js" charset="utf-8"></script>
    <script type="text/javascript" src="/assets/<?= $theme ?>/js/jquery.cookie.js"></script>
    <script src="/assets/<?= $theme ?>/js/app.js"></script>
</body>
<script type="text/javascript">
    var output = document.getElementById('connectionCheck');

    function checkWIFI() {
        var html = "language : " + navigator.language + "<br />";
        html += "UserAgent:" + navigator.userAgent + "<br />";
        html += "ONLINE :" + navigator.onLine + "<br />";

        //getLocation();
        //output.innerHTML = html;
        $.cookie('userid','AAAAAA');
    }

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            output.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        output.innerHTML += "Latitude: " + position.coords.latitude +
            "<br>Longitude: " + position.coords.longitude;
    }

</script>
</html>