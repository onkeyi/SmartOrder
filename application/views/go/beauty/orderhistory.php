<!DOCTYPE html>
<html>
<head>
    <title><?= $this->lang->line('order_history'); ?></title>
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
            <p class="title-text"><?= $this->lang->line('order_history'); ?></p>

            <div class="gomenu radius20">
                <a href="/menu/cart" id="contactbutton">
                    <img src="/assets/<?= $theme ?>/images/icons/cart.png" alt="" title=""/>
                </a>
            </div>
            <p id="totalcount" class="item-count radius20"><?=$this->cart->total_items();?></p>
        </div>
        <div class="sliderbg">
            <div class="pages_container">
                <ul class="responsive_table">
                    <li class="table_row">
                        <div class="table_section"><?= $this->lang->line('menu'); ?></div>
                        <div class="table_section_small"><?= $this->lang->line('qty'); ?></div>
                        <div class="table_section_small"><?= $this->lang->line('price') ?></div>
                        <div class="table_section_small"><?= $this->lang->line('total') ?></div>
                    </li>
                    <?php $total = 0;?>
                    <?php foreach ($order_session as $content): ?>
                        <li class="table_row">
                            <div class="table_section"><?= $content->menu_name; ?></div>
                            <div class="table_section_small"><?= $content->quantity; ?></div>
                            <div class="table_section_small"><?= $content->price; ?></div>
                            <div class="table_section_small"><?= $this->cart->format_number($content->quantity*$content->price); ?></div>

                        </li>
                        <?php $total += $content->quantity*$content->price;?>
                    <?php endforeach; ?>
                </ul>
                <div class="clearfix"></div>
                <div style="border:0px solid gray; text-align:right; width:100%;font-size: 20px; padding-right: 10px;padding-top: 20px;padding-bottom: 20px;margin-bottom: 10px;">
                    <?php echo $this->lang->line('total') . " : "; ?><?php echo $this->cart->format_number($total); ?>
                </div>
                <div style="padding: 50px;">
                    <p>割り勘：　1人 / xxxxx. 円</p>
                    <p>会計処理すると、オーダーができなくなります。</p>
                    <a id="order_post" href="javascript:void(0)" onclick="accounting();" class="button_11 bluegreen radius4">会計</a>
                </div>
                <div> <a  id="order_message" href="/"> <?=isset($message) ? $message : "";?></a></div>
            </div>
            <!--End of page container-->
        </div>
    </div>
</div>
</body>
</html>