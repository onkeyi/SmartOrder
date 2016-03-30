<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-dashboard"></i> <a href="/admin">TOP</a></li>
                <li class="active"><i class="fa fa-file"></i> データーインポート</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="panel panel-default">
        <div class="panel-heading">
            ファイルアップロード
        </div>
        <div class="panel-body">
            <form class="form-horizontal" method="post" id="csv_form" data-toggle="validator">

                <div class="form-group">
                    <!--                    <label for="category_name" class="col-sm-4 control-label">CSVファイル</label>-->
                    <div class="col-sm-12">
                        <input type="file" id="userfile" name="userfile" data-preview-file-type="csv">
                    </div>
                </div>
                <div class="form-group">
                    <label for="category_name" class="col-sm-4 control-label"> テーブル情報</label>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" onclick="uploadcsv('table');"><i class="fa fa-upload"></i> UPLOAD</button>
                        <a role="button" class="btn btn-default" href="/assets/table.csv"><i class="fa fa-download"></i> SAMPLE</a>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category_name" class="col-sm-4 control-label">メニュー情報 (csv)</label>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" onclick="uploadcsv('menu');"><i class="fa fa-upload"></i> UPLOAD</button>
                        <a role="button" class="btn btn-default" href="/assets/menu.csv"><i class="fa fa-download"></i> SAMPLE</a>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category_name" class="col-sm-4 control-label">在庫情報 (csv)</label>

                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" onclick="uploadcsv('user');"><i class="fa fa-upload"></i> UPLOAD</button>
                        <a role="button" class="btn btn-default" href="/assets/user.csv"><i class="fa fa-download"></i> SAMPLE</a>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category_name" class="col-sm-4 control-label">ユーザー情報 (csv)</label>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" onclick="uploadcsv('user');"><i class="fa fa-upload"></i> UPLOAD</button>
                        <a role="button" class="btn btn-default" href="/assets/user.csv"><i class="fa fa-download"></i> SAMPLE</a>
                    </div>
                </div>

                <div class="form-group">
                    <label for="category_name" class="col-sm-4 control-label">メニューイメージ (zip) 140X140 px</label>
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default" onclick="uploadzip();"><i class="fa fa-upload"></i> UPLOAD
                        </button>
                        <a role="button" class="btn btn-default" href="/assets/user.csv"><i class="fa fa-download"></i> SAMPLE</a>
                    </div>

                </div>
            </form>

        </div>
    </div>
    <div class="panel-footer">
        <div class="col-lg-4">
            <span id="message">ステータス</span>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script language="javascript">
    $("#userfile").fileinput({showUpload: false, showCaption: true, allowedFileExtensions: ['csv', 'zip']});
</script>