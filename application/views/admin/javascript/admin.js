/**
 * Created by admin on 15/11/24.
 */

function saveuser() {
    var user_no = $("#user_no").val();
    var user_id = $("#user_id").val();
    var user_name = $("#user_name").val();
    var password = $("#password").val();
    var password_confirm = $("#password_confirm").val();
    var group = $("#group").val();
    var use_yn = $("#use_yn:checked").val() ? 'Y' : 'N';

    if (user_name == '') {
        BootstrapDialog.alert('ユーザー名を入力してください。');
        return;
    }

    if (user_id == '') {
        BootstrapDialog.alert('ユーザーIDを入力してください。');
        return;
    }
    if (user_no == '') {
        if (password == '') {
            BootstrapDialog.alert('パスワードを入力してください。');
            return;
        }

        if (password_confirm == '') {
            BootstrapDialog.alert('確認パスワードを入力してください。');
            return;
        }

        if (password != password_confirm) {
            BootstrapDialog.alert('パスワードと確認パスワードが違います。');
            return;
        }

    } else {
        if (password != '' && password != password_confirm) {
            BootstrapDialog.alert('パスワードと確認パスワードが違います。');
            return;
        }
    }

    $.post("/api/saveuser", {
        user_no: user_no,
        user_id: user_id,
        user_name: user_name,
        password: password,
        group: group,
        use_yn: use_yn
    }).done(function (data) {
        console.log(data);
        if (data.result == 'OK') {
            BootstrapDialog.alert({
                title: 'お知らせ',
                message: '保存完了しました。',
                callback: function (result) {
                    $.ajax({
                        url: '/master/userlist'
                        , success: function (response) {
                            $('#page-wrapper').html(response);
                        }
                    });
                }
            });
        } else {
            BootstrapDialog.alert("保存失敗！");
            console.log(data);
        }
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.log('ERROR', jqXHR, textStatus, errorThrown);
    });
}

function deleteuser() {
    BootstrapDialog.confirm('本当に削除しますか？', function (result) {
        if (!result) return;

        var user_id = $("#user_no").val();
        $.post("/api/deleteuser", {
            user_no: user_id
        }).done(function (data) {
            if (data.result == 'OK') {
                BootstrapDialog.alert({
                    title: 'お知らせ',
                    message: '保存完了しました。',
                    callback: function (result) {
                        $.ajax({
                            url: '/master/userlist'
                            , success: function (response) {
                                $('#page-wrapper').html(response);
                            }
                        });
                    }
                });
            } else {
                BootstrapDialog.alert("保存失敗！");
                console.log(data);
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.log('ERROR', jqXHR, textStatus, errorThrown);
        });
    });
}

function savearea() {
    var area_id = $("#area_id").val();
    var area_name = [];//$("#area_name").val();
    var area_description = $("#area_description").val();
    var use_yn = $("#use_yn:checked").val() ? 'Y' : 'N';

    $('[name="area_name"]').each(function () {
        area_name.push($(this).val());
    });

    if (area_name == '') {
        BootstrapDialog.alert('テーブル名を入力してください。');
        return;
    }

    if (area_description == '') {
        BootstrapDialog.alert('テーブル説明を入力してください。');
        return;
    }

    $.post("/api/savearea", {
        area_id: area_id,
        area_name: area_name,
        area_description: area_description,
        use_yn: use_yn
    }).done(function (data) {
        if (data.result == 'OK') {
            BootstrapDialog.alert({
                title: 'お知らせ',
                message: '保存完了しました。',
                callback: function (result) {
                    $.ajax({
                        url: '/master/tablelist'
                        , success: function (response) {
                            $('#page-wrapper').html(response);
                        }
                    });
                }
            });
        } else {
            BootstrapDialog.alert("保存失敗！");
        }
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.log('ERROR', jqXHR, textStatus, errorThrown);
    });
};


function deletearea() {
    BootstrapDialog.confirm('本当に削除しますか？', function (result) {
        if (!result) return;

        var area_id = $("#area_id").val();

        $.post("/api/deletearea", {area_id: area_id})
            .done(function (data) {
                if (data.result == 'OK') {
                    BootstrapDialog.alert({
                        title: 'お知らせ',
                        message: '削除完了しました。',
                        callback: function (result) {
                            $.ajax({
                                url: '/master/tablelist'
                                , success: function (response) {
                                    $('#page-wrapper').html(response);
                                }
                            });
                        }
                    });

                } else {
                    BootstrapDialog.alert("削除失敗！");
                    console.log(data);
                }
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log('ERROR', jqXHR, textStatus, errorThrown);
            });
    });
};


function savecategory() {
    var category_id = $("#category_id").val();
    var category_name = [];// $("#category_name").val();
    var category_description = $("#category_description").val();
    var use_yn = $("#use_yn:checked").val() ? 'Y' : 'N';


    $('[name="category_name"]').each(function () {
        category_name.push($(this).val());
    });

    if (category_name == '') {
        BootstrapDialog.alert('カテゴリー名を入力してください。');
        return;
    }
    if (category_description == '') {
        BootstrapDialog.alert('カテゴリー説明を入力してください。');
        return;
    }


    $.post("/api/savecategory", {
        category_id: category_id,
        category_name: category_name,
        category_description: category_description,
        use_yn: use_yn
    }).done(function (data) {
        if (data.result == 'OK') {
            BootstrapDialog.alert({
                title: 'お知らせ',
                message: '保存完了しました。',
                callback: function (result) {
                    $.ajax({
                        url: '/master/categorylist'
                        , success: function (response) {
                            $('#page-wrapper').html(response);
                        }
                    });
                }
            });

        } else {
            BootstrapDialog.alert("保存失敗！");
            console.log(data);
        }
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.log('ERROR', jqXHR, textStatus, errorThrown);
    });
};

function deletecategory() {
    BootstrapDialog.confirm('本当に削除しますか？', function (result) {
        if (!result) return;

        var category_id = $("#category_id").val();

        $.post("/api/deletecategory", {category_id: category_id})
            .done(function (data) {
                if (data.result == 'OK') {
                    BootstrapDialog.alert({
                        title: 'お知らせ',
                        message: '削除完了しました。',
                        callback: function (result) {
                            $.ajax({
                                url: '/master/categorylist'
                                , success: function (response) {
                                    $('#page-wrapper').html(response);
                                }
                            });
                        }
                    });

                } else {
                    BootstrapDialog.alert("削除失敗！");
                    console.log(data);
                }
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.log('ERROR', jqXHR, textStatus, errorThrown);
            });
    });
};


function upload() {
    var form = $('#menu_form').get()[0];
    var formData = new FormData(form);
    var menu_name = [];

    $('[name="menu_name"]').each(function () {
        menu_name.push($(this).val());
    });

    if ($('#menu_name').val() == '') {
        BootstrapDialog.alert("メニュー名を入力してください。");
        return;
    }

    if ($('#price').val() == '') {
        BootstrapDialog.alert("価格を入力してください。");
        return;
    }

    if ($('#menu_description').val() == '') {
        BootstrapDialog.alert("メニュー説明を入力してください。");
        return;
    }

    if ($('#main_image').val() == '') {
        if ($('#userfile').val() == '') {
            BootstrapDialog.alert("画像を選択してください。");
            return;
        }
    }

    formData.append('menu_name', menu_name);

    // Ajaxで送信
    $.ajax({
        url: '/api/uploadfile',
        method: 'post',
        dataType: 'json',
        data: formData,
        // Ajaxがdataを整形しない指定
        processData: false,
        // contentTypeもfalseに指定
        contentType: false
    }).done(function (res) {
        if (res.result = "OK") {
            BootstrapDialog.alert({
                title: 'お知らせ',
                message: '保存完了しました。',
                callback: function (result) {
                    $.ajax({
                        url: '/master/menulist'
                        , success: function (response) {
                            $('#page-wrapper').html(response);
                        }
                    });
                }
            });
        } else {
            BootstrapDialog.alert(result.status);
        }
        console.log('SUCCESS', res);
    }).fail(function (jqXHR, textStatus, errorThrown) {
        // しっぱい！
        console.log('ERROR', jqXHR, textStatus, errorThrown);
    });
}

function deletemenu() {

}


function savelanguage() {
    var language_id = $("#language_id").val();
    var language_name = $("#language_name").val();
    var language_description = $("#language_description").val();
    var use_yn = $("#use_yn:checked").val() ? 'Y' : 'N';

    if (language_name == '') {
        BootstrapDialog.alert('言語名を入力してください。');
        return;
    }

    if (language_description == '') {
        BootstrapDialog.alert('言語説明を入力してください。');
        return;
    }

    $.post("/api/savelanguage", {
        language_id: language_id,
        language_name: language_name,
        language_description: language_description,
        use_yn: use_yn
    }).done(function (data) {
        if (data.result == 'OK') {
            //alert("保存完了");
            BootstrapDialog.alert({
                title: 'お知らせ',
                message: '保存完了しました。',
                callback: function (result) {
                    $.ajax({
                        url: '/master/languagelist'
                        , success: function (response) {
                            $('#page-wrapper').html(response);
                        }
                    });
                }
            });
        } else {

            BootstrapDialog.alert("保存失敗！");
            console.log(data);
        }
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.log('ERROR', jqXHR, textStatus, errorThrown);
    });
}


function savereservation() {
    var reservation_id = $("#reservation_id").val();
    var reservation_area_id = $("#reservation_area_id").val();
    var reservation_menu_id = $("#reservation_menu_id").val();
    var reservation_date = $("#reservation_date").val();
    var reservation_number = $("#reservation_number").val();
    var reservation_memo = $("#reservation_memo").val();

    if (reservation_area_id == '') {
        BootstrapDialog.alert('テーブルを選択してください');
        return;
    }

    if (reservation_menu_id == '') {
        BootstrapDialog.alert('メニューを選択してください。');
        return;
    }

    if (reservation_date == '') {
        BootstrapDialog.alert('日付を選択してください。');
        return;
    }

    $.post("/api/savereservation", {
        reservation_id: reservation_id,
        reservation_area_id: reservation_area_id,
        reservation_menu_id: reservation_menu_id,
        reservation_date: reservation_date,
        reservation_memo: reservation_memo
    }).done(function (data) {
        console.log(data);
        if (data.result == 'OK') {
            BootstrapDialog.alert({
                title: 'お知らせ',
                message: '保存完了しました。',
                callback: function (result) {
                    $.ajax({
                        url: '/sessions/reservation'
                        , success: function (response) {
                            $('#page-wrapper').html(response);
                        }
                    });
                }
            });
        } else {
            BootstrapDialog.alert("保存失敗！");
            console.log(data);
        }
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.log('ERROR', jqXHR, textStatus, errorThrown);
    });
}


function uploadclient() {
    var form = $('#client_form').get()[0];
    var formData = new FormData(form);


    if ($('#client_name').val() == '') {
        BootstrapDialog.alert("店舗名を入力してください。");
        return;
    }

    if ($('#address').val() == '') {
        BootstrapDialog.alert("住所を入力してください。");
        return;
    }

    if ($('#address2').val() == '') {
        BootstrapDialog.alert("住所かなを入力してください。");
        return;
    }

    if ($('#userfile').val() == '') {
        BootstrapDialog.alert("画像を選択してください。");
        return;
    }

    // Ajaxで送信
    $.ajax({
        url: '/api/uploadLogoFile',
        method: 'post',
        dataType: 'json',
        data: formData,
        // Ajaxがdataを整形しない指定
        processData: false,
        // contentTypeもfalseに指定
        contentType: false
    }).done(function (res) {
        if (res.result = "OK") {
            BootstrapDialog.alert({
                title: 'お知らせ',
                message: '保存完了しました。',
                callback: function (result) {
                    $.ajax({
                        url: '/master/clientlist'
                        , success: function (response) {
                            $('#page-wrapper').html(response);
                        }
                    });
                }
            });
        } else {
            BootstrapDialog.alert(result.status);
        }
        console.log('SUCCESS', res);
    }).fail(function (jqXHR, textStatus, errorThrown) {
        // しっぱい！
        console.log('ERROR', jqXHR, textStatus, errorThrown);
    });
}


function uploadcsv(action) {
    var file = $('#userfile').val();
    if (file == '') {
        BootstrapDialog.alert("ファイルを選択してください。");
        return;
    }
    var form = $('#csv_form').get()[0];
    var formData = new FormData(form);
    // Ajaxで送信
    waitingDialog.show('処理中', {dialogSize: 'sm', progressType: 'warning'});
    $.ajax({
        url: '/api/uploadcsv/' + action,
        method: 'post',
        dataType: 'html',
        data: formData,
        // Ajaxがdataを整形しない指定
        processData: false,
        // contentTypeもfalseに指定
        contentType: false
    }).done(function (res) {
        console.log('SUCCESS', res);
        waitingDialog.hide();
        $("#message").append('<p>' + res + '<p>');
        $("#userfile").val("");
    }).fail(function (jqXHR, textStatus, errorThrown) {
        waitingDialog.hide();
        $("#message").append('<b>' + errorThrown + '<b><br />');
        console.log('ERROR', jqXHR, textStatus, errorThrown);
        $("#userfile").val("");
    });
}


function uploadzip() {
    var file = $('#userfile').val();
    if (file == '') {
        BootstrapDialog.alert("ファイルを選択してください。");
        return;
    }
    var form = $('#csv_form').get()[0];
    var formData = new FormData(form);
    // Ajaxで送信
    waitingDialog.show('処理中', {dialogSize: 'sm', progressType: 'warning'});
    $.ajax({
        url: '/api/uploadzip/',
        method: 'post',
        dataType: 'html',
        data: formData,
        // Ajaxがdataを整形しない指定
        processData: false,
        // contentTypeもfalseに指定
        contentType: false
    }).done(function (res) {
        console.log('SUCCESS', res);
        waitingDialog.hide();
        $("#message").append('<p>' + res + '<p>');
        $("#userfile").val("");
    }).fail(function (jqXHR, textStatus, errorThrown) {
        waitingDialog.hide();
        $("#message").append('<b>' + errorThrown + '<b><br />');
        console.log('ERROR', jqXHR, textStatus, errorThrown);
        $("#userfile").val("");
    });
}