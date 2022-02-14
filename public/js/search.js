
function paginate(url, data, table) {
    $.ajax({
        url:url,
        method: 'GET',
        beforeSend:function(){
            $('#'+table).html(' <div class="progress"><div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 100%"></div></div>')
        },
        data:data,
        success: function (data) {
            $('#'+table).html(data)
        },
        error: function (err) {
            // alertError(err);
        }

    }).done(function(){
        location.hash = url.split('page=')[1];
        //app.displayImage();
    });
}
$('.btn-search-form').click(function (e) {
    e.preventDefault();
    paginate(url, $('#formFilter').serialize(), 'table');
})