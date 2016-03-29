<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-file"></i><a href="/master/userlist"> ユーザーリスト</a></li>
                <li class="active"><i class="fa fa-file"></i> ユーザー詳細</li>
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
                <input type="hidden" id="user_no" value="<?= $user_no; ?>">

                <div class="form-group">
                    <label for="user_id" class="col-sm-2 control-label">ユーザーID</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="user_id" value="<?= $user_id; ?>"
                               placeholder="ユーザーID" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_name" class="col-sm-2 control-label">ユーザー名</label>

                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="user_name" value="<?= $user_name; ?>"
                               placeholder="ユーザー名" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">パスワード</label>

                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="password" value=""
                               placeholder="パスワード">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">パスワード確認</label>

                    <div class="col-sm-6">
                        <input type="password" class="form-control" id="password_confirm" value=""
                               placeholder="パスワード確認">
                    </div>
                </div>
                <div class="form-group">
                    <label for="user_group" class="col-sm-2 control-label">所属グループ</label>

                    <div class="col-sm-6">
                        <select class="form-control" id="group">
                            <option value="1" <?= $group == 1 ? ' selected' : ''; ?>>最高管理者</option>
                            <option value="2" <?= $group == 2 ? ' selected' : ''; ?>>一般管理者</option>
                            <option value="3" <?= $group == 3 ? ' selected' : ''; ?>>一般社員</option>
                        </select>
                    </div>
                </div>
                <?php if (isset($user_no)): ?>
                    <div class="form-group">
                        <label for="area_name" class="col-sm-2 control-label">QRコード</label>

                        <div class="col-sm-6 thumbnail">
                            <img src="<?= $this->config->item('web_url') . 'static/upload/' . 'user_' . $user_no . '.png'; ?>">
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
                        <button type="button" onclick="saveuser()" class="btn btn-default"><i
                                class="fa fa-floppy-o"></i>&nbsp; 保存
                        </button>
                        <button type="button" onclick="deleteuser();" class="btn btn-default"><i
                                class="fa fa-trash-o"></i>&nbsp; 削除
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
