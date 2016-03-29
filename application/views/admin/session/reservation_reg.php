<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-file"></i><a href="/sessions/revervationlist"> 予約一覧</a></li>
                <li class="active"><i class="fa fa-file"></i> 予約詳細</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="panel panel-default">
        <div class="panel-heading">
            編集
        </div>
        <div class="panel-body">
            <form class="form-horizontal" data-toggle="validator">
                <div class="form-group">
                    <input type="hidden" id="reservation_id" value="<?= $reservation_id; ?>">
                    <label for="category_name" class="col-sm-2 control-label">予約日付</label>

                    <div class='col-sm-4'>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='text' class="form-control" id="reservation_date"
                                       value="<?= $reservation_date; ?>" required/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="language_description" class="col-sm-2 control-label">テーブル</label>

                    <div class="col-sm-4">
                        <select id="reservation_area_id">
                            <?php foreach ($areas as $a): ?>
                                <option
                                    value="<?= $a->area_id; ?>" <? $a->area_id == $reservation_area_id ? ' selected' : ''; ?>><?= $a->area_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="language_description" class="col-sm-2 control-label">メニュー</label>

                    <div class="col-sm-4">
                        <select id="reservation_menu_id">
                            <?php foreach ($menus as $m): ?>
                                <option
                                    value="<?= $m->menu_id; ?>" <? $m->menu_id == $reservation_menu_id ? ' selected' : ''; ?>><?= $m->menu_name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="language_description" class="col-sm-2 control-label">人数</label>

                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="reservation_number"
                               value="<?= $reservation_number; ?>" placeholder="人数" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="language_description" class="col-sm-2 control-label">メモ</label>

                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="reservation_memo"
                               value="<?= $reservation_memo; ?>" placeholder="カテゴリー説明">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4">
                        <button type="button" onclick="savereservation()" class="btn btn-default">保存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script language="javascript">
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        dayViewHeaderFormat: 'YYYY年MM月'
    });
</script>