<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-file"></i> オーダー一覧</li>
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
                        <th>テーブル</th>
                        <th>メニュー</th>
                        <th>数量</th>
                        <th>オーダー時間</th>
                        <th>オーダー状況</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($orders as $a): ?>
                        <tr>

                            <td><?= $a->area_name; ?></td>
                            <td><?= $a->menu_name; ?></td>
                            <td><?= $a->quantity; ?></td>
                            <td><?= $a->date_created; ?></td>
                            <td><?= $a->order_status; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <nav>
        <ul class="pagination">
            <?= $this->pagination->create_links(); ?>
        </ul>
    </nav>
</div>
<!-- /.container-fluid -->
