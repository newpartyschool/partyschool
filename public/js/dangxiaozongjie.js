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
    		$tr.remove();
    		/*ajax发送删除的数据，以学生号作为唯一标识。*/
    		// $.ajax({
      //       	url:'',
      //      		type:'POST',
      //       	data:del,
      //       	success:function(msg){
      //           	if(msg>0)alert('添加题目成功');
      //       	}
      //   	});
		},
		function(){
			return false;
		}
		);
});
/*优秀按钮变化*/
$('button.youxiu').click(function(){
    if($(this).html()=='优&nbsp;&nbsp;&nbsp;秀'){
        $(this).html('非优秀');
    }else if($(this).html()=='非优秀'){
         $(this).html('优&nbsp;&nbsp;&nbsp;秀');
    }
    // var isgood=$(this).html();
    // var stno=$(this).parent().parent().find('td:eq(1)').text();
    // $.ajax({
    //         	url:'',
    //        		type:'POST',
    //         	data:{
    //         		stno:stno,
    //         		isgood:isgood
    //         	},
    //         	success:function(msg){
    //             	if(msg>0)alert('添加题目成功');
    //         	}
    //     	});
});
/*毕业按钮变化*/
$('button.biye').click(function(){
    if($(this).html()=='已毕业'){
        $(this).html('非毕业');
    }else if($(this).html()=='非毕业'){
         $(this).html('已毕业');
    }
    var isgraduate=$(this).html();
    var stno=$(this).parent().parent().find('td:eq(1)').text();
    alert(stno);
    // $.ajax({
    //         	url:'',
    //        		type:'POST',
    //         	data:{
    //         		stno:stno,
    //         		isgraduate:isgraduate
    //         	},
    //         	success:function(msg){
    //             	if(msg>0)alert('添加题目成功');
    //         	}
    //     	});
});
