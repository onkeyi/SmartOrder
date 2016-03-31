<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-file"></i> 予約一覧</li>
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
                            <td><a href="/admin/sessions/reservationreg/<?= $a->reservation_id; ?>"><?= $a->area_name; ?></a>
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
    <p class="pagination"><?= $this->pagination->create_links(); ?></p>
    <a type="button" class="btn btn-default" href="/admin/sessions/reservationreg">新規登録</a>
</div>
<!-- /.container-fluid -->


