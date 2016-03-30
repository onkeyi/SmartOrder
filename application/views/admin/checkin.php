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
<div class="panel panel-default">
    <div class="panel-heading">
        勤怠 <p id="time"></p>
    </div>
    <div><?=$user_name?></div>
    <button>出勤</button>
    <button>退勤</button>
</div>
<!-- script references -->
<script src="/assets/js/jquery-1.10.2.js"></script>
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
            url: "/admin/welcome/loginapi",
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

<script type="text/javascript">
    $(function(){
        setInterval( function(){
            $("#time").text(Date());
        }, 1000);
    });
</script>
</body>
</html>