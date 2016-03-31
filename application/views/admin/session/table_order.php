<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-file"></i><a href="/admin/sessions/table"> テーブル利用状況</a></li>
                <li class="active"><i class="fa fa-file"></i> オーダー詳細</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>メニュー名</th>
                        <th>単価</th>
                        <th>数量</th>
                        <th>オーダー時間</th>
                        <th>オーダー状況</th>
                        <th>IP</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($orders as $a): ?>
                        <tr>
                            <td><?= $a->menu_name; ?></td>
                            <td><?= $a->price; ?></td>
                            <td><?= $a->quantity; ?></td>
                            <td><?= $a->date_created; ?></td>
                            <td><?= $a->order_status; ?></td>
                            <td><?= $a->updated_from_ip; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


