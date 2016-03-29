<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-file"></i> 言語リスト</li>
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
                        <th>言語名</th>
                        <th>言語説明</th>
                        <th>利用状況</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($language as $l): ?>
                        <tr>
                            <td><a href="/master/selectlanguage/<?= $l->language_id; ?>"><?= $l->language_id; ?></a>
                            </td>
                            <td><a href="/master/selectlanguage/<?= $l->language_id; ?>"><?= $l->language_name; ?></a>
                            </td>
                            <td><?= $l->language_description; ?></td>
                            <td><?= ($l->use_yn == 'Y') ? "利用中" : "停止中"; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a type="button" class="btn btn-default" href="/master/selectlanguage"><i class="fa fa-file-o"></i>&nbsp; 新規登録
            </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

