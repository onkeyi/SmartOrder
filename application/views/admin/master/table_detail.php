<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-file"></i><a href="/admin/master/tablelist"> テーブルリスト</a></li>
                <li class="active"><i class="fa fa-file"></i> テーブル詳細</li>
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
                <input type="hidden" id="area_id" value="<?= $area_id; ?>">

                <div class="form-group">
                    <label for="area_name" class="col-sm-2 control-label">テーブル名</label>

                    <div class="col-sm-8">
                        <?php $flag = false; ?>

                        <?php foreach ($lang as $l): ?>

                            <?php foreach ($area_names as $an): ?>
                                <?php if ($an->area_language_id == $l->language_id) : ?>
                                    <div class="form-group">
                                        <label for="area_name"
                                               class="col-sm-2 control-label"><?= $l->language_description; ?></label>

                                        <div class="col-sm-6">
                                            <input type="text" maxlength="10" class="form-control" name="area_name"
                                                   id="area_name"
                                                   value="<?= $an->area_name; ?>"
                                                   placeholder="<?= $l->language_description; ?>"
                                                   required>
                                            <span class="help-block">10文字以内</span>
                                        </div>
                                    </div>
                                    <?php $flag = true; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <?php if ($flag) {
                                $flag = false;
                                continue;
                            } ?>
                            <div class="form-group">
                                <label for="area_name"
                                       class="col-sm-2 control-label"><?= $l->language_description; ?></label>

                                <div class="col-sm-6">
                                    <input type="text" size='20' class="form-control" name="area_name" id="area_name"
                                           value=""
                                           placeholder="<?= $l->language_description; ?>">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="area_name" class="col-sm-2 control-label">テーブル説明</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="capacity" value=""
                               placeholder="定員">
                    </div>
                </div>

                <div class="form-group">
                    <label for="area_name" class="col-sm-2 control-label">テーブル説明</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="area_description" value="<?= $area_description; ?>"
                               placeholder="テーブル説明">
                    </div>
                </div>
                <?php if (isset($area_id)) : ?>
                    <div class="form-group">
                        <label for="area_name" class="col-sm-2 control-label">QRコード</label>

                        <div class="col-sm-6 thumbnail">
                            <img
                                src="<?= base_url("static/upload/talbe_" . $area_id . ".png"); ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <div class="checkbox">
                                <label>
                                    <input id="use_yn" type="checkbox" <?= $use_yn == 'Y' ? 'checked' : "" ?>>
                                    利用　（チェックすると利用可能）
                                </label>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                        <button type="button" onclick="savearea()" class="btn btn-default"><i
                                class="fa fa-floppy-o"></i>&nbsp; 保存
                        </button>
                        <button type="button" onclick="deletearea();" class="btn btn-default"><i
                                class="fa fa-trash-o"></i>&nbsp; 削除
                        </button>

                        <button type="button" onclick="printtableqr();" class="btn btn-default"><i
                                class="fa fa-trash-o"></i>&nbsp; QRコード印刷
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
