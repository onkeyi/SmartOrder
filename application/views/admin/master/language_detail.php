<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-file"></i><a href="/admin/master/languagelist"> 言語リスト</a></li>
                <li class="active"><i class="fa fa-file"></i> 言語詳細</li>
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
                    <input type="hidden" id="language_id" value="<?= $language_id; ?>">
                    <label for="category_name" class="col-sm-2 control-label">言語名</label>

                    <div class="col-sm-4">
                        <input type="text" size='20' class="form-control" id="language_name"
                               value="<?= $language_name; ?>"
                               placeholder="言語名"
                               required>
                        <span class="help-block with-errors">言語名</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="language_description" class="col-sm-2 control-label">言語説明</label>

                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="language_description"
                               value="<?= $language_description; ?>" placeholder="言語説明">
                    </div>
                </div>
                <?php if (isset($language_id)): ?>
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
                        <button type="button" onclick="savelanguage()" class="btn btn-default"><i class="fa fa-floppy-o"></i>&nbsp; 保存</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
