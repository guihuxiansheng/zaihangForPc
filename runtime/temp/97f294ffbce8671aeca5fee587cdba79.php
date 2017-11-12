<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:93:"D:\wamp64\www\haixue\hx\zaihangForPc\public/../application/index\view\personalinfo\index.html";i:1510307909;s:88:"D:\wamp64\www\haixue\hx\zaihangForPc\public/../application/index\view\common\header.html";i:1510306877;s:87:"D:\wamp64\www\haixue\hx\zaihangForPc\public/../application/index\view\nav_foot\nav.html";i:1510307315;s:88:"D:\wamp64\www\haixue\hx\zaihangForPc\public/../application/index\view\nav_foot\foot.html";i:1510307315;s:88:"D:\wamp64\www\haixue\hx\zaihangForPc\public/../application/index\view\common\footer.html";i:1510306877;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>topics</title>
	<link rel="stylesheet" type="text/css" href="__STATIC_PATH__/static/css/common.css">
	<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>topics</title>
	<link rel="stylesheet" type="text/css" href="__STATIC_PATH__/static/css/common.css">
	<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
	<link rel="stylesheet" type="text/css" href="__STATIC_PATH__/static/nav_foot/css/nav.css?fgf">
	<div class="mobile">
		<div class="mobileBox">
			<a class="header_logo" href="/" ><i class="icon icon_zaih">海学</i></a>
		    <a href="#" class="mobile-menu-btn btn" id="mobileMenuBtn" >
		    	<p></p>
		    	<p></p>
		    	<p></p>
		    </a>
            <?php if(!$reg): if($login): ?>
                <a class="hover header_user" href="<?php echo url('/index/personalinfo/index'); ?>"><?php echo $login['user_name']; ?></a>
            <?php else: ?>
		    <a href="#" class="mobile-text-btn btn" id="mobileLoginBtn" >登录</a>
            <?php endif; endif; ?>
		    <a href="#" class="btn">去「分答」</a>
		</div>
	</div>
    <div class="mobileList">
        <span>×</span>
        <ul class="list">
            <li><a href="#">首页</a></li>
            <li><a href="#">职场发展</a></li>
            <li><a href="#">行业经验</a></li>
            <li><a href="#">互联网+</a></li>
            <li><a href="#">创业和投融资</a></li>
            <li><a href="#">生活服务</a></li>
            <li><a href="#">心理</a></li>
            <li><a href="#">投资理财</a></li>
            <li><a href="#">教育学习</a></li>
            <li><a href="#">其他</a></li>
        <!-- </div> -->
    </div>
    <div class="zaih_headerout">
        <div class="header">
            <a class="header_logo" href="<?php echo url('/index'); ?>" ><i class="icon icon_zaih">海学</i></a>
            <ul class="header_nav">
                <li class="decoration"></li>
                <?php foreach($cate_top as $key=>$val): if($key<4): ?>
                    <li>
                        <a href="<?php echo url('topics/').'?cate_id='.$val['id'].'&city='.$city; ?>" class="hover"><?php echo $val['cate_name']; ?></a>
                    </li>
                    <?php endif; endforeach; ?>
                <li class="header_more">
                    <a href="#" class="hover">更多&nbsp;<span class="icon_down"></span></a>
                    <ul class="more_menu">
                        <li class="decoration"></li>
                        <?php foreach($cate_top as $key=>$val): if($key>=4): ?>
                            <li>
                                <a href="<?php echo url('topics/').'?cate_id='.$val['id'].'&city='.$city; ?>" class="hover"><?php echo $val['cate_name']; ?></a>
                            </li>
                            <?php endif; endforeach; ?>
                    </ul>
                </li>
            </ul>
            
            <div class="header_setting">
                <?php if($login): if($login['if_specialist']==1): ?>
                <a class="tutorApply hover tohangj" href="<?php echo url('/index/expertreal'); ?>">我的行家</a>
                <?php else: ?>
                <a class="tutorApply hover tohangj" href="<?php echo url('/index/expertreal'); ?>">成为行家</a>
                <?php endif; endif; if(!$reg): if($login): ?>
                <a class="hover header_user" href="<?php echo url('/index/personalinfo/index'); ?>"><?php echo $login['user_name']; ?></a>
                <a href="<?php echo url('/index/login/logout'); ?>" class="hover">退出</a>
                <?php else: ?>
                <a class="hover header_login">登录</a>
                <a href="<?php echo url('/index/register'); ?>" class="hover">注册</a>
                <?php endif; endif; ?>
            </div>
            <div class="header_links">
                <a href="<?php echo url('/index/appfen'); ?>" class="hover">去「分答」</a>
            </div>

            <form class="search" action="<?php echo url('/index/search'); ?>" method="get">
                <input class="search-content" type="text" placeholder="搜行家、话题、服务" value="" name="word">
                <input type="hidden" value="<?php echo !empty($city)?$city:''; ?>" name="city">
                <div class="search-sug sug"></div>
                <button class="search-btn icon icon-search" type="submit"></button>
            </form>
        </div>
    </div>
	


    <div class="login_container" style="display:none;width: 100%;height: 500px;">
    	<div class="login_box" style="display: none;">
    		<div class="back">
    			
    		</div>
    		<div class="login" id="loginWin">
                <span>×</span>
    			<div class="single-white-wrap">
                    <p>欢迎登录「海学」</p>
                    <div class="signup-panel">

                        <p class="signup-tip">无需注册，直接用社交账号登录</p>

                        <a class="btn-primary btn-hg login-weibo" href="#" data-received="">
                            <img src="__STATIC_PATH__/static/login/image/weibo.png" class="icon icon-weibo"></img>
                        </a>        

                        <a class="btn-primary btn-hg login-weixin" href="#" data-received="">
                            <img src="__STATIC_PATH__/static/login/image/weixin.png" class="icon icon-weixin"></img>
                        </a>    

                        <a class="btn-primary btn-hg login-baidu" href="#" data-received="">
                            <img src="__STATIC_PATH__/static/login/image/baidu.png" class="icon icon-baidu"></img>
                        </a>    


                        <div class="phone-login" id="phoneLogin" style="display: block;">
                            <div class="btn-hg login-phone" id="phoneBtn" style="display: none;">
                                    手机登录
                            </div>
                            <form class="signForm" style="display: block">
                                <div style="display:block;"><input id="csrf_token" name="csrf_token" type="hidden" value=""></div>
                                <div class="form-group">
                                    <div class="form-item">
                                        <input class="form-control" id="identity" name="identity" placeholder="手机号" type="text" value="">
                                        <span class="form-error errForIdentity"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-item">
                                        <input class="form-control" id="password" name="password" placeholder="密码" type="password" value="">
                                        <p class="form-error errForPassword"></p>
                                    </div>
                                    <div class="err" style="position: absolute; text-align: left;color: #ff946e;"></div>
                                </div>
                                <div class="btns-wrap-center">
                                    <input type="button" id="submit" class="btn-submit btn-hg btn-complete-register" value="登录">
                                </div>
                            </form>


                            <div>
                                <p class="to-signup">还没有账号？<a href="<?php echo url('/index/register'); ?>">现在去注册</a></p>
                                <p class="to-resetpassword"><a href="#">忘记密码？</a></p>
                            </div>

                        </div>

                    </div>
                </div>
    		</div>
    	</div>
    </div>
    <script type="text/javascript" src="__STATIC_PATH__/static/nav_foot/js/header.js?dsd">
    </script>
    <script type="text/javascript">
        $(function(){
            $('#loginWin #submit').click(function(){
                var username = $('#identity').val();
                var password = $('#password').val();
                if(!username || !password ){
                    alert('请输入账号内容！');
                    return;
                }
                // console.log(3333)
                $.post({
                    url: "<?php echo url('../../index/login/login'); ?>",
                    data:{
                        username: $('#identity').val(),
                        password: $('#password').val()
                    },
                    success: function(data){
                        data = JSON.parse(data);
                        console.log(data)
                        if(data.status == 0){
                            window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?><?php echo !empty($_SERVER['QUERY_STRING'])?'?'.$_SERVER['QUERY_STRING']:''; ?>";
                        }else{
                            showErr(data);
                        }
                    },

                })
            })

            function showErr(data){
                $('.signForm .err').text(data.message);
                console.log(11111)
            }
        })


        $(document).ready(function(){ 
            $("#loginWin .signForm").keydown(function(e){ 
                var curKey = e.which; 
                // console.log(111);
                if(curKey == 13){ 
                    $("#loginWin #submit").click();
                    // console.log(2222) 
                    return false; 
                } 
            }); 
        }); 
        
        $(".signup input").focus(function(){
              $(".signup .err").text('');
            });
    </script>
</body>
</html>
		<script src="https://cdn.bootcss.com/vue/2.4.2/vue.min.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="https://cdn.bootcss.com/vue-router/2.7.0/vue-router.min.js"></script>		
		<link rel="stylesheet" type="text/css" href="__STATIC_PATH__/static/personalinfo/css/zr_personaCenter.css?jA123dh1j12"/>
		<div class="zr_zr_header">
			
		</div>
		<div class="zr_container">
			<div class="zr_content">
				<div id="zr_vue_here">
					<!--左边-->
					<div class="img_nav">
						<img :src="touxiang_src"/>
						<div class="nav_list">
							<ul>
								<li class="navList_ul_li">									
									<router-link to="/appointment" active-class="whether_curMenu"><i class="cur_menu"></i>我约的行家</router-link>
								</li>
								<li class="navList_ul_li">	
									<router-link to="/wantList" active-class="whether_curMenu"><i class="cur_menu"></i>心愿单</router-link>
								</li>
								
								<!--添加我的话题，预约单、收到的评论-->
								
								<!--添加结束-->
								
								<li class="navList_ul_li">	
									<router-link to="/liquan" active-class="whether_curMenu"><i class="cur_menu"></i>我的礼劵</router-link>
								</li>
								<li class="navList_ul_li">	
									<router-link to="/personalSet" active-class="whether_curMenu"><i class="cur_menu"></i>个人设置</router-link>
									<ol>
										<li>	
											<router-link to="/GerenZiliao" active-class="whether_curWord"><i class=""></i><span class="cur_menu_word">个人资料</span></router-link>
										</li>
										<li>
											<router-link to="/TouxiangSet" active-class="whether_curWord"><i class=""></i><span class="cur_menu_word">头像设置</span></router-link>
										</li>
										<li>
											<router-link to="/YanzhengPhone" active-class="whether_curWord"><i class=""></i><span class="cur_menu_word">验证手机</span></router-link>
										</li>
										<li>	
											<router-link to="/ChangeMima" active-class="whether_curWord"><i class=""></i><span class="cur_menu_word">修改密码</span></router-link>
										</li>
										<li>	
											<router-link to="/ShoukuangYinsi" active-class="whether_curWord"><i class=""></i><span class="cur_menu_word">收款及隐私</span></router-link>
										</li>
									</ol>
								</li>							
							</ul>
						</div>
					</div>
					<!--右边-->
					<div class="nav_zr_container">
						<router-view></router-view>
					</div>
				</div>
				
			</div>
			
		</div>
		<!--<div class="footer"></div>-->		
			
		<!--我约的行家页-->
		<template id="appointmentHtml">
			<div class="appointmentHtml">
				<?php if((1== 0)): ?>

				<!--没行家时-->
				<div class="noHangjia">
					<div class="appointmentHtml_zr_header">
						<p>我约的人</p>
					</div>
					<div class="appointmentHtml_zr_container">
						<p>真忧伤，我还没有约过人唉。<a href="#">立即去约人！</a></p>
					</div>
				</div>
				
				<?php else: ?>

				<!--有行家时-->
<!-- 					<?php
					var_dump($info);
				?> -->

<!-- <?php if(is_array($meetinfo) || $meetinfo instanceof \think\Collection || $meetinfo instanceof \think\Paginator): $i = 0; $__LIST__ = $meetinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<?php echo $vo['id']; ?>:<?php echo $vo['meet_situation']; ?><br/>
<?php endforeach; endif; else: echo "" ;endif; ?> -->

				<?php foreach($meetinfo as  $key => $vo): ?> 
				    <!-- <?php echo $vo['id']; ?>:<?php echo $vo['meet_question']; ?> -->
						<?php if(($vo['expert_confirm'] == 0)): ?> <h2>等待行家确认</h2>


				<div class="haveHangjia">
					<div class="appointmentHtml_zr_header">
						<p><span class="bianhao">编号：<?php echo $vo['order_number']; ?></span><span class="time">发起时间：<?php echo $vo['create_time']; ?></span><span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vo['id']; ?></span></p>
					</div>
					<div class="appointmentHtml_zr_container">
						<div class="img_topic_word">
							<img src="<?php echo !empty($vo['head_pic'])?'__STATIC_PATH__'.$vo['head_pic']:'__STATIC_PATH__/data/home_head_pic/system_headpic/system_headpic.jpeg'; ?>"/>
							<div class="topic_word">
								<h2><?php echo $vo['topic_name']; ?></h2>
								<p><span><?php echo $vo['exp_realname']; ?></span><span>&nbsp;&nbsp;&nbsp;</span><?php echo $vo['exp_job']; ?></p>
							</div>
						</div>
						<div class="money">
							<?php echo $vo['topic_price']; ?>元
						</div>
						<div class="status" style="color:sienna;">
							等待行家确认
						</div>
						<div class="lookMore">
							<a @click="detailpop(<?php echo $key; ?>)">查看详情</a>
						</div>
					</div>
					<div class="lookMove_box">
						<div class="aboutWenti">
							<p>您想请教的问题是：</p>
							<p><?php echo $vo['meet_question']; ?></p>
						</div>
						<div class="aboutGeren">
							<p>您的个人简介:</p>
							<p><?php echo $vo['meet_situation']; ?></p>
						</div>
					</div>
				</div>


				<?php elseif(($vo['expert_confirm'] == -1)): ?> <h2>订单被取消</h2>



				<div class="haveHangjia">
					<div class="appointmentHtml_zr_header">
						<p><span class="bianhao">编号：<?php echo $vo['order_number']; ?></span><span class="time">发起时间：<?php echo $vo['create_time']; ?></span><span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vo['id']; ?></span></p>
					</div>
					<div class="appointmentHtml_zr_container">
						<div class="img_topic_word">
							<img src="<?php echo !empty($vo['head_pic'])?'__STATIC_PATH__'.$vo['head_pic']:'__STATIC_PATH__/data/home_head_pic/system_headpic/system_headpic.jpeg'; ?>"/>
							<div class="topic_word">
								<h2><?php echo $vo['topic_name']; ?></h2>
								<p><span><?php echo $vo['exp_realname']; ?></span><span>&nbsp;&nbsp;&nbsp;</span><?php echo $vo['exp_job']; ?></p>
							</div>
						</div>
						<div class="money">
							<?php echo $vo['topic_price']; ?>元
						</div>
						<div class="status">
							订单被取消
						</div>
						<div class="lookMore">
							<a @click="detailpop(<?php echo $key; ?>)">查看详情</a>
						</div>
					</div>
					<div class="lookMove_box">
						<div class="aboutWenti">
							<p>您想请教的问题是：</p>
							<p><?php echo $vo['meet_question']; ?></p>
						</div>
						<div class="aboutGeren">
							<p>您的个人简介:</p>
							<p><?php echo $vo['meet_situation']; ?></p>
						</div>
					</div>
				</div>



				<?php elseif(($vo['student_pay'] == 0)): ?> <h2>确认并付款</h2> 

				<div class="haveHangjia">
					<div class="appointmentHtml_zr_header">
						<p><span class="bianhao">编号：<?php echo $vo['order_number']; ?></span><span class="time">发起时间：<?php echo $vo['create_time']; ?></span><span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vo['id']; ?></span></p>
					</div>
					<div class="appointmentHtml_zr_container">
						<div class="img_topic_word">
							<img src="<?php echo !empty($vo['head_pic'])?'__STATIC_PATH__'.$vo['head_pic']:'__STATIC_PATH__/data/home_head_pic/system_headpic/system_headpic.jpeg'; ?>"/>
							<div class="topic_word">
								<h2><?php echo $vo['topic_name']; ?></h2>
								<p><span><?php echo $vo['exp_realname']; ?></span><span>&nbsp;&nbsp;&nbsp;</span><?php echo $vo['exp_job']; ?></p>
							</div>
						</div>
						<div class="money">
							<a href=""style="color:red;">取消订单</a>
						</div>
						<div class="status" >
							<form id="studentConfirm" action="<?php echo url('studentConfirm'); ?>">
								<input type="hidden" value="<?php echo $vo['id']; ?>" name="id">
								<a href="#" type="submit" style="color:red;" onclick="document.getElementById('studentConfirm').submit();return false">确认地点并付款</a>
							</form>
						</div>
						<div class="lookMore">
							<a @click="detailpop(<?php echo $key; ?>)">查看地点</a>
						</div>
					</div>
					<div class="lookMove_box">
						<div class="aboutWenti">
							<p>见面地点：</p>
							<p><?php echo $vo['meet_place']; ?></p>
						</div>
						<div class="aboutGeren">
							<p>见面时间：</p>
							<p><?php echo $vo['meet_time']; ?></p>
						</div>
					</div>
				</div>





				<?php elseif(($vo['student_pay'] == 1)): ?> <h2>已付款</h2> 

				<div class="haveHangjia">
					<div class="appointmentHtml_zr_header">
						<p><span class="bianhao">编号：<?php echo $vo['order_number']; ?></span><span class="time">发起时间：<?php echo $vo['create_time']; ?></span><span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vo['id']; ?></span></p>
					</div>
					<div class="appointmentHtml_zr_container">
						<div class="img_topic_word">
							<img src="<?php echo !empty($vo['head_pic'])?'__STATIC_PATH__'.$vo['head_pic']:'__STATIC_PATH__/data/home_head_pic/system_headpic/system_headpic.jpeg'; ?>"/>
							<div class="topic_word">
								<h2><?php echo $vo['topic_name']; ?></h2>
								<p><span><?php echo $vo['exp_realname']; ?></span><span>&nbsp;&nbsp;&nbsp;</span><?php echo $vo['exp_job']; ?></p>
							</div>
						</div>
						<div class="money">
							<form id="studentPay" action="<?php echo url('studentPay'); ?>">
								<input type="hidden" value="<?php echo $vo['id']; ?>" name="id">
								<a href="#" type="submit" style="color:red;" onclick="document.getElementById('studentPay').submit();return false">点击确认付款</a>
							</form>
						</div>
						<div class="status">
							已付款
						</div>
						<div class="lookMore">
							<a @click="detailpop(<?php echo $key; ?>)">查看地点</a>
						</div>
					</div>
					<div class="lookMove_box">
						<div class="aboutWenti">
							<p>见面地点：</p>
							<p><?php echo $vo['meet_place']; ?></p>
						</div>
						<div class="aboutGeren">
							<p>见面时间：</p>
							<p><?php echo $vo['meet_time']; ?></p>
						</div>
					</div>
				</div>

				<?php elseif(($vo['student_pay'] == 2) AND($vo['meet_score'] == NULL)): ?> <h2>未评价</h2>

				<div class="haveHangjia">
					<div class="appointmentHtml_zr_header">
						<p><span class="bianhao">编号：<?php echo $vo['order_number']; ?></span><span class="time">发起时间：<?php echo $vo['create_time']; ?></span><span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vo['id']; ?></span></p>
					</div>
					<div class="appointmentHtml_zr_container">
						<div class="img_topic_word">
							<img src="<?php echo !empty($vo['head_pic'])?'__STATIC_PATH__'.$vo['head_pic']:'__STATIC_PATH__/data/home_head_pic/system_headpic/system_headpic.jpeg'; ?>"/>
							<div class="topic_word">
								<h2><?php echo $vo['topic_name']; ?></h2>
								<p><span><?php echo $vo['exp_realname']; ?></span><span>&nbsp;&nbsp;&nbsp;</span><?php echo $vo['exp_job']; ?></p>
							</div>
						</div>
						<div class="money">
							<?php echo $vo['topic_price']; ?>元
						</div>
						<div class="status" style="color:sienna;">
							订单完成
						</div>
						<div class="lookMore">
							<a @click="detailpop(<?php echo $key; ?>)">点击评价</a>
						</div>
					</div>
					<div class="lookMove_box">
						<form action="<?php echo url('studentComment'); ?>">
							<div class="aboutWenti">
								<p>评分：</p>
								1<input type="radio" value="1" name="meet_score" >&nbsp;&nbsp;
								2<input type="radio" value="2" name="meet_score" >&nbsp;&nbsp;
								3<input type="radio" value="3" name="meet_score" >&nbsp;&nbsp;
								4<input type="radio" value="4" name="meet_score" >&nbsp;&nbsp;
								5<input type="radio" value="5" name="meet_score" >&nbsp;&nbsp;
							</div>
							<div class="aboutGeren">
								<p>评论：</p>
								<input type="text" name="meet_comment">
							</div>
							<input type="hidden" value="<?php echo $vo['id']; ?>" name="id">
							<input type="submit">
						</form>
					</div>
				</div>


				<?php elseif(($vo['meet_score'] != 0)): ?> <h2>已评价</h2>
				<div class="haveHangjia">
					<div class="appointmentHtml_zr_header">
						<p><span class="bianhao">编号：<?php echo $vo['order_number']; ?></span><span class="time">发起时间：<?php echo $vo['create_time']; ?></span><span>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vo['id']; ?></span></p>
					</div>
					<div class="appointmentHtml_zr_container">
						<div class="img_topic_word">
							<img src="<?php echo !empty($vo['head_pic'])?'__STATIC_PATH__'.$vo['head_pic']:'__STATIC_PATH__/data/home_head_pic/system_headpic/system_headpic.jpeg'; ?>"/>
							<div class="topic_word">
								<h2><?php echo $vo['topic_name']; ?></h2>
								<p><span><?php echo $vo['exp_realname']; ?></span><span>&nbsp;&nbsp;&nbsp;</span><?php echo $vo['exp_job']; ?></p>
							</div>
						</div>
						<div class="money">
							<?php echo $vo['topic_price']; ?>元
						</div>
						<div class="status" style="color: #FF946E;">
							已评价
						</div>
						<div class="lookMore">
							<a @click="detailpop(<?php echo $key; ?>)">查看评价</a>
						</div>
					</div>
					<div class="lookMove_box">
						<div class="aboutWenti">
							<p>您给的分数：</p>
							<p><?php echo $vo['meet_score']; ?></p>
						</div>
						<div class="aboutGeren">
							<p>您的评论：</p>
							<p><?php echo $vo['meet_comment']; ?></p>
						</div>
					</div>
				</div>


		<?php else: ?> <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>bug：有一条数据未输出
		<?php endif; ?>
		<br/>
<?php endforeach; ?>




<!-- 				
<div class="haveHangjia">
	<div class="appointmentHtml_zr_header">
		<p><span class="bianhao">编号：1506511613968660</span><span class="time">发起时间：2017-09-27</span></p>
	</div>
	<div class="appointmentHtml_zr_container">
		<div class="img_topic_word">
			<img src="__STATIC_PATH__/<?php echo $info['user_head_pic']; ?>"/>
			<div class="topic_word">
				<h2>IT从业者如何做好职业规划</h2>
				<p><span>范雯甜</span><span>&nbsp;&nbsp;&nbsp;</span>博优咨询首席顾问、合伙人</p>
			</div>
		</div>
		<div class="money">
			600元
		</div>
		<div class="status">
			已经取消
		</div>
		<div class="lookMore">
			<a @click="detailpop(9)">查看详情</a>
		</div>
	</div>
	<div class="lookMove_box">
		<div class="aboutWenti">
			<p>您想请教的问题是：</p>
			<p>111111</p>
		</div>
		<div class="aboutGeren">
			<p>您的个人简介:</p>
			<p>222222</p>
		</div>
	</div>
</div> -->
				
				<?php endif; ?>
			</div>
		</template>	
		
		
		<!--心愿单页-->
		<template id="wantListHtml">
			<div class="wantListHtml">
				<div class="wantListHtml_zr_container">
					<p>真忧伤，我的心愿单还没有行家。<a href="#">立即去加人！</a></p>
					<!--<ul>
						<li>
							
						</li>
					</ul>-->
				</div>
			</div>
		</template>
		
		
		<!--添加3个template，我的话题，预约单，收到的评论-->
		
		
		<!--  -->
		<!--添加结束-->		
		
		
		<!--我的礼劵页-->
		<template id="liquanHtml">
			<div class="liquanHtml">
				<div class="liquanHtml_zr_header">
					<p>
						我的礼劵
						<a href="#">使用规则</a>
					</p>
				</div>
				<div class="liquanHtml_zr_container" style="padding: 26px 20px 35px 20px;">
					<!--<p>您还没有获得礼券，请随时关注「在行」</p>-->
					<div class="coupon_usable">
						<div class="title">
							新用户专属
							<p class="denomination">
								<span class="unit">￥</span>50
							</p>
						</div>
						<ul class="description">
							<li>• 满99元可用</li>
						</ul>
						<p class="tip">
							2017-09-18至2017-10-01有效
						</p>	
					</div>
					<div class="coupon_usable">
						<div class="title">
							新用户专属
							<p class="denomination">
								<span class="unit">￥</span>50
							</p>
						</div>
						<ul class="description">
							<li>• 满99元可用</li>
							<li>• 满99元可用</li>
							<li>• 满99元可用</li>
						</ul>
						<p class="tip">
							2017-09-18至2017-10-01有效
						</p>	
					</div>
					<div class="coupon_usable">
						<div class="title">
							新用户专属
							<p class="denomination">
								<span class="unit">￥</span>50
							</p>
						</div>
						<ul class="description">
							<li>• 满99元可用</li>
						</ul>
						<p class="tip">
							2017-09-18至2017-10-01有效
						</p>	
					</div>
					<div class="coupon_usable">
						<div class="title">
							新用户专属
							<p class="denomination">
								<span class="unit">￥</span>50
							</p>
						</div>
						<ul class="description">
							<li>• 满99元可用</li>
						</ul>
						<p class="tip">
							2017-09-18至2017-10-01有效
						</p>	
					</div>
				</div>
			</div>
		</template>
		<!--个人设置页-->
		<template id="personalSetHtml">
			<div class="personalSetHtml">
				<!--<p>个人设置页</p>-->
			</div>
		</template>
		
		<!--个人设置页里面的导航条-->
		<!--个人资料-->
		<template id="GerenZiliaoHtml">
			<form action="<?php echo url('update'); ?>" method="post" class="GerenZiliaoHtml">
				<div class="GerenZiliaoHtml_zr_header">
					<p>个人资料</p>
				</div>
	
				<div class="GerenZiliaoHtml_zr_container">
					<div class="Geren_userName">
						<p><span>* </span>昵称</p>
						<input name="user_name" value="<?php echo $info['user_name']; ?>" />						
					</div>
					<div class="Geren_trueName">
						<p><span>* </span>真实姓名</p>
						<input name="user_true_name" value="<?php echo $info['user_true_name']; ?>" />						
					</div>
					<div class="Geren_changzhudi">
						<p><span>* </span>常居地</p>
						<select autofocus id="location" name="user_address" required>
							<option value="北京">北京</option>
							<option <?php if($info['user_address'] == '上海'): ?> selected <?php endif; ?> value="上海">上海</option>
							<option <?php if($info['user_address'] == '深圳'): ?> selected <?php endif; ?> value="深圳">深圳</option>
							<option <?php if($info['user_address'] == '广州'): ?> selected <?php endif; ?> value="广州">广州</option>
							<option <?php if($info['user_address'] == '杭州'): ?> selected <?php endif; ?> value="杭州">杭州</option>
							<option <?php if($info['user_address'] == '成都'): ?> selected <?php endif; ?> value="成都">成都</option>
							<option <?php if($info['user_address'] == '西安'): ?> selected <?php endif; ?> value="西安">西安</option>
							<option <?php if($info['user_address'] == '武汉'): ?> selected <?php endif; ?> value="武汉">武汉</option>
							<option <?php if($info['user_address'] == '宁波'): ?> selected <?php endif; ?> value="宁波">宁波</option>
						</select>						
					</div>
					<div class="Geren_jianjie">
						<p><span>* </span>个人简介<span class="Geren_jianjie_word">完备的个人简历可以向行家展现您约见的诚意，也能让行家更好的帮助您。</span></p>
						<textarea name="user_intro" name="" rows="" cols=""><?php echo $info['user_intro']; ?>			
				</textarea>
					</div>
				</div>
				<div class="GerenZiliaoHtml_footer">
					<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
					<button class="" type="submit">提交</button>
				</div>
			</form>
		</template>
		<!--头像设置-->
		<template id="TouxiangSetHtml">
			<form action="<?php echo url('saveimg'); ?>" method="POST" enctype="multipart/form-data" class="TouxiangSetHtml">
				<div class="TouxiangSetHtml_zr_header">
					<p>上传头像</p>
				</div>
				<div class="TouxiangSetHtml_zr_container">
					<div class="img_word_btn">
						<div class="touxiang_imgbox">
							<img src="__STATIC_PATH__/<?php echo !empty($info['user_head_pic'])?$info['user_head_pic']:'data/home_head_pic/system_headpic/system_headpic.jpeg'; ?>" class="touxiangImg"/>
							<span class="close_touxiang" @click="close_touxiang()" >x</span>
						</div>
						
						<div class="word_btn">
							<p>支持jpg，png，gif格式图片，请尽可能选用160*160以上照片。</p>
							<div class="btn">
								<a href="javascript:;"><input name="user_head_pic" @change="uploadImg()" type="file" class="filepath"/>电脑中选一张</a>	
							</div>							

						</div>
					</div>
					<div class="submit_touxiang">
						<input type="hidden" name="user_id" value="<?php echo $info['id']; ?>">
						<button>保存</button>
					</div>
				</div>
			</form>
		</template>
		<!--验证手机-->
		<template id="YanzhengPhoneHtml">
			<form action="<?php echo url('update'); ?>" method="post" class="YanzhengPhoneHtml">
				<div class="YanzhengPhoneHtml_zr_header">
					<p>验证手机</p>
				</div>
				<div class="YanzhengPhoneHtml_zr_container">
					<div class="phoneNum">
						<input name="user_phone" type="text" value="<?php echo $info['user_phone']; ?>"/>
						<button>发送手机验证码</button>
					</div>
					<div class="phoneCaptcha">
						<input type="text" />
						<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
						<button>提交</button>
					</div>
				</div>
			</form>
		</template>
		<!--修改密码-->
		<template id="ChangeMimaHtml">
			<div class="ChangeMimaHtml">
				<div class="ChangeMimaHtml_zr_header">
					<p>修改密码</p>
				</div>
				<div class="ChangeMimaHtml_zr_container">
					<div class="nowPassword">
						<p>当前密码</p>
						<input />						
					</div>
					<div class="newPassword">
						<p>新密码</p>
						<input value="" />						
					</div>
					<div class="newPassword_again">
						<p>确认新密码</p>
						<input value="" />						
					</div>
				</div>
				<div class="ChangeMimaHtml_footer">
					<button class="" type="submit">提交</button>
				</div>
			</div>
		</template>
		<!--收款及隐私-->
		<template id="ShoukuangYinsiHtml">
			<div class="ShoukuangYinsiHtml">
				<div class="ShoukuangYinsiHtml_zr_header">
					<p>收款及隐私</p>
				</div>
				<div class="ShoukuangYinsiHtml_zr_container">
					<div class="AboutTuikuang">
						<p>如果出现退款情况，将退到您这个账号。</p>
					</div>					
					<div class="zhifubao">
						<p><span> * </span>收款人支付宝</p>
						<input placeholder="目前只提供支付宝一种结算方式，如您没有支付宝建议您申请一个，或者找亲友代收"/>						
					</div>
					<div class="IDcard">
						<p><span> * </span>收款人身份证姓名</p>
						<input value="" placeholder="请务必与证件上的姓名一致，请不要用昵称"/>	
					</div>
				</div>
				<div class="ShoukuangYinsiHtml_footer">
					<input type="hidden" name="id" value="<?php echo $info['id']; ?>">
					<button class="" type="submit">提交</button>
				</div>
			</div>
		</template>
		<!--路由-->
		<script type="text/javascript">
			const router=new VueRouter({
				routes:[
//					重定向
					{
						path:'/',
						redirect:'/appointment'
					},
//					预约
					{
						path:'/appointment',
						component:{
							template:'#appointmentHtml',
							mounted:function(){
								$(".nav_zr_container").css("border","none");
								$(".appointmentHtml").css("background","#fafafa");
							},							
							beforeDestroy:function(){
								$(".nav_zr_container").css("border","1px solid #ccc");
							},
							methods:{
								detailpop:function(even){
									$(event.target).parent().parent().parent().find(".lookMove_box").toggle();
								}
							}
						},
					},
//					心愿单
					{
						path:'/wantList',
						component:{
							template:'#wantListHtml'
						}
					},
//					添加导航项，我的话题，预约单，收到的评论
//					添加结束					
//					礼券
					{
						path:'/liquan',
						component:{
							template:'#liquanHtml'
						}
					},
//					个人设置
					{
						path:'/personalSet',
						component:{
							template:'#personalSetHtml',
							//增加
							beforeRouteEnter(to,from,next){
								next('/GerenZiliao')
							},
						}
					},
//					个人设置里面的导航条
					{
						path:'/GerenZiliao',
						component:{
							template:'#GerenZiliaoHtml'
						}
					},
					{
						path:'/TouxiangSet',
						component:{
							template:'#TouxiangSetHtml',
							methods:{
								uploadImg:function(){
						            var srcs = this.getObjectURL($(".filepath")[0].files[0]);   //获取路径
						            console.log(srcs);
						            console.log($(".filepath"));
						            $(".close_touxiang").show();
						            $(".submit_touxiang").show();
						            $(".touxiangImg").attr("src",srcs);    //this指的是input
						        },
								getObjectURL:function(file) {
							        var url = null;
							        if (window.createObjectURL != undefined) {
							            url = window.createObjectURL(file)
							        } else if (window.URL != undefined) {
							            url = window.URL.createObjectURL(file)
							        } else if (window.webkitURL != undefined) {
							            url = window.webkitURL.createObjectURL(file)
							        }
							        return url
							    },
							    close_touxiang:function(){
						            $(".close_touxiang").hide();
						            $(".submit_touxiang").hide();
						            $(".touxiangImg").attr("src",'__STATIC_PATH__/<?php echo $info['user_head_pic']; ?>');
							    }
							}
						}
					},
					{
						path:'/YanzhengPhone',
						component:{
							template:'#YanzhengPhoneHtml',
							methods:{

							}
						}
					},
					{
						path:'/ChangeMima',
						component:{
							template:'#ChangeMimaHtml'
						}
					},
					{
						path:'/ShoukuangYinsi',
						component:{
							template:'#ShoukuangYinsiHtml'
						}
					},
				]
			});
			new Vue({
				el:"#zr_vue_here",
				data:{
					touxiang_src: "__STATIC_PATH__/<?php echo !empty($info['user_head_pic'])?$info['user_head_pic']:'data/home_head_pic/system_headpic/system_headpic.jpeg'; ?>"
				},
				methods:{
				},
				router
			});
		</script>
		<!--js-->
		<script type="text/javascript">
			var navList_li=document.querySelectorAll(".nav_list ul .navList_ul_li");
			var navList_li_ol_li=document.querySelectorAll(".nav_list ul .navList_ul_li ol li");
			var navList_li_ol=document.querySelectorAll(".nav_list ul .navList_ul_li ol");

//			进来就判断
			setCurmenu();
			function setCurmenu(){
//				设置个人设置是否高亮
				var key=0;
				for(var i=0;i<navList_li_ol_li.length;i++){
//					console.log(navList_li_ol_li[i].querySelector('a').getAttribute('class'));
					if(navList_li_ol_li[i].querySelector('a').getAttribute('class')){
						key=1;
					}
				}
				if(key==1){					
					navList_li[3].setAttribute("class",'navList_ul_li liWhether_curMenu');
					navList_li_ol[0].style.display="block";
				}
				else{
					navList_li[3].setAttribute("class",'navList_ul_li');
					navList_li_ol[0].style.display="none";
				}
			}
//			点击首页导航条是判断
			clickLi_setCur();
			function clickLi_setCur(){
				for(var i=0;i<navList_li.length-1;i++){
					navList_li[i].onclick=function(){
						setCurmenu();
					}
				}
			}
			
//			点击个人设置导航条判断
			clickOlli_setCur();
			function clickOlli_setCur(){
				for(var i=0;i<navList_li_ol_li.length;i++){
					navList_li_ol_li[i].onclick=function(){
						setCurmenu();
					}
				}
			}
			
//			个人设置导航条是否显示
			ShowGerenNav();
			function ShowGerenNav(){
				navList_li[3].children[0].onclick=function(){					
					if(navList_li_ol[0].style.display=="block"){
						navList_li_ol[0].style.display="none";
					}
					else{
						navList_li_ol[0].style.display="block";
					}
					//增加
					navList_li[3].setAttribute("class",'navList_ul_li liWhether_curMenu');
				}
			}
		</script>
		<script type="text/javascript">
		
			
			//获取路径的方法
			function getObjectURL(file) {
		        var url = null;
		        if (window.createObjectURL != undefined) {
		            url = window.createObjectURL(file)
		            console.log('w1')
		        } else if (window.URL != undefined) {
		            url = window.URL.createObjectURL(file)
		            console.log('w2')
		        } else if (window.webkitURL != undefined) {
		            url = window.webkitURL.createObjectURL(file)
		            console.log('w3')
		        }
		        return url
		    };
		</script>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>topics</title>
	<link rel="stylesheet" type="text/css" href="__STATIC_PATH__/static/css/common.css">
	<script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<link rel="stylesheet" type="text/css" href="__STATIC_PATH__/static/nav_foot/css/foot.css?dfg">
<div class="common-foot">
	<div class="foot">
		<div class="top">
			<div class="left">
				<a class="header_logo" href="/" >
					<i class="icon icon_zaih">海学</i>
					<span class="fStyle">学习网出品</span>
				</a>
				<ul>
					<a href="#" class="fStyle hover">首页</a>
					<a href="#" class="fStyle hover">下载app</a>
					<a href="#" class="fStyle hover">关于我们</a>
					<a href="#" class="fStyle hover">帮助</a>
				</ul>
			</div>
			<div class="right">
				<p class="fStyle bigTel">4000-691-791</p>
				<p class="fStyle">工作日 10:00-19:00</p>
				<input type="button" name="" value="在线客服">
				<div class="imgBox">
					<div class="box">
						<img src="__STATIC_PATH__/static/nav_foot/images/3.jpg">
						官方微信
					</div>
					<div class="box">
						<img src="__STATIC_PATH__/static/nav_foot/images/4.jpg">
						海学沙龙
					</div>
				</div>
			</div>
		</div>
		<div class="bottom">
			<div class="left">
				<p class="fStyle">GUOKR © 2015 LOVINGLY MADE IN BEIJING<br>
				北京我最海学信息技术有限公司<br>
				京B2-20160131
					<a href="#" class="fStyle hover"><img src="__STATIC_PATH__/static/nav_foot/images/2.jpg">京公网安备 11010502031582号</a>
				</p>
			</div>
			<div class="right">
				<p class="fStyle">地址 北京市朝阳区建国路郎园Vintage </p>
				<p class="fStyle">电话 010-85809983</p>
			</div>
		</div>
	</div>
</div>
</body>
</html>
</body>
</html>