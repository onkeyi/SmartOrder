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
    <meta name="description" content="SMART ORDER"/>
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
<body>
<div id="wrapper">
    <div id="content">
        <div class="sliderbg_menu">
            <!-- LANGUAGE -->
            <div class="language">
                <a href="/welcome/changelanguage/japanese" class="button_lang blue radius4">日本語</a>
                <a href="/welcome/changelanguage/english" class="button_lang blue  radius4">English</a>
                <a href="/welcome/changelanguage/korean" class="button_lang blue  radius4">한국어</a>
                <a href="/welcome/changelanguage/chinese" class="button_lang blue  radius4">中国语</a>
            </div>
            <!-- LOGO -->
            <div class="logo">
                <a href="javascript:void(0);" onclick="showcookie();">
<!--                    <img src="/assets/--><?//= $theme ?><!--/colors/beauty/images/logo.png" alt="" title="" border="0"/>-->
                    <サンプル>

                </a>
            </div>
            <div class="information">
                テーブル:<?php echo $this->session->area_id;?>  / 人数: <?=$this->session->user_count;?>  /入場時間：
            </div>

            <!-- MENU -->
            <nav id="menu">
                <ul>
                    <li><a href="/menu/">
                            <div class="round_img">
                                <img src="/assets/<?= $theme ?>/images/icons/menu.png" alt="" title=""/>
                            </div>
                            <span><?= $this->lang->line('menu'); ?></span>
                        </a>
                    </li>
                    <?php $count = 0; ?>
                    <?php foreach ($categorys as $category): ?>
                        <?php $count++; ?>
                        <li><a href="/menu/category/<?= $category->category_id; ?>">
                                <div class="round_img">
                                    <img src="/assets/<?= $theme ?>/images/icons/menu.png" alt="" title=""/>
                                </div>
                                <span><?= $category->category_name; ?></span>
                            </a>
                        </li>
                        <?php if ($count == 4) break; ?>
                    <?php endforeach; ?>

                    <li><a href="/welcome/clients">
                            <div class="round_img">
                                <img src="/assets/<?= $theme ?>/images/icons/clients.png" alt="" title=""/>
                            </div>
                            <span><?= $this->lang->line('call'); ?></span>
                        </a>
                    </li>
                    <li><a href="/menu/orderhistory/">
                            <div class="round_img">
                                <img src="/assets/<?= $theme ?>/images/icons/twitter.png" alt="" title=""/>
                            </div>
                            <span><?= $this->lang->line('order_history'); ?></span>
                        </a>
                    </li>
                    <li><a href="/menu/cart/">
                            <div class="round_img">
                                <img src="/assets/<?= $theme ?>/images/icons/cart.png" alt="" title=""/>
                            </div>
                            <span><?= $this->lang->line('cart'); ?></span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="clear"></div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/assets/<?= $theme ?>/js/jquery.tabify.js"></script>
<script type="text/javascript" src="/assets/<?= $theme ?>/js/jquery.fitvids.js"></script>
<script type="text/javascript" src="/assets/<?= $theme ?>/js/twitter/jquery.tweet.js" charset="utf-8"></script>
<script type="text/javascript" src="/assets/<?= $theme ?>/js/jquery.cookie.js"></script>
<script src="/assets/<?= $theme ?>/js/app.js"></script>
</body>
</html>