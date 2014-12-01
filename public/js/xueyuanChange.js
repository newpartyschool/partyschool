$('#addXueyuan').bind('click',function(){
    var xueyuan='<form role="form" id="addForm"><label for="stuNo">学号：</label><input class="form-control" id="stuNo" type="text" name="stuNo" placeholder="请输入学生学号"/><label for="stuNo">姓名：</label><input class="form-control" id="stuName" type="text" name="stuName" placeholder="请输入学生姓名"/><label for="stuNo">手机号：</label><input class="form-control" id="stuTel" type="text" name="stuTel" placeholder="请输入学生电话"/><label>性别：</label><br/><input type="radio" name="gender" value="male" id="male"><label for="male">男</label><input type="radio" name="gender" value="female" id="female"><label for="female">女</label><br/><label>优秀状态：</label><br/><input type="radio" name="isGood" value="优秀" id="good"><label for="good">优秀</label><input type="radio" name="isGood" value="非优秀" id="bad"><label for="bad">非优秀</label><br/><label for="">毕业状态：</label><br/><input type="radio" name="isGradute" name="毕业" id="gradute"><label for="good">毕业</label><input type="radio" name="isGradute" name="非毕业" id="no-gradute"><label for="bad">非毕业</label>';
    artDialog(
        {
            id: 'student-form',
            title: '添加学员',
            content: xueyuan,
            yesText: '添加',
            fixed:true
        },
    function(){
        var stuNo = $.trim($('#stuNo').val());
        var stuName =$.trim($('#stuName').val());
        var stuTel = $.trim($('#stuTel').val());
        var stuGender = $.trim($('#stuGender').val());
        var isGood = $.trim($('#isGood').val());
        var isGradute =  $.trim($('#isGradute').val());

        if(stuNo==""||stuName==""||stuTel==""||stuTel==""||isGood==""||isGradute==""){
            alert('不能为空！');
            return false;
        }
        // if (stuNo=="" || stuName == "" || stuTel == "" || stuGender == "" || isGood =="" || isGradute =="") {
        //  alert('学院相关信息都不能为空');
        //  return false;
        // }else{
        //  $.ajax({
        //      url:'',
        //      type:'POST',
        //      data:{
        //          stuNo:stuNo,
        //          stuName:stuName,
        //          stuTel:stuTel,
        //          stuGender:stuGender,
        //          isGood:isGood,
        //          isGradute:isGradute
        //      },
        //      success:function(msg){

        //          if(msg>0)alert('添加题目成功');

        //      }
        //  });
        // }

        alert('添加成功');
    },
    function(){
        return false;
    }
    );
});