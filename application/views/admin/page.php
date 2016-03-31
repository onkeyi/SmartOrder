<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">

    <title>SMART ORDER</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="/assets/css/bootstrap.css" rel="stylesheet"/>
    <link href="/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="/assets/css/bootstrap-dialog.min.css" rel="stylesheet">
    <!-- FONTAWESOME STYLES-->
    <link href="/assets/css/font-awesome.css" rel="stylesheet"/>
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet"/>
    <!-- CUSTOM STYLES-->
    <link href="/assets/css/custom.css" rel="stylesheet"/>
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <link href="/assets/js/fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css"/>
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
            <a class="navbar-brand" href="#" onclick="location.href='/admin';">SMART ORDER</a>
        </div>
        <?php if ($this->session->userdata('userdata')) : ?>
        <div
            style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> <?php echo $this->session->userdata('userdata')->user_name; ?>
            &nbsp;
            <button onclick="logout();" class="btn btn-danger square-btn-adjust">ログアウト</button><?php endif; ?>
        </div>
    </nav>
    <?php if ($this->session->userdata('userdata')) : ?>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <!--                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>-->
                    </li>
                    <li><a href="/admin/sessions/reservation"><i class="fa fa-desktop fa-lg"></i> 予約管理</a></li>
                    <li><a href="/admin/sessions/table"><i class="fa fa-qrcode fa-lg"></i> テーブル管理</a></li>
                    <li><a href="/admin/sessions/orderlist"><i class="fa fa-shopping-cart fa-lg"></i> 注文管理</a></li>
                    <li><a href="#"><i class="fa fa-bar-chart-o fa-lg"></i> 売上管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="/admin/sessions/orderlist"><i class="fa fa-line-chat"></i> 日別売上</a></li>
                            <li><a href="/admin/sessions/orderlist"><i class="fa fa-pie-chat"></i> 品別売上</a></li>
                        </ul>
                    </li>
                    <li><a href="/admin/sessions/orderlist"><i class="fa fa-search  fa-lg"></i> 在庫情報</a></li>
                    <li><a href="/admin/user/attendancelist"><i class="fa fa-clock-o fa-lg"></i> 勤怠管理</a></li>
                    <?php if ($this->session->userdata('userdata')->group == 1) : ?>
                        <li><a href="#"><i class="fa fa-cog fa-lg"></i> 設定<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="/admin/master/tablelist"><i class="fa fa-table"></i>&nbsp;テーブル</a></li>
                                <li><a href="/admin/master/categorylist"><i class="fa fa-edit"></i>&nbsp;カテゴリー</a></li>
                                <li><a href="/admin/master/menulist"><i class="fa fa-bars"></i>&nbsp;メニュー</a></li>
                                <li><a href="/admin/master/clientlist"><i class="fa fa-cutlery"></i>&nbsp;店舗情報</a></li>
                                <li><a href="/admin/master/userlist"><i class="fa fa-user"></i>&nbsp;ユーザー</a></li>
                                <li><a href="/admin/master/languagelist"><i class="fa fa-globe"></i>&nbsp;言語</a></li>
                                <li><a href="/admin/master/csvupload"><i class="fa fa-cloud-upload"></i>&nbsp;インポート</a>
                                </li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <li><a href="/admin/help"><i class="fa fa-question fa-lg"></i> HELP </a></li>
                </ul>
            </div>
        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            <?php $weekday = array("日", "月", "火", "水", "木", "金", "土"); ?>
                            <?php echo date('Y年m月d日') . " (" . $weekday[date('w')] . ")" ?>
                            <small><?php echo date('H:i') . '現在' ?></small>
                        </h1>
                        <div class="row">
                            <div class="col-md-4">売上合計</div>
                            <div class="col-md-4">客数</div>
                            <div class="col-md-4">客単価</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <h2 class="text-center">2000
                                    <small>円</small>
                                </h2>
                            </div>
                            <div class="col-md-4">
                                <h2 class="text-center">５
                                    <small>名</small>
                                </h2>
                            </div>
                            <div class="col-md-4">
                                <h2 class="text-center">54
                                    <small>円</small>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>予約テーブル</th>
                                    <th>予約メニュー</th>
                                    <th>予約時間</th>
                                    <th>メモ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($reservation as $a): ?>
                                    <tr>
                                        <td>
                                            <a href="/admin/sessions/reservationreg/<?= $a->reservation_id; ?>"><?= $a->reservation_id; ?></a>
                                        </td>
                                        <td>
                                            <a href="/admin/sessions/reservationreg/<?= $a->reservation_id; ?>"><?= $a->area_name; ?></a>
                                        </td>
                                        <td><?= $a->menu_name ?></td>
                                        <td><?= $a->reservation_date; ?></td>
                                        <td><?= $a->reservation_memo; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    <?php endif; ?>
    <!-- /. PAGE WRAPPER  -->
    <span><i class="fa fa-copyright"></i>Copyright @ <a href="http://onkeyi.github.com/SmartOrder">Smart Order</a></span>
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
<?php if ($this->session->userdata('userdata')) : ?>
    <!-- customer javascript -->
    <script src="/admin/js/src/user.js?var=<?= time() ?>"></script>
<?php if ($this->session->userdata('userdata')->group == 1) : ?>
    <script src="/admin/js/src/admin.js?var=<?= time() ?>"></script>
<?php endif; ?>
<?php endif; ?>
</body>
</html>