<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-file"></i> テーブルリスト</li>
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
                        <th>ID</th>
                        <th>テーブル名</th>
                        <th>テーブル説明</th>
                        <th>使用状況</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($area as $a): ?>
                        <tr>
                            <td><?= $a->area_id; ?></td>
                            <td><a href="/admin/master/selecttable/<?= $a->area_id; ?>"><?= $a->area_name; ?></a></td>
                            <td><?= $a->area_description; ?></td>
                            <td><?= ($a->use_yn == 'Y') ? "利用中" : "停止中"; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a type="button" class="btn btn-default" href="/admin/master/selecttable"><i class="fa fa-file-o"></i>&nbsp; 新規登録
            </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
