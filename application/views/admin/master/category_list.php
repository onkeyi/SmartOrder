<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-file"></i> カテゴリー管理</li>
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
                        <th>カテゴリー名</th>
                        <th>カテゴリー説明</th>
                        <th>使用状況</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($category as $c): ?>
                        <tr>
                            <td><?= $c->category_id; ?></td>
                            <td><a href="/admin/master/selectcategory/<?= $c->category_id; ?>"><?= $c->category_name; ?></a>
                            </td>
                            <td><?= $c->category_description; ?></td>
                            <td><?= ($c->use_yn == 'Y') ? "利用中" : "停止中"; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a type="button" class="btn btn-default" href="/admin/master/selectcategory"><i class="fa fa-file-o"></i>&nbsp; 新規登録
            </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

