<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-file"></i> 勤怠一覧</li>
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
                        <th>日付</th>
                        <th>ユーザー名</th>
                        <th>出勤</th>
                        <th>退勤</th>
                        <th>備考(出勤）</th>
                        <th>備考(退勤）</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($attendance as $a): ?>
                        <tr>
                            <td><?= $a->today; ?></td>
                            <td><?= $a->user_name; ?></td>
                            <td><?= $a->attendance_time; ?></td>
                            <td><?= $a->attendance_memo	; ?></td>
                            <td><?= $a->clock_out_time; ?></td>
                            <td><?= $a->clock_out_memo	; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <ul class="pagination">
        <?= $this->pagination->create_links(); ?>
    </ul>
</div>
<!-- /.container-fluid -->
