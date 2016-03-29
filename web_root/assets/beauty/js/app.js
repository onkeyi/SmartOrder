/**
 * Created by onkeyi on 15/11/21.
 */


function showcookie() {
    alert('COOKIE :' + $.cookie('userid'));
}

function setUserCount(count) {

}

function addItem(menuId) {

    var posting = $.post('/api/add', {menu_id: menuId});
    posting.done(function (data) {
        if (data.result == 1) {
            $('#subcount' + menuId).text(data.subcount);
            $('#totalcount').text(data.totalcount);
        }
    });
}

function removeItem(menuId) {

    var posting = $.post('/api/remove', {menu_id: menuId});
    posting.done(function (data) {
        if (data.result == 1) {
            $('#subcount' + menuId).text(data.subcount);
            $('#totalcount').text(data.totalcount);
        }
    });
}


function order(areaId) {
    var posting = $.post('/api/order', {area_id: areaId});
    posting.done(function (data) {
        if (data.result == 1) {
            $('#totalcount').text("");
            $('#order_post').hide();
            $('#order_message').show();
            $("#order_message").text("注文完了");
        } else {
            $("#order_message").text("注文失敗");
            $('#order_message').show();
        }
    });
}

function accounting() {

}

function deletecart(menuId) {
    if (window.confirm("取り消ししますか？")) {
        var posting = $.post('/api/remove', {menu_id: menuId});
        posting.done(function (data) {
            if (data.result == 1) {
                $('#subcount').text(data.subcount);
                $('#totalcount').text(data.totalcount);
                $('#row' + menuId).remove();
            }
        });
    }

}