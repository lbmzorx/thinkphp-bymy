/**
 * Created by Administrator on 2017/5/13.
 */
layui.use('layer', function(){
    var layer = layui.layer;
});
//删除
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
