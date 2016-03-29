<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>SMART ORDER</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="/assets/css/bootstrap.css" rel="stylesheet"/>
    <link href="/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-dialog.min.css" rel="stylesheet">
    <!-- FONTAWESOME STYLES-->
    <link href="/assets/css/font-awesome.css" rel="stylesheet"/>
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="/assets/css/custom.css" rel="stylesheet"/>
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <link href="/assets/js/fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/welcome/top">SMART ORDER</a>
        </div>
        <?php if ($this->session->userdata('userdata')) :?><div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> <?php echo $this->session->userdata('userdata')->user_name; ?> &nbsp; <button onclick="logout();" class="btn btn-danger square-btn-adjust">ログアウト</button><?php endif;?>
        </div>
    </nav>
    <?php if ($this->session->userdata('userdata')) :?>
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center">
                    <!--                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>-->
                </li>
                <li><a href="/welcome/top"><i class="fa fa-dashboard fa-lg"></i> TOP</a></li>
                <li><a href="/sessions/reservation" ><i class="fa fa-desktop fa-lg"></i> 予約管理</a></li>
                <li><a href="/sessions/table" ><i class="fa fa-qrcode fa-lg"></i> テーブル管理</a></li>
                <li><a href="/sessions/orderlist"><i class="fa fa-shopping-cart fa-lg"></i> 注文管理</a></li>
                <li><a href="#" ><i class="fa fa-bar-chart-o fa-lg"></i> 売上管理<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="/sessions/orderlist"><i class="fa fa-line-chat"></i> 日別売上</a></li>
                        <li><a href="/sessions/orderlist"><i class="fa fa-pie-chat"></i> 品別売上</a></li>
                    </ul>
                </li>
                <li><a href="/sessions/orderlist"><i class="fa fa-search  fa-lg"></i> 在庫情報</a></li>
                <li><a href="/user/attendancelist"><i class="fa fa-clock-o fa-lg"></i> 勤怠管理</a></li>
                <?php if ($this->session->userdata('userdata')->group == 1) : ?>
                <li><a href="#"><i class="fa fa-cog fa-lg"></i> 設定<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="/master/tablelist"><i class="fa fa-table"></i>&nbsp;テーブル</a></li>
                        <li><a href="/master/categorylist"><i class="fa fa-edit"></i>&nbsp;カテゴリー</a></li>
                        <li><a href="/master/menulist"><i class="fa fa-bars"></i>&nbsp;メニュー</a></li>
                        <li><a href="/master/clientlist"><i class="fa fa-cutlery"></i>&nbsp;店舗情報</a></li>
                        <li><a href="/master/userlist"><i class="fa fa-user"></i>&nbsp;ユーザー</a></li>
                        <li><a href="/master/languagelist"><i class="fa fa-globe"></i>&nbsp;言語</a></li>
                        <li><a href="/master/csvupload"><i class="fa fa-cloud-upload"></i>&nbsp;インポート</a></li>
                    </ul>
                </li>
                <?php endif;?>
                <li><a href="/help"><i class="fa fa-question fa-lg"></i> HELP </a></li>
            </ul>
        </div>
    </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    welcome .
                </div>
            </div>
            <hr>
        </div>
    </div>
    <?php endif;?>
    <!-- /. PAGE WRAPPER  -->
    <span><i class="fa fa-copyright"></i>Copyright @ Smart Order</span>
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="/assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="/assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="/assets/js/jquery.metisMenu.js"></script>

<script src="/assets/js/jquery.ajaxfileupload.js"></script>

<script src="/assets/js/moment.min.js"></script>

<script src="/assets/js/morris/morris.js"></script>

<script src="/assets/js/validator.min.js"></script>

<script src="/assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="/assets/js/bootstrap-waitingfor.min.js"></script>
<script src="/assets/js/bootstrap-dialog.min.js"></script>

<script src="/assets/js/fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
<script src="/assets/js/fileinput/js/fileinput.min.js"></script>
<?php if ($this->session->userdata('userdata')) :?>
<!-- customer javascript -->
<script src="/js/src/user.js"></script>
<?php if ($this->session->userdata('userdata')->group == 1) : ?>
<script src="/js/src/admin.js"></script>
<?php endif;?>
<?php endif;?>
</body>
</html>