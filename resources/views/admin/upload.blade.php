<script>
    layui.use(['jquery', 'upload','notice'],function () {
        let $ = layui.jquery
        let upload = layui.upload
        let notice = layui.notice;

        //普通图片上传
        var uploadInst = upload.render({
            elem: '#uploadPic'
            ,url: '{{ route("api.upload_file") }}'
            ,multiple: false
            ,data:{"_token":"{{ csrf_token() }}"}
            ,before: function(obj){
                //预读本地文件示例，不支持ie8
                /*obj.preview(function(index, file, result){
                 $('#layui-upload-box').append('<li><img src="'+result+'" /><p>待上传</p></li>')
                 });*/
                obj.preview(function(index, file, result){
                    $('#layui-upload-box').html('<li><img src="'+result+'" /><p>上传中</p></li>')
                });

            }
            ,done: function(res){
                //如果上传失败
                if(res.code === 200){
                    $("#file").val(res.data.name);
                    $('#layui-upload-box li p').text('上传成功');
                    return notice.success(res.msg);
                }
                return notice.error(res.msg);
            }
        });
    })
</script>
