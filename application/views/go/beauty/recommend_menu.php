<!DOCTYPE html>
<html>
<head>
    <title><?= $this->lang->line('recommend_menu'); ?></title>
</head>
<body>
<div id="wrapper">
    <div id="content">
        <div id="header">
            <div class="gohome radius20">
                <a href="/" id="homebutton">
                    <img src="/assets/<?= $theme ?>/images/icons/home.png" alt="" title=""/>
                </a>
            </div>
            <p style="float:left;width: 60%;text-align:center;font-size: 20px;padding-top: 10px;"><?= $this->lang->line('recommend_menu'); ?></p>

            <div class="gomenu radius20">
                <a href="/welcome/contact" id="contactbutton">
                    <img src="/assets/<?= $theme ?>/images/icons/cart.png" alt="" title=""/>
                </a>
            </div>
        </div>

        <div class="sliderbg">
            <div class="pages_container">
                <div class="toogle_wrap radius8">
                    <div class="trigger">
                        <a href="#"><?= $this->lang->line('menu_category'); ?></a>
                    </div>
                    <div class="toggle_container">
                        <ul class="listing_detailed">
                            <?php foreach ($categorys as $category): ?>
                                <li>
                                    <a href="#category<?= $category->category_id; ?>"><?= $category->category_name; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>

                <!-- category -->
                <?php foreach ($categorys as $category): ?>
                    <h5 class="page_title"
                        id="category<?= $category->category_id; ?>"><?= $category->category_name; ?></h5>
                    <?php foreach ($menus as $menu): ?>
                        <?php if ($menu->category_id == $category->category_id): ?>
                            <div class="portfolio_item radius8">

                                <div class="portfolio_image">
                                    <a rel="gallery-1" href="/assets/<?= $theme ?>/images/portfolio_thumb.jpg"
                                       class="swipebox" title="<?= $menu->menu_name; ?>">
                                        <img src="/assets/<?= $theme ?>/images/portfolio_thumb.jpg" alt="<?= $menu->menu_name; ?>" title="<?= $menu->menu_name; ?>" border="0"/>
                                    </a>
                                </div>
                                <div class="portfolio_details">
                                    <h4><?= $menu->menu_name; ?></h4>
                                    <p><?= count($menu->menu_description) > 25 ? mb_substr($menu->menu_description, 0, 25) . '...' : $menu->menu_description; ?></p>
                                </div>
                                <div class="portfolio_details">
                                    <p style="width:26%;height:5%;float:left;text-align: center;font-size:14px;">0</p>
                                    <a href="/welcome/addcart" style="text-align:center;padding:0;float:right;width:30%">+ 追加</a>
                                    <a href="/welcome/deletecart" style="text-align:center;padding:0;float:right;width:30%">- 削除</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                <a href="#" class="page-top">TOP ▲</a>

                <div class="clearfix"></div>
                <div class="scrolltop radius20">
                    <a onClick="jQuery('html, body').animate( { scrollTop: 0 }, 'slow' );" href="javascript:void(0);">
                        <img src="/assets/<?= $theme ?>/images/icons/top.png" alt="Go on top" title="Go on top"/></a>
                </div>
            </div>
            <!--End of page container-->
        </div>
    </div>
</div>
</body>
</html>