@extends('home.layouts.app')

@section('title','我的厨房')
@section('content')
    <div class="page-outer">
        <!--begin of page-container-->
        <div class="page-container">
            <div class="pure-g pb40">
                <!-- left avatar -->
                <div class="pure-u-5-24 people-base-left avatar">
                    <img src="/home/images/touxiang.png" alt="手机用户_n24q的厨房">
                </div>
                <!-- left avatar -->

                <!-- middle info -->
                <div class="pure-u-5-8 font12 pr30">
                    <h1 class="page-title mb10">
                        {{session()->get('userInfo')->nickname}}
                    </h1>

                    <!-- basic info -->
                    <div class="gray-font">
                        <div>

                            <span class="mr10 display-inline-block">{{session()->get('userInfo')->sex}}</span>

                            <span class="mr10 display-inline-block"><i class="icon-profile icon-profile-home"></i>广东,汕头</span>

                            {{--<span class="mr10 display-inline-block"><i class="icon-profile icon-profile-location"></i>广东,东莞</span>--}}

                            {{--<span class="mr10 display-inline-block"><i class="icon-profile icon-profile-job"></i>编辑</span>--}}

                            <span class="display-inline-block">{{session()->get('userInfo')->created_at}}加入</span>
                        </div>
                        <div>

                        </div>
                    </div>
                    <!-- basic info -->

                    <!-- desc -->
                    <div class="people-base-desc dark-gray-font mt10">三生三世</div>
                    <!-- desc -->
                </div>
                <!-- middle info -->

                <!-- right extra -->
                <div class="pure-u-1-6 align-center people-base-right pos-r">
                    <div class="people-base-follow">
                        <a href="http://www.xiachufang.com/account/basic/" class="gray-link font12">设置个人信息</a>
                    </div>
                    <div class="follow-wrap block-bg p10 pl15 pr15 pure-g w100">
                        <div class="pure-u-1-2 following-num">
                            <div class="font12 dark-gray-font mb10">关注的人</div>
                            <div><a href="http://www.xiachufang.com/cook/126476453/following_users/" class="bold font16">1</a></div>
                        </div>
                        <div class="pure-u-1-2">
                            <div class="font12 dark-gray-font mb10">被关注</div>
                            <div><a href="http://www.xiachufang.com/cook/126476453/followers/" class="bold font16">0</a></div>
                        </div>
                    </div>
                </div>
                <!-- right extra -->
            </div>

            <!-- people profile nav -->
            <div class="mb35">

                <div class="tab-bar pure-g" id="">

                    <ul class="plain pure-g">
                        <li class=" ">
                            <a href="{{url('/home/chufang')}}">
                                <span>概况</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{url('/home/chufang/caipu')}}">
                                <span>菜谱</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{url('/home/chufang/zuopin')}}">
                                <span>作品</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="{{url('/home/chufang/caidan')}}">
                                <span>菜单</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="{{url('/home/chufang/liuyanban')}}">
                                <span>留言板</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>


            <!-- people profile nav -->





            <div class="people-home-main">
                <!-- collected recipes section -->
                <div class="block">
                    {{--<h3>{{session()->get('userInfo')->nickname}}收藏的菜谱</h3>--}}

                    {{--<div class="recipes-280-full-width-list">--}}
                        {{--<ul class="plain pure-g">--}}

                            {{--@foreach($users as $v)--}}
                                {{--<li class="pure-u" style="margin: 10px;">--}}

                                    {{--<div class="recipe-280 white-bg">--}}
                                        {{--<div class="cover">--}}
                                            {{--<a href="http://www.xiachufang.com/recipe/230868/" title="杂粮面包" class="image-link" target="_blank"><img src="./手机用户_n24q的下厨房个人主页_下厨房_files/29821974872a11e6b87c0242ac110003_459w_690h.jpg" data-src="" alt="" width="280" height="216" class="unveiled"></a>--}}
                                        {{--</div>--}}
                                        {{--<p class="name ellipsis red-font">--}}
                                            {{--<a href="http://www.xiachufang.com/recipe/230868/" target="_blank">{{$v->title}}</a>--}}
                                        {{--</p>--}}
                                        {{--<div class="stats ellipsis">10 做过 224 收藏 | <a href="http://www.xiachufang.com/cook/10140953/" class="gray-link">苦哥</a></div>--}}
                                    {{--</div>--}}
                                {{--</li>--}}
                            {{--@endforeach--}}



                        </ul>
                    </div>

                </div>
                <!-- collected recipes section -->

            <div class="block p40 white-bg">
                <div class="comments-block">
                    <div class="pure-g mb30">
                        <div class="pure-u-2-3">


                            <form id="post_reply" method="POST" action="https://www.xiachufang.com/cook/126773404/comments/">
                                <textarea id="reply" name="reply" rows="8" placeholder="用&quot;:&quot;+拼音，看看你能打出什么"></textarea><br>
                                <input type="submit" class="button mt10" value="发 言">
                                <input type="hidden" name="xf" value="ksoJU">
                            </form>

                        </div>
                    </div>
                    <div class="pr40">

                        <ul class="plain list comment-list">
                        </ul>





                        <input type="hidden" name="at-candiates" id="atCandiates" value="[&quot;\u4e0b\u53a8\u623f\u603b\u7f16\u8f91&quot;]">

                        <span id="last"></span>

                    </div>
                </div>
            </div>

            </div>





        </div>
        <!-- end of page-container -->
    </div>

    <div class="bottom-outer">
        <div class="bottom-container">

        </div>
    </div>



    <div class="footer-outer">
        <div class="footer-container">


            <div class="bottom-ad">

                <script>
                    (function() {
                        var s = "_" + Math.random().toString(36).slice(2);
                        document.write('<div id="' + s + '"></div>');
                        (window.slotbydup=window.slotbydup || []).push({
                            id: '3543566',
                            container: s,
                            size: '1000,90',
                            display: 'inlay-fix',
                            async: true
                        });
                    })();
                </script><div id="_7wzm9jbakkbt5dquw3j6ob6gvi"></div>

            </div>
            <div class="bottom-ad">
                <!-- 广告位：PC-底部-底通2 -->

                <script>
                    (function() {
                        var s = "_" + Math.random().toString(36).slice(2);
                        document.write('<div id="' + s + '"></div>');
                        (window.slotbydup=window.slotbydup || []).push({
                            id: '3543568',
                            container: s,
                            size: '1000,90',
                            display: 'inlay-fix',
                            async: true
                        });
                    })();
                </script><div id="_j69uk013pezwhc67tjyr885mi"></div>

            </div>






@endsection
