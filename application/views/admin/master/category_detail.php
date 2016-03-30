<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-file"></i><a href="/admin/master/categorylist"> カテゴリーリスト</a></li>
                <li class="active"><i class="fa fa-file"></i> カテゴリー詳細</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="panel panel-default">
        <div class="panel-heading">
            編集
        </div>
        <div class="panel-body">
            <form class="form-horizontal" data-toggle="validator" role="form">
                <div class="form-group">
                    <input type="hidden" id="category_id" value="<?= $category_id; ?>">
                    <label for="area_name" class="col-sm-2 control-label">カテゴリー名</label>
                    <div class="col-sm-8">
                        <?php $flag = false; ?>
                        <?php foreach ($lang as $l): ?>
                            <?php foreach ($category_names as $an): ?>
                                <?php if ($an->category_language_id == $l->language_id) : ?>
                                    <div class="form-group">
                                        <label for="area_name"
                                               class="col-sm-2 control-label"><?= $l->language_description; ?></label>

                                        <div class="col-sm-6">
                                            <input type="text" maxlength="10" class="form-control" name="category_name"
                                                   id="category_name"
                                                   value="<?= $an->category_name; ?>"
                                                   placeholder="<?= $l->language_description; ?>"
                                                   required>
                                            <span class="help-block with-errors">10文字以内</span>
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
                                    <input type="text" size='20' class="form-control" name="category_name"
                                           id="category_name"
                                           value=""
                                           placeholder="<?= $l->language_description; ?>"
                                        required>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="category_description" class="col-sm-2 control-label">カテゴリー説明</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="category_description"
                               value="<?= $category_description; ?>" placeholder="カテゴリー説明" required>
                        <span class="help-block with-errors">カテゴリーの説明</span>
                    </div>
                </div>
                <?php if (isset($category_id)): ?>
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
                    <div class="col-sm-offset-2 col-sm-8">
                        <button type="button" onclick="savecategory()" class="btn btn-default"><i class="fa fa-floppy-o"></i>&nbsp; 保存</button>
                        <button type="button" onclick="deletecategory()" class="btn btn-default"><i class="fa fa-trash-o"></i>&nbsp; 削除</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
