<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li><i class="fa fa-file"></i><a href="/admin/master/languagelist"> 店舗情報</a></li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="panel panel-default">
        <div class="panel-heading">
            情報
        </div>
        <div class="panel-body">
                <form class="form-horizontal" name="client_form" id="client_form"  data-toggle="validator">
                    <div class="form-group">
                        <input type="hidden" id="language_id" value="<?= $no; ?>">
                        <label for="client_name" class="col-sm-2 control-label">店舗名</label>

                        <div class="col-sm-4">
                            <input type="text" size='20' class="form-control" id="client_name" name="client_name"
                                   value="<?= $client_name; ?>"
                                   placeholder="店舗名" required>
                            <span class="help-block with-errors">店舗名を入力してください。</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="logo" class="col-sm-2 control-label">ロゴ</label>

                        <div class="col-sm-4 thumbnail" >
                            <input type="file" name="userfile" id="userfile">
                            <img src="<?= $logo_image; ?>">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="postcode" class="col-sm-2 control-label">郵便</label>

                        <div class="col-sm-4">
                            <input type="text" size='20' class="form-control" id="postcode" name="postcode"
                                   value="<?= $postcode; ?>"
                                   placeholder="郵便" >
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="address" class="col-sm-2 control-label">住所</label>

                        <div class="col-sm-4">
                            <input type="text" size='20' class="form-control" id="address" name="address"
                                   value="<?= $address; ?>"
                                   placeholder="店舗住所" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address2" class="col-sm-2 control-label">住所2</label>

                        <div class="col-sm-4">
                            <input type="text" size='20' class="form-control" id="address2" name="address2"
                                   value="<?= $address; ?>"
                                   placeholder="店舗住所" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tel" class="col-sm-2 control-label">電話</label>

                        <div class="col-sm-4">
                            <input type="text" size='20' class="form-control" id="tel" name="tel"
                                   value="<?= $tel; ?>"
                                   placeholder="電話" >
                        </div>

                    </div>
                </form>
            <button type="button" class="btn btn-default" onclick="uploadclient();"><i class="fa fa-floppy-o"></i>&nbsp; 保存</button>
        </div>
    </div>
</div>
<script language="javascript">
    //$("#userfile").fileinput();
    // with plugin options
    $("#userfile").fileinput({showUpload:false,showCaption: true,allowedFileExtensions : ['jpg','png']  });
</script>
<!-- /.container-fluid -->
