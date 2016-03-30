<div id="page-inner">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-file"></i> メニュー管理</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <?php $activeclass = " class='active'"; ?>
            <?php foreach ($category as $c): ?>
                <li role="presentation" <?= $activeclass ?>><a href="#category<?= $c->category_id; ?>"
                                                               aria-controls="home" role="tab"
                                                               data-toggle="tab"><?= $c->category_name; ?></a></li>
                <?php $activeclass = ''; ?>
            <?php endforeach; ?>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <?php $tapactive = " active"; ?>
            <?php foreach ($category as $c): ?>
                <div role="tabpanel" class="tab-pane <?= $tapactive; ?>" id="category<?= $c->category_id; ?>">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>イメージ</th>
                                <th>メニュー名</th>
                                <th>メニュー説明</th>
                                <th>使用状況</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($menu as $m): ?>
                                <?php if ($c->category_id != $m->category_id) continue; ?>
                                <tr>
                                    <td><?= $m->menu_id; ?></td>
                                    <td>
                                        <a class="thumbnail" href="/admin/master/selectmenu/<?= $m->menu_id; ?>"><?= empty($m->main_image) ? "" : "<img width='70' height='70' src='" . $this->config->item("base_url") . "/static/upload/" . $m->main_image . "'>"; ?></a>
                                    </td>
                                    <td><a href="/admin/master/selectmenu/<?= $m->menu_id; ?>"><?= $m->menu_name; ?></a></td>
                                    <td><?= $m->menu_description; ?></td>
                                    <td><?= $m->use_yn; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php $tapactive = ""; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <a type="button" class="btn btn-default" href="/admin/master/selectmenu"><i class="fa fa-file-o"></i>&nbsp; 新規登録
    </a>
</div>
<!-- /.container-fluid -->
