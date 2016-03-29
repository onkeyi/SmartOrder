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
    <div class="table-responsive">
        <?php echo $this->calendar->generate(); ?>
        <!-- /.row -->
    </div>
</div>
<!-- /.container-fluid -->

