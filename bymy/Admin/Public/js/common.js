layui.use('form', function(){
    var $ = layui.jquery, form = layui.form();
    //全选
    form.on('checkbox(allChoose)', function(data){
        var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]');
        child.each(function(index, item){
            item.checked = data.elem.checked;
        });
        form.render('checkbox');
    });
});
layui.upload({
    url: ''
    ,ext: 'jpg|png|gif' //那么，就只会支持这三种格式的上传。注意是用|分割。
    ,success: function(res, input){}
});        