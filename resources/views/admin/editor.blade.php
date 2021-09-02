@if (config('custom.rich_text_editor') == 'tinymce') 
    <script>
    layui.use(['tinymce'], function() {
            var tinymce = layui.tinymce
            var ue = tinymce.render({
                elem: "#container",
                height: 500,
                images_upload_url: '{{ route("api.upload_file") }}', //上传文件接口
                form:{name:'file',data:{from:'tinymac'}}, //上传name
            });
            ue.getContent()
        });
    </script>
@elseif (config('custom.rich_text_editor') == 'editormd') 
    <!-- # TODO markdown编辑器  -->
@else 
    <script type="text/javascript" src="{{asset(U_EDITOR.'ueditor.config.js')}}"></script>
    <script type="text/javascript" src="{{asset(U_EDITOR.'ueditor.all.js')}}"></script>
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
@endif


