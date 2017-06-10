var xui={};
xui.select2=function(){
		$('.xui-select2').each(function(){
		    var select_dom=$(this);
		    var name="请选择";
            //防制第二次初始化
            if(select_dom.find('input').length>0){
                return false;
            }

            if(select_dom.attr('defaultName')){
                name=select_dom.attr('defaultName');
            }
     
			
            select_dom.find('.xui-select2-option li').each(function () {
                if(select_dom.attr('value')==$(this).attr('value')){
                    select_dom.find('.xui-select2-option').before('<span>'+$(this).text()+'</span><input type="hidden" name="'+select_dom.attr('name')+'" placeholder="'+name+'" value="'+$(this).attr('value')+'" />');
                    return false;
                }
            });

            if(select_dom.attr('value')==undefined || select_dom.attr('value')==''){
                select_dom.find('.xui-select2-option').before('<span>'+name+'</span><input type="hidden" name="'+select_dom.attr('name')+'" placeholder="'+name+'" value="" />');
                return;
            }

	    });

    /**
	 * 控件被单击事件绑定
      */
    $(document).on('click','.xui-select2 span',function(event){
        event.stopPropagation();
        $('.xui-select2-option').hide();

        $(this).siblings('.xui-select2-option').css('width',$(this).css('width'));
        $(this).siblings('.xui-select2-option').show();
    });

    /**
     * 控件option被单击事件
     */
    $(document).on('click','.xui-select2-option li',function(){
        var v = $(this).attr('value');
        var name=$(this).text();

        $(this).parents('.xui-select2-option').siblings('input').val(v);
        $(this).parents('.xui-select2-option').siblings('span').text(name);
        $(this).addClass('xui-select2-option-this');
        $(this).siblings('li').removeClass('xui-select2-option-this');
    });

    /**
     * 单击控件区域以外收起控件
     */
    $(document).click(function(){
		$('.xui-select2-option').hide();
	});
}
