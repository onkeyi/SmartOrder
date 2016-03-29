<!DOCTYPE html>
<html>
<head>
    <title><?= $this->lang->line('menu'); ?></title>
</head>
<body>
<div id="wrapper">
    <div id="content">
        <div id="header">
            <div class="gohome radius20">
                <a href="/welcome/main" id="homebutton">
                    <img src="/assets/<?= $theme ?>/images/icons/home.png" alt="" title=""/>
                </a>
            </div>
            <p class="title-text"><?= $this->lang->line('menu'); ?></p>

            <div class="gomenu radius20">
                <a href="/menu/cart" id="contactbutton">
                    <img src="/assets/<?= $theme ?>/images/icons/cart.png" alt="" title=""/>
                </a>
            </div>
            <p id="totalcount" class="item-count radius20"><?=$this->cart->total_items();?></p>
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
                                        <img src="/assets/<?= $theme ?>/images/portfolio_thumb.jpg"
                                             alt="<?= $menu->menu_name; ?>" title="<?= $menu->menu_name; ?>"
                                             border="0"/>
                                    </a>
                                </div>
                                <div class="portfolio_details">
                                    <h4><?= $menu->menu_name; ?></h4>

                                    <!--                                    <p>-->
                                    <? //= count($menu->menu_description) > 25 ? mb_substr($menu->menu_description, 0, 25) . '...' : $menu->menu_description; ?><!--</p>-->
                                </div>

                                <div class="portfolio_details">
                                    <a class="button_13 red radius20" href="javascript:void(0);"
                                       onclick="removeItem(<?= $menu->menu_id; ?>)"> - </a>

                                    <a href="javascript:void(0);" id="subcount<?= $menu->menu_id; ?>"
                                       class="button_13 blue radius8">
                                        <?php $count = 0; ?>
                                        <?php foreach ($this->cart->contents() as $items) {
                                            if ($items['id'] == $menu->menu_id) {
                                                $rowid = $items['rowid'];
                                                if ($rowid) {
                                                    $cartitem = $this->cart->get_item($rowid);
                                                    if ($cartitem) {
                                                        $count = $cartitem['qty'];
                                                    }
                                                }
                                            }
                                        } ?>
                                        <?php echo $count; ?>
                                    </a>
                                    <a class="button_13 green radius20" href="javascript:void(0);"
                                       onclick="addItem(<?= $menu->menu_id; ?>)"> + </a>


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