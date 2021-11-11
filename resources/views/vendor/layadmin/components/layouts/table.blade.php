<x-layadmin::layouts.base class="pear-container">
    {{--搜索区--}}
    @if($search = $layadmin['page']['components']['search'] ?? [])
        <div class="layui-hide">
            <div id="LAY_SEARCH">
                <form class="layui-form {{ $search['class'] ?? '' }}" action="javascript:void(0);">
                    <div class="mainBox">
                        <div class="main-container">
                            @foreach($search['items'] as $k => $formItem)
                                @if($formItem['element'] === 'laydate')
                                    <div class="layui-form-item">
                                        <label class="layui-form-label" for="{{ $formItem['id'] }}">{{ $formItem['label'] }}</label>
                                        <div class="layui-input-block">
                                            <input type="text" id="{{ $formItem['id'] }}" name="{{ $formItem['name'] }}" class="layui-input"
                                                   placeholder="{{ $formItem['placeholder'] }}"
                                                   autocomplete="off">
                                        </div>
                                    </div>
                                @else
                                    <div class="layui-form-item">
                                        <label class="layui-form-label" for="{{ $formItem['id'] }}">{{ $formItem['label'] }}</label>
                                        <div class="layui-input-block">
                                            @if($formItem['element'] === 'input')
                                                @switch($formItem['type'])
                                                    @case('text')
                                                    <input type="{{ $formItem['type'] }}" id="{{ $formItem['id'] }}" name="{{ $formItem['name'] }}"
                                                           placeholder="{{ $formItem['placeholder'] }}"
                                                           class="layui-input">
                                                    @break;
                                                @endswitch
                                            @endif

                                            @if($formItem['element'] === 'select')
                                                @if($formItem['type'] === 'radio')
                                                    <select name="{{ $formItem['name'] }}" id="{{ $formItem['id'] }}"></select>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="bottom">
                        <div class="button-container">
                            <button class="pear-btn pear-btn-md pear-btn-primary" lay-submit lay-filter="{{ $search['submit']['lay-filter'] }}">
                                <i class="layui-icon {{ $search['submit']['icon'] }}"></i>
                                {{ $search['submit']['label'] }}
                            </button>
                            <button type="reset" class="pear-btn pear-btn-md">
                                <i class="layui-icon {{ $search['reset']['icon'] }}"></i>
                                {{ $search['reset']['label'] }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- 数据表格  --}}
    <div class="layui-card">
        <div class="layui-card-body">
            <table id="{{ str_replace('#','',$layadmin['page']['components']['table']['elem']) }}" lay-filter="{{ str_replace('#','',$layadmin['page']['components']['table']['elem']) }}"></table>
        </div>
    </div>

    {{ $slot }}
</x-layadmin::layouts.base>