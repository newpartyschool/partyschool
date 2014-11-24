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
			content:'确定要删除选中项'
		},
		function(){
			alert("以后就会把选中项一键删除");
		},
		function(){
			return false;
		}
		);
});
//切换优秀状态
$('.youxiu').bind('click',function(){
	artDialog(
	{
		title:'确认修改',
		content:'确认修改该学员优秀状态？',
		yesText:'修改',
		noText:'不改了'
	},
	function(){
		alert('已修改');
	},
	function(){
		// alert('不修改了');
	}
	);
});
// 切换毕业状态
$('.biye').bind('click',function(){
	artDialog(
	{
		title:'确认修改',
		content:'确认修改该学员毕业状态？',
		yesText:'修改',
		noText:'不改了'
	},
	function(){
		alert('已修改');
	},
	function(){
		// alert('不修改了');
	}
	);
});