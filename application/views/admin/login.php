<!DOCTYPE html>
<html lang="ja">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="generator" content="Bootply"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="/assets/css/bootstrap.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href="/assets/css/login.css" rel="stylesheet">
</head>
<body>
<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="text-center">LOGIN</h3>
            </div>
            <div class="modal-body">
                <form class="form col-md-12 center-block" data-toggle="validator">
                    <div class="form-group">
                        <input type="text" id="user_id" class="form-control input-lg" placeholder="User ID" required>
                        <span class="help-block with-errors">ユーザーID</span>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" class="form-control input-lg" placeholder="Password"
                               required>
                        <span class="help-block with-errors">パスワード</span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-lg btn-block" onclick="login(this,event);">ログイン</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-md-12">
                    <a href="#">HELP</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- script references -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/validator.min.js"></script>
<script language="javascript">
    function login(sender,e) {
        e.preventDefault();
        var uid = $('#user_id').val();
        var pwd = $('#password').val();
        if (uid == '') {
            //alert('ユーザーIDを入力してください。');
            return;
        }
        if (pwd == '') {
            //alert('パスワードを入力してください。');
            return;
        }
        $.ajax({
            url: "/welcome/loginapi",
            type: 'POST',
            dataType: 'json',
            data: {
                user_id: uid,
                password: pwd
            },
            timeout: 10000,
            success: function (data) {
                console.log(data);
                location.reload(true);
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log('ERROR',XMLHttpRequest,textStatus,errorThrown);
                location.reload(true);
            }
        });

    }
</script>
</body>
</html>