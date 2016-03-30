<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-file"></i><a href="/admin/master/menulist"> メニューリスト</a></li>
                <li class="active"><i class="fa fa-file"></i> メニュー詳細</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="panel panel-default">
        <div class="panel-heading">
            編集
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="" id="menu_form" data-toggle="validator">
                <div class="form-group">
                    <label for="category" class="col-sm-2 control-label">カテゴリー</label>

                    <div class="col-sm-6">
                        <select class="form-control" name="category_id">
                            <?php foreach ($category as $c): ?>
                                <option
                                    value="<?= $c->category_id; ?>" <?php if (isset($category_id)) :?><?= $category_id == $c->category_id ? ' selected' : ''; ?><?php endif;?>><?= $c->category_name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" id="menu_id" name="menu_id" value="<?= $menu_id; ?>">
                    <input type="hidden" name="main_image" id="main_image" value="<?= $main_image; ?>">
                    <label for="menu_name" class="col-sm-2 control-label">メニュー名</label>

                    <div class="col-sm-7">
                        <?php $flag = false; ?>
                        <?php foreach ($lang as $l): ?>
                            <?php foreach ($menu_names as $an): ?>
                                <?php if ($an->language_id == $l->language_id) : ?>
                                    <div class="form-group">
                                        <label for="area_name"
                                               class="col-sm-2 control-label"><?= $l->language_description; ?></label>

                                        <div class="col-sm-8">
                                            <input type="text" size='20' class="form-control" name="menu_name"
                                                   id="menu_name"
                                                   value="<?= $an->menu_name; ?>"
                                                   placeholder="<?= $l->language_description; ?>"
                                                   required>
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

                                <div class="col-sm-8">
                                    <input type="text" size='20' class="form-control" name="menu_name" id="menu_name"
                                           value=""
                                           placeholder="<?= $l->language_description; ?>">
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price" class="col-sm-2 control-label">価格</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="price" id="price" value="<?= $price; ?>"
                               placeholder="価格">
                    </div>
                </div>
                <div class="form-group">
                    <label for="userfile" class="col-sm-2 control-label">メイン画像</label>

                    <div class="col-sm-6">
                        <?php if (!empty($main_image)): ?>
                            <div class="thumbnail"><img src="http://smart.nazo.cc/static/upload/<?= $main_image ?>" alt=""
                                                        class="img-thumbnail" style="width:140px;height:140px">
                            </div>
                        <?php endif; ?>
                        <input type="file" id="userfile" name="userfile" id="userfile" />
                    </div>

                </div>
                <div class="form-group">
                    <label for="menu_description" class="col-sm-2 control-label">メニュー説明</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="menu_description" name="menu_description"
                               value="<?= $menu_description; ?>"
                               placeholder="メニュー説明">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-6">
                        <div class="checkbox">
                            <label>
                                <input id="recommend_yn" name="recommend_yn"
                                       type="checkbox" >
                                推薦メニュー
                            </label>
                        </div>
                    </div>
                </div>
                <?php if (isset($menu_id)): ?>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <div class="checkbox">
                                <label>
                                    <input id="use_yn" name="use_yn"
                                           type="checkbox" <?= $use_yn == 'Y' ? 'checked' : "" ?>>
                                    利用　（チェックすると利用可能）
                                </label>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="button" onclick="upload();" class="btn btn-default"><i class="fa fa-floppy-o"></i>&nbsp; 保存</button>
                        <button type="button" onclick="deletemenu();" class="btn btn-default"><i class="fa fa-trash-o"></i>&nbsp; 削除</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</>
<!-- /.container-fluid -->
<script language="javascript">
    //$("#userfile").fileinput();
    // with plugin options
    $("#userfile").fileinput({showUpload:false,showCaption: true,allowedFileExtensions : ['jpg','png']  });
</script>
<!-- /.container-fluid -->
