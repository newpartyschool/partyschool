$('.radio-control').change(function(){
	var checkedValue = $("input[name='ans_stu']:checked").val(),
        ansYValue = $('#qeans').attr('data-ansy'),
		ansStu = checkedValue.substr(1,1),
		ansY = ansYValue.substr(1,1);
		console.log("选中的答案：" + ansStu);
		console.log("正确答案：" + ansY);
		if (ansStu == ansY) {
			$('.ans-warn').show();
			$('#ansTest').html("您答对啦！");
			$('.radio-control').attr('disabled',true);
		}else{
			$('.ans-warn').show();
			$('#ansTest').html("正确答案是：" + ansY);
			$('.radio-control').attr('disabled',true);
		}
});

