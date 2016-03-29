<!DOCTYPE html>
<html>
<head>
    <title>GoMobile - A next generation web app theme</title>
</head>
<body>
<div id="wrapper">

    <div id="content">
        <div id="header">
            <div class="gohome radius20"><a href="/" id="homebutton"><img
                        src="/assets/<?= $theme ?>/images/icons/home.png" alt="" title=""/></a></div>
            <div class="gomenu radius20"><a href="/welcome/contact" id="contactbutton"><img
                        src="/assets/<?= $theme ?>/images/icons/cart.png" alt="" title=""/></a></div>
        </div>


        <div class="sliderbg">
            <div class="pages_container">
                <h2 class="page_title">Portfolio</h2>

                <div class="toogle_wrap radius8">
                    <div class="trigger"><a href="#">portfolio categories</a></div>
                    <div class="toggle_container">
                        <ul class="listing_detailed">
                            <li><a href="#">webdesign work</a></li>
                            <li><a href="#">painted illustrations</a></li>
                            <li><a href="#">programming and javascript</a></li>
                        </ul>
                    </div>
                </div>
                <div class="portfolio_item radius8">
                    <div class="portfolio_image"><a rel="gallery-1"
                                                    href="/assets/<?= $theme ?>/images/portfolio_thumb.jpg"
                                                    class="swipebox" title="Webdesign work"><img
                                src="/assets/<?= $theme ?>/images/portfolio_thumb.jpg" alt="" title="" border="0"/></a>
                    </div>
                    <div class="portfolio_details">
                        <h4>Webdesign work</h4>

                        <p>Nullam et scelerisque erat. Cras vestibulum justo...</p>
                        <a rel="gallery-2" href="/assets/<?= $theme ?>/images/portfolio_thumb.jpg"
                           class="swipebox view_details" title="Webdesign work">view details</a>
                    </div>
                </div>
                <div class="portfolio_item radius8">
                    <div class="portfolio_image"><a rel="gallery-1"
                                                    href="/assets/<?= $theme ?>/images/portfolio_thumb2.jpg"
                                                    class="swipebox" title="Webdesign work"><img
                                src="/assets/<?= $theme ?>/images/portfolio_thumb2.jpg" alt="" title="" border="0"/></a>
                    </div>
                    <div class="portfolio_details">
                        <h4>Mobile development</h4>

                        <p>Cras vestibulum justo eget lorem semper ac facilisis...</p>
                        <a rel="gallery-2" href="/assets/<?= $theme ?>/images/portfolio_thumb2.jpg"
                           class="swipebox view_details" title="Webdesign work">view details</a>
                    </div>
                </div>
                <div class="portfolio_item radius8">
                    <div class="portfolio_image"><a rel="gallery-1"
                                                    href="/assets/<?= $theme ?>/images/portfolio_thumb3.jpg"
                                                    class="swipebox" title="Webdesign work"><img
                                src="/assets/<?= $theme ?>/images/portfolio_thumb3.jpg" alt="" title="" border="0"/></a>
                    </div>
                    <div class="portfolio_details">
                        <h4>Applications</h4>

                        <p>Sed ut felis non arcu pulvinar molestie....</p>
                        <a rel="gallery-2" href="/assets/<?= $theme ?>/images/portfolio_thumb3.jpg"
                           class="swipebox view_details" title="Webdesign work">view details</a>
                    </div>
                </div>
                <div class="clearfix"></div>

                <h3>Portfolio with round images</h3>

                <div class="portfolio_item radius8">
                    <div class="portfolio_image_round"><a rel="gallery-1"
                                                          href="/assets/<?= $theme ?>/images/portfolio_thumb.jpg"
                                                          class="swipebox" title="Webdesign work"><img
                                src="/assets/<?= $theme ?>/images/portfolio_thumb.jpg" alt="" title="" border="0"/></a>
                    </div>
                    <div class="portfolio_details">
                        <h4>Webdesign work</h4>

                        <p>Nullam et scelerisque erat. Cras vestibulum justo...</p>
                        <a rel="gallery-2" href="/assets/<?= $theme ?>/images/portfolio_thumb.jpg"
                           class="swipebox view_details" title="Webdesign work">view details</a>
                    </div>
                </div>
                <div class="portfolio_item radius8">
                    <div class="portfolio_image_round"><a rel="gallery-1"
                                                          href="/assets/<?= $theme ?>/images/portfolio_thumb2.jpg"
                                                          class="swipebox" title="Webdesign work"><img
                                src="/assets/<?= $theme ?>/images/portfolio_thumb2.jpg" alt="" title="" border="0"/></a>
                    </div>
                    <div class="portfolio_details">
                        <h4>Mobile development</h4>

                        <p>Cras vestibulum justo eget lorem semper ac facilisis...</p>
                        <a rel="gallery-2" href="/assets/<?= $theme ?>/images/portfolio_thumb2.jpg"
                           class="swipebox view_details" title="Webdesign work">view details</a>
                    </div>
                </div>
                <div class="portfolio_item radius8">
                    <div class="portfolio_image_round"><a rel="gallery-1"
                                                          href="/assets/<?= $theme ?>/images/portfolio_thumb3.jpg"
                                                          class="swipebox" title="Webdesign work"><img
                                src="/assets/<?= $theme ?>/images/portfolio_thumb3.jpg" alt="" title="" border="0"/></a>
                    </div>
                    <div class="portfolio_details">
                        <h4>Applications</h4>

                        <p>Sed ut felis non arcu pulvinar molestie....</p>
                        <a rel="gallery-2" href="/assets/<?= $theme ?>/images/portfolio_thumb3.jpg"
                           class="swipebox view_details" title="Webdesign work">view details</a>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="scrolltop radius20"><a onClick="jQuery('html, body').animate( { scrollTop: 0 }, 'slow' );"
                                                   href="javascript:void(0);"><img
                            src="/assets/<?= $theme ?>/images/icons/top.png" alt="Go on top" title="Go on top"/></a>
                </div>
            </div>
            <!--End of page container-->
        </div>
    </div>
</div>
</body>
</html>