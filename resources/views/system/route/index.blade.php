<x-layadmin::layouts.table>
    {{-- 表格字段模板 --}}
    <script type="text/html" id="system-route-index-middleware">
        @{{# layui.each(d.middleware, function(index, item){  }}
        <span class="layui-badge-rim">@{{ item }}</span>
        @{{#  }); }}
    </script>
</x-layadmin::layouts.table>
