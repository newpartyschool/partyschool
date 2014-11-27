$('#btn-submit').click(function(){
    var pattern=/<\/?script>/ig;
    var title=jQuery.trim($('#wz-title').val());
    var titlequa=title.match(pattern);
    var content=jQuery.trim($('#article-content').val());
    var contentqua=content.match(pattern);
    if(title!=''&&content!=''){
        if(!contentqua&&!titlequa){
            return true;
        }else{
            alert('您的输入中存在叛逆的标签，请修正后再提交上去。');
            return false;
        }
    }else{
        alert('亲，输入框有点饿了，给他喂点吃的吧。');
        return false;
    }
});