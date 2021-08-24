@extends('admin.base')
@section('style')
    <style>
        /* 头像上传组件 */
        .layui-form-item label.layui-form-label{min-width: 145px}
        .layui-form-item div.layui-input-inline{min-width: 600px}
        .pear-signin-main {position: relative;padding: 0 15px;text-align: center;}
        .pear-shortcut li{text-align: center;}
        .pear-shortcut li .layui-icon {background-color: #36b368!important}
        .pear-shortcut li .layui-icon {display: inline-block;width: 100%;height: 65px;line-height: 65px;text-align: center;color: #fff;border-radius: 2px;font-size: 32px;transition: all .3s;-webkit-transition: all .3s;}
        .pear-text p{font-size: 15px; color: #111;}
        .pear-text span.info{font-size: 15px;font-weight:600;color: #24262F}
        .pear-text span.yes{font-size: 15px;font-weight:600;color: #36b368}
        .pear-text span.not{font-size: 15px;font-weight:600;color: #FF5722}
    </style>
@endsection
@section('content')
<div class="layui-card">
    <div class="layui-card-body">
        <div class="layui-bg-gray" style="padding: 10px 30px; margin-bottom: 20px;">
            尊敬的用户：{{$user->username}}。
        </div>

        <div class="layui-row layui-col-space20">
            <div class="layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header">基础用户信息</div>
                    <div class="layui-card-body">
                        <div class="layui-row grid-demo">
                            <div class="layui-col-md6 pear-signin-main">
                                <img style="height: 80px;margin-top: 10px;" src="http://www.pearadmin.com/assets/images/un27.svg"><br/>
                                {{--<button class="pear-btn pear-btn-info pear-btn-sm layui-btn-disabled">今日已签到</button>--}}
                            </div>
                            <div class="layui-col-md6">
                                <div class="layui-card-body pear-text">
                                    <p> ERP账号：<span class="info">18009590614</span>  </p>
                                    <p> 电子邮箱：<span class="info">454194741@qq.com</span>  </p>
                                    <p> 账户余额：<span class="yes" id="balance">1208.2</span> <b>元</b> </p>
                                    <p> 亚马逊授权：<span class="not">未授权</span> </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header">
                        <span class="layui-breadcrumb" lay-separator="|">
                              <a href="javascript:void(0);">充值</a>
                              <a href="">账单</a>
                              <a href="">流水</a>
                        </span>
                    </div>
                    <div class="layui-card-body pear-text">
                        <div class="layui-bg-gray" style="padding: 39px;font-size: 20px;text-align: center;">
                            充值账号：{{$user->username}}
                            <button plain="" class="pear-btn pear-btn-success" style="margin-left: 60px;">充 值</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">快捷方式</div>
                    <div class="layui-card-body">
                        <ul class="layui-row layui-col-space10 pear-shortcut">
                            <li class="layui-col-sm3 layui-col-xs4"> <a href="/user/set/"><i class="layui-icon"></i><cite>修改信息</cite></a> </li>
                            <li class="layui-col-sm3 layui-col-xs4"> <a href="/user/set/#avatar"><i class="layui-icon"></i><cite>修改头像</cite></a> </li>
                            <li class="layui-col-sm3 layui-col-xs4"> <a href="/user/set/#pass"><i class="layui-icon"></i><cite>修改密码</cite></a> </li>
                            <li class="layui-col-sm3 layui-col-xs4"> <a href="/user/set/#bind"><i class="layui-icon"></i><cite>帐号绑定</cite></a> </li>
                            <li class="layui-col-sm3 layui-col-xs4"> <a href="/posts/create/"><i class="layui-icon"></i><cite>余额充值</cite></a> </li>
                            <li class="layui-col-sm3 layui-col-xs4"> <a href="#"><i class="layui-icon"></i><cite>关注公众号</cite></a> </li>
                            <li class="layui-col-sm3 layui-col-xs4"> <a href="#"><i class="layui-icon"></i><cite>使用文档</cite></a> </li>
                            <li class="layui-col-sm3 layui-col-xs4"> <a href="#"><i class="layui-icon"></i><cite>最新资讯</cite></a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
    layui.use(['form','notice','jquery','count'],function(){
        let form = layui.form;
        let count = layui.count;
        let $ = layui.jquery;

        count.up("balance", {
            time: 5000,
            num: $("#balance").text(),
            bit: 2,
            regulator: 100
        })

        form.on('submit(user-save)', function(data){
            let roleIds = "";
            $('input[type=checkbox]:checked').each(function() {
                roleIds += $(this).val()+",";
            });
            roleIds = roleIds.substr(0,roleIds.length-1);
            data.field.roleIds = roleIds;
            $.ajax({
                url:'{{route('admin.user.update',['id'=>$user->id])}}',
                data:data.field,
                dataType:'json',
                type:'post',
                success:function(result){
                    if (result.code === 200) {
                        window.parent.notify('success',result.msg)
                        setTimeout(function () {
                            parent.layer.closeAll();
                        }, 1000);
                    } else {
                        window.parent.notify('error',result.msg)
                    }
                },
                error:function(msg){
                    let json = JSON.parse(msg.responseText);
                    json = json.errors;
                    for (const item in json) {
                        for (let i = 0; i < json[item].length; i++) {
                            window.parent.notify('warning',json[item][i])
                            return ; //遇到验证错误，就退出
                        }
                    }
                }
            })

            return false;
        });
    })
    </script>
@endsection
