// 生成excel
$('#product-excel').bind('click',function(){
	artDialog(
	{
		title:'生成excel',
		content:'亲，真的要生成Excel吗？？？',
		yesText:'真的',
		noText:'假的'
	},
	function(){
		alert("以后估计我就真的生成了");
	},
	function(){
		alert("不玩了");
	});
});
// 一键删除
$('#all-del').bind('click',function(){
	artDialog(
		{
			title:'删除提示',
			content:'确定要删除选中项',
			fixed:true,
		},
		function(){
			var del=[],i=0;
			var $tr=$('input:checkbox:checked').parent().parent();
			
				$tr.find('td:eq(1)').each(function(){
					var delStuNo=$(this).text();
					del.push(delStuNo);
				});
    		
    		if(del == ''){
    			alert('请选中要删除的学员');
    			return false;
    		}
    		//ajax发送删除的数据，以学生号作为唯一标识。
    		$.ajax({
            	url:'/admin/delstu',
            	type:'POST',
            	data:{del:del},
            	success:function(msg){
                	if (msg == 1){
                		alert('删除成功');
                		$tr.remove();
                	}
                	else if(msg == 0){
                		alert('请选择要删除的信息');
                	}
                	else{
                		alert('未能成功删除');
                	}
                	
            	}
        	});
		},
		function(){
			return false;
		}
		);
});
/*优秀按钮变化*/
$('button.youxiu').click(function(){
    var thisbutton = $(this);
    var isgood=$(this).html();
    var stno=$(this).parent().parent().find('td:eq(1)').text();
    $.ajax({
            	url:'/admin/changestatus',
           		type:'POST',
            	data:{
            		stno:stno,
            		isgood:isgood
            	},
            	success:function(msg){
                	if(msg == 2){
                		alert('修改成功');
                		if(thisbutton.html()=='优&nbsp;&nbsp;&nbsp;秀'){
                			thisbutton.html('非优秀');
                		}else if(thisbutton.html()=='非优秀'){
                			thisbutton.html('优&nbsp;&nbsp;&nbsp;秀');
                		}
                	}
                	else{
                		return false;
                	}
            	}
        	});
    $.ajax({
                url:'/admin/showgood',
                type:'POST',
                data:{
                    stno:stno
                },
                success:function(msg){
                    if (msg){
                        $('#st-yx').html(msg);
                    };
                }
            });
});
/*结业按钮变化*/
$('button.biye').click(function(){
    var thisbutton = $(this);
    var isgraduate= $(this).html();
    var stno=$(this).parent().parent().find('td:eq(1)').text();
    $.ajax({
            	url:'/admin/changestatus',
           		type:'POST',
            	data:{
            		stno:stno,
            		isgraduate:isgraduate
            	},
            	success:function(msg){
                	if(msg == 1){
                		alert('修改成功');
                		if(thisbutton.html()=='已结业'){
                		 	thisbutton.html('未结业');
                		}else if(thisbutton.html()=='未结业'){
                		 	thisbutton.html('已结业');
                		}
                	}
                	else{
                		return false;
                	}
            	}
        	});
});
