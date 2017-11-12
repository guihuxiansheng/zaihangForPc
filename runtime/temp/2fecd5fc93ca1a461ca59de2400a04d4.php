<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:86:"D:\wamp64\www\haixue\hx\zaihangForPc\public/../application/index\view\index\index.html";i:1510307315;s:88:"D:\wamp64\www\haixue\hx\zaihangForPc\public/../application/index\view\common\header.html";i:1510306877;s:87:"D:\wamp64\www\haixue\hx\zaihangForPc\public/../application/index\view\nav_foot\nav.html";i:1510307315;s:88:"D:\wamp64\www\haixue\hx\zaihangForPc\public/../application/index\view\nav_foot\foot.html";i:1510307315;s:88:"D:\wamp64\www\haixue\hx\zaihangForPc\public/../application/index\view\common\footer.html";i:1510306877;}*/ ?>
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
<link rel="stylesheet" href="__STATIC_PATH__/static/index/css/index.css?ab">
<div class="index container">
    <div class="cover">
        <div class="cover-image" style="background-image:url(<?php echo url('/data/index/Fgfa_iD_vHSZTzMo94hqJl9CzKl3.png'); ?>)"></div>
        <div class="column">
            <div class="index-title">
                <h1><?php echo $data_list['main_word1']; ?><br><?php echo $data_list['main_word2']; ?></h1>
                <p><?php echo $data_list['described_word']; ?></p>
                <a href="" class="app-download-btn"
                    target="_blank">下载客户端</a>
                <form class="index-search" action="<?php echo url('/index/search'); ?>" method="GET">
                    <div class="drop-select drop-select-hide" id="city">
                        <a class="drop-select-default dropSelectDefault" id="selectCity" onclick="selex.show()"><?php foreach($cityList as $key=>$val): if($val['place']==$city): ?><?php echo $val['place_name']; endif; endforeach; ?><i class="icon icon-arrow-bottom" href="javascript:void 0;"></i></a>
                        <ul class="drop-select-options">
                            <li class="arrow-up-wrap"><i class="arrow-up"></i></li>
                            <?php foreach($cityList as $key=>$val): ?>
                                <li>
                                    <a class="city <?php echo !empty($val['place']) && $val['place']==$city?'current':''; ?>" data-city="<?php echo $val['place']; ?>" onclick="selex.getCity()" href="javascript:void 0;"><?php echo $val['place_name']; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <input class="search-content" autocomplete="off" type="text" placeholder="搜行家、话题、服务" name="word">
                    <input type="hidden" id="cityInput" name="city">
                    <div class="search-sug sug">
                    </div>
                    <button class="search-btn" type="submit">搜索</button>
                    <button class="search-btn-mobile" type="submit">
                        <span class="icon icon-search"></span>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="index-guide">
        <div class="column">
            <div class="guide">
                <div class="guide-step">
                    <i class="icon icon-home-tutor"></i>
                    <h2>海量行家</h2>
                    <p>严选超过8千位行家达人专属服务</p>
                </div>
                <div class="guide-step">
                    <i class="icon icon-home-consultant"></i>
                    <h2>万能顾问</h2>
                    <p>求教专家解惑或与达人切磋</p>
                </div>
                <div class="guide-step">
                    <i class="icon icon-home-service"></i>
                    <h2>按需服务</h2>
                    <p>根据个人所需线上线下灵活沟通</p>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <ul class="index-list">
        <?php foreach($find_money_expert as $k=>$exparray): if($k<4): ?>
            <li class="index-list-tutor index-list-sm">
                <a class="index-list-item aTutor" href="<?php echo url('/index/detail?id='.$exparray['id']); ?>">
                <img src="__STATIC_PATH__/<?php echo $exparray['exp_homepic']; ?>">

                <div class="index-list-cover"></div>
                <div class="index-tutor-info">
                    <h3><?php echo $exparray['exp_realname']; ?></h3>
                    <h4><?php echo $exparray['exp_job']; ?></h4>
                    <p class="index-topic-name">小白也能懂的个性化推荐系统</p>
                    <p class="index-topic-info">
                        <i>『 </i>
                            <span>依托于互联网行业的快速发展，信息的爆炸式增长，推荐系统有了很好的生存土壤。所谓个性化推荐，就是要帮助人们从纷繁复杂的信息中…</span>
                        <i> 』</i>
                    </p>
                </div>
                <span class="index-tutor-views">
                    10人见过
                </span>
            </a>
            </li>
        <?php endif; endforeach; ?>

            <li class="index-list-subject index-list-lg">

                <a data-received="首页-专题页..specialID.944" href="<?php echo url('/special/'.$place_topic['special'].date('Y').'_'.$place_topic['place']); ?>">
                <img src="__STATIC_PATH__/<?php echo $place_topic['pic']; ?> " style="width: 480px;height: 320px">
            </a>

            </li>

        <?php foreach($find_money_expert as $k=>$exparray): if($k>=4): ?>
            <li class="index-list-tutor index-list-sm">
                <a class="index-list-item aTutor" href="">
                <img src="__STATIC_PATH__/<?php echo $exparray['exp_homepic']; ?>">

                <div class="index-list-cover"></div>
                <div class="index-tutor-info">
                    <h3><?php echo $exparray['exp_realname']; ?></h3>
                    <h4><?php echo $exparray['exp_job']; ?></h4>
                    <p class="index-topic-name">小白也能懂的个性化推荐系统</p>
                    <p class="index-topic-info">
                        <i>『 </i>
                            <span>依托于互联网行业的快速发展，信息的爆炸式增长，推荐系统有了很好的生存土壤。所谓个性化推荐，就是要帮助人们从纷繁复杂的信息中…</span>
                        <i> 』</i>
                    </p>
                </div>
                <span class="index-tutor-views">
                    10人见过
                </span>
            </a>
            </li>
        <?php endif; endforeach; ?>

        </ul>
        <div class="index-btn">
            <a  href="<?php echo url('/index/topics/'); ?>" class="btn-default btn-hg">发现更多行家</a>
        </div>

        <div class="index-app-download appDownloadBar">
            <a class="app-download-lg" href="<?php echo url('/index/appzai'); ?>">
            <img src="__STATIC_PATH__/static/index/images/zh_download.jpeg">
        </a>
            <a target="_blank" class="app-download-sm">
            <img src="http://media.zaih.com/FlUh_JkYc1zis1lEr3Z84DCBfsmu">
        </a>
        </div>
    </div>


    <h2 class="slider-title">在行故事</h2>

     <div id="slider" class="slider">

        
        <a class="slides" style="background-image: url(&quot;__STATIC_PATH__/<?php echo $lunbo_list['slide_pic1']; ?>?abcd&quot;);">

            <p class="slides-title"><?php echo $lunbo_list['title1']; ?></p>
            <p class="slides-summary"><?php echo $lunbo_list['summary1']; ?></p>
            <span class="slides-btn"><?php echo $lunbo_list['pepole_index1']; ?></span>

        </a>



        <a href="" class="slides" style="background-image: url(&quot;__STATIC_PATH__/<?php echo $lunbo_list['slide_pic2']; ?>?abcd&quot;);">

            <p class="slides-title"><?php echo $lunbo_list['title2']; ?></p>
            <p class="slides-summary"><?php echo $lunbo_list['summary2']; ?></p>
            <span class="slides-btn"><?php echo $lunbo_list['pepole_index2']; ?></span>
        </a>



        <a href="" class="slides" style="background-image: url(&quot;__STATIC_PATH__/<?php echo $lunbo_list['slide_pic3']; ?>?abcd&quot;);">

            <p class="slides-title"><?php echo $lunbo_list['title3']; ?></p>
            <p class="slides-summary"><?php echo $lunbo_list['summary3']; ?></p>
            <span class="slides-btn"><?php echo $lunbo_list['pepole_index3']; ?></span>


        </a>
        <div class="slider-cover" id="sliderCov">
            <a href="javascript:void 0;" class="prev" id="prev"><span></span></a>
            <a href="javascript:void 0;" class="next" id="next"><span></span></a>
        </div>
    </div>
</div>
<script type="text/javascript">
//  改变首页大图
    var coverImage=document.querySelector('.cover-image');
    coverImage.style.backgroundImage='url("__STATIC_PATH__/<?php echo $data_list['head_img']; ?>")';
    
</script>
<script type="text/javascript">
    //改变slider中的第一个span
    var vSlider=document.querySelector('#slider');
    var vSpan=vSlider.querySelectorAll('.slider .slides-btn');
    for(var i=0;i<vSpan.length;i++){
        if(vSpan[i].innerHTML==''){
            vSpan[i].style.display="none";
        }
    }   
//  vSpan.style.display="none";
</script>
<script src="__STATIC_PATH__/static/index/js/index.js"></script>

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