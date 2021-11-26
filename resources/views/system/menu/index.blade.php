<x-layadmin::layouts.table>
    {{-- 表格行字段模板 --}}
    <script type="text/html" id="system-menu-index-type">
        @{{#if (d.type == '0') { }}
        <span>目录</span>
        @{{# }else { }}
        <span>菜单</span>
        @{{# } }}
    </script>
    <script type="text/html" id="system-menu-index-icon">
        <i class="@{{d.icon}}"></i>
    </script>
</x-layadmin::layouts.table>
