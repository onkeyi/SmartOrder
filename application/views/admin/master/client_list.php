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
            <?php if (!empty($no)) : ?>
            <form class="form-horizontal">
                <div class="form-group">
                    <input type="hidden" id="language_id" value="<?= $no; ?>">
                    <label for="client_name" class="col-sm-2 control-label">店舗名</label>

                    <div class="col-sm-4">
                        <input type="text" size='20' class="form-control" id="client_name"
                               value="<?= $client_name; ?>"
                               placeholder="店舗名" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="logo" class="col-sm-2 control-label">ロゴ</label>

                    <div class="col-sm-4">
                        <img src="<?=$this->config->item('base_url');?>/static/upload/<?= $logo_image; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="postcode" class="col-sm-2 control-label">郵便</label>

                    <div class="col-sm-4">
                        <input type="text" size='20' class="form-control" id="postcode"
                               value="<?= $postcode; ?>"
                               placeholder="郵便" readonly>
                    </div>

                </div>

                <div class="form-group">
                    <label for="address" class="col-sm-2 control-label">住所</label>

                    <div class="col-sm-4">
                        <input type="text" size='20' class="form-control" id="address"
                               value="<?= $address; ?>"
                               placeholder="店舗住所" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address2" class="col-sm-2 control-label">住所2</label>

                    <div class="col-sm-4">
                        <input type="text" size='20' class="form-control" id="address2"
                               value="<?= $address; ?>"
                               placeholder="店舗住所" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tel" class="col-sm-2 control-label">電話</label>

                    <div class="col-sm-4">
                        <input type="text" size='20' class="form-control" id="tel"
                               value="<?= $tel; ?>"
                               placeholder="電話" readonly>
                    </div>

                </div>
            </form>
            <?php endif; ?>
            <a type="button" class="btn btn-default" href="/admin/master/selectclient"><i class="fa fa-file-o"></i>&nbsp; 新規登録</a>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
