$('#addXueyuan').bind('click',function(){
    var xueyuan='<form role="form" id="addForm"><label for="stuNo">学号：</label><input class="form-control" id="stuNo" type="text" name="stuNo" placeholder="请输入学生学号"/><label for="stuNo">姓名：</label><input class="form-control" id="stuName" type="text" name="stuName" placeholder="请输入学生姓名"/><label for="stuNo">手机号：</label><input class="form-control" id="stuTel" type="number" name="stuTel" placeholder="请输入学生电话"/><label>性别：</label><br/><input type="radio" name="stuGender" id="stuGender" value="男"><label for="male">男</label><input type="radio" name="stuGender" id="stuGender" value="女"><label for="female">女</label><br/><label for="">优秀状态：</label><br/><input type="radio" name="isGood" value="优秀" id="isGood"><label for="good">优秀</label><input type="radio" name="isGood" value="非优秀" id="isGood"><label for="bad">非优秀</label><br/><label for="">结业状态：</label><br/><input type="radio" name="isGradute" value="1" id="isGradute"><label for="good">结业</label><input type="radio" name="isGradute" value="2" id="isGradute"><label for="bad">未结业</label>';

    artDialog(
        {
            id: 'student-form',
            title: '添加学员',
            content: xueyuan,
            yesText: '添加',
            fixed:true
        },
    function(){
        var stuNo = $.trim($('input[name="stuNo"]').val());
        var stuName =$.trim($('input[name="stuName"]').val());
        var stuTel = $.trim($('input[name="stuTel"]').val());
        var stuGender = $.trim($('input[name="stuGender"]:checked').val());
        var isGood = $.trim($('input[name="isGood"]:checked').val());
        var isGradute =  $.trim($('input[name="isGradute"]:checked').val());

        if(stuNo=="" || stuName=="" || stuTel=="" || stuTel=="" || isGood=="" || isGradute==""){
            alert('请将信息填写完整');
            return false;
        }
        // if (stuNo=="" || stuName == "" || stuTel == "" || stuGender == "" || isGood =="" || isGradute =="") {
        //  alert('学院相关信息都不能为空');
        //  return false;
        else{
         $.ajax({
             url:'/admin/addstu',
             type:'POST',
             data:{
                 stuNo:stuNo,
                 stuName:stuName,
                 stuTel:stuTel,
                 stuGender:stuGender,
                 isGood:isGood,
                 isGradute:isGradute
             },
             success:function(msg){

                if(msg == 2){
                    alert('添加成功');
                }
                else if(msg == 0){
                    alert('已存在该学生');
                }
                else if(msg == 1){
                    alert('请检查学生信息是否正确');
                }
                else if(msg == 4){
                    alert('请添加完整信息');
                }
                else if(msg == 6){
                    alert('登录超时，请重新登录');
                }
                else{
                    alert('添加失败');
                }

             }

         });
        }
    },
    function(){
        return false;
    }
    );
});