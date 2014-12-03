$('.editTimu').bind('click',function(){

	var qeid = $(this).attr("qeid"),
		timu = $(this).attr("timu"),
		ansA = $(this).attr("ansA"),
		ansB = $(this).attr("ansB"),
		ansC = $(this).attr("ansC"),
		ansD = $(this).attr("ansD"), 
	rightAns = $(this).attr("rightAns");
	var editTmContent = '<form id="changeTiku"><label for="timu">题目：</label><input class="timu" type="text" class="form-control" value="'+timu+'" ><br/><label for="">选项：</label><input class="ansA" type="text" class="form-control" value="'+ansA+'" placeholder="请输入选项A"><br><input class="ansB" type="text" class="form-control" value="'+ansB+'" placeholder="请输入选项B" style="margin:5px 0 5px 42px;"><br><input class="ansC" type="text" class="form-control" value="'+ansC+'" placeholder="请输入选项C" style="margin:5px 0 5px 42px;"><br><input class="ansD" type="text" class="form-control" value="'+ansD+'" placeholder="请输入选项D" style="margin:5px 0 5px 42px;"><br><label for="timu">答案：</label><input class="rightAns" type="text" class="form-control" value="'+rightAns+'" placeholder="如：答案：（A）"></form>';
	artDialog(
	{
		id:'question-form',
		title:'更新题目',
		content:editTmContent,
		yesText:'更新',
		fixed:true
	},
	

	function(){
		var timu = $('.timu').val(),
			ansA = $('.ansA').val(),
			ansB = $('.ansB').val(),
			ansC = $('.ansC').val(),
			ansD = $('.ansD').val(), 
			rightAns = $('.rightAns').val();
		if (timu=="" || ansA == "" || ansB == "" || ansC == "" || ansD =="" || rightAns =="") {
			alert('题目相关数据都不能为空');
			return false;
		}else{
			$.ajax({
				url:'/admin/editquestion',
				type:'POST',
				data:{
					qeid:qeid,
					timu:timu,
					ansA:ansA,
					ansB:ansB,
					ansC:ansC,
					ansD:ansD,
					rightAns:rightAns
				},
				success:function(msg){

					if(msg>0)alert('更新题目成功');
					window.location.reload();



				}
			});
		}

		
	},
	function(){
		return false;
	}
	);
});
