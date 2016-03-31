<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-file"></i> テーブル利用状況</li>
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
                        <th>テーブル名</th>
                        <th>人数</th>
                        <th>開始時間</th>
                        <th>終了時間</th>
                        <th>オーダー状況</th>
                        <th>利用状況</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($areas as $a): ?>
                        <tr>
                            <td>
                                <a href="/admin/sessions/tabledetail/<?= $a->area_id ?>/<?= $a->session_id; ?>"><?= $a->area_name; ?></a>
                            </td>
                            <td><?= $a->area_count; ?></td>
                            <td><?= $a->area_start_date; ?></td>
                            <td><?= $a->area_end_date; ?></td>
                            <td><?= $a->total_amount; ?></td>
                            <td><?= ($a->area_close == 'Y') ? "終了" : "利用中"; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a type="button" class="btn btn-default" href="/admin/master/selecttable">新規登録
            </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


