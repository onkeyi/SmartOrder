<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
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
            <p class="title-text"><?= $this->lang->line('cart'); ?></p>

            <div class="gomenu radius20">
                <a href="javascript:void(0);" id="contactbutton">
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
                    </li>
                    <?php foreach ($this->cart->contents() as $content): ?>
                        <li class="table_row" id="row<?=$content['menu_id'];?>">
                            <div class="table_section"><?= $content['menu_name']; ?></div>
                            <div class="table_section_small"><?= $content['qty']; ?></div>
                            <div class="table_section_small"><?= $content['price']; ?></div>
                            <div class="table_section_small"><a href="javascript:void(0);" class="button_16 red radius8" onclick="deletecart(<?=$content['menu_id'];?>)" > X </a></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
<!--                <div style="font-size: 15px;">--><?php //echo $this->lang->line('total') . " : "; ?><!--<span id="subcount">--><?php //echo $this->cart->format_number($this->cart->total()); ?><!--</span></div>-->
                <div style="margin-top: 20px;">
                    <?php if (count($this->cart->contents()) != 0) { ?>
                    <a id="order_post" href="javascript:void(0)" onclick="order(1);" class="button_11 bluegreen radius4">注文確定</a>
                    <?php } ?>
                </div>
                <div> <a  id="order_message" href="/"> <?=isset($message) ? $message : "";?></a></div>
                <div class="clearfix"></div>
            </div>
            <!--End of page container-->
        </div>
    </div>
</div>
</body>
</html>