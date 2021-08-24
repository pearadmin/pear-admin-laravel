<div class="foot">
	<ul>
    	<li @if($url == '/') class="li-active" @endif>
            <a href="/">
            	<b class="b-1"></b>
                <span>项目</span>
            </a>
        </li>
{{--    	<li>--}}
{{--            <a href="#">--}}
{{--            	<b class="b-2"></b>--}}
{{--                <span>捐赠</span>--}}
{{--            </a>--}}
{{--        </li>--}}
    	<li @if($url == '/family/activityfeedback') class="li-active" @endif>
            <a href="/family/activityfeedback">
            	<b class="b-3"></b>
                <span>反馈</span>
            </a>
        </li>
    	<li class="showvo hide @if($url == '/family/mine') li-active @endif">
            <a href="/family/mine">
            	<b class="b-4"></b>
                <span>我的</span>
            </a>
        </li>
        <li class="hidevo show @if($url == '/family/volunteer') li-active @endif">
            <a href="/family/volunteer">
                <b class="b-4"></b>
                <span>加入</span>
            </a>
        </li>
    </ul>
</div>
<script>
    var url = base_url+'/api/VolunteerData';
    $.ajax({
        url: url,
        type: "GET",    // 提交方式
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            // console.log(data);
            if(data.code == 200){
                // console.log(data.data.isvolunteer);
                if(data.data.isvolunteer == 0){
                    // 不是
                    $('.showvo').addClass('hide').removeClass('show');
                    $('.hidevo').addClass('show').removeClass('hide');
                }else{
                    // 是
                    $('.showvo').addClass('show').removeClass('hide');
                    $('.hidevo').addClass('hide').removeClass('show');
                }
            }else if(data.code == 500){
                $('.showvo').addClass('hide').removeClass('show');
                $('.hidevo').addClass('show').removeClass('hide');
                // window.location.href='/login';
            }else{
                alert(data.msg);
            }
        },
    });
</script>
