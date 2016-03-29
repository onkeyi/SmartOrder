<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i> <a href="/">TOP</a></li>
                <li class="active"><i class="fa fa-file"></i> ユーザーリスト</li>
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
                        <th>No</th>
                        <th>ユーザーID</th>
                        <th>ユーザー名</th>
                        <th>グループ</th>
                        <th>利用状況</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $a): ?>
                        <tr>
                            <td><a href="/master/selectuser/<?=$a->user_no;?>"><?= $a->user_no; ?></td>
                            <td><?= $a->user_id; ?></td>
                            <td><?= $a->user_name; ?></td>
                            <td><?= $a->group; ?></td>
                            <td><?= ($a->use_yn == 'Y') ? "利用中" : "停止中"; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <a type="button" class="btn btn-default" href="/master/selectuser"><i class="fa fa-file-o"></i>&nbsp; 新規登録
            </a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
