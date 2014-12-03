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
		$.post("/admin/xls");
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
      //       	data:
      //       	{
      //       		del:del
      //       	},
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

//切换优秀状态
$('.youxiu').bind('click',function(){
	var $youxiu=$(this);
	artDialog(
	{
		title:'确认修改',
		content:'确认修改该学员优秀状态？',
		yesText:'修改',
		noText:'不改了'
	},
	function(){
			/*优秀按钮变化*/
		    if($youxiu.html()=='优&nbsp;&nbsp;&nbsp;秀'){
		        $youxiu.html('非优秀');
		    }else if($youxiu.html()=='非优秀'){
		         $youxiu.html('优&nbsp;&nbsp;&nbsp;秀');
		    }
		    var isgood=$youxiu.html();
		    var stno=$youxiu.parent().parent().find('td:eq(1)').text();
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
	},
	function(){
		return false;
	}
	);
});
// 切换毕业状态
$('.biye').bind('click',function(){
	var $biye=$(this);
	artDialog(
	{
		title:'确认修改',
		content:'确认修改该学员毕业状态？',
		yesText:'修改',
		noText:'不改了'
	},
	function(){
		/*毕业按钮变化*/
	    if($biye.html()=='已毕业'){
	        $biye.html('非毕业');
	    }else if($biye.html()=='非毕业'){
	         $biye.html('已毕业');
	    }
	    var isgraduate=$biye.html();
	    var stno=$biye.parent().parent().find('td:eq(1)').text();
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
	},
	function(){
		return false;
	}
	);
});
