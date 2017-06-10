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

layui.use('layer', function(){
    var layer = layui.layer;
});

function del(ids,url){
    if(ids.length==0){
        layer.alert('请选择产品');
        return;
    }
    $.post(url,{
        ids:ids,
        // _csrf:CSRF
    },function(data){
        if(data.status){
            location.reload()
        }else{
            layer.msg(data.msg);
        }
    },'json');
}

