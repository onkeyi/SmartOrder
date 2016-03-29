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
            <div class="gomenu radius20"><a href="contact.html" id="contactbutton"><img
                        src="/assets/<?= $theme ?>/images/icons/cart.png" alt="" title=""/></a></div>
        </div>


        <div class="sliderbg">
            <div class="pages_container">

                <h2 class="page_title">Get in touch</h2>

                <h2 id="Note"></h2>

                <div class="form">
                    <form class="cmxform" id="CommentForm" method="post" action="">
                        <label>Name:</label>
                        <input type="text" name="ContactName" id="ContactName" value=""
                               class="form_input radius4 required"/>
                        <label>Email:</label>
                        <input type="text" name="ContactEmail" id="ContactEmail" value=""
                               class="form_input radius4 required email"/>
                        <label>Message:</label>
                        <textarea name="ContactComment" id="ContactComment"
                                  class="form_textarea radius4 textarea required" rows="" cols=""></textarea>
                        <input type="submit" name="submit" class="form_submit radius4 green green_borderbottom"
                               id="submit" value="Send"/>
                        <input class="" type="hidden" name="to" value="bbbooogggs@gmail.com"/>
                        <input class="" type="hidden" name="subject" value="Contacf form message"/>
                        <label id="loader" style="display:none;"><img src="/assets/<?= $theme ?>/images/loader.gif"
                                                                      alt="Loading..." id="LoadingGraphic"/></label>
                    </form>
                </div>


                <h2>Let's socialize</h2>
                <ul class="social">
                    <li class="social_facebook"><a href="#"><img
                                src="/assets/<?= $theme ?>/images/icons/social/facebook.png" alt="" title=""
                                border="0"/></a></li>
                    <li class="social_twitter"><a href="#"><img
                                src="/assets/<?= $theme ?>/images/icons/social/twitter.png" alt="" title="" border="0"/></a>
                    </li>
                    <li class="social_google"><a href="#"><img
                                src="/assets/<?= $theme ?>/images/icons/social/google.png" alt="" title="" border="0"/></a>
                    </li>
                    <li class="social_pinterest"><a href="#"><img
                                src="/assets/<?= $theme ?>/images/icons/social/pinterest.png" alt="" title=""
                                border="0"/></a></li>
                    <li class="social_flickr"><a href="#"><img
                                src="/assets/<?= $theme ?>/images/icons/social/flickr.png" alt="" title="" border="0"/></a>
                    </li>
                    <li class="social_digg"><a href="#"><img src="/assets/<?= $theme ?>/images/icons/social/digg.png"
                                                             alt="" title="" border="0"/></a></li>
                </ul>
                <h2>Give Us a call</h2>
                <a href="tel:123 456 789" class="call_button radius8">Click To Call Now!</a>
                <a href="http://maps.google.com/maps?q=houston+usa&amp;hl=ro&amp;sll=37.0625,-95.677068&amp;sspn=53.961216,114.169922&amp;hnear=Houston,+Harris,+Texas&amp;t=m&amp;z=5"
                   class="map_button radius8">View our location</a>

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